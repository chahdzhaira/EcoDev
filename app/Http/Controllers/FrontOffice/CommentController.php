<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment ; 
use App\Models\Publication ; 
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication = Publication::with('comments')->findOrFail($publication_id);
        return view('comments.index', compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $publication_id)
    {
        $request->validate([
            'content' => 'required|string',
        ], [
            'content.required' => "You can't add an empty comment !",
        ]);

        $publication = Publication::findOrFail($publication_id);

        Comment::create([
            'publication_id' => $publication->id,
            'content' => $request->content,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
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
        // // Vérifiez si l'utilisateur connecté est l'auteur du commentaire
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', "You can't modify this comment");
        }
        $comment = Comment::findOrFail($id);
        $comment->isEditing = true; 
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ], [
            'content.required' => "You can't add an empty comment !",
        ]);

        // // Vérifiez si l'utilisateur connecté est l'auteur du commentaire
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas modifier ce commentaire.');
        }

        $comment->update([
            'content' => $request->input('content'),
        ]);


        return redirect()->back()->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // // Vérifiez si l'utilisateur connecté est l'auteur du commentaire
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Comment delete successfully');
    }

    public function like($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->increment('likes');
        
        return redirect()->back()->with('success', 'Comment liked successfully!');
    }
    
}