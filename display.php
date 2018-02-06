<!DOCTYPE html>
<html>
<head>
    <title>Reflux | Database</title>
    <style type="text/css">
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>
<body style="background-color: #fafafa;">



<?php

$servername = "mysql.hostinger.in";

$username = "u932729557_admin";

$password = "Aks12345";

// Create connection
$connection = mysqli_connect($servername, $username, $password,"u932729557_main");
//create connection
//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}
//get results from database
$result = mysqli_query($connection,"show tables");

$all_property = array();  //declare an array for saving property

// //showing property
// echo '<table class="data-table">
//         <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    // echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

echo '<form action="" method="post" >
<center><div style="border:2px solid #cacaca;border-radius:5px;background-color:#fafafa;width:40%;padding:9px 15px;">
Password &nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="key"/><br/><br>
Select Table :&nbsp;&nbsp;<select name="table">';
while ($row = mysqli_fetch_array($result)) {
    foreach ($all_property as $item) {
        echo  '<option value='.$row[$item] .'>'.$row[$item] .'</option><br>'; 
    }

}


echo '</select><br/><br>
<input type="submit" name="submit" value="View" class="btn"/></center><br>
</form>';


if (isset($_POST['submit']))
{
    if($_POST['key'] != "Reflux.1820"){
        echo "Incorrect password.";
        exit();
    }

    $table= $_POST['table']; 
    $result = mysqli_query($connection,"select * from `".$table."`");
    $all_property = array();  //declare an array for saving property

    echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
    while ($property = mysqli_fetch_field($result)) {
    echo '<th>' . $property->name . '</th>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; 
while ($row = mysqli_fetch_array($result)) {

    echo '<tr>';
    foreach ($all_property as $item) {
        echo '<td>' .$row[$item]. '</td>'; 
    }
    echo '</tr>';

}
echo "</table>";
}

?>

</body>
</html>