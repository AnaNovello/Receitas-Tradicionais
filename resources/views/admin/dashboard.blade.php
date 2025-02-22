<link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_admin_dashboard.css') }}">

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
                        <a id="c_admin" href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Adicionar Nova
                        </a>
                        <a id="r_admin" href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Visualizar Aprovadas
                        </a>
                        <a id="u_admin" href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Atualizar Existente
                        </a>
                        <a id="d_admin" href="" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
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

                     <!-- Tabela de contatos -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Solicitante</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Data de Solicitação</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Tipo do Envio</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Descrição</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Anexo</b></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($contatos as $contato)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->user_id }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->created_at->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->tipo }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->descricao }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                            @if ($contato->arquivo)                                    
                                            <a href="#" data-attachment="{{ asset('storage/'.$contato->arquivo) }}" onclick="openAttachmentModal(this.dataset.attachment); return false;">
                                                Ver Anexo
                                            </a>

                                            @else
                                                [vazio]
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-sm text-gray-500 dark:text-gray-300">Nenhum pedido encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Espaço extra na mesma cor de fundo (cinza) -->
    <div class="h-16 bg-gray-100"></div>

</x-app-layout>

<!-- Modal para exibir o anexo -->
<div id="attachmentModal" style="display: none;">
    <div class="modal-content">
        <iframe id="attachmentFrame" src="" title="Anexo"></iframe>
        <button onclick="closeModal()">Fechar</button>
    </div>
</div>

<script>
    function openAttachmentModal(url) {
        document.getElementById('attachmentFrame').src = url;
        document.getElementById('attachmentModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('attachmentModal').style.display = 'none';
        document.getElementById('attachmentFrame').src = '';
    }
</script>
