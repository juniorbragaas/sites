		
<!-- Footer -->
<div class="row" style="background-color:#2C8DB5">
	<div class="container">
<br><br>
	</div>
</DIV>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<br><p>Desenvolvido por &copy; Valdelei Junior Braga</p>
			</div>
		</div>
	</div>
</div>

<!-- MODAL SAIR-->
<div id="myModalSair" class="modal fade bs-example-modal-sm" tabindex="-1"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img style="max-width:100px; margin-top: -7px;"
             src="<?= $caminho_servidor ?>/imagens/logo.png">
        </div>
        <div class="modal-body">
			<center>
			<div class="sombrarredondada">
				<div class="row">
				   <div class="col-lg-12">
						Tem certeza que deseja sair?
						<br>

						<button  class="btn btn-primary" style="background-color:green; color:#FFFFFF;" onclick="window.location.href = '<?= $caminho_servidor ?>/admin/logout.php'; ">Sim</button>
						<a href="" class="btn btn-default" data-dismiss="modal" style="background-color:red; color:#FFFFFF;">Não</a>
						<br>
				   </div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>

<input type="button" class="voltarTopo" title="Voltar ao topo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="&#8593" >
