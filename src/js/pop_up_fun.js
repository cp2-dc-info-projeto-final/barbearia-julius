// Obter o modal
var modal = document.getElementById("myModal");

// Função para abrir o modal
function abrirModal() {
  modal.style.display = "block";
}

// Função para fechar o modal quando clicar fora dele
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Função para fechar o modal clicando no "x"
function fecharModal() {
  modal.style.display = "none";
}