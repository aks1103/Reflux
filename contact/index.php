<?php
	$relative_path = "../";
	$current_page = "Contact Us";
?>

<!DOCTYPE html>

<head>
	<title>Contact Us | Reflux '16</title>
	<?php include "$relative_path"."embeds/include.php"; ?>
	<link rel="stylesheet" href="../css/contact.css" type="text/css" />
</head>

<body>

	<?php include '../embeds/navbar.php'; ?>

	<div class="page-content">
		
		<div class="container" id="contact">
		<div class="container text-center">
			
			<h2 class="uppercase" style="color:white;">Contact Us</h2>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<form name="sentMessage" id="contactForm" novalidate>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message." rows="6"></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-lg-12 text-center">
								<div id="success"></div>
								<a href="mailto:fix@carpm.in" class="btn btn-warning btn-large" style="transition: background-color 0.5s;">Send Message</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<hr style="color:white;">
			
			<div class="row">
				<div class="col-md-4">
					<span class="copyright"title="Copyright"><strong>Copyright &copy; Reflux 2016, IIT Guwahati </strong></span>
				</div>
				<div class="visible-xs-block"><br></div>
				<div class="col-md-4">
					<ul class="list-inline social-buttons">
						<li>
							<a href="https://www.google.com/+RefluxIn"target="blank"title="Gplus"><i class="fa fa-google-plus"></i></a>
						</li>
						<li>
							<a href="https://www.facebook.com/Reflux.iitg"target="blank"title="Facebook"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UC9K2pdUreXNJEnKzJ45dHUg"target ="blank"title="Youtube"><i class="fa fa-youtube"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/reflux_iitg"target="blank"><i class="fa fa-twitter"title="Twitter"></i></a>
						</li>    
					</ul>
				</div>
				<div>
					<h5>
						<b>Website designed & developed by</b>
						<a href="http://fb.com/nitish.garg.6174" style="text-decoration:none;" target="_blank">Nitish Garg</a>
						<!-- <a href="http://fb.com/Reflux.iitg/?fref=ts"style="text-transform:none;text-decoration:none; font-size:17px;" target="_blank">Reflux Creatives</a> -->
					</h5>                      
				</div>
			</div>
			
		</div>
		</div>
		
	</div>
	
	<script type="text/javascript" src="../js/contact.js"></script>
		
</body>