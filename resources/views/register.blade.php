@extends('layout')

@section('title', 'Inscription')

@section('content')
    
    <h1>Page d'inscription</h1>
        
    <form method="post" action="{{ route('signup') }}">
        @if($errors->any())
            <aside class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </aside>
        @endif
        @csrf
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">S'inscrire</button>
        </div>
    </form>

@endsection