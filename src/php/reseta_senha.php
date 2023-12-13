<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reseta_senha.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Seus Dados - Barbearia Julius</title>
</head>
<body>
<h1> Recuperação de conta</h1> 
<p>Para ajudar a proteger sua conta, vamos confirmar se é realmente você que está tentando fazer login</p>
<div class="content">
        <h2>Verifique seu Email. Enviaremos uma nova senha para o seu Email. Após recebê-la, tente novamente com a senha enviada.</h2>
</div>
    <section>
        <div class="circle"></div>
        <header>
            <form action="reseta.php" method="post">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Redefinir Senha</button>
        </header>
    </section>
</body>
</html>

