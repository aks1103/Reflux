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
	else if( document.querySelector('#dateFrom').value=='choose' || document.querySelector('#dateTill').value=='choose' )
	{
		alert("Please choose the stay duration dates");
	}
	else
	{
		$('input[type="submit"]').val('Sending...');
        $('input[type="submit"]').attr('disabled','true');

		var name = $('input[name="name"]').val();
		var institute = $('input[name="institute"]').val();
		var email = $('input[name="email"]').val();
		var phone = $('input[name="phone"]').val();
		var dateFrom = document.querySelector('#dateFrom').value;
		var dateTill = document.querySelector('#dateTill').value;

		var data = new FormData();
		data.append('name', name);
		data.append('institute', institute);
		data.append('email', email);
		data.append('phone', phone);
		data.append('dateFrom', dateFrom);
		data.append('dateTill', dateTill);
		xhr = new XMLHttpRequest();
		xhr.open('POST', "submit.php", true);
		xhr.send(data);
		xhr.onreadystatechange = function(ev) {
			if (xhr.readyState == 4 && xhr.status == 200) {
				$('input[type="submit"]').val('Finish').removeAttr('disabled');
				if(xhr.responseText=="Your entry has been submitted")
					window.location = "./?p=success";
				else
					alert(xhr.responseText);
			}
		};
		
		$.post("https://docs.google.com/forms/d/1NMDX1RdWGrEPMLPv8nJarnDT88kMLP0m9lj9HpoR7N8/formResponse",{
			"entry_1659868547": name,
			"entry_2139297191": institute,
			"entry_279716224": email,
			"entry_1140172061": phone,
			"entry_1180465123": dateFrom,
			"entry_444265427": dateTill
		},function(data,status){
			// if (status == 200) {
			// 	alert("Your response has been recorded. Please make sure to email us your tickets to confirm your stay");
			// 	$('input[type="submit"]').val('Finish').removeAttr('disabled');
			// }
			// else {
			// 	alert("Oops! Looks like somethng went wrong. If it doesn't works even after some time, please tell us through our 'Contact us' form on home page");
			// 	$('input[type="submit"]').val('Finish').removeAttr('disabled');
			// }
		});
	}
});