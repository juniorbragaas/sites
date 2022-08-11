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
    <title>Os Aventureiros Motoclube | Integrantes</title>
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
			<center><h2>Integrantes</h2></center>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12">
			<h2><? echo "Os Aventureiros : Juiz de Fora"; ?></h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'jf' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

			<div class="col-md-12">
			<h2><? echo "Os Aventureiros : São João Del Rei"; ?></h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'sjdr' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
			<div class="col-md-12">
			<h2>Os Aventureiros : Rio das Ostras</h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'ro' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
							
			<div class="col-md-12">
			<h2>Os Aventureiros : Barbacena</h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'barbacena' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
										<div class="col-md-12">
			<h2>Os Aventureiros : Coimbra</h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'coimbra' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
										<div class="col-md-12">
			<h2>Os Aventureiros : Itaúna</h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'itauna' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
				</div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
							<div class="col-md-12">
			<h2>Os Aventureiros : Pará de Minas</h2><br>
			</div>
			<?
									/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_atendentes WHERE sede LIKE 'pm' 
				ORDER BY apelido 
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

					$apelido = utf8_encode($linha[apelido]);
					$foto = utf8_encode($linha[foto]);
					?>
				<div class="col-md-3">
				<img src="<?= $caminho_servidor ?>/imagens/integrantes/<?=$foto ?>" width="100%" height="200px">
				<center><h4><? echo $apelido; ?></h4></center>
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