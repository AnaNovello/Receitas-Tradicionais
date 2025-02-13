<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type="text/css" href="./css/main.css">
    <link rel = "stylesheet" type="text/css" href="./css/app.css">
    <title>@yield('title')</title>
</head>

<body>
    <header class = "menu_principal">
        <main>
            <div class = "header_inicial">
                <div class = "logo">
                    <img src = "/img/logo_v2.png"
                    width="140"
                    height="140" />  
                </div>
                <!-- <div class = "logo">
                    <img src = "/img/teste_nome_logo.png"
                    width="155"/>  
                </div> -->
            </div>
        </main>
    </header>
    <main class="col_100 menu_urls">
        <div class="header_2">
            <div class="menu">
                <ul>
                    <li>
                        <a class="menu_inicio" href="{{ route('home')  }}" target="_self">Início</a>
                    </li>

                    <li>
                        <a class="menu_tot_receitas" href="{{ route('receitas')  }}" target="_self">Todas as receitas</a>
                    </li>
                    
                    <li>
                        <a class="menu_categorias" href="" target="_self">Categorias</a>
                    </li>
                    
                    <li>
                        <a class="menu_sobre" href="" target="_self">Sobre nós</a>
                    </li>
                    
                    <li>
                        <a class="menu_contato" href="" target="_self">Contate-nos</a>
                    </li>
                </ul>
            </div>

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif


            <!-- <div class="busca">
                <input placeholder="Procure uma receita!" type="text"/>
            </div> -->
            
        </div>
    </main>
    
    @yield('content')

    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <footer class="rodape">
        <div class="rodape_conteudo">
            <p>Tradição Brasileira &copy; 2025. Todos os direitos reservados.</p>
            <p>Contato: contato@receitasculturais.com</p>
        </div>
    </footer>

</body>
</html>