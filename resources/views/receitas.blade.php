@extends('layouts.main')

@section('title', 'Receitas')

@section('content')

    <link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_tot_receitas.css') }}">
    <header class="header_receitas">
        <div class="receitas">
            <div class="header_3">
            
                <!-- Campo de Busca -->
                <form action="{{ route('receitas') }}" method="GET" class="form_busca">
                    <input type="text" name="search" placeholder="Buscar receita..." value="{{ request('search') }}" class="input_busca">
                    <button type="submit" class="btn_busca">Buscar</button>
                </form>

                <div class="lista_receitas">
                    <ul>
                        @forelse ($receitas as $receita)
                            <li>
                                <a class="l_receita" href="{{ route('receitas.show', $receita->id) }}" target="_self">
                                    {{ $receita->nome }}
                                </a>
                            </li>
                        @empty
                            <li>Nenhuma receita encontrada.</li>
                        @endforelse
                    </ul>
                </div>
                <!-- paginação bootstrap-->
                <div class="paginacao">
                    {{ $receitas->links('pagination::bootstrap-4') }}
                </div>
            </div>
            

        </div>
    </header>

@endsection