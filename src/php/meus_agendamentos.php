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
            echo "<td><form method='post' onsubmit='return confirm(\"Tem certeza que deseja cancelar este agendamento?\")' action='cancelar_agendamento.php'><button type='submit' name='cancelar' value='" . $row['id_agendamento'] . "'>Cancelar</button></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum agendamento encontrado para este usuário.";
    }
} else {
    echo "Sessão expirada. Por favor, faça login novamente.";
    header("Location: form_login.php");
}

mysqli_close($mysqli);
?>
