<?php
$servername = "mysql.hostinger.in";
$username   = "u932729557_admin";
$password   = "Aks12345";

// Create connection
$conn = new mysqli($servername, $username, $password, "u932729557_main");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name= mysqli_real_escape_string($conn,$_POST['name']);
$designation= mysqli_real_escape_string($conn,$_POST['designation']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$instiname= mysqli_real_escape_string($conn,$_POST["instiname"]);
$workshop= mysqli_real_escape_string($conn,$_POST['workshop']);


// var_dump($_POST);
// echo $instiname;
// exit();
//$file=$_FILES['userfile'];
if (isset($_POST['submit'])) {
    if ($name != "" and $email != "" and $designation != "" and $phone != "" and $instiname != "" and $workshop!="") {
            $insert       = "Insert into workshop(Name,Email,Designation,Phone,Institute_name,Workshop) values('" . $name . "','" . $email . "','" . $designation . "','" . $phone . "','" . $instiname . "','".$workshop."')";
            if ($conn->query($insert) === FALSE) {
                echo "Error: " . $insert . "<br>" . $conn->error;
            }
            else{
    header("Location:order_workshop.php?id=200&mail=$email&phone=$phone&name=$name");
    exit();
    echo "<script type='text/javascript'>window.location = 'http://reflux.in/';</script>";}
        
    } else {
        $message = "Please enter all * marked details..\\nTry again.";
        echo "<script type='text/javascript'>alert('$message'); window.location = 'http://reflux.in/Workshops.html';</script>";
    }
    
    //echo "<meta http-equiv='refresh' content='0'>";
}
//echo"<h1>Seems you have not entered all details<a href='http://reflux.in/photography.html'>Click to submit again</a></h1>";
?>