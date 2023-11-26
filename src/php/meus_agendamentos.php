<?php
session_start();
include '../inc/conecta_mysqli.inc';

if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"];

    $query = "SELECT agendamento.id_agendamento, agendamento.data_agenda, agendamento.horario_inicio, 
              usuarios.nome AS nome_usuario, usuarios.email AS email_usuario, 
              funcionarios.nome AS nome_funcionario, servico.descricao AS descricao_servico
              FROM agendamento
              INNER JOIN usuarios ON agendamento.id_usuario = usuarios.id_usuario
              INNER JOIN funcionarios ON agendamento.id_funcionario = funcionarios.id_funcionario
              INNER JOIN servico ON agendamento.id_servico = servico.id_servico
              WHERE usuarios.email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $emailUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Agendamentos:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Email</th><th>Funcionário</th><th>Data</th><th>Hora</th><th>Serviço</th><th>Numero do Agendamento</th><th>Cancelar</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nome_usuario'] . "</td>";
            echo "<td>" . $row['email_usuario'] . "</td>";
            echo "<td>" . $row['nome_funcionario'] . "</td>";
            echo "<td>" . $row['data_agenda'] . "</td>";
            echo "<td>" . $row['horario_inicio'] . "</td>";
            echo "<td>" . $row['descricao_servico'] . "</td>";
            echo "<td>" . $row['id_agendamento'] . "</td>";
            echo "<td><form method='post'><button type='submit' name='cancelar' value='" . $row['id_agendamento'] . "'>Cancelar</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";

        // Verifica se o botão de cancelar foi pressionado
        if (isset($_POST['cancelar'])) {
            $id_agendamento_cancelar = $_POST['cancelar'];

            // Query para deletar o agendamento
            $query_delete = "DELETE FROM agendamento WHERE id_agendamento = ?";
            $stmt_delete = $mysqli->prepare($query_delete);
            $stmt_delete->bind_param("i", $id_agendamento_cancelar);
            $stmt_delete->execute();

            // Verifica se a deleção foi bem-sucedida
            if ($stmt_delete->affected_rows > 0) {
                echo "Agendamento cancelado com sucesso!";
                // Aqui você pode adicionar redirecionamento ou outras ações após o cancelamento
            } else {
                echo "Erro ao cancelar o agendamento.";
            }
        }
    } else {
        echo "Nenhum agendamento encontrado para este usuário.";
    }
} else {
    echo "Sessão expirada. Por favor, faça login novamente.";
}

mysqli_close($mysqli);
?>
