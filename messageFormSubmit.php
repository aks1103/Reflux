<?php 
	
	$message = $_POST['message'];
	$subject = $_POST['subject']
	$name = $_POST['name']
	$email = $_POST['email']

	
   	$dbhost = "mysql.hostinger.in";
	$dbuser = "u932729557_admin";
	$dbpass = "Aks12345";
	$dbname = "u932729557_main";

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'INSERT INTO messages2017 '.
      '(Name, Subject, Email, Message) '.
      'VALUES ($name, $subject, $email, $message)';
      
   mysql_select_db($dbname);
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);

?>