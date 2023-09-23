<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(120deg, #6f0048, #94095e, #bb2f7e); /* Gradiente de preto para roxo */
            color: #fff;
        }

        body {
            background-image: url('img/background.jpg');
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

        .input-field {
            margin-bottom: 20px;
            text-align: left;
            font-weight: bold; /* Etiquetas em negrito */
        }

        .input-field label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold; /* Etiquetas em negrito */
        }

        .input-field label i {
            margin-right: 5px;  /* Espaçamento entre o ícone e o texto */
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
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s; /* Transição suave da cor */
        }

        .logout-link:hover {
            text-decoration: underline;
            color: #0056b3; /* Cor do link ao passar o mouse */
        }


        .error {
            color: #ff4d4d; /* Cor vermelha para as mensagens de erro individuais */
            list-style-type: none;
        }

        

    </style>
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