<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>@yield('title')</title>
    </head>

    <body class="flex flex-col min-h-screen justify-start">
        <header class="menu_principal">
            <div class="header_inicial">
                <div class="logo">
                    <img src="/img/logo_v2.png" width="140" height="140" alt="Logo">
                </div>
            </div>
        </header>
        
        <main class="col_100 menu_urls">
            <div class="header_2">
                <div class="menu">
                    <ul>
                        <li>
                            <a class="menu_inicio" href="{{ route('inicial')  }}" target="_self">Início</a>
                        </li>

                        <li>
                            <a class="menu_tot_receitas" href="{{ route('receitas')  }}" target="_self">Todas as receitas</a>
                        </li>
                        
                        <li>
                            <a class="menu_categorias" href="{{ route('categorias') }}" target="_self">Regiões</a>
                        </li>
                        
                        <li>
                            <a class="menu_sobre" href="{{ route('sobre_nos') }}" target="_self">Sobre nós</a>
                        </li>
                        
                        <li>
                            <a class="menu_contato" href="{{ route('contato') }}" target="_self">Contate-nos</a>
                        </li>
                    </ul>
                </div>

                @if (Route::has('login'))
                    <div class="login">
                        @auth
                            <a href="{{ url('/painelDeControle') }}">{{ Auth::user()->name }}</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrar</a>
                            @endif
                        @endauth
                    </div>
                @endif
                
            </div>
        </main>
        
        <main class="flex-1">
            <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

            @yield('content')
        </main>

        <!-- CSS do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <footer class="rodape">
            <div class="rodape_conteudo">
                <p>Tradição Brasileira &copy; 2025. Todos os direitos reservados.</p>
                <p>Contato: contato@tradicaobrasileira.com.br</p>
            </div>
        </footer>

    </body>
</html>