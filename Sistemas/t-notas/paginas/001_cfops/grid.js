var myGrid;
function MontaGrid()
{
	myGrid = new dhtmlXGridObject('gridbox');
	myGrid.setImagePath("../../js/dhtmlxSuite/codebase/imgs/");
	myGrid.init();
	myGrid.enableSmartRendering(true);
	myGrid.load("XML.php");
	myGrid.attachFooter("Total de registros:,#cspan,{#stat_count},#cspan,#cspan,<img src='../../imagens/botoes/Excel-icon.png' title='Exportar para XLS' style='height:30px; width:30px;' onclick=myGrid.toExcel('../../js/grid-excel-php/generate.php');>-<img src='../../imagens/botoes/PDF-icon.png' title='Exportar para PDF' style='height:30px; width:30px;' onclick=myGrid.toExcel('../../js/grid-pdf-php/generate.php');>",
	["text-align:right;","text-align:left;","text-align:left","text-align:left","text-align:right;"]);
	

}