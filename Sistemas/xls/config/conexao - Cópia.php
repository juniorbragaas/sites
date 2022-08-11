<?php

$caminho_root = $_SERVER['SERVER_NAME'];
$servidor = "";
$usuario = "";
$senha = "";
$base_dados = "";


//echo "<br>$caminho_root</br>"; exit;
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if ((strcmp($caminho_root,'www.toffy.com.br') == 0) )
 
{
    //CONFIGURAÇÃO LOCAL
    $servidor = "179.108.192.137";
	$usuario = "root_toffy";
	$senha = "toffy2015";
	$base_dados = "root_toffy";
	mysql_connect("179.108.192.137", "root_toffy" , "toffy2015") or die("Não foi possível conectar ao servidor");
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









?>