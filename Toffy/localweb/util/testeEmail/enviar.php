<?php
require_once('class/PHPMailer.php');
require_once('class/SMTP.php');
require_once('class/Exception.php');
require ('../utilitarios/utilitario.php');

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$validacao = new utilitario();
try {
//	$mail->SMTPDebug = 4;

    $email = $validacao->validaEmail($_POST["email"]);
    $nome = $validacao->validaDados($_POST['nome']);

	$mail->isSMTP();
	$mail->SMTPOptions = array('ssl'=> array(	'verify_peer'=>false,
												'verify_peer_name' => false, 
												'allow_self_signed' => true ) );
	$mail->Host = 'smtp.toffy.com.br';
	$mail->SMTPAuth = true;
	$mail->Username = 'contato@toffy.com.br';
	$mail->Password = 'Toffy@2021@contato';
	$mail->Port = 587;

	$mail->setFrom('contato@toffy.com.br',"Contato"); //de
    $mail->addAddress($email,$nome);
    $mail->addCC('contato@toffy.com.br');

	$mail->isHTML(true);
	$mail->Subject = utf8_decode($_POST['assunto']);
	$message =
        "<h3>Nome:".$nome."</h3>\n 
         <h4>Mensagem:</h4><p>".$_POST['mensagem']."</p>";
    $valor = 0;
	$$valor = 1;
	$mail->Body = $validacao->validaDados(utf8_decode($message));
//	$mail->AltBody = 'Comunicado 24/05/2021';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: $mail->ErrorInfo";
}