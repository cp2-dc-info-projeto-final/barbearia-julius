<?php
session_start();
include 'conecta_mysqli.inc';

$operacao = $_POST["operacao"];
$erros = [];

if ($operacao == "cadastrar") {
    $orario_inicio = $_POST["horario_inicio"];
    $data_agenda = $_POST["data_agenda"];
}

$sql = "INSERT INTO usuarios (horario_inicio, data_agenda) VALUES ('$horario_inicio', '$data_agenda')";

mysqli_close($mysqli);
?>