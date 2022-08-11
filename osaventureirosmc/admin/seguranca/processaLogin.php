<?php
// começar ou retomar uma sessão
ob_start();  
session_start(); 

//echo "Teste";  
  include "../config/caminho_servidor.php"; 
  include "../config/conexao.php";
echo $_POST['login']; 
// se vier um pedido para login
if (!empty($_POST)) {

 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

 
	// receber o pedido de login com segurança
	$username = mysql_real_escape_string($_POST['login']);
	
	//echo "<br>".$username." - ".$_POST['senha']." - ".sha1($_POST['senha'])."<br>"; exit;
	$password = sha1($_POST['senha']);
	
 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
	$SQL = "
	SELECT 
		u.codigo,
		u.login,
		u.perfil,
        p.permissao		
	FROM 
		tc_users u
		LEFT JOIN tc_perfil p  On p.codigo = u.perfil
	WHERE 
		login = '$username' AND senha = '$password' AND ativo = 1";
	//echo "<br>$SQL<br>"; exit;
	$login = mysql_query($SQL);
 
	if ($login && mysql_num_rows($login) == 1) {
 
		// o utilizador está correctamente validado
		// guardamos as suas informações numa sessão
		$_SESSION['id'] = mysql_result($login, 0, 0);
		$_SESSION['username'] = mysql_result($login, 0, 1);
		$_SESSION['perfil'] = mysql_result($login, 0, 2);
		$_SESSION['permissao'] = mysql_result($login, 0, 3);
		echo "<script> window.top.location.href='../'; </script>";

	} else {
     
	 
	echo "<script type='text/javascript'> alert('Usuário ou senha invalido!'); location.href='login.php'; </script>";
	}
}
?>