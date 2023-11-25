<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM funcionarios WHERE id_funcionario = $id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Funcionário excluído com sucesso!";
    } else {
        echo "Erro ao excluir funcionário: " . $mysqli->error;
    }
} else {
    header("Location: pagina_anterior.php");
    exit;
}

$mysqli->close();
?>