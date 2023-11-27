<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meus_agendamentos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/pagina_cliente1.js"></script>
    <script src="../js/pagina_cliente2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Seus Dados - Barbearia Julius</title>
</head>
<body>
<section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="../img/logo.png" alt="" class="logo"></a>
            <div class="contenti">
                <h1>Agendamentos</h1>
        
<?php
session_start();

if (isset($_SESSION["id_funcionario"])) {
    $id_funcionario = $_SESSION["id_funcionario"];
}
include "../inc/conecta_mysqli.inc";

// Verifique se o funcionário está logado (validar a sessão)
if (isset($_SESSION["id_funcionario"])) {
    $id_funcionario = $_SESSION["id_funcionario"];

    // Consulta na tabela de agendamentos filtrando pelo ID do funcionário logado
    $query = "SELECT * FROM agendamento WHERE id_funcionario = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_funcionario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Exibição dos agendamentos do funcionário logado
    if ($result->num_rows > 0) {
        echo "<h3></h3>";
        echo "<table border='1'>";
        echo "<tr><th>Número de agendamento</th><th>Data</th><th>Hora</th><th>Descrição do Serviço</th><th>Nome do Cliente</th><th>Cancelar</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_agendamento'] . "</td>"; // Adicionando o ID do agendamento
            echo "<td>" . $row['data_agenda'] . "</td>";
            echo "<td>" . $row['horario_inicio'] . "</td>";

            // Se você tiver um campo de ID do serviço, pode usar para buscar a descrição do serviço
            $id_servico = $row['id_servico'];
            $query_servico = "SELECT descricao FROM servico WHERE id_servico = ?";
            $stmt_servico = $mysqli->prepare($query_servico);
            $stmt_servico->bind_param("i", $id_servico);
            $stmt_servico->execute();
            $result_servico = $stmt_servico->get_result();

            if ($result_servico->num_rows > 0) {
                $servico = $result_servico->fetch_assoc();
                echo "<td>" . $servico['descricao'] . "</td>";
            } else {
                echo "<td>Serviço não encontrado</td>";
            }

            // Aqui, faremos a consulta para obter o nome do usuário associado a este agendamento
            $id_usuario = $row['id_usuario'];
            $query_usuario = "SELECT nome FROM usuarios WHERE id_usuario = ?";
            $stmt_usuario = $mysqli->prepare($query_usuario);
            $stmt_usuario->bind_param("i", $id_usuario);
            $stmt_usuario->execute();
            $result_usuario = $stmt_usuario->get_result();

            if ($result_usuario->num_rows > 0) {
                $usuario = $result_usuario->fetch_assoc();
                echo "<td>" . $usuario['nome'] . "</td>";
            } else {
                echo "<td>Usuário não encontrado</td>";
            }

            // Botão de Cancelar com função JavaScript
            echo "<td><button onclick='confirmCancel(" . $row['id_agendamento'] . ")'>Cancelar</button></td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum agendamento encontrado para este funcionário.";
    }

    mysqli_close($mysqli);
} else {
    // Caso não haja um ID de funcionário na sessão, pode redirecionar para a página de login ou tomar outra ação adequada
    header("Location: form_login.php");
    exit;
}
?>

<!-- Adicionando a função JavaScript -->
<script>
    function confirmCancel(id_agendamento) {
        if (confirm("Tem certeza que deseja cancelar este agendamento?")) {
            // Se o usuário confirmar, redirecione para o arquivo que lidará com o cancelamento
            window.location.href = "cancelar_agendamento_fun.php?id=" + id_agendamento;
        } else {
            // Caso contrário, não faça nada
            return false;
        }
    }
</script>
</body>
</html>