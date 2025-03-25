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
                
                <!-- Filtro de ordenação alfabética -->
                <div class="filtro-alfabeto">
                    <span>Ordenar por:</span>
                    @foreach(range('A', 'Z') as $letra)
                        <a href="{{ route('receitas', ['search' => request('search'), 'letra' => $letra]) }}" 
                        class="letra-filtro {{ request('letra') == $letra ? 'active' : '' }}">
                            {{ $letra }}
                        </a>
                    @endforeach
                </div>
                <form action="{{ route('receitas') }}" method="GET" class="form_filtros">
                    <label for="categoria">Filtrar por categoria:</label>
                    <select name="categoria" id="categoria">
                        <option value="">Todas</option>
                        <option value="Norte" {{ request('categoria') == 'Norte' ? 'selected' : '' }}>Norte</option>
                        <option value="Nordeste" {{ request('categoria') == 'Nordeste' ? 'selected' : '' }}>Nordeste</option>
                        <option value="Centro Oeste" {{ request('categoria') == 'Centro Oeste' ? 'selected' : '' }}>Centro Oeste</option>
                        <option value="Sudeste" {{ request('categoria') == 'Sudeste' ? 'selected' : '' }}>Sudeste</option>
                        <option value="Sul" {{ request('categoria') == 'Sul' ? 'selected' : '' }}>Sul</option>
                    </select>

                    <button type="submit" class="btn_filtrar">Filtrar</button>
                </form>

                <div class="lista_receitas">
                    <ul>
                        @forelse ($receitas as $receita)
                            <li class="receita-item">
                                <a class="l_receita" href="{{ route('receitas.show', $receita->id) }}" target="_self">
                                    <span class="nome-receita">{{ $receita->nome }}</span>
                                </a>
                                @if($receita->foto)
                                    <img src="{{ asset('storage/' . $receita->foto) }}" alt="{{ $receita->nome }}" class="img-receita">
                                @else
                                    <img src="" alt="Imagem não disponível" class="img-receita">
                                @endif
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