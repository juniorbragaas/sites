<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/eModal.min.js"></script>
<section id="noticias" STYLE="width:100%; background-color:#FFfff;">
        <div class="container" STYLE="width:100%;  background-color:#fffff; margin-top:-55px; ">
            <div class="row">
			<center><h2>NOTICIAS</h2></center>
                <div class="col-xs-14 col-sm-14 wow fadeInDown">
                   <div class="tab-wrap"> 
                        <div class="media">
						<div class="parrent pull-left">
                                <ul class="nav nav-tabs nav-stacked">
								
									<?php
							
							
									/* Busca de dados para mostrar na tela */
	$SQL = "
SELECT
d3.codigo as codigo,
d3.titulo,
d3.descricao,
DATE_FORMAT(d3.data_inicio,'%d/%m/%Y') as data_inicio,
if(d3.destaque = 1,'Sim','Não') as destaque,
d3.cadastrado_em
FROM
(
SELECT
*
FROM
(
SELECT 
a.codigo as codigo,
a.titulo,
a.descricao,
a.data_inicio,
if(a.destaque = 1,'Sim','Não') as destaque,
a.cadastrado_em
FROM 
tc_eventos a
WHERE a.noticia = 1  and data_inicio >= now()
Order by a.data_inicio ASC
) d1

UNION

SELECT
*
FROM
(
SELECT 
a.codigo as codigo,
a.titulo,
a.descricao,
a.data_inicio,
if(a.destaque = 1,'Sim','Não') as destaque,
a.cadastrado_em
FROM 
tc_eventos a
WHERE a.noticia = 1  and data_inicio < now()
Order by a.data_inicio DESC
) d2
) d3
ORDER BY d3.data_inicio DESC
LIMIT 0,4

				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
					$codigo= utf8_encode($linha[codigo]);
					$titulo = utf8_encode($linha[titulo]);
					$cont++;
					$ativado = "";
					if($cont == 1)
					{
					  $ativado = "active";
					}
					else
					{
					$ativado = "";
					}
					?>
					  <li class="<?=$ativado ?>"><a href="<? echo "#".$codigo; ?>" data-toggle="tab" class="analistic-01"><?=$titulo?></a></li>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
							<li ><a href="paginas/noticias.php">Clique aqui para ver outras notícias...</a></li>
							    </ul>
                            </div>

                            

                            <div class="parrent media-body">
                                <div class="tab-content">
								<?
									$SQL = "
SELECT
d3.codigo as codigo,
d3.titulo,
d3.descricao,
d3.foto as foto,
DATE_FORMAT(d3.data_inicio,'%d/%m/%Y') as data_inicio,
if(d3.destaque = 1,'Sim','Não') as destaque,
d3.cadastrado_em
FROM
(
SELECT
*
FROM
(
SELECT 
a.codigo as codigo,
a.titulo,
a.descricao,
a.foto as foto,
a.data_inicio,
if(a.destaque = 1,'Sim','Não') as destaque,
a.cadastrado_em
FROM 
tc_eventos a
WHERE a.noticia = 1  and data_inicio >= now()
Order by a.data_inicio ASC
) d1

UNION

SELECT
*
FROM
(
SELECT 
a.codigo as codigo,
a.titulo,
a.descricao,
a.foto as foto,
a.data_inicio,
if(a.destaque = 1,'Sim','Não') as destaque,
a.cadastrado_em
FROM 
tc_eventos a
WHERE a.noticia = 1  and data_inicio < now()
Order by a.data_inicio DESC
) d2
) d3
ORDER BY d3.data_inicio DESC
LIMIT 0,4

				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont2 = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
						$cont2++;
					$ativado2 = "";
					if($cont2 == 1)
					{
					  $ativado2 = "active in";
					}
					else
					{
					$ativado2 = "";
					}
					$codigo= utf8_encode($linha[codigo]);
					$titulo = utf8_encode($linha[titulo]);
					$descricao = utf8_encode($linha[descricao]);
					$foto = utf8_encode($linha[foto]);
					$data_inicio = utf8_encode($linha[data_inicio]);
					?>
					               <div class="tab-pane fade <?=$ativado2 ?>" id="<?=$codigo?>">
                                        <div class="media">
                                           <div class="pull-left">
                                                
                                            </div>
                                            <div class="media-body">
											     
                                                 <a id="vernoticia" onclick="ver_noticia(<?=$codigo?>);"  ><h2><?=$titulo?> - <?=$data_inicio?></h2><br></a>
												 <center><img class="img-responsive" src="imagens/noticias/<?=$foto?>" width="200px" height="200px"><center><br>
                                               <?= html_entity_decode($descricao); ?>
											</div>
                                        </div>
                                    </div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
								





                                </div> <!--/.tab-content-->  
                            </div> <!--/.media-body--> 
                        </div> <!--/.media-->     
                    </div><!--/.tab-wrap-->               
                </div><!--/.col-sm-6-->


                </div> 

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->

	
	

    <section id="quemsomos" style="background-color:#f5f5f5;" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>QUEM SOMOS?</h2>
                <p class="lead">"Uma Irmandade feita com base na amizade e lealdade entre seus membros e no amor pela motocicleta..."</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/historia.php"><i class="fa fa-history"><b>H</b></i>
                            <h2>HISTÓRIA DO MOTOCLUBE</h2></a>
                            <h3>Veja como tudo começou...</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/filosofia.php"><i class="fa fa-file"></i>
                            <h2>FILOSOFIA</h2></a>
                            <h3>Veja nossos principios e objetivos</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/caveiras.php"><i class="fa"><b>C</b></i>
                            <h2>POR QUE AS CAVEIRAS?</h2></a>
                            <h3>O que representa as caveiras no nosso brasão</h3>
                        </div>
                    </div><!--/.col-md-4-->

					
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/localizacao.php"><i class="fa fa-check-circle"></i>
                            <h2>ONDE ESTAMOS</h2></a>
                            <h3>Descubra onde fica nossas sedes</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/depoimentos.php"><i class="fa fa-comment"><b></b></i>
                            <h2>DEPOIMENTOS</h2></a >
                            <h3>Veja o que nossos parceiros falam sobre a gente</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="paginas/integrantes.php"><i class="fa fa-user"></i>
                            <h2>INTEGRANTES</h2></a>
                            <h3>Conheça e venha fazer parte do nosso grupo...</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="galeria" style="background-color:#ffFFFF;">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>GALERIA</h2>
                <p class="lead">Confira nossas fotos</p>
            </div>

            <div class="row">
			<?
									$SQL = "SELECT 
									a.codigo,
									concat(substring(a.titulo,1,30),'...') as titulo,
									a.capa,
									a.descricao,
