<?php ?>
<html lang="pr-br">
<? include "./inc/header.php"; ?>
<body>
<menu>
<? include "./inc/menu.php"; ?>
</menu>
<div id="conteudo" style="margin-top:80px;"></div>
</body>
<? include "./inc/rodape.php"; ?>
<? include "./inc/js.php"; ?>
<script type="text/javascript">
    function carregar(pagina){
        $("#conteudo").load(pagina);
    }
</script>
</html>


