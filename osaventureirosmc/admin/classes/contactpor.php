<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


     <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
 <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-146052-10']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>    
<style>
	.hidden {
  display:none;
}
</style>

<script>

function formReset()
{
$('label.error').each(function(){
	$(this).hide();
})
}
$(document).ready(function(){

$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $(".bannner_opacity").stop().animate({
            opacity: 0.7
        }, 800);
    } else {
        $(".bannner_opacity").stop().animate({
            opacity: 1
        }, 800);
    }
});
});
</script> 

<script>
$(document).ready(function(){
$(".center_span").hover(
  function () {
    $(this).addClass("mid_span_hover");	
  },
  function () {
    $(this).removeClass("mid_span_hover");
  }
);
});
</script>
      <style>
	
.cont_but {
    background: none repeat scroll 0 0 #FA7D2D;
    border: 1px solid #FA7D2D;
    border-radius: 3px 3px 3px 3px;
    color: #FFFFFF;
    font-size: 16px;
    padding: 7px;
	margin-bottom:10px;
	font-weight:bold;
}

iframe {
    width: 100%;
}
form .span10 {
    margin-left: 0 !important;
}
	</style> 
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

       <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid" style="padding-right:0;">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand page-header-inner2 logo-link" href="index.html"><img src="assets/img/logo.png" class="logo-img" alt=""></a>
          <div class="nav-collapse collapse">
            <ul class="nav main-nav-links" id="page-menu">
           <!--   <li class=""> <a href="distancepor.html" class="main-nav-link"><span class="main-nav-link-inner" style="line-height:14px">Continuidade<br/>Online</span></a> </li>-->
              <li class="">
						<a href="clientspor.html" class="main-nav-link"><span class="main-nav-link-inner">Clientes</span></a>
              </li>
              <li class="">
						<a href="testmonialspor.html" class="main-nav-link"><span class="main-nav-link-inner">Depoimentos</span></a>
              </li>
             <!-- <li class="">
						<a href="blogpor.html" class="main-nav-link"><span class="main-nav-link-inner" style="line-height:20px;">Informações<br/>Adicionais</span></a>
              </li>-->
              <li class="">
						<a href="contactpor.php" class="main-nav-link"><span class="main-nav-link-inner">Contato</span></a>
              </li>
              
                   <li class="">
						<a href="calendar.php" class="main-nav-link"><span class="main-nav-link-inner">&nbsp;Trabalhe Conosco</span></a>
              </li>
              <li class="">
						<a href="photospor.html" class="main-nav-link"><span class="main-nav-link-inner">Infraestrutura</span></a>
              </li>
         
           <!--  <li>  
				<span class="main-nav-link">
                <span class="main-nav-link-inner">
             			<a href="index.html">  <img src="assets/img/br_flag.png" alt=""/>  </a>
                        <a href="indexeng.html"> <img src="assets/img/usa_flag.png" alt=""/> </a>
                        </span>
				</span>
               </li>-->               
            </ul>
          </div>
        </div>
      </div>
    </div>        

    <script type="text/javascript" >
	$(document).ready(function(){
		/*jQuery.validator.addMethod('phonenumber', function(phone_number, element) {
  return this.optional(element) || phone_number.length > 9 &&
  phone_number.match(/^\+?\d+(-\d+)*$/);
  }, 'Please specify a valid phone number'
);*/
		$('#frm1').validate({
			 rules: {
	// simple rule, converted to {required:true}
	name: {
		required:true,
		
	},
	// compound rule
	email: {
	required: true,
	email: true
},
phone:{
	phoneUS:true,
	
},
phone1:{
	phoneUS:true,
},
cel:{
phoneUS:true,	
},
cel1:{
	phoneUS:true,	

}
},
messages:{
	name: {
		required:"Nome Necessário",
		
	},
	// compound rule
	email: {
	required: "E-mail são obrigatórios",
	email: "Entrar e-mail válido para continuar"
}
}
			
		});
		
	});
