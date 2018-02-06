<?php
  

   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      var_dump($myusername." ".$mypassword);
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = $db->query($sql);
      $count = $result->num_rows;
      	
if($count >0)
{
      $row = $result->fetch_assoc();
      
      $active = $row['active'];
      
      
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("Location: welcome.php");
         exit();
 
     }
}
else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
        
         
        
         
         
      </style>
      
   </head>
   
   <body bgcolor="#fafafa">
	<br><br><br>
<center><h2 style="color:#229955">Quiz Module</h2></center><br>
      <div align = "center" style = "margin:auto;padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;backgroud-color:#ffffff;border-radius:10px;width:400px;box-shadow: 2px 2px 10px #888888;">
         
            
				
            <div>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Submit"/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         
			
      </div>

   </body>
</html>
