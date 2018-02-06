<?php
   include("session.php");
?>

<?php 
   
      
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    
                }else if($_SERVER["REQUEST_METHOD"] == "POST")
         {
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $level = $_POST['level'];

            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3 = $_POST['option3'];
            $option4 = $_POST['option4'];
                        
            $dbhost = "mysql.hostinger.in";
            $dbuser = "u932729557_admin";
            $dbpass = "Aks12345";
            $dbname = "u932729557_main";

               $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
         
               if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            
               $sql = 'INSERT INTO quiz_questions '.'(question, answer, level,option1, option2, option3, option4) '.'VALUES ("' . $question . '","' . $answer . '","' . $level . '","' . $option1 . '","'  . $option2 . '","' . $option3 . '","' . $option4  .'")';
               

               if ($conn->query($sql) === TRUE) {
                    $msg = "New record created successfully";
            }else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
                $conn->close();

         }else{
            $msg = "Please submit the form from authenticated sources.";
         }
                              

      
?>


<html>
<head>
   <title>Reflux | Quiz</title>
</head>
<body>
<center>
<h2>Enter Question</h2>
<h4>*Please enter the questions carefully</h4></center>
<form action="" method="post">
   <label for="question">Question</label><br>
   <textarea id="question" name="question" placeholder="Enter your question here" required autofocus style="width:100%;height:100px;"></textarea><br/><br/>

   <label for="answer">Answer</label><br>
   <input id="answer" type="text" name="answer" placeholder="Provide an answer" required  /><br/><br/>

<label for="answer">Option1</label><br>
   <input id="option1" type="text" name="option1" placeholder="Provide Option_1" required  /><br/><br/>

<label for="answer">Option2</label><br>
   <input id="option2" type="text" name="option2" placeholder="Provide Option_2" required  /><br/><br/>

<label for="answer">Option3</label><br>
   <input id="option3" type="text" name="option3" placeholder="Provide Option_3" required  /><br/><br/>

<label for="answer">Option4</label><br>
   <input id="option4" type="text" name="option4" placeholder="Provide Option_4" required  /><br/><br/>

   <label for="level">Level</label>
   <select name="level" id="level" required>
      <option value="1">Easy</option>
      <option value="2">Medium</option>
      <option value="3">Hard</option>
   </select><br/><br/>
   <h4 style="color:#552222"><?php echo $msg;  ?></h4>
   <input type="submit" name="submit" value="Submit" />  
</form>
</body>
</html>


      	