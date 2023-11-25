<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">

    <title>Formulário de Login</title>
    
</head>
<body>
    <div class="container">
        <?php 
            session_start();
            if (isset($_SESSION["erro_login"])) {
                echo '<p class="error">' . $_SESSION["erro_login"] . '</p>';
                unset($_SESSION["erro_login"]);
            } elseif (isset($_SESSION["senha_invalida"])) {
                echo '<p class="error">' . $_SESSION["senha_invalida"] . '</p>';
                unset($_SESSION["senha_invalida"]);
            }
        ?>
        <h1>Login</h1>
        <form action="login.php" method="POST">
        <div class="input-field">
            <label for="email">Email:</label>
            <span class="icon-input">
                <i class="fas fa-user"></i>
                <input type="email" id="email" name="email">
            </span>
        </div>
        <div class="input-field">
            <label for="senha">Senha:</label>
            <span class="icon-input">
                <i class="fas fa-lock"></i>
                <input type="password" id="senha" name="senha">
            </span>
        </div>

            <p><input type="submit" class="rounded-button" value="Entrar"></p>
            <a href="form_cadastro.php" class="logout-link">Cadastre-se</a>
            <a href="reseta_senha.php">Esqueceu a senha?</a>

        </form>
    </div>
</body>
</html>
