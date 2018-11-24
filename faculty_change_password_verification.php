<?php
error_reporting(0);

require "db_connection.php";


if( isset($_POST['submit'])){

  $old_password 	= trim($_POST['old_password']);
  $new_password 	= trim($_POST['new_password']);
  $re_password 	= trim($_POST['re_password']);

  $is_matched = " ";
  $user = $_COOKIE['user'];
  
  
  if(empty(trim($_POST['old_password'])) || empty(trim($_POST['new_password'])) || empty(trim($_POST['re_password'])) )
  {
    header('location: faculty_change_password.php?status=empty');
  }
  else
  {
    
    if (!preg_match("/^[a-zA-Z,1-9]*$/",$old_password) || !preg_match("/^[a-zA-Z,1-9]*$/",$new_password) || !preg_match("/^[a-zA-Z,1-9]*$/",$re_password)) {
      header('location: faculty_change_password.php?status=rule');
    }
    else
    {
      if ($new_password != $re_password) {
        header('location: faculty_change_password.php?status=both_matched');
      }
      else
      {
        
        
       $conn = DBconnection();               
       $sql= "SELECT * from faculty_table";

       $result = mysqli_query($conn, $sql);

       while($row = mysqli_fetch_assoc($result)){
        if($row['password']==$old_password && $row['username']== $user)
        {
          $is_matched = "matched";
        }
        
      }
      
      if($is_matched == "matched")
      {
       $conn = DBconnection();
       $sql = "UPDATE `faculty_table` SET `password`= '$new_password' WHERE `username`= '$user' ";
       if(!mysqli_query($conn,$sql))
       {
        echo "Error updating Password into database";
      }
      else
      {
        header('location: faculty_change_password.php?status=success');  
      }
      
    }
    else
    {
      header('location: faculty_change_password.php?status=not_matched');  
    }
    

    
  }  
}


}


}

else
{
  echo "Invalid request";
}

?>