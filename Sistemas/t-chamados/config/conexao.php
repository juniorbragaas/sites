<?php

$caminho_root = $_SERVER['SERVER_NAME'];
$servidor = "";
$usuario = "";
$senha = "";
$base_dados = "";


//echo "<br>$caminho_root</br>"; exit;
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

    //CONFIGURAÇÃO LOCAL
    $servidor = "Localhost";
	$usuario = "root";
	$senha = "";
	$base_dados = "toffy";



// conecta ao banco de dados 
$con = mysql_connect("Localhost","root","") or trigger_error(mysql_error(),E_USER_ERROR); 

// seleciona a base de dados em que vamos trabalhar 
mysql_select_db("toffy", $con); 









?>