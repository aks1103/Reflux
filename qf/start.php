<?php
   include('session.php');


   $sql = "SELECT isStarted FROM enigma_participants WHERE email = '$login_session'";
   $isStarted = 1;
   $retval = $db->query($sql);
    if($retval->num_rows > 0 ){

    	$row = $retval->fetch_assoc();
    	$isStarted = $row['isStarted'];


    }else{
    	echo "Invalid credentials or session expired.";
    }


    if($isStarted == 0 )
{
   $numbers = range(1, 150);
	shuffle($numbers);
    

    $numbers2 = range(1, 68);
	shuffle($numbers2);

  


	$email = $_SESSION['login_user'];


	$sql = "UPDATE enigma_participants SET ";

	for($i=1;$i<=40;$i++){

		$index = $i-1;
		$sql .= " q$i = $numbers[$index] , ";

	}

	for($i=41;$i<=45;$i++){

		$index = $i-1;
		$sql .= " q$i = $numbers[$index] , ";

	}
	

	$sql .= " isStarted = 1 WHERE email = '$email'";


	$db->query($sql);

	header("location:quiz.php");
	exit();



}else{
	
	header("location:quiz.php");
}
?>