<?php
// Verifica se o ID do agendamento foi recebido via GET ou POST
if(isset($_GET['id_agendamento'])) {
    $id_agendamento = $_GET['id_agendamento'];

    // Lógica para deletar o agendamento no banco de dados
    include '../inc/conecta_mysqli.inc'; // Inclua o arquivo de conexão

    $query = "DELETE FROM agendamento WHERE id_agendamento = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_agendamento);
    
    if($stmt->execute()) {
        // Se a exclusão foi bem-sucedida
        echo "Agendamento cancelado com sucesso!";
    } else {
        // Se houve um problema na exclusão
        echo "Erro ao cancelar o agendamento.";
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "ID do agendamento não foi fornecido.";
}
?>
