<?php

require "db_connection.php";
$conn = DBconnection();

$faculty = $_COOKIE['user'];

$sql=" SELECT student_user FROM faculty_group_joining_details WHERE faculty_user='$faculty' ";
$query = mysqli_query($conn,$sql);


$count = "<span style='background-color:red;width:200px;border: 1px solid #000;border-radius: 25px;padding: 8px; '>".mysqli_num_rows($query)."</span>";

echo $count;

?>