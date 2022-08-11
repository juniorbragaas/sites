<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>BINGO - PAINEL</title>
	<head runat="server">   
  
 <meta charset="utf-8" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>   
    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript"> 
	$(document).ready(function(){
   $("#botao").click(function(){
	   var nome = "#"+$("#numero_sorteado").val();
       var cor_botao = $(nome).css('background-color').toString();
	   if(cor_botao != 'rgb(255, 26, 26)'){
		   $(nome).css('background-color', '#ff1a1a');
	   }
	   else{
		   $(nome).css('background-color', '');
	   }
   });
   
});
function Preencher(x){
	   var nome = "#"+x;
	   var cor_botao = $(nome).css('background-color').toString();
	   if(cor_botao != 'rgb(255, 26, 26)'){
		   $(nome).css('background-color', '#ff1a1a');
	   }
	   else{
		   $(nome).css('background-color', '');
	   }
	      
	    
   }
    </script>
</head>
<body>
	<section class="section">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-half">
					

					<?php 
					
					$quantidade_maxima_numero = 90;
					$quantidade_coluna = $quantidade_maxima_numero / 10;
					echo "<center><input type='text' id='numero_sorteado'  name='numero_sorteado' style='font-size:30px; width:50px'><input class='botao' id='botao' type='button' value='MARCAR' style='font-size:30px' ><br><br>";
					echo "<table>";
					for ($j = 1; $j <= 10 ; $j++) {
							
					echo "<tr>";
					for ($i = 1; $i <= $quantidade_coluna ; $i++) {
						     $numero = $j +(($i-1)* 10);
							echo "<td><input class='botoes' type='button' id='".$numero."'value='$numero' onclick='Preencher(".$numero.")' ></td>";
							}
					echo "</tr>";		
					}
					echo "</table></center>";
							?>

				</div>
			</div>
		</div>
	</section>
</body>
</html>
