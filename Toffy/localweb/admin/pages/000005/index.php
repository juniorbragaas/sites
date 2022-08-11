<link rel="stylesheet" type="text/css" href="../../js/dataTables/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="../../js/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="../../js/dataTables/jquery.dataTables.min.js"></script>
<?php

 include "../../config/conexao.php"; 
  
  
  $SQL = 
  "	SELECT 
		codigo as id,
		login as login,
		if(ativo = 1,'Sim','Não') as ativo
    FROM 
		gl_usuario
        
	
  ";

  $LabelsTabela = array("Codigo","Nome","Ativo");
  $CamposTabela = array("id","login","ativo");
  $id_table = "datatable";
  $obj_datatable = "datatable_$id_table";
  
?> 
<div id="titulo" class="titulo_pagina" style="width:100%; background-color:#2b8cb4; font-size:20px;"><center>LISTA DE USUÁRIOS</center></div>
<table id="<?=$id_table?>" class="display" style="width:100%">
        <thead>
            
                <?
					foreach($LabelsTabela as $label) {
						echo"<td> $label </td>";
					}
					echo"<td ></td>";
					echo"<td ></td>";
					echo"<td ></td>";
				?>
            </tr>
        </thead>
        <tbody>
        
			
			    <?
					$dados =  $conexao->query($SQL);
					
					foreach($dados as $linha){
						echo "<tr>";
								foreach($CamposTabela as $campos) {
						echo "<td>$linha[$campos]</td>";
						}
						echo "<td width='10px'><button type='button' class='btn btn-info'>Ver</button></td>";
						echo "<td width='10px'><button type='button' class='btn btn-warning'>Editar</button></td>";
						echo "<td width='10px'><button type='button' class='btn btn-danger'>Apagar</button></td>";
						echo "</tr>";	
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

