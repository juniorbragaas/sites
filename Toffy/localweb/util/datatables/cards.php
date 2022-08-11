<?php
/* Title : Ajax Pagination with jQuery & PHP
Example URL : http://www.sanwebe.com/2013/03/ajax-pagination-with-jquery-php */

//continue only if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	//VARIAVEIS PARA O PREENCHIMENTO DO DATAVIEW	
	$item_por_pagina = 1; 
	$SQL = "SELECT codigo as codigo, nome as nome,ativo as ativo FROM tc_users ORDER BY codigo ASC";
	$CamposTabela = array("codigo","nome","ativo");
	
	
	//ARQUIVOS DE INCLUSAO DO DATAVIEW
	include "../../config/conexao.php";  //include config file
	include "../../class/dataview.class.php";  //include config file
	

	//EXIBINDO RESULTADOS EM FORMATO HTML .
	echo '<ul class="contents">';
	if($total > 0){
		
		do {

						echo "<li>";
								foreach($CamposTabela as $campos) {
						echo "$linha[$campos] - ";
						}
						echo "<br></li>";
                        echo "Mostrando <b>$numero_da_pagina</b> de <b>$total_r</b>";						

						
						// finaliza o loop que vai mostrar os dados
						}while($linha = mysql_fetch_assoc($dados));
	}
	echo '</ul>';

	
	//MONTANDO PAGINACAO NO FINAL DA PAGINA
	echo '<div align="center">';
	echo mostraPaginacao($item_por_pagina, $numero_da_pagina,$total, $total_de_paginas);
	echo '</div>';
	
	exit;
}


?>

