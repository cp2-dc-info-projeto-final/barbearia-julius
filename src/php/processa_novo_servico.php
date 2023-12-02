<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Verificar se a descrição já existe
    $check_descricao = "SELECT * FROM servico WHERE descricao = '$descricao'";
    $result = $mysqli->query($check_descricao);

    if ($result->num_rows > 0) {
        // Se a descrição já existe, redirecione de volta para o formulário com um parâmetro de erro
        header("Location: adm_visu.php?success=0");
        exit;
    }

    // Se a descrição não existe, proceda com a inserção
    $sql = "INSERT INTO servico (descricao, preco) VALUES ('$descricao', '$preco')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: adm_visu.php?success=4"); // Redireciona com o parâmetro de sucesso
        exit;
    }
} else {
    header("Location: adm_visu.php?success=2"); // Redireciona com o parâmetro de falha
    exit;
}
?>
