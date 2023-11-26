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
<button onclick="abrirModal()">Cadastrar funcionário</button> <!-- Botão para abrir o modal -->
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
<button onclick="abrirModalExclusao()">Abrir Modal de Exclusão</button>

<div id="modalExclusao" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="fecharModalExclusao()">&times;</span>
        <h2>Excluir Funcionário</h2>
        <div id="mensagemExclusao"></div>
        <form id="formExclusao">
            <label for="idFuncionario">ID do Funcionário:</label>
            <input type="text" id="idFuncionario" name="id_funcionario" required><br><br>

            <button type="button" onclick="excluirFuncionario()">Excluir Funcionário</button>
        </form>
    </div>
</div>
<button onclick="abrirModalCad()">Cadastrar serviço</button> <!-- Botão para abrir o modal -->
<div id="modalCad" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="fecharModalCad()">&times;</span>
            <h2>Adicionar Novo serviço</h2>
            <div id="mensagem"></div> <!-- Elemento para exibir a mensagem -->
            <form action="processa_novo_servico.php" method="POST">
            <label for="descricao">descricao:</label>
              <input type="text" id="descricao" name="descricao" required><br><br>
              
              <label for="preco">preco:</label>
              <input type="text" id="preco" name="preco" required><br><br>
              <input type="submit" value="Adicionar servico">
              </form>
        </div>
    </div>

<!-- Adicione este trecho abaixo do formulário de adição de funcionário -->
<button onclick="abrirModalExclusaoS()">Abrir Modal de Exclusão</button>

<div id="modalExclusaoS" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="fecharModalExclusaoS()">&times;</span>
        <h2>Excluir Funcionário</h2>
        <div id="mensagemExclusaoS"></div>
        <form id="formExclusaoS">
            <label for="idServico">ID do serviço:</label>
            <input type="text" id="idServico" name="id_servico" required><br><br>
            <button type="button" onclick="excluirServico()">Excluir Serviço</button>
        </form>
    </div>
</div>

<script>
function excluirServico() {
    var idServico = document.getElementById('idServico').value;

    // Enviar requisição AJAX para o script de exclusão
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'exclui_servico.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var response = JSON.parse(xhr.responseText);
            var mensagemExclusaoS = document.getElementById('mensagemExclusaoS');
            if (response.success) {
                mensagemExclusaoS.innerHTML = response.message;
            } else {
                mensagemExclusaoS.innerHTML = 'Erro ao excluir serviço';
            }
        }
    };
    xhr.send('id_servico=' + idServico);
}
</script>

<!-- Restante do seu código permanece o mesmo -->


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

    <script src="../js/pop_up_ex.js"></script>
    <script src="../js/pop_up_fun.js"></script>
    <script src="../js/pop_up_cad.js"></script>
    <script src="../js/pop_up_ex_servico.js"></script>

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
