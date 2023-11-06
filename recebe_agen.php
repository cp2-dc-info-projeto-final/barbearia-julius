<?php
session_start();
include 'conecta_mysqli.inc';

$funcao = $_POST["funcao"];
$erros = [];

if ($funcao == "agendar") {
    if (empty($_POST["id_funcionario"]) || empty($_POST["id_servico"]) || empty($_POST["horario_inicio"]) || empty($_POST["data_agenda"])) {
        $erros[] = "Por favor, preencha todos os campos obrigatórios.";
    } 
    else {
        $id_funcionario = $_POST["id_funcionario"];
        $id_servico = $_POST["id_servico"];
        $horario_inicio = $_POST["horario_inicio"];
        $data_agenda = $_POST["data_agenda"];

        echo $id_funcionario. "<br>";
        echo $id_servico. "<br>";
        echo $horario_inicio. "<br>";
        echo $data_agenda. "<br>";
        $stmt = $mysqli->prepare("INSERT INTO agendamento (id_funcionario, id_servico, horario_inicio, data_agenda) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $id_funcionario, $id_servico, $horario_inicio, $data_agenda);

        if ($stmt->execute()) {
            $mensagem = "Agendamento realizado com sucesso!";
        } else {
            $erros[] = "Ocorreu um erro ao realizar o agendamento. Por favor, tente novamente.";
        }
        $stmt->close();
    }
}

mysqli_close($mysqli);
?>
