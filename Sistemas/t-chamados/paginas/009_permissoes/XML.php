<?php
include("../../config/conexao.php");
include("../../js/dhtmlxSuite/sources/dhtmlxConnector_php/codebase/grid_connector.php");//includes related connector file
$res=mysql_connect($servidor,$usuario,$senha);//connects to server containing the desired DB
mysql_select_db($base_dados);           //connects to DB.'sampledb' is the name of our DB
mysql_query("SET NAMES UTF8");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$conn = new GridConnector($res,"MySQL");                    // connector initialization
//$conn ->dynamic_loading(10);
$config = new GridConfiguration();
//CONFIGURAR LABELS
$config->setHeader(array("Codigo","Nome"));
//CONFIGURAR TIPOS DE COLUNA
$config->setColTypes(array("ro","ro"));
//CONFIGURAR ALINHAMENTO DE COLUNA
$config->setColAlign(array("left","left"));
//CONFIGURAR LARGURA DE COLUNA
$config->setInitWidths(array("150","160"));
//CONFIGURAR TIPOS DE FILTRO DE COLUNAS
$config->setColSorting(array("int","str"));
//DELIMITADOR DE CONFIGURAÇÃO DE CABEÇALHO
$config->setHeaderDelimiter(",");
//ADICIONANDO FILTRO DE PESQUISA
$config->attachHeader("#numeric_filter,#text_filter",null);
 
$conn->set_config($config);
$SQL = "SELECT * FROM tc_perfil";
$conn->render_complex_sql($SQL,"codigo","codigo,nome");     // data configuration
?>
	 

        