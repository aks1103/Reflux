<?php

include "../embeds/settings.php";

if($accomodation_closed==false)
{
	$name = trim(strip_tags($_POST["name"]));
	$institute = trim(strip_tags($_POST["institute"]));
	$email = trim(strip_tags($_POST["email"]));
	$phone = trim(strip_tags($_POST["phone"]));
	$dateFrom = trim(strip_tags($_POST["dateFrom"]));
	$dateTill = trim(strip_tags($_POST["dateTill"]));
	$uid = md5(time());
	$eol = PHP_EOL;

	$email_to = "reflux.iitg@gmail.com";
	$email_from = "submissions@reflux.in";
	$email_reply = "nitish@reflux.in";
	$email_subject = "Accomodation entry";
	$email_msg = "Name: $name\nInstitute: $institute\nEmail: $email\nPhone: $phone\nStaying from: $dateFrom\nStaying till: $dateTill\n";

	$email_headers  = "From: $email_from".$eol;
	$email_headers .= "Reply-To: $email_reply".$eol;
	$email_headers .= "MIME-Version: 1.0".$eol;
	$email_headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"".$eol;

	$email_body  = "--".$uid."\r\n";
	$email_body .= "Content-Type: text/plain; charset=\"iso-8859-1\"".$eol;
	$email_body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
	$email_body .= $email_msg.$eol;
	$email_body .= "--".$uid."--\r\n";

	// echo $email_headers."\n";
	// echo $email_body."\n";

	$mail_sent = @mail($email_to,$email_subject,$email_body,$email_headers);
	echo $mail_sent ? "Your entry has been submitted" : "Sorry! We are unable to submit your entry at the present.";
}

?>