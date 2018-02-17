<?php
	
	include('session.php');
	$email = $mysqli_real_escape_string($db,$_POST['email']);
	$quesnum = $mysqli_real_escape_string($db,$_POST['quesnum']);
	$response = $mysqli_real_escape_string($db,$_POST['response']);
	if($email == $login_session){
		$res = "r".$quesnum;
		$sql =  "UPDATE enigma_participants SET $res = $response WHERE email='$email'";
		return $db->query($sql);
	}
?>