<?php	
error_reporting(0);


require "db_connection.php";



if( isset($_POST['submit'])){

	$userName 	= trim($_POST['username']);
	$password 	= trim($_POST['password']);
	$is_matched = " ";
	
	if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])) || strlen($_POST['username'])<4 || strlen($_POST['username'])>30 || strlen($_POST['password'])<4 || strlen($_POST['password'])>30)
	{
		header('location: faculty_login.php?status=rule');
	}
	else
	{
		
		$conn = DBconnection();
		$sql= "SELECT * from faculty_table";

		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result)){
			if($row['username']==$userName && $row['password']==$password)
			{
				$is_matched = "matched";
				setcookie('user',$userName,time()+3600,'/');
				
			}
			if($_POST['remember']=='on')
			{
				setcookie('remembered',$userName,time()+2592000,'/');
			}
			
		}

		if( $is_matched == "matched"){
			header('location: faculty_home.php');
			
		}else{
			header('location: faculty_login.php?status=not_matched');
		}
	}
	
	
	
	
	
}else
{
	echo "Invalid request";
}

?>