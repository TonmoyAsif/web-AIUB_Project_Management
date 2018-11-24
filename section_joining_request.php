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
			<table>  
				<tr>  
					<th width="12%">Subject</th>
					<th width="14%">Semester</th>
					<th width="10%">Section</th>
					<th width="20%">Student ID</th>
					<th width="30%">Student Name</th>  
					<th colspan="2" width="14%">Accept?</th>
				</tr>  
				
			
				<?php


				$conn = DBconnection();               
				$sql= "SELECT * from section_join_table";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){

					if($row['faculty']==$_COOKIE['user'])
					{       
						?>  
						<tr>  
							<td><?php echo $row["subject"]; ?></td>
							<td><?php echo $row["semester"]; ?></td>
							<td><?php echo $row["section"]; ?></td>
							<td><?php echo $row["student_id"]; ?></td>
							<td style="text-align: left";><?php echo $row["student_name"]; ?></td> 
							<td onclick="accept(this)" id="<?php echo $row["student_id"]; ?>"> <input type="button" name="accept" value="Yes"> </td>
							<td onclick="reject(this)" id="<?php echo $row["student_id"]; ?>"> <input type="button" name="reject" value="No"> </td> 
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

				xmlHttp.open('POST', 'section_joining_request_ajax.php', true);
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

				xmlHttp.open('POST', 'section_joining_request_ajax.php', true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var s_id2 = "s_id2="+s_id;
				xmlHttp.send(s_id2);

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