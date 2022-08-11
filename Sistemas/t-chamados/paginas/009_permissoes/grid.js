var myGrid;
function MontaGrid()
{
	myGrid = new dhtmlXGridObject('gridbox');
	myGrid.setImagePath("../../js/dhtmlxSuite/codebase/imgs/");
	myGrid.init();
	myGrid.enableSmartRendering(true);
	myGrid.load("XML.php");
	myGrid.attachFooter("Total de registros:,{#stat_count}",["text-align:right;","text-align:left;"]);
	

}