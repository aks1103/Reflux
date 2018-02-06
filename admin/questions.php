<?php
  include("session.php");
   
  $dbhost = "mysql.hostinger.in";
  $dbuser = "u932729557_admin";
  $dbpass = "Aks12345";
  $dbname = "u932729557_main";

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 



    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

      $question = $_POST['question'];
      $answer = $_POST['answer'];
      $level = $_POST['level'];

      $option1 = $_POST['option1'];
      $option2 = $_POST['option2'];
      $option3 = $_POST['option3'];
      $option4 = $_POST['option4'];

      $id = $_POST['id'];

      $sql = 'UPDATE quiz_questions SET question = "'.$question.'", answer = "'.$answer.'", level = "'.$level.'", option1 = "'.$option1.'", option2 = "'.$option2.'", option3 = "'.$option3.'", option4 = "'.$option4.'", answer = "'.$answer.'", proofread = 1 WHERE id = "'.$id.'"';

              // $sql = 'INSERT INTO quiz_questions '.'(question, answer, level,option1, option2, option3, option4) '.'VALUES ("' . $question . '","' . $answer . '","' . $level . '","' . $option1 . '","'  . $option2 . '","' . $option3 . '","' . $option4  .'")';


      if ($conn->query($sql) === TRUE) {
        $msg = "New record created successfully";
      }else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
      }
      

      header("Location:proofread.php");
      
    

    }
    else
    {

      $id = $_GET['num'];
    
      $sql = 'SELECT * FROM quiz_questions WHERE id ='.$id;
      $retval = $conn->query($sql);
      if($_GET["v"]=="edit")
      {
        if ($retval->num_rows > 0) {
          while($row = $retval->fetch_assoc()) {


            $question = $row["question"];
            $answer = $row["answer"];
            $option1 = $row["option1"];
            $option2 = $row["option2"];
            $option3 = $row["option3"];
            $option4 = $row["option4"];
            $level = $row["level"];

            echo <<<M
            <center>
              <h2>Enter Question</h2>
              <h4>*Please enter the questions carefully</h4></center>
              <form action="" method="post">
                <label for="question">Question</label><br>
                <textarea id="question" name="question"  required autofocus style="width:100%;height:100px;">$question</textarea><br/><br/>

                <label for="answer">Answer</label><br>
                <input id="answer" type="text" name="answer" value=" $answer " required  /><br/><br/>

                <label for="answer">Option1</label><br>
                <input id="option1" type="text" name="option1"  value=" $option1 " required  /><br/><br/>

                <label for="answer">Option2</label><br>
                <input id="option2" type="text" name="option2" value=" $option2 " required  /><br/><br/>

                <label for="answer">Option3</label><br>
                <input id="option3" type="text" name="option3" value=" $option3 " required  /><br/><br/>

                <label for="answer">Option4</label><br>
                <input id="option4" type="text" name="option4" value=" $option4 " required  /><br/><br/>

                <label for="level">Level</label>
                <select name="level" id="level" default=" $level " required>
                  <option value="1">Easy</option>
                  <option value="2">Medium</option>
                  <option value="3">Hard</option>
                
                </select><br/><br/>
                <input type="text" hidden name="id" value="$id" />
                <input type="submit" name="submit" value="Submit" />

              </form>  
M;
            }
          } else {
            echo "0 results found";
          }
        }

        else
        {

          if ($retval->num_rows > 0) {
            while($row = $retval->fetch_assoc()) {


              $question = $row['question'];
              $answer = $row["answer"];
              $option1 = $row["option1"];
              $option2 = $row["option2"];
              $option3 = $row["option3"];
              $option4 = $row["option4"];
              $level = $row["level"];

              echo <<<M
            <center>
              <h2>Enter Question</h2>
              <h4>*Please enter the questions carefully</h4></center>
              <form action="" method="post">
                <label for="question">Question</label><br>
                <textarea id="question" name="question"  required autofocus style="width:100%;height:100px;" disabled>$question</textarea><br/><br/>

                <label for="answer">Answer</label><br>
                <input id="answer" type="text" name="answer" value=" $answer " required  disabled/><br/><br/>

                <label for="answer">Option1</label><br>
                <input id="option1" type="text" name="option1"  value=" $option1 " required  disabled/><br/><br/>

                <label for="answer">Option2</label><br>
                <input id="option2" type="text" name="option2" value=" $option2 " required disabled /><br/><br/>

                <label for="answer">Option3</label><br>
                <input id="option3" type="text" name="option3" value=" $option3 " required  disabled/><br/><br/>

                <label for="answer">Option4</label><br>
                <input id="option4" type="text" name="option4" value=" $option4 " required  disabled/><br/><br/>

                <label for="level">Level</label>
                <select name="level" id="level" default=" $level " required disabled>
                  <option value="1">Easy</option>
                  <option value="2">Medium</option>
                  <option value="3">Hard</option>
                
                </select><br/><br/>
                <input type="text" hidden name="id" value="$id" />
                
              </form>  
                <a href="quizquestions.php">View Questions</a>
M;
              }
            } else {
              echo "0 results found";
            }
          }
}
          $conn->close();
?>