@section('title', 'Perfil')

<link rel="stylesheet" href="{{ asset('css/styles_user_painelDeControle.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bem-vindo(a), ')}} {{ $user->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto de perfil" class="w-20 h-20 rounded-md object-cover">
                        @else
                            <img src="{{ asset('storage/profile_pictures/none.png') }}" alt="Foto de Perfil" class="w-20 h-20 rounded-md">
                        
                        @endif
                    </div>

                    <h2 class="text-2xl font-bold mb-4">{{ $user->name }}</h2>

                    <div class="mb-4">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-4">
                        <strong>Membro desde:</strong> {{ $user->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Coleções</h2>
                    <div class="flex flex-wrap gap-4 justify-left">
                        @if ($receitasSalvas->isEmpty())
                            <p>Você ainda não salvou nenhuma receita.</p>
                        @else
                            <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-6 gap-4">
                                @foreach ($receitasSalvas as $receita)
                                    <div class="card-receita-salva">
                                        @if($receita->foto)
                                            <img src="{{ asset('storage/' . $receita->foto) }}" alt="{{ $receita->titulo }}" class="img-receita-salva">
                                        @else
                                            <img src="" alt="Receita sem Foto" class="w-full h-40 object-cover rounded-md mb-2">
                                        @endif

                                        <h3 class="titulo-receita-salva">{{ $receita->titulo }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $receita->descricao }}</p>
                                        <a href="{{ route('receitas.show', $receita->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">Ver Receita</a>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
