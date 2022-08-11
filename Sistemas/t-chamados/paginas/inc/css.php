<link rel="stylesheet" type="text/css" href="../../css/estilo.css"/>
<link rel="stylesheet" type="text/css" href="../../js/dhtmlxSuite/codebase/dhtmlx.css"/>
<script type="text/javascript" src="../../js/jquery.js" ></script>
<script type="text/javascript" src="../../js/jquery.maskMoney.js" ></script>
    </script>
	    <script type="text/javascript">
        $(document).ready(function(){
              $("input.valor").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>