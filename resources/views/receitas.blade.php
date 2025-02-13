@extends('layouts.main')

@section('title', 'Receitas')

@section('content')
<link rel = "stylesheet" type="text/css" href="./css/styles_tot_receitas.css">
<header class="header_receitas">
        <main class="receitas">
            <div class="header_3">
                <div class="lista_receitas">
                    <ul>
                        <li>
                            <a class="l_receita" href="classica.html" target="_self">Coq Au Vin</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Feijoada</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Macarrão à Carbonara</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Ratatouille</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Udon</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Kimchi</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Pastel de Nata</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Gaspacho</a>
                        </li>
                        <li>
                            <a class="l_receita" href="">Guacamole</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </header>

@endsection