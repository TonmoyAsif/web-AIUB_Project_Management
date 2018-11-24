<?php

require "db_connection.php";
$conn = DBconnection();

if(isset($_POST['username']))
{
	$username=$_POST['username'];

	$sql=" SELECT username FROM faculty_table WHERE username='$username' ";
	$query = mysqli_query($conn,$sql);


	if(mysqli_num_rows($query)>0)
	{
		echo "User Name Already Exist";
	}
	else
	{
		echo "OK";
	}
	exit();
}

if(isset($_POST['email']))
{
	$email=$_POST['email'];

	$sql=" SELECT email FROM faculty_table WHERE email='$email' ";
	$query = mysqli_query($conn,$sql);


	if(mysqli_num_rows($query)>0)
	{
		echo "E-mail Already Exist";
	}
	else
	{
		echo "OK";
	}
	exit();
}
?>