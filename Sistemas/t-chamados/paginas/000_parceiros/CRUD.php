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
				FROM tc_parceiros  WHERE codigo = '$codigo'
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
					$cep = $linha[cep];
					$logradouro = $linha[logradouro];
					$numero = $linha[numero];
					$complemento = $linha[complemento];
					$bairro = $linha[bairro];
					$cidade = $linha[cidade];
					$uf = $linha[uf];
					$telefone = $linha[telefone];
					$email = $linha[email];
					$site = $linha[site];
					$imagem = $linha[imagem];
					$tipo = $linha[tipo];
					$responsavel = $linha[responsavel];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar parceria";
        break;
    case 'alterar':
        $titulo =  "Alterar parceria";
        break;
    case 'excluir':
        $titulo =  "Excluir parceria";
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
		$cep = $_POST['cep'];
		$logradouro = mysql_real_escape_string($_POST['logradouro']);
		$numero = mysql_real_escape_string($_POST['numero']);
		$complemento = mysql_real_escape_string($_POST['complemento']);
		$bairro = mysql_real_escape_string($_POST['bairro']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$uf = mysql_real_escape_string($_POST['uf']);
		$telefone = mysql_real_escape_string($_POST['telefone']);
		$telefone = str_replace ('_','',$telefone);
		$email = mysql_real_escape_string($_POST['email']);
		$site = mysql_real_escape_string($_POST['site']);
		$imagem = mysql_real_escape_string($_POST['imagem']);
		$tipo = mysql_real_escape_string($_POST['tipo']);
		$responsavel = mysql_real_escape_string($_POST['responsavel']);
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_parceiros 
				   (
						nome,
						cep,
						logradouro,
						numero,
						complemento,
						bairro,
						cidade,
						uf,
						telefone,
						email,
						site,
						imagem,
						responsavel,
						tipo
						
					)
					VALUES 
					(
						'$nome',
						'$cep',
						'$logradouro',
						'$numero',
						'$complemento',
						'$bairro',
						'$cidade',
						'$uf',
						'$telefone',
						'$email',
						'$site',
						'$imagem',
						'$responsavel',
						'$tipo'
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_parceiros SET
						nome = '$nome',
						cep  = '$cep',
						logradouro  = '$logradouro',
						numero = '$numero',
						complemento = '$complemento',
						bairro = '$bairro',
						cidade = '$cidade',
						uf = '$uf',
						telefone = '$telefone',
						email = '$email',
						site = '$site',
						imagem = '$imagem',
						responsavel = '$responsavel',
						tipo = '$tipo'
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
				$SQL = "DELETE FROM tc_parceiros 
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
<br><br><br><br>
	<body >
	 <div id="painel">
	<div id="cabecalho_pagina" width="100%" style="background-color: #827D7D; color: #FFFFFF;"><center><?= $titulo; ?></center></div>
	<table>
	<form action="" method="POST">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
	<tr>
		<td><label>Sede<br></label>
			<select name="tipo" id="tipo">
			<option value="Motoclube" <? if(strcmp("Motoclube",$sede)== 0) { echo " selected "; } ?>>Motoclubes</option>
			<option value="Comercio" <? if(strcmp("Comercio",$sede)== 0) { echo " selected "; } ?>>Parceiros comerciais</option>
			<option value="Entidade" <? if(strcmp("Entidade",$sede)== 0) { echo " selected "; } ?>>Entidade Organizações etc</option>
			</select>
		</td>
		<td><label>Nome<br></label><input type="text" id="nome" name="nome" placeholder="Digite um nome*" value="<?= $nome ?>" <?= $readonly ?> required></td>
		<td><label>Responsável<br></label><input type="text" id="responsavel" name="responsavel" placeholder="Digite um nome*" value="<?= $responsavel ?>"required <?= $readonly ?> ></td>
		<td><label>Arquivo imagem <br></label><input type="text" id="imagem" name="imagem" placeholder="Digite um nome*" value="<?= $imagem ?>"required <?= $readonly ?> ></td>		
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
		
	</tr>
	<tr>
		<td colspan="4">Informações de contato</td>
	</tr>
	<tr>
		<td><label>Telefone<br></label><input type="text" id="telefone" name="telefone" value="<?= $telefone ?>" <?= $readonly ?> class="telefone"></td>
		<td><label>E-mail<br></label><input type="text" id="email" name="email" value="<?= $email ?>" <?= $readonly ?> ></td>
		<td><label>Site<br></label><input type="text" id="site" name="site" value="<?= $site ?>" <?= $readonly ?> placeholder="Ex: www.seusite.com.br" ></td>	
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