<?php
session_start();


$caminho_root = $_SERVER['SERVER_NAME'];
$pos = (strripos($caminho_root,'127.0.0.1'));
if ($pos === false) 
{
    //CONFIGURAÇÃO
    $db_username 		= 'guiamaniaonline'; //database username
    $db_password 		= '@guia@123banco'; //dataabse password
    $db_name 			= 'guiamaniaonline'; //database name
    $db_host 			= '187.94.192.31'; //hostname or IP

}
else
{
    //CONFIGURAÇÃO DO SITE

    $db_username 		= 'root'; //database username
    $db_password 		= ''; //dataabse password
    $db_name 			= 'guiamaniaonline'; //database name
    $db_host 			= 'localhost'; //hostname or IP
}


$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql

//Output any connection error
if ($mysqli_conn->connect_error) {
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}
$mysqli_conn->query("SET NAMES 'utf8'");
$mysqli_conn->query('SET character_set_connection=utf8');
$mysqli_conn->query('SET character_set_client=utf8');
$mysqli_conn->query('SET character_set_results=utf8');

?>