<?php
	$relative_path = "../";
	$current_page = "Accomodation";
	$navbar_style = "navbar-static-top";	
?>

<!DOCTYPE html>

<head>
	<title>Accomodation | Reflux '16</title>
	<?php include "$relative_path"."embeds/include.php"; ?>
	<link rel="stylesheet" href="../css/accomodation.css" type="text/css" />
</head>

<body>

	<?php include '../embeds/navbar.php'; ?>

	<div class="page-content">
		
		<div class="container">
			
			<h2 class="text-center uppercase">Apply for accomodation during Reflux 2016</h2>
			<br>

			<div class="jumbotron">
			<?php if($accomodation_closed!=true) { ?>
				<?php if(!isset($_GET['p'])||empty($_GET['p'])||$_GET['p']!='success') { ?>
					<h3>Note :</h3>
					<ul>
						<li>Please fill the below form to let us know about your details and stay duration</li>
						<li>You need to <strong>email us later</strong> along with an attachment of your tickets for <strong>confirmation</strong> of your travel to IIT-Guwahati</li>
						<li>One day stay costs INR 400/- and each subsequent day costs INR 200/-</li>
					</ul>
					<h3>On mailing :</h3>
					<ul>
						<li>The confirmation email must be sent at <strong>reflux.iitg@gmail.com</strong></li>
						<li>Keep the subject as: <i>Accomodation - &lt;your phone number&gt;</i></li>
						<li>Please include your Name and Institution in your mail body</li>
					</ul>

					<hr>
					<h3 class="text-center" style="color: hsl(120,100%,25%);">Application form</h3>
					<div class="row" id="form">
					<div class="col-lg-6 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">
						<div class="form-group">
							<input type="text" name="name" class="form-control customInput" placeholder="Name *" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="text" name="institute" class="form-control customInput" placeholder="Institution name *" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control customInput" placeholder="Email-ID *" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="text" name="phone" class="form-control customInput" placeholder="Phone No. *" autocomplete="off">
						</div>
						<div class="form-group">
						  <label for="dateFrom" style="width:49%;">
						  Staying From :
						  <select class="form-control" id="dateFrom">
						  	<option value="choose">Choose date</option>
						    <option value="24">24th March</option>
						    <option value="25">25th March</option>
						    <option value="26">26th March</option>
						    <option value="27">27th March</option>
						  </select>
						  </label>
						  <label for="dateTill" style="width:49%;">
						  Staying Till :
						  <select class="form-control" id="dateTill">
						  	<option value="choose">Choose date</option>
						    <option value="25">25th March</option>
						    <option value="26">26th March</option>
						    <option value="27">27th March</option>
						  </select>
						  </label>
						</div>					
						<div class="form-group text-center">
							<input type="submit" class="btn btn-primary" value="Finish">
						</div>
					</div>
					</div>
				</div>
				<?php } else { ?>
					<h4 class="text-center" style="color:hsl(120,100%,25%);">Your response has been recorded</h4>
					<h4 class="text-center">Please make sure to email us your tickets to confirm your stay</h4>
					<div class="row">
						<a href="?p=form" class="customLink">
						<div class="hollowBtn col-md-4 col-sm-8 col-md-offset-4 col-sm-offset-2"><i class="fa fa-chevron-left"></i> Back</div>
						</a>
					</div>
				<?php } ?>
			<?php } else { ?>
				<h3 class="text-center" style="color:red;">This page is no longer available.</h3>
				<h4 class="text-center" style="color:blue;">Do come back in the next edition of Reflux</h4>
			<?php } ?>
		</div>
		
	</div>
	
	<script type="text/javascript" src="../js/accomodation.js"></script>
		
</body>