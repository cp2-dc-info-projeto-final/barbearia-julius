<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #333; /* Tema escuro de fundo */
            color: #fff; /* Cor do texto */
        }

        .container {
            background-color: #444; /* Cor de fundo do contêiner */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .error {
            color: red;
        }

        .input-field {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-field label {
            display: block;
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .rounded-button {
            background-color: #007bff; /* Cor de fundo do botão */
            color: #fff; /* Cor do texto do botão */
            border: none;
            border-radius: 20px; /* Arredonda o botão */
            padding: 10px 20px;
            cursor: pointer;
        }

        .rounded-button:hover {
            background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
            session_start();
            if(isset($_SESSION["erro_login"])){
                echo '<p class="error">' . $_SESSION["erro_login"] . '</p>';
                unset($_SESSION["erro_login"]);
            }
            elseif(isset($_SESSION["senha_invalida"])){
                echo '<p class="error">' . $_SESSION["senha_invalida"] . '</p>';
                unset($_SESSION["senha_invalida"]);
            }
        ?>
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div class="input-field">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="input-field">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
            </div>
            <p><input type="submit" class="rounded-button" value="Enviar"></p>
        </form>
    </div>
</body>
</html>
