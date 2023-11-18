<?php
    include "enviar.php";

    $nome = "Fulano de tal";
    $data = "23/10/2023";
    $email = "kanacarolinepop@gmail.com";

    $assunto = "Exemplo de e-mail pelo PHP";

    $mensagem = "Dados cadastros:<br>";
    $mensagem .= "<br><b>Nome:</b> $nome";
    $mensagem .= "<br><b>Data:</b> $data";
    $mensagem .= "<br><b>E-mail:</b> $email";

    if(envia_email($email, $assunto, $mensagem)){
        echo "E-mail enviado com sucesso!";
    }
    else{
        echo "Falha no envio do e-mail";
    }
?>
