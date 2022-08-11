<?php 

<?

  $SQL = "SELECT 
			1 as 1, 
			2 as 2, 
			3 as 3 
		  from 
		    tabela";
  $listacamposnatela = array("1","2","3");
  $tipocampo = array("1","2","3");
  $tabela = "Nome da tabela";

  
?>

  
  $listalabels = array();
  
?>
        <table class="display" id="<? =$tabela ?>">
            <thead>
                <tr>                    
                    <?
					foreach($arr as $listacamposnatela) {
						echo"<td> $arr </td>";
					}
					?>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
