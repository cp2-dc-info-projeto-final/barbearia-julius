<?php
include "../inc/conecta_mysqli.inc";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta na tabela de administradores
$sql_admin = "SELECT * FROM administradores WHERE email = '$email';";
$res_admin = mysqli_query($mysqli, $sql_admin);

if (mysqli_num_rows($res_admin) == 1) {
    $admin = mysqli_fetch_array($res_admin);
    
    // Verifica a senha do administrador sem criptografia
    if ($senha == $admin["senha"]) { // Comparação simples
        $_SESSION["tipo_usuario"] = 'administrador';
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $admin["senha"];
        // Direciona para a página de administração
        header("Location: adm_visu.php");
        exit;
    } else {
        $_SESSION['senha_invalida'] = "Senha de administrador incorreta!";
        header("Location: form_login.php");
        exit;
    }
}


elseif (mysqli_num_rows($res_funcionario) == 1) {
    $funcionario = mysqli_fetch_array($res_funcionario); 
    $sql_funcionario = "SELECT * FROM funcionarios WHERE email = '$email';";
    $res_funcionario = mysqli_query($mysqli, $sql_funcionario);
        // Verifica se a senha do funcionário está correta
        if ($senha == $funcionario["senha"]) {
            $_SESSION["tipo_usuario"] = 'funcionario';
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $funcionario["senha"];
            // Direciona para a página do funcionário
            header("Location: tela_funcionario.php");
            exit;
        } else {
            $_SESSION['senha_invalida'] = "Senha de funcionário incorreta!";
            header("Location: form_login.php");
            exit;
        }
    } else {
        // Se não for encontrado na tabela de funcionários, busca na tabela de usuários
        $sql_user = "SELECT * FROM usuarios WHERE email = '$email';";
        $res_user = mysqli_query($mysqli, $sql_user);

        if (mysqli_num_rows($res_user) == 1) {
            $usuario = mysqli_fetch_array($res_user);

            // Verifica se a senha do usuário está correta usando password_verify()
            if (password_verify($senha, $usuario["senha"])) {
                $_SESSION["email"] = $email;
                $_SESSION["senha"] = $usuario["senha"];
                // Direciona para a página inicial do usuário
                header("Location: agendamento.php");
                exit;
            } else {
                $_SESSION['senha_invalida'] = "Senha de usuário incorreta!";
                header("Location: form_login.php");
                exit;
            }
        } else {
            $_SESSION['erro_login'] = "E-mail não encontrado!";
            header("Location: form_login.php");
            exit;
        }
    }


mysqli_close($mysqli);
?>
