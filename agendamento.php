<?php

session_start();

// Verifica se o usuário está logado
if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"]; // Obtém o email do usuário da sessão

    // Use $emailUsuario para exibir informações do usuário ou realizar operações relacionadas ao agendamento
    echo "Usuário logado: $emailUsuario";
} else {
    // Se o usuário não estiver logado, redirecione-o para a página de login
    header("Location: form_login.php");
    exit;
}

$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_funcionario = isset($_POST['id_funcionario']) ? $_POST['id_funcionario'] : "";
    $data_agenda = isset($_POST['data_agenda']) ? $_POST['data_agenda'] : "";
    $horario_inicio = isset($_POST['horario_inicio']) ? $_POST['horario_inicio'] : "";
    $id_servico = isset($_POST['id_servico']) ? $_POST['id_servico'] : "";

    $mensagem = "Agendamento realizado com sucesso com $id_funcionario em $data_agenda às $horario_inicio para o serviço $id_servico!";
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/agendamento.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/agendamento.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Agendamento - Barbearia Julius</title>
</head>
<body>

<section>
    <div class="circle"></div>
    <header>
        <a href="#"><img src="img/logo.png" alt="" class="logo"></a>
        <nav class="navegation">
            <ul>
                <li><a class="nav" href="logado.html">Pagina Principal</a></li>
                <li><a class="na" href="agendamento.php">Agendamento</a></li>
                <li><a class="na" href="pagina_cliente.php">Página Cliente</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <div class="text">
            <h2>Agendamento<br><span>Barbearia Julius</span></h2>
            <?php 
                if ($mensagem) {
                    echo "<p class='mensagem'>$mensagem</p>";
                }
            ?>
            <form action="recebe_agen.php" method="POST">
                <input type="hidden" name="funcao" value="agendar">

                <label for="id_funcionario">Funcionário:</label>
                <select name="id_funcionario" id="id_funcionario">
                    <option value="" selected="selected" disabled="disabled">Selecione um funcionário</option>
                    <option value="1">Julius</option>
                    <option value="2">Chris</option>
                </select>

                <label for="data_agenda">Data:</label>
                <input type="date" name="data_agenda" id="data_agenda" required>
                
                <label for="horario_inicio">Horário:</label>
                <select name="horario_inicio" id="horario_inicio">
                   
                </select>
                
                <label for="id_servico">Serviço:</label>
                <select name="id_servico" id="id_servico">
                    <option value="" selected="selected" disabled="disabled">Selecione um serviço</option>
                    <option value="corte">Corte</option>
                    <option value="barba">Barba</option>
                    <option value="sobrancelha">Sobrancelha</option>
                    <option value="cortebarba">Corte + barba</option>
                    <option value="cortesobrancelha">Corte + sobrancelha</option>
                    <option value="cortebarbasobrancelha">Corte + barba + sobrancelha</option>
                    <option value="barbasobrancelha">Barba + sobrancelha</option>
                </select>
                
                <input type="submit" value="Agendar">
            </form>

            <!-- Botão "Meus Agendamentos" -->
            <button id="meusAgendamentosButton" class="btn btn-primary">Meus Agendamentos</button>

            <!-- Bloco para históricos de agendamento (inicialmente oculto) -->
            <div id="historicoAgendamentos" style="display: none;">
                <!-- Conteúdo dos históricos de agendamento será adicionado posteriormente -->
            </div>
        </div>
    </div>
</section>

</body>
</html>