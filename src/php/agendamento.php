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

            $('#horario_inicio').empty();

            if (selecionado !== '0') {
                $.ajax({
                    url: 'consultar_horarios.php',
                    type: 'POST',
                    data: {
                        id_funcionario: selecionado,
                        data_agenda: dataFormatoCorreto,
                        funcao: 'agendar'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.erros.length > 0) {
                            console.error('Erro na requisição AJAX:', response.erros);
                            alert('Erro ao consultar horários. Por favor, tente novamente mais tarde.');
                        } else {
                            response.horarios_disponiveis.forEach(function(horario) {
                                $('#horario_inicio').append($('<option>', {
                                    value: horario,
                                    text: horario
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
        });

        $("#meusAgendamentosButton").click(function() {
            $("#historicoAgendamentos").toggle();
        });
    });

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






<!DOCTYPE html>
<html lang="pt-BR">
<head>
<style>
        #historicoAgendamentos {
            display: none;
            margin-top: 20px;
            background-color: #94095e;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            margin-top: 10px;
            background-color: #fff;
            border-radius: 10px;
            border: none; /* Remove a borda da tabela */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: none; /* Remove a borda das células */
        }

        th {
            background-color: transparent;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #94095e10;
        }

        tr:hover {
            background-color: #94095e20;
        }
        #meusAgendamentosButton {
            background-color: #94095e;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #meusAgendamentosButton:hover {
            background-color: #ff00a1;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/agendamento.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/agendamento.js"></script>
    <script src="../js/meus_agendamentos.js"></script>
    
    <script>
        $(document).ready(function(){
            var agendamentosExibidos = false;

            $('#meusAgendamentosButton').on('click', function(){
                if (!agendamentosExibidos) {
                    $.ajax({
                        url: 'meus_agendamentos.php',
                        method: 'GET',
                        success: function(response){
                            $('#historicoAgendamentos').html(response);
                            $('#historicoAgendamentos').show(); // Mostra os agendamentos

                            // Adiciona o botão "Cancelar" dentro da div de agendamentos
                            $('#historicoAgendamentos').append('<button class="cancelarAgendamentoBtn">Cancelar</button>');
                        }
                    });
                    agendamentosExibidos = true;
                } else {
                    // Se os agendamentos já estiverem visíveis, apenas alterna a exibição do botão "Cancelar"
                    $('.cancelarAgendamentoBtn').toggle();
                }
            });

            // Função para cancelar o agendamento
            $('#historicoAgendamentos').on('click', '.cancelarAgendamentoBtn', function(){
                var id_agendamento = /* ID do agendamento correspondente */;
                
                $.ajax({
                    url: 'cancelar_agendamento.php',
                    method: 'GET',
                    data: { id_agendamento: id_agendamento },
                    success: function(response){
                        $('#historicoAgendamentos').append('<p>' + response + '</p>');
                    }
                });
            });
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Agendamento - Barbearia Julius</title>
</head>
<body>

<section>
    <div class="circle"></div>
    <header>
        <a href="#"><img src="../img/logo.png" alt="" class="logo"></a>
        <nav class="navegation">
            <ul>
                <li><a class="nav" href="../html/logado.html">Pagina Principal</a></li>
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
                if ($mensagem) {
                    echo "<p class='mensagem'>$mensagem</p>";
                }
            ?>
            <form action="recebe_agen.php" method="POST">
                <input type="hidden" name="funcao" value="agendar">

                <label for="id_funcionario">Funcionário:</label>
                <select name="id_funcionario" id="id_funcionario">
                    <option value="" selected="selected" disabled="disabled">Selecione um funcionário</option>
                    <?php include 'carregar_funcionarios.php'; ?>
                </select>

                <label for="data_agenda">Data:</label>
                <input type="date" name="data_agenda" id="data_agenda" required>
                
                <label for="horario_inicio">Horário:</label>
                <select name="horario_inicio" id="horario_inicio">
                   
                </select>
                
                <label for="id_servico">Serviço:</label>
                <select name="id_servico" id="id_servico">
                    <option value="" selected="selected" disabled="disabled">Selecione um serviço</option>
                    <!-- As opções serão carregadas dinamicamente pelo JavaScript -->
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