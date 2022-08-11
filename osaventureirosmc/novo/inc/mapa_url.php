<?
ini_set('default_charset','UTF-8');

/* 
 * TRATANDO URL AMIGAVEIS
 * DEFINICAO CLASSE= Url.php
 
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

$pagina = "";
$url = "";


//Verificando se ainda esta na pagina inicial apenas parametros da cidade selecionada

	
	$urltemp  = rawurldecode($UrlP1);
	
    switch ($urltemp) {
		case 'quem-somos':
			$pagina = rawurldecode($UrlP2);
			switch ($pagina) {
					case 'história-do-motoclube':
					$pagina = "historia";
					break;
					case 'filosfia':
					$pagina = "filosofia";
					break;
					case 'por-que-as-caveiras':
					$pagina = "caveiras";
					break;
					case 'integrantes':
					$pagina = "integrantes";
					break;
					case 'depoimentos':
					$pagina = "depoimentos";
					break;
				}
		break;
		case 'agenda':
			$pagina = rawurldecode($UrlP2);
			switch ($pagina) {
					case 'notícias':
					$pagina = "noticias";
					break;
					case 'eventos':
					$pagina = "eventos";
					break;
					case 'galeria':
					$pagina = "galeria";
					break;
					case 'agenda-completa':
					$pagina = "agenda";
					break;
				}
		break;
		case 'parceiros':
			$pagina = rawurldecode($UrlP2);
			switch ($pagina) {
					case 'comerciais':
					$pagina = "comerciais";
					break;
					case 'motoclubes':
					$pagina = "motoclubes";
					break;
					case 'entidades':
					$pagina = "entidades";
					break;					
				}
		break;
        case 'contato':
            $pagina = rawurldecode($UrlP2);
			$cidade = rawurldecode($UrlP3);

			switch ($pagina) {
				case 'seja-um-associado':
				$pagina = "vagas";
				break;
				case 'dúvidas-e-sugestões':
				$pagina = "curriculos";
				break;
				case 'cadastre-um-evento':
				$pagina = "documentos";
				break;
				case 'deixe-um-depoimento':
				$pagina = "documentos";
				break;
			}
			
        break;

	
	//Redimensionar para página
	$redirect = "$caminho_servidor/paginas/$pagina.php";
	
	echo "<script>alert('$redirect');</script>";
}


?>