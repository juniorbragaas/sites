<!DOCTYPE html>
<html >
<head>
<?

 include "config/conexao.php";

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Os Aventureiros Motoclube</title>
	
	<!-- arquivos CSS -->
<?	include "inc/css.php"; ?>
     
    <link rel="shortcut icon" href="images/logo.png">

</head><!--/head-->

<body class="homepage" >

<? include "config/caminho_servidor.php"; ?>
<?	include "classes/Url.php"; ?>


<!-- arquivos de cabecalho de pagina -->
<?	include "inc/header.php"; ?>

<?php include "paginas/principal.php"; ?>
 
 

</div>
</div>
</div>
  

   
<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>

<!-- mapear outras paginas -->
<?	include "inc/mapa_url.php"; ?>

	

</body>
</html>