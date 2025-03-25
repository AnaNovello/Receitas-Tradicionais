<link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_admin_dashboard.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-yellow-500">
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
                        <a id="c_admin" href="{{ route('admin.receitas.adicionar') }}" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Adicionar Nova
                        </a>
                        <a id="r_admin" href="{{ route('admin.receitas.aprovadas') }}" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Visualizar Aprovadas
                        </a>
                        <a id="u_admin" href="{{ route('admin.receitas.atualizar') }}" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Atualizar Existente
                        </a>
                        <a id="d_admin" href="{{ route('admin.receitas.excluir') }}" class="flex-1 aspect-square flex items-center justify-center font-bold rounded shadow">
                            Excluir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-2xl font-bold">Status de Envios</h2>

                        <!-- Filtro de Status -->
                        <div class="mb-4">
                            <label for="statusFilter" class="text-sm font-medium text-gray-700 dark:text-gray-300">Filtrar por:</label>
                            <select id="statusFilter" class="mt-2 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                                <option value="">Todos</option>
                                <option value="pendente">Pendente</option>
                                <option value="aprovada">Aprovada</option>
                                <option value="rejeitada">Rejeitada</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="tabela-envios">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Admin ID</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Nome da Receita</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Descrição</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Anexo</b></th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Status</b></th>
                                </tr>
                            </thead>
                            
                            <tbody id="table-container" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($receitas as $receita)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->admin_id ?? 'N/A' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->nome }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100 descricao" style="white-space: pre-wrap; overflow: hidden;">{{ $receita->descricao }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                            @if($receita->foto)
                                                <a href="#" data-attachment="{{ asset('storage/'.$receita->foto) }}" onclick="openAttachmentModal(this.dataset.attachment); return false;">Ver Anexo</a>
                                            @else
                                                [vazio]
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 text-sm 
                                            @if($receita->status === 'pendente')
                                                text-yellow-500
                                            @elseif($receita->status === 'aprovada')
                                                text-green-500
                                            @elseif($receita->status === 'rejeitada')
                                                text-red-500
                                            @else
                                                text-gray-900
                                            @endif">
                                            {{ ucfirst($receita->status) }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-sm text-gray-500 dark:text-gray-300">Nenhum envio encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody> 
                        </table>
                    </div>
                </div>             
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Pedidos Pendentes</h2>
                        <a href="{{ route('admin.contatos.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Gerenciar
                        </a>
                    </div>

                     <!-- Tabela de contatos -->
                    <div class="tabela-envios">
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
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100 descricao">{{ $contato->descricao }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                            @if ($contato->arquivo)                                    
                                            <a href="#" data-attachment="{{ asset('storage/'.$contato->arquivo) }}" onclick="openAttachmentModal(this.dataset.attachment); return false;">
                                                Ver Anexo
                                                <a class= "P-2 text-nowrap text-blue-600 hover:text-blue-800" href="{{ asset('storage/'.$contato->arquivo) }}" download>
                                                        <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M8 12l4 4m0 0l4-4m-4 4V4" />
                                                        </svg>  
                                                    </a>
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
<div id="attachmentModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 999;">
    <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-3xl w-full relative">
        <iframe id="attachmentFrame" src="" title="Anexo"></iframe>
        <button class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800" onclick="closeModal()">Fechar</button>
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

    document.querySelectorAll('.descricao').forEach(function(element) {
        let descricao = element.innerText;
        if (descricao.length > 120) {
            let breakPoint = descricao.substring(120).indexOf(' ');
            if (breakPoint !== -1) {
                let firstPart = descricao.substring(0, 120 + breakPoint);
                let secondPart = descricao.substring(120 + breakPoint + 1);
                element.innerHTML = firstPart + '<br>' + secondPart;
            }
        }
    });

    $(document).ready(function() {
        $('#statusFilter').change(function() {
            var status = $(this).val();

            $.ajax({
                url: '{{ route("admin.filterStatus") }}', // URL que vai chamar o método no Controller
                type: 'GET', // Tipo da requisição (GET)
                data: { status: status }, // Envia o status como parâmetro
                beforeSend: function(){
                    $('#table-container').empty();
                },
                success: function(response) {
                    if(status === ""){
                        location.reload();
                    }else{
                         // Se a requisição for bem-sucedida, atualiza a tabela com a nova view
                        $('#table-container').html(response); // Coloca o HTML da tabela dentro do elemento com id 'table-container'
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição AJAX:', error);
                }
            });
        });
    });

</script>
