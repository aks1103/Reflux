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
$target_dir    = "Poster/";
$target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$name          = $_POST['name'];
$designation   = $_POST['designation'];
$email         = $_POST['email'];
$phone         = $_POST['phone'];
$instiname     = $_POST['instiname'];
$author        = $_POST['author'];
$description   = $_POST['description'];
$field         = $_POST['field'];
//$file=$_FILES['userfile'];
if (isset($_POST['submit'])) {
    if ($name != "" and $email != "" and $designation != "" and $phone != "" and $instiname != "" and $author != "" and $description != "" and $field != "" and $imageFileType!="") {
            $upload_image = $_FILES["fileToUpload"]["name"];
            $folder       = "http://reflux.in/Poster/";
            $insert       = "Insert into poster_submission(Name,Email,Designation,field,Phone,Institue_name,Author,Description,Abstract,names) values('" . $name . "','" . $email . "','" . $designation . "','" . $field . "','" . $phone . "','" . $instiname . "','" . $author . "','" . $description . "','" . $folder .$upload_image. "','" . $_FILES["fileToUpload"]["name"] . "')";
            
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
        echo "<script type='text/javascript'>alert('$message'); window.location = 'http://reflux.in/Poster.html';</script>";
    }
    //echo "<meta http-equiv='refresh' content='0'>";
}
//echo"<h1>Seems you have not entered all details<a href='http://reflux.in/photography.html'>Click to submit again</a></h1>";
?>