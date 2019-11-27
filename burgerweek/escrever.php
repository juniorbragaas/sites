<?php
// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$nome =  htmlspecialchars($_POST['nome']);	
$email = htmlspecialchars($_POST['email']);	
$telefone = htmlspecialchars($_POST['telefone']);
$hamburger = htmlspecialchars($_POST['hamburgers']);
$originalidade = htmlspecialchars($_POST['originalidade']);
$ambiente = htmlspecialchars($_POST['ambiente']);;	
$atendimento = htmlspecialchars($_POST['atendimento']);;	
$sustentabilidade = htmlspecialchars($_POST['sustentabilidade']);
$fp = fopen("dados.csv", "a"); 
// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, "$nome; $email; $telefone; $hamburger; $originalidade; $ambiente; $atendimento; $sustentabilidade; \n");
 
// Fecha o arquivo
fclose($fp);
?>