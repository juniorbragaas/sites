<?php
require_once("../../js/dhtmlx/dhtmlxConnector/grid_connector.php");//includes related connector file

include("../../config/conexao.php");
$res=mysql_connect($servidor,$usuario,$senha);//connects to server containing the desired DB
mysql_select_db($base_dados);           //connects to DB.'sampledb' is the name of our DB
$conn = new GridConnector($res,"MySQL");                    // connector initialization
$conn ->dynamic_loading(10);
$SQL = "";
$conn->render_table("c_users","codigo","codigo,nomecompleto,email,login");     // data configuration
?>
	 

        