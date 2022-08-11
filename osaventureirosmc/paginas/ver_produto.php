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
					a.codigo,
					a.nome,
					concat('R$ ', Replace(Replace(Replace(format(a.valor, 2), '.', '|'),',', '.'), '|', ','))   as valor,
					if(a.quantidade_atual > 0,concat(a.quantidade_atual,' ',a.unidade_medida) ,'Indiponivel no momento') as quantidade_atual,
					a.descricao,
					a.imagem
					FROM tc_produtos a WHERE a.codigo = '$id'
					ORDER BY a.codigo DESC
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
					$nome = utf8_encode($linha[nome]);
					$valor= utf8_encode($linha[valor]);
					$quantidade_atual = utf8_encode($linha[quantidade_atual]);
					$descricao = utf8_encode($linha[descricao]);
					$imagem = utf8_encode($linha[imagem]);
				
					}
					while($linha = mysql_fetch_assoc($dados));
					}
			
			
			?>
			<div class="container">
			  <div class="row">
				  <div class="col-md-12">
				  <center><h2><? echo "Produto: $nome"; ?></h2></center>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-4">
				  <center><img class="img-responsive" src="../imagens/produtos/<?=$imagem?>" style="height:300px;" ><center>
				  </div>
				  <div class="col-md-6">
				  <? echo "Valor :<b> $valor</b><br>"; ?>
				 <? echo "Quantidade: <b>$quantidade_atual </b><br><br>"; ?>
				  <? echo "$descricao"; ?>
				  </div>
			  </div>
			</div>
			<?
		
			  
			}


				
	
?>
					