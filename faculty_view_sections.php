<?php
session_start();
require "db_connection.php";

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
    <title>View Sections</title>
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
  <h1 id="myHeader" title="Change Password" style="padding-left: 40%;"> View Sections <a style="color:darkslategrey;font-size: 70%; padding-left: 60%; " href="faculty_logout_verification.php" >Logout</a></h1>           
  <?php
  require "faculty_menu.php";
  ?>

  <form method="post" action="faculty_view_section_verification.php">
   <div style="margin-left:15%;padding: 16px;">
    
    <p id="myHeader1">Semester &emsp;<select name="semester_name" size="1">
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
    </select> &ensp; &ensp; &ensp; &ensp; <input type="submit" value="Go" name="submit" class="button button2" > </p> 
    
  </div>
</form>



<div style="margin-left:15%;padding: 16px;">  
 <table>  
  <tr>  
   <th width="20%">Section Name</th>
   <th width="60%">Section Link</th>  
   <th width="10%">Count</th>
   <th width="10%">View</th> 
 </tr>  
 <?php
 if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "success"){
    $conn = DBconnection();


      $userRow= $_COOKIE['user'];
      $subjectRow= $_SESSION['subject1'];
      $semesterRow= $_SESSION['semester1'];

    $sql= "SELECT * from section_table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
     if($row['username']==$_COOKIE['user'] && $_SESSION['subject1']==$row['subject'] && $_SESSION['semester1']==$row['semester'])
     {  
         $sectionRow = $row['section_name'];
          $sql1=" SELECT username FROM student_table WHERE username='$userRow' AND subject='$subjectRow' AND semester='$semesterRow' AND section='$sectionRow' ";
          $query1 = mysqli_query($conn,$sql1);
          $num = mysqli_num_rows($query1);
      ?>  
      <tr>  
       <td><?php echo $row["section_name"]; ?></td>
       <td style="text-align: left";><?php echo $row["section_link"]; ?></td>
       <td><?php echo $num; ?></td> 
       <td><input type="button" name="view" onclick="openpopup1(this)" value="view" id="<?php echo $row["section_name"]; ?>"  /></td>  
     </tr>  
     <?php  
   }
   
 }
 
}

//unset($_SESSION["semester1"]);
//unset($_SESSION["subject1"]);
}
?>  
</table>  
</div> 


<script type="text/javascript">

      function openpopup1(el) {
        

        var s_id = el.id;
        var decision;
        
        
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.open('POST', 'faculty_view_section_session_start.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var s_id1 = "s_id1="+s_id;
        xmlHttp.send(s_id1);
        

        xmlHttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status==200)
          {
            
          decision=this.responseText;
          

            
             var mywindow = window.open('faculty_view_section_students.php?user=<?php print($userRow);?>&subject=<?php print($subjectRow);?>&semester=<?php print($semesterRow);?>&section='+decision+'','_blank','location=no,status=no,height=400,width=800,top=200,left=400');

          }
            
           
        }

       


      }

</script> 

</body>

</html>


<?php
}
?>