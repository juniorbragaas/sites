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
				FROM tc_eventos  WHERE codigo = '$codigo' and evento = 1
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
					$nome = $linha[titulo];
						$descricao = $linha[descricao];
					$data_inicio = $linha[data_inicio];
					$data_fim = $linha[data_fim];
					$destaque = $linha[destaque];
					$local_evento = $linha[local_evento];
					$valor_evento = $linha[valor_evento];
					$classificacao = $linha[classificacao];
					$foto = $linha[foto];
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'cadastrar':
        $titulo =  "Cadastrar evento";
        break;
    case 'alterar':
        $titulo =  "Alterar evento";
        break;
    case 'excluir':
        $titulo =  "Excluir evento";
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
		$data_inicio = mysql_real_escape_string($_POST['data_inicio']);
		$data_fim = mysql_real_escape_string($_POST['data_fim']);
		$destaque = mysql_real_escape_string($_POST['destaque']);
		$local_evento = mysql_real_escape_string($_POST['local_evento']);
		$valor_evento = mysql_real_escape_string($_POST['valor_evento']);
		$classificacao = mysql_real_escape_string($_POST['classificacao']);
		$foto = mysql_real_escape_string($_POST['foto']);
		$codigo = $_POST['codigo'];
		switch ($send_acao) 
		{
			case 'cadastrar':
			$SQL = "INSERT INTO tc_eventos 
				   (
						titulo,
						descricao,
						data_inicio,
						data_fim,
						destaque,
						evento,
						local_evento,
						valor_evento,
						classificacao,
						foto,
						cadastrado_em
						
					)
					VALUES 
					(
						'$nome',
						'$descricao',
						'$data_inicio',
						'$data_fim',
						'$destaque',
						1,
						'$local_evento',
						'$valor_evento',
						'$classificacao',
						'$foto',
						now()
					);";
			
			//echo "<br>$SQL<br>"; exit;
			$query = mysql_query($SQL);
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi salvo com sucesso!";
			break;
			case 'alterar':
			$SQL = "UPDATE tc_eventos SET
						titulo = '$nome',
						descricao  = '$descricao',
						data_inicio  = '$data_inicio',
						data_fim = '$data_fim',
						destaque = '$destaque',
						local_evento = '$local_evento',
						valor_evento = '$valor_evento',
						classificacao = '$classificacao',
						foto = '$foto',
						cadastrado_em = now()
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
				$SQL = "DELETE FROM tc_eventos 
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
		<td><label>Arquivo imagem <br></label><input type="text" id="foto" name="foto" placeholder="Digite um nome*" value="<?= $foto ?>"required <?= $readonly ?> ></td>
        		
	</tr>	
	<tr>
		<td colspan="4"><br>Informações do evento</td>
	</tr>
	<tr>
		<td><label>Classificação <br></label><input type="text" id="classificacao" name="classificacao" placeholder="Digite um nome*" value="<?= $classificacao ?>"required <?= $readonly ?> ></td>	
		<td><label>É destaque?<br></label>
			<select name="destaque" id="destaque">
			<option value="1" <? if(strcmp("1",$destaque)== 0) { echo " selected "; } ?>>Sim</option>
			<option value="0" <? if(strcmp("0",$destaque)== 0) { echo " selected "; } ?>>Não</option>
			
			</select>
		</td>
		<td colspan="2"><label>Local<br></label><input type="text" id="local_evento" name="local_evento" value="<?= $local_evento ?>" <?= $readonly ?>></td>
	</tr>
	<tr>
		<td><label>Data inícial<br></label><input type="date" id="data_inicio" name="data_inicio" placeholder="Digite uma data*" value="<?= $data_inicio ?>" <?= $readonly ?> required></td>
		<td><label>Data final<br></label><input type="date" id="data_fim" name="data_fim" placeholder="Digite uma data*" value="<?= $data_fim ?>" <?= $readonly ?> required></td>
		<td><label>Valor<br></label><input type="number" step="any" id="valor_evento" name="valor_evento" placeholder="Digite o valor" value="<?= $valor_evento ?>" <?= $readonly ?> required></td>
		
	</tr>
	<tr>
		<td colspan="4"><br>Descrição do evento</td>
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
    