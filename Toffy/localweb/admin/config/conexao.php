<?php
header("Content-type: text/html; charset=utf-8");
$usuario = "";
$senha = "";
$base_dados = "";
$hostname = "";	
$url_site = "www.toffy.com.br";
$url_atual = $_SERVER['SERVER_NAME'];
if(strcmp ($url_site,$url_atual ) == 0){
	$usuario = "bd_toffy";
	$senha = "Toffy@2021@bd";
	$base_dados = "bd_toffy";
	$hostname = 'bd_toffy.mysql.dbaas.com.br';
}
else{
	$usuario = "root";
	$senha = "";
	$base_dados = "bd_toffy";
	$hostname = 'Localhost';
}
try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$base_dados", $usuario, $senha,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    	echo $e->getMessage();
    }
?>
