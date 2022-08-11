<!DOCTYPE html>
<html >
<head>
<?

 include "../config/conexao.php";

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Os Aventureiros Motoclube | Localização</title>
	<link rel="shortcut icon" href="../images/logo.png">
	<!-- arquivos CSS -->
<?	include "inc/css.php"; ?>


</head><!--/head-->

<body class="homepage">
<? include "../config/caminho_servidor.php"; ?>
<?	include "../classes/Url.php"; ?>

<!-- arquivos de cabecalho de pagina -->
<?	include "inc/header.php"; ?>

<div class="container" >
	<div class="row">
	  <div class="col-md-12" style=" background-color:#FFF; -moz-border-radius: 10px;  -webkit-border-radius: 10px; border-radius: 10px; border: 5px solid #000000;">
					<center><h4 style="background-color:#000; color:#FFFFFF; width:100%; ">Onde Estamos</h4></center>
					<div>
					<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/jf.png" title="Juiz de Fora-MG" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
							<li><a data-toggle="tab" href="#menu1"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/sj.png" title="São João Del Rei-MG" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
							<li><a data-toggle="tab" href="#menu2"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/ro.png" title="Rio das Ostras-RJ" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
							<li><a data-toggle="tab" href="#menu3"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/itauna.png" title="Itauna" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
					
							<li><a data-toggle="tab" href="#menu4"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/barbacena.png" title="Barbacena" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
							<li><a data-toggle="tab" href="#menu5"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/coimbra.png" title="Coimbra" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
					
							<li><a data-toggle="tab" href="#menu6"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/para_de_minas.png" title="Pará de Minas" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
							<li><a data-toggle="tab" href="#menu7"><img src="http://www.osaventureirosmc.com.br/imagens/bandeiras_sede/resende_costa.png" title="Resende Costa" style="height: 30px; width:30px; vertical-align:middle;"></a></li>
					
					</ul>
							<div class="tab-content">
								<div id="home" class="tab-pane fade in active">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237204.67232989392!2d-43.52260700275844!3d-21.728999954210558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989c43e1f85da1%3A0x6236b026b3a0a468!2sJuiz+de+Fora%2C+MG!5e0!3m2!1spt-BR!2sbr!4v1476124274305" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
								<p>Juiz de Fora-MG</p>
								</div>
								<div id="menu1" class="tab-pane fade ">
								
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476011.42069646996!2d-44.55927188671283!3d-21.238223124005376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa1c884f4eda713%3A0x2902ed1507185fc1!2sS%C3%A3o+Jo%C3%A3o+Del+Rei+-+MG!5e0!3m2!1spt-BR!2sbr!4v1475854499264" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						<p>São João Del Rei-MG</p>
								</div>
							
								<div id="menu2" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235962.41513617442!2d-42.08142084536376!3d-22.46991331665306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x97b359153013c9%3A0x134a864175a81692!2sRio+das+Ostras+-+RJ!5e0!3m2!1spt-BR!2sbr!4v1476124367303" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
								<p>Rio das Ostras-RJ</p>
								</div>
								<div id="menu3" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59955.03204520597!2d-44.61891975971643!3d-20.084363698327053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa0cd2b425c504d%3A0x442d01890496ff2e!2zSXRhw7puYSwgTUc!5e0!3m2!1spt-BR!2sbr!4v1485293804667" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							    <p>Itaúna-MG</p>
								</div>
								<div id="menu4" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59508.868717036254!2d-43.804107853771!3d-21.21977873901897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa1f575a56f36c7%3A0x352b824be8a084e2!2sBarbacena%2C+MG!5e0!3m2!1spt-BR!2sbr!4v1485295752408" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							    <p>Barbacena-MG</p>
								</div>
								<div id="menu5" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29826.932362547108!2d-42.8187853638321!3d-20.857271086091494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa343e9591c3899%3A0x64564705459948ab!2sCoimbra%2C+MG!5e0!3m2!1spt-BR!2sbr!4v1485295999951" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							    <p>Coimbra-MG</p>
								</div>
								<div id="menu6" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60040.66545459412!2d-44.63268451085761!3d-19.859340130551494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa73e81163b914d%3A0x62d82242b7229322!2sPar%C3%A1+de+Minas%2C+MG!5e0!3m2!1spt-BR!2sbr!4v1485295887223" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							    <p>Para de Minas-MG</p>
								</div>
								<div id="menu7" class="tab-pane fade">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d477209.4095208009!2d-44.579087802627406!3d-20.864047463075032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa1aec3c03aa823%3A0xf2b3cebac3f374db!2sResende+Costa+-+MG!5e0!3m2!1spt-BR!2sbr!4v1494460487401" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><p>Resende Costa-MG</p>
							</div>
					</div>
				</div>
	</div>
</div>
</div>

<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>