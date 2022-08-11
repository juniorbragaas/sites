<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="https://www.toffy.com.br"><img src="../imagens/logo.svg" alt="logo" height="50px"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav ml-auto">
		<li><a onclick="carregar('./pages/000001/index.php')" href="#" ><div class="item-menu-principal">Home</div></a></li>
		 <li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			  <div class="item-menu-principal">Administrativo</div> 
			</a>
			<ul class="dropdown-menu">
			  <li><a onclick="carregar('./pages/000004/index.php')"  href="#">Perfils</a></li>
			  <li><a onclick="carregar('./pages/000005/index.php')"  href="#">Usuários</a></li>
			  <li><a onclick="carregar('./pages/000006/index.php')" href="#" >Permissões</a></li>
			</ul>
		 </li>
		 
	</ul>
	<div>Olá <b>Administrador<b> | <a href="seguranca\logoff.php">Sair</a></div>
	</div>
	
</nav>
</header>
