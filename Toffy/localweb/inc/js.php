
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- POtifolio libs-->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
	
<script>
	var doc = $('html, body');
    $('.scrollSuave').click(function() {
        doc.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 400);
    return false;
    });
	
	$('.flip').hover(function(){
        $(this).find('.card').toggleClass('flipped');

    });
</script>
	
	
<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		  load: {
      		  filter: '.app'  
      		}     
				});								
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	
</script>
	
<script language="javascript">

    function SomenteNumeros(event) {
    var charCode = (event.which) ? event.which : event.keyCode
        if ((charCode > 64 && charCode < 223) || (charCode == 16)){
            return false;
        }
    return true;
    }
</script>
	
	   <!-- Adicionando sCRIPT DE cep -->
<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#logradouro").val("");
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
    jQuery(document).ready(function() {
        // Exibe ou oculta o botão
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 300) {
                jQuery('.back-to-top').fadeIn(200);
            } else {
                jQuery('.back-to-top').fadeOut(200);
            }
        });

        // Faz animação para subir
        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, 300);
        })

        jQuery('.').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, 300);
        })
    });


</script>

