<?php

	require '../db/dbconf.php';
	session_start();

	if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
	{
		if( @mysql_connect($db_host,$db_username,$db_password) && @mysql_select_db($db_name) )
		{
			$query = "SELECT * FROM `messages` ORDER BY `count`";
			if( $query_run = mysql_query($query) )
				$status = 1;
			else
				$status = 2;
		}
		else
			$status = 3;
	}
	else
		header('Location: index.php');
	
?>

<head>
	<title>Messages | Reflux '16</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body style="background-color:smokewhite;">

	<div class="container text-center" style="margin-top:50px;">
		<?php if($status==1) { ?>			
		    <table class="table table-striped table-bordered">
		    	<tr>
		    		<th>S. No.</th>
		    		<th>Name</th>
		    		<th>Email</th>
		    		<th>Phone</th>
		    		<th>Message</th>
		    	</tr>
		    	<?php for($i=0;$i<mysql_num_rows($query_run);$i++) { ?>
		    	<tr>
		    		<td><?php echo mysql_result($query_run,$i,'count'); ?></td>
		    		<td><?php echo mysql_result($query_run,$i,'name'); ?></td>
		    		<td><?php echo mysql_result($query_run,$i,'email'); ?></td>
		    		<td><?php echo mysql_result($query_run,$i,'phone'); ?></td>
		    		<td><?php echo htmlentities(mysql_result($query_run,$i,'message')); ?></td>
		    	</tr>
		    	<?php } ?>
		    </table>
		<?php } else if($status==2) { ?>
			<div class="container text-center" style="margin-top:50px;">
			    <div class="alert alert-danger">
			        Error occured in fetching results
			    </div>
			</div>
		<?php } else if($status==3) { ?>
			<div class="container text-center" style="margin-top:50px;">
			    <div class="alert alert-danger">
			        Cannot connect to the database
			    </div>
			</div>
		<?php } ?>
		<a href="logout.php" class="btn btn-danger">Logout</a>
	</div>

</body>