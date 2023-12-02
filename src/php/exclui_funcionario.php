<?php
include "../inc/conecta_mysqli.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_funcionario = $_POST['id_funcionario'];

    $sql = "DELETE FROM funcionarios WHERE id_funcionario = $id_funcionario";

    if ($mysqli->query($sql) === TRUE) {
        if ($mysqli->affected_rows > 0) {
            echo json_encode(array("success" => true, "message" => "Funcionário excluído com sucesso"));
        } else {
            echo json_encode(array("success" => false, "message" => "O funcionário não existe no banco de dados"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Erro ao excluir funcionário"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Requisição inválida"));
}
?>
