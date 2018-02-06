<?php
include("config.php");
for ($i=27; $i <=54 ; $i++) { 
	# code...
if ($i==52||$i==40) {
	# code...
	continue;
}
$sql = "SELECT id  FROM enigma_participants WHERE id = '$i' ";
   $retval = $db->query($sql);
   if ($db->query($sql) === TRUE) {
   	$retval = $db->query($sql);
   	while($row = $retval->fetch_assoc()){
$name = mysqli_real_escape_string($db,$row["name"]);
$phone = mysqli_real_escape_string($db,$row["phone"]);
$email = 'bhuvan1515@gmail.com';
$pass[0] = mysqli_real_escape_string($db,$row["password"]);
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


      $mail->Subject = 'Reflux : payment unsuccessful';
      $mail->Body    = "Email Confirmed Sucessfully,but,payment wasn't successful.<a href='http://enigma.reflux.in/order.php?id=100&mail=".htmlentities($email)."&phone=".htmlentities($phone)."&name=".htmlentities($name)."'>Click Here to proceed for payment</a>Once confirmed login your email and password:".$pass[0];

      if(!$mail->send()) {
        header("Location:error.php?error_id=S103");

        // echo "$email";
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
    //   echo "<html>Confirmation Mail is send to your account. Confirm your account.";
    	echo "mail sent to $name";
        header("Location:confirm.html");
       exit();
     }}}}






?>