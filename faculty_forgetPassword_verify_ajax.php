<?php

require "db_connection.php";
$conn = DBconnection();

if(isset($_POST['email']))
{
	$email=$_POST['email'];

	$sql=" SELECT email FROM faculty_table WHERE email='$email' ";
	$query = mysqli_query($conn,$sql);


	if(mysqli_num_rows($query)>0)
	{
		echo "OK";
	}
	else
	{
		echo "Not Matched";
	}
	exit();
}
?>