<!DOCTYPE html>
<html >
<head>
<?

 include "../config/conexao.php";

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Os Aventureiros Motoclube | Historia</title>
	<link rel="shortcut icon" href="../images/logo.png">
	<!-- arquivos CSS -->
<?	include "inc/css.php"; ?>


</head><!--/head-->

<body class="homepage">
<? include "../config/caminho_servidor.php"; ?>
<?	include "../classes/Url.php"; ?>

<!-- arquivos de cabecalho de pagina -->
<?	include "inc/header.php"; ?>
<?
if (isset($_POST['nome']) && $_POST['nome']!='')
{
   $nome = mysql_real_escape_string($_POST['nome']) ;
   $motoclube= mysql_real_escape_string($_POST['motoclube']) ;
   $cidade = mysql_real_escape_string($_POST['cidade']) ;
   $uf = mysql_real_escape_string($_POST['uf']) ;
   $mensagem = mysql_real_escape_string($_POST['mensagem']) ;
   
   
   $SQL = "INSERT INTO tc_depoimentos 
				   (
						autor,
						motoclube,
						cidade,
						uf,
						descricao,
						status,
						modificado_em
						
						
					)
					VALUES 
					(
						'$nome',
						'$motoclube',
						'$cidade - $uf',
						'$uf',
						'$mensagem',
						0,
						now()						
					);";
			
			//echo "<br>$SQL<br>"; exit;
			mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			
			echo "<script>alert('Depoiemnto enviado com sucesso aguarde autorização...')</script>";
   
   
   
   
  /*if($_POST['email']!=''){$email = $_POST['email'] ; }else{ $email='não comunicado'; }

	require_once('class.phpmailer.php');
	 
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 1;
	$mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
	 
	$mailer->Host = '187.94.192.25'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
	//Para cPanel: 'localhost';
	//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
	 
	//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
	//$mailer->SMTPSecure = 'tls';
	 
	$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
	$mailer->Username = 'contato@toffy.com.br'; //Informe o e-mai o completo
	$mailer->Password = '@toffy@proposta'; //Senha da caixa postal
	$mailer->FromName = 'TOFFY'; //Nome que será exibido para o destinatário
	$mailer->From = 'contato@toffy.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
	$mailer->AddAddress('contato@toffy.com.br','valdeleijuniorbraga2010@gmail.com'); //Destinatários
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
	$mailer->Subject = utf8_decode('TOFFY : Solicitação de Mensagem');
	$mailer->IsHTML(true); 

	$message = "Olá,<p><b>$responsavel</b> entrou em contato com você.</p>
	<hr><p>Razão social: $razaosocial</p>
	<p>Ramo: $ramo </p>
	<p>E-mail: $email</p>
	<p>Endereço: $logradouro - $numero - $bairro $cidade-$uf </p>
	<p>Telefone: $telefone Whatsapp: $whatsapp </p><hr><p>Sistemas: $sistema </p>
	<p>Mensagem: <br> $mensagem</p>" ;

	$mailer->Body = utf8_decode($message);
	$mailer->Send();

}
?>
		<div style="background-color:#2C8DB5; color:#FFF; ">
		<? */

}
		?> 
			
			<center><h4 style="font-size:30px;">Deixe seu depoimento aqui</h4></center>
		</div>
<div class="container">
<div class="row" >
<div class="form-group col-md-9">
	<form  id="proposta" name="proposta" method="post" action="">
	<input type="hidden" id="software" name="software" style="width:285px" value="<?= $sistema ?>">
	<div class="row" >
		<br>
		<div class="form-group col-md-3">
		<label >Nome *</label>
		<input type="text" class="form-control" id="nome" name="nome" placeholder="DIGITE SEU NOME" required value="" >
		</div>
		<div class="form-group col-md-3">
		<label >Motoclube *</label>
		<input type="text" class="form-control" id="motoclube" name="motoclube"  value="" placeholder="DIGITE O MOTOCLUBE" required>
		</div>
		<div class="form-group col-md-3">
	<label >Cidade*</label>
	<input type="text" class="form-control" id="cidade" name="cidade" placeholder="DIGITE A CIDADE" required value="" >
	</div>
			<div class="form-group col-md-3">
	<label> UF*</label>
	<input type="text" class="form-control" id="uf" name="uf" placeholder="DIGITE UF" required value="" >
	</div>
	</div>

	<div class="row" >
	<div class="form-group col-md-12">
		<div class="form-group">
		<label for="sel1">Mensagem</label>
		<textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui" ></textarea>
		</div>
		</div>
	</div>
	<div class="row" >
		<div class="form-group col-md-12">
		<center> <input type="submit" class="bt_enviar" id="enviar" name="enviar" value="Enviar"></center>
		</div>
	</div>
	</form>
</div>
<div class="form-group col-md-3">

	</div>
</div>
</div>
</div>
</div>

<script language="javascript">

function SomenteNumeros(event) {
var charCode = (event.which) ? event.which : event.keyCode
	if ((charCode > 64 && charCode < 223) || (charCode == 16)){
		return false;
	}
return true;
}
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
	
	   <!-- Adicionando sCRIPT DE cep -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#logradouro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#logradouro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")
                        $("#ibge").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
	
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>


        