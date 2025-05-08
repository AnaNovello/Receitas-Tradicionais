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
    
    document.getElementById('modalNomeReceita').textContent = nome;
    document.getElementById('modalIdReceita').textContent = id;
    document.getElementById('modalIdAdmin').textContent = adminId;
    document.getElementById('modalCategoria').textContent = categoria;
    document.getElementById('modalDescricao').textContent = descricao;
    document.getElementById('modalIngredientes').textContent = ingredientes;
    document.getElementById('modalPreparo').textContent = preparo;
    document.getElementById('modalFoto').src = foto;
    
    document.getElementById('attachmentModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('attachmentModal').style.display = 'none';
}