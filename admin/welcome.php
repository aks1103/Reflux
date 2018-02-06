<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
      <h2><a href = "quizquestions.php">View Quiz Questions</a></h2>
      <h2><a href = "website.php">View Website Responses</a></h2>
<!--       <h2><a href = "links.php">Important Links</a></h2>
 -->      <h2><a href = "update.php">Update Wesite</a></h2>
      <h2><a href = "quizinterface.php">Update Wesite</a></h2>
      <h2><a href = "proofread.php">Proof Read questions</a></h2>
   </body>
   
</html>
