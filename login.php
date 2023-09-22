<?php 
include "conecta_mysqli.inc";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE email = '$email';";
$res = mysqli_query($mysqli,$sql);

/* Testa se não encontrou o email */
if (mysqli_num_rows($res) != 1){
    echo "Usuário inválido!";
    echo "<p><a href='login.php'>Página de login</a></p>";
}
else {
    $usuario = mysqli_fetch_array($res);

    /* Testa se a senha está errada */
    if (!password_verify($senha, $usuario["senha"])){
        $_SESSION['senha_invalida'] = "Senha inválida!";
        header("Location: form_login.php");
    }
    /* Usuário e senha corretos, abre a sessão e registra as variáveis */
    else{
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $usuario["senha"];
        // direciona para a página inicial
        header("Location: form_cadastro.php");
    }
}
mysqli_close($mysqli);
?>