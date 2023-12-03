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
            <nav class="navegation">
                <ul>
                    <li><a class="nav" href="../php/logado.php">Página Principal</a></li>
                    <li><a class="nav" href="agendamento.php">Agendamento</a></li>
                    <li><a class="nav" href="../php/pagina_cliente.php">Página Cliente</a></li>
                    <li><a class="nav" href="../php/logout.php">Sair</a></li>
                </ul>
            </nav>
        </header>
        <div class="contenti">
                <h1>Meus Agendamentos</h1>
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
                echo "<h3></h3>";
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
                header("Location: pagina_cliente.php");
            }
        } else {
            echo "Sessão expirada. Por favor, faça login novamente.";
            header("Location: form_login.php");
        }

        mysqli_close($mysqli);
        ?>
</body>
</html>