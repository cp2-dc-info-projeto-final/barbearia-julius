<?php
session_start();
include 'conecta_mysqli.inc';

$operacao = $_POST["operacao"];
$erros = [];

if ($operacao == "cadastrar") {
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (empty($senha) || strlen($senha) < 8) {
        $erros[] = "Preencha sua senha com pelo menos 8 caracteres.";
    }

    if (empty($nome) || !preg_match('/\S+\s+\S+/', $nome)) {
        $erros[] = "Preencha seu nome completo.";
    }

    if (strlen($email) < 8 || strstr($email, "@") === FALSE) {
        $erros[] = "Favor, digitar o e-mail com pelo menos 8 caracteres.";
    }

    if (count($erros) > 0) {
        $_SESSION['cadastro_erros'] = $erros;
        header("Location: form_cadastro.php");
        exit();
    }

    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (senha, nome, email) VALUES ('$senha_cript', '$nome', '$email')";
    
    if(mysqli_query($mysqli, $sql)) {
        header("Location: form_login.php");
    } else {
        $_SESSION['cadastro_erro'] = "Erro ao cadastrar usuário. Tente novamente mais tarde.";
        header("Location: form_cadastro.php");
        exit();
    }
}

mysqli_close($mysqli);
?>
