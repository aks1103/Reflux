<?php

	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
	echo '<response>';

	session_start();
	if( isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) )
	{
		$username_hash = md5('reflux_team');
		$password_hash = md5('pwdadmin');
		// echo $_POST['username']." -- ".$username_hash.' || ';
		// echo $_POST['password']." -- ".$password_hash;
		if( $_POST['username']==$username_hash && $_POST['password']==$password_hash )
		{
			$_SESSION['username'] = 'reflux_team';
			echo '<status>right</status>';
		}
		else
			echo '<status>wrong</status>';
	}

	echo '</response>';
?>