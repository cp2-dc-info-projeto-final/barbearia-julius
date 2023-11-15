<?php
session_start();
// Verifica se o usuário está logado
if (isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"]; // Obtém o email do usuário da sessão
    // Conectar ao banco de dados (substitua os detalhes com os seus)
    $conexao = new mysqli("localhost", "barbeariajulius", "123", "BARBEARIAJULIUS");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Consulta para obter o ID do usuário com base no email
    $query = "SELECT id_usuario, nome, email FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $emailUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    // Verifica se há resultados
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $id_usuario = $row['id_usuario'];
        $nomeUsuario = $row['nome'];
        $emailUsuario = $row['email'];
    } else {
        header("Location: pagina_cliente.php");
        exit;
    }

    // ... restante do código para atualizar os dados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $novo_nome = htmlspecialchars($_POST["novo_nome"]);
        $novo_email = htmlspecialchars($_POST["novo_email"]);

        // Preparar e executar a consulta SQL usando prepared statements
        $query_update = $conexao->prepare("UPDATE usuarios SET nome=?, email=? WHERE id_usuario=?");
        $query_update->bind_param("ssi", $novo_nome, $novo_email, $id_usuario);

        if ($query_update->execute()) {
            // Atualiza os dados na sessão para refletir as mudanças
            $_SESSION['email'] = $novo_email;

            // Redireciona de volta para a página de perfil após a alteração
            header("Location: pagina_cliente.php");
            exit();
        } else {
            echo "Erro ao atualizar os dados: " . $conexao->error;
        }
    }

    // Fechar a conexão
    $conexao->close();
} else {
    // Se o usuário não estiver logado, redirecione-o para a página de login
    header("Location: form_login.php");
    exit;
}
?>



<!-- ... (restante do código HTML) -->



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
                        <p><?php echo htmlspecialchars($nomeUsuario); ?></p>
                    </div>
                    <div class="informacao">
                        <h3>Email:</h3>
                        <p><?php echo htmlspecialchars($emailUsuario); ?></p>
                    </div>

                </div>
                <button class="alterar-dados-btn">Alterar Dados</button>
            </div>
        </div>
    </section>


    <div class="popup" id="alterarDadosPopup">
        <div class="popup-content">
            <span class="close-popup" id="fecharPopup">&times;</span>
            <form action="pagina_cliente.php" method="post">
                <!-- Incluindo um campo oculto para o ID do usuário -->
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>">   
                
                <label for="novo_nome">Novo Nome:</label>
                <input type="text" id="novo_nome" name="novo_nome" value="<?php echo htmlspecialchars($nomeUsuario); ?>" required>
                
                <label for="novo_email">Novo Email:</label>
                <input type="email" id="novo_email" name="novo_email" value="<?php echo htmlspecialchars($emailUsuario); ?>" required>
                
                <button type="submit" class="salvar-alteracoes-btn">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>
</html>







