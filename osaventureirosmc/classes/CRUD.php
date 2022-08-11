<?




echo "<thead>";
$rotulo = explode(",",$ListaRotulosCabecalho);
foreach($rotulo as $valores)
{
   echo "<th>$valores</th>";
}
echo "</thead>";

$dados = mysql_query($SQL,$con) or die(mysql_error()); 		
	
// transforma os dados em um array 
$linha = mysql_fetch_assoc($dados); 

// calcula quantos dados retornaram 
$total = mysql_num_rows($dados);

echo "<tbody>";	
if($total > 0) 
{ // inicia o loop que vai mostrar todos os dados 
	while($linha = mysql_fetch_assoc($dados)) 
	{		
		echo "<tr>";
		$coluna = explode(",",$ListaColunas);
		foreach($coluna as $valores)
		{
		  echo "<th>$linha[$valores]</th>";		 
		}
		echo "<tr>";
	}
}
echo "</tbody>";
	
	




?>