<html>
<head>
	<title>T-NOTAS Sistemas de Gestão de Nostas Fiscais </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="stylesheet" type="text/css" href="../../../../js/dhtmlxSuite/sources/dhtmlxVault/codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../js/dhtmlxSuite/sources/dhtmlxVault/codebase/dhtmlxvault.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../js/dhtmlxSuite/sources/dhtmlxVault/skins/skyblue/dhtmlxvault.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../js/dhtmlxSuite/sources/dhtmlxVault/skins/terrace/dhtmlxvault.css"/>
	<link rel="stylesheet" type="text/css" href="../../../../js/dhtmlxSuite/sources/dhtmlxVault/skins/web/dhtmlxvault.css"/>
	<script src="../../../../js/dhtmlxSuite/sources/dhtmlxVault/codebase/dhtmlxvault.js"></script>
	<script src="../../../../js/dhtmlxSuite/sources/dhtmlxVault/codebase/swfobject.js"></script>
	
	<style>
		div.sample_title {
			font-size: 14px;
			font-family: Roboto, Arial, Helvetica;
			color: #404040;
			font-weight: 500;
			margin: 15px 1px;
		}
		div#maxsize_info {
			font-size: 14px;
			font-family: Roboto, Arial, Helvetica;
			color: #404040;
			margin: 16px 1px 20px 1px;
		}
		div#vaultObj {
			position: relative;
			width: 600px;
			height: 250px;
			box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.09);
		}
	</style>
	<script>
		var myVault;
		function doOnLoad() {
			window.dhx4.ajax.get("upload_conf.php", function(r){
				var t = window.dhx4.s2j(r.xmlDoc.responseText);
				if (t != null) {
					if (t != null) {
					// extend conf
					t.autoStart = true; // start upload right after file added
					t.autoRemove = false; // remove file from list right after upload done
					t.buttonUpload = false; // show/do_not_show upload/stop buttons
					t.buttonClear = true; // show/do_not_show clear_all button
					t.filesLimit = 0; // correspinding number or skip or zero to ignore
					// init
					myVault = new dhtmlXVaultObject(t);
					myVault.setStrings({
					done:           "Pronto",
					error:          "Error",
					size_exceeded:  "Tamanho de arquivo excedido (max #size#)",
					btnAdd:         "Adicionar",
					btnUpload:      "Carregar arquivo(s)",
					btnClean:       "Apagar todos",
					btnCancel:      "Cancelar",
					dnd:            "Carregue os arquivos aqui"
					});
					
					// update max file size notice
					document.getElementById("maxsize_info").innerHTML = "Upload max filesize: "+myVault.readableSize(t.maxFileSize);
				}
				}
			});
		}
	</script>
	
</head>
<body onload="doOnLoad();">
	<div class="sample_title">Carregar XML de nota</div>
	<div id="maxsize_info">&nbsp;</div>
	<div id="vaultObj"></div>
	Após upload das notas <a href="listar.php">clique aqui</a>
</body>
</html>