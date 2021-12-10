<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laravel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('homepage') }}">Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Accueil</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Administration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('logout') }}">Déconnexion</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('login') }}">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('register') }}">Inscription</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                @auth
                    <span class="navbar-text">Bonjour {{ auth()->user()->name }}</span>
                @endauth
            </div>
        </nav>
    </header>
    <main class="container my-3">
        @yield('content')
    </main>
    
    <footer>
        
    </footer>
</body>
</html>