<!-- MODAL LOGIN -->
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
              <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img style="max-width:100px; margin-top: -7px;"
             src="images/logo.png">
        </div>
        <div class="modal-body">
<center>

		<div class="sombrarredondada">
<table >
  <form action="./admin/seguranca/processaLogin.php" method="POST">
  <tr>
	<td>Login</td>
  </tr>
  <tr>
	<td><input type="text" name="login" /></td>
  </tr>
  <tr>
	<td>Senha</td>
	 </tr>
  <tr>
	<td><input type="password" name="senha" /></td>
  </tr>
  <tr>
  </tr>
  <tr><td colspan="2"><input type="submit" class="salvar" value="Entrar"  /></td></tr>

  </form>
  
  </table>
  <br>
		</div>
	</div>
</div>
  </div>
</div>

 
 <!-- Mapeamento de Menus -->
 <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>QUEM SOMOS</h3>
                        <ul>
                            <li><a href="<?=$caminho_servidor?>/paginas/historia.php">Historia do Motoclube</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/filosofia.php">Filosofia</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/caveiras.php">Por que as caveiras</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/integrantes.php">Integrantes</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/depoimentos.php">Depoimentos</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>AGENDA</h3>
                        <ul>
                            <li><a href="<?=$caminho_servidor?>/paginas/noticias.php">Notícias</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/eventos.php">Eventos</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/galerias.php">Galerias</a></li>
                            <li><a href="<?=$caminho_servidor?>/paginas/agendas.php">Agenda completa</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>PARCEIROS</h3>
                        <ul>
                            <li><a href="paginas/entidades.php">Entidades</a></li>
                            <li><a href="paginas/motoclubes.php">Motoclubes</a></li>
                            <li><a href="paginas/parceiros.php">Parceiros comerciais</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>CONTATO</h3>
                        <ul>
                            <li><a href="paginas/seja_socio.php">Seja um associado</a></li>
                            <li><a href="paginas/duvidas.php">Dúvidas e sujestões</a></li>
                            <li><a href="pagina/cadastrar_evento.php">Cadastre um evento</a></li>
                            <li><a href="paginas/enviar_depoimento.php">Deixe um depoimento</a></li>
							 <li><a data-toggle="modal" data-target="#myModal"data-backdrop="static" title="Entre com seu usuario ou cadastre-se">Acesso restrito</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
			<br><br>
        </div>
    </section><!--/#bottom-->
<footer id="footer" class="navbar-fixed-bottom">
        <div class="container">
            <div class="row">
			 <div class="col-sm-7">
                    <ul class="pull-left">
                        <li><a href="#home" class= "scrollSuave">Home</a></li>
                        <li><a href="#quemsomos" class= "scrollSuave">Sobre</a></li>
                        <li><a href="#eventos" class= "scrollSuave">Eventos</a></li>
						<li><a href="#galeria" class= "scrollSuave">Galeria</a></li>
						<li><a href="#produtos" class= "scrollSuave">Produtos</a></li>
                        <li><a href="#parceiros" class= "scrollSuave">Parceiros</a></li>
						<li><a href="#contato" class= "scrollSuave">Contato</a></li>
						<li><a data-toggle="modal" data-target="#myModal"data-backdrop="static" title="Entre com seu usuario ou cadastre-se">Acesso restrito</a></li>
                    </ul>
             </div>
             <div class="col-sm-5 pull-left">
                    &copy; 2017  Desenvolvido por <a target="_blank" href="http://www.toffy.com.br" title="Desenvolvido por TOFFY">TOFFY</a>. 
             </div>
               
            </div>
        </div>
</footer><!--/#footer-->