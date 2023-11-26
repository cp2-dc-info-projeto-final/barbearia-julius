// Obter o modal
var modal = document.getElementById("myModalii");

// Função para abrir o modal
function abrirModalCad() {
    document.getElementById('modalCad').style.display = 'block';
}

function fecharModalCad() {
    document.getElementById('modalCad').style.display = 'none';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
