<?
if(!empty($_POST)) 
	{ 
			include("../../../config/conexao.php");
			include("../../../config/caminho_servidor.php");
			include("../../../classes/util.php");
			$erro_banco = "0";
			if(strcmp($_POST['CRUD_query'],"insert")==0)
			{
						$nomecompleto = mysql_real_escape_string($_POST['nomecompleto']);
						$nomecompleto = primeira_maiuscula($nomecompleto);
						$telefone = mysql_real_escape_string($_POST['telefone']);
						$email = mysql_real_escape_string($_POST['email']);
						$tipo_pessoa = $_POST['tipo_pessoa'];
						$login = mysql_real_escape_string($_POST['login']);
						$cpf = mysql_real_escape_string($_POST['cpf']);
						$senha = sha1($_POST['senha']); 
						
					
						$SQL = "INSERT INTO c_users (nomecompleto,telefone,email,cpf,tipo_pessoa,login,senha) 
												VALUES ('$nomecompleto','$telefone','$email','$cpf','$tipo_pessoa','$login','$senha');";
								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
                        if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong>Um novo cliente foi cadastrado! <br>
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
				$nomecompleto = mysql_real_escape_string($_POST['nomecompleto']);
				$nomecompleto = primeira_maiuscula($nomecompleto);
						$telefone = mysql_real_escape_string($_POST['telefone']);
						$email = mysql_real_escape_string($_POST['email']);
						$tipo_pessoa = $_POST['tipo_pessoa'];
						$login = mysql_real_escape_string($_POST['login']);
						$cpf = mysql_real_escape_string($_POST['cpf']);
						$senha = $_POST['senha'];
						$novasenha = sha1($_POST['novasenha']); 
						$codigo = $_POST['codigo'];
						if(strcmp($novasenha,"")!=0)
						{
							$senha = $novasenha;
						}
						
					
						$SQL = "UPDATE c_users SET 
								nomecompleto = '$nomecompleto',
								telefone = '$telefone',
								email = '$email',
								cpf = '$cpf',
								tipo_pessoa = '$tipo_pessoa',
								login = '$login',
								senha = '$senha'
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
						    <strong>Sucesso: </strong>Um novo cliente foi alterado!<?echo $erro_banco; exit; ?> <br>
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
						$SQL = "DELETE FROM c_users WHERE codigo = '$codigo';";								
						$query = mysql_query($SQL);
						$erro_banco = mysql_errno($con)." : ".mysql_error($con);
						if(strcmp($erro_banco,"0 : ")==0)
						{
						  echo "<script>window.parent.location.reload();</script>";
                          ?>
						
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Sucesso: </strong> O cliente foi excluído <br>
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
				c.cpf as cpf,
				c.nomecompleto as nomecompleto,
				c.email as email,
				c.login as login,
				c.senha as senha,
				c.telefone as telefone,
				c.tipo_pessoa as tipo_pessoa
				FROM c_users c WHERE c.codigo = '$id'
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
				$cpf = $linha[cpf];
				$nomecompleto =  $linha[nomecompleto];
				$email =  $linha[email];
				$login =  $linha[login];
				$senha =  $linha[senha];
				$telefone =  $linha[telefone];
				$tipo_pessoa  = $linha[tipo_pessoa];
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
					c.cpf as cpf,
					c.nomecompleto as nomecompleto,
					c.email as email,
					c.login as login,
					c.senha as senha,
					c.telefone as telefone,
					c.tipo_pessoa  as tipo_pessoa
					FROM c_users c WHERE c.codigo = '$id'
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
					$cpf = $linha[cpf];
					$nomecompleto =  $linha[nomecompleto];
					$email =  $linha[email];
					$login =  $linha[login];
					$senha =  $linha[senha];
					$telefone =  $linha[telefone];
					$tipo_pessoa  = $linha[tipo_pessoa];
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
								<b><?= $nomecompleto ?></b>?<br><br>
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
				<label for="exampleInputEmail1">Nome completo </label>
				<input type="text" class="form-control" id="nomecompleto" name="nomecompleto" placeholder="Insira seu nome completo" required value="<?= $nomecompleto ?>" >
				</div>
				<div class="form-group col-md-4">
				<label for="exampleInputEmail1">Telefone (Somente numeros com DDD)</label>
				<input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $telefone ?>" placeholder="Insira seu telefone"  required pattern="\d{11}"  data-mask="9999999999">
				</div>
				<div class="form-group col-md-4">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="email" class="form-control" id="email" name="email"  value="<?= $email ?>" placeholder="Digite o valor" required>
				</div>
			</div>
		<div class="row">
			<div class="form-group col-md-3">
			<div class="form-group">
			<label for="sel1">Tipo de pessoa:</label>
			<select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required>
			<option value="1" <? if($tipo_pessoa == 1) { echo "selected";}?>>Física</option>
			<option value="2" <? if($tipo_pessoa == 2) { echo "selected";}?>>Jurídica</option>
			</select>
			</div>
			</div>
			<div class="form-group col-md-3">
			<label for="exampleInputEmail1">CPF/CNPJ</label>
			<input type="text" class="form-control" id="cpf" name="cpf" value="<?= $cpf ?>" placeholder="Digite o valor" required>
			</div>
			<div class="form-group col-md-3">
			<label for="exampleInputEmail1">Login</label>
			<input type="text" class="form-control" id="login" value="<?= $login ?>" name="login" placeholder="Digite o valor" required>
			</div>
			<div class="form-group col-md-3">
			<label for="exampleInputEmail1">Senha<?= $opcional ?></label>
			<input type="password" class="form-control" id="novasenha" name="novasenha" value="" placeholder="Digite o valor" >
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
							


			
	
		
		
		
