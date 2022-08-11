<?php

$caminho_root = $_SERVER['SERVER_NAME'];
$servidor = "";
$usuario = "";
$senha = "";
$base_dados = "";


error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if (strcmp($caminho_root,'127.0.0.1') != 0)
 
{
    //CONFIGURAÇÃO LOCAL
    $servidor = "187.94.192.24";
	$usuario = "root_toffy";
	$senha = "toffy2015";
	$base_dados = "root_toffy";
	mysql_connect("187.94.192.24", "root_toffy" , "toffy2015") or die("Não foi possível conectar ao servidor");
    mysql_select_db("root_toffy") or die("Não foi possível selecionar o banco de dados.");
}
else
{
    //CONFIGURAÇÃO DO SITE
	$servidor = "Localhost";
	$usuario = "root";
	$senha = "";
	$base_dados = "toffy";
    mysql_connect("Localhost", "root" , "") or die("Não foi possível conectar ao servidor");
    mysql_select_db("toffy") or die("Não foi possível selecionar o banco de dados.");
	
	

	
}

// conecta ao banco de dados 
$con = mysql_connect($servidor, $usuario, $senha) or trigger_error(mysql_error(),E_USER_ERROR); 

// seleciona a base de dados em que vamos trabalhar 
mysql_select_db($base_dados, $con); 
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');








?>