<?php  include 'conecta_mysqli.inc';?>

<html>
    <head>
        <title>Recebe Dados</title>
        <meta charset="UTF-8">
    </head>
    <body>

        <?php
            $operacao = $_REQUEST["operacao"];
            if($operacao == "cadastrar"){
                
                $senha = $_POST["senha"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];

                $erro = 0;
                
                if(empty($senha) OR strlen($senha) < 8){
                    echo "Preencha sua senha com pelo menos 8 caracteres.<br>";
                    $erro = 1;
                }
                
                if(empty($nome) OR strstr($nome, " ") == FALSE){
                    echo "Preencha seu nome com sobrenome.<br>";
                    $erro = 1;
                }
                
                if(strlen($email) < 8 || strstr($email, "@") == FALSE){
                    echo "Favor, digitar o e-mail com pelo menos 8 caracteres.<br>";
                    $erro = 1;
                }
                
                if($erro == 0){
                    $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios ( senha, nome, email)";
                    $sql .= "VALUES ('$senha_cript','$nome','$email')";
                    if(!mysqli_query($mysqli,$sql)){
                        echo mysqli_error($mysqli);
                    }
                    header("Location: form_login.php");
                }
            }
            
            
        ?>
    </body>
</html>
<?php
    mysqli_close($mysqli);
 ?>