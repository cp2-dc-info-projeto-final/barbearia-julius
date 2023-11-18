<?php
include 'autentica.inc';
session_start();

if (!isset($_GET['token'])) {
    header("Location: form_cadastro.php");
    exit();
}

$token_recebido = $_GET['token'];

// Verificar o token no banco de dados
include 'conecta_mysqli.inc';

$verifica_token = "SELECT * FROM usuarios WHERE token = '$token_recebido' AND confirmado = 0";
$resultado = mysqli_query($mysqli, $verifica_token);

if (mysqli_num_rows($resultado) > 0) {
    // Token válido, confirmar email
    $sql_confirm = "UPDATE usuarios SET confirmado = 1 WHERE token = '$token_recebido'";
    mysqli_query($mysqli, $sql_confirm);
    
    // Redirecionar para uma página informando que o email foi confirmado
    header("Location: form_login.php?token=$token_recebido");
    exit();
} else {
    // Token inválido
    header("Location: form_cadastro.php");
    exit();
}

mysqli_close($mysqli);
?>
