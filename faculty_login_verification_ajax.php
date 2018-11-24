<?php

require "db_connection.php";

$username1 	= $_POST['username1'];
$password1 	= $_POST['password1'];
$conn = DBconnection();
$sql = "select * from faculty_table";
$result = mysqli_query($conn,$sql);

$data = "false";
while($row = mysqli_fetch_assoc($result)){
	
	if($row['username']==$username1 && $row['password']==$password1)
	{
		$data ="true";
		
	}
	
}
echo $data;

?>