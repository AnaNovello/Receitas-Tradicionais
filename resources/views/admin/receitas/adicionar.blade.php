@section('title', 'Adicionar Receita')
<x-app-layout>
    <div class="w-full max-w-2xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">
            {{ isset($receita) ? 'Editar Receita' : 'Adicionar Nova Receita' }}
        </h1>
        
        <form action="{{ isset($receita) ? route('admin.receitas.update', $receita->id) : route('admin.receitas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 space-y-6">
            @csrf
            @if(isset($receita))
                @method('PUT')
            @endif
            
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">Nome da Receita:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $receita->nome ?? '') }}" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            
            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 text-sm font-semibold mb-2">Categoria:</label>
                <select name="categoria" id="categoria" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat }}" {{ (old('categoria', $receita->categoria ?? '') == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 text-sm font-semibold mb-2">Descrição:</label>
                <textarea id="descricao" name="descricao"  maxlength="250" rows="4" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('descricao', $receita->descricao ?? '') }}</textarea>
                <div id="charCount" style="opacity: 60%; text-align: right">0/250</div>
            </div>
            
            <div class="mb-4">
                <label for="ingredientes" class="block text-gray-700 text-sm font-bold mb-2">Ingredientes:</label>
                <textarea name="ingredientes" id="ingredientes" rows="5" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('ingredientes', $receita->ingredientes ?? '') }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="preparo" class="block text-gray-700 text-sm font-bold mb-2">Modo de Preparo:</label>
                <textarea name="preparo" id="preparo" rows="5" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('preparo', $receita->preparo ?? '') }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="foto" class="block text-gray-700 text-sm font-semibold mb-2">Foto:</label>
                <input type="file" id="foto" name="foto" class="shadow-sm appearance-none border border-gray-300 rounded-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" accept="image/*" {{ isset($receita) ? '' : 'required' }}>
                @if(isset($receita) && $receita->foto)
                    <img src="{{ asset('storage/' . $receita->foto) }}" alt="Foto da Receita" class="w-20 h-20 rounded-md object-cover mt-2">
                @endif
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline">
                    {{ isset($receita) ? 'Atualizar Receita' : 'Adicionar Receita' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    // Captura o textarea e o contador de caracteres
    const descricaoField = document.getElementById('descricao');
    const charCount = document.getElementById('charCount');
    
    // Função para atualizar o contador de caracteres
    descricaoField.addEventListener('input', function () {
        const currentLength = descricaoField.value.length;
        charCount.textContent = `${currentLength}/250`;
    });
</script>
