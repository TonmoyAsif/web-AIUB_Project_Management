<?php

if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "error"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Username or Password not matched!"."</p></center>";}
}

?>


<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Create Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Section Page">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Zaman,F.M.Asif-uz-">
    <link rel="stylesheet" type="text/css" href="faculty_properties.css">
    <link rel="stylesheet" type="text/css" href="faculty_properties_home.css">
    <link rel="stylesheet" type="text/css" href="textbox.css">
    <style>
    
</style>
</head>

<body style="background-color:darkslategrey;">
    <h1 id="myHeader" title="Change Password" style="padding-left: 35%;"> Modify Group <a style="color:darkslategrey;font-size: 70%; padding-left: 55%; " href="faculty_logout_verification.php" >Logout</a></h1>           
    <?php
    require "faculty_menu.php";
    ?>
</body>

</html>