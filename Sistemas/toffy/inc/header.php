 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu_principal">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">
					
					
					</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
				 <table>
					<tr>
						<a class="navbar-brand" href=""><td><img src="imagens/logo.png" title="TOFFY - Soluções em sistemas" style="height:50px; width:50px;" alt="TOFFY" /></td></a>
						<td><p style=" margin-top:10px; font-size:25px; color:#3e94ba; "></td>
						<td></td>
					</tr>
				</table>				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu_principal">
                <ul class="nav navbar-nav navbar-right">
						<?
						//define o encoding do cabeçalho para utf-8
						@header("Content-Type: text/html; charset=utf-8");
						//carrega o arquivo XML e retornando um Objeto
						$xml = simplexml_load_file("inc/menu_principal.xml");
						// se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.
						// $xml = simplexml_load_file(“http://endereco/link/mesmoQueNaoTenhaExtensaoXML/“);
						//para cada nó LIVRO  atribui à variavel $livro (obj simplexml)
						foreach($xml->item as $item)
						{
						 echo "<li><a href='".$item->link."' class='scrollSuave'>".$item->nome."</a></li>";
						}
						?> 
<li> <table style="margin-top:5px;"> <tr><td><input type="text" class="form-control"  placeholder="Procurar..." ></td><td>
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span></td></tr></table></li>						
				</ul>
				
            </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>