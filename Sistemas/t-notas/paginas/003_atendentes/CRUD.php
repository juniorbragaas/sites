<? 
	include("../inc/css.php");
	include("../inc/js.php");
	include("../../config/conexao.php");
	$acao = $_GET['acao'];
	$codigo = $_GET['codigo'];
	$msg = "";
	$titulo = "";
	
	$readonly = "";
	$ocultar_botao = "";
	$botao_salvar_text = "Salvar";

	
	/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes  WHERE codigo = '$codigo'
				ORDER BY codigo DESC
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);

				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
					$codigo = $linha[codigo];
					$nome = $linha[nome_completo];
					$cpf = $linha[cpf];
					$cep = $linha[cep];
					$logradouro = $linha[logradouro];
					$numero = $linha[numero];
					$complemento = $linha[complemento];
					$bairro = $linha[bairro];
					$cidade = $linha[cidade];
					$uf = $linha[estado];
					$referencia = $linha[referencia];
					$telefone = $linha[telefone];
					$celular = $linha[celular];
					$email = $linha[email];
					$facebook = $linha[facebook];
					$whatsapp = $linha[whatsapp];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar atendente";
        break;
    case 'alterar':
        $titulo =  "Alterar atendente";
        break;
    case 'excluir':
        $titulo =  "Excluir atendente";
		$readonly = "readonly";
		$mensagem = "Tem certeza que deseja excluir esse registro ?";
		$botao_salvar_text = "Sim";
        break;
	}	
	if (isset($_POST['acao'])) 
	{
		$send_acao = $_POST['acao'];
		$nome = mysql_real_escape_string($_POST['nome']);
		$nome = primeira_maiuscula($nome);
		$cpf = mysql_real_escape_string($_POST['cpf']);
		$cep = $_POST['cep'];
		$logradouro = mysql_real_escape_string($_POST['logradouro']);
		$numero = mysql_real_escape_string($_POST['numero']);
		$complemento = mysql_real_escape_string($_POST['complemento']);
		$bairro = mysql_real_escape_string($_POST['bairro']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$uf = mysql_real_escape_string($_POST['uf']);
		$referencia = mysql_real_escape_string($_POST['referencia']);
		$telefone = mysql_real_escape_string($_POST['telefone']);
		$telefone = str_replace ('_','',$telefone);
		$celular = mysql_real_escape_string($_POST['celular']);
		$celular= str_replace ('_','',$celular);
		$email = mysql_real_escape_string($_POST['email']);
		$facebook = mysql_real_escape_string($_POST['facebook']);
		$whatsapp = mysql_real_escape_string($_POST['whatsapp']);
		$whatsapp = str_replace ('_','',$whatsapp);
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_atendentes 
				   (
						nome_completo,
						cpf,
						cep,
						logradouro,
						numero,
						complemento,
						bairro,
						cidade,
						estado,
						referencia,
						telefone,
						celular,
						email,
						facebook,
						whatsapp,
						ativo
						
					)
					VALUES 
					(
						'$nome',
						'$cpf',
						'$cep',
						'$logradouro',
						'$numero',
						'$complemento',
						'$bairro',
						'$cidade',
						'$uf',
						'$referencia',
						'$telefone',
						'$celular',
						'$email',
						'$facebook',
						'$whatsapp',
						1
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_atendentes SET
						nome_completo = '$nome',
						cpf = '$cpf',
						cep  = '$cep',
						logradouro  = '$logradouro',
						numero = '$numero',
						complemento = '$complemento',
						bairro = '$bairro',
						cidade = '$cidade',
						estado = '$uf',
						referencia = '$referencia',
						telefone = '$telefone',
						celular = '$celular',
						email = '$email',
						facebook = '$facebook',
						whatsapp = '$whatsapp',
						ativo = 1
					WHERE codigo=$codigo
					";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi alterado com sucesso!";
			break;
			case 'excluir':
			$readonly = "readonly";
			$readonly_salvar = "disabled";
				$SQL = "DELETE FROM tc_atendentes 
					WHERE codigo=$codigo
					";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi excluido com sucesso!";
			break;
		}	
    }	
		
		

?> 

<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?= $caminho_servidor ?>/css/estilo.css"/>
</head>
	<body >
	 <div id="painel">
	<div id="cabecalho_pagina" width="100%" style="background-color: #827D7D; color: #FFFFFF;"><center><?= $titulo; ?></center></div>
	<table>
	<form action="" method="POST">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
	<tr>
		<td><label>Nome Completo<br></label><input type="text" id="nome" name="nome" placeholder="Digite um nome*" value="<?= $nome ?>" <?= $readonly ?> required></td>
		<td><label>CPF<br></label><input type="text" id="cpf" name="cpf" placeholder="Digite um nome*" value="<?= $cpf ?>"required <?= $readonly ?> ></td>
	</tr>	
	<tr>
		<td colspan="4">Informações de endereço</td>
	</tr>
	<tr>
		<td><label>CEP<br></label><input type="text" id="cep" name="cep" placeholder="Digite um CEP*" value="<?= $cep ?>" <?= $readonly ?> required></td>
		<td><label>Logradouro<br></label><input type="text" id="logradouro" name="logradouro" placeholder="Digite uma rua/av... etc*" value="<?= $logradouro ?>" <?= $readonly ?> required></td>
		<td><label>Nº<br></label><input type="text" id="numero" name="numero" value="<?= $numero ?>" <?= $readonly ?>></td>
		<td><label>Complemento<br></label><input type="text" id="complemento" name="complemento" value="<?= $complemento ?>" <?= $readonly ?>></td>
	</tr>
	<tr>
		<td><label>Bairro<br></label><input type="text" id="bairro" name="bairro" placeholder="Digite um bairro" value="<?= $bairro ?>"<?= $readonly ?> ></td>
		<td><label>Cidade<br></label><input type="text" id="cidade" name="cidade" placeholder="Digite uma cidade" value="<?= $cidade ?>" <?= $readonly ?> required></td>
		<td><label>Estado<br></label><input type="text" id="uf" name="uf" placeholder="Digite UF*" value="<?= $uf ?>" <?= $readonly ?> required></td>
		<td><label>Referência<br></label><input type="text" id="referencia" name="referencia" value="<?= $referencia ?>" <?= $readonly ?> placeholder="Digite uma referencia para o endereco"></td>
	</tr>
	<tr>
		<td colspan="4">Informações de contato</td>
	</tr>
	<tr>
		<td><label>Telefone<br></label><input type="text" id="telefone" name="telefone" value="<?= $telefone ?>" <?= $readonly ?> class="telefone"></td>
		<td><label>Celular<br></label><input type="text" id="celular" name="celular" value="<?= $celular ?>" <?= $readonly ?> class="telefone"></td>
	</tr>	
	<tr>
		<td><label>E-mail<br></label><input type="text" id="email" name="email" value="<?= $email ?>" <?= $readonly ?> ></td>
		<td><label>Facebook<br></label><input type="text" id="facebook" name="facebook" value="<?= $facebook ?>" <?= $readonly ?> placeholder="www.facebook.com/perfil_da_empresa" ></td>
		<td><label>Whatsapp<br></label><input type="text" id="whatsapp" name="whatsapp" value="<?= $whatsapp ?>" <?= $readonly ?> class="telefone"></td>
	</tr>	
	</table>
	<div id="botoes" width="100%" style="background-color: blue;"><b><font color="white"><?= $mensagem ?></font></b><input type="submit" class="salvar" value="<?= $botao_salvar_text ?>" <?= $readonly_salvar ?> /><input type="button" class="cancelar" onclick="location.href='index.php';" value="Voltar" /></div>
   	</form>
	
</body>
</html>
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