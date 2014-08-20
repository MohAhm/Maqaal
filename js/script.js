/* Meny */
$(document).ready(function() {
	$(window).scroll(function() {
		if($(window).scrollTop() >= 100) {

			$('#meny').css('padding', '0px 0');
			$('h1 img').attr('src', "img/logo2.png" );    

		} else {

			$('#meny').css('padding', '5px 0 30px 0');
			$('h1 img').attr('src', "img/logo.png" );

		}
	});
});



/* Alert */
$(function() {
	$('h4.error').hide().fadeIn(700);
	$('<span class="exit">&#x2612;</span>').appendTo('h4.error');

	$('span.exit').click(function() {
		$(this).parent('h4.error').fadeOut('slow');
	});
});
