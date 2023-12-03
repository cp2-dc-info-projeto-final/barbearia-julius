<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Verificar se a descrição já existe
    $check_descricao = "SELECT * FROM servico WHERE descricao = '$descricao'";
    $result = $mysqli->query($check_descricao);

    if ($result->num_rows > 0) {
        // Se a descrição já existe, redirecione para a página de administração com parâmetro de erro
        header("Location: adm_visu.php?success=8");
        exit;
    }

    // Se a descrição não existe, proceda com a inserção
    $sql = "INSERT INTO servico (descricao, preco) VALUES ('$descricao', '$preco')";

    if ($mysqli->query($sql) === TRUE) {
        // Se a inserção foi bem-sucedida, redirecione para a página de administração com parâmetro de sucesso
        header("Location: adm_visu.php?success=4&tipo=servico");
        exit;
    } else {
        // Se houver falha na inserção, redirecione para a página de administração com parâmetro de falha
        header("Location: adm_visu.php?success=2");
        exit;
    }
} else {
    // Se o método de requisição não for POST, redirecione para a página de administração com parâmetro de falha
    header("Location: adm_visu.php?success=2");
    exit;
}
?>
