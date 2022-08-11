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
    <title>Os Aventureiros Motoclube | Produtos</title>
	<link rel="shortcut icon" href="../images/logo.png">
	<!-- arquivos CSS -->
<?	include "inc/css.php"; ?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/eModal.min.js"></script>
</head><!--/head-->

<body class="homepage">
<? include "../config/caminho_servidor.php"; ?>
<?	include "../classes/Url.php"; ?>

<!-- arquivos de cabecalho de pagina -->
<?	include "inc/header.php"; ?>

<!-- Conteudo da pagina -->
    <div class="container" style="width:100%">	
    <!-- Botões da tela -->	 
	<center>
	<div class="row" style="background-color:#000000; color:#FFFFFF; width:100%">
	<center>Lista de Produtos</center>
	</div></center>
	<div class="row">
			<INPUT TYPE="hidden" id="hdnId" NAME="hdnId" VALUE="0">
			<INPUT TYPE="hidden" id="hdnDados" NAME="hdnDados" VALUE="">
			<div class="col-md-12">
				<table>
				<tr>
				<td>
					<button id="novo" class="btn btn-primary" >Ver detalhes</button>	 
				</td>				

				</tr>
				</table>
			 </div>
	</div>
	<div class="row">
				<div class="col-md-12" id="lista_clientes">
					<div id="DivLista">
						<table id="tabela_dados" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Valor</th>
								<th>Disponível</th>
								</tr>
							</thead>		
					<tbody>
					<?
					/* PESQUISA/coNDO DADOS VIA SQL */

					$SQL = "SELECT 
a.codigo,
a.nome,
concat('R$ ', Replace(Replace(Replace(format(a.valor, 2), '.', '|'),',', '.'), '|', ','))   as valor,
if(a.quantidade_atual > 0,concat(a.quantidade_atual,' ',a.unidade_medida) ,'Indiponivel no momento') as quantidade_atual

FROM 
tc_produtos a
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
					echo "<tr>";
					echo "<th>".utf8_encode($linha[codigo])."</th>";
					echo "<th>".utf8_encode($linha[nome])."</th>";
					echo "<th>".utf8_encode($linha[valor])."</th>";
					echo "<th>".utf8_encode($linha[quantidade_atual])."</th>";
					echo "</tr>";
					}
					while($linha = mysql_fetch_assoc($dados)); 
					// fim do if 
					}		
					?>
					</tbody>
				</table>
			</div>
			</div>
				</div>
			</div>	

<script>
$(document).ready(function () {/* activate scroll spy menu */

    $('#novo').click(Cadastrar);


    /* Entrar em Modal do CRUD*/

	function Cadastrar() {
		if(document.getElementById("hdnId").value != '0')
		{
		
        var title = 'Ver detalhes: '+ document.getElementById("hdnId").value;
        return eModal
            .iframe('ver_produto.php?acao=ver&id='+ document.getElementById("hdnId").value, title)
        }
		else
		{
			alert('Selecione uma noticia para visualizar!');
		}
   }
	
		


    //#endregion
});
</script>
</div>
</div>
<!-- Fim do conteudo da pagina -->



<!-- arquivos do rodapé da pagina -->
<?	include "inc/fotter.php"; ?>

<!-- scripts da pagina -->
<?	include "inc/js.php"; ?>


	

</body>
</html>