<?
  
  /*  Campos de entrada */
  $tabela = "tabela"
  $codigo = "codigo";
  $nome = "nome";
  $cadastradopor = "cadastradopor";
  $cadastradoem = "cadastradoem";
  
  /* Alias padrao */
  $tabela = "tabela"
  $codigo = "codigo";
  $nome = "nome";
  $cadastradopor = "cadastradopor";
  $cadastradoem = "cadastradoem";
  
  /* Dados para Inserir action = 'Inserir','update','delete' */
  $action = "action";
  $codigo_post = "codigo";
  $nome_post = "nome";
  $cadastradopor_post = "cadastradopor";
  $cadastradoem_post = "cadastradoem";
  
  /* Ordenaчуo */
  
  /* Tratamento dos campos para envio */
  
  
  $SQL-I = " INSERT INTO $tabela ($nome,$cadastradopor,$cadastradoem) VALUES ($nome_post,$cadastradopor_post,$cadastradoem_post) ; ";
  $SQL-U = " UPDATE $tabela SET $nome = $nome_post,$cadastradopor = $cadastradopor_post,$cadastradoem = $cadastradoem_post where $codigo = $codigo_post ; ";
  $SQL-D = " DELETE FROM $tabela WHERE $codigo = $codigo_post ";

?>