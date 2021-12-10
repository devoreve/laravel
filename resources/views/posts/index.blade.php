@extends('layout')

@section('title', 'Accueil')

@section('content')

    <h1 class="h3">Tous les articles du blog</h1>
    
    {{ $posts->links() }}
    
    @include('partials.posts', ['posts' => $posts])
    
@endsection