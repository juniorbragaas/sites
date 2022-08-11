
<html>
<?php include "../config/caminho_servidor.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Ceal Express</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content=""><link rel="shortcut icon" href="<?= $caminho_servidor ?>/imagens/ico/favicon.png"> 
<?php include "../inc/css.php"; ?>
</head>
<body id="voltarTopo">
<?php
include "../inc/header.php";
?>
<?php
if (isset($_POST['name']) && $_POST['name']!='')
{
if (isset($_REQUEST['name']) && $_REQUEST['name']!='')
			$name = $_REQUEST['name'] ;
  if($_REQUEST['email']!=''){$email = $_REQUEST['email'] ; }else{ $email='não comunicado'; }
  if($_REQUEST['phone']!='' ){$phone = $_REQUEST['phone']; }else{ $phone="não comunicado"; }
  if($_REQUEST['cel']!='' ){$cel = $_REQUEST['cel'] ; }else{ $cel="Não comunicado";}
  if($_REQUEST['subject']!=''){$sub = $_REQUEST['subject'] ; }else{ $sub="Não comunicado"; }
			require_once('../classes/class.phpmailer.php');
 
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 587; //Indica a porta de conexÃ£o para a saÃ­da de e-mails. Utilize obrigatoriamente a porta 587.
 
$mailer->Host = '186.202.127.109'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
//Para cPanel: 'localhost';
//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
 
//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
//$mailer->SMTPSecure = 'tls';
 
$mailer->SMTPAuth = true; //Define se haverÃ¡ ou nÃ£o autenticaÃ§Ã£o no SMTP
$mailer->Username = 'mailer@cealexpress.com.br'; //Informe o e-mai o completo
$mailer->Password = 'street943'; //Senha da caixa postal
$mailer->FromName = 'Contato Ceal Express'; //Nome que serÃ¡ exibido para o destinatÃ¡rio
$mailer->From = 'mailer@cealexpress.com.br'; //ObrigatÃ³rio ser a mesma caixa postal indicada em "username"
$mailer->AddAddress('mailer@cealexpress.com.br'); //DestinatÃ¡rios
$mailer->Subject = 'Ceal Express : Contato pelo site';
$mailer->IsHTML(true); 

$message = "Olá,<p>".$name." tem contato com você.</p><p>E-mail: ".$email."</p><p>Assunto: ".$sub."</p><p>Telefone: ".$phone."</p><p>Celular: ".$cel."</p>" ;

$mailer->Body = $message;
if(!$mailer->Send())
{
echo "Mensagem nao enviada";
echo "Erro: " . $mailer->ErrorInfo; exit; 
}
else
{
echo '  
<br><br>
<div class="alert alert-success">
              <button data-dismiss="alert" class="close" type="button">X</button>
                Mensagem enviada!!!! Em breve entraremos em de contato
            </div>';
			
  }
  }


  ?>
<div class="container">

<div class="span12">
<br><br>
	<h1 class="multi-hdng">Contato</h1>
</div>
<div class="row">
<div class="span12">
<center><p class="adv-sidehdng">Entre em contato conosco e em breve retornaremos.</p></center>
</div>
<div>
<div class="row">
<div class="span8">
<form method="post" id="frm1" action="contato.php"  >
	<div class="row-fluid">
		<div class="span3" style="text-align:left" valign="middle"><span class="mandatory"><br>*</span>Nome</div>
		<div class="span9"><input class="span10" name="name" id="name" type="text" required /></div>    
	</div>
	<div class="row-fluid">
		<div class="span3" style="text-align:left" valign="middle"><span class="mandatory"><br>*</span>E-Mail</div>
		<div class="span9"><input class="span10" name="email" type="text" required /></div>    
	</div>
	<div class="row-fluid">
		<div class="span3" style="text-align:left" valign="middle"><span class="mandatory"><br>*</span>Telefone</div>
		<div class="span9"><input  class="telefone span10" type="text" name="phone" required /></div>
	</div> 
	<div class="row-fluid">
		<div class="span3" style="text-align:left" valign="middle"><span class="mandatory"><br></span>Celular</div>
		<div class="span9"><input  class="telefone span10" type="text" name="cel"  /></div>
	</div>
	<div class="row-fluid">
		<div class="span3" style="text-align:left" valign="middle"><span class="mandatory"><br>*</span>Assunto</div>
	</div>
	<div class="row-fluid">
		<div class="span12"><textarea class="span11" id="Field4" name="subject" spellcheck="true" rows="10" cols="100" tabindex="4" "></textarea>
	</div>    
	</div>
	<div class="row-fluid">
	<div class="span10">
	<input  type="submit"  value="Enviar">
	<input id="saveForm" name="saveForm" class = "limpar" type="reset"  value="Limpar">
	</form>
	</div>
	</div>
</form>
</div>
<div class="span4">
 <p class="adv-sidehdng" style="margin:10px 0;">Central de Atendimento:</p>
   <p> <a href="">(32)3355-1595 </a> ou(32) 99972-1100</p>
    <p class="adv-sidehdng" style="margin: 10px 0;">Endereço:</p>
<p>Estrada da Caixa D´água – km 02</p>
<p>S/N</p>
<p>Zona Rural - Tiradentes - MG </p>
<p> CEP: 36325-000 </p>

<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
            src="https://maps.google.com.br/maps?f=d&amp;source=embed&amp;saddr=R.+Caixa+D'Agua,+Tiradentes+-+MG,+36325-000,+Brazil
            &amp;geocode=FYhAvf4dfe1d_Q%3BFWy1vf4d3zJe_SlR875Ip8ChADH134KBLOdUFQ%3BFf6kvf4dxDBe_Q&amp;hl=pt-BR&amp;mra=dme&amp;
            mrsp=0&amp;sz=15&amp;via=1&amp;sll=-21.141909,-44.16697&amp;sspn=0.02954,0.055747&amp;ie=UTF8&amp;t=m&amp;
            ll=-21.1164720,-44.1615590&amp;spn=0.072052,0.123425&amp;z=17&amp;output=embed">
            	
            </iframe>
            <br />
            <small>
            	<a href="https://maps.google.com.br/maps?f=d&amp;source=embed&amp;saddr=Ac.+p%2F+BR-265%2FAv.+Gov.+Israel+Pinheiro&amp;daddr=-21.1216846,-44.1582417+to:Estrada+desconhecida&amp;geocode=FYhAvf4dfe1d_Q%3BFWy1vf4d3zJe_SlR875Ip8ChADH134KBLOdUFQ%3BFf6kvf4dxDBe_Q&amp;hl=pt-BR&amp;mra=dme&amp;mrsp=0&amp;sz=15&amp;via=1&amp;sll=-21.141909,-44.16697&amp;sspn=0.02954,0.055747&amp;ie=UTF8&amp;t=m&amp;ll=-21.133183,-44.166069&amp;spn=0.072052,0.123425&amp;z=13" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a>
            </small>

</div>
</div>
</div>
</div>
</div>
<?php
include "../inc/footer.php";
include "../inc/js.php";
?>
</body>
</html>






	<!-- AUTOCOMPLETE  -->
	<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery.maskedinput.js"></script>



    <!-- Analytics
    ================================================== -->
    <script>
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>
	<script type="text/javascript">
        jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
    </script>

  </body>
</html>
