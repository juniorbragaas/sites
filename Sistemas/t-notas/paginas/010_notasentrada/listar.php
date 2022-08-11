<?php
$diretorio = "arquivos/NotaEntrada/"; 
$pastas = "";
$ponteiro  = opendir($diretorio);
while ($nome_itens = readdir($ponteiro)) {
    $itens[] = $nome_itens;
}
sort($itens);
foreach ($itens as $listar) {
   if ($listar!="." && $listar!=".."){ 
                if (is_dir($listar)) { 
                        $pastas[]=$listar; 
                } else{ 
                        $arquivos[]=$listar;
                }
   }
}
if ($pastas != "" ) { 
foreach($pastas as $listar){
   print "<img src='pasta.png'> <a href='$diretorio/$listar'>$listar</a><br>";}
   }
if ($arquivos != "") {
foreach($arquivos as $listar){
   $chave = str_replace(".xml","",$listar);
   print " - <a href='ler_nota.php?chave=$chave'>$listar</a><br>";}
   }
?>