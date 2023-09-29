<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/cadastro.css">

    <title>Formulário de Cadastro</title>
</head>
<body>
    <div class="container">

        <?php
            session_start();
            if(isset($_SESSION["cadastro_erros"]) && count($_SESSION["cadastro_erros"]) > 0){
                
               
                foreach ($_SESSION["cadastro_erros"] as $erro) {
                    echo '<li class="error">' . $erro . '</li>';
                }
                
                unset($_SESSION["cadastro_erros"]);
            }
        ?>

        <h1>Cadastro</h1>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="operacao" value="cadastrar">
            
            <div class="input-field">
                <label for="nome"><i class="fas fa-user"></i> Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="input-field">
                <label for="email"><i class="fas fa-envelope"></i> E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-field">
                <label for="senha"><i class="fas fa-lock"></i> Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <p><input type="submit" class="rounded-button" value="Cadastrar"></p>
        </form>
        <a href="form_login.php" class="logout-link">Login</a>
    </div>
</body>
</html>

