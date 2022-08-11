<?php
$TITLE = 'Bem Vindo!';

include_once "../../class/RelativePath.class.php";

$relative = new relativePath();

include $relative->path()."inc/head.php";
// include_once $str."/segurança/verificaLogin.php";
// protegePagina();
include $relative->path()."inc/header.php";
?>