<?php

include "config/conexao.php";

require_once 'Excel/reader.php';

$reader = new Spreadsheet_Excel_Reader();
$reader->setOutputEncoding("UTF-8");

$reader->read("jogartenis.xls");
$sql = " DROP TABLE tabela_dados; CREATE TABLE tabela_dados ( codigo INT AUTO_INCREMENT PRIMARY KEY,";
$colunas_tabela = "";



echo "CRIANDO SCRIPT DA TABELA <br>";
for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++)
{
	$sql = $sql.$reader->sheets[0]["cells"][1][$linha]." TEXT NULL,";
	$colunas_tabela = $colunas_tabela.$reader->sheets[0]["cells"][1][$linha]." ,"; 
}
$sql = substr($sql, 0, -1);
$colunas_tabela = substr($colunas_tabela, 0, -1);
$sql = $sql." );";
echo $sql."<br><br>";


echo "CRIANDO SCRIPT DE INSERT <br>";
$insere = "";

for ($coluna = 2; $coluna <= $reader->sheets[0]["numRows"]; $coluna++)
{
	$insere = $insere. " INSERT INTO tabela_dados (".$colunas_tabela.") VALUES (";
for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++)
{
	$insere = $insere. "'".$reader->sheets[0]["cells"][$coluna][$linha]."',";
}
$insere = substr($insere, 0, -1);
$insere = $insere."); ";

}
echo $insere ."<br><br>";

echo "DEPOIS DE RODAR OS SCRIPT ACIMA PRECISO DAR UM SELECT DISTICT QUE EU PRECISO NA TABELA  <br>";
$select_distinc_campos = "";

for ($linha = 1; $linha <= $reader->sheets[0]["numCols"]; $linha++)
{
	echo  "SELECT DISTINCT ".$reader->sheets[0]["cells"][1][$linha]." FROM tabela_dados; <br>";
	 
}
$atributos = array();
echo "<br><hr><br>";
echo "@relation tabela<br><br>";

for ($linha1 = 1; $linha1 <= $reader->sheets[0]["numCols"]; $linha1++)
{
	$SQL = " SELECT DISTINCT ".$reader->sheets[0]["cells"][1][$linha1]." from tabela_dados ; ";
	$atributos[$linha1-1] =  "@attribute ".$reader->sheets[0]["cells"][1][$linha1]." (";
	

	
	 $dados = mysql_query($SQL,$con) or die(mysql_error()); 
	 while ($row = mysql_fetch_array($dados, MYSQL_NUM)) {
	  $atributos[$linha1-1] = $atributos[$linha1-1].$row[0].",";
}
$atributos[$linha1-1] = substr($atributos[$linha1-1], 0, -1);
	
				
	$atributos[$linha1-1] = $atributos[$linha1-1]." )";
	echo $atributos[$linha1-1]."<br>";
}
echo "<br>@data";

$SQL = " SELECT * from tabela_dados ; ";
$dados = mysql_query($SQL,$con) or die(mysql_error()); 
$numero_colunas = mysql_num_fields($dados);
echo "<br>";
while ($row = mysql_fetch_array($dados, MYSQL_NUM)) {
	for( $y =1;$y<=$numero_colunas-1;$y++ )
	{
	  echo $row[$y].",";
	}
	echo "<br>";
}



			
				

				

?>