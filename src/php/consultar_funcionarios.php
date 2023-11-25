<?php
include '../inc/conecta_mysqli.inc';

header('Content-Type: application/json');

$erros = [];
$funcionarios_disponiveis = [];

// Consultar os funcionários disponíveis
$query_funcionarios = "SELECT id_funcionario, nome FROM funcionarios";
$result_funcionarios = $mysqli->query($query_funcionarios);

if ($result_funcionarios) {
    while ($row = $result_funcionarios->fetch_assoc()) {
        $funcionarios_disponiveis[] = [
            'id_funcionario' => $row['id_funcionario'],
            'nome' => $row['nome'],
        ];
    }
} else {
    $erros[] = "Erro ao consultar funcionários.";
}

mysqli_close($mysqli);

// Resposta JSON
$response = [
    'erros' => $erros,
    'funcionarios_disponiveis' => $funcionarios_disponiveis,
];

echo json_encode($response);
?>
