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

    // Consulta para obter o ID, nome, email e senha hash do usuário com base no email
    $query = "SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = ?";
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
        $senha_hash = $row['senha']; // Definindo a variável $senha_hash
    } else {
        header("Location: form_login.php"); // Redireciona para a página de login se não houver resultados
        exit;
    }

    // ... restante do código para atualizar os dados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $senha_antiga = $_POST["senha_antiga"];
        $nova_senha = $_POST["nova_senha"];
        $confirmar_senha = $_POST["confirmar_senha"];
        $novo_nome = $_POST["novo_nome"];
        $novo_email = $_POST["novo_email"];

        // Verifica se a senha antiga está correta
        if (password_verify($senha_antiga, $senha_hash)) {
            // Verifica se a nova senha e a confirmação coincidem
            if ($nova_senha === $confirmar_senha) {
                // Hash da nova senha
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                // Atualiza a senha, nome e email no banco de dados
                $query_update = $conexao->prepare("UPDATE usuarios SET senha=?, nome=?, email=? WHERE id_usuario=?");
                $query_update->bind_param("sssi", $nova_senha_hash, $novo_nome, $novo_email, $id_usuario);

                if ($query_update->execute()) {
                    // Redireciona de volta para a página de perfil após a alteração
                    header("Location: pagina_cliente.php");
                    exit();
                } else {
                    echo "Erro ao atualizar os dados: " . $conexao->error;
                }
            } else {
                echo "A nova senha e a confirmação não coincidem.";
            }
        } else {
            echo "Senha antiga incorreta.";
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
                <input type="password" id="senha_antiga" name="senha_antiga" required>
                <input type="password" id="nova_senha" name="nova_senha" required>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <button type="submit" class="salvar-alteracoes-btn">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>
</html>