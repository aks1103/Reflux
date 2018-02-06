<?php

	$relative_path = "../";
	$current_page = "Messages";

	session_start();
	if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
	{
		header('Location: records.php');
	}

?>

<head>
	<title>Messages | Reflux '16</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include "$relative_path"."embeds/include.php"; ?>
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
</head>

<body style="background-color:lavender;">

	<div class="container text-center" style="margin-top:50px;">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
				<form>
					<div class="form-group"><input type="text" name="username" placeholder="Username" class="form-control" /></div>					
					<div class="form-group"><input type="password" name="password" placeholder="Password" class="form-control" /></div>
					<div class="form-group"><input type="submit" name="submit" value="Login" class="btn btn-primary" /></div>
				</form>				
			</div>
		</div>
	</div>

	<!-- <script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script> -->
	<script type="text/javascript" src="../js/md5.js"></script>
	<script>
	    
	    $('input[type="submit"').click(function(e){
	    	e.preventDefault();
	    	if( $('input[type="text"').val()!='' && $('input[type="password"').val()!='' )
	    	{
	    		var username = MD5($('input[type="text"').val());
	    		var password = MD5($('input[type="password"').val());
	    		$.post( "login.php", {
	    			username: username,
	    			password: password
	    		}, function(data,status){
	    			if($('status',data).text()=='right')
	    				window.location = 'records.php';
	    			else
	    				alert('Wrong credentials');
	    		});
	    	}
	    });
	    
	</script>

</body>