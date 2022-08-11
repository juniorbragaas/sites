
<?
	if(!empty($_POST)) 
	{ 
			include("../../../config/conexao.php");
			include("../../../config/caminho_servidor.php");
			$erro_banco = "0";
			if(strcmp($_POST['CRUD_query'],"insert")==0)
			{

						$codigo = mysql_real_escape_string($_POST['codigo']);
						$cliente = mysql_real_escape_string($_POST['cliente']);
						$funcao = mysql_real_escape_string($_POST['funcao']);
						$salario = mysql_real_escape_string($_POST['salario']);
						$escolaridade = mysql_real_escape_string($_POST['escolaridade']);
						$descricao = mysql_real_escape_string($_POST['descricao']);
						$contato = mysql_real_escape_string($_POST['contato']);
						$data_max_inscricao = mysql_real_escape_string($_POST['data_max_inscricao']);
						
						//Passo 1 verificar se existe a funcao caso não existir inserir no banco de dados
                        $SQLDinamico = "INSERT INTO 
										  gl_funcoes
										 (nome,fk_departamento) 
										SELECT Distinct
										'$funcao' as nome,
										0 as fk_departamento
										FROM
										gl_funcoes
										WHERE '$funcao' NOT IN (select nome from gl_funcoes)";
						$query = mysql_query($SQLDinamico);
						//echo "<br>$SQLDinamico<br>"; exit;
						
						//passo 2 inserir os dados na tabela vagas
						
					
						$SQL = "INSERT INTO c_vagas 
								(
								  fk_cliente,
								  funcao,
								  escolaridade,
								  salario,
								  descricao,
								  contato,
								  data_max_inscricao,
								  cadastrado_em 
								) 
							    SELECT

								  '$cliente' as fk_cliente,
								  '$funcao' as funcao,
								  '$escolaridade' as escolaridade,
								  '$salario' as salario,
								  '$descricao' as descricao,
								  '$contato' as contato,
								  '$data_max_inscricao' as data_max_inscricao,
								  now() as cadastrado_em ";
								
								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
                        if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong>Uma nova vaga foi cadastrada cadastrado! <br>
						</div>
						<br>
						<?
						}
						else
						{
							?>
							<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Erro: </strong><?= $erro_banco ?> 
							</div>
							<?
						}

					    

						
			}
			if(strcmp($_POST['CRUD_query'],"update")==0)
			{
				$codigo = mysql_real_escape_string($_POST['codigo']);
						$cliente = mysql_real_escape_string($_POST['cliente']);
						$funcao = mysql_real_escape_string($_POST['funcao']);
						$salario = mysql_real_escape_string($_POST['salario']);
						$escolaridade =$_POST['escolaridade'];
						$descricao = mysql_real_escape_string($_POST['descricao']);
						$contato = mysql_real_escape_string($_POST['contato']);
						$data_max_inscricao = mysql_real_escape_string($_POST['data_max_inscricao']);
						
						//Passo 1 verificar se existe a funcao caso não existir inserir no banco de dados
                        $SQLDinamico = "INSERT INTO 
										  gl_funcoes
										 (nome,fk_departamento) 
										SELECT Distinct
										'$funcao' as nome,
										0 as fk_departamento
										FROM
										gl_funcoes
										WHERE '$funcao' NOT IN (select nome from gl_funcoes)";
						$query = mysql_query($SQLDinamico);
						
					
						$SQL = "UPDATE c_vagas SET
								
								  fk_cliente = '$cliente',
								  funcao = '$funcao',
								  escolaridade = '$escolaridade',
								  salario = '$salario',
								  descricao = '$descricao',
								  contato = '$contato',
								  data_max_inscricao = '$data_max_inscricao',
								  cadastrado_em = Now() 
								 
							    WHERE codigo = '$codigo' ";
								
						$query = mysql_query($SQL);
					    $erro_banco = mysql_errno($con)." : ".mysql_error($con);

						if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong>Vaga foi alterada! <br>
						</div>
						<br>
						<?
						}
						else
						{
							?>
							<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Erro: </strong><?= $erro_banco ?> 
							</div>
							<?
						}

			}
			if(strcmp($_POST['CRUD_query'],"delete")==0)
			{

						$codigo = $_POST['codigo'];					
						$SQL = "DELETE FROM c_vagas WHERE codigo = '$codigo';";								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
						if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong> A vaga foi excluída <br>
						</div>
						<br>
						<?
						}
						else
						{
							?>
							<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Erro: </strong><?= $erro_banco ?> 
							</div>
							<?
						}
			}
	}
	

			include("../../../config/caminho_servidor.php");
			include("../../../config/conexao.php");
			include("../../../inc/js.php");
			include("../../../inc/css.php");
			$query_CRUD = "insert";
			$displayexcluir="none";
			if(!empty($_GET['id'])) 
			{            
			  if(strcmp($_GET['acao'],"excluir")!= 0)
			  {
				if(strcmp($_GET['acao'],"alterar")==0)
				{
					$query_CRUD = "update";
					$displayexcluir="none";

					/* PESQUISA/coNDO DADOS VIA SQL */
					$id = $_GET['id'];
					$SQL = " SELECT
					*
					FROM c_vagas v WHERE v.codigo = '$id'
					ORDER BY v.codigo DESC
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
					$cliente = $linha[fk_cliente];
					$categoria = $linha[categoria];
					$funcao = $linha[funcao];
					$salario = $linha[salario];
					$escolaridade = $linha[escolaridade];
					$descricao = $linha[descricao];
					$contato = $linha[contato];
					$data_max_inscricao = $linha[data_max_inscricao];
					}
					while($linha = mysql_fetch_assoc($dados));
					}
				}
			  }
				else
				{
				  $query_CRUD = "delete";
						$display="none";
						$displayexcluir="block";
						

					/* PESQUISA/coNDO DADOS VIA SQL */
					echo "<script>document.getElementById('divCadastrar').style.display = 'none'; </script>";
					$id = $_GET['id'];
					$SQL = " SELECT
				 *
				FROM c_vagas v WHERE v.codigo = '$id'
				ORDER BY v.codigo DESC
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
				$cliente = $linha[fk_cliente];
				$categoria = $linha[categoria];
				$funcao = $linha[funcao];
				$salario = $linha[salario];
				$escolaridade = $linha[escolaridade];
				$descricao = $linha[descricao];
				$contato = $linha[contato];
				$data_max_inscricao = $linha[data_max_inscricao];
					}
					while($linha = mysql_fetch_assoc($dados));
					}
				}
			}
				
			  		

					?>
						<div class="container" id="divExcluir" style="display:<?= $displayexcluir ?>">	
						<div class="row" >
						  <div class="col-md-12">
							<div style="float:left">
							<form id="frmExcluir" action="" method="post">
								Tem certeza que deseja excluir Vaga
								<b><? echo "Vaga $codigo : $categoria  - $funcao"; ?></b>?<br><br>
								<INPUT TYPE="hidden" id="CRUD_query" NAME="CRUD_query" VALUE="delete">
								<INPUT TYPE="hidden" id="codigo" NAME="codigo" VALUE="<?= $codigo ?>">
								<button  id="excluir" type="submit" class="btn btn-primary"  style="background-color:green; color:#FFFFFF;">Sim</button>
								<button  class="btn btn-primary" style="background-color:red; color:#FFFFFF;">Não</button>
							</div>
							
							</div>
							</form>
						</div>
						</div>
		<DIV id="divCadastrar" class="container" style="display:<?= $display ?>">
		<form id="form_cadastro" action="" method="post">
			<div class="row" >
                <div class="form-group col-md-4">
				<div class="clearfix">
				<label for="exampleInputEmail1">Empresa</label><br>
				<select name="cliente" id="cliente"  data-placeholder="Select..." required="required">
