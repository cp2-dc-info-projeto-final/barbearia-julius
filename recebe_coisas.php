<?php include 'conecta_mysqli.inc'?>


<html>
    <head>
    <title> Recebendo Dados</title> 
     </head>
     <body>
        <?php
            $operacao = $_POST["operacao"];
            if ($operacao == "cadastrar"){
                $confirmar_senha = $_POST["confirmar_senha"];
                $senha = $_POST["senha"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                

                $erro = 0;
                
                if(empty($senha) or strlen($senha) < 8){
                    echo "Preencha sua senha com pelo menos 8 caracteres.<br>";
                    $erro = 1;
                }              
                
                if($confirmar_senha != $senha){
                    echo "Digite uma senha compatível.<br>";
                    $erro = 1;
                }

                if(empty($nome) or strstr($nome, " ") == false){
                    echo "Preencha seu nome com sobrenome.<br>";
                    $erro = 1;
                }

                if (strlen($email) < 8 || strstr($email, "@") == false){
                    echo "Favor, digitar o email corretamente com pelo menos 8 caracteres.<br>";
                    $erro = 1;
                }

                if($erro == 0){
                    $mysqli = mysqli_connect("localhost", "barbeariajulius","123","BARBEARIAJULIUS");
                    $sql = "INSERT INTO usuarios (senha, nome, email)";
                    $sql .= "VALUES ('$senha', '$nome', '$email')";
                    if(!mysqli_query($mysqli, $sql)){
                        echo mysqli_error($mysqli);
                    }
                    echo "<br>O usuário foi cadastrado com sucesso!";

                }
             }
        elseif($operacao == "exibir"){
            $sql = "SELECT * FROM usuarios;";
            $res = mysqli_query($mysqli, $sql);
            $linhas = mysqli_num_rows($res);
    
            for($i=0; $i< $linhas; $i++){
                $usuario = mysqli_fetch_array($res);
                echo "senha: ".$usuario["senha"]."<br>";
                echo "nome: ".$usuario["nome"]."<br>";
                echo "email: ".$usuario["email"]."<br>";
                echo" -----------------------------------<br>";
            }
                
        }
        ?>
    </body>
</html>
<?php
mysqli_close($mysqli);
?>