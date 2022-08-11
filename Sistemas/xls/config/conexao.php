<?php
//CONFIGURAÇÃO DO SITE
$servidor = $_SERVER['SERVER_NAME'];
$usuario = "root";
$senha = "";
$base_dados = "xls";
	
 
try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$base_dados", $usuario, $senha,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	// conecta ao banco de dados 
$con = mysql_connect("Localhost","root","") or trigger_error(mysql_error(),E_USER_ERROR); 
 $caminho_servidor = "http://".$_SERVER['SERVER_NAME']."/admin";

// seleciona a base de dados em que vamos trabalhar 
mysql_select_db($base_dados, $con); 
	
    }
catch(PDOException $e)
    {
    	echo $e->getMessage();
    }
?>
