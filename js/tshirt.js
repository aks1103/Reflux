// $('#showFormBtn').click(function(){
// 	$('#form').slideDown('slow');
// });

$('input[type="submit"]').click(function() {
	filled = 1;
	if( $('input[name="name"]').val()==undefined || $('input[name="name"]').val()=='' )
		filled = 0;
	else if( $('input[name="institute"]').val()==undefined || $('input[name="institute"]').val()=='' )
		filled = 0;
	else if( $('input[name="email"]').val()==undefined || $('input[name="email"]').val()=='' )
		filled = 0;
	else if( $('input[name="phone"]').val()==undefined || $('input[name="phone"]').val()=='' )
		filled = 0;

	if(filled==0)
	{
		alert("All (*) marked fields are necessary");
	}
	else if( document.querySelector('input[name="file"]').files==undefined || document.querySelector('input[name="file"]').files.length!=1 )
	{
		alert("Please upload the image file of your design to make your entry");
	}
	else
	{
		$('input[type="submit"]').val('Sending...');
        $('input[type="submit"]').attr('disabled','true');

		var name = $('input[name="name"]').val();
		var institute = $('input[name="institute"]').val();
		var email = $('input[name="email"]').val();
		var phone = $('input[name="phone"]').val();
		var fb = $('input[name="fb"]').val();
		var file = document.querySelector('input[name="file"]').files[0];

		var data = new FormData();
		data.append('name', name);
		data.append('institute', institute);
		data.append('email', email);
		data.append('phone', phone);
		data.append('fb', fb);
		data.append('file', file);
		xhr = new XMLHttpRequest();
		xhr.open('POST', "submit.php", true);
		xhr.send(data);
		xhr.onreadystatechange = function(ev) {
			if (xhr.readyState == 4 && xhr.status == 200) {
				alert(xhr.responseText);
				$('input[type="submit"]').val('Finish').removeAttr('disabled');
			}
		};
		// $.post("https://docs.google.com/forms/d/1IAc-yhID9-9f2bKqzcvh2POhHs0lYfTe4th4hMBT5rE/formResponse",{
		// 	"entry_1957462874": institute,
		// 	"entry_1317044551": title,
		// 	"entry_269982350": teamsize,
		// 	"entry_1111630902": membersList[0],
		// 	"entry_987292629": membersList[1],
		// 	"entry_1542855503": membersList[2],
		// 	"entry_418982562": membersList[3],
		// 	"entry_1017551745": membersList[4],
		// 	"entry_47731258": membersList[5],
		// 	"entry_1599760786": membersList[6],
		// 	"entry_370309636": membersList[7],
		// 	"entry_1205215648": membersList[8],
		// 	"entry_522758272": membersList[9],
		// 	"entry_853166458": membersList[10],
		// 	"entry_1426810962": membersList[11]
		// },function(data,status){
		// });
	}
});