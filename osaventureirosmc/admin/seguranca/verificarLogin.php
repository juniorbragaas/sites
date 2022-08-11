<?
session_start();
if (empty($_SESSION['id'])) {
 
	// não existe sessão iniciada
	// neste caso, levamos o utilizador para a página de login
		$menu = "MontaMenu()";
	    $srcframe = "./seguranca/login.php";
}
else
{
	$menu = "MontaMenu()";
	$srcframe = "./paginas/000_principal/index.php";
	$boasvindas = "
	<table width='100%'>
	<tr>
		<td>
		    Seja bem vindo <b>".strtoupper($_SESSION['username'])."</b>
		</td>
		<td align='right'>
		<a href='seguranca/logout.php'>Sair</a>
		</td>
	</tr>
	</table>
	
	";
}
?>