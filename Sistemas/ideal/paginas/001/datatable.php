


<link rel="stylesheet" type="text/css" href="../../scripts/dataTables/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="../../scripts/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="../../scripts/dataTables/jquery.dataTables.min.js"></script>

<?php

/*
Arquivo de geração de datatable para uma pagina
$SQL = Variavel que recebe a consulta (Caso Exista parametros dimamicos terao que ser acrescentados manualmente
$LabelsTabela = Vetor com os rotúlos da tabela
$CamposTabela = Vetor com os campos da tabela
$id_table = "datatable";
$obj_datatable = "datatable_$id_table";


Arquivo gerador por Valdelei Junior Braga 30/01/2019 19:27:00

*/

  include "../../config/conexao.php"; 
  
  
  $SQL = 
  "	SELECT 
		codigo as id,
		login as login,
        ativo as ativo
    FROM 
		tc_users i1
        
	
  ";

  $LabelsTabela = array("Codigo","Nome","Ativo");
  $CamposTabela = array("id","login","ativo");
  $id_table = "datatable";
  $obj_datatable = "datatable_$id_table";
  
?> 

<table id="<?=$id_table?>" class="display" style="width:100%">
        <thead>
            
                <?
					foreach($LabelsTabela as $label) {
						echo"<td> $label </td>";
					}
					echo"<td ></td>";
					echo"<td ></td>";
				?>
            </tr>
        </thead>
        <tbody>
        
			
			    <?
					//Executando query
					$dados = mysql_query($SQL,$conexao) or die(mysql_error());
					// transforma os dados em um array
					$linha = mysql_fetch_assoc($dados);
					// calcula quantos dados retornaram
					$total = mysql_num_rows($dados);
					
					// se o número de resultados for maior que zero, mostra os dados
					if($total > 0) 
					{
					// inicia o loop que vai mostrar todos os dados
						do {
						echo "<tr>";
								foreach($CamposTabela as $campos) {
						echo "<td>$linha[$campos]</td>";
						}
						echo "<td><a href='#'>Alterar(".$linha['id'].")</a></td>";
						echo "<td><a href='#'>Excluir(".$linha['id'].")</a></td>";
						echo "</tr>";		

						
						// finaliza o loop que vai mostrar os dados
						}while($linha = mysql_fetch_assoc($dados));
					// fim do if 
					}
				?> 
        </tbody>       
    </table>
<script>
$(document).ready(function() {
     var <?=$obj_datatable ?> = $('#<?=$id_table?>').DataTable( {
        "language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
    } );
} );
</script>