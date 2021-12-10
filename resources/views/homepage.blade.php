@extends('layout')

@section('title', 'Accueil')

@section('content')

    <h1 class="h3">Page d'accueil</h1>
    
    @include('partials.posts', ['posts' => $posts])
    
    <nav>
        <a href="{{ route('posts.index') }}">Voir tous les articles du blog</a>
    </nav>
    
@endsection