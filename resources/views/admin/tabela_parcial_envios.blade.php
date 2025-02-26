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
