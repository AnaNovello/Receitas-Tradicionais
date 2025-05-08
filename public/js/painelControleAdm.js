function openAttachmentModal(url) {
    document.getElementById('attachmentFrame').src = url;
    document.getElementById('attachmentModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('attachmentModal').style.display = 'none';
    document.getElementById('attachmentFrame').src = '';
}

document.querySelectorAll('.descricao').forEach(function(element) {
    let descricao = element.innerText;
    if (descricao.length > 120) {
        let breakPoint = descricao.substring(120).indexOf(' ');
        if (breakPoint !== -1) {
            let firstPart = descricao.substring(0, 120 + breakPoint);
            let secondPart = descricao.substring(120 + breakPoint + 1);
            element.innerHTML = firstPart + '<br>' + secondPart;
        }
    }
});

$(document).ready(function() {
    $('#statusFilter').change(function() {
        var status = $(this).val();

        $.ajax({
            url: filterStatusUrl, 
            type: 'GET',
            data: { status: status }, // Envia o status como parâmetro
            beforeSend: function(){
                $('#table-container').empty();
            },
            success: function(response) {
                if(status === ""){
                    location.reload();
                }else{
                    $('#table-container').html(response); // Coloca o HTML da tabela dentro do elemento com id 'table-container'
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição AJAX:', error);
            }
        });
    });
});