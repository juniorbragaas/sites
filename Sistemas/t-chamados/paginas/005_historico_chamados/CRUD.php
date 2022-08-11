<? 
	session_start();
 
if (empty($_SESSION['id'])) {
 
	// não existe sessão iniciada
	// neste caso, levamos o utilizador para a página de login
}
else
{
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
				FROM tc_chamado  WHERE codigo = '$codigo'
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
					$categoria = $linha[categoria];
					$descricao = $linha[descricao];
					$empresa = $linha[empresa];
					$data_abertura = $linha[data_abertura];
					$data_prazo = $linha[data_prazo];
					$observacao_atual = $linha[observacao_atual];
					$status = $linha[status];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar chamado";
        break;
    case 'alterar':
        $titulo =  "Alterar chamado";
        break;
    case 'excluir':
        $titulo =  "Excluir chamado";
		$readonly = "readonly";
		$mensagem = "Tem certeza que deseja excluir esse registro ?";
		$botao_salvar_text = "Sim";
        break;
	}	
	if (isset($_POST['acao'])) 
	{
		$send_acao = $_POST['acao'];
		$categoria = $_POST['categoria'];
		$empresa = $_POST['empresa'];
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$observacao = mysql_real_escape_string($_POST['observacao']);
		$data_prazo = mysql_real_escape_string($_POST['data_prazo']);
		$encaminhado_para = $_POST['encaminhado_para'];
		
		
		
		$codigo = $_POST['codigo'];
		$msg = $_POST['msg'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			// 1 passo cadastrar chamado
			$SQL = "INSERT INTO tc_chamado 
				   (
						categoria,
						descricao,
						empresa,
						data_abertura,
						data_prazo,
						status,
						observacao_atual,
						cadastrado_por,
						alterado_em
						
						
					)
					VALUES 
					(
						'$categoria',
						'$descricao',
						'$empresa',
						now(),
						'$data_prazo',
						1,
						'$observacao',
						'".$_SESSION['username']."',
						now()
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			
			// 2 passo encaminhar o chamado para quem foi solicitado
			
			$SQL = "INSERT INTO tc_chamado_historico
					(
						numero_chamado,
						encaminhado_para,
						observacao,
						status,
						data
					)
					SELECT
						(SELECT MAX(codigo) FROM tc_chamado LIMIT 1) as chamado,
						$encaminhado_para as encaminhado_para,
						'$observacao'  as observacao,
						1 as status,
						now() as data";
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
	<form action="" id="cadform" name="cadform" method="POST">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
	<tr>
		<td colspan="2"><label>Categoria<br></label>
		<select id="categoria" name="categoria" style='width:400px;'  form="cadform">
		<?
		/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_categoria  
				ORDER BY nome
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
					if(strcmp($linha[codigo],$categoria) == 0)
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
	</tr>
	<tr>
				<td colspan="3"><label>Solicitante<br></label>
		<select id="empresa" name="empresa" style='width:400px;'  form="cadform">
		<?
		/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				codigo,
				razao_social as nome
				FROM tc_empresa  
				ORDER BY razao_social
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
					if(strcmp($linha[codigo],$empresa) == 0)
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
		
	</tr>	
	<tr>
		<td colspan="4">Descrição do chamado</td>
	</tr>
	<tr>
		<td colspan="4"><textarea id="descricao" name="descricao" rows="12" cols="100">
</textarea></td>
		
	</tr>
	<tr>
		<td><label>Prazo<br></label><input type="date" id="data_prazo" name="data_prazo" placeholder="Digite um nome" <?= $readonly ?> value="<?= $segmento ?>"></td>	</tr>
	<tr>
		<td colspan="4"><hr>Encaminhar para </td>
	</tr>
	<tr>
		<td colspan="3"><label>Nome<br></label>
		<select id="encaminhado_para" name="encaminhado_para" style='width:400px;'  form="cadform">
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
					if(strcmp($linha[codigo],$encaminhado_para) == 0)
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
	</tr>	
	<tr>
		<td colspan="4">Observação</td>
	</tr>
	<tr>
		<td colspan="4"><textarea id="observacao" name="observacao" rows="12" cols="100">
</textarea></td>
		
	</tr>
	</table>
	<div id="botoes" width="100%" style="background-color: blue;"><b><font color="white"><?= $mensagem ?></font></b><input type="submit" class="salvar" value="<?= $botao_salvar_text ?>" <?= $readonly_salvar ?> /><input type="button" class="cancelar" onclick="location.href='index.php';" value="Voltar" /></div>
   	</form>
	
</body>
<? } ?>
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