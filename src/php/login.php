<?php
include "../inc/conecta_mysqli.inc";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta na tabela de administradores
$sql_admin = "SELECT * FROM administradores WHERE email = '$email';";
$res_admin = mysqli_query($mysqli, $sql_admin);

if (mysqli_num_rows($res_admin) == 1) {
    // Verifica a senha do administrador
    $admin = mysqli_fetch_array($res_admin);
    if ($senha == $admin["senha"]) {
        $_SESSION["tipo_usuario"] = 'administrador';
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $admin["senha"];
        header("Location: adm_visu.php");
        exit;
    } else {
        $_SESSION['senha_invalida'] = "Senha de administrador incorreta!";
        header("Location: form_login.php");
        exit;
    }
} else {
    // Consulta na tabela de funcionarios
    $sql_funcionario = "SELECT * FROM funcionarios WHERE email = '$email';";
    $res_funcionario = mysqli_query($mysqli, $sql_funcionario);

    if (mysqli_num_rows($res_funcionario) == 1) {
        $funcionario = mysqli_fetch_array($res_funcionario);

        // Verifica a senha do funcionário
        if (password_verify($senha, $funcionario["senha"])) {
            $_SESSION["tipo_usuario"] = 'funcionario';
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $funcionario["senha"];
            $_SESSION["id_funcionario"] = $funcionario["id_funcionario"]; // Armazena o ID do funcionário na sessão
            header("Location: tela_funcionario.php");
            exit;
        } else {
            $_SESSION['senha_invalida'] = "Senha de funcionário incorreta!";
            header("Location: form_login.php");
            exit;
        }
    } else {
        // Consulta na tabela de usuários
        $sql_user = "SELECT id_usuario, email, senha FROM usuarios WHERE email = '$email';";
        $res_user = mysqli_query($mysqli, $sql_user);

        if (mysqli_num_rows($res_user) == 1) {
            $usuario = mysqli_fetch_array($res_user);

            if (password_verify($senha, $usuario["senha"])) {
                $_SESSION["email"] = $email;
                $_SESSION["senha"] = $usuario["senha"];
                $_SESSION["id_usuario"] = $usuario["id_usuario"]; // Armazena o ID do usuário na sessão
                header("Location: agendamento.php");
                exit;
            } else {
                $_SESSION['senha_invalida'] = "Senha de usuário incorreta!";
                header("Location: form_login.php");
                exit;
            }
        } else {
            $_SESSION['erro_login'] = "E-mail inválido!";
            header("Location: form_login.php");
            exit;
        }
    }
}

mysqli_close($mysqli);
?>
