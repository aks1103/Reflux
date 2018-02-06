<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	
   	$dbhost = "mysql.hostinger.in";
	$dbuser = "u932729557_admin";
	$dbpass = "Aks12345";
	$dbname = "u932729557_main";

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   
   $sql = 'INSERT INTO messages2017 '.
      '(Name, Subject, Email, Message) '.
      'VALUES ("' . $name . '","' . $subject . '","' . $email . '","' . $message . '")';
      

   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}else{
	echo "Please submit the form from authenticated sources.";
}
?>