<?php
session_start();

include '../inc/conecta_mysqli.inc';
include 'enviar.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailUsuario = $_POST["email"];

    $conexao = new mysqli("localhost", "barbeariajulius", "123", "BARBEARIAJULIUS");

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $sql = "SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $emailUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $emailUsuarioBD = $row['email'];

        // Gera uma nova senha
        $novaSenha = generateRandomPassword();

        // Atualiza a senha no banco de dados
        $hashedNovaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmtUpdate = $conexao->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ss", $hashedNovaSenha, $emailUsuarioBD);

        if ($stmtUpdate->execute()) {
            // Define a nova senha na sessão
            $_SESSION["email"] = $emailUsuarioBD;
            $_SESSION["nova_senha"] = $novaSenha;

            // Envie a nova senha por e-mail
            envia_email($emailUsuarioBD, "Redefinição de Senha", "Sua nova senha é: $novaSenha");

            echo "Uma nova senha foi enviada para o seu e-mail.";
        } else {
            echo "Erro ao atualizar a senha: " . $stmtUpdate->error;
        }

        $stmtUpdate->close();
    } else {
        echo "E-mail não encontrado no banco de dados.";
    }

    // Feche a conexão com o banco de dados
    $conexao->close();
}

// Função para gerar senha aleatória
function generateRandomPassword($length = 8) {
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $senha = "";
    for ($i = 0; $i < $length; $i++) {
        $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $senha;
}



?>