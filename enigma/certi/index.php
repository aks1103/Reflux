<?php

session_start();
$message="";
$hostname = "mysql.hostinger.in";
$username = "u932729557_admin";
$dbname = "u932729557_main  ";

//These variable values need to be changed by you before deploying
$password = "Aks12345";
$usertable = "enigma_result";
$yourfield = "your_field";


if(count($_POST)>0) {
$conn = mysql_connect($hostname, $username, $password) OR DIE ("Unable toconnect to database! Please try again later.");
mysql_select_db($dbname,$conn);
$result = mysql_query("SELECT * FROM `enigma_result` WHERE `email` LIKE '" . $_POST["form-username"] . "'");
$count  = mysql_num_rows($result);
$row = mysql_fetch_array($result);

if($count==0) {
$message = "Invalid email Address!";
$message1="";
} else {
$message = "Welcome, ".ucwords($row['name'])."!";
$message1 = $row['email'];
$name = $row['name'];
$true=1;
$_SESSION['name'] = ucwords($name);
$_SESSION['time']     = time();
}
}
?>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TechRep Portal</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="icon" type="image/png" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

    </head>

    <body>

    <ul class="cb-slideshow" style="opacity: 0.25;">
            <li><span>Image 01</span><div><h3>re·lax·a·tion</h3></div></li>
            <li><span>Image 02</span><div><h3>qui·e·tude</h3></div></li>
            <li><span>Image 03</span><div><h3>bal·ance</h3></div></li>
            <li><span>Image 04</span><div><h3>e·qua·nim·i·ty</h3></div></li>
            <li><span>Image 05</span><div><h3>com·po·sure</h3></div></li>
            <li><span>Image 06</span><div><h3>se·ren·i·ty</h3></div></li>
        </ul>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <a href="http://www.techniche.org" target="_blank"><img src="img.png"></a>

                            <!--<h1><strong>Bootstrap</strong> Login Form</h1>-->
                            <div class="description">
                            	<!--<p>
	                            	This is a free responsive login form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3 style="font-family: Century Gothic;
                                    font-size: larger;
                                    font-weight: bold;">ENTER YOUR DETAILS</h3>
                            		<p style="font-family: Century Gothic;
                                    font-size: medium;">Enter your email address to log on: </p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="POST" class="login-form">
                                <?php if($message!="" and $message1!="") 
                                {
                                echo <<<HTML
                                <p style="font-size:larger;font-family: Century Gothic;text-align: center;">$message</p>
HTML;
                                echo <<<HTML
                                <div style="text-align: center;">
                                <a href="cetri.php?' . SID . '" target="_blank" style="font-size: medium;font-family: Century Gothic;text-align: center;">Click Here!!</a></div>
HTML;
                                 }else
                                 echo <<<HTML
                                <p style="font-size:larger;font-family: Century Gothic;text-align: center;">$message</p>
HTML;

                                  ?>

			                    	<div class="form-group" style="margin-bottom:20px;">
			                    		<label class="sr-only" for="form-username">EmailID</label>
			                        	<input type="text" name="form-username" placeholder="Email..." class="form-username form-control" id="form-username">
			                        </div>
                                    <!--
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>-->
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>-->
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>