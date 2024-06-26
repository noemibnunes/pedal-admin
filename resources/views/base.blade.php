<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedal - Admin</title>
    
    <link rel="icon" href="{{ asset('img/icones/ic.svg') }}" type="image/svg+xml">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
        <?php if(auth()->check()): ?>
            <header>
                <nav>
                    <ul>
                        <li><a href="{{ route('logout') }}">Sair</a></li>
                    </ul>
                </nav>
            </header>
        <?php endif; ?>



    @yield('content')

    <footer class="footer">
        <p>Pedal © Alguns direitos reservados.</p>
    </footer>

    <script src="{{ asset('js/plugins/simple-anime.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

