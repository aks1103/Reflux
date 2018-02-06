$(".accordion").accordion( { 
	heightStyle: "content"
});

function showOrganiser(id,num)
{
	$('#'+id).accordion({ 
		active: num
	});
}