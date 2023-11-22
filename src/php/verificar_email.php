<?php
session_start();
include 'enviar.php';
include '../inc/conecta_mysqli.inc';

if (!empty($_GET['nome']) && !empty($_GET['email']) && !empty($_GET['senha']) && !empty($_GET['id'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuarios (senha, nome, email, id) VALUES ('$senha', '$nome', '$email', $id)";
    mysqli_query($mysqli, $sql);

    // Redireciona para uma página informando que o email foi confirmado ou para a área logada
    header("Location: login_confirmado.php");
    exit();
} else {
    // Se os parâmetros não estiverem completos, redireciona para uma página de erro
    header("Location: ../html/erro.html");
    exit();
}
?>

