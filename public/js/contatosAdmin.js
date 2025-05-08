document.addEventListener('DOMContentLoaded', function () {
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

    const cancelButton = document.getElementById('cancelButton');
    if (cancelButton) {
        cancelButton.addEventListener('click', function () {
            if (currentSelect) {
                currentSelect.value = previousStatus; 
            }
            fecharModal();
        });
    }

    const confirmButton = document.getElementById('confirmButton');
    if (confirmButton) {
        confirmButton.addEventListener('click', function () {
            previousStatus = null;
        });
    }

    function confirmarAlteracaoStatus(selectElement, contatoId) {
        const novoStatus = selectElement.value;
        const modal = document.getElementById('modalConfirmacao');
        const form = document.getElementById('formAlterarStatus');
        const inputStatus = document.getElementById('novoStatus');

        inputStatus.value = novoStatus;
        form.action = `${baseStatusUpdateUrl}${contatoId}/atualizar-status`;

        modal.classList.remove('hidden');
    }

    function fecharModal() {
        document.getElementById('modalConfirmacao').classList.add('hidden');
    }

    window.openAttachmentModal = openAttachmentModal;
    window.closeModal = closeModal;
});
