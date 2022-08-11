
<html>
<?php include "../config/caminho_servidor.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Ceal Express</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content=""><link rel="shortcut icon" href="<?= $caminho_servidor ?>/imagens/ico/favicon.png"> 
<?php include "../inc/css.php"; ?>
</head>
<body id="voltarTopo">
<?php
include "../inc/header.php";
?>
<br><br>
<div class="container">
	<div class="row">
		<div class="span12">
			<h1 class="multi-hdng">Galeria de Fotos</h1>
		</div>
	</div>
	<div class="row">
		<div class="span12">
<h2>Confira nosso acervo de fotografias.</h2><br>


		</div>
		<?
$path = "galeria-fotos/";
   $diretorio = dir($path);

    
   while($arquivo = $diretorio -> read()){
   if((strcmp($arquivo,".") != 0) && (strcmp($arquivo,"..") != 0)  )
   {
if((strlen($arquivo) > 0))
{
		
		$arquivos[] = $arquivo;

		}
   }
      
   }
   rsort($arquivos); // sort.
   foreach($arquivos as $arquivo) {

   ?>
   <div class="span4">
   <?
   $pos = strripos($arquivo,"QUOTA");
		IF($pos === false)
		{ ?>
		<a href="<?= $path.$arquivo ?>">
			<div class="item_fotografia" >
				<br><?= str_replace('_', ' ',$arquivo) ?>
			</div>
			</a>
		</div>
		<? }
		
}

   $diretorio -> close();
   ?>
		
        
		
	</div>
	</div>
	</div>
<?php
include "../inc/footer.php";
include "../inc/js.php";
?>
</body>
</html>
