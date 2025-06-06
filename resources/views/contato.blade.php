@extends('layouts.main')

@section('title', 'Entre em Contato')

@section('content')
    <link rel = "stylesheet" type="text/css" href="./Css/styles_contato.css">
    
    <header class="header_ranking">
        <main class="ranking">
            <div class="header_3">
                <div class="maior_acesso">
                    <ul>
                        <li>
                            <b class="texto_rank" href="">Entre em contato conosco!</b>
                        </li>
                    </ul>
                </div>

                <div class="sobre_container">
                    <header class="apresentacao">
                        <p class="p_1">
                            Queremos que você se sinta parte desta comunidade apaixonada pela culinária brasileira. Por isso criamos 
                            este espaço exclusivamente para você! Se você tem uma receita especial que merece ser compartilhada, encontrou 
                            algo que não está funcionando bem no site ou até mesmo tem vontade de contribuir mais de perto com o nosso projeto, 
                            estamos aqui para ouvir você. 
                            
                        </p>
                        <p class="p_1">
                            Nosso objetivo é construir um acervo rico e colaborativo, preservando as histórias e sabores que fazem 
                            parte da nossa cultura. Cada sugestão, cada mensagem e cada contribuição fazem toda a diferença para tornar 
                            este espaço ainda mais especial. Então, não hesite! Preencha o formulário abaixo e nos conte como podemos 
                            ajudar. Vamos adorar receber sua mensagem e responder o mais rápido possível! 
                        </p>
                    </header>
                </div> 

                <div class="form-container">
                    <form action="{{ route('contato.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="motivo">Motivo do Contato</label>
                            <select id="motivo" name="motivo">
                                <option value="">Selecione um item...</option>
                                <option value="sugestao">Enviar Sugestão de Receita</option>
                                <option value="problema">Reportar Problema no Site</option>
                                <option value="equipe">Fazer Parte da Equipe</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="arquivo">Anexar Arquivo</label>
                            <input type="file" id="arquivo" name="arquivo" accept=".jpg, .jpeg, .png, .pdf">
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" maxlength="250" placeholder="Digite aqui..."></textarea>
                            <div id="charCount" style="opacity: 60%; text-align: right">0/250</div>
                        </div>
                        @auth
                            <div class="form-group-button"> 
                                <button type="submit">Enviar</button>
                            </div>
                        @endauth
                            
                        @guest
                            <p class="login-warn" >Você deve estar <a href="{{ route('login') }}">logado</a> para enviar um formulário!</p>
                        @endguest
                    </form>
                </div>
                
            </div>
        </main>
        <script src="{{ asset('js/contador_caracter.js') }}"></script>
    </header>

@endsection
