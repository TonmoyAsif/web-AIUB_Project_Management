<?php
session_start();	
error_reporting(0);

require "db_connection.php";

if( isset($_POST['submit'])){

  $groupNumber 	= trim($_POST['group_number']);
  $semesterName 	= trim($_POST['semester_name']);
  $subjectName 	= trim($_POST['subject_name']);
  $sectionName  = trim($_POST['section_name']);
  $projectTitle   = trim($_POST['project_title']);
  $description  = trim($_POST['description']);
  $username = $_COOKIE['user'];
  $is_group_used = '';
  $total_group_members = trim($_POST['no_of_member']);

  $std_name1 = trim($_POST['s_name1']);
  $std_id1 = trim($_POST['s_id1']);
  $std_name2 = trim($_POST['s_name2']);
  $std_id2 = trim($_POST['s_id2']);


  
  if(empty(trim($_POST['group_number'])) || empty(trim($_POST['project_title'])) || empty(trim($_POST['description'])) )
  {
    header('location: faculty_create_group.php?status=rule');
}
else
{
  
   $conn = DBconnection();
   
   $sql= "SELECT * from group_list_table";

   $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)){
      if($row['user']== $username && $row['subject']== $subjectName && $row['semester']== $semesterName && $row['section']== $sectionName && $row['group_number']== $groupNumber)
      {
        $is_group_used = "used";
    }
    
}



if($is_group_used != "used")
{

    $conn = DBconnection();
    $sql = "INSERT INTO `group_list_table` VALUES ('','$username','$semesterName','$subjectName','$sectionName','$groupNumber','$projectTitle','$description','total_group_members')";
    if(!mysqli_query($conn,$sql))
    {
        echo "Error inserting data into database";
    }
    else
    {
      $sql1 = "INSERT INTO `group_student_table` VALUES ('','$username','$semesterName','$subjectName','$sectionName','$groupNumber','$std_name1','$std_id1')";
      $sql2 = "INSERT INTO `group_student_table` VALUES ('','$username','$semesterName','$subjectName','$sectionName','$groupNumber','$std_name2','$std_id2')";
      mysqli_query($conn,$sql1);
      mysqli_query($conn,$sql2);
      header('location: faculty_create_group.php?status=success');
  }     
}
else{
    header('location: faculty_create_group.php?status=used');
}
}
}
else{
    echo "Invalid request";
}

?>