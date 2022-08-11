<? 
	include("../../classes/util.php");
?>
<script type="text/javascript" src="grid.js" type="text/javascript" CHARSET="ISO-8859-1"  ></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
<!-- Iniciando DTMLXGRID -->
<script type="text/javascript" src="../../js/dhtmlxSuite/codebase/dhtmlx.js" ></script>
<script  src="../../js/dhtmlxSuite/sources/dhtmlxCommon/codebase/dhtmlxcommon.js"></script>
<script  src="../../js/dhtmlxSuite/sources/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>

<!-- Monta Layout e Menu inicial -->
<script type="text/javascript" src="../../js/montaTela.js"></script>

<!-- Funcoes personalizadas -->
<script type="text/javascript" src="../../js/funcoes.js"></script>


 <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jquery.maskedinput.js"></script>

   <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#logradouro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")
                        $("#ibge").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
	<script type="text/javascript">
    $(document).ready(function(){

    //get the height and width of the page
    var window_width = $(window).width();
    var window_height = $(window).height();

    //vertical and horizontal centering of modal window(s)
    /*we will use each function so if we have more then 1
    modal window we center them all*/
    $('.modal_window').each(function(){

        //get the height and width of the modal
        var modal_height = $(this).outerHeight();
        var modal_width = $(this).outerWidth();

        //calculate top and left offset needed for centering
        var top = (window_height-modal_height)/2;
        var left = (window_width-modal_width)/2;

        //apply new top and left css values
        $(this).css({'top' : top , 'left' : left});

    });

        $('.activate_modal').click(function(){

              //get the id of the modal window stored in the name of the activating element
              var modal_id = $(this).attr('name');

              //use the function to show it
              show_modal(modal_id);
			  MontaGrid2();
			  

        });

        $('.close_modal').click(function(){

            //use the function to close it
            close_modal();

        });

    });

    //THE FUNCTIONS

    function close_modal(){

        //hide the mask
        $('#mask').fadeOut(500);

        //hide modal window(s)
        $('.modal_window').fadeOut(500);

    }
    function show_modal(modal_id){

        //set display to block and opacity to 0 so we can use fadeTo
        $('#mask').css({ 'display' : 'block', opacity : 0});

        //fade in the mask to opacity 0.8
        $('#mask').fadeTo(500,0.8);

         //show the modal window
        $('#'+modal_id).fadeIn(500);

    }
	function soNums(e){
 
    //teclas adicionais permitidas (tab,delete,backspace,setas direita e esquerda)
    keyCodesPermitidos = new Array(8,9,37,39,46);
     
    //numeros e 0 a 9 do teclado alfanumerico
    for(x=48;x<=57;x++){
        keyCodesPermitidos.push(x);
    }
     
    //numeros e 0 a 9 do teclado numerico
    for(x=96;x<=105;x++){
        keyCodesPermitidos.push(x);
    }
     
    //Pega a tecla digitada
    keyCode = e.which; 
     
    //Verifica se a tecla digitada é permitida
    if ($.inArray(keyCode,keyCodesPermitidos) != -1){
        return true;
    }    
    return false;
}
</script>




	


