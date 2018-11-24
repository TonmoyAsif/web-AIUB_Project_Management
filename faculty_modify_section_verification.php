<?php
session_start();	
error_reporting(0);
require "db_connection.php";
$conn = DBconnection();


if( isset($_POST['submit'])){

	$sectionName 	= $_POST['section_name'];
	$semesterName 	= $_POST['semester_name'];
	$courseName 	= $_POST['course_name'];
	$username = $_COOKIE['user'];
	
	
	if(empty(trim($_POST['semester_name'])) || empty(trim($_POST['course_name'])) || empty(trim($_POST['section_name'])) )
	{
		header('location: faculty_modify_section.php?status=rule');
	}
	else
	{

		$_SESSION['semester']=$semesterName;
		$_SESSION['subject']=$courseName;
		$_SESSION['section']=$sectionName;
		header('location: faculty_modify_section.php?status=success');
		
	}
}


if(isset($_POST['s_id1']))
{
	$student_id=$_POST['s_id1'];

	$sql=" SELECT * FROM section_join_table WHERE faculty='$faculty' AND student_id='$student_id' ";
	$query = mysqli_query($conn,$sql);


	while($row = mysqli_fetch_assoc($query)){

		$semester=$row['semester'];
		$subject=$row['subject'];
		$section=$row['section'];
		$student_name=$row['student_name'];
	}


	$sql1=" SELECT * FROM student_table WHERE username='$faculty' AND subject='$subject' AND semester='$semester' AND section='$section' AND student_id='$student_id' ";
	$query1 = mysqli_query($conn,$sql1);


	if(mysqli_num_rows($query1)>0)
	{
		echo "Student already in the Section";
	}
	else
	{
		$sql2 = "INSERT INTO `student_table` VALUES ('','$faculty','$subject','$semester','$section','CSE','$student_name','$student_id','No')";
		mysqli_query($conn,$sql2);

		$query2 = "DELETE FROM section_join_table WHERE faculty='$faculty' AND student_id='$student_id' AND semester='$semester' AND subject='$subject'";
        mysqli_query($conn, $query2);

        echo "Student added to section Successfully";
	}

}

if(isset($_POST['s_id2']))
{
	$student_id=$_POST['s_id2'];
	$semesterx=$_SESSION['semester'];
	$coursex=$_SESSION['subject'];
	$sectionx=$_SESSION['section'];
	$userx= $_COOKIE['user'];

	$query2 = "DELETE FROM student_table WHERE username='$userx' AND subject='$coursex' AND semester='$semesterx' AND section='$sectionx' AND student_id='$student_id' ";
        mysqli_query($conn, $query2);

        echo "Done";
	

}

?>