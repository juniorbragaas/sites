<html>
    <? 
	  include("../inc/css.php");
	  include("../inc/js.php");	
	  include("../config/caminho_servidor.php");
	?> 
<script type="text/javascript" src="grid.js"></script>
<body>

<br><br><br><br><br>
<center>
<table style="border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
border: 5px solid #000000;">
<form id="form_login" action="processaLogin.php" method="post">
<tr><td ><img id="olho" src="http://osaventureirosmc.com.br/imagens/logo.png" width="30px" height="30px" title="Ver senha"></td><td style="vertical-align: bottom;"><b>Acesso restrito</b></td></tr>
<tr><td colspan="2" >Usuário</td></tr>
<tr><td colspan="2"><input type="text" class="form-control" id="login" name="login" placeholder="" required  ></td></tr>
<tr><td colspan="2">Senha</td></tr>
<tr><td colspan="2"><input type="password" class="form-control" id="senha" name="senha" placeholder="" required  >
</center></td></tr>
<tr><td colspan="2"><input type="submit" class="salvar" value="Entrar"  /></td></tr>
</form>
</table>
</center>
</body>
</html>
<script>
		//var z = dhtmlXComboFromSelect("pai");
		//z.enableFilteringMode(true);
		
		$(function(){
    $('#ordem').bind('keydown',soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
	$( "#olho" ).mousedown(function() {
  $("#senha").attr("type", "text");
});

$( "#olho" ).mouseup(function() {
  $("#senha").attr("type", "password");
});
});
	</script>
