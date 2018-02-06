<?php 

if(!isset($_GET)){
	echo "Not a valid confirmation mail";
	exit();
}
else{
	include("config.php");
	$mail = $_GET['mail'];
	$name =  $_GET['name'];
	$phone = $_GET['phone'];

	$sql = 'SELECT id  FROM workshop WHERE email = "'.$mail.'"';
	$retval = $db->query($sql); //comment
   if ($retval->num_rows >= 1){

   }else{
	echo "Not a valid confirmation mail";
   }	
}

if(isset($_GET['id']) && $_GET['id'] == 200){

   // $prd_name = "Jeans Mens #100";
	$price = 241;

	// Price calculation with tax and fee
	$instafee= 3;
	$fee = ($price*0.02)+$instafee;
	$tax = 0.18*$fee;
    
	$prd_price = round($fee + $tax + $price);	
    //$prd_price =(int)$prd_price;
	
 } 
 // 	else if(isset($_GET['id']) && $_GET['id'] == 101){
 //    $prd_name = "T Shirt Mens #101";
 //   	$price = 200;

	// // Price calculation with tax and fee
	// $fee = 3 +($price*.02);
	// $tax = $fee * .15;
	// $prd_price = $fee+ $tax + $price;	
 // } 
 // 	else if(isset($_GET['id']) && $_GET['id'] == 102){
 //    $prd_name = "Sunglass Mens #102";
 //    $price = 1000;

	// // Price calculation with tax and fee
	// $fee = 3 +($price*.02);
	// $tax = $fee * .15;
	// $prd_price = $fee+ $tax + $price;	
 // } 
 else {

 	echo "No such a prodcut to purchase :(";
 	exit();
 }

 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Payment Mojo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container" style="width: 60%;margin: auto;">

      <div class="page-header">
        <!-- <h1><a href="index.php">ENIGMA PAYMENT PORTAL</a></h1> -->
        <!-- <p class="lead">A test payment integration for instamojo payment gateway. Written in PHP</p> -->
      </div>

		<p>
		<!-- <b>Product name :</b> <?php echo $prd_name; ?> -->
		<span>Redirecting to payment in <b><span id="time">7</span></b> seconds....</span>
		</p>
		<p>
		<b>Price : </b> <?php echo $price; ?>
		</p>
		<p><b>Bank Fee : </b> <?php echo $tax + $fee ; ?> <small> (Rs:100+ 2% of 100+ GST)</small></p>

		<p><b>Total : </b> <?php echo $prd_price; ?></p>

		<h3>Your Payment Details </h3>
		<hr>
		<form action="pay_workshop.php" method="POST" accept-charset="utf-8" id="form">
	
	    <input type="hidden" name="product_name" value="WORKSHOP" hidden> 
		<input type="hidden" name="product_price" value="<?php echo $prd_price; ?>"> 
		<center>
		<div class="form-group">
    	<label>Your Name</label>
   		<input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" ><br/>
		</div>

		<div class="form-group">
    	<label>Your Phone</label>
   		<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>"> <br/>
		</div>


		<div class="form-group">
    	<label>Your Email</label>
   		<input type="email" class="form-control" name="email" placeholder="Enter you email" value="<?php echo $mail; ?>" > <br/>
		</div>

	  
		<input type="submit" class="btn btn-success btn-lg" value="Click here to Pay Rs:<?php echo $prd_price; ?> ">

		 </form>
 <br/>
  <br/>     
    </div> <!-- /container -->

<script type="text/javascript">
	

// Initializing timer variable.
var x = 7;
var y = document.getElementById("time");
// Display count down for 20 seconds
setInterval(function(){
if( x<=8 && x>=1)
{
x--;
y.innerHTML= ''+x+'';
if(x==1){
x=8;
}
}
}, 1000);



// Form Submitting after 20 seconds.
var auto_refresh = setInterval(function() { submitform(); }, 7000);
// Form submit function.
function submitform(){

document.getElementById("form").submit();

}





    // window.onload=function(){

    	
    // }
</script>
  </body>
</html>
