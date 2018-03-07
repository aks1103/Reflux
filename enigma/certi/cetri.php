<?php
  session_start();
  $name=$_SESSION['name'];
  $college=$_SESSION['phone'];
  // $name="Ankit Kumar Singh";
  // $college="IIT Guwahati";
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TechRep-Certificate</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link href='http://fonts.googleapis.com/css?family=Droid+Serif:700italic' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" href="favicon.ico">
  <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <style>

    @font-face {
      font-family: "Kimberley";
      src: local('test/web/coresanSN.ttf');// format("truetype");
    }

    @font-face {
      font-family: "Kimberley2";
      src: local('test/web/bryant.ttf');// format("truetype");
    }

    h1 { font-family: "Century Gothic", sans-serif ;}
    h2,h3,h4 { font-family: "Century Gothic", sans-serif; }
    /*@page {margin: 0px; }*/

    div {
      position: absolute;
      width: 100%;
      float: left;
      text-align: center;
    }

    img {
      height: 100%;
      width: 100%;
    }

    h1,h2,h3 {
      z-index: 100;
      font-size : 2vw;
    }
    </style>
    
    <style type="text/css" media="print">
  @page { size: landscape; }
  </style>

</head>
<body>

<?php 
 
  echo <<<HTML
  <div style="position: relative;">
   <img src="certi.jpg">
   <div style="position: absolute;top:49%;left:-25%;"><h2 style="text-align:center;">$name</h2></div>
 </div>
 <hr><br>
HTML;

?> 


<script>
	window.onload = function(){ window.print(); }
</script>

</body>

</html>
