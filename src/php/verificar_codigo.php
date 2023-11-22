<?php
session_start();
include 'conecta_mysqli.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoInserido = $_POST['codigo']; // Código inserido pelo usuário

    if (isset($_SESSION['temp_user_data'])) {
        $codigosPredefinidos = explode(',', $_SESSION['temp_user_data']['codigos_predefinidos']);

        // Verifica se o código inserido corresponde a um dos códigos predefinidos
        if (in_array($codigoInserido, $codigosPredefinidos)) {
            // Código correto, então cadastra o usuário
            $dadosUsuario = $_SESSION['temp_user_data'];
            $senha = $dadosUsuario['senha'];
            $nome = $dadosUsuario['nome'];
            // Resto do processo de cadastro do usuário...
            
            // Limpa os dados temporários após o cadastro
            unset($_SESSION['temp_user_data']);

            echo "Código correto! Usuário cadastrado com sucesso.";
            // Redireciona para alguma página após o cadastro bem-sucedido
            header("Location: login.php");
                exit();
        } else {
            echo "Código incorreto. Tente novamente.";
        }
    } else {
        echo "Erro: Nenhum dado de usuário temporário encontrado.";
    }
}


