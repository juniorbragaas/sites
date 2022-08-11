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
$config->setHeader(array("Codigo","Atendente","Login","Perfil","Ativo","Acessado em"));
//CONFIGURAR TIPOS DE COLUNA
$config->setColTypes(array("ro","ro","ro","ro","ro","ro"));
//CONFIGURAR ALINHAMENTO DE COLUNA
$config->setColAlign(array("left","left","left","left","left","left"));
//CONFIGURAR LARGURA DE COLUNA
$config->setInitWidths(array("100","160","160","100","120","120"));
//CONFIGURAR TIPOS DE FILTRO DE COLUNAS
$config->setColSorting(array("int","str","str","int","str","str"));
//DELIMITADOR DE CONFIGURAÇÃO DE CABEÇALHO
$config->setHeaderDelimiter(",");
//ADICIONANDO FILTRO DE PESQUISA
$config->attachHeader("#numeric_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter",null);
 
$conn->set_config($config);
$SQL = "SELECT 
			m1.codigo as codigo,
			m2.nome_completo as atendente,
			m1.login as login,
			p.nome as perfil,
			if(m1.ativo = 1,'Sim','Não') as ativo,
			m1.ultimo_acesso as acessado_em
		FROM 
			tc_users m1
			LEFT JOIN tc_atendentes m2 On m1.atendente = m2.codigo
			LEFT JOIN tc_perfil p ON p.codigo = m1.perfil
		oRDER BY m1.codigo ";
$conn->render_complex_sql($SQL,"codigo","codigo,atendente,login,perfil,ativo,acessado_em");     // data configuration
?>
	 

        