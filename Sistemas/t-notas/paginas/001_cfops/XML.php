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
$config->setHeader(array("Codigo","Cod CFOP","Descricao CFOP","Cod Categoria","Descricao Categoria","Cod Tipo","Descricao Tipo","Atualizacao","Ano"));
//CONFIGURAR TIPOS DE COLUNA
$config->setColTypes(array("ro","ro","ro","ro","ro","ro","ro","ro","ro"));
//CONFIGURAR ALINHAMENTO DE COLUNA
$config->setColAlign(array("left","left","center","left","left","left","left","left","left"));
//CONFIGURAR LARGURA DE COLUNA
$config->setInitWidths(array("100","100","200","100","200","100","200","80","80"));
//CONFIGURAR TIPOS DE FILTRO DE COLUNAS
$config->setColSorting(array("int","str","str","int","str","str","str","str","str","str"));
//DELIMITADOR DE CONFIGURAÇÃO DE CABEÇALHO
$config->setHeaderDelimiter(",");
//ADICIONANDO FILTRO DE PESQUISA
$config->attachHeader("#numeric_filter,#text_filter,#text_filter,#combo_filter,#combo_filter,#combo_filter,#combo_filter,#text_filter,#text_filter",null);
 
$conn->set_config($config);
$SQL = "SELECT * FROM tn_cfop";
$conn->render_complex_sql($SQL,"codigo","codigo,cfop_cod,cfop_desc,categoria_cod,categoria_desc,tipo_cod,tipo_desc,atualizacao,ano");     // data configuration
?>
	 

        