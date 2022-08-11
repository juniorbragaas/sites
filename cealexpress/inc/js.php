
<script src="<?= $caminho_servidor ?>/js/jquery.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-transition.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-alert.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-modal.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-dropdown.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-scrollspy.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-tab.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-tooltip.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-popover.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-button.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-collapse.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-carousel.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-typeahead.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-affix.js"></script> 
<script src="<?= $caminho_servidor ?>/js/holder.js"></script> 
<script src="<?= $caminho_servidor ?>/js/google-code-prettify/prettify.js"></script> 
<script src="<?= $caminho_servidor ?>/js/application.js"></script> 
<script src="<?= $caminho_servidor ?>/js/bootstrap/bootstrap-image-gallery.min.js"></script>


<!-- Slider -->
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/slick/slick.js"></script>
<script type="text/javascript" src="<?= $caminho_servidor ?>/js/slick/slider.js"></script>
<script  type="text/javascript" src="<?= $caminho_servidor ?>/js/jquery.js"></script>


<script>
$(document).ready(function() {		
	 $(window).load(function () {
	 	
	 	 if(readCookie('signedup')==1)
	 	 {
	 	
	 	}
	 	else{
	 		$("#pass").trigger("click");
	 	}
	 });	 
	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		closeOnContentClick: false,
		closeOnBgClick:false,
			showCloseBtn:false,
			enableEscapeKey:false,
			overflowY:"hidden",
});
	var cancel = $.magnificPopup.instance; 
	$("#cancel").click(function()
	{
		cancel.close();
	});
	$(".close_btn").click(function()
	{
		cancel.close();
	});
	function setCookie(cname,cvalue,exdays)
{
var d = new Date();
d.setTime(d.getTime()+(exdays*24*60*60*1000));
var expires = "expires="+d.toGMTString();
document.cookie = cname + "=" + cvalue + "; "+ expires;
}
function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}
   function validateEmail(email)
{
 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 if (reg.test(email))
 {
 return true; }
 else{
 return false;
 }
} 
	    $("#test-form").validate({        
        submitHandler: function(form) {
            //form.submit();
            	var email=$("#email").val();
  	            var name = $("#fullname").val();
  	        if(name=="" && email=='' )
  	        {
  	        	$('#valid').css("display","none");
  	            $('#emptyname').css("display","none");
  	        	$('#empty').css("display","none");
  	        		$('#emptyboth').css("display","block");
  	        		return false;
  	        }   
  	      
  	      else if(email=='' )
  	        {
  	        	//$('#usercheck').css("display","none");
  	        	$('#valid').css("display","none");
  	        	$('#emptyboth').css("display","none");
  	        	$('#emptyname').css("display","none");
  	        	$('#empty').css("display","block");
  	        	return false;
  	        }
  else if(name=="")	 
   {
  	        	//$('#usercheck').css("display","none");
  	        	$('#valid').css("display","none");
  	        	$('#emptyboth').css("display","none");
  	        	$('#emptyname').css("display","block");
  	        	$('#empty').css("display","none");
  	        	return false;
  	        }
  	       
  	        
  	        else if(name!="" && email!='' )
  	        {
  	        		   if (!(validateEmail(email))) {
  	         	$('#empty').css("display","none");
  	         	$('#emptyboth').css("display","none");
  	        	$('#emptyname').css("display","none");
  	        	$('#valid').css("display","block");
 return false;
 }
 
 else {
  	        	
            $.ajax({
            url: "signup.php",
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
            	if(response=='success')
            	{
            	$('h4').append("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='mailsuc' style='color: red;' >Email Sent </span>");
            	
    setCookie('signedup',1,180);
    
 setTimeout(function () {
 	$.magnificPopup.close();
 	$("#email").val('');
    $("#mailsuc").text('');
    
  	        	$('#empty').css("display","none");
  	        	
 }, 2000);
            }
            else{
  $('h4').append("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id='mailsuc' style='color: red;' >Email not sent </span>"); 	
            }
            }            
        });
}
  	        }  
  	            
  	        
        }
    });

  });
</script> 
<!-- Analytics
    ================================================== --> 
<script>
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>
	<script type="text/javascript">
// Use jQuery com a variavel $j(...)
var $j = jQuery.noConflict();
$j(document).ready(function() {
$j(".voltarTopo").hide();
$j(function () {
$j(window).scroll(function () {
if ($j(this).scrollTop() > 300) {
$j('.voltarTopo').fadeIn();
} else {
$j('.voltarTopo').fadeOut();
}
});
$j('.voltarTopo').click(function() {
$j('body,html').animate({scrollTop:0},600);
}); 
    });});	
</script>
