<?php

$caminho_root = $_SERVER['SERVER_NAME'];
$servidor = "";
$usuario = "";
$senha = "";
$base_dados = "";


//echo "<br>$caminho_root</br>"; exit;
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if ((strcmp($caminho_root,'www.osaventureirosmc.com.br') == 0) || (strcmp($caminho_root,'osaventureirosmc.com.br') == 0) )
  
{

    //CONFIGURAÇÃO LOCAL
    $servidor = "localhost";
	$usuario = "osaventu_root";
	$senha = "@oamc@2017";
	$base_dados = "osaventu_oamc";
	//mysql_connect("107.161.188.242", "osaventu_root" , "@oamc@2017") or die("Não foi possível conectar ao servidor");
    //mysql_select_db("osaventu_oamc") or die("Não foi possível selecionar o banco de dados.");
}


// conecta ao banco de dados 
$con = mysql_connect($servidor, $usuario, $senha) or trigger_error(mysql_error(),E_USER_ERROR); 

// seleciona a base de dados em que vamos trabalhar 
mysql_select_db($base_dados) or die("Não foi possível selecionar o banco de dados.");









?>