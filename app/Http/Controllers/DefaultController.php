<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DefaultController extends Controller
{
    public function home()
    {
        $posts = Post::with('user', 'category')->take(5)->latest()->get();
        
        return view('homepage', [
            'posts' => $posts    
        ]);
    }
}