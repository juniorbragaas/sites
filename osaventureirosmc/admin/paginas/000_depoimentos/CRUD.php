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
				FROM tc_depoimentos  WHERE codigo = '$codigo'
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
					$autor = $linha[autor];
					$descricao = $linha[descricao];
					$motoclube = $linha[motoclube];
					$cidade = $linha[cidade];
					$status = $linha[status];
					
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar depoimento";
        break;
    case 'alterar':
        $titulo =  "Alterar depoimento";
        break;
    case 'excluir':
        $titulo =  "Excluir depoimento";
		$readonly = "readonly";
		$mensagem = "Tem certeza que deseja excluir esse registro ?";
		$botao_salvar_text = "Sim";
        break;
	}	
	if (isset($_POST['acao'])) 
	{
		$send_acao = $_POST['acao'];
		$autor = mysql_real_escape_string($_POST['autor']);
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$motoclube = mysql_real_escape_string($_POST['motoclube']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$status = mysql_real_escape_string($_POST['status']);
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_depoimentos 
				   (
						autor,
						descricao,
						cidade,
						motoclube,
						status,
						modificado_em
						
					)
					VALUES 
					(
						'$autor',
						'$descricao',
						'$cidade',
						'$motoclube',
						'$status',
						now()
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_depoimentos SET
						autor = '$autor',
						descricao = '$descricao',
						cidade  = '$cidade',
						motoclube  = '$motoclube',
						status = '$status',
						modificado_em = now()
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
				$SQL = "DELETE FROM tc_depoimentos 
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
	<br><br><br><br>
	 <div id="painel">
	<div id="cabecalho_pagina" width="100%" style="background-color: #827D7D; color: #FFFFFF;"><center><?= $titulo; ?></center></div>
	<table>
	<form action="" method="POST">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
	<tr>
		<td><label>Autor<br></label><input type="text" id="autor" name="autor" placeholder="Digite um nome*" value="<?= $autor ?>" <?= $readonly ?> required></td>
		<td><label>Motoclube<br></label><input type="text" id="motoclube" name="motoclube" placeholder="Digite um nome*" value="<?= $motoclube ?>"required <?= $readonly ?> ></td>
		<td><label>Cidade<br></label><input type="text" id="cidade" name="cidade" placeholder="Digite um nome*" value="<?= $cidade ?>"required <?= $readonly ?> ></td>
				<td><label>Status<br></label>
			<select name="status" id="status">
			<option value="1" <? if($status ==1) echo " selected " ?> >Ativo</option>
			<option value="0" <? if($status ==0) echo " selected " ?> >Pendente</option>

			</select>
		</td>
	</tr>
<tr>
<td colspan="4">
<label>Descrição<br></label>
<textarea rows="10" cols="50" id="descricao" name="descricao">
<? echo $descricao; ?>
</textarea>
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