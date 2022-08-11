<!--==========================
  Services Section
============================-->
  <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Sobre</h3>
          <div class="section-title-divider"></div>

        </div>
      </div>
        
      <div class="row">
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-history"></i></div>
          <h4 class="service-title"><a href="">HISTÓRIA DO MOTO CLUBE</a></h4>
          <p class="service-description">Veja como tudo começou...</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-bar-chart"></i></div>
          <h4 class="service-title"><a href="">FILOSOFIA</a></h4>
          <p class="service-description">Veja nossos principios e objetivos</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa"><b>C</b></i></div>
          <h4 class="service-title"><a href="">POR QUE AS CAVEIRAS?</a></h4>
          <p class="service-description">O que representa as caveiras no nosso brasão</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-check-circle"></i></div>
          <h4 class="service-title"><a href="">ONDE ESTAMOS</a></h4>
          <p class="service-description">Descubra onde fica nossas sedes</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-comment"></i></div>
          <h4 class="service-title"><a href="">DEPOIMENTOS</a></h4>
          <p class="service-description">Veja o que nossos parceiros falam sobre a gente</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-user"></i></div>
          <h4 class="service-title"><a href="">INTEGRANTES</a></h4>
          <p class="service-description">Conheça e venha fazer parte do nosso grupo...</p>
        </div>
      </div>
    </div>  
  </section>
  
  <!--==========================
  About Section
============================-->
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
      </div>
    </div>
    <div class="container
      <div class="row">
	  <div class="col-md-3 wow fadeInUp ">
			<h2 class="about-title">Calendário</h2>
			<div id="calendar"></div>
      </div>
	   <div class="col-md-6 wow fadeInUp ">
          <h2 class="about-title">Próximos Eventos</h2>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">

  <? include "config/conexao.php" ?>
  
  <?
	
	/* Busca de dados para mostrar na tela */
	$SQL = "SELECT
a.codigo as codigo,
concat(upper(a.titulo)) as titulo,
a.descricao,
a.foto,
DATE_FORMAT(a.data_inicio,'%d/%m/%Y') as data_inicio,
DATE_FORMAT(a.data_fim,'%d/%m/%Y') as data_fim
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
						$data_inicio = utf8_encode($linha[data_inicio]);
						$data_fim = utf8_encode($linha[data_fim]);
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
						    <div class="item <?= $ativado ?>">
       <div class="fill" height="200px" >
				  <center>
				  <table width="100%">
				  <tr><td  colspan="2"><img src="../imagens/eventos/<?=$foto?>" height="350px" width="100%"></td></tr>
				  <tr><td  colspan="2"><center><b><?=$data_inicio ?><br></center></b></td></tr>
				   <tr><td colspan="2"><center><?=$titulo ?><br></center></td></tr>
				  <tr><td><b>Início : </b></td><td><?=$data_inicio?></td></tr>
				  <tr><td><b>Fim : </b></td><td><?=$data_fim?></td></tr>
				  <tr><td><b>Censura : </b></td><td>Livre</td></tr>
				  <tr><td><b>Valor : </b></td><td>Gratuito</td></tr>
				  </table>
				  <br><br><br>
				</center>				  
	    </div>          
    </div>
						
						<?
						
					}
					while($linha = mysql_fetch_assoc($dados));
				}
							
	?>
  

	<center><a href="#">Ver todos</a></center>
  </div>
</div>
        </div>
        <div class="col-md-3  wow fadeInUp">
          	<h2 class="about-title">Notícias</h2>
			<div class="panel-group" id="accordion">
        
       
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
				$codigo= utf8_encode($linha[codigo]);
					$titulo = utf8_encode($linha[titulo]);
					$descricao = utf8_encode($linha[descricao]);
					$foto = utf8_encode($linha[foto]);
					$data_inicio = utf8_encode($linha[data_inicio]);
				?>
				<!-- panel1  -->
		<div class="panel panel-default" id="painel<?=$codigo?>">
          <div class="panel-heading .active"  data-toggle="collapse" data-target="#<?=$codigo?>" style="color: #333; background-color: #e0d7a6; border-color: #fff7ca;">
            <h4 class="panel-title" style="font-size:10px;" ><? echo "$data_inicio - $titulo"; ?></h4>
          </div>
          <div id="<?=$codigo?>" class="panel-collapse collapse  fade">
            <div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
					<img src="../imagens/noticias/<?=$foto?>" width="100%" height= "100px"><br>
					<font size="2.5px"><?=$descricao ?></font>
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
		

		  
		 
		  
		 
		  
		
		  
		  
        </div>
      </div>
	  <center><a href="#">Ver todos</a></center>
        </div>
      </div>
    </div>
  </section>
  

    
<!--==========================
  Porfolio Section
============================-->
  <section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Galeria</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Si stante, hoc natura videlicet vult, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-1.jpg);" href="">
            <div class="details">
              <h4>Portfolio 1</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-2.jpg);" href="">
            <div class="details">
              <h4>Portfolio 2</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-3.jpg);" href="">
            <div class="details">
              <h4>Portfolio 3</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-4.jpg);" href="">
            <div class="details">
              <h4>Portfolio 4</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-5.jpg);" href="">
            <div class="details">
              <h4>Portfolio 5</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-6.jpg);" href="">
            <div class="details">
              <h4>Portfolio 6</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-7.jpg);" href="">
            <div class="details">
              <h4>Portfolio 7</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/portfolio-8.jpg);" href="">
            <div class="details">
              <h4>Portfolio 8</h4>
              <span>Alored dono par</span>
            </div>
          </a>
        </div>
        
      </div>
    </div>
  </section>
 <!--==========================
  Team Section
============================-->    
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Produtos</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="img/team-1.jpg" alt=""></div>
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="img/team-2.jpg" alt=""></div>
            <h4>Sarah Jhinson</h4>
            <span>Product Manager</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="img/team-3.jpg" alt=""></div>
            <h4>William Anderson</h4>
            <span>CTO</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="img/team-4.jpg" alt=""></div>
            <h4>Amanda Jepson</h4>
            <span>Accountant</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        
      </div>  
    </div>
  </section>
       
<!--==========================
  Testimonials Section
============================--> 
  <section id="testimonials">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Testimonials</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Erdo lide, nora porodo filece, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="profile">
            <div class="pic"><img src="img/client-1.jpg" alt=""></div>
            <h4>Saul Goodman</h4>
            <span>Lawless Inc</span>
          </div>
        </div>
        <div class="col-md-9">
          <div class="quote">
            <b><img src="img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure  digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper. <small><img src="img/quote_sign_right.png" alt=""></small>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-9">
          <div class="quote">
            <b><img src="img/quote_sign_left.png" alt=""></b> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis architecto beatae. <small><img src="img/quote_sign_right.png" alt=""></small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="profile">
            <div class="pic"><img src="img/client-2.jpg" alt=""></div>
            <h4>Sara Wilsson</h4>
            <span>Odeo Inc</span>
          </div>
        </div>
      </div>
      
    </div>
  </section>


<!--==========================
  Contact Section
============================--> 
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contato</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>A108 Adam Street<br>New York, NY 535022</p>
            </div>
            
            <div>
              <i class="fa fa-envelope"></i>
              <p>info@example.com</p>
            </div>
            
            <div>
              <i class="fa fa-phone"></i>
              <p>+1 5589 55488 55s</p>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </section>