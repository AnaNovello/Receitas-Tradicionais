@extends('layouts.main')

@section('title', 'Tradição Brasileira')

@section('content')
    <header class="header_ranking">
        <main class="ranking">
            <div class="header_3">
                <div class="maior_acesso">
                    <ul>
                        <li>
                            <b class="texto_rank" href="">Navegue pelas regiões</b>
                        </li>
                    </ul>
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
                            <b class="texto_rank" href="">Sobre o Projeto</b>
                        </li>
                    </ul>

                    <div class="sobre_container">
                        <header class="apresentacao">
                            <p class="p_1">
                            O <b>Tradição Brasileira</b> surgiu como uma proposta de servir como acervo digital para receitas culturais e tradicionais brasileiras. O objetivo da plataforma é manter a integridade cultural das receitas e que, do mesmo modo, facilite o acesso ao conhecimento de forma concentrada e confiável. Todas as receitas presentes no site foram minuciosamente avaliadas e aprovadas por nossa equipe através de pesquisas detalhadas e apuradas, visando fornecer a maior integridade as raízes culinárias.
                            </p>
                            
                        </header>
                    </div> 
                </div>
            </div>
            <script src="./Js/slider_index.js" ></script>
        </main>
        
    </header>

@endsection