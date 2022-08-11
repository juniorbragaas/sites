<?
			

			include("../config/conexao.php");
			include("../config/caminho_servidor.php");

			include("./inc/js.php");
			include("./inc/css.php");

			
			$codigo = "";
			$titulo = "";
			
			if(!empty($_GET['id'])) 
			{
$id = $_GET['id'];
			$SQL = " SELECT
					c.codigo as codigo,
					c.foto,
					c.titulo,
					c.descricao,
					DATE_FORMAT(c.data_inicio,'%d/%m/%Y') as data_inicio
					FROM tc_eventos c WHERE c.codigo = '$id'
					ORDER BY c.codigo DESC
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
					$codigo = $linha[codigo];
					$titulo = utf8_encode($linha[titulo]);
					$data_inicio= utf8_encode($linha[data_inicio]);
					$descricao = utf8_encode($linha[descricao]);
					$foto = utf8_encode($linha[foto]);
				
					}
					while($linha = mysql_fetch_assoc($dados));
					}
			
			
			?>
			<div class="container">
			  <div class="row">
				  <div class="col-md-12">
				  <center><h2><? echo "$data_inicio - $titulo"; ?></h2></center>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-4">
				  <center><img class="img-responsive" src="../imagens/noticias/<?=$foto?>" style="height:300px;" ><center>
				  </div>
				  <div class="col-md-6">
				  <center><? echo "$descricao"; ?></center>
				  </div>
			  </div>
			</div>
			<?
		
			  
			}


				
	
?>
					