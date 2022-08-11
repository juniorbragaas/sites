<script>
		var myLayout;
		var myMenu;
		function doOnLoad() {
			myLayout = new dhtmlXLayoutObject("layoutObj", "1C");
			myLayout.cells("a").setText("<table><tr><td></td><td style='vertical-align:middle'> Os Aventureiros Moto Clube - Acesso Administrativo</td></tr></table><br><br><br>");
			myLayout.cells("a").attachObject("conteudo");
			
			}
			function MontaMenu() {
			myMenu = new dhtmlXMenuObject({
				parent: "menuObj",
				icons_path: "../common/imgs/",
				xml: "menu_map.php",
				onload: function() {
					// callback
				}
			});
			myMenu.attachEvent("onClick", function(id, zoneId, cas){
				// zoneId used for context menu
				// ctrl, alt, shift state
				var casText = "";
				for (var a in {ctrl:1,alt:1,shift:1}) if (cas[a] == true) casText += " "+a+"=true";
				$('#painel').attr('src',"paginas/"+id)
				
			});
		}
</script>




	


