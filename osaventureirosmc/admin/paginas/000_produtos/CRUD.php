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
				FROM tc_produtos  WHERE codigo = '$codigo'
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
					$descricao = $linha[descricao];
					$unidade_medida = $linha[unidade_medida];
					$valor = $linha[valor];
					$quantidade_atual = $linha[quantidade_atual];
					$imagem = $linha[imagem];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar produto";
        break;
    case 'alterar':
        $titulo =  "Alterar produto";
        break;
    case 'excluir':
        $titulo =  "Excluir produto";
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
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$unidade_medida = mysql_real_escape_string($_POST['unidade_medida']);
		$valor = mysql_real_escape_string($_POST['valor']);
		$quantidade_atual = mysql_real_escape_string($_POST['quantidade_atual']);
		$imagem = mysql_real_escape_string($_POST['imagem']);
		$cadastrado_em = mysql_real_escape_string($_POST['cadastrado_em']);
		$codigo = $_POST['codigo'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_produtos 
				   (
						nome,
						descricao,
						unidade_medida,
						valor,
						quantidade_atual,
						imagem,
						cadastrado_em
						
					)
					VALUES 
					(
						'$nome',
						'$descricao',
						'$unidade_medida',
						'$valor',
						'$quantidade_atual',
						'$imagem',
						now()
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_produtos SET
						nome = '$nome',
						descricao  = '$descricao',
						unidade_medida  = '$unidade_medida',
						valor = '$valor',
						quantidade_atual = '$quantidade_atual',
						imagem = '$imagem',
						cadastrado_em = '$cadastrado_em'
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
				$SQL = "DELETE FROM tc_produtos 
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
  <script type="text/javascript" src="../../js/jquery.js" ></script>
  <script type="text/javascript" src="../../js/jquery.maskMoney.js" ></script>
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
	    <script type="text/javascript">
        $(document).ready(function(){
              $("input.valor").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>
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
		<td><label>Nome<br></label><input type="text" id="nome" name="nome" placeholder="Digite um nome*" value="<?= $nome ?>" <?= $readonly ?> required></td>
		<td><label>Arquivo imagem <br></label><input type="text" id="imagem" name="imagem" placeholder="Digite um nome*" value="<?= $imagem ?>"required <?= $readonly ?> ></td>		
	</tr>	
	<tr>
		<td colspan="4">Informações do Produto</td>
	</tr>
	<tr>
		<td><label>Unidade de Medida<br></label><input type="text" id="unidade_medida" name="unidade_medida" placeholder="Digite um CEP*" value="<?= $unidade_medida ?>" <?= $readonly ?> required></td>
		<td><label>Valor<br></label><input type="number" step="any" id="valor" name="valor" placeholder="Digite o valor" value="<?= $valor ?>" <?= $readonly ?> required></td>
		<td><label>Quantidade atual<br></label><input type="number" id="quantidade_atual" name="quantidade_atual" value="<?= $quantidade_atual ?>" <?= $readonly ?>></td>
	</tr>
	<tr>
		<td colspan="4">Descrição do produto</td>
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
    