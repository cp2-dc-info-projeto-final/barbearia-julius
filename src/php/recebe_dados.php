<?php
session_start();
include 'enviar.php';
include 'conecta_mysqli.inc';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$operacao = $_POST["operacao"];
$erros = [];

if ($operacao == "cadastrar") {
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Verificar se o e-mail já existe na tabela de usuários
    $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($mysqli, $verifica_email);

    if (mysqli_num_rows($resultado) > 0) {
        $erros[] = "E-mail já cadastrado. Por favor, escolha outro e-mail.";
    }

    if (empty($senha) || strlen($senha) < 6) {
        $erros[] = "Preencha sua senha com pelo menos 6 caracteres.";
    }

    if (empty($nome) || !preg_match('/\S+\s+\S+/', $nome)) {
        $erros[] = "Preencha seu nome completo (nome e sobrenome).";
    }

    if (count($erros) > 0) {
        $_SESSION['cadastro_erros'] = $erros;
        header("Location: form_cadastro.php");
        exit();
    }
     
    // Armazene os dados do usuário temporariamente até a confirmação do email
    // Códigos predefinidos
    $codigos_predefinidos = ['ABC12', 'DEF34', 'GHI56', 'JKL78', 'MNO90'];
    $usuario_id = $id_cod; // Aqui, defina o ID do usuário para o qual esses códigos estão sendo inseridos

    foreach ($codigos_predefinidos as $codigo) {
        $sql = "INSERT INTO codigos_predefinidos (codigo, usuario_id) VALUES ('$codigo', $usuario_id)";
        
        // Execute a consulta SQL
        if (mysqli_query($mysqli, $sql)) {
            echo "Códigos predefinidos inseridos com sucesso!";
        } else {
            echo "Erro ao inserir códigos predefinidos: " . mysqli_error($mysqli);
        }
    }
    
    // Armazene os dados do usuário temporariamente até a confirmação do email
    // ... (código anterior)

// Armazene os dados do usuário temporariamente até a confirmação do email
    $_SESSION['temp_user_data'] = [
        'senha' => password_hash($senha, PASSWORD_DEFAULT),
        'nome' => $nome,
        'email' => $email,
        'codigos_predefinidos' => implode(',', $codigos_predefinidos)
    ];

    $senha_cript = $_SESSION['temp_user_data']['senha'];

    
    $sql = "INSERT INTO usuarios (senha, nome, email) VALUES ('$senha_cript', '$nome', '$email')";


// Restante do código para envio de e-mail...

        if (mysqli_query($mysqli, $sql)) {
            // Envio de email de confirmação


        $mail = new PHPMailer(true);

        try {

            //Configurações do servidor
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Habilita a saída de debug (para fase de testes)
            $mail->isSMTP();                                            //Define o envio por meio do SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Define o servidor SMTP utilizado para o envio
            $mail->SMTPAuth   = true;                                   //Habilita a autenticação do SMTP
            $mail->Username   = 'lp3.turma2023@gmail.com';               //usuário SMTP
            $mail->Password   = 'tpqlektljcpmnfga';                      //senha SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Habilita a encriptação implícita TLS
            $mail->Port       = 587;                                    //Porta TCP de conexão; use 587 se você tiver configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Remetente e destinatário
            $mail->setFrom('lp3.turma2023@gmail.com', 'Site do Professor');
            $mail->addAddress($email, $nome);

            // Assunto do email
            $assunto = 'Confirme seu email';

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $link_confirmacao = "$codigo"; // Substitua pelo seu domínio
            $mail->Body = 'Olá ' . $nome .'Seu codigo é' . $codigo . '">Confirmar cadastro</a>';

            $mail->send();
            
            // Redirecionamento após o envio do email
            header("Location: inserir.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['cadastro_erros'] = ["Erro ao enviar o email de confirmação: " . $e->getMessage()];
            header("Location: form_cadastro.php");
            exit();
        }
    } else {
        $_SESSION['cadastro_erros'] = ["Erro ao cadastrar usuário: " . mysqli_error($mysqli)];
        header("Location: form_cadastro.php");
        exit();
    }
}

mysqli_close($mysqli);
?>