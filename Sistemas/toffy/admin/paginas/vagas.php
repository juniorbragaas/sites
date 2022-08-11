<script src="<?= $caminho_servidor ?>/js/jquery.min.js"></script>
<script src="<?= $caminho_servidor ?>/js/eModal.min.js"></script>


<link href="<?= $caminho_servidor ?>/css/font-awesome.min.css" rel="stylesheet">
<? include("../config/conexao.php"); ?>

<div style="background-color:#2C8DB5; color:#FFF; ">
	<center><h4 style="font-size:30px;">Vagas de emprego </h4></center>
</div>

<div class="container">	
    <!-- Botões da tela -->	 
	<div class="row">
			<INPUT TYPE="hidden" id="hdnId" NAME="hdnId" VALUE="0">
			<INPUT TYPE="hidden" id="hdnDados" NAME="hdnDados" VALUE="">
			<div class="col-md-14">
				<table>
				<tr>
				<td>
					<button id="novo" class="btn btn-primary" >Novo</button>	 
				</td>
				<td>
					<button id="alterar" class="btn btn-primary" >Alterar</button>
				</td>
				<td>
					<button id="excluir" class="btn btn-primary" >Excluir</button>
				</td>

				</tr>
				</table>
			 </div>
	</div>
				<div class="row">
				<div class="col-md-14" id="lista_clientes">
					<div id="DivLista">
						<table id="tabela_dados" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th>Código</th>
								<th>Cliente</th>
								<th>CNPJ</th>
								<th>Categoria</th>
								<th>Função</th>
								<th>Status</th>
								</tr>
							</thead>		
					<tbody>
					<?
					/* PESQUISA/coNDO DADOS VIA SQL */

					$SQL = " SELECT
								v.codigo as codigo,
								u.nomecompleto as cliente,
								u.cpf as CNPJ,
								d.nome as categoria,
								v.funcao as funcao,
								if((ADDDATE(v.data_max_inscricao,1) > now()),'Aberta','Fechada') as status

								FROM
								c_vagas v
								INNER JOIN c_users u On u.codigo = v.fk_cliente
								INNER JOIN gl_funcoes f ON f.nome LIKE v.funcao
								INNER JOIN gl_departamentos d ON d.codigo = f.fk_departamento
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
					echo "<tr>";
					echo "<th>$linha[codigo]</th>";
					echo "<th>$linha[cliente]</th>";
					echo "<th>$linha[CNPJ]</th>";
					echo "<th>$linha[categoria]</th>";
					echo "<th>$linha[funcao]</th>";
					echo "<th>$linha[status]</th>";
					echo "</tr>";
					}
					while($linha = mysql_fetch_assoc($dados)); 
					// fim do if 
					}		
					?>
					</tbody>
				</table>
			</div>
			</div>
				</div>
			</div>	
<script>
$(document).ready(function () {/* activate scroll spy menu */

    $('#novo').click(Cadastrar);
	$('#alterar').click(Alterar);
	$('#excluir').click(Excluir);

    /* Entrar em Modal do CRUD*/
	function Cadastrar() {
        var title = 'Cadastro de vagas';
        return eModal
            .iframe('<?= $caminho_servidor ?>/admin/paginas/CRUD/CRUD_vagas.php?acao=cadastro', title)

    }
	function Alterar() {
		if(document.getElementById("hdnId").value != '0')
		{
        var title = 'Alterar vaga: '+ document.getElementById("hdnId").value;
        return eModal
            .iframe('<?= $caminho_servidor ?>/admin/paginas/CRUD/CRUD_vagas.php?acao=alterar&id='+ document.getElementById("hdnId").value, title)
        }
		else
		{
			alert('Selecione um registro para alterar!');
		}
   }
	function Excluir() {
		if(document.getElementById("hdnId").value != '0')
		{
        var title = 'Excluir vaga: '+ document.getElementById("hdnId").value;
        return eModal
            .iframe('<?= $caminho_servidor ?>/admin/paginas/CRUD/CRUD_vagas.php?acao=excluir&id='+ document.getElementById("hdnId").value, title)
		}
		else
		{
			alert('Selecione um registro para excluir!');
		}
	}
		


    //#endregion
});
</script>
</div>
</div>



        