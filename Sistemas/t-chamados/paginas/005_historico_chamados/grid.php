<html>
<head>
    <? 
	  include("../inc/css.php");
	  include("../inc/js.php");
      		  
	?> 
<link rel="stylesheet" type="text/css" href="<?= $caminho_servidor ?>/css/estilo.css"/>

<link rel="stylesheet" type="text/css" href="../../js/modal/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="grid.js" type="text/javascript" charset="utf-8" ></script>
</head>
<body>

  <div id="tela">
		
		<div id="cabecalho_pagina" width="100%" style="background-color: #827D7D; color: #FFFFFF;"><center>Histórico de Chamados : Tabela</center></div>
		<div id="botoes" width="100%" style="background-color: blue; vertical-align: middle;">
			<table>
			<tr>
			<td style="background-color: blue; vertical-align: middle;">
			<input class="alterar"  type="button" style="height:30px; " value="Alterar" onclick="if(myGrid.getSelectedRowId()) { location.href='CRUD.php?acao=alterar&codigo='+ myGrid.getSelectedRowId(); } else { alert('Selecione um registro para alterar!');}" />
			<input class="excluir"  type="button" style="height:30px; " value="Apagar" onclick="if(myGrid.getSelectedRowId()) { location.href='CRUD.php?acao=excluir&codigo='+ myGrid.getSelectedRowId(); } else { alert('Selecione um registro para excluir!');}" />
			</td>
			</tr>
			</table>
		</div>
		<div id="gridbox" style="width:100%; height:600px;"></div><script>MontaGrid();</script>
</div>

	
</body>
</html>

