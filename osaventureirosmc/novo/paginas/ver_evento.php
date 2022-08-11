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
					c.local_evento,
					c.classificacao,
					if(c.valor_evento >0 ,concat('R$ ', Replace(Replace(Replace(format(c.valor_evento, 2), '.', '|'),',', '.'), '|', ',')),'Gratuito')   as valor_evento,
					DATE_FORMAT(c.data_inicio,'%d/%m/%Y') as data_inicio,
					DATE_FORMAT(c.data_fim,'%d/%m/%Y') as data_fim
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
					$data_fim = utf8_encode($linha[data_fim]);
					$descricao = utf8_encode($linha[descricao]);
					$foto = utf8_encode($linha[foto]);
					$local_evento = utf8_encode($linha[local_evento]);
					$valor_evento = utf8_encode($linha[valor_evento]);
					$classificacao = utf8_encode($linha[classificacao]);				
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
				  <center><img class="img-responsive" src="../imagens/eventos/<?=$foto?>" style="height:300px;" ><center>
				  </div>
				  <div class="col-md-6">
				  <? echo "$descricao"; ?><br><br>
				  Abertura : <b><?=$data_inicio ?></b> Encerramento <b><?=$data_fim ?></b><br>
				  Local do evento : <b><?=$local_evento ?></b><br>
				  Classificação : <b><?=$classificacao?></b><br>
				  Valor: <b><?=$valor_evento?></b><br>
				  
				  </div>
			  </div>
			</div>
			<?
		
			  
			}


				
	
?>
					