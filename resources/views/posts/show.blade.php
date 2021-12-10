@extends('layout')

@section('title', $post->title)

@section('content')

    <article>
        <header class="border-bottom py-2">
            <h1>{{ $post->title }}</h1>
            <small>Rédigé par {{ $post->user->name }} le {{ $post->created_at }}</small>
        </header>
        {!! nl2br(e($post->content)) !!}
    </article>
    
    <section>
        <h2>Espace commentaires</h2>
        
        <form action="{{ route('comments.store', ['id' => $post->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nickname">Pseudo</label>
                <input type="text" class="form-control" id="nickname" name="nickname">
            </div>
            <div class="form-group">
                <label for="content">Commentaire</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Ajouter</button>
            </div>
        </form>
        
        <ul class="list-unstyled">
            @foreach($comments as $comment)
                <li>
                    <article class="my-2">
                        <header class="border-bottom">
                            Rédigé par {{ $comment->nickname }} le {{ $comment->created_at }}
                        </header>
                        {!! nl2br(e($comment->content)) !!}
                    </article>
                </li>
            @endforeach
        </ul>
    </section>

@endsection