<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];

    // Verificar se o número de telefone ou e-mail já existem
    $check_numero = "SELECT * FROM funcionarios WHERE numero = $numero OR email = '$email'";
    $result = $mysqli->query($check_numero);

    if ($result->num_rows > 0) {
        // Se o número de telefone ou e-mail já existem, redirecione de volta para o formulário com um parâmetro de erro
        header("Location: adm_visu.php?success=0");
        exit;
    }

    // Se o número de telefone e e-mail não existem, proceda com a inserção
    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO funcionarios (nome, senha, numero, email) ";
    $sql .= "VALUES ('$nome','$senha_cript', $numero,'$email')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: adm_visu.php?success=1"); // Redireciona com o parâmetro de sucesso
        exit;
    } else {
        echo ($mysqli->error);
    }
} else {
    header("Location: adm_visu.php?success=0"); // Redireciona com o parâmetro de falha
    exit;
}
?>



