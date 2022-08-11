<? include("seguranca/verificarLogin.php"); ?>
<html>
<head>
	<title>Os Aventureiros : Acesso a integrantes </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <? 
	  
	  include("inc/css.php");
	  include("inc/js.php");
      include("inc/header.php");  
	?> 
</head>
 <body onload="doOnLoad();<?= $menu ?>">
<div>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div id="layoutObj">Aguarde o Carregamento...</div>	
				<div id="conteudo" >
					<div id="menuObj"></div>
	  
				</div>
		</nav>
		<div class="container" style="width:100%; ">
		<iframe name="painel" id="painel" src="<?= $srcframe ?>" style="min-height:700px; width:100%; overflow-y: scrool;"></iframe>
		</div>
		<footer class="navbar-fixed-bottom" style=" background-color:#deedff ; ">
		<?= $boasvindas ?> 
		<table style=" background-color:#ebebeb ; width:100%; ">
		<tr><td align="right">Desenvolvido por <a href="www.toffy.com.br">TOFFY</a></td></tr>
		</table>
		</footer>
</div>

</body>
</html>
<script>MontaGrid();</script>

