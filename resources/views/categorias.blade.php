@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
    
    <link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_categorias.css') }}">
    <header class="header_categorias">
        <main class="categorias">
            <div class="header_3">
                <div class="search-container">
                    <input type="text" id="search" placeholder="Buscar" onkeyup="filtrarReceitas()">
                </div>
                
                <div class="slider_m_acesso">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <input type="radio" name="radio-btn" id="radio5">

                        <div class="slide first">
                            <img src="/img/categorias/Brasileira.png" alt="img" />
                        </div>

                        <div class="slide">
                            <img src="/img/categorias/Italiana.png" alt="img" />
                        </div>

                        <div class="slide">
                            <img src="/img/categorias/Francesa.png" alt="img" />
                        </div>

                        <div class="slide">
                            <img src="/img/categorias/Japonesa.png" alt="img" />
                        </div>

                        <div class="slide">
                            <img src="/img/categorias/Coreana.png" alt="img" />
                        </div>

                        <div class="nav_auto">
                            <div class="auto_btn1"></div>
                            <div class="auto_btn2"></div>
                            <div class="auto_btn3"></div>
                            <div class="auto_btn4"></div>
                            <div class="auto_btn5"></div>
                        </div>
                    </div>

                    <div class="nav_manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                        <label for="radio5" class="manual-btn"></label>
                    </div>

                </div>
            </div>
            <script src=" {{ asset('js/slider_index.js') }}" ></script>
        </main>
    </header>
    
@endsection