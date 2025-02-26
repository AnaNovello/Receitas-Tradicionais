<x-app-layout>
    <div class="w-full max-w-2xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Atualizar Receitas</h1>
        
        @if($receitas->isEmpty())
            <p class="text-center text-gray-600">Nenhuma receita encontrada.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Admin</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Receita</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Receita</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Categoria</b></th>
                            <th class="px-8 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Foto</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300 w-32"><b>Status</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Ações</b></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($receitas as $receita)
                            <tr>
                                
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->admin_id ?? 'N/A' }}</td> 
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->id }}</td>   
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->nome }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->categoria }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    @if($receita->foto)
                                        <img src="{{ asset('storage/' . $receita->foto) }}" alt="Foto da Receita" class="w-20 h-20 rounded-md object-cover">
                                    @else
                                        [vazio]
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm w-32">
                                    <select 
                                        class="border rounded-md px-2 pr-6 py-1 w-full 
                                            @if($receita->status === 'pendente')
                                                text-yellow-500
                                            @elseif($receita->status === 'aprovada')
                                                text-green-500
                                            @elseif($receita->status === 'rejeitada')
                                                text-red-500
                                            @else
                                                text-gray-900
                                            @endif"
                                        data-receita-id="{{ $receita->id }}" 
                                        onchange="confirmarAlteracaoStatus(this, this.dataset.receitaId)"
                                    >
                                        <option value="pendente" class="text-yellow-500" @if($receita->status === 'pendente') selected @endif>Pendente</option>
                                        <option value="aprovada" class="text-green-500" @if($receita->status === 'aprovada') selected @endif>Aprovada</option>
                                        <option value="rejeitada" class="text-red-500" @if($receita->status === 'rejeitada') selected @endif>Rejeitada</option>
                                    </select>
                                </td>

                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    <a href="{{ route('admin.receitas.editar', $receita->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded">
                                        Editar
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>


<!-- Modal de Confirmação -->
<div id="modalConfirmacao" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white rounded-lg p-6 w-96">
        <h2 class="text-xl font-bold mb-4">Confirmar Alteração</h2>
        <p class="mb-4">Tem certeza que deseja alterar o status desta receita?</p>
        <div class="flex justify-end">
            <button id="cancelButton" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-1 px-3 rounded mr-2">
                Cancelar
            </button>
            <form id="formAlterarStatus" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="novoStatus">
                <button 
                    type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded"
                >
                    Confirmar
                </button>
            </form>
        </div>
    </div>
</div>


<script>

    let previousStatus; // Variável para armazenar o valor anterior do select
    let currentSelect; // Armazena o select atual
    
    document.querySelectorAll('select').forEach(select => {
        select.addEventListener('focus', function () {
            previousStatus = this.value; // Armazena o valor antes da alteração
            currentSelect = this;
        });

        select.addEventListener('change', function () {
            confirmarAlteracaoStatus(this, this.dataset.receitaId);
        });
    });

    document.getElementById('cancelButton').addEventListener('click', function () {
        if (currentSelect) {
            currentSelect.value = previousStatus; // Restaura o valor anterior
        }
        fecharModal();
    });

    function confirmarAlteracaoStatus(selectElement, receitaId) {
        const novoStatus = selectElement.value;
        const modal = document.getElementById('modalConfirmacao');
        const form = document.getElementById('formAlterarStatus');
        const inputStatus = document.getElementById('novoStatus');

        inputStatus.value = novoStatus;
        form.action = `/admin/receitas/${receitaId}/atualizar-status`;

        modal.classList.remove('hidden');
    }


    function fecharModal() {
        document.getElementById('modalConfirmacao').classList.add('hidden');
    }

</script>