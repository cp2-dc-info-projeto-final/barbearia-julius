<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_funcionario = $_POST['id_funcionario']; // Supondo que você tenha um campo 'id_funcionario' na tabela

    $sql = "DELETE FROM funcionarios WHERE id_funcionario = $id_funcionario";

    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Funcionário excluído com sucesso"));
    } else {
        echo json_encode(array("success" => false, "message" => "Erro ao excluir funcionário"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Requisição inválida"));
}
?>
