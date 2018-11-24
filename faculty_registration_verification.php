<?php
error_reporting(0);

require "db_connection.php";

if( isset($_POST['submit'])){

  $name 	= $_POST['name'];
  $username 	= trim($_POST['username']);
  $email 	= trim($_POST['email']);
  $password 	= trim($_POST['password']);
  $repassword = trim($_POST['repassword']);
  $department = $_POST['department'];
  $is_username_used = " ";
  $is_email_used = " ";
  
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])) || empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['repassword'])) || empty(trim($_POST['department'])))
  {
    header('location: faculty_registration.php?status=empty');
  }
  else
  {
    
    if (!preg_match("/^[a-zA-Z,1-9]*$/",$username) || !preg_match("/^[a-zA-Z,1-9]*$/",$password) || !preg_match("/^[a-zA-Z,1-9]*$/",$repassword)) {
      header('location: faculty_registration.php?status=rule');
    }
    else
    {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: faculty_registration.php?status=wrngemail');
      }
      else
      {
        if($password == $repassword)
        {
          
          $conn = DBconnection();
          
          $sql= "SELECT * from faculty_table";

          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)){
            if($row['username']==$username)
            {
              $is_username_used = "used";
            }
            if($row['email'] == $email)
            {
              $is_email_used = "used";
            }
          }
          
          if($is_email_used != "used" && $is_username_used != "used")
          {
            $sql = "INSERT INTO `faculty_table` VALUES ('','$username','$password','$email','$name','$department')";
            if(!mysqli_query($conn,$sql))
            {
              echo "Error inserting data into database";
            }
            else
            {
              header('location: faculty_login.php?status=success');  
            }
            
          }
          else
          {
           if($is_email_used == "used")
           {
            header('location: faculty_registration.php?status=email_taken');  
          }
          else if($is_username_used == "used")
          {
            header('location: faculty_registration.php?status=username_taken');  
          }
          
        }
        
        
        
      }else{
       header('location: faculty_registration.php?status=password');
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