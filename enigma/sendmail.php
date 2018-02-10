<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'PHPMailerAutoload.php';
include("config.php");


for ($i=23; $i <=85 ; $i++) { 
	# code...
if ($i==52||$i==40) {
	# code...
	continue;
}

$sql = 'SELECT * FROM enigma_participants WHERE id = "'.$i.'"';
$retval = $db->query($sql);
        
while($row = $retval->fetch_assoc()){
    
    $name = mysqli_real_escape_string($db,$row["name"]);
    $phone = mysqli_real_escape_string($db,$row["phone"]);
    $email = mysqli_real_escape_string($db,$row["email"]);
    $payment = mysqli_real_escape_string($db,$row["paymentstatus"]);
    echo "$payment";
    $pass = mysqli_real_escape_string($db,$row["password"]);
    if($payment==0){
    $mail = new PHPMailer;
    
          //$mail->SMTPDebug = 3;                               // Enable verbose debug output
      $mail->Host = "mx1.hostinger.in";                      // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'admin@reflux.in';                 // SMTP username
      $mail->Password = 'Reflux.2018';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
      $mail->IsHTML(true);
      $mail->setFrom('admin@reflux.in', 'Reflux');
      $mail->addAddress($email, $name);     // Add a recipient


      $mail->Subject = 'Reflux: Reminder for Fee Payment for Enigma Quiz';
      $mail->Body    = "Dear $name,\nWe hope you are looking forward to Enigma on February 18. This is just a reminder that your registration fee of Rs 100 is still due. Please proceed to the following link to make your online payment:\r\n.<a href='http://enigma.reflux.in/order.php?id=100&mail=".htmlentities($email)."&phone=".htmlentities($phone)."&name=".htmlentities($name)."'>Click Here to proceed for payment</a>\r\nIf payment already done,please disregard this email.Thank you for participating!Once confirmed login your email and password:".$pass;
      
      if(!$mail->send()) {
        //header("Location:error.php?error_id=S103");

        // echo "$email";
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
    //   echo "<html>Confirmation Mail is send to your account. Confirm your account.";
    	echo "mail sent to $name \r\n";
        
      // exit();
     }
            
    }
    
}
}
?>
