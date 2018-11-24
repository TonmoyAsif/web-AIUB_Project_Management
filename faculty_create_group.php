<?php
session_start();
if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "rule"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Please Follow Group Creation Rules!"."</p></center>";}
   if($status == "success"){
     echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Group Created Successfully"."</p></center>";}
     if($status == "used"){
       echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Group number already in the Group list"."</p></center>";}
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
  <h1 id="myHeader" title="Change Password" style="padding-left: 40%;"> Create Group <a style="color:darkslategrey;font-size: 70%; padding-left: 60%; " href="faculty_logout_verification.php" >Logout</a></h1>           
  <?php
  require "faculty_menu.php";
  ?>

  <form method="post" action="faculty_create_group_verification.php">
   <div style="margin-left:17%;padding: 14px;">
    
    <p id="myHeader1" >Group No <input type="text" name="group_number" maxlength="10" required="required" size="7"  width: 7px; autofocus pattern="[1-9]{1,10}" title="Only Numbers between 1 to 10 characters" class="small_textbox"> &ensp; &ensp; Semester <select name="semester_name" size="1">
          <option value="spring17-18">2017-2018, Spring</option>
          <option value="fall17-18">2017-2018, Fall</option>
          <option value="summer17-18">2017-2018, Summer</option> 
          <option value="spring18-19">2018-2019, Spring</option>
          <option value="fall18-19">2018-2019, Fall</option>
          <option value="summer18-19">2018-2019, Summer</option>
          <option value="spring19-20">2019-2020, Spring</option>
          <option value="fall19-20">2019-2020, Fall</option>
          <option value="summer19-20">2019-2020, Summer</option> 
    </select>  &ensp; &ensp; Subject <select name="subject_name" size="1">
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
    </select> &ensp; &ensp; Section <select name="section_name" size="1">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option> 
      <option value="D">D</option>
      <option value="E">E</option> 
      <option value="F">F</option>
    </select></p>
    <p id="myHeader1">Project Title &ensp; <input type="text" name="project_title" maxlength="80" size="88"  width: 50px; class="small_textbox"></p>
    <p id="myHeader1">Description &ensp;  <textarea rows="7" cols="80" class="small_textboxx" name="description"></textarea> </p>
    <p id="myHeader1">No of Members &ensp;  <input type="number" name="no_of_member" id="no_of_member" min="1" max="5" onblur="createFields1()"> </p>
    <div id="go"></div>
    <div class="myHeaderx" id="s_block0" style="display: none;padding: 8px;font-size: 150%;text-align: center">Name <input type='text' name='s_name1' class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id1' class='small_textbox'></div>
    <div style="display: none;padding: 8px;font-size: 150%;text-align: center" class='myHeader11' id="s_block1">Name <input type='text' name='s_name2' class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id2' class='small_textbox'></div>
    <div style="display: none;padding: 8px;font-size: 150%;text-align: center" class='myHeader11' id="s_block2">Name <input type='text' name='s_name3' class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id3' class='small_textbox'></div>
    <div style="display: none;padding: 8px;font-size: 150%;text-align: center" class='myHeader11' id="s_block3">Name <input type='text' name='s_name4' class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id4' class='small_textbox'></div>
    <div style="display: none;padding: 8px;font-size: 150%;text-align: center" class='myHeader11' id="s_block4">Name <input type='text' name='s_name5' class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id5' class='small_textbox'></div>
    <center><input type="submit" value="Create" name="submit" class="button button2"> </center> 
    
  </div>
</form>



</body>

<script type="text/javascript">
        function createFields() {
            var total_members = document.getElementById('no_of_member').value;
            var state = true;
            var decision = " ";
              document.getElementById('go').innerHTML="";
            for (var i = 0; i < total_members; i++) {
              document.getElementById('go').innerHTML=document.getElementById('go').innerHTML+"<div id='myHeader1'>Name <input type='text' name='s_name'+i class='small_textbox'> &ensp; &ensp;&ensp; &ensp; ID <input type='text' name='s_id'+i class='small_textbox'></div>";
            }

            
            
        }

        function createFields1() {
            var total_members = document.getElementById('no_of_member').value;
            var x='s_block';

            for (var i = 0; i < 5; i++){

              document.getElementById(x+i).style.display = "none";
              document.getElementById(x+i).style.color = "white";
             
                        
            }

            for (var i = 0; i < total_members; i++){

              document.getElementById(x+i).style.display = "block";
              document.getElementById(x+i).style.color = "white";
             
                        
            }

            
            
        }
    </script>

</html>

<?php
}
?>