<?php

if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "empty"){
     echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Fields can not be empty!"."</p></center>";}
     if($status == "rule"){
         echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Please follow rules!"."</p></center>";}
         if($status == "both_matched"){
             echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Password & Confirm Password not Matched!"."</p></center>";}
             if($status == "not_matched"){
                 echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Incorrect Password!"."</p></center>";}
                 if($status == "success"){
                     echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Password Changed Successfully!"."</p></center>";}
                 }
                 
                 ?>


                 <!DOCTYPE html>
                 <html lang="en-US">

                 <head>
                    <title>Change Password</title>
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
                <h1 id="myHeader" title="Change Password" style="padding-left: 40%;"> Change Password <a style="color:darkslategrey;font-size: 70%; padding-left: 55%; " href="faculty_logout_verification.php" >Logout</a></h1>
                
                <?php
                require "faculty_menu.php";
                ?>

                <form method="post" action="faculty_change_password_verification.php">
                   <div style="margin-left:20%;padding: 16px;">
                      
                       
                    <p id="myHeader1">Old Password &ensp; &ensp; &ensp; &ensp;<input type="password" name="old_password" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" width: 50px; class="small_textbox"></p>
                    <p id="myHeader1">New Password &ensp; &ensp; &ensp;<input type="password" name="new_password" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" width: 50px; class="small_textbox"></p>
                    <p id="myHeader1">Confirm Password &ensp; <input type="password" name="re_password" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" width: 50px; class="small_textbox"></p>
                    
                    <center><input type="submit" value="Change" name="submit" class="button button2"> </center> 
                    
                </div>
            </form>

        </body>

        </html>