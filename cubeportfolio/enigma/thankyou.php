<?php 
	
	include("session.php");

	if($_SERVER['REQUEST_METHOD'] = "POST")
		{
			$sql = "UPDATE participants SET isEnd = 1 WHERE email = '$login_session'";
			$db->query($sql);			

		}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Reflux | Thanks</title>
	<style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>
</head>
<body>


<article>
    <h1>Thank You</h1>
    <div>
        <p>The Results of the Quiz will be Announced Shortly. Stay Tuned with website for other updates of Reflux!.For any other query you can <a href="mailto:ankit.ks@iitg.ernet.in">contact us. </a></p>
        <p>&mdash; The Team Reflux</p>
    </div>
</article>
</body>
</html>