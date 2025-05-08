
function mudarTexto(element) {
    element.innerText = "Excluir da Coleção";
    element.classList.add("hover-excluir");
}

function voltarTexto(element) {
    element.innerText = "Receita Salva";
    element.classList.remove("hover-excluir");
}

window.mudarTexto = mudarTexto;
window.voltarTexto = voltarTexto;