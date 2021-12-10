<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    
    public function index()
    {
        $posts = Post::with('user', 'category')->latest()->paginate(10);
        
        return view('admin.index', [
            'posts' => $posts    
        ]);
    }
}
