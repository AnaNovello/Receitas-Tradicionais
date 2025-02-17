@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
<link rel = "stylesheet" type="text/css" href="./Css/styles_categorias.css">
<header class="header_categorias">
        <main class="categorias">
            <div class="header_3">
                <div class="search-container">
                    <input type="text" id="search" placeholder="Buscar" onkeyup="filtrarReceitas()">
                </div>
                
                <div class="maior_acesso">
                    <ul>
                        <li>
                            <a class="l_categorias" href="classica.html" target="_self">Clássica</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Brasileira</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Italiana</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Francesa</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Japonesa</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Coreana</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Portuguesa</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Espanhola</a>
                        </li>
                        <li>
                            <a class="l_categorias" href="">Mexicana</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </header>
    
@endsection