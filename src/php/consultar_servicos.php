<?php
include '../inc/conecta_mysqli.inc';

$query_servicos = "SELECT id_servico, descricao FROM servico";
$result_servicos = $mysqli->query($query_servicos);

$lista_servicos = array();

while ($row = $result_servicos->fetch_assoc()) {
    $lista_servicos[] = $row;
}

echo json_encode($lista_servicos);

mysqli_close($mysqli);
?>
