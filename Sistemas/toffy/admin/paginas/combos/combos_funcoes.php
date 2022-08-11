  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<?



$SQL = " SELECT * FROM gl_funcoes";
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
						$funcoes[]  = $linha[nome];
				}
				while($linha = mysql_fetch_assoc($dados));
				}


?>
  <script>
  $(function() {
	var dados2 = ["<? echo implode('","',$funcoes); ?>"];
    $( "#funcao" ).autocomplete({
      source: dados2,
	  delay: 500
    });
  });
  </script>

