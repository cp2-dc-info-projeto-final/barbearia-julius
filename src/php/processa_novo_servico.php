<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
 
    $sql = "INSERT INTO servico (descricao, preco) VALUES ('$descricao', '$preco')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: adm_visu.php?success=1"); // Redireciona com o parâmetro de sucesso
        exit;
    } 
}else {
        header("Location: adm_visu.php?success=0"); // Redireciona com o parâmetro de falha
        exit;
    }
?>