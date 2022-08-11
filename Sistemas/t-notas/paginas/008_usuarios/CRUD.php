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
				FROM tc_users  WHERE codigo = '$codigo'
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
					$login = $linha[login];
					$senha = $linha[senha];
					$profissional = $linha[profissional];
					$perfil = $linha[perfil];
					$senha2 = $linha[senha];
					$ativo = $linha[ativo];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar usuário";
        break;
    case 'alterar':
        $titulo =  "Alterar usuário";
        break;
    case 'excluir':
        $titulo =  "Excluir usuário";
		$readonly = "readonly";
		$mensagem = "Tem certeza que deseja excluir esse registro ?";
		$botao_salvar_text = "Sim";
        break;
	}	
	if (isset($_POST['acao'])) 
	{
		$send_acao = $_POST['acao'];
		$login = mysql_real_escape_string($_POST['login']);
		$login = strtolower($login);
		$senha = $_POST['senha'];
		if(strcmp($senha2,$senha) == 0)
		{ 
			$senha = $senha2;
		}
		else
		{
			$senha = sha1($_POST['senha']);
		}
		$ativo = $_POST['ativo'];
		
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_users
				   (
						profissional,
						login,
						senha,
						perfil,
						ativo
					)
					VALUES 
					(
						'$profissional'
						'$login',
						'$senha',
						'$perfil'
						1

					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			
			$SQL = "UPDATE tc_users SET
			            profissional = '$profissional',
						login = '$login',
						senha = '$senha',
						perfil = '$perfil',
						ativo  = '$ativo'
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
				$SQL = "DELETE FROM tc_users 
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
	<form action="" method="POST" id="cadform" name="cadform">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
    <tr><td colspan="2"><label>Associar ao profissional<br></label>
		<select id="atendente" name="atendente" style='width:200px;'  form="cadform">
		<option value='0' selected  >Nenhum</option>
		<?
			/* Busca de dados para mostrar na tela */
					$SQL = " SELECT
					codigo,
					nome_completo as nome
					FROM tc_atendentes
					ORDER BY nome_completo
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
						$selected = "";
						if(strcmp($linha[codigo],$profissional) == 0)
						{
						   $selected = " selected ";
						}
						echo "<option value='$linha[codigo]' $selected >$linha[nome]</option>";
	?>

					
						<?
					}
					while($linha = mysql_fetch_assoc($dados));
					}
					?>
		</select></td><tr>
	<tr>
		<td><label>Login<br></label><input type="text" id="login" name="login" placeholder="Digite um Nome*" value="<?= $login ?>" <?= $readonly ?> required></td>
		<td>
			<label>Senha<br></label>
			<input type="password" id="senha" name="senha" placeholder="Digite uma de referencia" value="<?= $senha ?>" <?= $readonly ?> required>
			<img id="olho" src="../../imagens/botoes/olho-icon.png" width="20px" height="20px" title="Ver senha">
		</td>
		<td><label>Perfil<br></label>
		<select id="perfil" name="perfil" style='width:200px;'  form="cadform">
		<option value='0' selected  >Nenhum</option>
		<?
			/* Busca de dados para mostrar na tela */
					$SQL = " SELECT
					*
					FROM tc_perfil
					ORDER BY codigo
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
						$selected = "";
						if(strcmp($linha[codigo],$perfil) == 0)
						{
						   $selected = " selected ";
						}
						echo "<option value='$linha[codigo]' $selected >$linha[nome]</option>";
	?>

					
						<?
					}
					while($linha = mysql_fetch_assoc($dados));
					}
					?>
		</select></td>
		<td><label>Ativo<br></label>
		<select id="ativo" name="ativo" style='width:200px;'  form="cadform">
		<option value='1' <? if(strcmp('1',$ativo) == 0){ echo " selected "; } ?>  >Sim</option>
		<option value='0' <? if(strcmp('0',$ativo) == 0){ echo " selected "; } ?>  >Não</option>
		</select>
		
		</td>
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
	<script>
		//var z = dhtmlXComboFromSelect("pai");
		//z.enableFilteringMode(true);
		
		$(function(){
    $('#ordem').bind('keydown',soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
	$( "#olho" ).mousedown(function() {
  $("#senha").attr("type", "text");
});

$( "#olho" ).mouseup(function() {
  $("#senha").attr("type", "password");
});
});
	</script>