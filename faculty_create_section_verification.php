<?php
session_start();	
error_reporting(0);

require "db_connection.php";

if( isset($_POST['submit'])){

  $sectionName 	= trim($_POST['section_name']);
  $semesterName 	= trim($_POST['semester_name']);
  $courseName 	= trim($_POST['course_name']);
  $username = $_COOKIE['user'];
  $is_section_used = '';
  
  if(empty(trim($_POST['section_name'])) || empty(trim($_POST['semester_name'])) || empty(trim($_POST['course_name'])) || strlen($_POST['section_name'])>10 || strlen($_POST['section_name'])<1 )
  {
    header('location: faculty_create_section.php?status=rule');
}
else
{
  
   $conn = DBconnection();
   
   $sql= "SELECT * from section_table";

   $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)){
      if($row['username']== $username && $row['subject']== $courseName && $row['semester']== $semesterName && $row['section_name']== $sectionName)
      {
        $is_section_used = "used";
    }
    
}



if($is_section_used != "used")
{
    $sectionLink = 'APM+t'.$_COOKIE['user'].'O+n'.$courseName.'M+o'.$semesterName.'y+a'.$sectionName.'S+if';
    
    $conn = DBconnection();
    $sql = "INSERT INTO `section_table` VALUES ('','$username','$courseName','$semesterName','$sectionName','$sectionLink')";
    if(!mysqli_query($conn,$sql))
    {
        echo "Error inserting data into database";
    }
    else
    {
      header('location: faculty_create_section.php?status=success');
      $_SESSION['section']=$sectionLink;
  }     
}
else{
    header('location: faculty_create_section.php?status=used');
}
}
}
else{
    echo "Invalid request";
}

?>