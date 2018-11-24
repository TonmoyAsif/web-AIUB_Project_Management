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

  <form method="post" action="faculty_view_group_verification.php">
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
    </select>  &ensp; Course &emsp;<select name="course_name" size="1">
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
    </select> &ensp; Section &emsp;<select name="section_name" size="1">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option> 
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <option value="G">G</option>
      <option value="H">H</option>
      <option value="I">I</option>
    </select>  &ensp;   <input type="submit" value="Go" name="submit" class="button button2" > </p> 
    
  </div>
</form>



<div style="margin-left:15%;padding: 16px;">  
 <table>  
  <tr>  
   <th width="20%">Group Name</th>
   <th width="60%">Project Title</th>  
   <th width="10%">Count</th>
   <th width="10%">View</th> 
 </tr>  
 <?php
 if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "success"){
    $conn = DBconnection();


      $userRow= $_COOKIE['user'];
      $subjectRow= $_SESSION['subject2'];
      $semesterRow= $_SESSION['semester2'];
      $sectionRow= $_SESSION['section2'];

    $sql= "SELECT * from group_list_table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
     if($row['user']==$_COOKIE['user'] && $_SESSION['subject2']==$row['subject'] && $_SESSION['semester2']==$row['semester'] && $_SESSION['section2']==$row['section'])
     {  
          $groupRow= $row['group_number'];
          $sql1=" SELECT user FROM group_student_table WHERE user='$userRow' AND subject='$subjectRow' AND semester='$semesterRow' AND section='$sectionRow' AND group_number='$groupRow' ";
          $query1 = mysqli_query($conn,$sql1);
          $num = mysqli_num_rows($query1);
      ?>  
      <tr>  
       <td><?php echo $row["group_number"]; ?></td>
       <td style="text-align: left";><?php echo $row["project_title"]; ?></td>
       <td><?php echo $num; ?></td> 
       <td><input type="button" name="view" onclick="openpopup1(this)" value="view" id="<?php echo $row["group_number"]; ?>"  /></td>  
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
        

        var g_id = el.id;
        var decision;
        
        
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.open('POST', 'faculty_view_group_session_start.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var g_id1 = "g_id1="+g_id;
        xmlHttp.send(g_id1);


        xmlHttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status==200)
          {
            decision=this.responseText;

             var mywindow = window.open('faculty_view_group_students.php?user=<?php echo $userRow;?>&subject=<?php echo $subjectRow;?>&semester=<?php echo $semesterRow;?>&group='+decision+'&section=<?php echo $sectionRow;?>','_blank','location=no,status=no,height=400,width=800,top=200,left=400');

          }
            
           
        }

       


      }

</script> 

</body>

</html>


<?php
}
?>