



<script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-146052-10']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
<script>
$(document).ready(function(){
var target = $(".bannner_opacity");
var targetHeight = target.outerHeight();

$(document).scroll(function(e){
    var scrollPercent = (targetHeight - window.scrollY) / targetHeight;
    if(scrollPercent >= 0){
        target.css('opacity', scrollPercent);
    }
});
});
</script>
<script>
$(document).ready(function(){
$(".center_span").hover(
  function () {
    $(this).addClass("mid_span_hover");	
  },
  function () {
    $(this).removeClass("mid_span_hover");
  }
);
});
</script>



<!-- Navbar ================================================== -->
	
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
  <div style=" background-color:#708090; width:100%; ">

  <div class="row">


      <div class="span1" >
        
      </div>
      <div class="span9" >
        
      </div>
      <div class="span6" >
	  <a href="https://www.google.com.br/maps/place/Rua+Caixa+D'Agua,+Tiradentes+-+MG,+36325-000/@-21.1164674,-44.1637481,17z/data=!3m1!4b1!4m5!3m4!1s0xa1bf59d158481f:0x302469e1e52b4aa7!8m2!3d-21.1164724!4d-44.1615594" title="Localização pelo Maps" target="_blank">
  <img src="<?= $caminho_servidor ?>/imagens/icones_redes/local.png" height="30px" width="30px" style="opacity: 0.4;" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40" border="0" ></a>
  <a href="tel:+3233551595" title="Ligue agora">
  <img src="<?= $caminho_servidor ?>/imagens/icones_redes/telefone.png" height="30px" width="30px" style="opacity: 0.4;" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40" border="0"><a>
  <a href="mailto:mailer@cealexpress.com.br" title="Entre em contato por email" target="_blank">
  <img src="<?= $caminho_servidor ?>/imagens/icones_redes/email.png" height="30px" width="30px"  style="opacity: 0.4;" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40" border="0"><a>
    <a href="https://www.facebook.com/CealExpress/" title="Conheça nossa página no facebook" target="_blank">
  <img src="<?= $caminho_servidor ?>/imagens/icones_redes/facebook.png" height="30px" width="30px" style="opacity: 0.4;" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100" onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40" border="0"></a>
      </div>

  </div>


	</div>
    <div class="container-fluid" style="padding-right:0;">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="brand page-header-inner2 logo-link" href="<?= $caminho_servidor ?>"><img src="<?= $caminho_servidor ?>/imagens/logo.png" class="logo-img" alt=""></a>
      <div class="nav-collapse collapse">
        <ul class="nav main-nav-links" id="page-menu">
          <li class="menuprincipal"> <a href="<?= $caminho_servidor ?>/paginas/clientes.php" class="main-nav-link"><span class="main-nav-link-inner">Clientes</span></a> </li>
          <li class="menuprincipal"> <a href="<?= $caminho_servidor ?>/paginas/depoimentos.php" class="main-nav-link"><span class="main-nav-link-inner">Depoimentos</span></a> </li>
          <li class="menuprincipal"> <a href="<?= $caminho_servidor ?>/paginas/contato.php" class="main-nav-link"><span class="main-nav-link-inner">Contato</span></a> </li>     
          <li class="menuprincipal"> <a href="<?= $caminho_servidor ?>/paginas/infraestrutura.php"  class="main-nav-link"><span class="main-nav-link-inner">infraestrutura</span></a> </li>         
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- header --> 