</script>



  <div class="container-fluid">
  <div class="row-fluid adv-img">
  <div class="span8">

  <img src="assets/img/contact_inner_image.jpg" class="offset4 adv-img-bdr span10">

  </div>
  </div>
  <div class="row-fluid adv-content">
  <div class="span10 offset1">
<h1 class="multi-hdng">Contato</h1>
<?php

if (isset($_REQUEST['name']) && $_REQUEST['name']!='')
//if "email" is filled out, send email
  {
  /*send email
  $name = $_REQUEST['name'] ;
  if($_REQUEST['email']!=''){$email = $_REQUEST['email'] ; }else{ $email='não comunicado'; }
  if($_REQUEST['phone']!='' && $_REQUEST['phone1']!=''){$phone = $_REQUEST['phone']; $phone1 = $_REQUEST['phone1']; }else{ $phone="não comunicado"; $phone1 ="";}
  if($_REQUEST['cel']!=''  && $_REQUEST['cel1']!=''){$cel = $_REQUEST['cel'] ; $cel1 = $_REQUEST['cel1'] ;}else{ $cel="não comunicado"; $cel1="";}
  if($_REQUEST['branch']!=''){$branch = $_REQUEST['branch'] ; }else{ $branch="não comunicado"; }
  if($_REQUEST['subject']!=''){$sub = $_REQUEST['subject'] ; }else{ $sub="não comunicado"; }
   $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  $headers.= "From: $email". "\r\n";
   //$headers .= 'Cc: kavitha.n@cogzidel.com,sudharsan@cogzidel.com,jed@cealexpress.com.br,jed.adler@gmail.com' . "\r\n";
  $subject = "Contato Ceal Express" ;

  $message = "Olá,<p>".$name." tem contato com você.</p><p>E-mail: ".$email."</p><p>Assunto: ".$sub."</p><p>Telefone: ".$phone." ".$phone1."</p><p>Celular: ".$cel." ".$cel1."</p><p>Ramal: ".$branch."</p>" ;
 mail("contato@cealexpress.com.br", $subject,$message,$headers);
 //$envio = mail("contato@cealexpress.com.br", "Assunto", "Texto", $headers);
 // echo "Obrigado por utilizar o nosso formulário de contato";
 echo '  <div class="alert alert-success">
              <button data-dismiss="alert" class="close" type="button">×</button>
                Obrigado por utilizar o nosso formulário de contato
            </div>';
			*/
			$name = $_REQUEST['name'] ;
  if($_REQUEST['email']!=''){$email = $_REQUEST['email'] ; }else{ $email='não comunicado'; }
  if($_REQUEST['phone']!='' && $_REQUEST['phone1']!=''){$phone = $_REQUEST['phone']; $phone1 = $_REQUEST['phone1']; }else{ $phone="não comunicado"; $phone1 ="";}
  if($_REQUEST['cel']!=''  && $_REQUEST['cel1']!=''){$cel = $_REQUEST['cel'] ; $cel1 = $_REQUEST['cel1'] ;}else{ $cel="não comunicado"; $cel1="";}
  if($_REQUEST['branch']!=''){$branch = $_REQUEST['branch'] ; }else{ $branch="não comunicado"; }
  if($_REQUEST['subject']!=''){$sub = $_REQUEST['subject'] ; }else{ $sub="não comunicado"; }
			require_once('class.phpmailer.php');
 
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
 
$mailer->Host = '186.202.127.109'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
//Para cPanel: 'localhost';
//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
 
//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
//$mailer->SMTPSecure = 'tls';
 
$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
$mailer->Username = 'contato@cealexpress.com.br'; //Informe o e-mai o completo
$mailer->Password = 'ceal2016'; //Senha da caixa postal
$mailer->FromName = 'Contato Ceal Express'; //Nome que será exibido para o destinatário
$mailer->From = 'contato@cealexpress.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
$mailer->AddAddress('contato@cealexpress.com.br'); //Destinatários
$mailer->Subject = 'Contato Ceal Express';
$mailer->IsHTML(true); 

$message = utf8_decode("Olá,<p>".$name." tem contato com você.</p><p>E-mail: ".$email."</p><p>Assunto: ".$sub."</p><p>Telefone: ".$phone." ".$phone1."</p><p>Celular: ".$cel." ".$cel1."</p><p>Ramal: ".$branch."</p>") ;

$mailer->Body = $message;
if(!$mailer->Send())
{
echo "Mensagem nao enviada";
echo "Erro: " . $mailer->ErrorInfo; exit; }
echo '  <div class="alert alert-success">
              <button data-dismiss="alert" class="close" type="button">×</button>
                Obrigado por utilizar o nosso formulário de contato
            </div>';
			
  }


  ?>
	<form method="post" id="frm1" action="contactpor.php"  >
