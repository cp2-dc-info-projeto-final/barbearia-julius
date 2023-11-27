
<?php
session_start();
include 'enviar.php';
include '../inc/conecta_mysqli.inc';

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
    $verifica_email_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_usuario = mysqli_query($mysqli, $verifica_email_usuario);

    // Verificar se o e-mail já existe na tabela de funcionarios
    $verifica_email_funcionario = "SELECT * FROM funcionarios WHERE email = '$email'";
    $resultado_funcionario = mysqli_query($mysqli, $verifica_email_funcionario);

    // Verificar se o e-mail já existe na tabela de administradores
    $verifica_email_administrador = "SELECT * FROM administradores WHERE email = '$email'";
    $resultado_administrador = mysqli_query($mysqli, $verifica_email_administrador);

    if (mysqli_num_rows($resultado_usuario) > 0 || mysqli_num_rows($resultado_funcionario) > 0 || mysqli_num_rows($resultado_administrador) > 0) {
        $erros[] = "E-mail já cadastrado ou similar a um funcionário ou administrador. Por favor, escolha outro e-mail.";
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
    $_SESSION['temp_user_data'] = [
        'senha' => password_hash($senha, PASSWORD_DEFAULT),
        'nome' => $nome,
        'email' => $email
    ];

    $senha_cript = $_SESSION['temp_user_data']['senha'];

    $sql = "INSERT INTO usuarios (senha, nome, email) VALUES ('$senha_cript', '$nome', '$email')";

    if (mysqli_query($mysqli, $sql)) {
        // Envio de email de confirmação


    $mail = new PHPMailer(true);

    try {

        //Configurações do servidor
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Habilita a saída de debug (para fase de testes)
        $mail->isSMTP();                                            //Define o envio por meio do SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Define o servidor SMTP utilizado para o envio
        $mail->SMTPAuth   = true;                                   //Habilita a autenticação do SMTP
        $mail->Username   = 'barbeariajuliussac@gmail.com';               //usuário SMTP
        $mail->Password   = 'xqzzrnyqtybmstod';                      //senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Habilita a encriptação implícita TLS
        $mail->Port       = 587;                                    //Porta TCP de conexão; use 587 se você tiver configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Remetente e destinatário
        $mail->setFrom('barbeariajuliussac@gmail.com', 'Barbearia Julius');
        $mail->addAddress($email, $nome);

        // Assunto do email
        $assunto = 'Confirme seu email';

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $link_confirmacao = "$codigo"; // Substitua pelo seu domínio
        $mail->Body = 'Olá ' . $nome . 'Seu email foi confirmado.' . '>Confirmar cadastro</a>';

        $mail->send();
        
        // Redirecionamento após o envio do email
        header("Location: form_login.php");
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
