<?php
include "conecta_mysqli.inc";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta a tabela de administradores
$sql = "SELECT * FROM administradores WHERE email = '$email';";
$res = mysqli_query($mysqli, $sql);

// Se o email estiver na tabela de administradores
if (mysqli_num_rows($res) == 1) {
    $administrador = mysqli_fetch_array($res);

    // Verifica se a senha está correta para o administrador
    if (password_verify(trim($senha), $administrador["senha"])) {
        // Usuário autenticado como administrador
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        header("Location: adm_visu.php");
        exit;
    } else {
        $_SESSION['senha_invalida'] = "Senha incorreta!";
        header("Location: form_login.php");
        exit;
    }
}

// Se o email não pertencer a um administrador, consulte a tabela de usuários
$sql = "SELECT * FROM usuarios WHERE email = '$email';";
$res = mysqli_query($mysqli, $sql);

// Testa se não encontrou o email
if (mysqli_num_rows($res) != 1) {
    $_SESSION['erro_login'] = "E-mail não encontrado!";
    header("Location: form_login.php");
    exit;
} else {
    $usuario = mysqli_fetch_array($res);

    // Verifica se a senha está errada para o usuário comum
    if (!password_verify($senha, $usuario["senha"])) {
        $_SESSION['senha_invalida'] = "Senha incorreta!";
        header("Location: form_login.php");
        exit;
    } else {
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        // Direciona para a página inicial
        header("Location: agendamento.php");
        exit;
    }
}

mysqli_close($mysqli);
?>
