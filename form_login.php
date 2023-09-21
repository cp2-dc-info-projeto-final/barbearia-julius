<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Formulário de Login</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(120deg, #000, #94095e); /* Gradiente de preto para roxo */
            color: #fff;
        }

        body {
            background-image: url('fundo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(120deg, rgba(0, 0, 0, 0.5), rgba(128, 0, 128, 0.5));
            z-index: -1;
        }


        body {
            position: relative;
        }


        .container {
            background: linear-gradient(135deg, #94095e, #000);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            width: 340px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02); 
            box-shadow: 0px 12px 40px rgba(0, 0, 0, 0.3);
        }

        .error {
            color: #ff4d4d; /* Cor de erro mais viva */
            font-weight: bold;
            margin-bottom: 15px;
        }

        .input-field {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-field label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold; /* Etiquetas em negrito */
        }

        .input-field input {
            width: 90%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #eee; /* Cor de fundo mais clara para os campos de entrada */
            color: #333; /* Cor de texto mais escura */
            transition: background 0.3s, transform 0.3s;
        }

        .input-field input:focus {
            background: #fff;
            transform: scale(1.02); /* Efeito zoom no foco */
        }

        .icon-input {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .icon-input i {
            position: absolute;
            left: 10px;  /* Posição do ícone dentro do campo de entrada */
            top: 50%;
            transform: translateY(-50%);
            color: #666;  /* Cor do ícone */
        }

        .icon-input input {
            padding-left: 30px;  /* Espaço à esquerda para o ícone */
        }


        .rounded-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px; /* Arredondamento mais pronunciado */
            padding: 10px 25px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .rounded-button:hover {
            background-color: #0056b3;
            transform: scale(1.05); /* Efeito de zoom no botão ao passar o mouse */
        }

        .logout-link {
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        .logout-link:hover {
            text-decoration: underline;
            color: #0056b3;
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

            <p><input type="submit" class="rounded-button" value="Enviar"></p>
            <a href="index.php" class="logout-link">Cadastre-se</a>

        </form>
    </div>
</body>
</html>
