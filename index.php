<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif; /* Uma fonte alternativa */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        .input-field {
            margin-bottom: 15px;
            text-align: left;
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

        .logout-link {
            margin-top: 15px;
            text-decoration: none;
            color: #007bff; /* Cor do link LOGOUT */
            font-weight: bold;
            font-size: 16px;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="operacao" value="cadastrar">
            
            <div class="input-field">
                Nome: <input type="text" name="nome" placeholder="Escreva seu nome">
            </div>
            <div class="input-field">
                Senha: <input type="text" name="senha" placeholder="Digite sua senha">
            </div>
            <div class="input-field">
                E-mail: <input type="text" name="email">
            </div>
            <p><input type="submit" class="rounded-button" value="Enviar"></p>
        </form>
        <a href="logout.php" class="logout-link">Login</a>
    </div>
</body>
</html>
