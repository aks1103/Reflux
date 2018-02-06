<?php
include("config.php");
$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "3834bd6dadb148d893a0c2866ffbf554");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";
    // Do something here
    if($data['status'] == "Credit"){
       // Payment was successful, mark it as completed in your database  
                

                print_r($data);
                var_dump($data);
                $to = 'reflux.iitg@gmail.com';
                $subject = 'Website Payment Request ' .$data['buyer_name'].'';
                $message = "<h1>Payment Details</h1>";
                $message .= "<hr>";
                $message .= '<p><b>ID:</b> '.$data['payment_id'].'</p>';
                $message .= '<p><b>Amount:</b> '.$data['amount'].'</p>';
                $message .= "<hr>";
                $message .= '<p><b>Name:</b> '.$data['buyer_name'].'</p>';
                $message .= '<p><b>Email:</b> '.$data['buyer'].'</p>';
                $message .= '<p><b>Phone:</b> '.$data['buyer_phone'].'</p>';
                
                
                $message .= "<hr>";

              
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                // send email
                $email = $data['buyer'];
                $phone = $data['buyer_phone'];
                $name = $data['buyer_name'];
                $amount = $data['amount'];
                mail($to, $subject, $message, $headers);

                $sql = "SELECT id  FROM enigma_participants WHERE email = '$email' and phone = '$phone' and name='$name'  ";
   $retval = $db->query($sql); //comment 
   

   if ($amount>=105 && $amount <=106) { // only for enigma
     
   
   if ($retval->num_rows == 1)//checks only one registration with an email id
   {
    while($row = $retval->fetch_assoc()) {
      $id = $row["id"];
      $pay_id = $data['payment_id'];
      $sql="UPDATE enigma_participants SET paymentstatus = 1, paymentid = '$pay_id' WHERE id = '$id'";
    if ($db->query($sql) === TRUE) {

      }else{

        echo "Transaction Successful but not Updated, contact team reflux";
        exit();

        }
      }
    }
  }
}
    else{
       // Payment was unsuccessful, mark it as failed in your database
             $pay_id = $data['payment_id'];
            $sql = "UPDATE enigma_participants SET paymentstatus =-1 , paymentid = '$pay_id WHERE id = '$id'";
    }
  }

else{
    echo "Invalid MAC passed";
}
?>
