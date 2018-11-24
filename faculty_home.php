<?php

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
		<title>Faculty Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Faculty Login Page">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="Zaman,F.M.Asif-uz-">
		<link rel="stylesheet" type="text/css" href="faculty_properties.css">
		<link rel="stylesheet" type="text/css" href="faculty_properties_home.css">
		<link rel="stylesheet" type="text/css" href="textbox.css">
		<style>
		table, th, td {
			border: 0px solid black;		
			border-collapse: collapse;		
		}
		th, td {
			padding: 15px;	
		}
		td {
			text-align: center;
		}
		table {
			border-spacing: 5px;
		}

	</style>
</head>

<body style="background-color:darkslategrey;" onload="notification()">
	<h1 id="myHeader" title="Faculty Home Page" style="padding-left: 40%;">Welcome <?php  echo($_COOKIE['user']); ?> <a style="color:darkslategrey;font-size: 70%; padding-left: 60%; " href="faculty_logout_verification.php" >Logout</a></h1>           

	<?php
	require "faculty_menu.php";
	?>

	<div style="margin-left:15%;padding-left: 16px; padding-right: 50px;">
		
		<p style="padding-top:110px;"> </p>
		<table width="100%" border="1" style="background-color:darkslategrey; ">
			
			
			<tr style="height: 20px">
				
				
				<td style="width: 23%; ">
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;padding-left: 60%;" id="section_join_notify"> </div>
				</td>
				
				
				<td style="width: 23%; ">
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;padding-left: 60%;" id="group_create_notify"> </div>
				</td>
				
				
				
				<td style="width: 23%; ">
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;padding-left: 60%;" id="group_modify_notify"> </div>
				</td>
				
				
			</tr>		


			<tr style="height: 220px">
				
				
				<td style="width: 23%; ">
					
					<a href="section_joining_request.php"><img src="icons8_Book_200px.png" alt="HTML tutorial" style="width:150px;height:150px;border:0;"></a>
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;"><b>Section Joining Request</b></div>
					
				</td>
				
				
				<td style="width: 23%; ">
					
					<a href="group_creation_request.php"><img src="icons8_Google_Classroom_200px.png" alt="HTML tutorial" style="width:150px;height:150px;border:0;"></a> 
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;"><b>Group Creation Request</b></div>
					
				</td>
				
				
				
				
				<td style="width: 23%; ">
					
					<a href="default.asp"><img src="icons8_Scorecard_200px.png" alt="HTML tutorial" style="width:150px;height:150px;border:0;"></a>
					<div style="color:white;font-family:Comic Sans MS;font-size:20px;"><b>Group Modify Request</b></div>
					
				</td>
				
				
			</tr>		
			
		</table>
	</div>


	<script type="text/javascript">

		
		function notification() {

			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'faculty_home_section_join_ajax.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          //var faculty1 = "faculty1="+faculty;
          var abc =Math.random();
          xmlHttp.send(abc);

          xmlHttp.onreadystatechange = function(){

          	if(this.readyState == 4 && this.status==200)
          	{
          		document.getElementById('section_join_notify').innerHTML = this.responseText;
          //alert(this.responseText);
      }
  }

  
  group_join_notification();
}

function group_join_notification() {

			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'faculty_home_group_join_ajax.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          //var faculty1 = "faculty1="+faculty;
          var abc =Math.random();
          xmlHttp.send(abc);

          xmlHttp.onreadystatechange = function(){

          	if(this.readyState == 4 && this.status==200)
          	{
          		document.getElementById('group_create_notify').innerHTML = this.responseText;
          //alert(this.responseText);
      }
  }

  
}
</script>

</body>

</html>

<?php
}
?>
