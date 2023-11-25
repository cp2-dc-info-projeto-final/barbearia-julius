<?php
include '../inc/conecta_mysqli.inc';

$id_funcionario = $_POST['id_funcionario'];
$data_agenda = $_POST['data_agenda'];

// Consultar os horários já agendados para o funcionário e a data especificados
$query_agendados = "SELECT horario_inicio FROM agendamento WHERE id_funcionario = ? AND data_agenda = ?";
$stmt_agendados = $mysqli->prepare($query_agendados);
$stmt_agendados->bind_param("is", $id_funcionario, $data_agenda);
$stmt_agendados->execute();
$stmt_agendados->bind_result($horario_agendado);

$horarios_ocupados = array();

while ($stmt_agendados->fetch()) {
    $horarios_ocupados[] = $horario_agendado;
}

$stmt_agendados->close();

// Todos os horários possíveis
$horarios_disponiveis = ['09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];

// Verificar os horários ocupados antes da remoção
echo "Horários ocupados antes da remoção: ";
var_dump($horarios_ocupados);

// Verificar os horários disponíveis antes da remoção
echo "Horários disponíveis antes da remoção: ";
var_dump($horarios_disponiveis);

// Remover os horários já agendados para o funcionário na data especificada da lista de horários disponíveis
foreach ($horarios_ocupados as $horario_ocupado) {
    $key = array_search($horario_ocupado, $horarios_disponiveis);
    if ($key !== false) {
        unset($horarios_disponiveis[$key]);
    }
}

// Reindexar o array após a remoção
$horarios_disponiveis = array_values($horarios_disponiveis);

// Verificar os horários disponíveis após a remoção
echo "Horários disponíveis após a remoção: ";
var_dump($horarios_disponiveis);

echo json_encode(array_values($horarios_disponiveis));

mysqli_close($mysqli);
?>
