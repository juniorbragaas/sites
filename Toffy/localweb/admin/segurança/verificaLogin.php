<?php
function protegePagina()
{
    if (!isset($_SESSION['codigo']) or !isset($_SESSION['login']))
    {
        // N�o h� usu�rio logado, manda pra p�gina de login
        expulsaVisitante();
    }
}

function expulsaVisitante()
{
    unset($_SESSION['codigo'], $_SESSION['login'], $_SESSION['perfil'], $_SESSION['senha'], $_SESSION['permissao']);
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

?>