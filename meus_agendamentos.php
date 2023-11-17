<?php
session_start();
include 'conecta_mysqli.inc';

if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"];

    $query = "SELECT agendamento.data_agenda, agendamento.horario_inicio, usuarios.nome AS nome_usuario, usuarios.email AS email_usuario, funcionarios.nome AS nome_funcionario
              FROM agendamento
              INNER JOIN usuarios ON agendamento.id_usuario = usuarios.id_usuario
              INNER JOIN funcionarios ON agendamento.id_funcionario = funcionarios.id_funcionario
              WHERE usuarios.email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $emailUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Agendamentos:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Email</th><th>Funcionário</th><th>Data</th><th>Hora</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nome_usuario'] . "</td>";
            echo "<td>" . $row['email_usuario'] . "</td>";
            echo "<td>" . $row['nome_funcionario'] . "</td>";
            echo "<td>" . $row['data_agenda'] . "</td>";
            echo "<td>" . $row['horario_inicio'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum agendamento encontrado para este usuário.";
    }
} else {
    echo "Sessão expirada. Por favor, faça login novamente.";
}

mysqli_close($mysqli);
?>
