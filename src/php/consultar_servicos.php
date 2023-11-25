<?php
include '../inc/conecta_mysqli.inc';

header('Content-Type: application/json');

$erros = [];
$servicos_disponiveis = [];

$query = "SELECT id_servico, descricao FROM servico";

$result = $mysqli->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $servicos_disponiveis[] = [
            'id_servico' => $row['id_servico'],
            'descricao' => $row['descricao']
        ];
    }
} else {
    $erros[] = "Erro ao consultar os serviços: " . $mysqli->error;
}

mysqli_close($mysqli);

// Resposta JSON
$response = [
    'erros' => $erros,
    'servicos_disponiveis' => $servicos_disponiveis,
];

echo json_encode($response);
?>
