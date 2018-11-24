<?php
session_start();
if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "rule"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Please Follow Student addition Rules!"."</p></center>";}
   if($status == "success"){
     echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Students added to section Successfully"."</p></center>";}
     if($status == "used"){
       echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."The section is already in the section list"."</p></center>";}
     }

     if(!isset($_COOKIE['user']) )
     {
      header('location: faculty_login.php');
      
    }
    else
    {
     
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
      <h1 id="myHeader" title="Change Password" style="padding-left: 40%;"> Add Students <a style="color:darkslategrey;font-size: 70%; padding-left: 60%; " href="faculty_logout_verification.php" >Logout</a></h1>           
      <?php
      require "faculty_menu.php";
      ?>

      <form method="post" action="faculty_create_section_verification_add_students.php" enctype="multipart/form-data">
       <div style="margin-left:15%;padding: 16px;">
        
        <p id="myHeader1">Section Name&ensp; <input type="text" name="section_name" maxlength="10" required="required" size="10"  width: 10px; autofocus pattern="[A-Za-z,1-9]{1,10}" title="Only Numbers and Letters, between 1 to 10 characters" class="small_textbox" id="section_name"> &ensp; &ensp; &ensp; &ensp; Semester &emsp;<select name="semester_name" size="1" id="semester_name">
          <option value="spring17-18">2017-2018, Spring</option>
          <option value="fall17-18">2017-2018, Fall</option>
          <option value="summer17-18">2017-2018, Summer</option> 
          <option value="spring18-19">2018-2019, Spring</option>
          <option value="fall18-19">2018-2019, Fall</option>
          <option value="summer18-19">2018-2019, Summer</option>
          <option value="spring19-20">2019-2020, Spring</option>
          <option value="fall19-20">2019-2020, Fall</option>
          <option value="summer19-20">2019-2020, Summer</option>
        </select>  &ensp; &ensp; &ensp; &ensp; Course &emsp;<select name="course_name" size="1" id="course_name">
          <option value="pl1">PROGRAMMING LANGUAGE 1</option>
          <option value="pl2">PROGRAMMING LANGUAGE 2</option>
          <option value="datastructure">DATA STRUCTURE</option> 
          <option value="db">INTRODUCTION TO DATABASE</option>
          <option value="algo">ALGORITHMS</option> 
          <option value="oop1">OBJECT ORIENTED PROGRAMMING 1</option>
          <option value="oop2">OBJECT ORIENTED PROGRAMMING 2</option>
          <option value="cn">COMPUTER NETWORKS</option>
          <option value="cg">COMPUTER GRAPHICS</option> 
          <option value="webtech">WEB TECHNOLOGIES</option>
          <option value="acn">ADVANCED COMPUTER NETWORKS</option> 
          <option value="ai">ARTIFICIAL INTELLIGENCE</option>
        </select> <br/><br/><br/>
        <input type="file" name="file"> &ensp; &ensp; &ensp; &ensp;</p><center><p> <input type="submit" value="Upload" name="submit" class="button button2" id="submit" ></p></center>  
        
      </div>
    </form>

 </body>



 </html>


 <?php
}
?>