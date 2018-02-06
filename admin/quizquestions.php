<?php
   include("session.php");

  
  $dbhost = "mysql.hostinger.in";
  $dbuser = "u932729557_admin";
  $dbpass = "Aks12345";
  $dbname = "u932729557_main";

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  

   $sql = 'SELECT id FROM quiz_questions WHERE 1';
   
   $retval = $conn->query($sql);

      

if ($retval->num_rows > 0) {
    while($row = $retval->fetch_assoc()) {
        $id = $row["id"];

        echo <<<HEL
        <a href="questions.php?num=$id&v=view">$id</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
HEL;

    }
} else {
    echo "0 results found";
}



$conn->close();

?>