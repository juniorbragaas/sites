<?php
    function tirarAcentos($str){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c c"),$str);
    }
/*
    Todas as letras do campo em minusculo (lowcase)*

    Remover espaços extras (trim)*

    Remover espaços duplos (replace)*

    Substituir espaços por underline (replace)*

    Remover acentos de palavras e o “ç” (regex.replace())*

    Trocar letras com acentos para sem acento*
*/
    function validaAtributos ($str){
        $_corrigedor = strtolower($str);
        $_corrigedor = trim($_corrigedor);
        $_corrigedor = tiraEspacosDuplos($_corrigedor);
        $_corrigedor = str_replace(" ","_",$_corrigedor);
        $_corrigedor = tiraUnderlineDuplos($_corrigedor);
        $_corrigedor = tirarAcentos($_corrigedor);
        $_corrigedor = preg_replace('([^[a-zA-Z0-9_])', '',$_corrigedor); //aceita palavra com acento
        return $_corrigedor;
    }
// colocar os requisitos
    function validaDados ($str){
        $_corrigedor = $str;
        $_corrigedor = trim($_corrigedor);
        $_corrigedor = protect($_corrigedor);
        $_corrigedor = tiraEspacosDuplos($_corrigedor);
        $_corrigedor = str_replace( '<script>', '', $_corrigedor );
        $_corrigedor = str_replace("</script>",'',$_corrigedor);
         //aceita palavra com acento
        return $_corrigedor;
    }
    
    function protect( $str ) {
        /*** Função para retornar uma string/Array protegidos contra SQL/Blind/XSS Injection*/
        $str = (string)addslashes($str);    
        return $str;
    }

    function tiraEspacosDuplos($str){
        $varRetorno = $str;
        while (strpos($varRetorno,"  ") > 0) {
            $varRetorno = str_replace("  "," ",$varRetorno);
        }
        return $varRetorno;
    }

    function tiraUnderlineDuplos($str){
        $varRetorno = $str;
        while (strpos($varRetorno,"__") > 0) {
            $varRetorno = str_replace("__","_",$varRetorno);
        }
        return $varRetorno;
    }
?>