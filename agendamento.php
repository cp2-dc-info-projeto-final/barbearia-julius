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
                <li><a href="logado.html">Página Principal</a></li>
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
                <select name="funcionario">
                    <option value="julius">Julius</option>
                    <option value="chris">Chris</option>
                </select>
                
                <label for="data">Data:</label>
                <input type="date" name="data" required>
                
                <label for="hora">Hora:</label>
                <select>
                    <option value="horario1">07:00</option>
                    <option value="horario2">08:00</option>
                    <option value="horario3">09:00</option>
                    <option value="horario4">10:00</option>
                    <option value="horario5">11:00</option>
                    <option value="horario6">12:00</option>
                    <option value="horario7">13:00</option>
                    <option value="horario8">14:00</option>
                    <option value="horario9">15:00</option>
                    <option value="horario10">16:00</option>
                    <option value="horario11">17:00</option>
                    <option value="horario12">18:00</option>
                    <option value="horario13">19:00</option>
                    <option value="horario14">20:00</option>
                </select>
                
                <label for="servico">Serviço:</label>
                <select name="servico">
                    <option value="corte">Corte</option>
                    <option value="barba">Barba</option>
                    <option value="cortebarba">Corte + barba</option>
                
                </select>
                
                <input type="submit" value="Agendar">
            </form>
        </div>
    </div>
</section>



</body>
</html>
