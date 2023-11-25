<?php
include '../inc/conecta_mysqli.inc';

$id_funcionario = $_POST['id_funcionario'];

// Consultar os horários já agendados
$query_agendados = "SELECT DISTINCT horario_inicio FROM agendamento WHERE id_funcionario = ?";
$stmt_agendados = $mysqli->prepare($query_agendados);
$stmt_agendados->bind_param("i", $id_funcionario);
$stmt_agendados->execute();
$stmt_agendados->bind_result($horario_agendado);

$horarios_agendados = array();

while ($stmt_agendados->fetch()) {
    $horarios_agendados[] = $horario_agendado;
}

$stmt_agendados->close();

// Consultar todos os horários disponíveis
$horarios_disponiveis = ['09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];

// Remover os horários agendados da lista de horários disponíveis
$horarios_disponiveis = array_diff($horarios_disponiveis, $horarios_agendados);

echo json_encode(array_values($horarios_disponiveis));

mysqli_close($mysqli);
?>
