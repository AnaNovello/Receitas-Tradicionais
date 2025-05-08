    // Captura o textarea e o contador de caracteres
    const descricaoField = document.getElementById('descricao');
    const charCount = document.getElementById('charCount');
    
    // atualiza o contador de caracteres
    descricaoField.addEventListener('input', function () {
        const currentLength = descricaoField.value.length;
        charCount.textContent = `${currentLength}/250`;
    });
