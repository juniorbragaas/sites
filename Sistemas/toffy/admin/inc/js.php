<!-- SCRIPTS DE PAGINA -->
<!-- Slider -->
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/slick/slick.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/slick/slider.js"></script>
<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery.js"></script>
<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/typeahead.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= $caminho_servidor ?>/js/eModal.min.js"></script>
<script src="<?= $caminho_servidor ?>/js/bootstrap.min.js"></script>		
<script type="text/javascript">
// Use jQuery com a variavel $j(...)
var $j = jQuery.noConflict();
$j(document).ready(function() {
$j(".voltarTopo").hide();
$j(function () {
$j(window).scroll(function () {
if ($j(this).scrollTop() > 300) {
$j('.voltarTopo').fadeIn();
} else {
$j('.voltarTopo').fadeOut();
}
});
$j('.voltarTopo').click(function() {
$j('body,html').animate({scrollTop:0},600);
}); 
    });});	
</script>
<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/funcoes.js"></script>

<!-- AUTOCOMPLETE  -->


<script type="text/javascript" src="<? echo $caminho_servidor; ?>/js/jquery.mockjax.js"></script>
<script type="text/javascript" src="<? echo $caminho_servidor; ?>/js/jquery.autocomplete.js"></script>



<!-- Bootstrap Core JavaScript -->  
<script type="text/javascript" charset="utf8" src="<?= $caminho_servidor ?>/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= $caminho_servidor ?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= $caminho_servidor ?>/js/dataTables.jqueryui.min.js"></script>
<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/montaDataTable.js"></script>

