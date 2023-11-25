<?php
include '../inc/conecta_mysqli.inc';

header('Content-Type: application/json');

$mensagem = "";
$erros = [];

session_start();

if (!isset($_SESSION["email"])) {
    $erros[] = "Usuário não autenticado.";
} else {
    $emailUsuario = $_SESSION["email"];
    $funcao = isset($_POST["funcao"]) ? $_POST["funcao"] : "";

    if ($funcao == "agendar") {
        $id_funcionario = isset($_POST['id_funcionario']) ? $_POST['id_funcionario'] : "";
        $data_agenda = isset($_POST['data_agenda']) ? $_POST['data_agenda'] : "";
        $horario_inicio = isset($_POST['horario_inicio']) ? $_POST['horario_inicio'] : "";
        $id_servico = isset($_POST['id_servico']) ? $_POST['id_servico'] : "";

        if (empty($id_funcionario) || empty($id_servico) || empty($horario_inicio) || empty($data_agenda)) {
            $erros[] = "Por favor, preencha todos os campos obrigatórios.";
        } else {
            $id_usuario = obterIdUsuarioPorEmail($mysqli, $emailUsuario);

            if ($id_usuario !== null) {
                $stmt_verificar = $mysqli->prepare("SELECT id_agendamento FROM agendamento WHERE id_funcionario = ? AND data_agenda = ? AND horario_inicio = ?");
                $stmt_verificar->bind_param("iss", $id_funcionario, $data_agenda, $horario_inicio);
                $stmt_verificar->execute();
                $stmt_verificar->store_result();

                if ($stmt_verificar->num_rows > 0) {
                    $erros[] = "Este funcionário já possui um agendamento para o dia e horário especificados.";
                } else {
                    $stmt_agendar = $mysqli->prepare("INSERT INTO agendamento (id_usuario, id_funcionario, id_servico, horario_inicio, data_agenda) VALUES (?, ?, ?, ?, ?)");
                    $stmt_agendar->bind_param("iiiis", $id_usuario, $id_funcionario, $id_servico, $horario_inicio, $data_agenda);

                    if ($stmt_agendar->execute()) {
                        $mensagem = "Agendamento realizado com sucesso!";
                    } else {
                        $erros[] = "Ocorreu um erro ao realizar o agendamento. Por favor, tente novamente.";
                    }

                    $stmt_agendar->close();
                }
                $stmt_verificar->close();
            } else {
                $erros[] = "Usuário não encontrado.";
            }
        }
    }
}

mysqli_close($mysqli);

// Resposta JSON
$response = array(
    'mensagem' => $mensagem,
    'erros' => $erros
);

echo json_encode($response);

function obterIdUsuarioPorEmail($mysqli, $email)
{
    $query = "SELECT id_usuario FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id_usuario'];
    }

    return null;
}
?>
