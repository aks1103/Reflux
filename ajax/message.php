<?php

	require '../db/dbconf.php';

	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
	echo '<response>';
	
	if( @mysql_connect($db_host,$db_username,$db_password) && @mysql_select_db($db_name) )
	{
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$message = mysql_real_escape_string($_POST['message']);

		$query = "INSERT INTO `messages` (`name`,`email`,`phone`,`message`) VALUES ('$name','$email',$phone,'$message')";
		// echo "$query";
		if(mysql_query($query))
			echo 'OK';
		else
			echo 'Error occurred while storing your message. Sorry for the inconvenience';
	}
	else
		echo 'Error occurred while recording your message. Sorry for the inconvenience';

	echo '</response>';
?>