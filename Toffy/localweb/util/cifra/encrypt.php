<?php

    $recebido = $_GET['text'] . "noPELO";

    if(isset($recebido) && $recebido != ''){
        $encriptacao = md5($recebido);
        // $encriptacao = $recebido;
        echo $encriptacao;
    }
    else {
        echo "vazio";
    }


?>