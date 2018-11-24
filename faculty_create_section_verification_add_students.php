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
  $filename = explode(".", $_FILES['file']['name']);

  
  if(empty(trim($_POST['section_name'])) || empty(trim($_POST['semester_name'])) || empty(trim($_POST['course_name'])) || strlen($_POST['section_name'])>10 || strlen($_POST['section_name'])<1 )
  {
    header('location: faculty_create_section_add_students.php?status=rule');
}
else
{
  
   $conn = DBconnection();
   
     if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
                $item1 = mysqli_real_escape_string($conn, $data[0]);  
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                $item3 = mysqli_real_escape_string($conn, $data[2]);


                $sql1=" SELECT * FROM student_table WHERE username='$username' AND subject='$courseName' AND semester='$semesterName' AND section='$sectionName' AND student_id='$item2' ";
                $query1 = mysqli_query($conn,$sql1);

                  if(!mysqli_num_rows($query1)>0)
                  {
                   $query = "INSERT into `student_table` values('','$username','$courseName','$semesterName','$sectionName','$item3','$item1','$item2','No')";
                mysqli_query($conn, $query);
                  }          
   }
   fclose($handle);
   header('location: faculty_create_section_add_students.php?status=success');
  }




}
}
else{
    echo "Invalid request";
}

?>
