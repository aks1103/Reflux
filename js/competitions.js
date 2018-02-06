// // Activating current selection in listPane
// $('.listPane>div>div').click(function(){
// 	if(!$(this).hasClass('active'))
// 	{
// 		$('.listPane>div>div.active').removeClass('active');
// 		render($(this).attr('data-render'));
// 	}
// });



// // Loading content in contentPane
// render('menu');
// function render(viewpage)
// {
// 	$('.listPane>div>div[data-render="'+viewpage+'"').addClass('active');
// 	if(viewpage=='menu')
// 	{
// 		$('.contentPane').load('menu.html');
// 	}
// 	else
// 	{
// 		// $('.contentPane').slideUp( "slow", function() {
// 		// $('.contentPane').hide( "slow", function() {			
// 		$('.contentPane').animate({ height: 'toggle', opacity: 0.25 }, 500, function() {
// 			$('.contentPane').load(viewpage+'.html');
// 			// $('.contentPane').slideDown("slow");
// 			// $('.contentPane').show("slow");
// 			$('.contentPane').animate({ height: 'toggle', opacity: 1 },500);
// 		});
// 	}
// }