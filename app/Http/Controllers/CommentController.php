<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, int $id)
    {
        // Récupération de l'article courant (sur lequel on veut ajouter le commentaire)
        $post = Post::findOrFail($id);
        
        // Tu renseignes les informations du commentaire (qui viennent du formulaire)
        $comment = new Comment();
        $comment->nickname = $request->input('nickname');
        $comment->content = $request->input('content');
        
        // On ajoute le commentaire à l'article récupéré ci-dessus
        $post->comments()->save($comment);
        
        // Redirection vers la page de l'article
        return redirect()->route('posts.show', ['id' => $id]);
    }
}
