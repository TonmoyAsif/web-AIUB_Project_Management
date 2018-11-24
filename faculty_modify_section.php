<?php
session_start();
if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "rule"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Select Any option!"."</p></center>";}
   
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
    <title>View/Edit Section</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Section Page">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Zaman,F.M.Asif-uz-">
    <link rel="stylesheet" type="text/css" href="faculty_properties.css">
    <link rel="stylesheet" type="text/css" href="faculty_properties_home.css">
    <link rel="stylesheet" type="text/css" href="textbox.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <style>
    
  </style>
</head>

<body style="background-color:darkslategrey;">
 <h1 id="myHeader" title="Change Password" style="padding-left: 35%;"> View / Edit Section <a style="color:darkslategrey;font-size: 70%; padding-left: 55%; " href="faculty_logout_verification.php" >Logout</a></h1>           
 <?php
 require "faculty_menu.php";
 require "db_connection.php";
 
 ?>

 <form method="post" action="faculty_modify_section_verification.php">
   <div style="margin-left:15%;padding: 1px;">
    
    <p id="myHeader1"> Section Name &ensp; <input type="text" name="section_name" maxlength="10" required="required" size="10"  width: 10px; autofocus pattern="[A-Za-z,1-9]{1,10}" title="Only Numbers and Letters, between 1 to 10 characters" class="small_textbox">  &ensp; &ensp; &ensp; Semester &emsp;<select name="semester_name" size="1">
      <option value="spring17-18">2017-2018, Spring</option>
      <option value="fall17-18">2017-2018, Fall</option>
      <option value="summer17-18">2017-2018, Summer</option> 
      <option value="spring18-19">2018-2019, Spring</option>
      <option value="fall18-19">2018-2019, Fall</option>
      <option value="summer18-19">2018-2019, Summer</option>
      <option value="spring19-20">2019-2020, Spring</option>
      <option value="fall19-20">2019-2020, Fall</option>
      <option value="summer19-20">2019-2020, Summer</option>
    </select>  &ensp; &ensp; &ensp; &ensp; Course &emsp;<select name="course_name" size="1">
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
    </select> <p><center><input type="submit" value="Go" name="submit" class="button button2" ></center> </p> 
    
  </div>
</form>



<div style="margin-left:15%;padding: 16px;">  
 <table>  
  <tr>  
   <th width="20%">Student ID</th>
   <th width="35%">Student Name</th>  
   <th width="13%">Section</th>
   <th width="12%">InGroup</th>
   <th colspan="2" width="20%">Action</th>
 </tr>  
 <?php
 if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "success"){
    $conn = DBconnection();                
    $sql= "SELECT * from student_table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
     if($row['username']==$_COOKIE['user'] && $_SESSION['subject']==$row['subject'] && $_SESSION['semester']==$row['semester'] && $_SESSION['section']==$row['section'])
     {       
      ?>  
      <tr>  
       <td><?php echo $row["student_id"]; ?></td>
       <td style="text-align: left";><?php echo $row["student_name"]; ?></td>
       <td><?php echo $row["section"]; ?></td>
       <td><?php echo $row["inGroup"]; ?></td> 
       <td onclick="addGroup(this)" id="<?php echo $row["student_id"]; ?>" ><input type="button" name="view" value="Add to Group" /></td>
       <td onclick="removeId(this)" id="<?php echo $row["student_id"]; ?>" ><input type="button" name="view" value="Remove"  /></td>  
     </tr>  
     <?php  
   }
   
 }
 //unset($_SESSION["semester"]);
 //unset($_SESSION["subject"]);
 //unset($_SESSION["section"]);
}
}
?>  
</table>  
</div>

<script type="text/javascript">

      function addGroup(el) {
        
        var s_id = el.id;
        
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.open('POST', 'faculty_modify_section_verification1.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var s_id1 = "s_id1="+s_id;
        xmlHttp.send(s_id1);

        xmlHttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status==200)
          {
            myFunction();
            //alert(this.responseText); 
            


          }
        }

      }

      function removeId(el) {
        
        var s_id = el.id;
        
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.open('POST', 'faculty_modify_section_verification.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var s_id2 = "s_id2="+s_id;
        xmlHttp.send(s_id2);

        xmlHttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status==200)
          {
            myFunction();
            //alert(this.responseText); 
          }
        }
      }

      function myFunction() {
        location.reload();
        }



    </script>  


</body>

</html>


<?php
}
?>