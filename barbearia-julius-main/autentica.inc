<?php
    session_start();
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    }
    if(isset($_SESSION["senha"])){
        $senha = $_SESSION["senha"];
    }
    if(empty($email) or empty($senha)){
        $_SESSION['erro_login'] = "Você não fez o login!";
        header("Location: form_login.php");
        exit;
    }
    else{
        include "conecta_mysqli.inc";
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $res = mysqli_query($mysqli,$sql);

        /* Testa se não encontrou o email */
        if (mysqli_num_rows($res) != 1){
            unset($_SESSION[$email]);
            unset($_SESSION[$senha]);
            echo "Você não fez o login!";
            echo "<p><a href='login.php'>Página de login</a></p>";
            exit;
        }
        else {
            $usuario = mysqli_fetch_array($res);

            /* Testa se a senha está errada */
            
            if(!hash_equals($senha,$usuario["senha"])){
                unset($_SESSION[$email]);
                unset($_SESSION[$senha]);
                echo "Você não fez o login!";
                echo "<p><a href='login.php'>Página de login</a></p>";
                exit;
            }
        }
        mysqli_close($mysqli);
    }
?>