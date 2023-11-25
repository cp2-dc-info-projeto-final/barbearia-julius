<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"]; // Obtém o email do usuário da sessão

    // Use $emailUsuario para exibir informações do usuário ou realizar operações relacionadas ao agendamento
    
} else {
    // Se o usuário não estiver logado, redirecione-o para a página de login
    header("Location: form_login.php");
    exit;
}


$conexao = new mysqli("localhost", "barbeariajulius", "123", "BARBEARIAJULIUS");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Obter o ID do funcionário (assumindo que você tenha um sistema de autenticação)
$id_funcionario = $_SESSION['id_funcionario'];

// Consulta SQL para obter os agendamentos do funcionário
$sql = "SELECT * FROM agendamentos WHERE id_funcionario = $id_funcionario";
$result = $conn->query($sql);

// Exibir os agendamentos
if ($result->num_rows > 0) {
    echo "<h2>Seus Agendamentos</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Data</th><th>Horário</th><th>Serviço</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_agendamento'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['horario'] . "</td>";
        echo "<td>" . $row['servico'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum agendamento encontrado.";
}

$conn->close();
?>
