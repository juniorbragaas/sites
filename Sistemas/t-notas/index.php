<!DOCTYPE html>
<html>
<head>
	<title>T-NOTAS : Sistema de gerenciamento de NOTAS FISCAIS</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <? 
	  include("seguranca/verificarLogin.php");
	  include("inc/css.php");
	  include("inc/js.php");
      include("inc/header.php");  
	?> 
</head>
<body onload="doOnLoad();<?= $menu ?>">

	<div id="layoutObj"></div>
	
	<div id="conteudo">
	  <div id="menuObj"></div>
	  <?= $boasvindas ?>
	  <iframe name="painel" id="painel" src="<?= $srcframe ?>" style="height:500px; width:100%; overflow:scroll;"></iframe>
	</div>
	<div id="fotter">Desenvolvido por Valdelei Junior Braga</div>
</body>
</html>
<script>MontaGrid();</script>

