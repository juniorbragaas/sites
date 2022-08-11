<?
  include "../config/caminho_servidor.php"; 
?>
<html>
<head>
  <title>Login b&aacute;sico com PHP</title>
  <style>
  .sombrarredondada{
   background-color: #FFF;
   color: #fff;
   width: 400px;
   padding: 10px;
   -moz-border-radius: 7px;
   -webkit-border-radius: 7px;
   
   box-shadow: 10px 10px 3px #000;
   -webkit-box-shadow: 0px 0px 3px #000;
   -moz-box-shadow: 15px -10px 3px #000;
}
  </style>
</head>
<body>
<center>
<div class="sombrarredondada">
<table >
  <form action="processaLogin.php" method="POST">
  <tr>
  <td colspan="2">  <center>       <a class="navbar-brand" href="<?= $caminho_servidor ?>" rel="home"  title="TOFFY - Site especializado em soluções de sistemas de informação">
        <img style="max-width:100px; margin-top: -7px;"
             src="<?= $caminho_servidor ?>/imagens/logo.png">
    </a>
</td>
 <tr>
  <td colspan="2"><center><b>Painel Administrativo</b></center></center>
</td>
  </tr>
  <tr>
	<td>Usuário</td>
	<td><input type="text" name="username" /></td>
  </tr>
  <tr>
	<td>Senha</td>
	<td><input type="password" name="password" /></td>
  </tr>
  <tr>
	<td></td>
	<td><input type="submit" name="submit" value="Entrar" /></td>
  </tr>

  </form>
  
  </table>
  </div>
  </center>
</body>
</html>
