<?php 

$msg = "Something went wrong";

if(isset($_GET["error_id"]))
{
	$id = $_GET["error_id"];
	if($id == "S101")
		$msg = "Email Already Registered or Error in Connection. Please try Again.";
	if($id == "S102")
		$msg = "Account Registration failed";
	if($id == "S103")
		$msg = "Message could not be sent.Contact Team Reflux";
	if($id == "S104")
		$msg = "Email not valid or try again later.";
	if($id == "S105")
		$msg = "Your Login Name or Password is invalid";
	if($id == "S106")
		$msg = "Please confirm your account first.";
	if($id == "S107")
		$msg = "Please complete your payment to login.";
}else{
    
    echo "ye toh aur bhi karab h ";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Error</title>

	<style type="text/css">
		body{
			background-color: #A73F3F
		}

	</style>
</head>
<body>

<br><br><br>

<div style="margin:15% 20%; "><center><h1 style="color:#fafafa;"><?php echo $msg; ?></h1></center></div>

</body>
</html>