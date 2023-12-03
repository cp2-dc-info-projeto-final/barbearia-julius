<?php
include '../inc/conecta_mysqli.inc';

header('Content-Type: application/json');

$erros = [];
$horarios_disponiveis = [];

// Verificar se as variáveis POST foram definidas
if (isset($_POST['id_funcionario'], $_POST['data_agenda'])) {
    $id_funcionario = $_POST['id_funcionario'];
    $data_agenda = $_POST['data_agenda'];

    // Consultar os horários já agendados para o funcionário e a data especificados
    $query_agendados = "SELECT horario_inicio FROM agendamento WHERE id_funcionario = ? AND data_agenda = ?";
    $stmt_agendados = $mysqli->prepare($query_agendados);
    $stmt_agendados->bind_param("is", $id_funcionario, $data_agenda);
    $stmt_agendados->execute();
    $stmt_agendados->bind_result($horario_agendado);

    $horarios_ocupados = [];

    while ($stmt_agendados->fetch()) {
        $horarios_ocupados[] = $horario_agendado;
    }

    $stmt_agendados->close();

    // Todos os horários possíveis
    $horarios_disponiveis = ['09', '10', '11', '13', '14', '15', '16', '17', '18', '19', '20'];

    // Remover os horários já agendados para o funcionário na data especificada da lista de horários disponíveis
    $horarios_disponiveis = array_diff($horarios_disponiveis, $horarios_ocupados);

    // Reindexar o array após a remoção
    $horarios_disponiveis = array_values($horarios_disponiveis);
} else {
    $erros[] = "Parâmetros insuficientes para a consulta de horários.";
}

mysqli_close($mysqli);

// Resposta JSON
$response = [
    'erros' => $erros,
    'horarios_disponiveis' => $horarios_disponiveis,
];

echo json_encode($response);
?>
