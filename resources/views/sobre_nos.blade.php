@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
    <link rel = "stylesheet" type="text/css" href="./Css/styles_sobre.css">
    <header class="header_ranking">
        <main class="ranking">
            <div class="header_3">
                <div class="maior_acesso">
                    <ul>
                        <li>
                            <b class="texto_rank" href="">Nossa História e Propósito</b>
                        </li>
                    </ul>
                </div>

                <div class="sobre_container">
                    <header class="apresentacao">
                        <p class="p_1">
                            A culinária brasileira é um reflexo da diversidade cultural do país, resultado da influência diversos 
                            povos que contribuíram para a formação da nossa identidade gastronômica. No entanto, com o tempo, muitas 
                            receitas acabam sendo esquecidas ou modificadas, perdendo parte de sua autenticidade. Foi pensando nisso que 
                            criamos o <b>Tradição Brasileira</b>, um espaço dedicado à preservação e divulgação dessas receitas, garantindo que
                            seu valor cultural e histórico seja mantido e compartilhado com as futuras gerações.
                        </p>

                        <p class="p_1">
                            Nosso objetivo é construir um acervo digital de receitas tradicionais brasileiras, permitindo que 
                            qualquer pessoa tenha acesso a pratos típicos de diferentes regiões do Brasil. Queremos não apenas 
                            compartilhar ingredientes e modos de preparo, mas também as histórias e significados por trás de cada 
                            receita, destacando sua importância na cultura local.
                        </p>

                    </header>
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

                <div class="maior_acesso">
                    <ul>
                        <li>
                            <b class="texto_rank" href="">O que você encontra aqui</b>
                        </li>
                    </ul>
                </div>

                <div class="maior_acesso">
                    <div class="sobre_lista">
                        
                        <p>
                            <span class="icone">🍽️</span>
                                <b>Receitas Autênticas: </b>
                                    <span class="texto">Pratos típicos de todas as regiões do Brasil, desde a feijoada até o tacacá.</span>
                        </p>
                        <p>
                            <span class="icone">📖</span>
                                <b>História e Contexto Cultural:</b>
                                    <span class="texto">Cada receita vem acompanhada de uma explicação sobre sua origem e influência histórica.</span>
                        </p>
                        <p>
                            <span class="icone">🤝</span>
                                <b>Participação da Comunidade: </b>
                                    <span class="texto">Acreditamos que a cultura gastronômica é viva e construída por muitas mãos. Por isso, incentivamos nossos usuários a contribuírem com receitas e histórias familiares.</span>
                        </p>
                    </div>
                </div>
            </div>
            <script src="./Js/slider_index.js" ></script>
        </main>
        
    </header>

@endsection