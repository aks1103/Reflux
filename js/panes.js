// Activating current selection in listPane
$('.listPane>div>div').click(function(){
	if(!$(this).hasClass('active'))
	{
		$('.listPane>div>div.active').removeClass('active');
		render($(this).attr('data-render'));
	}
});



// Loading content in contentPane
render('menu');
function render(viewpage)
{

	$('.listPane>div>div[data-render="'+viewpage+'"').addClass('active');
	if(window.matchMedia("(max-width:991px)").matches)
	{
		$('.contentPane > div').hide(0);
		$('.contentPane > #'+viewpage).show(0);
		hideMenu();
	}
	else if( viewpage=='menu' )
	{
		$('.contentPane > #'+viewpage).slideDown(500);
	}
	else
	{
		$('.contentPane > div').slideUp(500);
		$('.contentPane > #'+viewpage).delay(500).slideDown(500);
	}
}

// Toggling listPane and contentPane in mobile devices
$('.hamburgerButton').click(function(){
	if( $('.listPane').css('display')=='none' )
		showMenu();
	else
		hideMenu();
});

function showMenu()
{
	// // Without animation
	// $('.contentPane').css('display','none');
	// $('.listPane').css('display','block');

	// With animation
	$('.listPane').css('overflow','hidden');
	$('.listPane').show( 'slow' , function() {
		$('.contentPane').css('display','none');
		$('.listPane').css('overflow','auto');			
	});	
}

function hideMenu()
{
	// // Without animation
	// $('.contentPane').css('display','block');
	// $('.listPane').css('display','none');

	// With animation
	$('.listPane').css('overflow','hidden');
	$('.contentPane').css('display','block');
	$('.listPane').hide('slow',function(){
		$('.listPane').css('overflow','auto');			
	});
}