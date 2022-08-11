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
				FROM tn_menu  WHERE codigo = '$codigo'
				ORDER BY codigo,ordem
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
					$id = $linha[id];
					$ordem = $linha[ordem];
					$pai = $linha[pai];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar menu";
        break;
    case 'alterar':
        $titulo =  "Alterar menu";
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
		$id = mysql_real_escape_string($_POST['id']);
		$ordem = $_POST['ordem'];
		$pai = $_POST['pai'];
		
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tn_menu 
				   (
						nome,
						id,
						ordem,
						pai
					)
					VALUES 
					(
						'$nome',
						'$id',
						'$ordem',
						'$pai'

					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tn_menu SET
						nome = '$nome',
						id = '$id',
						ordem  = '$ordem',
						pai  = '$pai'
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
				$SQL = "DELETE FROM tn_menu 
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

	<tr>
		<td><label>Nome<br></label><input type="text" id="nome" name="nome" placeholder="Digite um Nome*" value="<?= $nome ?>" <?= $readonly ?> required></td>
		<td><label>Id<br></label><input type="text" id="id" name="id" placeholder="Digite uma de referencia" value="<?= $id ?>" <?= $readonly ?> required></td>
		<td><label>Pai<br></label>
		<select id="pai" name="pai" style='width:200px;'  form="cadform">
		<option value='0' selected  >Nenhum</option>
		<?
		/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tn_menu  WHERE pai = 0
				ORDER BY ordem
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
					if(strcmp($linha[codigo],$pai) == 0)
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
		<td><label>Ordem<br></label><input type="text" id="ordem" name="ordem" value="<?= $ordem ?>" <?= $readonly ?> required></td>
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
});
	</script>