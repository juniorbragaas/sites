<?php
//CAMINHO DO SERVIDOR LOCAL

//analisando se esta no servidor Local ou no site

$caminho_root = $_SERVER['SERVER_NAME'];

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
if ((strcmp($caminho_root,'www.cealexpress.com.br') == 0) || (strcmp($caminho_root,'cealexpress.com.br') == 0))
 
{

    $caminho_servidor = "http://www.cealexpress.com.br";
}
else
{

    $caminho_servidor = "http://".$_SERVER['SERVER_NAME']."/cealexpress";
}
?>