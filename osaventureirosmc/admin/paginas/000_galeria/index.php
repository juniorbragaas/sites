<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div id ='conteudo'>
	<div  id="loading" style="height: 650px; width:100%; vertical-align:middle;"  >
	<center>
	<table style="height: 650px; width:100%; vertical-align:middle;">
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
	
	$("#conteudo").load("grid.php");

	});
</script>
