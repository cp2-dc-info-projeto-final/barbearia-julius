<?php
include 'enviar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Código de Autenticação</title>
</head>
<body>
    <h2>Insira o Código de Autenticação</h2>
    <form action="verificar_codigo_autenticacao.php" method="post">
        <input type="text" name="codigo_autenticacao" placeholder="Código de Autenticação" required>
        <input type="submit" value="Verificar Código">
    </form>
</body>
</html>
