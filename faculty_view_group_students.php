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
            
 <?php
 require "db_connection.php";
 
 ?>

 <form method="post" action="faculty_modify_section_verification.php">
   <div style="padding: 1px;">
    
    
</form>



<div style="padding: 3px;">  
 <table>  
  <tr>  
   <th width="30%">Student ID</th>
   <th width="40%">Student Name</th>
   <th width="15%">Group No.</th>
   <th width="15%">Action</th>
 </tr>  
 <?php

    $user= $_GET['user'];
    $subject= $_GET['subject'];
    $semester= $_GET['semester'];
    $group= trim($_GET['group']);
    $section= $_GET['section'];

    unset($_SESSION["grp"]);

    $conn = DBconnection();                
    $sql= "SELECT * from group_student_table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      
     if($row['user']==$user && $subject==$row['subject'] && $semester==$row['semester'] && $section==$row['section'] && $group==$row['group_number'])
     {       
      ?>  
      <tr>  
       <td><?php echo $row["student_id"]; ?></td>
       <td style="text-align: left";><?php echo $row["student_name"]; ?></td>
       <td><?php echo $row["group_number"]; ?></td> 
       <td><input type="button" name="view" value="Action" id="<?php echo $row["group_number"]; ?>"  /></td>  
     </tr>  
     <?php  
   }
   
 }

?>  
</table>  
</div>  

</body>

</html>


<?php
}
?>