<?
   //INCLUI ARQUIVO DE CONFIGURAÇÃO DE CONEXÃO AO BANCO
   //include "./config/conexao.php";



   //INCLUI ARQUIVO DE FUNCOES COMPLEMENTARES PARA O SITE
   include "../classes/util.php";

   //INCLUI ARQUIVO DE FUNCOES REFERENTES A URL AMIGÁVEL
   include "../classes/Url.php";
?>

		

    <!-- Navigation -->
	 <div class="container">
	 <div class="row">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
				<table>
				<tr>
					<td>
						<a class="navbar-brand" href="<?= $caminho_servidor ?>/admin" rel="home"  title="TOFFY - Site especializado em soluções de sistemas de informação">
						<img style="max-width:100px; margin-top: -7px;"
						src="<?= $caminho_servidor ?>/imagens/logo.png">
						</a>
					</td>
					<td valign="BOTTOM">
					<h1 class="h1title">Painel Administrativo-<p>Olá <u><?php echo strtoupper($_SESSION['username']); ?></u></p></h3></td><td>
	</u>-<a data-toggle="modal"  data-target="#myModalSair"data-backdrop="static">Sair</a>
	</td></tr>
	</table>
	
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/cadastros/aplicativos">Aplicativos</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/cadastros/clientes">Clientes</a>
                            </li>
							<li>
                                <a href="<?= $caminho_servidor ?>/admin/cadastros/departamentos">Departamentos</a>
                            </li>
							<li>
                                <a href="<?= $caminho_servidor ?>/admin/cadastros/funcoes">Funções</a>
                            </li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/serviços/vagas">Vagas de emprego</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/serviços/currículos">Currículos</a>
                            </li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Financeiro<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/financeiro/tabela_produtos">Tabela de produtos</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/financeiro/contratos">Contratos</a>
                            </li>
                        </ul>
                    </li>

					
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurações<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= $caminho_servidor ?>/admin/configurações/menu_site">Menu Site</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/serviços/criação-de-sites">Slide Inicial</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/serviços/chatter-bot">Marketing</a>
                            </li>
                            
                           
                        </ul>
                    </li>
					 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Painel de controle<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?= $caminho_servidor ?>/serviços/sistemas">Usuários</a>
                            </li>
                            <li>
                                <a href="<?= $caminho_servidor ?>/serviços/criação-de-sites">Perfis</a>
                            </li>
                           
                        </ul>
                    </li>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
			
        </div>
       
	</div>
 
    </nav>

	</div>
	
		 