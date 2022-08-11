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

<div class="container">
    <!-- Marketing Icons Section -->
        <div class="row">
<div class="form-group col-md-12">

<center>
<img style="width:200px; margin-top: 0px; height: 200px;"src="<?= $caminho_servidor ?>/imagens/logo.png">
<br>
<b><h2>POR QUE AS CAVEIRAS?</h2></b></center><br><br>

<h2 align="center">A Caveira para nós Os 
Aventureiros, representa além da 
igualdade entre os seres, que o amor 
pelo prazer de andar sobre duas rodas, 
transcende a vida, ele se perpetua, 
enfim, acaba a matéria, mas o prazer da 
liberdade que sentimos ao viajar de 
motocicleta, impregna a alma.</h2>

                </div>

</div>
        </div>


<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>