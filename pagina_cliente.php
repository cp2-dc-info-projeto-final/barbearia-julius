<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $id_usuario = $_POST["id_usuario"];
    $novo_nome = $_POST["novo-nome"];
    $novo_email = $_POST["novo-email"];

    // Conectar ao banco de dados (substitua os detalhes com os seus)
    $conexao = new mysqli("localhost", "barbeariajulius","123","BARBEARIAJULIUS");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Preparar e executar a consulta SQL
    $query = "UPDATE usuarios SET nome='$novo_nome', email='$novo_email' WHERE id_usuario=$id_usuario";

    if ($conexao->query($query) === TRUE) {
        // Redireciona de volta para a página de perfil após a alteração
        header("Location: pagina_cliente.php");
        exit();
    } else {
        echo "Erro ao atualizar os dados: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pagina_cliente.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/pagina_cliente.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Seus Dados - Barbearia Julius</title>
</head>
<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="img/logo.png" alt="" class="logo"></a>
            <nav class="navegation">
                <ul>
                    <li><a class="nav" href="logado.html">Página Principal</a></li>
                    <li><a class="nav" href="agendamento.php">Agendamento</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="text">
                <h2>Seus Dados<br><span>Barbearia Julius</span></h2>
                <div class="dados">
                    <div class="informacao">
                        <h3>Nome:</h3>
                        <p>Nome do Cliente</p>
                    </div>
                    <div class="informacao">
                        <h3>Email:</h3>
                        <p>cliente@email.com</p>
                    </div>
                </div>
                <button class="alterar-dados-btn">Alterar Dados</button>
            </div>
        </div>
    </section>

    <div class="popup" id="alterarDadosPopup">
        <div class="popup-content">
            <span class="close-popup" id="fecharPopup">&times;</span>
            <!-- Adicione essas linhas ao seu formulário -->
<form action="pagina_cliente.php" method="post">
    <input type="hidden" id="id_usuario" name="id_usuario" value="1">
    
    <label for="novo-nome">Novo Nome:</label>
    <input type="text" id="novo-nome" name="novo-nome" required>
    
    <label for="novo-email">Novo Email:</label>
    <input type="email" id="novo-email" name="novo-email" required>
    
    <button type="submit" class="salvar-alteracoes-btn">Salvar Alterações</button>
</form>

        </div>
    </div>
</body>
</html>
