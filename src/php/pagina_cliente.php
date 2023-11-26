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


$conexao = new mysqli("localhost", "barbeariajulius", "123", "BARBEARIAJULIUS");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$query = "SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("s", $emailUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $id_usuario = $row['id_usuario'];
    $nomeUsuario = $row['nome'];
    $emailUsuario = $row['email'];
    $senha_hash = $row['senha'];
} else {
    echo "Usuário não encontrado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["novo_nome"])) {
        $novo_nome = htmlspecialchars($_POST["novo_nome"]);
        $novo_email = htmlspecialchars($_POST["novo_email"]);
        

        // Atualiza a senha, nome e email no banco de dados
        $query_update = $conexao->prepare("UPDATE usuarios SET  nome=?, email=? WHERE id_usuario=?");
        $query_update->bind_param("ssi", $novo_nome, $novo_email, $id_usuario);

        if ($query_update->execute()) {
            // Atualiza os dados na sessão para refletir as mudanças
            $_SESSION['email'] = $novo_email;

            // Redireciona de volta para a página de perfil após a alteração
            header("Location: pagina_cliente.php");
            exit();
        }else {
            echo "Erro ao atualizar os dados: " . $conexao->error;
        }
    }

    else {
        $senha_antiga = $_POST["senha_antiga"];
        $nova_senha = $_POST["nova_senha"];
        $confirmar_senha = $_POST["confirmar_senha"];

        // Verifica se a senha antiga está correta
        if (password_verify($senha_antiga, $senha_hash)) {
            // Verifica se a nova senha e a confirmação coincidem
            if ($nova_senha === $confirmar_senha) {
                // Hash da nova senha
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                // Atualiza a senha no banco de dados
                $query_update = $conexao->prepare("UPDATE usuarios SET senha=? WHERE id_usuario=?");
                $query_update->bind_param("si", $nova_senha_hash, $id_usuario);

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
}

// Fechar a conexão
$conexao->close();
?>


<!-- ... (restante do código HTML) -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagina_cliente.css">
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
            <a href="#"><img src="../img/logo.png" alt="" class="logo"></a>
            <nav class="navegation">
                <ul>
                    <li><a class="nav" href="../html/logado.html">Página Principal</a></li>
                    <li><a class="nav" href="agendamento.php">Agendamento</a></li>
                    <li><a class="nav" href="../php/pagina_cliente.php">Página Cliente</a></li>
                    <li><a class="nav" href="../php/logout.php">Sair</a></li>
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
                <button class="alterar-dados-btni">Alterar Senha</button>
                <button class="alterar-dados-btni" onclick="window.location.href = 'meus_agendamentos.php';">Meus Agendamentos</button>
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
                <input type="email" id="novo_email" name="novo_email" value="<?php echo htmlspecialchars($emailUsuario); ?>" required >
 
                <button type="submit" class="salvar-alteracoes-btn">Salvar Alterações</button>
            </form>

            </form>
        </div>
    </div>




    <div class="contenti">
    <div class="popup" id="alterarDadosPopupi">
        <div class="popup-contenti">
            <span class="close-popup" id="fecharPopupi">&times;</span>
            <form action="pagina_cliente.php" method="post">
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>"> 
                
                <form action="pagina_cliente.php" method="post">

                <label for="senha_antiga">Senha Antiga:</label>
                <input type="password" id="senha_antiga" name="senha_antiga" required>

                <label for="nova_senha">Nova Senha:</label>
                <input type="password" id="nova_senha" name="nova_senha" required>

                <label for="confirmar_senha">Confirmar Nova Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <button type="submit" class="salvar-alteracoes-btni">Salvar Alterações</button>
            </form>

            </form>
        </div>
    </div>
    </div>
        
</body>
</html>