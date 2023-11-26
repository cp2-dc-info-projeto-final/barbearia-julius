<?php
session_start();
// Verifica se a variável de sessão do tipo de usuário está definida como administrador
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    header("Location: form_login.php");
    exit; 
}
echo "Bem-vindo à área de administração!";
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adicionar Funcionário</title>
<link rel="stylesheet" href="../css/pop_up_fun.css">
</head>
<body>
<button onclick="abrirModal()">Abrir Modal</button> <!-- Botão para abrir o modal -->
<div id="myModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Adicionar Novo Funcionário</h2>
            <div id="mensagem"></div> <!-- Elemento para exibir a mensagem -->
            <form action="processa_novo_funcionario.php" method="POST">
            <label for="nome">Nome:</label>
              <input type="text" id="nome" name="nome" required><br><br>
              
              <label for="senha">Senha:</label>
              <input type="password" id="senha" name="senha" required><br><br>
              
              <label for="numero">Número:</label>
              <input type="text" id="numero" name="numero" required><br><br>
              
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required><br><br>
              
              <input type="submit" value="Adicionar Funcionário">
            </form>
        </div>
    </div>
<!-- Adicione este trecho abaixo do formulário de adição de funcionário -->
<h2>Excluir Funcionári</h2>
<div id="mensagemExclusao"></div>
<form id="formExclusao">
    <label for="idFuncionario">ID do Funcionário:</label>
    <input type="text" id="idFuncionario" name="id_funcionario" required><br><br>

    <button type="button" onclick="excluirFuncionario()">Excluir Funcionário</button>
</form>

<script>
function excluirFuncionario() {
    var idFuncionario = document.getElementById('idFuncionario').value;

    // Enviar requisição AJAX para o script de exclusão
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'exclui_funcionario.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var response = JSON.parse(xhr.responseText);
            var mensagemExclusao = document.getElementById('mensagemExclusao');
            if (response.success) {
                mensagemExclusao.innerHTML = response.message;
            } else {
                mensagemExclusao.innerHTML = 'Erro ao excluir funcionário';
            }
        }
    };
    xhr.send('id_funcionario=' + idFuncionario);
}
</script>

    <script src="../js/pop_up_fun.js"></script>

    <?php
    // Verifica se há um parâmetro 'success' na URL indicando o status do cadastro
    if (isset($_GET['success'])) {
        echo "<script>";
        echo "abrirModal();"; // Chama a função para abrir o pop-up

        if ($_GET['success'] == 1) {
            echo "document.getElementById('mensagem').innerHTML = 'Novo funcionário adicionado com sucesso!';";
        } else {
            echo "document.getElementById('mensagem').innerHTML = 'Erro ao adicionar funcionário';";
        }

        echo "</script>";
    }
    ?>
    
</body>
</html>
</body>
</html>
