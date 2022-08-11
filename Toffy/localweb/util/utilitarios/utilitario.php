<?php


class utilitario
{
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
        $_corrigedor = $this->tiraEspacosDuplos($_corrigedor);
        $_corrigedor = str_replace(" ","_",$_corrigedor);
        $_corrigedor = $this->tiraUnderlineDuplos($_corrigedor);
        $_corrigedor = $this->tirarAcentos($_corrigedor);
        $_corrigedor = preg_replace('([^[a-zA-Z0-9_])', '',$_corrigedor); //aceita palavra com acento
        return $_corrigedor;
    }
// colocar os requisitos
    function validaDados ($str){
        $_corrigedor = $str;
        $_corrigedor = trim($_corrigedor);
        $_corrigedor = $this->protect($_corrigedor);
        $_corrigedor = $this->tiraEspacosDuplos($_corrigedor);
        $_corrigedor = str_replace( '<script>', '', $_corrigedor );
        $_corrigedor = str_replace("</script>",'',$_corrigedor);
        //aceita palavra com acento
        return $_corrigedor;
    }

    function validaEmail( $str ){
        if (!preg_match('/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/',$str)){
            $mensagem='E-mail Inv&aacute;lido!';
            return $mensagem;
        }
        else{
            //Valida o dominio
            $dominio=explode('@',$str);
            if(!checkdnsrr($dominio[1],'A')){
                $mensagem='E-mail Inv&aacute;lido!';
                return $mensagem;
            }
            else{return $str;} // Retorno true para indicar que o e-mail é valido
        }
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
}