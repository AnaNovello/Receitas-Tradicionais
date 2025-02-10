@extends('layouts.main')

@section('title', 'Receitas')

@section('content')
<link rel = "stylesheet" type="text/css" href="./css/main.css">
texto
@foreach($receitas as $receita)    
    <p>{{$receita->nome}} ---- {{$receita->categoria}}</p>
@endforeach

@endsection