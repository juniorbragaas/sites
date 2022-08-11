<!DOCTYPE html>
<html lang="en">

<head>

	<TITLE>TOFFY - Soluções em sistemas </TITLE>
	<META NAME="DESCRIPTION"
		CONTENT="Soluções em sistemas financeiros criação de sites personalizáveis consultoria em banco de dados e relatórios customizados  ">
	<META NAME="ABSTRACT" CONTENT="Site especializado em soluções em TI para empresas">
	<META NAME="KEYWORDS" CONTENT="toffy,sistemas,sites,banco de dados,consultoria,financeiro,negócios">
	<META NAME="ROBOT" CONTENT="All">
	<META NAME="RATING" CONTENT="general">
	<META NAME="DISTRIBUTION" CONTENT="global">
	<META NAME="LANGUAGE" CONTENT="PT">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="imagens/logo.png">

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/full-slider.css" rel="stylesheet">

	<link rel="stylesheet" href="css/flip.css">


	<!-- HPORTIFOLIO ITENS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/layout.css">



</head>

<body>

	<?php include "inc/header.php"; ?>

	<!-- Full Page Image Background Carousel Header -->
	<?php
    $xml = simplexml_load_file("xml/carroca.xml");
    $flag = false;
    echo "<div id='myCarousel' class='carousel slide'>
				<ol class='carousel-indicators'>";
    foreach ($xml->item as $item) {
        $valor =  $item->codigo - 1;
        if ($flag == false) {
            echo "<li data-target='#myCarousel' data-slide-to='$valor' class='active'></li>";
            $flag = true;
        } else {
            echo "<li data-target='#myCarousel' data-slide-to='$valor'></li>";
        }
    }
    echo "</ol>";
    ?>


    <?php
    $xml = simplexml_load_file("xml/carroca.xml");
    $flag = false;
    echo "<div class='carousel-inner'>";
    foreach ($xml->item as $item) {
        if ($flag == false) {
            echo "<div class='carousel-item active'>";
            echo "<div class='fill' style='background-image:url(imagens/slides/1.jpg);'>";
            echo "<div style='text-align: center;'><br><br><br><br><img src='$item->fotoLink' title='$item->titulo' style='margin-top: 30px; height:180px; width:180px;' alt='$item->titulo' />";
            echo "<br>";
            echo "<h1 style='color:#3e94ba; font-size:40px;'><b>$item->titulo</b></h1>";
            echo "<h1 style='color:#fff; font-size:30px;  text-shadow: 2px 2px #ff0000;'><b>$item->descricao</b></h1>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $flag = true;
        } else {
            echo "<div class='carousel-item'>";
            echo "<div class='fill' style='background-image:url($item->fotoLink);'></div>";
            echo "<div class='carousel-caption'>";
            echo "<h2 style='color:#FFF; background-color: #000; width:100%;'>$item->descricao</h2>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo "</div>";

    ?>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    </div>

	<!-- Pagina Sobre -->
	<section id="sobre">
        <!--		<div class="container"">-->
        <div class="container">
            <div style="text-align: center;">
                <h1 style="text-shadow: 2px 2px #fff;"><b>SOBRE O PROJETO</b></h1>
            </div><br>
            <div class="row justify-content-center" style="color:#000;">
                <?php
                $xml = simplexml_load_file("xml/sobre.xml");

                foreach ($xml->item as $item) {
                    echo "<div class='col modulo_sobre'>";
                    echo "<div style='text-align: center;'><img src='$item->fotoLink' width='150px' height='150px' alt='$item->titulo'><br>
									<h3>$item->titulo</h3><br></div>";
                    echo "<p>$item->descricao</p>";
                    echo "</div>";
                }

                ?>
            </div>
            <!--			</div>-->
        </div>
    </section>



	<!-- Pagina sERVIÇÕS -->
	 <!-- Pagina sERVIÇÕS -->
    <section id="servicos">
        <!--		<div class="container">-->
        <div class="container">
            <div style="text-align: center;">
                <h1 style="text-shadow: 2px 2px #fff;"><b>SERVIÇOS</b></h1>
            </div><BR>
            <div class="row justify-content-center">
                <?php
                $xml = simplexml_load_file("xml/servicos.xml");
                foreach ($xml->item as $item) {
                    echo "<div class='col-auto col-lg-4'>
									<div class='flip'>
										<div class='card'>";
                    echo "<div class='face front'>
									<div class='inner' style='background-color: #fcdb74; width:100%; max-height:52px;'>
										<h3>$item->titulo</h3><br>
									</div>
									<div style='text-align: center;'><img src='$item->fotoLink' width='100%' height='100px' alt='$item->titulo'></div>
									</div>";
                    echo "<div class='face back'>
									<div class='inner text-center'>
										<p>&#32;$item->descricao&#32;</p>
										<button type='button' class='btn btn-info'>Veja mais</button>
									</div>
								</div>";
                    echo "     </div>
									</div>
								</div>";
                }
                ?>
            </div>
            <!--		</div>-->

    </section>

	<!-- Pagina Portifolio -->
	    <section id="portifolio">
        <!--		<div class="container"">-->
        <div class="container">
            <?php
            $xml = simplexml_load_file("xml/portifolio.xml");
            echo "<div class='row justify-content-center' style='color:#000;'>
					<div style='text-align: center;'>
						<h1 style='text-shadow: 2px 2px #fff;'><b>PORTIFÓLIO</b></h1>
					</div><br>
				</div>";
            echo "<ul id='filters' class='clearfix'>";
            $junta = "";
            foreach ($xml->map->item as $item) {
                $junta = $junta . '.' . $item->classe . ', ';
            }
            $junta = substr($junta, 0, -2);
            echo "<li><span class='filter active' data-filter='$junta'>Todos</span></li>";
            foreach ($xml->map->item as $item) {
                echo "<li><span class='filter' data-filter='.$item->classe'>$item->name</span></li>";
            }
            echo "</ul>";
            echo "<div id='portfoliolist' class='row'>";
            foreach ($xml->item as $item) {
                echo "<div class='portfolio $item->classe' data-cat='$item->classe' style='display: inline-block;'>
							<div class='portfolio-wrapper'>
								<img src='$item->fotoLink' style='width:100%;height:227px;' alt='$item->titulo'>
								<div class='label'>
									<div class='label-text'>
										<a class='text-title'>$item->titulo</a>
										<span class='text-category'>$item->descricao</span>
									</div>
									<div class='label-bg'></div>
								</div>
							</div>
						</div>";
            }
            ?>
            <!--			</div>-->
            <br><br><br><br>
        </div>

    </section>
	 <!--  Pagina Equipe  -->
        <section id="equipe">
        <div class="container">
            <div class="row justify-content-center" style="color:#000;">
                <div style="text-align: center;">
                    <h1 style="text-shadow: 2px 2px #fff;"><b>EQUIPE</b></h1>
                </div><br>
            </div>
            <div class="col-md" style="text-align: center;"><br>
                <?php
                require("inc/criadorBrasao.php");
                $array = array(1,1,1,1,1,1,1,1,1,1,1,1);
                for ($i = 0; $i < 12; $i++) {
                    $array[$i] = rand(10, 99);
                }
                //vou deixar assim por enquanto nao ta no xml
                //idade pave
                $dataNascimentoPave = '1984-05-17';
                $datePave = new DateTime($dataNascimentoPave);
                $intervalPave = $datePave->diff(new DateTime(date('Y-m-d')));
                $idadePave = $intervalPave->format('%Y');
                //idade sopa
                $dataNascimentoSopa = '1999-07-29';
                $date = new DateTime($dataNascimentoSopa);
                $interval = $date->diff(new DateTime(date('Y-m-d')));
                $idadeSopa = $interval->format('%Y');
                criaBrasao("01", "Junior Braga", "https://www.linkedin.com/in/valdelei-junior-braga-b9101329/", "junior.braga.as@gmail.com", "https://github.com/juniorbragaas", "https://www.instagram.com/junior.braga.as/", "Rapaz bonito inteligente com o dom de amar", "./imagens/pessoas/teste.png", "./imagens/logo.svg", "./imagens/pessoas/Flag_of_Brazil.svg", "$idadePave", "$array[0]", "$array[1]", "$array[2]", "$array[3]", "$array[4]", "$array[5]");
                criaBrasao("02", "Rafael Yukio Natsu", "https://www.linkedin.com/in/rafael-yukio-natsu-58536b171/", "rafaelnatsu99@gmail.com", "https://github.com/RafaelNatsu", "instagram", "Com uma toalha em mãos, desbravando o vasto universo", "./imagens/pessoas/rosto.jpg", "./imagens/logo.svg", "./imagens/pessoas/Flag_of_Brazil.svg", "$idadeSopa", "$array[6]", "$array[7]", "$array[8]", "$array[9]", "$array[10]", "$array[11]");

                ?>


            </div>
        </div>
    </section>

    <!-- Pagina Contato -->
    <section id="contato">
        <div class="container">
            <div class="row justify-content-center" style="color:#000;">
                <div style="text-align: center;">
                    <h1 style="text-shadow: 2px 2px #fff;"><b>CONTATO</b></h1>
                </div><BR>
            </div>
            <form id="proposta" name="proposta" method="post" action="inc/proposta.php">
                <input type="hidden" id="software" name="software" style="width:285px" value="SISTEMAS, CONSULTORIA, WEB SITES">
                <div class="row">
                    <br>
                    <div class="form-group col-md-3">
                        <label>Nome completo *</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telefone * </label>
                        <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="DIGITE UM NÚMERO DE TELEFONE" required value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Whatsapp</label>
                        <input type="tel" class="form-control telefone" id="whatsapp" name="whatsapp" value="" placeholder="DIGITE UM NÚMERO DE TELEFONE" ">
		                </div>
		                <div class=" form-group col-md-4">
                        <label>E-mail * </label>
                        <input type="email" class="form-control" id="email" name="email" required value="" placeholder="DIGITE UM E-MAIL" ">
		                </div>
	                </div>
		                <div class=" row">
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label for="sel1">Como conheceu o projeto?</label>
                                <select class="form-control" id="midia" name="midia" required>
                                    <option value="Indicação de um amigo">Indicação de um amigo</option>
                                    <option value="Pesquisa na Web">Pesquisa na Web</option>
                                    <option value="Propaganda em Rádio / Jornal / TV">Propaganda em Rádio / Jornal /
                                        TV</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label for="sel1">Que tipo de serviço você precisa?</label>
                                <select class="form-control" id="servicos" name="servicos" required>
                                    <option value="Sistemas para minha enpresa">Sistemas para minha empresa</option>
                                    <option value="Consultoria de dados">Consultoria de dados</option>
                                    <option value="Criação de sites">Criação de sites</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="sel1">Mensagem</label>
                                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui" onkeyup="textCounter(this,'counter',250);" maxlength="250"></textarea>
                                <label><input disabled maxlength="3" size="2" value="250" id="counter">caracteres
                                    restantes</label>
                                <script>
                                    function textCounter(field, field2, maxlimit) {
                                        var countfield = document.getElementById(field2);
                                        if (field.value.length > maxlimit) {
                                            field.value = field.value.substring(0, maxlimit);
                                            return false;
                                        } else {
                                            countfield.value = maxlimit - field.value.length;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="g-recaptcha" data-sitekey="6LdI3AMbAAAAAJdqzvvxe-gEc6YfpLErOVTdkMjb"></div>
                            <div style="text-align: center;"> <input type="submit" class="bt_enviar" id="enviar" name="enviar" value="Enviar"></div>
                        </div>
                    </div>
            </form>
    </section>
    <section id="localizacao">
        <div class="container">
            <div style="text-align: center;">
                <h1 style="text-shadow: 2px 2px #fff;"><b>LOCALIZAÇÃO</b></h1>
            </div>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7748247.015035722!2d-49.94746778793593!3d-18.51426696836879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690a165324289%3A0x112170c9379de7b3!2sMinas+Gerais!5e0!3m2!1spt-BR!2sbr!4v1467221354846" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen title="Google Map"></iframe>
            <br><br><br>
        </div>
    </section>
    <section id="redesSociais">
        <div class="container">
            <div style="text-align: center;">
                <div style="text-align: center;">
                    <h1 style="text-shadow: 2px 2px #fff;"><b>REDES SOCIAIS</b></h1>
                </div>
                <span id="telefone" style="display: inline;"><a href="tel:000000000" title="Whatsapp/celular">
                        <img src="./imagens/redes_sociais/whatsapp.svg" width="50px" height="50px" alt="Whatsapp"></a></span>
                <span id="emailIcon" style="display: inline;"><a href="mailto:contato@toffy.com.br" target="_blank" title="E-mail para contato">
                        <img src="./imagens/redes_sociais/email.svg" width="50px" height="50px" alt="Email"></a></span>
                <span id="facebookIcon" style="display: inline;"><a href="https://www.facebook.com/toffysolucoesemsistemas" target="_blank" rel="noreferrer noopener" title=" Facebook">
                        <img src="./imagens/redes_sociais/facebook.svg" width="50px" height="50px" alt="Facebook"></a></span>
                <span id="linkedinIcon" style="display: inline;"><a href="https://br.linkedin.com/in/valdelei-junior-braga-b9101329" target="_blank" rel="noreferrer noopener" title=" Linkedin">
                        <img src="./imagens/redes_sociais/linkedin.svg" width="50px" height="50px" alt="Linkedin"></a></span>
            </div>
            <br><br><br>
        </div>
    </section>

    <!-- /.container -->

    <? include "inc/fotter.php" ?>


    <? include "inc/js.php" ?>

    <span class="back-to-top">▲</span>


</body>

</html>