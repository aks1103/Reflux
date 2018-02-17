



<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT id , paymentstatus , isConfirmed, name FROM enigma_participants WHERE email = '$email' and password= '$mypassword'";
      $retval2 = $db->query($sql);
      $row = $retval2->fetch_assoc();
      $active = $row["isConfirmed"];
      $name = $row["name"];
      $payment=$row["paymentstatus"];
      $count = $retval2->num_rows;
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($payment == "0"){
          header("Location:error.php?error_id=S107");
          //payment not done
          exit();
      }
      if($count == 1 && $active == "1"){ // only one such user exists & confirmed
          if(time()>0&&$email!="dummy@dummy.com"){
 echo <<<DET
 <!doctype html>
 <title>Reflux | Quiz</title>
 <style>
   body { text-align: center; padding: 150px; }
   h1 { font-size: 50px; }
   body { font: 20px Helvetica, sans-serif; color: #333; }
   article { display: block; text-align: left; width: 650px; margin: 0 auto; }
   a { color: #dc8100; text-decoration: none; }
   a:hover { color: #333; text-decoration: none; }
</style>

<article>
     <h1>Welcome $name</h1>
     <div>
         <p>Enigma an open to all quiz would be conducted on 18th, Feb'18.It will be organised in two rounds with cash prizes and goodies to win.<br><a href="mailto:reflux@iitg.ernet.in">Contact Us. </a><br>Stay Tuned for other updates of Reflux!</p>
     </div>
 </article>

DET;

exit();
}


         $_SESSION['login_user'] = $email;
         
         header("location: welcome.php"); //redirects to welcome page
      }else {if($count == 1) {
          header("Location:error.php?error_id=S106"); exit();
        echo "Please confirm your account first.";
         
      }else{
          header("Location:error.php?error_id=S105"); exit();
        echo "Your Login Name or Password is invalid";
      }
    }
   }
?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reflux | Enigma</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background-image: url(login_back.jpg);
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;">
    <script type="text/javascript">
      function myFunction()
      {   
        var x = document.getElementById("passwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }     
    </script>


<div class="login-box">
  <br><br>
  <div class="login-logo">
    <center><a href="http://reflux.in"><img src="ref2018.png" style="width: 28vw;" /></a></center>
  </div>
  <!-- /.login-logo --><center>
  <div class="login-box-body" style="width: 30vw;">
    <br><br>
    <p class="login-box-msg" style="color: white">Sign in to start your session</p>
<br><br>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input name="email"  type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" id="passwd" class="form-control" placeholder="Password">
        <!-- 
        <div style="color: white">
          <input type="checkbox" onclick="myFunction()">Show Password
        </div> -->
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        

    <div>
          <div class="checkbox icheck">
            <label style="color: white">
              <input type="checkbox" onclick="myFunction()"> Show Password
            </label>
          </div>
        </div>


        <!-- <div class="col-xs-8"> -->
        <div>
          <div class="checkbox icheck">
            <label style="color: white">
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <!-- <div class="col-xs-4"> -->
        <div>
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 30vw;">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    
    <a href="index.php" class="text-center">Not Registered?</a> <!-- redirects to register page -->

  </div></center>
  <!-- /.login-box-body -->
</div>

<div style="position:fixed;bottom:0px;"><img src="https://drive.google.com/drive/folders/0B2SkMWOJa1HLQ3NwYmlacU5yOTg" style="width:100%;height:auto"/></div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>