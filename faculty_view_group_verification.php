<?php
session_start();	
error_reporting(0);

if( isset($_POST['submit'])){

  
  $semesterName2 	= $_POST['semester_name'];
  $courseName2 	= $_POST['course_name'];
  $username = $_COOKIE['user'];
  $sectionName2 	= $_POST['section_name'];
  
  
  if(empty(trim($_POST['semester_name'])) || empty(trim($_POST['course_name'])) || empty(trim($_POST['section_name'])) )
  {
    header('location: faculty_view_groups.php?status=rule');
}
else
{

 $_SESSION['semester2']=$semesterName2;
 $_SESSION['subject2']=$courseName2;
 $_SESSION['section2']=$sectionName2;
 header('location: faculty_view_groups.php?status=success');
 
}
}
else{
    echo "Invalid request";
}

?>