<p class="adv-sidehdng">Entre em contato conosco e em breve retornaremos.</p>
    <div class="span10">
    <div class="row-fluid">

<div class="span2" style="text-align:left"><span class="mandatory">*</span>Nome</div>
<div class="span7"><input class="span10" name="name" id="name" type="text"/>
</div>    
    </div></div>
    <div class="span10">
    <div class="row-fluid">

<div class="span2" style="text-align:left"><span class="mandatory">*</span>E-mail</div>
<div class="span7"><input class="span10" name="email" type="text"/>
</div>    
    </div></div>
    <div class="span10">
    <div class="row-fluid">

<div class="span2" style="text-align:left">&nbsp;&nbsp;Telefone</div>
<div class="span2"><input class="span12" type="text" name="phone"/></div>
<div class="span2"><input class="span12" type="text" name="phone1"/></div>
</div>    
    </div>
    <div class="span10">
    <div class="row-fluid">

<div class="span2" style="text-align:left">&nbsp;&nbsp;Celular</div>
<div class="span2"><input class="span12" type="text" name="cel"/></div>
<div class="span2"><input class="span12" type="text" name="cel1"/></div>
</div>    
    </div>
    <div class="span10">
    <div class="row-fluid">

<div class="span2" style="text-align:left">&nbsp;&nbsp;Assunto</div>
<div class="span7"><textarea style="margin-left:0px; resize: vertical;" id="Field4" name="subject" spellcheck="true" rows="10" cols="50" tabindex="4" class="span10"></textarea>
</div>    
    </div></div>
    <div class="span10 button">
    <div class="row-fluid">

    <div class="span2 hidden-phone"></div>
  		<!--<div class="span1"><input  type="submit" class="cont_but" value="Enviar"></div>


        <div class="span1 button" style="margin-left:0;"><input id="saveForm" name="saveForm" type="submit" class="cont_but" value="Limpar"></div>-->
        <div class="span7">
            <form class="form-inline">
            <input  type="submit" class="cont_but" value="Enviar">
            <input id="saveForm" name="saveForm" type="reset" class="cont_but" value="Limpar"></form></div>

        
    </div>
	</div></div></form>
    </div>
    
        <div class="row-fluid">
    <div class="span10 offset1">
    <p class="adv-sidehdng" style="margin:10px 0;">Central de Atendimento:</p>
   <p> <a href="">(032) 3355-1595 </a> ou (032) 98807-8601</p>
    <p class="adv-sidehdng" style="margin: 10px 0;">Endereço:</p>
<p>Estrada da Caixa D'água – km 02</p>
<p>S/N</p>
<p>Zona Rural - Tiradentes - MG </p>
<p> CEP: 36325-000 </p>
<p>E-mail Us: <a href="mailto:contato@cealexpress.com.br">contato@cealexpress.com.br</a></p>
<!--<p><a href="mailto:contato@cealexpress.com.br">contato@cealexpress.com.br</a></p>-->
    </div>
    </div>
    
    <div class="row-fluid">
    <div class="span10 offset1">
    
            <iframe width="720" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
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

