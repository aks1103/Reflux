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
$target_dir    = "Photography/";
$target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$name          = $_POST['name'];
$designation   = $_POST['designation'];
$email         = $_POST['email'];
$phone         = $_POST['phone'];
$instiname     = $_POST['instiname'];
$caption        = $_POST['caption'];
$description   = $_POST['description'];
$fbId         = $_POST['fbId'];
//$file=$_FILES['userfile'];
if (isset($_POST['submit'])) {
    if ($name != "" and $email != "" and $designation != "" and $phone != "" and $instiname != "" and $caption != "") {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk     = 1;
            $upload_image = $_FILES["fileToUpload"]["name"];
            $folder       = "http://reflux.in/Photography/";
            $insert       = "Insert into photograph_submission(Name,Email,Designation,fbId,Phone,Institute_name,Caption,Description,Photograph,names) values('" . $name . "','" . $email . "','" . $designation . "','" . $fbId . "','" . $phone . "','" . $instiname . "','" . $caption . "','" . $description . "','" . $folder .$upload_image. "','" . $_FILES["fileToUpload"]["name"] . "')";
            
            if ($conn->query($insert) === FALSE) {
                echo "Error: " . $insert . "<br>" . $conn->error;
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 41943040) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
        echo "<script type='text/javascript'>alert('$message'); window.location = 'http://reflux.in/photography.html';</script>";
    }
    //echo "<meta http-equiv='refresh' content='0'>";
}
//echo"<h1>Seems you have not entered all details<a href='http://reflux.in/photography.html'>Click to submit again</a></h1>";
?>