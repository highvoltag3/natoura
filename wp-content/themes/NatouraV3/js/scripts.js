$(document).ready(function(){
	//Launch fancyboxes
		$("a.iframe").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe'
		});
			
		$("a.inline").fancybox({});
		
		$("a#link_mapa").fancybox({});
		
		$("a.fotos_tour").fancybox({});
		
		$(".entry img").fancybox({});

	
		
	//colapsador para el sidebar (destinos)
	  //hide the all of the element with class msg_body
	  $(".categoria_hijos").hide();
	  //toggle the componenet with class msg_body
	  $(".categoria_padre").click(function()
	  {
	    $(this).nextUntil(".categoria_padre").slideToggle(300);
	  });
	  
    //Forms
    $("textarea, select, input:checkbox, input:radio, input:file, input").uniform();
    
    
    //Detalles...
    $("#content .post:last").css('border-bottom','none');
		
		
});