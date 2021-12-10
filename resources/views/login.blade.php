@extends('layout')

@section('title', 'Connexion')

@section('content')
    
    <h1>Page de connexion</h1>
        
    <form method="post" action="{{ route('signin') }}">
        @if($errors->any())
            <aside class="alert alert-danger">
                {{ $errors->first() }}
            </aside>
        @endif
        @csrf
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="name" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">Se connecter</button>
        </div>
    </form>

@endsection