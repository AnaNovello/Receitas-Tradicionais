<x-app-layout>
    <div class="w-full max-w-2xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Excluir Receitas</h1>
        
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
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Foto</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Status</b></th>
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
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    <form action="{{ route('admin.receitas.deletar', $receita->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>

<!-- Modal de confirmação para exclusão -->
<div id="confirmDeleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-xs w-full">
        <h3 class="text-xl font-bold mb-4">Confirmação</h3>
        <p class="mb-6">Tem certeza que deseja excluir esta receita?</p>
        <div class="flex justify-end space-x-4">
            <button onclick="closeConfirmModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                Cancelar
            </button>
            <button id="confirmDeleteButton" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                Excluir
            </button>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Seleciona todos os formulários de exclusão
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Impede a submissão imediata
                openConfirmModal(form);
            });
        });
    });

    function openConfirmModal(form) {
        const modal = document.getElementById('confirmDeleteModal');
        modal.classList.remove('hidden');
        
        // Define o comportamento do botão "Excluir" no modal
        const confirmButton = document.getElementById('confirmDeleteButton');
        // Remove qualquer event listener anterior
        confirmButton.onclick = function() {
            form.submit();  // Envia o formulário se confirmado
        }
    }

    function closeConfirmModal() {
        const modal = document.getElementById('confirmDeleteModal');
        modal.classList.add('hidden');
    }
</script>

