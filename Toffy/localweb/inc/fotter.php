 <!--==========================Footer============================-->

 <footer id="footer">
 	<div class="container">
 		<section id="map">
 			<div class="row">
 				<?
					//define o encoding do cabeçalho para utf-8
					@header("Content-Type: text/html; charset=utf-8");
					//carrega o arquivo XML e retornando um Objeto
					$xml = simplexml_load_file("inc/menu_map.xml");
					// se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.
					// $xml = simplexml_load_file(“http://endereco/link/mesmoQueNaoTenhaExtensaoXML/“);
					//para cada nó LIVRO  atribui à variavel $livro (obj simplexml)
					$anterior = 1;
					$proximo = 0;
					foreach ($xml->item as $item) {
						if ($item->pai == 0) {
							$proximo++;
							if ($proximo != $anterior) {
								$anterior++;
								echo "</div>";
								echo "</ul>";
								echo "<div class='col-md-3'>";
								echo "<b>" . $item->nome . "</b><br>";
								echo "<ul>";
							} else {
								echo "<div class='col-md-3'>";
								echo "<b>" . $item->nome . "</b><br>";
								echo "<ul>";
							}
						} else {
							if ($item->nome == "Acesso")
								echo "<li><a data-toggle='modal' data-target='#modalAdm' data-backdrop='static' data-keyboard='false' style='cursor: pointer' >$item->nome</a></li>";
							else
								echo "<li><a href='" . $item->link . "' >" . $item->nome . "</a></li>";
						}
					}
					?>
 			</div>
 		</section>
 	</div>
 	<div class="modal fade" id="modalAdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-dialog-centered" role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<form action="" method="post">
 					<div class="modal-body">
						<div class="form-group">
					 		<label>Usuario:</label>
							<input type="text">
						</div>
						<div class="form-group">
							<label>Senha:</label>
							<input type="password">
						</div>
 					</div>
 					
 				</form>
				<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
 					</div>
 			</div>
 		</div>
 	</div>
 	<section id="copyCredits" style="padding: 10px">
 		<div class="container">
 			<div class="copyright">
 				<div style="text-align: center;"> &copy; Copyright 2016 <strong>TOFFY</strong>. Todos direitos reservados </div>
 			</div>
 			<div class="credits">
 				<div style="text-align: center;">Desenvolvido por <a href="https://www.linkedin.com/in/valdelei-junior-braga-b9101329/" style="color: black;"><b>Valdelei Junior Braga</b></a> e <a href="https://www.linkedin.com/in/rafael-yukio-natsu-58536b171/" style="color: black;"><b>Rafael Yukio Natsu</b></a></div>
 			</div>
 		</div>
 	</section>
 </footer>