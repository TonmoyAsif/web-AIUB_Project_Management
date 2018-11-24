<?php
session_start();	
error_reporting(0);

if( isset($_POST['submit'])){

  
  $semesterName1 	= $_POST['semester_name'];
  $courseName1 	= $_POST['course_name'];
  $username = $_COOKIE['user'];
  
  
  if(empty(trim($_POST['semester_name'])) || empty(trim($_POST['course_name'])) )
  {
    header('location: faculty_view_sections.php?status=rule');
}
else
{

 $_SESSION['semester1']=$semesterName1;
 $_SESSION['subject1']=$courseName1;
 header('location: faculty_view_sections.php?status=success');
 
}
}
else{
    echo "Invalid request";
}

?>