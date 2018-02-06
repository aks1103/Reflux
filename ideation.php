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
$target_dir    = "ideation/";
$target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$name1         = $_POST['name1'];
$name2         = $_POST['name2'];
$designation   = $_POST['designation'];
$email         = $_POST['email'];
$phone         = $_POST['phone'];
$instiname     = $_POST['instiname'];
if (isset($_POST['submit'])) {
    if ($name1 != "" and $email != "" and $designation != "" and $phone != "" and $instiname != ""  and $imageFileType!="") {
            $upload_image = $_FILES["fileToUpload"]["name"];
            $folder       = "http://reflux.in/ideation/";
            $insert       = "Insert into ideation(Name_1,Name_2,Email,Designation,Phone,Institute_name,Doc_link,names) values('" . $name1 . "','" . $name2 . "','" . $email . "','" . $designation . "','" . $phone . "','" . $instiname . "','" . $folder.$upload_image. "','" . $_FILES["fileToUpload"]["name"] . "')";
            
            if ($conn->query($insert) === FALSE) {
                echo "Error: " . $insert . "<br>" . $conn->error;
            }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 52428800) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                
            }
            
            
        }
        
    } else {
        $message = "Sorry, there was an error uploading your file. Please enter all * marked details..\\nTry again.";
        echo "<script type='text/javascript'>alert('$message'); window.location = 'http://reflux.in/ideation.html';</script>";
    }
    //echo "<meta http-equiv='refresh' content='0'>";
}
//echo"<h1>Seems you have not entered all details<a href='http://reflux.in/photography.html'>Click to submit again</a></h1>";
?>