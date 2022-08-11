<?php
session_start();
//! acho que é uma boa mudar este nome (inverter)
$TITLE = 'Gerenciador de Menu';

include_once "../../class/RelativePath.class.php";

$relative = new relativePath();

// include $relative->path()."inc/head.php";
// include_once $relative->path()."/segurança/verificaLogin.php";
// protegePagina();

// 2 é o menu administrativo-> se ele não for autorizado manda msg de desAutorizado
$valores = explode(",",$_SESSION['permissao']);
if(!in_array('2',$valores)){
    header('HTTP/1.0 401 Unauthorized');
    echo "<script>location.href='".$relative->path()."index.php'</script>";
}

// include $relative->path()."inc/header.php";
include $relative->path()."config/conexao.php";
//criar a tabela
$conection = getConnection();
$sqlSelectMenus =  "SELECT * FROM gl_menu";
$selectMenu = $conection->prepare($sqlSelectMenus);
$selectMenu->execute();

if($selectMenu->rowCount() >= 1){
    // $dados = $selectMenu->fetchAll();
    $LabelsTabela = array("Codigo","Id","Nome","Ordem","Pai");
    $CamposTabela = array("codigo","id","nome","ordem","pai");
    $id_table = "datatable";
    $obj_datatable = "datatable_$id_table";
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<div class="table-responsive">
    <table id="<?=$id_table?>" class="display table table-striped table-hover" style="width:100%">
        <thead>
                <?
					foreach($LabelsTabela as $label) {
						echo"<td scope='col' > $label </td>";
					}
                    //?
					echo"<td ></td>";
					echo"<td ></td>";
				?>
            </tr>
        </thead>
        <tbody>
			    <?
					// $dados =  $conexao->query($SQL);
                    $dados = $selectMenu->fetchAll();
					
					foreach($dados as $linha){
						echo "<tr scope='row'>";
								foreach($CamposTabela as $campos) {
						echo "<td>$linha[$campos]</td>";
						}
						echo "<td><a href='#'>Alterar(".$linha['id'].")</a></td>"; //!colocar botão aki
						echo "<td><a href='#'>Excluir(".$linha['id'].")</a></td>";
						echo "</tr>";	
				    }
				?> 
        </tbody>       
    </table>
</div>

<?php include $relative->path()."inc/foot.php";?>