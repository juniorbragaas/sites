<!DOCTYPE html>
<html >
<head>
<?

 include "../config/conexao.php";
 
 $codigo = $_GET["codigo"];

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Os Aventureiros Motoclube | Album</title>
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
<?
$SQL = "SELECT 
									a.codigo,
									LPAD(codigo,6,'0') as codigo_album,
									concat(substring(a.titulo,1,30),'...') as titulo,
									a.capa,
									a.descricao,
DATE_FORMAT(a.data,'%d/%m/%Y') as data
FROM 
tc_galeria a
WHERE codigo = $codigo
Order BY a.data DESC
LIMIT 0,8
				";
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
								if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{

					$codigo= utf8_encode($linha[codigo]);
					$codigo_album= utf8_encode($linha[codigo_album]);
					$data = utf8_encode($linha[data]);
					$titulo= utf8_encode($linha[titulo]);
					$capa = utf8_encode($linha[capa]);
					$descricao = utf8_encode($linha[descricao]);
					?>
						<div class="col-xs-12 col-sm-12 col-md-12">

								<center><h2><?=$titulo ?> </h2></center>
								<p><?=$descricao ?></p>


						</div>   
						<br>
						<?

							$path = "galeria_fotos/$codigo_album/";
							$diretorio = dir($path); 
							while($arquivo = $diretorio -> read()){
							if((strcmp($arquivo,".") != 0) && strcmp($arquivo,".."))
							{
							?>
							<div class="col-xs-2 col-sm-2">
										
										<a class="preview" href="<?= $path.$arquivo ?>" rel="prettyPhoto" ><img class="img-responsive" style="width:100%; height: 100px;" src="<?= $path.$arquivo ?>"></a>
										<BR>
							</div>

							<?
							}
							  
							}
							$diretorio -> close();

?>

	<?

				}
				while($linha = mysql_fetch_assoc($dados));
				}
?>
</div>
<br>
<a href="galeria.php">Voltar pra lista de galerias<a>
<HR><BR>

</div>

<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>