<?php
   include('session.php');

   $sql = "SELECT isStarted FROM participants WHERE email = '$login_session'";
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
   $sql = "SELECT id FROM quiz_questions WHERE level = 1";

   $retval = $db->query($sql);

   $easy_ques = array();
   $temp = array();

   // echo $retval->num_rows;
   if($retval->num_rows > 0){
   	
   		while($row = $retval->fetch_array()){

   			array_push($easy_ques, $row["id"]);
   		}

   		    $ques_key_array = array_rand($easy_ques,15);
   		    for($i=0 ;$i<15 ;$i++){

   		    	array_push($temp, $easy_ques[$ques_key_array[$i]]); 
   		    }

   		    $easy_ques = $temp;

   		// print_r($temp);

   	}

	$sql = "SELECT id FROM quiz_questions WHERE level = 2";

	$retval = $db->query($sql);

	$medium_ques = array();
	$temp = array();

	// echo $retval->num_rows;
	if($retval->num_rows > 0){

	while($row = $retval->fetch_array()){

		array_push($medium_ques, $row["id"]);
	}
	    $ques_key_array = array_rand($medium_ques,15);
   		    for($i=0 ;$i<15 ;$i++){

   		    	array_push($temp, $medium_ques[$ques_key_array[$i]]); 
   		    }

   		    $medium_ques = $temp;
	// print_r($temp);

	}


	$sql = "SELECT id FROM quiz_questions WHERE level = 3";

	$retval = $db->query($sql);

	$hard_ques = array();
	$temp = array();

	// echo $retval->num_rows;
	if($retval->num_rows > 0){

	while($row = $retval->fetch_array()){

		array_push($hard_ques, $row["id"]);
	}
	       $ques_key_array = array_rand($hard_ques,15);
   		    for($i=0 ;$i<15 ;$i++){

   		    	array_push($temp, $hard_ques[$ques_key_array[$i]]); 
   		    }

   		    $hard_ques = $temp;

	// print_r($temp);

	}



	$email = $_SESSION['login_user'];


	$sql = "UPDATE participants SET ";

	for($i=1;$i<=15;$i++){

		$index = $i-1;
		$sql .= " q$i = $easy_ques[$index] , ";

	}

	for($i=16;$i<=30;$i++){

$index = $i-16;
		$sql .= " q$i = $medium_ques[$index] , ";

	}

	for($i=31;$i<=45;$i++){
$index = $i-31;
		$sql .= " q$i = $hard_ques[$index] , ";

	}

	// print_r($easy_ques);
	// print_r($medium_ques);
	// print_r($hard_ques);

	// exit();


	$sql .= " isStarted = 1 WHERE email = '$email'";

	// echo $isStarted;

	// echo $sql;
	
	$db->query($sql);

	header("location:quiz.php");
	exit();



}else{
	
	header("location:quiz.php");
}
?>