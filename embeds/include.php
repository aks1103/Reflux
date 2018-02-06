<?php
	if($_SERVER['SERVER_NAME']=="10.0.2.26" || $_SERVER['SERVER_NAME']=="localhost")
		$mode = "local";
	else
		$mode = "online";
	// echo $_SERVER['SERVER_NAME'];
	// echo $_SERVER['REQUEST_URI'];

	include "settings.php";
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Reflux 2016, the annual Chemical Engineering symposium of IIT Guwahati">
<meta name="author" content="Nitish Garg">
<meta name="keywords" content="reflux,iit,guwahati,2016,chemical,engineering">

<link rel="icon" href=<?php echo "$relative_path","images/logo/logo_square.ico"; ?> type="image/x-icon">

<link rel="stylesheet" href=<?php echo "$relative_path","css/format.css"; ?> type="text/css" />

<?php if($mode=="local") { ?>
<link rel="stylesheet" href=<?php  echo "$relative_path","css/bootstrap.css"; ?> type="text/css" />
<script type="text/javascript" src=<?php  echo "$relative_path","js/ext/jquery.js"; ?>></script>
<script type="text/javascript" src=<?php  echo "$relative_path","js/ext/jquery-ui.js"; ?>></script>
<script type="text/javascript" src=<?php echo "$relative_path","js/ext/bootstrap.js"; ?>></script>
<?php } else { ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="//code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php } ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<link href='https://fonts.googleapis.com/css?family=Overlock+SC|Titillium+Web:300,400,600' rel='stylesheet' type='text/css'>