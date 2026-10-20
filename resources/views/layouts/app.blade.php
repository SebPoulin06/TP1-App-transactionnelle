<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<header class="header">
    <nav class="navbar">
        <a href="/" class="logo">🧗 Climbly</a>

        <div class="nav-links">
            <a href="/">Accueil</a>
            <a href="/produits">Catalogue</a>
        </div>

        <div class="nav-auth">
            <a href="/login" class="btn-login">Connexion</a>
            <a href="/register" class="btn-register">Inscription</a>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="footer-content">
        <p>Application éducative - 2026 - Collège Ahuntsic</p>
    </div>
</footer>
</body>
</html>
