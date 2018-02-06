<?php
	include("config.php");
	include("index.php");
   session_start();  
   $message = NULL;

	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET)){

		$email = $_GET['e'];
		$confirm = $_GET['c'];

		$sql = 'SELECT id FROM participants WHERE email = "'.$email.'" AND isActive = "'.$confirm.'"';
   
   		$retval = $db->query($sql);

	   if ($retval->num_rows == 1) {
	      while($row = $retval->fetch_assoc()) {
	          $id = $row["id"];  
	          
	          $sql = 'UPDATE enigma_participants SET isActive = 1 WHERE id = "'.$id.'"';

	          if ($db->query($sql) === TRUE) {

	          	$message = "Email Confirmed Sucessfully. <a href='http://quiz.reflux.in/login.php'>Click Here to proceed for payment</a>";

	          }else{

	              $message = "Error  in connection. Try again.";
	              exit();

	          }
		}
	}else{
		$message = "Confirmaton link is invalid";

	}
}

?>