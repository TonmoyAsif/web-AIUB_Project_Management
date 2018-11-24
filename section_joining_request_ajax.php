<?php

require "db_connection.php";
$conn = DBconnection();
$faculty = $_COOKIE['user'];

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

	$sql=" SELECT * FROM section_join_table WHERE faculty='$faculty' AND student_id='$student_id' ";
	$query = mysqli_query($conn,$sql);


	while($row = mysqli_fetch_assoc($query)){

		$semester=$row['semester'];
		$subject=$row['subject'];
		$section=$row['section'];
		$student_name=$row['student_name'];
	}


		$query2 = "DELETE FROM section_join_table WHERE faculty='$faculty' AND student_id='$student_id' AND semester='$semester' AND subject='$subject'";
        mysqli_query($conn, $query2);

        echo "Student Request Rejected";

	

	

}

?>