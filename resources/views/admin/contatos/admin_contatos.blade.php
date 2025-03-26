<link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_admin_painelDeControle.css') }}">
<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Gerenciar Pedidos</h1>

         <form method="GET" action="{{ route('admin.contatos.index') }}" class="mb-4">
            <label for="status" class="mr-2 font-bold">Filtrar por Status:</label>
            <select name="status" id="status" class="border rounded-md px-2 pr-6 py-1" onchange="this.form.submit()">
                <option value="todos" {{ request('status') === null ? 'selected' : '' }}>Todos</option>
                <option value="pendente" {{ request('status') === 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="aprovada" {{ request('status') === 'aprovada' ? 'selected' : '' }}>Aprovada</option>
                <option value="rejeitada" {{ request('status') === 'rejeitada' ? 'selected' : '' }}>Rejeitada</option>
            </select>
        </form>

        @if($contatos->isEmpty())
            <p class="text-center text-gray-600">Nenhum contato encontrado.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" style="table-layout: fixed;">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Solicitante</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Data de Solicitação</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Tipo do Envio</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Descrição</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Anexo</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Status</b></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($contatos as $contato)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->user_id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $contato->tipo }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100 descricao whitespace-normal break-words text-left">
                                    {{ $contato->descricao }}
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    @if ($contato->arquivo)
                                        <a class="text-nowrap" href="#" data-attachment="{{ asset('storage/'.$contato->arquivo) }}" onclick="openAttachmentModal(this.dataset.attachment); return false;">
                                            Ver Anexo
                                        </a>
                                    @else
                                        [vazio]
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm w-32 
                                    @if($contato->status === 'pendente')
                                        text-yellow-500
                                    @elseif($contato->status === 'aprovada')
                                        text-green-500
                                    @elseif($contato->status === 'rejeitada')
                                        text-red-500
                                    @else
                                        text-gray-900
                                    @endif">
                                    <select 
                                        class="border rounded-md px-2 pr-6 py-1 w-full"
                                        data-contato-id="{{ $contato->id }}" 
                                        onchange="confirmarAlteracaoStatus(this, '{{ $contato->id }}')">
                                        <option value="pendente" class="text-yellow-500" {{ $contato->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="aprovada" class="text-green-500" {{ $contato->status == 'aprovada' ? 'selected' : '' }}>Aprovada</option>
                                        <option value="rejeitada" class="text-red-500" {{ $contato->status == 'rejeitada' ? 'selected' : '' }}>Rejeitada</option>
                                    </select>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-sm text-gray-500 dark:text-gray-300">Nenhum pedido encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>

<!-- Modal para exibir o anexo -->
<div id="attachmentModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 999;">
    <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-3xl w-full relative">
        <iframe id="attachmentFrame" src="" title="Anexo"></iframe>
        <button class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800" onclick="closeModal()">Fechar</button>
    </div>
</div>


<!-- Modal de confirmação para alteração de status -->
<div id="modalConfirmacao" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg p-6 w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Alteração</h2>
        <p class="mb-4">Tem certeza que deseja alterar o status deste pedido?</p>
        <div class="flex justify-end space-x-2">
            <button id="cancelButton" class="bg-red-500 hover:bg-red-600 text-white font-bold h-10 px-4 rounded">
                Cancelar
            </button>
            <form id="formAlterarStatus" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="novoStatus">
                <button id="confirmButton" class="bg-green-500 hover:bg-green-600 text-white font-bold h-10 px-4 rounded">
                    Confirmar
                </button>
            </form>
        </div>
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

    let previousStatus; 
    let currentSelect; 

    document.querySelectorAll('select[data-contato-id]').forEach(select => {
        select.addEventListener('focus', function () {
            previousStatus = this.value; 
            currentSelect = this;
        });

        select.addEventListener('change', function () {
            confirmarAlteracaoStatus(this, this.dataset.contatoId);
        });
    });


    document.getElementById('cancelButton').addEventListener('click', function () {
        if (currentSelect) {
            currentSelect.value = previousStatus; 
        }
        fecharModal();
    });

    document.getElementById('confirmButton').addEventListener('click', function () {
        previousStatus = null;
    });


    function confirmarAlteracaoStatus(selectElement, contatoId) {
        const novoStatus = selectElement.value;
        const modal = document.getElementById('modalConfirmacao');
        const form = document.getElementById('formAlterarStatus');
        const inputStatus = document.getElementById('novoStatus');

        inputStatus.value = novoStatus;
        form.action = `/admin/contatos/${contatoId}/atualizar-status`;

        modal.classList.remove('hidden');
    }

    function fecharModal() {
        document.getElementById('modalConfirmacao').classList.add('hidden');
    }

</script>
