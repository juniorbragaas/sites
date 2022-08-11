<? 
	session_start(); 
	include("../inc/css.php");
	include("../inc/js.php");
	include("../../config/conexao.php");
	$acao = $_GET['acao'];
	$codigo = $_GET['codigo'];
	$msg = "";
	$titulo = "";
	
	$readonly = "";
	$ocultar_botao = "";
	$botao_salvar_text = "Salvar";
	
 

	$permissao_usuario = "";

	
	/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
				*
				FROM tc_perfil  WHERE codigo = '$codigo'
				ORDER BY codigo DESC
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
					$nome = $linha[nome];
					$permissao_usuario = $linha[permissao];
					
				}
				while($linha = mysql_fetch_assoc($dados));
				}
	
	
	switch ($acao) {
    case 'alterar':
        $titulo =  "Alterar Permissões para perfil : $nome";
        break;
	}	
	if (isset($_POST['acao'])) 
	{
		$send_acao = $_POST['acao'];
		
		$codigo = $_POST['codigo'];
		$permissoes = $_POST['check'];
		$permissao = "";
		//echo "<br>$check<br>"; exit;
		switch ($send_acao) 
		{

			case 'alterar':
			
			// 1 Passo deletar todo permissao para o perfil desejado
			$SQL = "UPDATE tc_perfil SET
						permissao = ''
					WHERE codigo=$codigo
					";
					
		    // 2 passo incluir permissões em uma variavel
			
			foreach ($permissoes as &$value) 
			{
					$permissao = $permissao.$value.",";
			}
			$size = strlen($permissao);
            $permissao = substr($permissao,0, $size-1);
			//echo "<br>$permissao<br>"; exit;
			
			$query = mysql_query($SQL);
			
			$SQL = "UPDATE tc_perfil SET
						permissao = '$permissao'
					WHERE codigo=$codigo
					";
			$query = mysql_query($SQL);
			
			
			
			$erro = mysql_errno($con)." : ".mysql_error($con);
			$mensagem = "O registro foi alterado com sucesso!";
			break;
		}	
    }	
		
		

?> 

<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?= $caminho_servidor ?>/css/estilo.css"/>
</head>
	<body >
	 <div id="painel">
	<div id="cabecalho_pagina" width="100%" style="background-color: #827D7D; color: #FFFFFF;"><center><?= $titulo; ?></center></div>
	<table>
	<form action="" method="POST">
	<input type="hidden" id="acao" name="acao" value="<?= $acao ?>" <?= $readonly ?>>
	<input type="hidden" id=codigo" name="codigo" value="<?= $codigo ?>" <?= $readonly ?>>
	<tr><td>Lista de opções do site</td></tr>

	</table><br>
		<?
	/* Busca de dados para mostrar na tela */
	$SQL = " SELECT
	            m.codigo as codigo,
				m.id as id,
				m.nome as nome,
				if(c.codigo is null,'','CHECKED') as marcado
				FROM tc_menu m  
				LEFT JOIN ( SELECT codigo FROM tc_menu WHERE codigo IN  ( $permissao_usuario ))c On c.codigo = m.codigo
				WHERE m.pai = 0
				ORDER BY m.ordem
				";
				
				//echo "<br>$SQL<br>"; exit;
				// executa a query 
				$dados = mysql_query($SQL,$con) or die(mysql_error()); 


				// transforma os dados em um array 
				$linha = mysql_fetch_assoc($dados); 

				// calcula quantos dados retornaram 

				$total = mysql_num_rows($dados);
				//echo "<br>$total<br>"; exit;	
					
				// se o número de resultados for maior que zero, mostra os dados 
				if($total > 0) 
				{ // inicia o loop que vai mostrar todos os dados 
					
					echo "<table>";
					echo "<tr><td><b>Página</b></td><td><b>Visualizar</b></td><tr>";
					do 
					{
						$atual = $linha[codigo];
						echo "<tr><td><input type='hidden' id='$linha[id]' name='$linha[id]' value='$linha[id]'><b>$linha[nome]</b></td><td align='center'> <input type='checkbox' class='checkbox1' name='check[]' value='$linha[codigo]' $linha[marcado] /></td><tr>";
						$SQL2 = " SELECT
				m.codigo as codigo,		
				m.id as id,
				m.nome as nome,
				if(c.codigo is null,'','CHECKED') as marcado
				FROM tc_menu m  
				LEFT JOIN ( SELECT codigo FROM tc_menu WHERE codigo IN  ( $permissao_usuario )) c On c.codigo = m.codigo
				WHERE m.pai = '$atual'
				ORDER BY m.ordem
						";
						
						//echo "<br>$SQL2<br>"; exit;
						// executa a query 
						$dados2 = mysql_query($SQL2,$con) or die(mysql_error()); 


						// transforma os dados em um array 
						$linha2 = mysql_fetch_assoc($dados2); 

						// calcula quantos dados retornaram 

						$total2 = mysql_num_rows($dados2);
						if($total2 > 0) 
						{ 
							do 
							{
								echo "<tr><td><input type='hidden' id='$linha2[id]' name='$linha2[id]' value='$linha2[id]'>&nbsp;&nbsp;&nbsp;&nbsp; $linha2[nome]</td><td align='center'> <input type='checkbox' class='checkbox1' name='check[]' value='$linha2[codigo]' $linha2[marcado] /></td><tr>";
							}
							while($linha2 = mysql_fetch_assoc($dados2));
						}
					}
					
					while($linha = mysql_fetch_assoc($dados));
					echo "</table>";
				} 
				?>
	<input type="checkbox"  id="selecctall" name="marc_all" value='' />Marcar/Desmarcar Todos
	<div id="botoes" width="100%" style="background-color: blue;"><b><font color="white"><?= $mensagem ?></font></b><input type="submit" class="salvar" value="<?= $botao_salvar_text ?>" <?= $readonly_salvar ?> /><input type="button" class="cancelar" onclick="location.href='index.php';" value="Voltar" /></div>
   	</form>
	
</body>
</html>
<script>
  $(document).ready(function() {
    $('#selecctall').click(function(event) {
        if(this.checked) {
            $('.checkbox1').each(function() {
                this.checked = true;               
            });
        }else{
            $('.checkbox1').each(function() {
                this.checked = false;        
            });         
        }
	});
    });
</script>
	