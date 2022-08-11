<html>
<head>
<link rel="stylesheet" href="css/blueimp-gallery.min.css">
</head>
<body>
<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">&laquo;</a>
    <a class="next">&raquo;</a>
    <a class="close">x</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<div id="links">
    <a href="imagens/album1/1.jpg" title="Banana">
        <img src="imagens/album1/1.jpg" width="80px" height="80px" alt="Banana">
    </a>
    <a href="imagens/album1/2.jpg" title="Apple">
        <img src="imagens/album1/2.jpg" width="80px" height="80px" alt="Apple">
    </a>
    <a href="imagens/album1/3.jpg" title="Orange">
        <img src="imagens/album1/3.jpg" width="80px" height="80px" alt="Orange">
    </a>
</div>
<script src="js/blueimp-gallery.min.js"></script>
<script>
document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
</body>



</html>