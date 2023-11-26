// Obter o modal
var modal = document.getElementById("myModal");

// Função para abrir o modal
function abrirModal() {
    document.getElementById('myModal').style.display = 'block';
}

function fecharModal() {
    document.getElementById('myModal').style.display = 'none';
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}