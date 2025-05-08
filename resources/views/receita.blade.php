@extends('layouts.main')

@section('title', $receita->nome)

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_receita.css') }}">
    <div class="container mx-auto py-8">
        <div class="recipe-details">
            <div class="recipe-image">
                @if($receita->foto)
                    <img src="{{ asset('storage/' . $receita->foto) }}" alt="Foto da Receita h-300 w-300">
                @endif

                @if(Auth::check() && Auth::user()->usertype === 'user')
                    @if(in_array($receita->id, $receitasSalvas))
                        <form action="{{ route('receitas.excluir', $receita->id) }}" method="POST" class="save-recipe-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-receita-salva" 
                                    onmouseover="mudarTexto(this)" 
                                    onmouseout="voltarTexto(this)">
                                Receita Salva
                            </button>
                        </form>
                    @else
                        <form action="{{ route('receitas.salvar', $receita->id) }}" method="POST" class="save-recipe-form">
                            @csrf
                            <button type="submit" class="btn-salvar-receita">Salvar Receita</button>
                        </form>
                    @endif
                @endif

            </div>
            
            <div class="recipe-text">
                <h1>{{ $receita->nome }}</h1>
                <p><strong>Região:</strong> {{ $receita->categoria }}</p>
                <p><strong>Descrição:</strong> {{ $receita->descricao }}</p>
                <p><strong>Ingredientes:</strong></p>
                    <ul class="list-disc list-inside">
                        @foreach (explode('-', $receita->ingredientes) as $ingrediente)
                            @if (trim($ingrediente) !== '')
                                <li>{{ trim($ingrediente) }}</li>
                            @endif
                        @endforeach
                    </ul>
                <p><strong>Modo de Preparo:</strong> {{ $receita->preparo }}</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/receita_salva.js') }}"></script>
@endsection

