<?php 
	include("config.php");
   session_start();
	$question = $_GET['question'];
	$level = $_GET['level'];
	$option1 = $_GET['option1'];
	$option2 = $_GET['option2'];
   $option3 = $_GET['option3'];
   $option4 = $_GET['option4'];
   $answer=$_GET['answer'];

	
   	/*$dbhost = "mysql.hostinger.in";
	$dbuser = "u932729557_admin";
	$dbpass = "Aks12345";
	$dboption1 = "u932729557_main";*/

  // $db = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $db ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'INSERT INTO enigma_mcq '.
      '(option1, option2, option3, option4, answer, level, question) '.
      'VALUES ($option1, $option2, $option3, $option4, $answer, $level, $question)';
      
   
   $retval = mysql_query( $sql, $db );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($db);

?>
<form method="get" enctype="application/x-www-form-urlencoded" action="/html/codes/html_form_handler.cfm">

<p>
<label>question
<input type="text" name="question" required>
</label> 
</p>

<p>
<label>option1
<input type="text" name="option1">
</label>
</p>
<p>
<label>option2
<input type="text" name="option2">
</label>
</p>
<p>
<label>option3
<input type="text" name="option3">
</label>
</p>
<p>
<label>option4
<input type="text" name="option4">
</label>
</p>

<p>
<label>level
<input type="text" name="level">
</label>
</p>

<p>
<label>Answer
<textarea name="answer" maxlength="500"></textarea>
</label>
</p>

<p><button>Submit</button></p>

</form>