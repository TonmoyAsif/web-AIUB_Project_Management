<?php
session_start();
require "db_connection.php";

if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == "rule"){
		echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Select Any option!"."</p></center>";}

	}

	if(!isset($_COOKIE['user']) )
	{
		header('location: faculty_login.php');

	}
	else
	{

		?>


		<!DOCTYPE html>
		<html lang="en-US">

		<head>
			<title>Section Joining Request</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta charset="UTF-8">
			<meta name="description" content="Section Page">
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="author" content="Zaman,F.M.Asif-uz-">
			<link rel="stylesheet" type="text/css" href="faculty_properties.css">
			<link rel="stylesheet" type="text/css" href="faculty_properties_home.css">
			<link rel="stylesheet" type="text/css" href="textbox.css">
			<link rel="stylesheet" type="text/css" href="table.css">
			<style>

		</style>
	</head>

	<body style="background-color:darkslategrey;">
		<h1 id="myHeader" title="Change Password" style="padding-left: 35%;"> Request <a style="color:darkslategrey;font-size: 70%; padding-left: 55%; " href="faculty_logout_verification.php" >Logout</a></h1>           
		<?php
		require "faculty_menu.php";
		?>

		<form method="post" action="">
			<div style="margin-left:15%;padding: 1px;">



			</div>
		</form>



		<div style="margin-left:13%;padding-left: 10px; padding-right: 10px;padding-top: 80px;">  
			<table border="1">  
				<tr>  
					<th width="10%">Subject</th>
					<th width="15%">Semester</th>
					<th width="10%">Section</th>
					<th width="34%">Project Title</th>
					<th width="23%">Members</th>  
					<th colspan="2" width="8%">Accept?</th>
				</tr>  
				
			
				<?php


				$conn = DBconnection();               
				$sql= "SELECT * from faculty_group_joining_details";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){

					$user2=$_COOKIE['user'];
					if($row['faculty_user']==$_COOKIE['user'])
					{    
						$suser=$row['student_user'];
						$sql1= "SELECT * from faculty_group_joining_students where faculty_user='$user2' AND student_user='$suser' ";
						$result1 = mysqli_query($conn, $sql1);

						?>  
						<tr>  
							<td><?php echo $row["subject"]; ?></td>
							<td><?php echo $row["semester"]; ?></td>
							<td><?php echo $row["section"]; ?></td>
							<td><?php echo $row["project_title"]; ?></td>
							<td><?php while($row1 = mysqli_fetch_assoc($result1)){ echo $row1["s_id"]."<br>"  ; } ?></td> 
							<td onclick="accept(this)" id="<?php echo $row["student_user"]; ?>"> <input type="button" name="accept" value="Yes"> </td>
							<td onclick="reject(this)" id="<?php echo $row["student_user"]; ?>"> <input type="button" name="reject" value="No"> </td> 
						</tr>  
						<?php  
					}

				}



				?>
				

			</table>  
		</div>


		<script type="text/javascript">

			function accept(el) {
				
				var s_id = el.id;
				
				var xmlHttp = new XMLHttpRequest();

				xmlHttp.open('POST', 'group_creation_request_ajax.php', true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var s_id1 = "s_id1="+s_id;
				xmlHttp.send(s_id1);

				xmlHttp.onreadystatechange = function(){

					if(this.readyState == 4 && this.status==200)
					{
						myFunction();
						//alert(this.responseText); 
						


					}
				}

			}

			function reject(el) {
				
				var s_id = el.id;
				
				var xmlHttp = new XMLHttpRequest();

				xmlHttp.open('POST', 'group_creation_request_ajax.php', true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var s_id2 = "s_id2="+s_id;
				xmlHttp.send(s_id2);
				alert(s_id);

				xmlHttp.onreadystatechange = function(){

					if(this.readyState == 4 && this.status==200)
					{
						myFunction();
						//alert(this.responseText); 
					}
				}
			}

			function myFunction() {
    		location.reload();
				}



		</script>  

	</body>

	</html>


	<?php
}
?>