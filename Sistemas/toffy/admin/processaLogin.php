<?php
// começar ou retomar uma sessão
ob_start();  
session_start();   
  include "../config/caminho_servidor.php"; 
  include "../config/conexao.php";
// se vier um pedido para login
if (!empty($_POST)) {
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

 
	// receber o pedido de login com segurança
	$username = mysql_real_escape_string($_POST['username']);
	$password = sha1($_POST['password']);
 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
	$login = mysql_query("SELECT codigo,login FROM tc_users WHERE login = '$username' AND senha = '$password'");
 
	if ($login && mysql_num_rows($login) == 1) {
 
		// o utilizador está correctamente validado
		// guardamos as suas informações numa sessão
		$_SESSION['id_admin'] = mysql_result($login, 0, 0);
		$_SESSION['username'] = mysql_result($login, 0, 1);
			header('Location:'.$caminho_servidor.'/admin');

	} else {
     
	 
	echo "<script type='text/javascript'> alert('Usuário ou senha invalido!'); window.location.href = '$caminho_servidor'; </script>";
	}
}
?>