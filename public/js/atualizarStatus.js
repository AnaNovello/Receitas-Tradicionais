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