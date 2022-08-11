<html lang="en">
<?php include "../../../config/caminho_servidor.php"; ?>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Ceal Express</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?= $caminho_servidor ?>/imagens/ico/favicon.png"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?= $caminho_servidor ?>/js/photo-gallery.js"></script> <link rel="shortcut icon" href="http://www.cealexpress.com.br/imagens/ico/favicon.png">
	<?php include "../../../inc/css.php"; ?>
  </head>
  <style>
      ul {         
          padding:0 0 0 0;
          margin:0 0 0 0;
      }
      ul li {     
          list-style:none;
          margin-bottom:25px;           
      }
      ul li img {
          cursor: pointer;
      }
      .modal-body {
          padding:5px !important;
      }
      .modal-content {
          border-radius:0;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }
    .controls{          
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;          
    }
    .next {
        float:right;
        text-align:right;
    }
      /*override modal for demo only*/
      .modal-dialog {
          max-width:500px;
          padding-top: 90px;
      }
      @media screen and (min-width: 768px){
          .modal-dialog {
              width:500px;
              padding-top: 90px;
          }          
      }
      @media screen and (max-width:1500px){
          #ads {
              display:none;
          }
      }
  </style>
  <body id="voltarTopo">   
<? include "../../../inc/header.php"; ?> 
    <div class="container">  
<br>	
        <div class="row" style="text-align:center;   padding:0 0 20px 0; margin-bottom:40px;">
            <h1 class="multi-hdng">Galeria de fotos: 18/06/2014</h1>
			
   </div>
        
        <ul class="row">
		<?php

   $path = "fotos/";
   $diretorio = dir($path); 
   while($arquivo = $diretorio -> read()){
   if((strcmp($arquivo,".") != 0) && strcmp($arquivo,".."))
   {
   ?>
   <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                <img class="img-responsive" src="<?= $path.$arquivo ?>">
            </li>
  
   <?
   }
      
   }
   $diretorio -> close();

?>
            
          </ul>    
<center><a href="<?= $caminho_servidor ?>/paginas/galeria-fotos.php" >Voltar para galeria</a><center>		  
    </div> <!-- /container -->
    
     
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">>Galeria de fotos: 18/06/2014</h4>	
</div>		
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <? include "../../../inc/footer.php";
include "../../../inc/js.php"; ?>
  </body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  
</html>
