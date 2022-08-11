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
				FROM tc_empresa  WHERE codigo = '$codigo'
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
					$nome = $linha[nome];
					$razao_social = $linha[razao_social];
					$cnpj = $linha[cnpj];
					$segmento = $linha[segmento];
					$cep = $linha[cep];
					$logradouro = $linha[logradouro];
					$numero = $linha[numero];
					$complemento = $linha[complemento];
					$bairro = $linha[bairro];
					$cidade = $linha[cidade];
					$uf = $linha[estado];
					$referencia = $linha[referencia];
					$telefone1 = $linha[telefone01];
					$falar_com1 = $linha[falar_com1];
					$telefone2 = $linha[telefone02];
					$falar_com2 = $linha[falar_com2];
					$email = $linha[email];
					$facebook = $linha[facebook];
					$linkedin = $linha[linkedin];
					$whatsapp = $linha[whatsapp];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar empresa";
        break;
    case 'alterar':
        $titulo =  "Alterar empresa";
        break;
    case 'excluir':
        $titulo =  "Excluir empresa";
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
		$razao_social = mysql_real_escape_string($_POST['razao_social']);
		$razao_social = primeira_maiuscula($razao_social);
		$cnpj = mysql_real_escape_string($_POST['cnpj']);
		$segmento = mysql_real_escape_string($_POST['segmento']);
		$cep = $_POST['cep'];
		$logradouro = mysql_real_escape_string($_POST['logradouro']);
		$numero = mysql_real_escape_string($_POST['numero']);
		$complemento = mysql_real_escape_string($_POST['complemento']);
		$bairro = mysql_real_escape_string($_POST['bairro']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$uf = mysql_real_escape_string($_POST['uf']);
		$referencia = mysql_real_escape_string($_POST['referencia']);
		$telefone1 = mysql_real_escape_string($_POST['telefone1']);
		$telefone1 = str_replace ('_','',$telefone1);
		$falar_com1 = mysql_real_escape_string($_POST['falar_com1']);
		$telefone2 = mysql_real_escape_string($_POST['telefone2']);
		$telefone2 = str_replace ('_','',$telefone2);
		$falar_com2 = mysql_real_escape_string($_POST['falar_com2']);
		$email = mysql_real_escape_string($_POST['email']);
		$facebook = mysql_real_escape_string($_POST['facebook']);
		$linkedin = mysql_real_escape_string($_POST['linkedin']);
		$whatsapp = mysql_real_escape_string($_POST['whatsapp']);
		$whatsapp = str_replace ('_','',$whatsapp);
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_empresa 
				   (
						nome,
						razao_social,
						cnpj,
						segmento,
						cep,
						logradouro,
						numero,
						complemento,
						bairro,
						cidade,
						estado,
						referencia,
						telefone01,
						falar_com1,
						telefone02,
						falar_com2,
						email,
						facebook,
						linkedin,
						whatsapp,
						ativo
						
					)
					VALUES 
					(
						'$nome',
						'$razao_social',
						'$cnpj',
						'$segmento',
						'$cep',
						'$logradouro',
						'$numero',
						'$complemento',
						'$bairro',
						'$cidade',
						'$estado',
						'$referencia',
						'$telefone1',
						'$falar_com1',
						'$telefone2',
						'$falar_com2',
						'$email',
						'$facebook',
						'$linkedin',
						'$whatsapp',
						1
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_empresa SET
						nome = '$nome',
						razao_social  = '$razao_social',
						cnpj = '$cnpj',
						segmento  = '$segmento',
						cep  = '$cep',
						logradouro  = '$logradouro',
						numero = '$numero',
						complemento = '$complemento',
						bairro = '$bairro',
						cidade = '$cidade',
						estado = '$uf',
						referencia = '$referencia',
						telefone01 = '$telefone1',
						falar_com1 = '$falar_com1',
						telefone02 = '$telefone2',
						falar_com2 = '$falar_com2',
						email = '$email',
						facebook = '$facebook',
						linkedin = '$linkedin',
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
				$SQL = "DELETE FROM tc_empresa 
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
		<td><label>Nome Fantasia<br></label><input type="text" id="nome" name="nome" placeholder="Digite um nome*" value="<?= $nome ?>" <?= $readonly ?> required></td>
		<td><label>Razão Social<br></label><input type="text" id="razao_social" name="razao_social" placeholder="Digite um nome*" value="<?= $razao_social ?>"required <?= $readonly ?> ></td>
		<td><label>CNPJ<br></label><input type="text" id="cnpj" name="cnpj" placeholder="Digite um nome*" value="<?= $cnpj ?>" <?= $readonly ?> required></td>
		<td><label>Segmento<br></label><input type="text" id="segmento" name="segmento" placeholder="Digite um nome" <?= $readonly ?> value="<?= $segmento ?>"></td>
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
		<td><label>Telefone 01<br></label><input type="text" id="telefone1" name="telefone1" value="<?= $telefone1 ?>" <?= $readonly ?> class="telefone"></td>
		<td><label>Falar com<br></label><input type="text" id="falar_com1" name="falar_com1" value="<?= $falar_com1 ?>" <?= $readonly ?> ></td>
		<td><label>Telefone 02<br></label><input type="text" id="telefone2" name="telefone2" value="<?= $telefone2 ?>" <?= $readonly ?> class="telefone"></td>
		<td><label>Falar com<br></label><input type="text" id="falar_com2" name="falar_com2" value="<?= $falar_com2 ?>" <?= $readonly ?> ></td>
	</tr>	
	<tr>
		<td><label>E-mail<br></label><input type="text" id="email" name="email" value="<?= $email ?>" <?= $readonly ?> ></td>
		<td><label>Facebook<br></label><input type="text" id="facebook" name="facebook" value="<?= $facebook ?>" <?= $readonly ?> placeholder="www.facebook.com/perfil_da_empresa" ></td>
		<td><label>LinkedIn<br></label><input type="text" id="linkedin" name="linkedin" value="<?= $linkedin ?>" <?= $readonly ?> ></td>
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