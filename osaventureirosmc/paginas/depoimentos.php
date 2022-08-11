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

<div class="container"  >
    <!-- Marketing Icons Section -->
        <div class="row">
			<div class="col-md-12">
			<center><h2>Depoimentos</h2></center>
			</div>
			<div class="col-md-12">
		<a href="enviar_depoimento.php" class="btn btn-default">Envie um depoimento</a>
		</div>
		</div>
				
		<br>
		<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_depoimentos WHERE status = 1 
				ORDER BY modificado_em DESC 
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
				
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{

					$autor = utf8_encode($linha[autor]);
					$descricao = utf8_encode($linha[descricao]);
					$motoclube = utf8_encode($linha[motoclube]);
					$cidade = utf8_encode($linha[cidade]);
					?>
					<div class="row">
			<div class="col-md-10" >
			<table>
			<tr><td style="background-color:#F5F5DC; color:#F5F5DC;" colspan="2"><h3><center><b><?= $autor ?> disse: </b></center></h3></td></tr>
			<tr><td style="background-color:#FFFFFF;"colspan="2"><h4>"<?= $descricao ?>"</h4></td></tr>
			<tr><td style="background-color:#000000; color:#F5F5DC;" align="right">Motoclube : </td><td style="background-color:#000000; color:#F5F5DC;" align="left"><?= $motoclube ?></td></tr>
			<tr><td style="background-color:##FFFFFF;"align="right">Cidade : </td><td style="background-color:#FFFFFF;" align="left" ><?= $cidade ?></td></tr>
			</table>
			</div>
		</div>
		<br>
					
					<?
				}
				while($linha = mysql_fetch_assoc($dados));
				}
		
		?>
		<div class="row">
					<div class="col-md-12">
		<a href="enviar_depoimento.php" class="btn btn-default">Envie um depoimento</a>
		</div>
		</div>
		
</div>


<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>