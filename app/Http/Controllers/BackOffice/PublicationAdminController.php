<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PublicationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function index()
    // {
    //     // $Publications = Publication::all();
    //     $Publications = Publication::orderBy('created_at', 'desc')->get(); //pour que les publication apparait en ordre decroissant du date de creation si non on va laisser la ligne au dessus commenté
    //     return view('BackOffice.Publication.index' , compact('Publications'));
    // }

    public function index()
    {
        // $Publications = Publication::all();
        $Publications = Publication::orderBy('created_at', 'desc')->paginate(6); //pour que les publication apparait en ordre decroissant du date de creation si non on va laisser la ligne au dessus commenté
        return view('BackOffice.Publication.indexByTextEditor' , compact('Publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('BackOffice.Publication.create');
    }

    public function createByTextEditor()
    {
        return view ('BackOffice.Publication.createTextEditor');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Publication::create($request->post());

        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $publication = new Publication();
        $publication->title = $request->title ;
        $publication->description = $request->description ;
        $publication->category = $request->category ;
        $publication->user_id = auth()->id();
        
        // Gestion de l'image (s'assurer qu'une image a été fournie)
        if ($request->hasFile('content')) {
        $imageName = time() . '.' . $request->content->extension();
        // Déplacement de l'image vers le dossier public/images
        $request->content->move(public_path('images'), $imageName);
        $publication->content = 'images/'.$imageName;
        } else {
            $publication->content = null; // Ou une valeur par défaut si nécessaire
        }

    // Enregistrement de la publication
    $publication->save();

        return redirect()->route('publication.index')->with('add_success', 'Publication added successfully ');
    }


    public function storeByTextEditor(Request $request)
    {   
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $publication = new Publication();
        $publication->title = $request->title ;
        $publication->description = $request->description ;
        $publication->category = $request->category ;
        $publication->user_id = auth()->id();

        // Gestion de l'image (s'assurer qu'une image a été fournie)
        if ($request->hasFile('content')) {
        $imageName = time() . '.' . $request->content->extension();
        // Déplacement de l'image vers le dossier public/images
        $request->content->move(public_path('images'), $imageName);
        $publication->content = 'images/'.$imageName;
        } else {
            $publication->content = null; // Ou une valeur par défaut si nécessaire
        }

    // Enregistrement de la publication
    $publication->save();

    return redirect()->route('publication.index')->with('add_success', 'Publication added successfully ');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('BackOffice.Publication.update' , compact('publication')); // compact , pour passer la publication à la vue
    }

    public function editByTextEditor($id)
    {
        $publication = Publication::find($id);
        return view('BackOffice.Publication.updateTextEditor' , compact('publication')); // compact , pour passer la publication à la vue
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);
    

        $Publication = Publication::find($id);
        // $Publication->update($request->all());
        $Publication->title = $request->title;
        $Publication->description = $request->description;
        $Publication->category = $request->category;
        // Gestion de l'image (s'assurer qu'une nouvelle image a été fournie)
        if ($request->hasFile('content')) {
            // Supprimer l'ancienne image si elle existe
            if ($Publication->content && file_exists(public_path($Publication->content))) {
                unlink(public_path($Publication->content));
            }

            // Enregistrer la nouvelle image
            $imageName = time() . '.' . $request->content->extension();
            $request->content->move(public_path('images'), $imageName);
            $Publication->content = 'images/' . $imageName;
        }

        // Sauvegarder les changements
        $Publication->save();


        return redirect()->route('publication.index')->with('update_success', 'Publication updated successfully ');
    }


    public function updateByTextEditor(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Publication::find($id);

        $description = $request->description;
         // Gestion de l'image (s'assurer qu'une nouvelle image a été fournie)
         if ($request->hasFile('content')) {
            // Supprimer l'ancienne image si elle existe
            if ($post->content && file_exists(public_path($post->content))) {
                unlink(public_path($post->content));
            }

            // Enregistrer la nouvelle image
            $imageName = time() . '.' . $request->content->extension();
            $request->content->move(public_path('images'), $imageName);
            $post->content = 'images/' . $imageName;
        }

        $dom = new DOMDocument();
        $dom->loadHTML($description,9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
              
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/images/" . time(). $key.'.png';
                file_put_contents(public_path().$image_name,$data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }

        }
        $description = $dom->saveHTML();

        $post->update([
            'title' => $request->title,
            'description' => $description,
            'category' =>$request->category
        ]);

        return redirect('/publication')->with('update_success', 'Publication updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $Publication = Publication::find($id);
    //     $Publication->delete();
    //     return redirect()->route('publication.index')->with('delete_success', 'Publication deleted successfully ');
    // }

    public function destroy($id)
    {
        $Publication = Publication::find($id);
            
        $dom= new DOMDocument();
        $dom->loadHTML($Publication->description,9);
        $images = $dom->getElementsByTagName('img');
    
        foreach ($images as $key => $img) {
                
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');
    
    
            if (File::exists($path)) {
                File::delete($path);
                   
            }
        }
    
        $Publication->delete();
        return redirect()->back()->with('delete_success', 'Publication deleted successfully ');;
    }
    
    
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        if (empty($query)) {
            return redirect()->route('publication.index'); 
        }
    
        $Publications = Publication::where('title', 'LIKE', "%{$query}%")->paginate(6);
    
        return view('BackOffice.Publication.indexByTextEditor', compact('Publications', 'query'));
    }
    
    








}
