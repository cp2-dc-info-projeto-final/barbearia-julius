<?php
$mensagem = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $servico = $_POST['servico'];

    // Aqui, você pode inserir os dados em um banco de dados, enviar por e-mail, etc.

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
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
                
                <label for="data">Data:</label>
                <input type="date" name="data" required>
                
                <label for="hora">Hora:</label>
                <input type="time" name="hora" required>
                
                <label for="servico">Serviço:</label>
                <select name="servico">
                    <option value="corte">Corte</option>
                    <option value="barba">Barba</option>
                    <!-- Adicione mais serviços conforme necessário -->
                </select>
                
                <input type="submit" value="Agendar">
            </form>
        </div>
    </div>
</section>

<!-- O resto do seu código (ícones, rodapé, etc) aqui -->

</body>
</html>