<div class="container-fluid content">
  <div class="row-fluid four_rows">
    <div class="span12">
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="aboutuspor.html"><img style="width:100%" src="assets/img/8.jpg"></a>
          <div class="small_content justify_content">
            <h3>Quem somos</h3>
            <p> Somos uma escola de imersão de idiomas que busca priorizar a necessidade específica de cada aluno garantindo desta forma a sua satisfação.</p>
            <p class="read_more"> <a href="aboutuspor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="advantagepor.html"><img style="width:100%" src="assets/img/9.jpg"></a>
          <div class="small_content justify_content">
            <h3>Diferenciais</h3>
            <p> Formamos pequenos grupos com o objetivo de prover atenção personalizada a cada participante. </p>
            <p class="read_more read"> <a href="advantagepor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="engimmersionpor.html"><img style="width:100%" src="assets/img/businessphoto4.min.jpg"></a>
          <div class="small_content justify_content">
            <h3>Imersões PARA Adultos</h3>
            <p> Confira como funcionam os seminários da língua Inglesa. </p>
            <p class="read_more read2"> <a href="engimmersionpor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- 2nd-->
  
  <div class="row-fluid four_rows">
    <div class="span12">
 
      
      
      
      
      
      
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="accommodationpor.html"><img style="width:100%" src="assets/img/room.min.jpg"></a>
          <div class="small_content justify_content">
            <h3>Serviços Inclusos</h3>
            <p>Conforto e descanso após o dia de estudo são garantidos em nossos Chalés. </p>
            <p class="read_more read"> <a href="accommodationpor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="distancepor.html"><img style="width:100%; height:277px" src="assets/img/bussines.min.jpg"></a>
               <div class="small_content justify_content">
            <h3>Programação</h3>
            <p> Confira aqui como funciona um dia típico de imersão.&nbsp;</p>
            <p class="read_more"> <a href="schedulepor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
      <div class="span3Nogutter center_span" style="width:31%">
        <div class="mid_span" id="center_hide"> <a href="photospor_new.html"><img style="width:100%" class="white_back" src="assets/img/DSCF1766_thumb.jpg"></a>
          <div class="small_content justify_content">
            <h3>Fotos</h3>
            <p> Confira nosso acervo de fotografias.&nbsp;</p>
            <p class="read_more read1"> <a href="photospor.html"> Saiba mais &gt;&gt; </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row-fluid placement_content">
    <div class="span12"> 
      <!--<p class="placement_head"> Make the placement test. </p>
<p class="placement_para"> It's fast, the result comes out at the time and it's free! </p>-->
      <p style="margin: 30px 0px 0px;"> <a href="contactpor.php" class="placement_but"> Fale Conosco </a> </p>
    </div>
  </div>
</div>

<!-- make placement -->



    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <div class="row-fluid">
        <div class="span7">
        <ul class="footer-links">
           <li><a href="schedulepor.html"> Programação </a></li>
          <li class="muted"></li>
          <li><a href="clientspor.html">clientes</a></li>
          <li class="muted"></li>
          <li><a href="testmonialspor.html">Depoimentos</a></li>
          <!--<li class="muted"></li>
          <li><a href="blogpor.html">Informações Adicionais</a></li>-->
          <li class="muted"></li>
          <li><a href="contactpor.php">contato</a></li>
          <li class="muted"></li>
          <li><a href="photospor.html">Infraestrutura</a></li>                               
        </ul>
        </div>
        <div class="span5 copy_rit">
        <p> Copyright © 2016 <a href="#"> Ceal Express.</a> All Rights Reserved. </p>
        </div>        
        </div>                     
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/additional-methods.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>



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

  </body>
</html>
