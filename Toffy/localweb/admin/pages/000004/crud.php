<?php

include "../../config/conexao.php"; 
$codigo_tela = "000004";
$nome_tela = "Perfils";
include "../crudcomponente.php";
?>
<form>
<div class="form-group">
	<div class="row">
	  <div class="col-md-4">
		  <div class="form-group">
			<label for="formGroupExampleInput2">Código</label>
			<input type="text" class="form-control" id="codigo" placeholder="" value="<?php if (isset($_GET['id'])) { echo $_GET['id']; } else { echo ""; } ?>" readonly="readonly">
		  </div>
	  </div>
	  <div class="col-md-4">
		  <div class="form-group">
			<label for="formGroupExampleInput2">Nome</label>
			<input type="text" class="form-control" id="nome" placeholder="Another input" value="Teste" <?php echo $readonly; ?>">
		  </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-12">
		  <div class="form-group">
			<?php echo $botao_acao ; ?>
		  </div>
	  </div>
	</div>
</div>
</form>





