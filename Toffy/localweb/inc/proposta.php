<?php
require_once "../classes/recaptchalib.php";
require("../classes/utilitario.php");
require('../classes/PHPMailer.php');
require('../classes/SMTP.php');
require('../classes/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;

$validacao = new utilitario();

$sistema = "SISTEMAS, CONSULTORIA, WEB SITES";


// definir a chave secreta
$secret = "6LdI3AMbAAAAACqrERQpcJLjP6jrmKMZNni6UGX9";

// verificar a chave secreta
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
}


//envio para o cliente
if (isset($_POST['nome']) && !empty($_POST['nome']) && $response != null && $response->success) //setado e não vazio
{

    $nome =$validacao->validaDados($_POST['nome']);
    $email =$validacao->validaEmail($_POST['email']);

    //if($_POST['email']!=''){$email = $_POST['email'] ; }else{ $email='não comunicado'; }

    $mailer = new PHPMailer();
    $mailer->Encoding = 'base64';
    $mailer->CharSet = 'UTF-8';
    $mailer->IsSMTP();
    $mailer->SMTPOptions = array('ssl'=> array(	'verify_peer'=>false,
                                                'verify_peer_name' => false,
                                                'allow_self_signed' => true ) );
//    $mailer->SMTPDebug = 1;
    $mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.

    $mailer->Host = 'smtp.toffy.com.br'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
    //Para cPanel: 'localhost';
    //Para Plesk 11 / 11.5: 'smtp.dominio.com.br';

    //Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
    //$mailer->SMTPSecure = 'tls';

    $mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
    $mailer->Username = 'no-reply@toffy.com.br'; //Informe o e-mai o completo
    $mailer->Password = 'Toffy@2021@nr'; //Senha da caixa postal
    $mailer->FromName = 'TOFFY'; //Nome que será exibido para o destinatário
    $mailer->From = 'no-reply@toffy.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
    $mailer->AddAddress($email,$nome); //Destinatários
//    $mailer->AddCC('contato@toffy.com.br', 'Contato'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    $mailer->Subject = 'TOFFY : Notificação de Mensagem';
    $mailer->IsHTML(true);

    $message = "Olá,<p><b>$nome</b> recebemos o seu e-mail em breve retornaremos</p><hr><p>Equipe Toffy</p>";

    $mailer->Body = utf8_decode($message);

    $mailer->send();

}

//
if (isset($_POST['nome']) && !empty($_POST['nome']) && $response != null && $response->success) //setado e não vazio
{
    #region
    $nome =$validacao->validaDados($_POST['nome']);
    $telefone = $_POST['telefone'] ; //ja validado
    $whatsapp = $_POST['whatsapp'] ; //ver depois
    $email =$validacao->validaEmail($_POST['email']);

    $midia = $_POST['midia'] ;
    $servico = $_POST['servicos'];
    $mensagem = $validacao->validaDados($_POST['mensagem']);
    //if($_POST['email']!=''){$email = $_POST['email'] ; }else{ $email='não comunicado'; }
    #endregion
    $mailer = new PHPMailer();
    $mailer->Encoding = 'base64';
    $mailer->CharSet = 'UTF-8';
    $mailer->IsSMTP();
    $mailer->SMTPOptions = array('ssl'=> array(	'verify_peer'=>false,
        'verify_peer_name' => false,
        'allow_self_signed' => true ) );
//    $mailer->SMTPDebug = 1;
    $mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.

    $mailer->Host = 'smtp.toffy.com.br'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
    //Para cPanel: 'localhost';
    //Para Plesk 11 / 11.5: 'smtp.dominio.com.br';

    //Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
    //$mailer->SMTPSecure = 'tls';

    $mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
    $mailer->Username = 'no-reply@toffy.com.br'; //Informe o e-mai o completo
    $mailer->Password = 'Toffy@2021@nr'; //Senha da caixa postal
    $mailer->FromName = 'TOFFY'; //Nome que será exibido para o destinatário
    $mailer->From = 'no-reply@toffy.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
    $mailer->AddAddress("no-reply@toffy.com.br","No-Reply"); //Destinatários
//    $mailer->AddCC('contato@toffy.com.br', 'Contato'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    $mailer->Subject = 'TOFFY : Solicitação de Mensagem';
    $mailer->IsHTML(true);

    $ip = $_SERVER['REMOTE_ADDR'];

    $message = "Olá,<p><b>$nome</b> entrou em contato com você.</p>
	<hr><p>Nome: $nome</p>
	<p>E-mail: $email</p>
	<p>Telefone: $telefone Whatsapp: $whatsapp </p><hr><p>Sistemas: $sistema </p>
	<p>Como conheceu o projeto?: $midia</p>
	<p>Que tipo de serviço você precisa?: $servico</p>
	<p>Ip: $ip</p>
	<p>Mensagem: <br> $mensagem</p>" ;

    $mailer->Body = $message;

    $enviado = $mailer->send();
    if($enviado){
        echo "<script>
                        alert('Ok! mensagem enviada com sucesso!');
                        window.location.replace('../index.php#contato');
        </script>";
    }
    else echo "<script>alert('ERRO! mensagem NÃO foi enviada com sucesso!');window.location.replace('../index.php#contato');</script>";
}

//header('Location:../index.php');

?>