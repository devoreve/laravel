@extends('layout')

@section('title', 'Administration')

@section('content')

    <h1>Administration</h1>
    
    <nav class="my-3">
        <a class="btn btn-primary" href="{{ route('posts.create') }}">Créer un nouvel article</a>
    </nav>
    
    {{ $posts->links() }}
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Auteur</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('posts.edit', ['id' => $post->id]) }}">Modifier</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection