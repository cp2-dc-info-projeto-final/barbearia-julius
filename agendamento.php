<?php
$mensagem = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $servico = $_POST['servico'];


    $mensagem = "Agendamento realizado com sucesso para $nome em $data às $hora para o serviço $servico!";
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
            <form action="" method="POST">

                <label for="funcionario">Funcionário:</label>
                <select name="funcionario" id="funcionario">
                    <option value="" selected="selected" disabled="disabled">Selecione um funcionário</option>
                    <option value="julius">Julius</option>
                    <option value="chris">Chris</option>
                </select>

                
                <label for="data">Data:</label>
                <input type="date" name="data" required>
                
                <label for="hora">Hora:</label>
                <select name="hora" id="hora">
                    
                </select>
                
                <label for="servico">Serviço:</label>
                <select name="servico">
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
        </div>
    </div>
</section>



</body>
</html>