<option value="Nenhuma Selecionada" selected="selected">Nenhuma Selecionada</option>
<?php
$qr = mysql_query("SELECT 
a.codigo as codigo,
a.nomecompleto as nome 
FROM 
c_users a WHERE a.tipo_pessoa = 2
ORDER BY a.nomecompleto ") or die(mysql_error());
while($ln = mysql_fetch_assoc($qr)){

if ($ln[codigo] == $cliente) {
$select = " selected='selected'"; 
} else { 
$select = "";
}
echo "<option value=$ln[codigo] $select >$ln[nome]</option>";
}
?> 
</select>
</div>
				</div>
				<div class="form-group col-md-3">
				<label >Função</label><br>
				<div class="clearfix">
				<select name="funcao" id="funcao"  data-placeholder="Select..." required="required">
<option value="Selecione uma função" selected="selected" >Selecione uma função</option>
<?php
$qr = mysql_query("SELECT 
nome
FROM 
gl_funcoes
ORDER BY nome ") or die(mysql_error());
while($ln = mysql_fetch_assoc($qr)){

if (strcmp($ln[nome],$funcao) == 0) {
$select = " selected='selected'"; 
} else { 
$select = "";
}
echo "<option value='$ln[nome]' $select >$ln[nome]</option>";
}
?> 
</select>
</div>
				</div>
				<div class="form-group col-md-3">
					
				<label>Escolaridade</label><br>
				<div class="clearfix">
				<select name="escolaridade" id="escolaridade"  data-placeholder="Select..." required="required">
<option value="Nenhuma Selecionada" selected="selected" >Nenhuma Selecionada</option>
<?php
$qr = mysql_query("SELECT 
nome
FROM 
gl_nivel_academico
ORDER BY nome ") or die(mysql_error());
while($ln = mysql_fetch_assoc($qr)){

if (strcmp($ln[nome],$escolaridade) == 0) {
$select = " selected='selected'"; 
} else { 
$select = "";
}
echo "<option value='$ln[nome]' $select >$ln[nome]</option>";
}
?> 
</select>
</div>
				</div>
				<div class="form-group col-md-2">
				<label for="exampleInputEmail1">Salário</label>
				<input type="text" class="form-control" id="salario" name="salario" placeholder="0 = Combinar" required value="<?= $salario ?>" >
				</div>
				<div class="form-group col-md-12">
				<label for="exampleInputEmail1">Descricao</label>
				<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira um nome" required value="<?= $descricao ?>" >
				</div>

				<div class="form-group col-md-4">
				<label for="exampleInputEmail1">Contato</label>
				<input type="text" class="form-control" id="contato" name="contato" placeholder="Insira um nome" required value="<?= $contato ?>" >
				</div>
				<div class="form-group col-md-4">
				<label for="exampleInputEmail1">Expira em</label>
				<input type="date" class="form-control" id="data_max_inscricao" name="data_max_inscricao" placeholder="Insira um nome" required value="<?= $data_max_inscricao ?>" >
				</div>
				
			</div>
		<div class="row">
		
			<div class="col-md-3">
			<div style="float:left">
			<INPUT TYPE="hidden" id="CRUD_query" NAME="CRUD_query" VALUE="<?= $query_CRUD ?>">		
			<INPUT TYPE="hidden" id="codigo" NAME="codigo" VALUE="<?= $codigo ?>">	
			<button  id="salvar" type="submit" class="btn btn-primary">Salvar</button>
				
		    </div>
		    </div>
		</div>
		</form>
		</DIV>
		<? 
		include("../combos/combos_funcoes.php");
		include("../combos/combos_escolaridades.php");
		?>

<!-- AUTOCOMPLETE -->
<script type='text/javascript' src='<?= $caminho_servidor ?>/js/autocomplete/jquery-1.8.3.js'></script>
<script type='text/javascript' src="<?= $caminho_servidor ?>/js/autocomplete/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= $caminho_servidor ?>/css/select2.css">


<script type='text/javascript'>
$(window).load(function(){<!--from  w w  w  . j a v a2  s .  co  m-->
   $('#escolaridade').select2();
   $('#funcao').select2();
   $('#cliente').select2();
});
</script>
