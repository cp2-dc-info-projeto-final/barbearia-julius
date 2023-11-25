<?php
session_start();
include '../inc/conecta_mysqli.inc';

$mensagem = "";
$erros = [];

if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"];

    $funcao = $_POST["funcao"];

    if ($funcao == "agendar") {
        if (empty($_POST["id_funcionario"]) || empty($_POST["id_servico"]) || empty($_POST["horario_inicio"]) || empty($_POST["data_agenda"])) {
            $erros[] = "Por favor, preencha todos os campos obrigatórios.";
        } else {
            $id_funcionario = $_POST["id_funcionario"];
            $id_servico = $_POST["id_servico"];
            $horario_inicio = strval($_POST["horario_inicio"]);
            $data_agenda = $_POST["data_agenda"];

            $query = "SELECT id_usuario FROM usuarios WHERE email = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $emailUsuario);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id_usuario = $row['id_usuario'];

                $stmt = $mysqli->prepare("INSERT INTO agendamento (id_usuario, id_funcionario, id_servico, horario_inicio, data_agenda) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("iiiis", $id_usuario, $id_funcionario, $id_servico, $horario_inicio, $data_agenda);

                if ($stmt->execute()) {
                    $mensagem = "Agendamento realizado com sucesso!";
                } else {
                    $erros[] = "Ocorreu um erro ao realizar o agendamento. Por favor, tente novamente.";
                }
                $stmt->close();
            } else {
                $erros[] = "Usuário não encontrado.";
            }
        }
    }
} else {
    header("Location: form_login.php");
    exit;
}

mysqli_close($mysqli);
?>
