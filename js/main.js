// Full heigth of intro section
if( parseInt($('#home > div').css('height')) < window.innerHeight-60 )
    $('#home > div').css('height',window.innerHeight-60);

// Animated typing
$(function(){
    $("#typed-events").typed({
        stringsElement: $('#typed-events-strings'),
        typeSpeed: 0,
        loop: true
    });
    $("#typed-competitions").typed({
        stringsElement: $('#typed-competitions-strings'),
        typeSpeed: 0,
        loop: true
    });
});



// Carousel speed
$('.carousel').carousel({
  interval: 3000
});


// Leave message
$('#contact #submit').click(function(){
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var message = document.getElementById('message');
    if(name.value==''||email.value==''||phone.value==''||message.value=='')
    {
        $('#messageError .msg').html('All fields are neccessary');
        // $('#messageError').slideDown("fast");
    }
    else
    {
        $('#submit').val('Sending...');
        $('#submit').attr('disabled','true');

        $.post('ajax/message.php',{
            name: name.value,
            email: email.value,
            phone: phone.value,
            message: message.value
        },function(data,status) {
            var responseMsg = $('response',data).text();
            if(responseMsg=='OK')
            {
                // $('#submit').removeClass('btn-warning').addClass('btn-success').val('Your message was successfully recorded');                
                $('#messageNotice .msg').html('Your message was successfully recorded');
                $('#messageNotice .alert').removeClass('alert-danger').addClass('alert-success');
                $('#messageNotice').slideDown('fast').delay(8000).slideUp('fast');
            }
            else
            {
                // $('#submit').removeClass('btn-warning').addClass('btn-danger').val(responseMsg); 
                $('#messageNotice .msg').html(responseMsg);
                if($('#messageNotice .alert').hasClass('alert-success'))
                    $('#messageNotice .alert').removeClass('alert-success').addClass('alert-danger');
                $('#messageNotice').slideDown('fast').delay(8000).slideUp('fast');
            }
            // $('#submit').delay(8000).removeClass('btn-success btn-danger').addClass('btn-warning').val('Send Message').removeAttr('disabled');
            $('#submit').val('Send Message').removeAttr('disabled');
        });
    }
});