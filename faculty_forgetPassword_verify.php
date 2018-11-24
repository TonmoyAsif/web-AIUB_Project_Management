<?php
error_reporting(0);

require "db_connection.php";

if( isset($_POST['submit'])){

	$email 	= $_POST['email'];
	$is_matched = " ";
	$pass = " ";
	
	if(empty(trim($_POST['email'])))
	{
		header('location: faculty_forget_password.php?status=empty');
	}
	else
	{
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header('location: faculty_forgetPassword.php?status=wrngemail');
		}
		else
		{
			
			
			
			$conn = DBconnection();
			
			$sql= "SELECT * from faculty_table";

			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
				if($row['email']==$email)
				{
					$is_matched = "matched";
					$pass = $row['password'];
				}
				
			}

			if( $is_matched == "matched"){
				
				$to = $email;
				$subject = "Password reset for AIUB Project Management";
				$txt = "Your Password for APM is: ".$pass;

				mail($to,$subject,$txt);
				header('location: faculty_login.php?status=email_sent');
				
			}else{
				header('location: faculty_forget_password.php?status=wrong');
			}
			
			

			
			
		}
	}
	
}else
{
	echo "Invalid request";
}

?>