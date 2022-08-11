<?
ini_set('default_charset','UTF-8');

/* 
 * TRATANDO URL AMIGAVEIS
 * DEFINICAO CLASSE= Url.php
 * $pagina = recebe o nome da página
 * Url::getURL( indice ) = recebe o que esta entre // de acordo com o indice da pagina
 * PAGINAS DISPONIVEISNO MOMENTO:
 * busca.php = pagina de busca direta do site
 * segmentos.php = paginas de exibicao de segmentos
 * principal.php = paginas que contem todos os desenhos de segmentos
 * 
 * PAGINAS AINDA EM DESENVOLVIMENTO
 * 
 * 
 * Segmentos-mapa
 * 
 * A_Empresa.php
 * Guia_Mania_Impresso.php
 * Distribuicao.php
 * Guia_Mania_Online.php
 * Trabalhe_Conosco.php
 * Fale_com_o_Guia.php
 * Onde_Estamos.php

*/


// Pega o primeiro caminho da url
$UrlP1 = Url::getURL( 0 ); 
$UrlP2 = Url::getURL( 1 ); 
$UrlP3 = Url::getURL( 2 ); 
$UrlP4 = Url::getURL( 3 ); 
$UrlP5 = Url::getURL( 4 ); 
$UrlP6 = Url::getURL( 5 ); 
$UrlP7 = Url::getURL( 6 ); 
$UrlP8 = Url::getURL( 7 ); 

$cidade = $UrlP1;
$bairro = $UrlP2;
$pagina = $UrlP3;
$url = "";

$segmento = "";
$subsegmento = "";
$codigo_empresa = "";
$nome_empresa = "";
$tipo_evento = "";
$local_evento = "";
$parametros = "";
$classificacao_filme = "";
$genero_filme = "";
$local_filme = "";

//Verificando se ainda esta na pagina inicial apenas parametros da cidade selecionada
if($UrlP1 == null)
{
    $urltemp = "principal";
	$pagina = "principal";
}
else
{	
	$urltemp  = rawurldecode($UrlP1);
    switch ($urltemp) {
		/* Cadastros básicos */
		case 'cadastros':
				$urltemp2  = rawurldecode($UrlP2);
				switch ($urltemp2) 
				{
					case 'aplicativos':
					$pagina = "aplicativos";
					break;
					case 'clientes':
					$pagina = "clientes";
					break;
					case 'departamentos':
					$pagina = "departamentos";
					break;
					case 'funcoes':
					$pagina = "funcoes";
					break;
				}
		break;
        case 'serviços':
				$urltemp2  = rawurldecode($UrlP2);
				switch ($urltemp2) 
				{
					case 'vagas':
					$pagina = "vagas";
					break;
					
				}
		break;
		case 'configurações':
				$urltemp2  = rawurldecode($UrlP2);
				switch ($urltemp2) 
				{
					case 'menu_site':
					$pagina = "menu_site";
					break;
					
				}
		break;
    
        
    }
}    if( file_exists( "paginas/" . $pagina . ".php" ) )
        
        //Carregar paginas
        require "paginas/" . $pagina . ".php" ;
    else
        //Pagina de erro que pagina não existe
        require "paginas/404.php";

?>