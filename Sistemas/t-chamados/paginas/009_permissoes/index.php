<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div id ='conteudo2' >
	<div  id="loading" style="height: 730px; width:100%; vertical-align:middle; overflow: scrolling;"  >
	<center>
	<table style="height: 730px; width:100%; vertical-align:middle;">
	<tr><td ><center>
	<img src="http://www.toffy.com.br/imagens/aguarde.gif" style="vertical-align:middle;">
	</td></tr></center>
	</table>
	</div>
	</div>
</body>
</html>
<script>
$(document).ready(function(){ 
	
	$("#conteudo2").load("grid.php");

	});
</script>
