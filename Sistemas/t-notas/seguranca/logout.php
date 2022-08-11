<?php
// aceder às sessões
include "../config/caminho_servidor.php"; 
session_start();
 
// para terminar uma sessão, apenas é necessário destruí-la
session_destroy();
 
// redirecionar o utilizador para outra página, login.php por exemplo
echo "<script> window.top.location.href='../'; </script>";
?>