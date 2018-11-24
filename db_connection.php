<?php
        function DBconnection()
        {
        	$conn = mysqli_connect('localhost','root','','project_management_system');
        	return $conn;
        }
?>