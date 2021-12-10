<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        $posts = Post::with('user', 'category')->latest()->paginate(10);
        
        return view('posts.index', [
            'posts' => $posts    
        ]);
    }
    
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->oldest()->get();
        
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
    
    public function create()
    {
        $categories = Category::all();
        
        return view('posts.create', [
            'categories' => $categories    
        ]);
    }
    
    public function store(Request $request)
    {
        // Validation du formulaire
        $request->validate([
            'title' => 'required|min:3|unique:posts',
            'content' => 'required|min:5'
        ]);
        
        // Enregistrement de l'article (si la requête a été validée)
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->user_id = auth()->user()->id;
        
        // Ajoute l'article en base de données
        $post->save();
        
        return redirect()->route('homepage');
    }
    
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }
    
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'min:3|unique:posts',
            'content' => 'min:5'
        ]);
        
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        
        $post->save();
        
        return redirect()->route('admin.index');
    }
}
