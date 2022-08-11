function MontaGrid() {
    myGrid = new dhtmlXGridObject("gridbox");
    myGrid.setImagePath("../js/dhtmlx/dhtmlxGrid_v3/imgs/");
    myGrid.setHeader("Código,Nome,Email,Login,Telefone,Tipo de pessoa");
    myGrid.setColAlign("left,left,center.left,left,left");
    myGrid.setColTypes("ro,ro,ro,ro,ro,ro");
    myGrid.setInitWidths("100,160,160,100,120,160");
    myGrid.setColSorting("str,int,str,str,str,str");
    myGrid.setSkin("light");
    myGrid.enableBlockSelection();
    myGrid.forceLabelSelection(true);
    myGrid.enablePaging(true,20, 10, "Div1", true);
    myGrid.setPagingSkin("bricks");
    myGrid.init();
    myGrid.enableSmartRendering(true, 10);
    myGrid.attachHeader("#numeric_filter,#text_filter,#text_filter,#text_filter,#text_filter,#text_filter");
	myGrid.loadXML("./paginas/dados/XMLclientes.php");
}
