if(current_page!='HomePage')
{
	$("#navbar ul a[title=\""+current_page+"\"]").parent().addClass("active");	
}
else
{
	// Animated scrolling on clicking navbar link
	$('#navbar li a').bind('click', function(event) {
		var link = $(this);
		$('html, body').stop().animate({
			scrollTop: $(link.attr('href')).offset().top - 59
		}, 500);
		event.preventDefault();
	});

	// Toggling transparency of navbar on scrolling down in landing page
	if(window.matchMedia("(min-width: 768px)").matches)
	{
		var cbpAnimatedHeader = (function() {
			var docElem = document.documentElement,
				header = document.querySelector( '.navbar-inverse' ),
				didScroll = false,
				changeHeaderOn = 100;
			function init() {
				window.addEventListener( 'scroll', function( event ) {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( scrollPage, 200 );
					}
				}, false );
			}
			function scrollPage() {
				var sy = scrollY();
				if ( sy >= changeHeaderOn )
					$(header).css('background-color','hsla(0,0%,10%,0.9)');
				else
					$(header).css('background-color','hsla(0,0%,10%,0)');
				didScroll = false;
			}
			function scrollY() {
				return window.pageYOffset || docElem.scrollTop;
			}
			init();
		})();
	}
}