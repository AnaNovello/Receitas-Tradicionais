let count = 1;
document.getElementById("radio1").checked = true;

let intervalo = setInterval(nextImage, 6000);

function nextImage(){
  count++;
  if (count > 5){
    count = 1;
  }
  document.getElementById("radio" + count).checked = true;
}

// Função para atualizar o contador quando um rádio é clicado manualmente
function updateCount(manualCount) {
  count = manualCount;
  clearInterval(intervalo);
  intervalo = setInterval(nextImage, 6000);
}

// Adicionando o evento de clique para cada botão de rádio
document.getElementById("radio1").onclick = function() { updateCount(1); }
document.getElementById("radio2").onclick = function() { updateCount(2); }
document.getElementById("radio3").onclick = function() { updateCount(3); }
document.getElementById("radio4").onclick = function() { updateCount(4); }
document.getElementById("radio5").onclick = function() { updateCount(5); }