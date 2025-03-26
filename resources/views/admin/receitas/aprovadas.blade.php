<link rel = "stylesheet" type="text/css" href="{{ asset('css/styles_admin_painelDeControle.css') }}">
@section('title', 'Receitas Aprovadas')
<x-app-layout>
    <div class="w-full max-w-2xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Receitas Aprovadas</h1>
        
        @if($receitas->isEmpty())
            <p class="text-center text-gray-600">Nenhuma receita aprovada encontrada.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Admin</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>ID Receita</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Receita</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Categoria</b></th>
                            <!-- <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Descrição</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Ingredientes</b></th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Preparo</b></th> -->
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300"><b>Foto</b></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($receitas as $receita)
                            <tr>
                                
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->admin_id ?? 'N/A' }}</td> 
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->id }}</td>   
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->nome }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->categoria }}</td>
                                <!-- <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->descricao }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->ingredientes }}</td>
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $receita->preparo }}</td> -->
                                <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                    @if($receita->foto)
                                        <a href="#" 
                                            data-id="{{ $receita->id }}"
                                            data-admin="{{ $receita->admin_id ?? 'N/A' }}"
                                            data-nome="{{ $receita->nome }}"
                                            data-categoria="{{ $receita->categoria }}"
                                            data-descricao="{{ $receita->descricao }}"
                                            data-ingredientes="{{ $receita->ingredientes }}"
                                            data-preparo="{{ $receita->preparo }}"
                                            data-foto="{{ asset('storage/' . $receita->foto) }}"
                                            onclick="openAttachmentModal(this); return false;">
                                            <img src="{{ asset('storage/' . $receita->foto) }}" alt="Foto da Receita" class="w-20 h-20 rounded-md object-cover">
                                        </a>
                                    @else
                                        [vazio]
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>


<!-- Modal para exibir os detalhes da receita -->
<div id="attachmentModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 999;">
    <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-3xl w-full relative">
        <button class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800" onclick="closeModal()">Fechar</button>
        <div class="modal-body">
            <h2 id="modalNomeReceita" class="text-2xl font-bold mb-4"></h2>
            <img id="modalFoto" class="w-full h-64 object-cover rounded-md mb-4" src="" alt="Foto da Receita">
            <p><strong>ID Receita:</strong> <span id="modalIdReceita"></span></p>
            <p><strong>ID Admin:</strong> <span id="modalIdAdmin"></span></p>
            <p><strong>Categoria:</strong> <span id="modalCategoria"></span></p>
            <p><strong>Descrição:</strong> <span id="modalDescricao"></span></p>
            <p><strong>Ingredientes:</strong> <span id="modalIngredientes"></span></p>
            <p><strong>Preparo:</strong> <span id="modalPreparo"></span></p>
        </div>
    </div>
</div>


<script>
    function openAttachmentModal(element) {
        // Obtém todos os dados da receita do atributo data-*
        const id = element.dataset.id;
        const adminId = element.dataset.admin;
        const nome = element.dataset.nome;
        const categoria = element.dataset.categoria;
        const descricao = element.dataset.descricao;
        const ingredientes = element.dataset.ingredientes;
        const preparo = element.dataset.preparo;
        const foto = element.dataset.foto;
        
        // Preenche os campos do modal com os dados da receita
        document.getElementById('modalNomeReceita').textContent = nome;
        document.getElementById('modalIdReceita').textContent = id;
        document.getElementById('modalIdAdmin').textContent = adminId;
        document.getElementById('modalCategoria').textContent = categoria;
        document.getElementById('modalDescricao').textContent = descricao;
        document.getElementById('modalIngredientes').textContent = ingredientes;
        document.getElementById('modalPreparo').textContent = preparo;
        document.getElementById('modalFoto').src = foto;
        
        // Exibe o modal
        document.getElementById('attachmentModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('attachmentModal').style.display = 'none';
        document.getElementById('attachmentFrame').src = '';
    }

</script>
