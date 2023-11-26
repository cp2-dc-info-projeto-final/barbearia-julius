// Obter o modal
var modal = document.getElementById("myModals");

// Função para abrir o modal
function abrirModalExclusaoS() {
    document.getElementById('modalExclusaoS').style.display = 'block';
}

function fecharModalExclusaoS() {
    document.getElementById('modalExclusaoS').style.display = 'none';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
