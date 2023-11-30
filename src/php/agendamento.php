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

$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_funcionario = isset($_POST['id_funcionario']) ? $_POST['id_funcionario'] : "";
    $data_agenda = isset($_POST['data_agenda']) ? $_POST['data_agenda'] : "";
    $horario_inicio = isset($_POST['horario_inicio']) ? $_POST['horario_inicio'] : "";
    $id_servico = isset($_POST['id_servico']) ? $_POST['id_servico'] : "";


}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Carregar opções de funcionários e serviços ao carregar a página
        carregarOpcoesFuncionarios();
        carregarOpcoesServicos();

        $('#id_funcionario').on('change', function() {
            const selecionado = $(this).val().toString();
            const dataSelecionada = $('#data_agenda').val();

            const partesData = dataSelecionada.split('-');
            const dataFormatoCorreto = partesData[2] + '-' + partesData[1] + '-' + partesData[0];
            
            console.log("selecionado: ",selecionado);
            console.log("dataFormatoCorreto: ", dataFormatoCorreto);
        })});

        
    // Função para carregar as opções de funcionários
    function carregarOpcoesFuncionarios() {
        $.ajax({
            url: 'consultar_funcionarios.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.erros.length > 0) {
                    console.error('Erro na requisição AJAX:', response.erros);
                    alert('Erro ao carregar opções de funcionários. Por favor, tente novamente mais tarde.');
                } else {
                    response.funcionarios_disponiveis.forEach(function(funcionario) {
                        $('#id_funcionario').append($('<option>', {
                            value: funcionario.id_funcionario,
                            text: funcionario.nome
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição AJAX:', error);
                console.log(xhr.responseText);
            }
        });
    }

    // Função para carregar as opções de serviços
    function carregarOpcoesServicos() {
        $.ajax({
            url: 'consultar_servicos.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.erros.length > 0) {
                    console.error('Erro na requisição AJAX:', response.erros);
                    alert('Erro ao carregar opções de serviços. Por favor, tente novamente mais tarde.');
                } else {
                    response.servicos_disponiveis.forEach(function(servico) {
                        $('#id_servico').append($('<option>', {
                            value: servico.id_servico,
                            text: servico.descricao
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição AJAX:', error);
                console.log(xhr.responseText);
            }
        });
    }

</script>

<?php


// Exibir mensagens armazenadas na sessão
$mensagem = isset($_SESSION['agendamento_mensagem']) ? $_SESSION['agendamento_mensagem'] : "";
$erros = isset($_SESSION['agendamento_erros']) ? $_SESSION['agendamento_erros'] : [];

// Limpar as mensagens após a exibição
unset($_SESSION['agendamento_mensagem']);
unset($_SESSION['agendamento_erros']);
?>






<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/agendamento.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/agendamento.js"></script>
    <title>Agendamento - Barbearia Julius</title>
</head>
<body>

<section>
    <div class="circle"></div>
    <header>
        <a href="#"><img src="../img/logo.png" alt="" class="logo"></a>
        <nav class="navegation">
            <ul>
                <li><a class="nav" href="../php/logado.php">Página Principal</a></li>
                <li><a class="nav" href="../php/agendamento.php">Agendamento</a></li>
                <li><a class="nav" href="../php/pagina_cliente.php">Página Cliente</a></li>
                <li><a class="nav" href="../php/logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <div class="text">
            <h2>Agendamento<br><span>Barbearia Julius</span></h2>

            <?php
            // Exibir mensagens
            if ($mensagem) {
                echo "<p class='mensagem'>$mensagem</p>";
            }

            if (count($erros) > 0) {
                echo "<div id='mensagemErro' style='color: red;'>";
                echo implode('<br>', $erros);
                echo "</div>";
            }
            ?>

            <form action="recebe_agen.php" method="POST">
                <input type="hidden" name="funcao" value="agendar">

                <label for="id_funcionario">Funcionário:</label>
                <select name="id_funcionario" id="id_funcionario">
                    <option value="" selected="selected" disabled="disabled">Selecione um funcionário</option>
                </select>


                <label for="data_agenda">Data:</label>
                <input type="date" name="data_agenda" id="data_agenda" required>

                <label for="horario_inicio">Horário:</label>
                <select name="horario_inicio" id="horario_inicio"></select>

                <label for="id_servico">Serviço:</label>
                <select name="id_servico" id="id_servico">
                    <option value="" selected="selected" disabled="disabled">Selecione um serviço</option>
                    <!-- As opções serão carregadas dinamicamente pelo JavaScript -->
                </select>



                <input type="submit" value="Agendar">
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../js/agendamento.js"></script>
</body>
</html>