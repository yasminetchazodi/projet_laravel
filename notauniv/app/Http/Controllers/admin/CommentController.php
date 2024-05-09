<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexco()
    {
        $comments= Comment::all();
        return view('Comments.index', ['comments'=>$comments]);        //
    }

    /**
     * Show the form for creating a new resource.
     */
      
    /**
     * Store a newly created resource in storage.
     */
    public function storeco(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showco(string $id)
    {
        //
    }

  


    public function editco($commentId)
    {
        // Récupérer le commentaire à éditer depuis la base de données
        $comment = Comment::findOrFail($commentId);
    
        // Retourner la vue d'édition avec les données du commentaire
        return view('comments.edit', compact('comment'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function updateco(Request $request, $commentId)
{
    $request->validate([
        'content' => 'required|string',
    ]);

    $comment = Comment::findOrFail($commentId);
    $comment->content = $request->input('content');
    $comment->save();

    return redirect()->route('showun', $comment->university_id)->with('success', 'Comment updated successfully.');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroyco($commentId)
    {
        // Supprimer l'utilisateur de la base de données
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        // Rediriger avec un message de succès
        return redirect()->route('indexco')->with('success', 'commentaire  supprimé avec succès.');
    }
}
