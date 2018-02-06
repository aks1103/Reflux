<?php
	
	include('session.php');

	$email = $_POST['email'];
	$quesnum = $_POST['quesnum'];
	$response = $_POST['response'];

	if($email == $login_session){

		$res = "r".$quesnum;

		$sql =  "UPDATE participants SET $res = $response WHERE email='$email'";
		return $db->query($sql);

	}
//echo "running";
?>