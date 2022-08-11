<!DOCTYPE html>
<html >
<head>
<?

 include "../config/conexao.php";

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Os Aventureiros Motoclube | Parcerias</title>
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
			<center><h2>Nosos parceiros</h2></center>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12">
			<h2><? echo "Parceiros Comerciais"; ?></h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Comercio'
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

					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					$site = utf8_encode($linha[site]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/parceiros/<?=$imagem ?>" width="100%" height="200px">
				<center><h4><? echo $nome; ?></h4><br>
				</center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

		</div>
				<div class="row">

			<div class="col-md-12">
			<h2><? echo "Motoclubes"; ?></h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Motoclube'
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

					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					$site = utf8_encode($linha[site]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/parceiros/<?=$imagem ?>" width="100%" height="200px">
				<center><h4><? echo $nome; ?></h4><br>
				</center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

		</div>
		<div class="row">

			<div class="col-md-12">
			<h2><? echo "Entidades"; ?></h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Entidade'
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

					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					$site = utf8_encode($linha[site]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/parceiros/<?=$imagem ?>" width="100%" height="200px">
				<center><h4><? echo $nome; ?></h4><br>
				</center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

		</div>
</div>

<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>