<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_servico = $_POST['id_servico'];

    $sql = "DELETE FROM servico WHERE id_servico = $id_servico";

    if ($mysqli->query($sql) === TRUE) {
        if ($mysqli->affected_rows > 0) {
            echo json_encode(array("success" => true, "message" => "Serviço excluído com sucesso"));
        } else {
            echo json_encode(array("success" => false, "message" => "O serviço não existe no banco de dados"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Erro ao excluir serviço"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Requisição inválida"));
}
?>
