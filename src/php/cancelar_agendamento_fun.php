<?php
session_start();
include "../inc/conecta_mysqli.inc";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_agendamento = $_GET['id'];

    $query_delete = "DELETE FROM agendamento WHERE id_agendamento = ?";
    $stmt_delete = $mysqli->prepare($query_delete);
    $stmt_delete->bind_param("i", $id_agendamento);
    $stmt_delete->execute();

    if ($stmt_delete->affected_rows > 0) {
        // Agendamento cancelado com sucesso, redirecionar de volta para a página anterior com a mensagem
        echo "<script>alert('Agendamento cancelado com sucesso.'); window.history.go(-1);</script>";
    } else {
        echo "<script>alert('Erro ao cancelar o agendamento.'); window.history.go(-1);</script>";
    }
} else {
    echo "<script>alert('ID de agendamento inválido.'); window.history.go(-1);</script>";
}

mysqli_close($mysqli);
?>
