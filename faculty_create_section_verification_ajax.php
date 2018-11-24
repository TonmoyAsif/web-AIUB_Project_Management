<?php

require "db_connection.php";

$section_name1 	= $_POST['section_name1'];
$semester_name1 	= $_POST['semester_name1'];
$course_name1 	= $_POST['course_name1'];
$user 	= $_COOKIE['user'];
$conn = DBconnection();
$sql = "select * from section_table";
$result = mysqli_query($conn,$sql);

$data = "false";
while($row = mysqli_fetch_assoc($result)){
	
	if($row['username']==$user && $row['subject']==$course_name1 && $row['semester']==$semester_name1 && $row['section_name']==$section_name1)
	{
		$data ="true";
		
	}
	
}
echo $data;

?>