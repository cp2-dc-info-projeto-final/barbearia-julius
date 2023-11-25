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

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="fecharModal()">&times;</span>
    <h2>Adicionar Novo Funcionário</h2>
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

<button onclick="abrirModal()">Adicionar Funcionário</button>
<script src="../js/pop_up_fun.js"></script>
</body>
</html>