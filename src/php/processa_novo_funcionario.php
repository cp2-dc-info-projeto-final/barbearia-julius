<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];

    $sql = "INSERT INTO funcionarios (nome, senha, numero, email) VALUES ('$nome', '$senha', '$numero', '$email')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: adm_visu.php?success=1"); // Redireciona com o parâmetro de sucesso
        exit;
    } 
}else {
        header("Location: adm_visu.php?success=0"); // Redireciona com o parâmetro de falha
        exit;
    }
?>

