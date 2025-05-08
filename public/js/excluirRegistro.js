document.addEventListener("DOMContentLoaded", function() {
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
    
    const confirmButton = document.getElementById('confirmDeleteButton');
    // Remove qualquer event listener anterior
    confirmButton.onclick = function() {
        form.submit();
    }
}

function closeConfirmModal() {
    const modal = document.getElementById('confirmDeleteModal');
    modal.classList.add('hidden');
}