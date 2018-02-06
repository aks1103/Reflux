<?php 
	
   	$dbhost = "mysql.hostinger.in";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  

   $sql = 'SELECT * FROM messages2017 WHERE 1';
   
   $retval = $conn->query($sql);
      
  
if ($retval->num_rows > 0) {
    while($row = $retval->fetch_assoc()) {
        echo "Name: " . $row["Name"]. " <br>Email: " . $row["Email"]. "<br>Subject: " . $row["Subject"]. "<br>Message: ". $row["Message"]."<br><br><hr>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>	
