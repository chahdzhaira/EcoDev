<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Publications = Publication::all();
        $Publications = Publication::orderBy('created_at', 'desc')->get(); //pour que les publication apparait en ordre decroissant du date de creation si non on va laisser la ligne au dessus commenté
        return view('BackOffice.Publication.index' , compact('Publications'));
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
            'title' => 'required|min:3|max:50',
            'content' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $publication = new Publication();
        $publication->title = $request->title ;
        $publication->description = $request->description ;
        $publication->category = $request->category ;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Publication = Publication::find($id);
        $Publication->delete();
        return redirect()->route('publication.index')->with('delete_success', 'Publication deleted successfully ');
    }
}
