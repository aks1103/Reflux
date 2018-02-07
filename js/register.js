$('input[name="teamsize"]').click(function(event) {
	if(team_size=="variable")
	{
		if($(this).val()=="teamsize1")
		{
			$('.member-group').eq(0).show();
			$('.member-group').eq(1).hide();
			if(current_section=="paper_presentation"||current_section=="exhibition")
				$('.member-group').eq(2).hide();
		}
		else if($(this).val()=="teamsize2")
		{
			$('.member-group').eq(0).show();
			$('.member-group').eq(1).show();
			if(current_section=="paper_presentation"||current_section=="exhibition")
				$('.member-group').eq(2).hide();
		}
		else if($(this).val()=="teamsize3")
		{
			$('.member-group').eq(0).show();
			$('.member-group').eq(1).show();
			$('.member-group').eq(2).show();
		}		
	}
});

singleFileFormList = ["case_study","green_tech","paper_presentation","poster_presentation","process_design","exhibition"];

$('input[type="submit"]').click(function(){
	if(team_size=="variable")
	{
		switch($('input[type="radio"]:checked').val())
		{
			case "teamsize1": teamsize = 1; break;
			case "teamsize2": teamsize = 2; break;
			case "teamsize3": teamsize = 3; break;
			default: teamsize = 0; break;
		}
		if($('input[type="radio"]:checked').val()==undefined || teamsize==0)
		{
			showError("Please select a team size and fill all the details");
		}
		else
		{
			filled = 1;
			memberArr = document.querySelectorAll('.member-group');
			for(var i=0;i<teamsize;i++)
			{
				inputArr = memberArr[i].querySelectorAll('input');
				for(var j=0;j<inputArr.length;j++)
				{
					if(inputArr[j].value==undefined || inputArr[j].value=='')
						filled = 0;
				}
			}
			if(filled==1)
			{
				switch(current_section)
				{
					case "exhibition"			: extraFields = ['institute','teamname']; break;
					case "case_study"			: extraFields = ['institute']; break;
					case "quiz_enigma"			: extraFields = ['institute','teamname']; break;
					case "green_tech"			: extraFields = ['institute']; break;
					case "ideation"				: extraFields = ['institute']; break;
					case "paper_presentation"	: extraFields = ['institute','title']; break;
					case "poster_presentation"	: extraFields = ['institute','title']; break;
					case "process_design"		: extraFields = ['institute']; break;
					default						: extraFields = [];
				}

				for(var i=0;i<extraFields.length;i++)
				{
					if( $('input[name="'+extraFields[i]+'"]').val()==undefined || $('input[name="'+extraFields[i]+'"]').val()=='' )
						filled = 0;
				}
			}

			if(filled==0)
			{
				showError("All fields are necessary");
			}
			else if( (singleFileFormList.indexOf(current_section)>-1) && (document.querySelector('input[name="file"]').files==undefined || document.querySelector('input[name="file"]').files.length!=1) )
			{
				switch(current_section)
				{
					case "exhibition"			: showError("Oops! You forgot to upload your project's details file"); break;
					case "case_study"			: showError("Oops! You forgot to upload your presentation file"); break;
					case "green_tech"			: showError("Oops! You forgot to upload your abstract file (word/PDF)"); break;
					case "paper_presentation"	: showError("Oops! You forgot to upload your abstract file"); break;
					case "poster_presentation"	: showError("Oops! You forgot to upload your abstract file"); break;
					case "process_design"		: showError("Oops! You forgot to upload your solution file (word/PDF)"); break;
					default						: showError("Oops! You forgot to upload the mentioned file");
				}
			}
			else if( (current_section=="ideation") && (document.querySelector('input[name="doc"]').files==undefined || document.querySelector('input[name="doc"]').files.length!=1 || document.querySelector('input[name="image"]').files==undefined || document.querySelector('input[name="image"]').files.length!=1) )
			{
				showError("You must upload the Answers file as well as Image file as mentioned in the rules to complete your submission");
			}
			else
			{
				$('input[type="submit"]').val('Sending...');
		        $('input[type="submit"]').attr('disabled','true');

				var membersList = [];
				var members = "";
				for(var i=0;i<teamsize;i++)
				{
					var thisname = memberArr[i].querySelector('input[name="name'+(i+1)+'"]').value;
					var thisdsgn = memberArr[i].querySelector('input[name="designation'+(i+1)+'"]').value;
					var thisemail = memberArr[i].querySelector('input[name="email'+(i+1)+'"]').value;
					var thisphone = memberArr[i].querySelector('input[name="phone'+(i+1)+'"]').value;
					members += thisname+'#'+thisdsgn+'#'+thisemail+'#'+thisphone+'##';
					membersList[i*4] = thisname;
					membersList[i*4+1] = thisdsgn;
					membersList[i*4+2] = thisemail;
					membersList[i*4+3] = thisphone;
				}
				for(var i=teamsize;i<3;i++)
				{
					membersList[i*4] = "";
					membersList[i*4+1] = "";
					membersList[i*4+2] = "";
					membersList[i*4+3] = "";
				}

				var data = new FormData();
				data.append('teamsize', teamsize);
				data.append('members', members);
				for(var i=0;i<extraFields.length;i++)
					data.append(extraFields[i], $('input[name="'+extraFields[i]+'"]').val());
				
				if(singleFileFormList.indexOf(current_section)>-1)
				{
					file = document.querySelector('input[name="file"]').files[0];
					data.append('file', file);
				}
				else if(current_section=="ideation")
				{
					doc = document.querySelector('input[name="doc"]').files[0];
					image = document.querySelector('input[name="image"]').files[0];
					data.append('doc', doc);
					data.append('image', image);
				}

				xhr = new XMLHttpRequest();
				switch(current_section)
				{
					case "case_study"			: xhr.open('POST', "submit/case_study.php", true); break;
					case "quiz_enigma"			: xhr.open('POST', "submit/quiz_enigma.php", true); break;
					case "green_tech"			: xhr.open('POST', "submit/green_tech.php", true); break;
					case "ideation"				: xhr.open('POST', "submit/ideation.php", true); break;
					case "paper_presentation"	: xhr.open('POST', "submit/paper_presentation.php", true); break;
					case "poster_presentation"	: xhr.open('POST', "submit/poster_presentation.php", true); break;
					case "process_design"		: xhr.open('POST', "submit/process_design.php", true); break;
					case "exhibition"			: xhr.open('POST', "submit/exhibition.php", true); break;
				}
				xhr.send(data);
				xhr.onreadystatechange = function(ev){
					if (xhr.readyState == 4 && xhr.status == 200) {
					$('input[type="submit"]').val('Submit').removeAttr('disabled');
					if(xhr.responseText=="Your entry has been submitted")
						window.location = "./?section=success";
					else
						showError(xhr.responseText);
				}
				};

				if(current_section=="quiz_enigma")
				{
					$.post("https://docs.google.com/forms/d/1sumugU0KPKLuk4mpvWLYAzM6I2VsWjqo2ae-hgKinYI/formResponse",{
						"entry_2013780093": $('input[name="'+extraFields[0]+'"]').val(),
						"entry_932404315": $('input[name="'+extraFields[1]+'"]').val(),
						"entry_124857834": teamsize,
						"entry_505569332": membersList[0],
						"entry_606132335": membersList[1],
						"entry_1085575417": membersList[2],
						"entry_1002269608": membersList[3],
						"entry_1604131149": membersList[4],
						"entry_1341667783": membersList[5],
						"entry_1100920946": membersList[6],
						"entry_2433341": membersList[7]
					},function(data,status){
					});
				}
				else if(current_section=="paper_presentation")
				{
					$.post("https://docs.google.com/forms/d/1IAc-yhID9-9f2bKqzcvh2POhHs0lYfTe4th4hMBT5rE/formResponse",{
						"entry_1957462874": $('input[name="'+extraFields[0]+'"]').val(),
						"entry_1317044551": $('input[name="'+extraFields[1]+'"]').val(),
						"entry_269982350": teamsize,
						"entry_1111630902": membersList[0],
						"entry_987292629": membersList[1],
						"entry_1542855503": membersList[2],
						"entry_418982562": membersList[3],
						"entry_1017551745": membersList[4],
						"entry_47731258": membersList[5],
						"entry_1599760786": membersList[6],
						"entry_370309636": membersList[7],
						"entry_1205215648": membersList[8],
						"entry_522758272": membersList[9],
						"entry_853166458": membersList[10],
						"entry_1426810962": membersList[11]
					},function(data,status){
					});
				}
				else if(current_section=="poster_presentation")
				{
					$.post("https://docs.google.com/forms/d/1sx0yZ9uzIzskf6gFK8iBAYqrhVz2sxDOKHPANBgs70s/formResponse",{
						"entry_488163990": $('input[name="'+extraFields[0]+'"]').val(),
						"entry_84560554": $('input[name="'+extraFields[1]+'"]').val(),
						"entry_1309033275": teamsize,
						"entry_1479260346": membersList[0],
						"entry_1848336788": membersList[1],
						"entry_870494792": membersList[2],
						"entry_1376323686": membersList[3],
						"entry_769081973": membersList[4],
						"entry_464161855": membersList[5],
						"entry_1215864990": membersList[6],
						"entry_2027332289": membersList[7]
					},function(data,status){
					});
				}
			}
		}
	}
	else if(team_size=="single")
	{
		filled = 1;
		if( $('input[name="name"]').val()==undefined || $('input[name="name"]').val()=='' )
			filled = 0;
		else if( $('input[name="designation"]').val()==undefined || $('input[name="designation"]').val()=='' )
			filled = 0;
		else if( $('input[name="email"]').val()==undefined || $('input[name="email"]').val()=='' )
			filled = 0;
		else if( $('input[name="phone"]').val()==undefined || $('input[name="phone"]').val()=='' )
			filled = 0;
		else if( $('input[name="institute"]').val()==undefined || $('input[name="institute"]').val()=='' )
			filled = 0;
		else if( (current_section=="photography") && ($('input[name="caption"]').val()==undefined || $('input[name="caption"]').val()=='' ) )
			filled = 0;

		if(filled==0)
		{
			showError("All (*) marked fields are necessary");
		}
		else if( (current_section=="photography") && (document.querySelector('input[name="file"]').files==undefined || document.querySelector('input[name="file"]').files.length!=1 ) )
		{
			showError("What good is your entry without uploading the photograph? Please choose your image file to make your submission.");
		}
		else
		{
			$('input[type="submit"]').val('Sending...');
	        $('input[type="submit"]').attr('disabled','true');
		        
			var name = $('input[name="name"]').val();
			var designation = $('input[name="designation"]').val();
			var email = $('input[name="email"]').val();
			var phone = $('input[name="phone"]').val();
			var institute = $('input[name="institute"]').val();
			if(current_section=="photography")
			{
				var caption = $('input[name="caption"]').val();
				var description = $('input[name="description"]').val();
				var fb = $('input[name="fb"]').val();
				var file = document.querySelector('input[name="file"]').files[0];
			}
			else if(current_section=="workshops")
			{
				workshopsData = {};
				$('.custom-checkbox').each(function(){
					wName = $(this).attr('data-workshopName');
					if($(this).hasClass('checked'))
						workshopsData[wName] = "yes";
					else
						workshopsData[wName] = "no";
				});

				workshopsList = "";
				var listCount = 0;
				$('.custom-checkbox.checked').each(function(){
						workshopsList += ($(this).attr('data-workshopName'))+'##';
						listCount++;
				});
			}

			var data = new FormData();
			data.append('name', name);
			data.append('designation', designation);
			data.append('email', email);
			data.append('phone', phone);
			data.append('institute', institute);
			if(current_section=="photography")
			{
				data.append('caption', caption);
				data.append('description', description);
				data.append('fb', fb);
				data.append('file', file);
			}
			else
			{
				data.append('workshopsList', workshopsList);
			}

			xhr = new XMLHttpRequest();
			if(current_section=="photography")
			{
				xhr.open('POST', "submit/photography.php", true);
				xhr.send(data);
			}
			else if(current_section=="workshops")
			{
				xhr.open('POST', "submit/workshops.php", true);
				xhr.send(data);
			}
			xhr.onreadystatechange = function(ev) {
				if (xhr.readyState == 4 && xhr.status == 200) {
					$('input[type="submit"]').val('Submit').removeAttr('disabled');
					if(xhr.responseText=="Your entry has been submitted")
						window.location = "./?section=success";
					else
						showError(xhr.responseText);
				}
			};

			if(current_section=="workshops")
			{
				$.post("https://docs.google.com/forms/d/1JkI3TaOFSU9nx1JHyq3ANw_Y_kfw7D7fKaxBr69Y0c0/formResponse",{
					"entry_328861191": name,
					"entry_1385533341": designation,
					"entry_1952650731": email,
					"entry_785965880": phone,
					"entry_1390917751": institute,
					"entry_1514702468": workshopsData['aspen'],
					"entry_1559258485": workshopsData['comsol'],
					"entry_1492712253": workshopsData['cadwork'],
					"entry_715183686": workshopsData['namd']
				},function(data,status){
				});
			}
		}
	}
});

function showError(message)
{
	$('#messageNotice .msg').html(message);
	$('#messageNotice').slideDown("fast");
}

$('.custom-checkbox').click(function(){
	if(!$(this).hasClass('checked'))
	{
		var day = $(this).attr('data-day');
		$('.custom-checkbox').each(function(){
			if($(this).attr('data-day')==day)
				$(this).removeClass('checked');
		});
	}
	$(this).toggleClass('checked');
});