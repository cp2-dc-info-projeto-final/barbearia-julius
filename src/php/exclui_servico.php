<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_servico = $_POST['id_servico'];

    $sql = "DELETE FROM servico WHERE id_servico = $id_servico";

    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Serviço excluído com sucesso"));
    } else {
        echo json_encode(array("success" => false, "message" => "Erro ao excluir serviço"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Requisição inválida"));
}
?>
