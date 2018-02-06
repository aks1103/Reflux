<?php 

$msg="";
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include("config.php");
session_start();

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
		$question = $_POST['question'];
		$level = $_POST['level'];
		$answer=$_POST['answer'];
   
   if(!$db ) {
      die('Could not connect: ' . $db->connect_error);
   }
   
   $sql = "INSERT INTO enigma_one_word (answer, level, question) VALUES ('$answer', '$level', '$question')";
      
   
   $retval = $db->query($sql);
   
   if(!$retval ) {
      die('Could not enter data: ' . $db->connect_error);
   }
   
   $msg="<b>Entered data successfully</b>";
   
   $db->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
</head>
<body>


<center><h2><u>Enter Enigma Question</u></h2>
	<p><a href="https://addons.mozilla.org/en-US/firefox/addon/grammarly-1/">Grammerly on Fireforx</a><br>
	<a href="https://chrome.google.com/webstore/detail/grammarly-for-chrome/kbfnbcaeplbcioakkpcpgfkobkghlhen?hl=en">Grammerly on Chrome</a></p>
	<p style="color: red">*Fields are required &amp; Please Install Grammerly to avoid any error.</p><p style="color: #00ff00;"><?php echo $msg; ?><p>
</center>

<form method="post" enctype="application/x-www-form-urlencoded" action="">

<p>
<label>Question* : <br>
<textarea type="text" name="question" required rows="9" style="width:80%" placeholder="Enter question here"></textarea>
</label> 
</p>

<p>
<label>Level :<br>
<select type="text" name="level" default="Medium" required>
	<option value="1">Easy</option>
	<option value="2">Medium</option>
	<option value="3">Hard</option>
</select>
</label>
</p>

<p>
<label>Answer* :<br>
<input type="text" name="answer" required placeholder="Answer">
</label>
</p>

<p><input type="submit" name="submit" value="Submit"></input></p>

</form>

</body>
</html>