DATE_FORMAT(a.data,'%d/%m/%Y') as data
FROM 
tc_galeria a
Order BY a.data DESC
LIMIT 0 , 8
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);

				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{

					$codigo= utf8_encode($linha[codigo]);
					$data = utf8_encode($linha[data]);
					$titulo= utf8_encode($linha[titulo]);
					$capa = utf8_encode($linha[capa]);
					$descricao = utf8_encode($linha[descricao]);
					?>
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="recent-work-wrap">
								<img class="img-responsive" src="imagens/galeria/<?=$capa?>" style="height:250px" alt="">
								<h5><a href="#"><?=$titulo ?></a> </h5>
								<div class="overlay">
									<div class="recent-work-inner">
										<p>Data: <?=$data ?><p>
										<p><?=$descricao ?></p>
										<a class="preview" href="paginas/album.php?codigo=<?=$codigo?>" ><i class="fa fa-eye"></i>Ver fotos</a>
									</div> 
								</div>
							</div>
						</div>   
	<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

               
 

               
            </div><!--/.row-->
        </div><!--/.container-->
    <a href="paginas/galeria.php">Veja todas as fotos...</a>
	</section><!--/#recent-works-->

    <section id="produtos" class="service-item" style="background-color:#f5f5f5;>
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>PRODUTOS</h2>
                <p class="lead">Associado adquira nossos produtos como emblemas, camisas entre outros...</p>
            </div>

            <div class="row">
											<?
									$SQL = "SELECT 
a.codigo,
a.nome,
concat(substring(a.descricao,1,50),'...') as descricao,
a.imagem,
a.valor,
concat(a.quantidade_atual,' ',a.unidade_medida) as quantidade_atual

FROM 
tc_produtos a
ORDER BY RAND()
LIMIT 0,6
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);

				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{

					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$descricao = utf8_encode($linha[descricao]);
					$valor = utf8_encode($linha[valor]);
					$imagem = utf8_encode($linha[imagem]);
					$quantidade_atual = utf8_encode($linha[quantidade_atual]);
					?>
					              <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="imagens/produtos/<?=$imagem ?>" style="width:80px; height:80px">
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading"><?=$nome?></h6>
                            <br>
							Valor: R$<b><?=$valor?></b>
							<br>
							Disponível : <b><?=$quantidade_atual?></b>
                        </div>
                    </div>
                </div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>

                

               

              <br>
                   <center><p ><a href="paginas/produtos.php">Veja todos os produtos...</a></p></center>			  
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="eventos">
        <div class="container">
            <div class="row" >
			


                <div class="col-sm-9 wow fadeInDown">
                    <div class="accordion" id="eventos">
                        <center><h2>EVENTOS</h2></center>

                        <div class="panel-group" id="accordion1">
												<?php
							
							
									/* Busca de dados para mostrar na tela */
	$SQL = "SELECT
a.codigo as codigo,
concat(upper(a.titulo),'-',DATE_FORMAT(a.data_inicio,'%d/%m/%Y')) as titulo,
a.descricao,
a.foto,
DATE_FORMAT(a.data_inicio,'%d/%m/%Y') as data_inicio
FROM

tc_eventos a

WHERE data_inicio >= now() and evento = 1
ORDER BY a.data_inicio

LIMIT 0 , 4

				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
					$codigo= utf8_encode($linha[codigo]);
					$titulo = utf8_encode($linha[titulo]);
					$descricao = utf8_encode($linha[descricao]);
					$foto = utf8_encode($linha[foto]);
					$cont++;
					$ativado = "";
					$aberto = "";
					if($cont == 1)
					{
					  $ativado = "active";
					  $aberto = "in";
					}
					else
					{
					$ativado = "";
					}
					?>
					      <div class="panel panel-default">
                            <div class="panel-heading <?=$ativado?>">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?=$codigo?>">
                                  <?=$titulo ?>
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>

                            <div id="<?=$codigo?>" class="panel-collapse collapse <?=$aberto?>">
                              <div class="panel-body">
                                  <div class="media accordion-inner">
                                        <div class="pull-left">
                                            <img class="img-responsive" src="imagens/eventos/<?=$foto?>" style="height:100px">
                                        </div>
                                        <div class="media-body">
                                             <h4><?=$titulo ?></h4>
                                             <p><?=$descricao?></p>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>


                        </div><!--/#accordion1-->
                    </div>
					<a href="paginas/eventos.php">Veja todos eventos</a>
                </div>
 <div class="col-sm-3 wow fadeInDown">

</div>
 </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#middle-->

 
    <section id="parceiros" style="background-color:#f5f5f5;">
        <div class="container">
            <div class="center wow fadeInDown">
                <center><h2>NOSSOS PARCEIROS</h2></center>
                <p class="lead">PARCEIROS COMERCIAIS</p>
            </div>    

            <div class="partners">
                <ul>
				<?
									$SQL = "SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Comercio'
LIMIT 0,5
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont2 = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
						$cont2++;
					$ativado2 = "";
					if($cont2 == 1)
					{
					  $ativado2 = "active in";
					}
					else
					{
					$ativado2 = "";
					}
					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					$site = utf8_encode($linha[site]);
					?>
					              <li> <a href="<?=$site?>" title="<?=$nome?>"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="imagens/parceiros/<?=$imagem?>" width="80px" height="80px"></a></li>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
                    
                </ul>
            </div>
			<br><br><br>
			<hr>
			
			<br>
			<br>
			 <div class="center wow fadeInDown">
				
                <p class="lead">MOTOCLUBES</p>
				    <div class="partners">
                <ul>
                   				<?
									$SQL = "SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Motoclube'
LIMIT 0,5
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont2 = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
						$cont2++;
					$ativado2 = "";
					if($cont2 == 1)
					{
					  $ativado2 = "active in";
					}
					else
					{
					$ativado2 = "";
					}
					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					$site = utf8_encode($linha[site]);
					?>
					              <li> <a href="<?=$site?>" title="<?=$nome?>"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="imagens/parceiros/<?=$imagem?>" width="80px" height="80px" ></a></li>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
                </ul>
            </div>
            </div>  
<br><br><br>
			<hr>
			<br>
			<br>
			 <div class="center wow fadeInDown">
				
                <p class="lead">ENTIDADES</p>
				    <div class="partners">
                <ul>
                   <?
									$SQL = "SELECT 
*
FROM 
tc_parceiros a
WHERE a.tipo LIKE 'Entidade'
LIMIT 0,5
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
$cont2 = 0;
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
						$cont2++;
					$ativado2 = "";
					if($cont2 == 1)
					{
					  $ativado2 = "active in";
					}
					else
					{
					$ativado2 = "";
					}
					$codigo= utf8_encode($linha[codigo]);
					$nome = utf8_encode($linha[nome]);
					$imagem = utf8_encode($linha[imagem]);
					?>
					              <li> <a href="<?=$site?>" title="<?=$nome?>" ><img class="img-responsive wow fadeInDown"  data-wow-duration="1000ms" data-wow-delay="300ms" src="imagens/parceiros/<?=$imagem?>" width="80px" height="80px" ></a></li>
					<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
							?>
                </ul>
            </div>
            </div>  
<br><br><br>
			<hr>
			
			<br>
			<br>			
 			
<a href="paginas/parceiros.php">Veja todos nossos parceiros</a>			
        </div><!--/.container-->
    </section><!--/#partner-->

    <section id="contato" style="background-color: #fffff; ">
	

       <center><h4 style="font-size:30px;">CONTATO</h4></center>
		</div>
<div class="container">
<div class="row" >
<div class="form-group col-md-9">
	<form  id="proposta" name="proposta" method="post" action="">
	<input type="hidden" id="software" name="software" style="width:285px" value="<?= $sistema ?>">
	<div class="row" >
		<br>
		<div class="form-group col-md-12">
		<label >Nome  *</label>
		<input type="text" class="form-control" id="nome" name="nome" placeholder="DIGITE UM NOME" required value="" >
		</div>
	</div>
	<div class="row" >
		<div class="form-group col-md-2">
		<label >CEP(número)</label>
		<input type="number" class="form-control" id="cep" name="cep" placeholder="DIGITE UM CEP"  value="" >
		</div>
		<div class="form-group col-md-2">
		<label >Endereço</label>
		<input type="text" class="form-control" id="logradouro" name="logradouro" value="" placeholder="RUA/AVENIDA"   >
		</div>
		<div class="form-group col-md-2">
		<label >Nº/Comp</label>
		<input type="text" class="form-control" id="numero" name="numero" value="" placeholder="Nº/COMPLEMENTO"   >
		</div>
		<div class="form-group col-md-2">
		<label >Bairro</label>
		<input type="text" class="form-control" id="bairro" name="bairro" value="" placeholder="BAIRRO"   >
		</div>
		<div class="form-group col-md-3">
		<label >Cidade *</label>
		<input type="text" class="form-control" id="cidade" name="cidade" placeholder="DIGITE O NOME DA CIDADE" required value="" >
		</div>
		<div class="form-group col-md-1">
	<label >UF *</label>
	<input type="text" class="form-control" id="uf" name="uf" value="" placeholder="UF"  required >
	</div>
	</div>
	<div class="row" >
		<div class="form-group col-md-6">
		<label >Telefone * </label>
		<input type="text" class="form-control telefone" id="telefone" class="" name="telefone" placeholder="DIGITE UM NÚMERO DE TELEFONE" required value="" >
		</div>
		<div class="form-group col-md-6">
		<label >E-mail * </label>
		<input type="email" class="form-control" id="email" class="" name="email" required value="" placeholder="DIGITE UM E-MAIL"  ">
		</div>
	</div>
	<div class="row" >
		<div class="form-group col-md-5">
		<div class="form-group">
		<label for="sel1">Como conheceu nosso site</label>
		<select class="form-control" id="midia" name="midia" required>
		<option value="Indicação de um amigo">Indicação de um amigo</option>
		<option value="Pesquisa na Web">Pesquisa na Web</option>
		<option value="Propaganda em Rádio / Jornal / TV">Propaganda em Rádio / Jornal / TV</option>
		<option value="Outros">Outros</option>
		</select>
		</div>
		</div>
		<div class="form-group col-md-5">
		<div class="form-group">
		<label for="sel1">Escolha o assunto desejado?</label>
		<select class="form-control" id="servicos" name="servicos" required>
		<option value="Sistemas para minha enpresa">Dúvida</option>
		<option value="Consultoria de dados">Sugestões</option>
		<option value="Criação de sites">Proposta</option>
		<option value="Outros">Outros</option>
		</select>
		</div>
		</div>
	</div>
	<div class="row" >
	<div class="form-group col-md-12">
		<div class="form-group">
		<label for="sel1">Mensagem</label>
		<textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui" ></textarea>
		</div>
		</div>
	</div>
	</form>
</div>
<div class="form-group col-md-3">
<div class="row" >
		<div class="form-group col-md-12">
				<center><h3><b>Outras formas de contato</b></h3></center>
	
		
<center>
<span id="telefone" style="display: inline;"><a href="tel:32988118937" title="Whatsapp/celular">
<img src="http://www.toffy.com.br/imagens/redes_sociais/whatsapp.png" width="50px" height="50px" ></a></span>  
<span id="twitterIcon" style="display: inline;"><a href="mailto:rebewsoaresaz@gmail.com"   target="_blank" title="E-mail para contato" >
<img src="http://icons.iconarchive.com/icons/graphicloads/100-flat-2/256/email-icon.png" width="50px" height="50px"></a></span> 
<span id="facebookIcon" style="display: inline;"><a href="https://www.facebook.com/osaventureirosmotoclube"  target="_blank" title="Facebook">
<img src="http://www.toffy.com.br/imagens/redes_sociais/facebook.png" width="50px" height="50px"></a></span> 
 

</a></span> 
</center>

				<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fosaventureirosmotoclube&width=450&layout=standard&action=like&show_faces=true&share=true&height=80&appId" width="100%" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>		</div>

		</div>
	</div>
</div>
</div>
</div>
</div>
</section><!--t-contato-->
<script>



    /* Entrar em Modal do CRUD*/

	function ver_noticia(codigo_noticia) {

        var title = 'Ver detalhes: ';
		
        return eModal
            .iframe('paginas/ver_noticia.php?acao=ver&id='+ codigo_noticia, title)


   }
	

</script>

  