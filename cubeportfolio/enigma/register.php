<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("config.php");
session_start(); //starts new or resume the session. 
require 'PHPMailerAutoload.php'; 

if(time() < 1489753) //comment
{

   //echo <<<DET
  //   <title>Reflux | Quiz</title>
  //   <style>
  //   body { text-align: center; padding: 150px; }
  //   h1 { font-size: 50px; }
  //   body { font: 20px Helvetica, sans-serif; color: #333; }
  //   article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  //   a { color: #dc8100; text-decoration: none; }
  //   a:hover { color: #333; text-decoration: none; }
  //   </style>

  //   <article>
  //   <h1>Coming Soon</h1>
  //   <div>
  //   <p>Paheli the Online Quiz Module of Reflux will start on 17th and 18th March between 6pm to 10pm. For any other query you can <a href="mailto:ankit.ks@iitg.ernet.in">contact us. </a>Stay Tuned with other updates of Reflux!</p>
  //   <p>&mdash; The Team Reflux</p>
  //   </div>
  //   </article>
  // DET;

  exit();
}

$state = 0; //initialize state variable to 0
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){

  $state = 1; //change state to 1 if server request method is post.
  $name  = mysqli_real_escape_string($db,$_POST['name']);//store the name entered by user in $name
  $phone = mysqli_real_escape_string($db,$_POST['phone']);
  $email = mysqli_real_escape_string($db,$_POST['email']);


  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error); //if connection error quit the script and print connection failed.
  } 

  $sql = 'INSERT INTO enigma_participants '.'( name, email, phone ) '.'VALUES ("' . $name . '","' . $email . '","' . $phone . '")';//add a new row to the table enigma_participants with provided data.


  if ($db->query($sql) === TRUE) {


   $sql = 'SELECT id  FROM enigma_participants WHERE email = "'.$email.'"';
   $retval = $db->query($sql); //comment
   if ($retval->num_rows == 1)//checks only one registration with an email id
   {
    while($row = $retval->fetch_assoc()) {
      $id = $row["id"];
      $confirm = ""; //initialise to empty string
      for($i=0;$i<10;$i++){
        $confirm .= mt_rand(1,9);

      }//created a random 10 digit string for confirmation mail

      function randomPassword($length,$count, $characters) {

              // $length - the length of the generated password
              // $count - number of passwords to be generated
              // $characters - types of characters to be used in the password

              // define variables used within the function    
        $symbols = array();//initialized to be empty array
        $passwords = array();
        $used_symbols = '';
        $pass = '';

              // an array of different character types    
        $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
        $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols["numbers"] = '1234567890';
        $symbols["special_symbols"] = '!?~@#-_+<>[]{}';

        $characters = explode(",", $characters); // get characters types to be used for the passsword ,convert string to array
        foreach ($characters as $key=>$value) {
          $used_symbols .= $symbols[$value]; // build a string with all characters
        }
        $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1

        for ($p = 0; $p < $count; $p++) {
          $pass = '';
          for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$n]; // add the character to the password string
          }
          $passwords[] = $pass;
        }

        return $passwords; // return the generated password
      }

      $pass = randomPassword(6,1,"lower_case,upper_case,numbers");



      $confirmlink = "http://enigma.reflux.in/confirm.php?e=$email&c=$confirm";

      $sql = 'UPDATE enigma_participants SET isActive ="'.$confirm.'" , password = "'.$pass[0].'" WHERE id = "'.$id.'"';

      if ($db->query($sql) === TRUE) {

      }else{

        echo "Email not valid or try again later.";
        exit();

      }


      $mail = new PHPMailer;

          //$mail->SMTPDebug = 3;                               // Enable verbose debug output
      $mail->Host = "smtp.gmail.com";                      // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'bhuvan1515@gmail.com';                 // SMTP username
      $mail->Password = '9557367582';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('bhuvan1515@gmail.com', 'Reflux');
      $mail->addAddress($email, $name);     // Add a recipient


      $mail->Subject = 'Reflux : Confirmation Link';
      $mail->Body    = 'Please follow this link to confirm your account for reflux quiz. '. $confirmlink.' Once confirmed login with email: '.$email.' and password: '.$pass[0];

      if(!$mail->send()) {
        echo "$email";
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
       echo "Confirmation Mail is send to your account. Confirm your account.";
       exit();
     }



   }

 }
}else {
  echo "Email Already Registered or Error in Connection. Please try Again.";
  exit();
}


if($state == 2){
  echo "Account Registration failed";
  exit();
}
$db->close();

exit();

}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Reflux | Quiz</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="register-logo">
<img src="ref2018.png" style="width: 13vw;" />
</div>

<div class="register-box-body">
<p class="login-box-msg">Register a new membership</p>

<form action="" method="post">
<div class="form-group has-feedback">
<input name="name" type="text" class="form-control" placeholder="Full name">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input name="email" type="email" class="form-control" placeholder="Email">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input name="phone" type="number" class="form-control" placeholder="Contact No.">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>

<div class="row">
<div class="col-xs-8">
<div class="checkbox icheck">
<label>
<input type="checkbox"> I agree to the terms</a>
</label>
</div>
</div>
<!-- /.col -->
<div class="col-xs-4">
<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
</div>
<!-- /.col -->
</div>
</form>



<a href="login.php" class="text-center">Already Registered for the quiz.</a>
</div>
<!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
});
</script>
</body>
</html>
