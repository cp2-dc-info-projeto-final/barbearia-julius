<?php
session_start();
include '../inc/conecta_mysqli.inc';

if (isset($_POST['cancelar'])) {
    $id_agendamento_cancelar = $_POST['cancelar'];

    // Query para deletar o agendamento
    $query_delete = "DELETE FROM agendamento WHERE id_agendamento = ?";
    $stmt_delete = $mysqli->prepare($query_delete);
    $stmt_delete->bind_param("i", $id_agendamento_cancelar);
    $stmt_delete->execute();

    // Verifica se a deleção foi bem-sucedida
    if ($stmt_delete->affected_rows > 0) {
        $_SESSION['msg_cancelamento'] = "Agendamento cancelado com sucesso!";
    } else {
        $_SESSION['msg_cancelamento'] = "Erro ao cancelar o agendamento.";
    }
}

mysqli_close($mysqli);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
