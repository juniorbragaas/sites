<?
session_start();
 
if (empty($_SESSION['id_admin'])) {
 
	// não existe sessão iniciada
	// neste caso, levamos o utilizador para a página de login
	header('Location: '.$caminho_servidor.'/admin/login.php');
	exit();
}
?>