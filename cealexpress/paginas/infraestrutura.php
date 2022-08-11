
<html>
<?php include "../config/caminho_servidor.php"; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Ceal Express</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content=""><link rel="shortcut icon" href="<?= $caminho_servidor ?>/imagens/ico/favicon.png"> 
<?php include "../inc/css.php"; ?>




</head>
<body id="voltarTopo">
<?php
include "../inc/header.php";
?>
<br><br>
<div class="container">

	<div class="row">
		<div class="span12">
		<br><br><br>
			<h1 class="multi-hdng">Infraestrutura</h1>
		</div>
	</div>
	<div class="row">
		<div class="span12">
		  <div class="boxs-slides"> 
          <!-- Start Advanced Gallery Html Containers -->
          <div id="gallery" class="content" >
    <div id="controls" class="controls"></div>
    <div class="slideshow-container">
              <div id="loading" class="loader"></div>
              <div id="slideshow" class="slideshow"></div>
            </div>
    <div id="caption" class="caption-container"></div>
  </div>
          <div id="thumbs" class="navigation">
    <ul class="thumbs noscript">
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/gazeebo.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/gazeebo.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/cabana2.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/cabana.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/cabana.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/cabana2.jpeg"  /> </a> </li>
              </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/breakfast.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/breakfast.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/bathroom.png"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/bathroom.png"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/new-cabanas.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/new-cabanas.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/pousada2.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/pousada2.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/rede.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/rede.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/room2.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/room2.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/walkway2.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/walkway2.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/walkway.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/walkway.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/view.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/view.jpeg"  /> </a> </li>
              <li> <a class="thumb imgslige" name="leaf" href="<?= $caminho_servidor?>/imagens/infraestrutura/varanda.jpeg"> <img src="<?= $caminho_servidor?>/imagens/infraestrutura/varanda.jpeg"  /> </a> </li>
            </ul>
  </div>
  </div>
	</div>
	</div>
	</div>
<?php
include "../inc/footer.php";
include "../inc/js.php";
?>
<!-- GALERIA DE IMAGENS -->
<link rel="stylesheet" href="<?= $caminho_servidor?>/js/galleriffic/basic.css" type="text/css" />
<link rel="stylesheet" href="<?= $caminho_servidor?>/js/galleriffic/galleriffic-3.css" type="text/css" />
<script type="text/javascript" src="<?= $caminho_servidor?>/js/galleriffic/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor?>/js/galleriffic/jquery.history.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor?>/js/galleriffic/jquery.galleriffic.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor?>/js/galleriffic/jquery.opacityrollover.js"></script>
<!-- We only want the thunbnails to display when javascript is disabled -->
<script type="text/javascript">
	document.write('<style>.noscript { display: none; }</style>');
</script>
<!-- FIM DA GALERIA -->
</body>
</html>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {

						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;
					
					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script> 
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-25854704-1']);
_gaq.push(['_setDomainName', '.wowslider.com']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_setAllowHash', false]);
if(document.cookie.match("(^|;\\s)__utma") && !/utmcsr=\(direct\)/.test(unescape(document.cookie))) {
    _gaq.push(
      ['_setReferrerOverride', ''],
      ['_setCampNameKey', 'aaan'], 
      ['_setCampMediumKey', 'aaam'], 
      ['_setCampSourceKey', 'aaas'], 
      ['_setCampTermKey', 'aaat'], 
      ['_setCampContentKey', 'aaac'], 
      ['_setCampCIdKey', 'aaaci']
    )
}

_gaq.push(['_trackPageview']);  

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script> 

<!-- WOW Visits --> 
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1071863997;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "YwhdCOff5AIQvbGN_wM";
var google_conversion_value = 0;
/* ]]> */
</script>

