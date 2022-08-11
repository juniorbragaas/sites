<?php
//CAMINHO DO SERVIDOR LOCAL

//analisando se esta no servidor Local ou no site

$caminho_root = $_SERVER['SERVER_NAME'];

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if ((strcmp($caminho_root,'www.toffy.com.br') == 0) )
 
{

    $caminho_servidor = "http://www.toffy.com.br";
}
else
{

    $caminho_servidor = "http://".$_SERVER['SERVER_NAME'];
}
?>