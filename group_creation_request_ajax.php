<?php

require "db_connection.php";
$conn = DBconnection();
$faculty = $_COOKIE['user'];



if(isset($_POST['s_id2']))
{
	$student_user=$_POST['s_id2'];

	$sql=" SELECT * FROM faculty_group_joining_details WHERE faculty_user='$faculty' AND student_user='$student_user' ";
	$query = mysqli_query($conn,$sql);


	while($row = mysqli_fetch_assoc($query)){

		$semester=$row['semester'];
		$subject=$row['subject'];
		$section=$row['section'];
		$project_title=$row['project_title'];
	}


		$query2 = "DELETE FROM faculty_group_joining_details WHERE faculty_user='$faculty' AND student_user='$student_user' ;
        mysqli_query($conn, $query2);

        echo "Student Request Rejected";

	

	

}

?>