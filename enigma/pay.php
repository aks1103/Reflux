<?php 
include("config.php");

$product_name = mysqli_real_escape_string($db,$_POST["product_name"]);
$price = mysqli_real_escape_string($db,$_POST["product_price"]);
$name = mysqli_real_escape_string($db,$_POST["name"]);
$phone = mysqli_real_escape_string($db,$_POST["phone"]);
$email = mysqli_real_escape_string($db,$_POST["email"]);
echo "something else";
echo $phone;
echo $email;

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('369303705ee8a7fb83fdff7a0b8b3d54', 'd4487696b3225954f026065648c0ce18','https://www.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://www.reflux.in/enigma/thankyouinsta.php",
        "webhook" => "http://www.reflux.in/enigma/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>