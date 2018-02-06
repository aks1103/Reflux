   <?php
   include('config.php');
   // include('login.php');
   session_start();
   

   if(isset($_SESSION['login_user']))
   $user_check = $_SESSION['login_user'];
   else $user_check="";
   
      $sql = "SELECT email FROM enigma_participants WHERE email = '$user_check'";

   // $sql = "Select email from participants where email = '$user_check' ";


   $ses_sql = $db->query($sql);
   
   $row = $ses_sql->fetch_assoc();
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      exit();
   }
?>