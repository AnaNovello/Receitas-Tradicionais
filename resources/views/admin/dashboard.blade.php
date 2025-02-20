<link rel = "stylesheet" type="text/css" href="./css/styles_admin_dashboard.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto de perfil" class="w-20 h-20 rounded-md object-cover">
                        @else
                            <img src="{{ asset('storage/profile_pictures/none.png') }}" alt="Foto de Perfil" class="w-20 h-20 rounded-md object-cover">
                        
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

                    <h2 class="text-2xl font-bold mb-4"> Gerenciar Receitas </h2>

                    <div class="flex space-x-4">
                        <a href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Adicionar Nova
                        </a>
                        <a href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Visualizar Aprovadas
                        </a>
                        <a href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Atualizar Existente
                        </a>
                        <a href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Excluir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-bold mb-4"> Status de Envios</h2>

                    <div class="flex space-x-4">
                        nome da receita | descrição | anexo | status | feedback
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-bold mb-4"> Pedidos de usuários </h2>

                    <div class="flex space-x-4">
                        id do solicitante | data de solicitação | título do envio | descrição | anexo
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Espaço extra na mesma cor de fundo (cinza) -->
    <div class="h-16 bg-gray-100"></div>

</x-app-layout>
