<?php
session_start();
include 'conecta_mysqli.inc';

$funcao = $_POST["funcao"];
$erros = [];

if ($funcao == "salvar") {
    $funcionario = $_POST["funcionario"];
    $servico = $_POST["senha"];
    $data = $_POST["nome"];
    $hora = $_POST["email"];
    exit();
    
}

mysqli_close($mysqli);
?>