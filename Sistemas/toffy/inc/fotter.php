 <!--==========================
  Footer
============================--> 

  <footer id="footer">
  <div class="container">
  <div class="row">
						<?
						//define o encoding do cabeçalho para utf-8
						@header("Content-Type: text/html; charset=utf-8");
						//carrega o arquivo XML e retornando um Objeto
						$xml = simplexml_load_file("inc/menu_map.xml");
						// se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.
						// $xml = simplexml_load_file(“http://endereco/link/mesmoQueNaoTenhaExtensaoXML/“);
						//para cada nó LIVRO  atribui à variavel $livro (obj simplexml)
						$anterior=1;
						$proximo = 0;
						foreach($xml->item as $item)
						{
						 if($item->pai == 0)
						 {
							$proximo++;
							if($proximo != $anterior)
							{
							$anterior++;
							echo "</div>";
							echo "<div class='col-md-3'>";
							echo "<b>".$item->nome."</b><br>";
							}
							else
							{
							echo "<div class='col-md-3'>";
							echo "<b>".$item->nome."</b><br>";
							}
						 }
						 else
						 {
						 echo "<li><a href='".$item->link."' >".$item->nome."</a></li>";
						 }
						

						}
						?>
	</div>
	</div>       
  </footer>
	<div  style="background-color:#4486c2; width:100%">
	<br><br>
		<div class="copyright">
		<center> &copy; Copyright 2016 <strong>TOFFY</strong>. Todos direitos reservados </center>
		</div>
		<div class="credits">
		<center>Desenvolvido by <b>Valdelei Junior Braga</b></center><br><br>
		</div>
	<hr>
	</div>
