        $(document).ready(function(){
 
	$('.arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		},3000);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.arriba').slideDown(300);/*tiempo que tarda la animacion*/
		} else {
			$('.arriba').slideUp(300);
		}
	});
 
});

/*SLIDE  NUEVO*/


