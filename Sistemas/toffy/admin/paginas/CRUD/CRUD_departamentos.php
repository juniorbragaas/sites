<?
if(!empty($_POST)) 
{ 
			include("../../../config/conexao.php");
			include("../../../config/caminho_servidor.php");
			include("../../../classes/util.php");
			$erro_banco = "0";
			if(strcmp($_POST['CRUD_query'],"insert")==0)
			{
						$nome = mysql_real_escape_string($_POST['nome']);
						$nome = primeira_maiuscula($nome);
						
					
						$SQL = "INSERT INTO gl_departamentos (nome) 
												VALUES ('$nome');";
								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
                        if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong>Um novo departamento foi cadastrado! <br>
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
					$nome = mysql_real_escape_string($_POST['nome']);
					$nome = primeira_maiuscula($nome);
						$codigo = $_POST['codigo'];
						if(strcmp($novasenha,"")!=0)
						{
							$senha = $novasenha;
						}
						
					
						$SQL = "UPDATE gl_departamentos SET 
								nome = '$nome'
                                WHERE codigo = '$codigo'";
						//echo "<br>$SQL<br>"; exit;
								
						$query = mysql_query($SQL);
					    $erro_banco = mysql_errno($con)." : ".mysql_error($con);

						if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong>Departamento alterado! <br>
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
						$SQL = "DELETE FROM gl_departamentos WHERE codigo = '$codigo';";								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
						if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong> O departamento foi excluído <br>
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
						c.codigo as codigo,
						c.nome as nome
						FROM gl_departamentos c WHERE c.codigo = '$id'
						ORDER BY c.codigo DESC
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
								

							$id = $_GET['id'];
							$SQL = " SELECT
							c.codigo as codigo,
							c.nome as nome
							FROM gl_departamentos c WHERE c.codigo = '$id'
							ORDER BY c.codigo DESC
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
				Tem certeza que deseja excluir 
				<b><?= $nome ?></b>?<br><br>
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
				<label for="exampleInputEmail1">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira um nome" required value="<?= $nome ?>" >
				</div>
			</div>
		<div class="row">
		
			<div class="col-md-3">
			<div style="float:left">
			<INPUT TYPE="hidden" id="CRUD_query" NAME="CRUD_query" VALUE="<?= $query_CRUD ?>">	
			<INPUT TYPE="hidden" id="senha" NAME="senha" VALUE="<?= $senha ?>">	
			<INPUT TYPE="hidden" id="codigo" NAME="codigo" VALUE="<?= $codigo ?>">	
			<button  id="salvar" type="submit" class="btn btn-primary">Salvar</button>
				
		    </div>
		    </div>
		</div>
		</form>
		</DIV>


			
	
		
		
		
