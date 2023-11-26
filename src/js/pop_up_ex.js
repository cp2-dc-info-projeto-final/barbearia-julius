// Obter o modal
var modal = document.getElementById("myModali");

// Função para abrir o modal
function abrirModalExclusao() {
    document.getElementById('modalExclusao').style.display = 'block';
}

function fecharModalExclusao() {
    document.getElementById('modalExclusao').style.display = 'none';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
