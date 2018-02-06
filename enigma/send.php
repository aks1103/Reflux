<?php 
$errors = '';
$myemail = 'you@yoursite.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
$errors .= "\n Error: Required Field";
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (!eregi(
"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", 
$email))
{
$errors .= "\n Error: Invalid Email Address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "A New Message Awaits: $subject";
$email_body = "You have received a new message. Details are given below.\n Name: $name \n Email: $email \n Message: \n $message";
$headers = "From: $email";

mail($to, $email_subject, $email_body, $headers);
}
?>