<?php
session_start();
 
if (empty($_SESSION['id'])) {
 
	// n�o existe sess�o iniciada
	// neste caso, levamos o utilizador para a p�gina de login
}
else
{
	$permissao_usuario = $_SESSION['permissao'];
	$menu = "MontaMenu()";
	$srcframe = "./paginas/000_principal/index.php";

header("Content-Type: application/xml; charset=ISO-8859-1");

include("config/conexao.php");

#versao do encoding xml
$dom = new DOMDocument('1.0','UTF-8');

#retirar os espacos em branco
$dom->preserveWhiteSpace = false;

#gerar o codigo
$dom->formatOutput = true;

#criando o n� principal (root)
$root = $dom->createElement("menu");

	/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_menu  WHERE pai = 0 AND codigo IN ( $permissao_usuario )
				ORDER BY ordem
				";
				//echo "<br>SQL<br>"; exit
				
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
				//echo "<br>$total<br>"; exit;	
					
				// se o n�mero de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
				do 
				{
					$atual = $linha[codigo];
					
					#n� filho (item)
					$item = $dom->createElement("item");

					 //CRiando atributo Id
					$Atr_ID = $dom->createAttribute("id"); 
					$Atr_Text = $dom->createAttribute('text'); 
					 //Setando valores
					$Atr_ID->value = $linha[id];
					$Atr_Text->value = utf8_encode($linha[nome]);

					#adiciona os atributos (informacaoes do item) em item
					$item->appendChild($Atr_ID);
					$item->appendChild($Atr_Text);
					
						//Procurar existencia de n� para o n� atual
						$SQL2 = " SELECT
						*
						FROM tc_menu  WHERE pai = '$atual' AND codigo IN ( $permissao_usuario )
						ORDER BY ordem
						";
						// executa a query 
						$dados2 = mysql_query($SQL2,$con) or die(mysql_error()); 


						// transforma os dados em um array 
						$linha2 = mysql_fetch_assoc($dados2); 

						// calcula quantos dados retornaram 

						$total2 = mysql_num_rows($dados2);
						if($total2 > 0) 
						{ // inicia o loop que vai mostrar todos os dados 
						do 
						{
							#n� filho (item)
							$item2 = $dom->createElement("item");

							 //CRiando atributo Id
							$Atr_ID = $dom->createAttribute("id"); 
							$Atr_Text = $dom->createAttribute('text'); 
							 //Setando valores
							$Atr_ID->value = $linha2[id];
							$Atr_Text->value = utf8_encode($linha2[nome]);

							#adiciona os atributos (informacaoes do item) em item
							$item2->appendChild($Atr_ID);
							$item2->appendChild($Atr_Text);
							$item->appendChild($item2);
						}
						while($linha2 = mysql_fetch_assoc($dados2));
						}

					#adiciona o n� item em (root) menu
					$root->appendChild($item);
				}
				while($linha = mysql_fetch_assoc($dados));
				}


$dom->appendChild($root);

# Para salvar o arquivo, descomente a linha
//$dom->save("items.xml");

#cabe�alho da p�gina
header("Content-Type: text/xml");
# imprime o xml na tela
print $dom->saveXML();
}
?>