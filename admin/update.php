<?php
   include("session.php");
?>

<?php 
   
      
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    
                }else if($_SERVER["REQUEST_METHOD"] == "POST")
         {
            $heading = $_POST['heading'];
            $descrp = $_POST['descrp'];
            $date = $_POST['date'];
            $link = $_POST['link'];


                        
            $dbhost = "mysql.hostinger.in";
            $dbuser = "u932729557_admin";
            $dbpass = "Aks12345";
            $dbname = "u932729557_main";

            $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
         
               if ($conn->connect_error) {
               		die("Connection failed: " . $conn->connect_error);
            	} 
            
               $sql = 'INSERT INTO updates '.'(heading, description, date,link) '.'VALUES ("' . $question . '","' . $answer . '","' . $level . '","' . $option1 . '")';
               

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

   <label for="heading">Heading</label><br>
   <input id="heading" type="text" name="heading" placeholder="Heading" required  /><br/><br/>


   <label for="description">Description</label><br>
   <textarea id="description" name="description" placeholder="Enter description" required autofocus style="width:100%;height:100px;"></textarea><br/><br/>

	<label for="date">Date</label><br>
   <input id="date" type="text" name="date" placeholder="MM/DD/YYYY" required  /><br/><br/>



   <br/><br/>
   <h4 style="color:#552222"><?php echo $msg;  ?></h4>
   <input type="submit" name="submit" value="Submit" />  
</form>


<a href="updatesedit.php"><h2>Edit/Remove Previous Entries.</h2></a>
</body>
</html>


