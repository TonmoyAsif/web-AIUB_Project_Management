<?php

if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "error"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Something went wrong! Try again"."</p></center>";
 }
 if($status == "empty"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Fields Can not be Empty "."</p></center>";
 }
 if($status == "password"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Password do not matched"."</p></center>";
 }
 if($status == "rule"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Follow Signup Rules"."</p></center>";
 }
 if($status == "wrngemail"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Enter Valid Email Address"."</p></center>";
 }
 if($status == "username_taken"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Username already taken"."</p></center>";
 }
 if($status == "email_taken"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Email already taken"."</p></center>";
 }
 
}

?>


<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Faculty Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="description" content="Faculty Registration Page">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Zaman,F.M.Asif-uz-">
  <link rel="stylesheet" type="text/css" href="faculty_properties.css">
  <link rel="stylesheet" type="text/css" href="textbox.css">
  <style>
  .city {
    line-height: 250%;
  }
  
</style>
</head>

<body style="background-color:darkslategrey;">
  <h1 id="myHeader" title="Faculty Registration Page">Faculty Registration</h1>
  <!-- <h2 class="city">London</h2>-->
  <div><img src="projectLogoBig.png" alt="Smiley face" style="float:left;width:300px;height:300px;padding-top:4%;padding-left:10%;">
    <form class="city" style="padding-left: 48%" method="post" action="faculty_registration_verification.php" onSubmit="return allCheck()">
      <div id="block_container">
        <span>Name &emsp; &emsp; &emsp; &emsp; &ensp;<input type="text" name="name" class="textbox1" maxlength="40" required="required" size="30" autofocus id="name" onblur="nameCheck()"> </span> <span class="warning" id="nameAlert" > </span>
      </div>
      <div id="block_container">
        <span>Username &emsp; &emsp; &emsp;<input type="text" name="username" maxlength="30" class="textbox1" required="required" size="30" autofocus pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters, between 4 to 30 characters" id="username" onblur="usernameCheck()"> </span> <span class="warning" id="usernameAlert" > </span>
      </div>
      <div id="block_container">
        <span>Email &emsp; &emsp; &emsp; &emsp; &ensp; &nbsp;<input type="email" name="email"  class="textbox1" size="30" required="required" autocomplete="on" id="email" onblur="emailCheck()"> </span> <span class="warning" id="emailAlert" > </span>
      </div>
      <div id="block_container">
        <span>Password &emsp; &emsp; &emsp; &nbsp;<input type="password" name="password" class="textbox1" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" id="password" onblur="passwordCheck()"> </span> <span class="warning" id="passwordAlert" > </span>
      </div>
      <div id="block_container">
        <span>Confirm Password &ensp;<input type="password" name="repassword" class="textbox1" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" id="repassword" onblur="repasswordCheck()"> </span> <span class="warning" id="repasswordAlert" > </span>
      </div>
      <div id="block_container">
        <span>Department &emsp; &emsp; &emsp;<select name="department" size="1" id="department" onblur="departmentCheck()">
          <option value="CSE">CSE</option>
          <option value="CSSE">CSSE</option>
          <option value="SE">SE</option> 
          <option value="EEE">EEE</option>
          <option value="ARCH">Arch.</option>
          <option value="BBA">BBA</option>
        </select> </span> <span class="warning" id="departmentAlert" > </span>
      </div>

      &emsp; &emsp; &ensp;<input type="submit" value="Register" name="submit" class="button button2"> &nbsp; &emsp;
      <input type="reset" name="reset" class="button button2" id="register"> <br/>
      <p style="font-size: 80%">Already Registered? Login as<a href="faculty_login.php" title="Faculty Login Page" > Faculty</a></p>
    </form>
  </div>


  <script type="text/javascript">

    function nameCheck() {
      var name = document.getElementById('name').value;
      if(name == ""){
        var error = document.getElementById('nameAlert');
        error.innerHTML = " &ensp; can't left empty!";
        error.style.color = 'white';
        
      }
      else if(name.length <= 3){
        var error = document.getElementById('nameAlert');
        error.innerHTML = " &ensp; Minimum character needed!";
        error.style.color = 'white';
        
      }else
      {
        document.getElementById('nameAlert').innerHTML = "OK";
      }
    }


    function usernameCheck() {
      var username = document.getElementById('username').value;
      if(username == ""){
        var error = document.getElementById('usernameAlert');
        error.innerHTML = " &ensp; can't left empty!";
        error.style.color = 'white';
        
      }
      else if(username.length <= 3 || username.length >= 31){
        var error = document.getElementById('usernameAlert');
        error.innerHTML = " &ensp; between 4 to 30 characters!";
        error.style.color = 'white';
        
      }else
      {
        var username1=document.getElementById( "username" ).value;
        if(username1)
        { 
          var xmlHttp = new XMLHttpRequest();

          xmlHttp.open('POST', 'faculty_registration_verification_ajax.php', true);
          xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          var username = "username="+document.getElementById('username').value;
          xmlHttp.send(username);

          xmlHttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status==200)
            {
          //alert(this.responseText);
          document.getElementById('usernameAlert').innerHTML = this.responseText;
          //alert(this.responseText);
        }
      }

    }
  }
}

function emailCheck() {
  var email = document.getElementById('email').value;
  var x=document.getElementById('email').value;  
  var atposition=x.indexOf("@");  
  var dotposition=x.lastIndexOf(".");
  if(email == ""){
    var error = document.getElementById('emailAlert');
    error.innerHTML = " &ensp; can't left empty!";
    error.style.color ='white';

  }
  else if(atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
    var error = document.getElementById('emailAlert');
    error.innerHTML = " &ensp; Invalid Email Address!";
    error.style.color = 'white';

  }else
  {
    var email1=document.getElementById( "email" ).value;
    if(email1)
    { 
     var xmlHttp = new XMLHttpRequest();

     xmlHttp.open('POST', 'faculty_registration_verification_ajax.php', true);
     xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     var email = "email="+document.getElementById('email').value;
     xmlHttp.send(email);

     xmlHttp.onreadystatechange = function(){

      if(this.readyState == 4 && this.status==200)
      {
          //alert(this.responseText);
          document.getElementById('emailAlert').innerHTML = this.responseText;
          //alert(this.responseText);
        }
      }

    }
  }
}

function passwordCheck() {
  var password = document.getElementById('password').value;
  var repassword = document.getElementById('repassword').value;
  if(password == ""){
    var error = document.getElementById('passwordAlert');
    error.innerHTML = " &ensp; can't left empty!";
    error.style.color ='white';

  }
  else if(password.length <= 3 || password.length >= 31){
    var error = document.getElementById('passwordAlert');
    error.innerHTML = " &ensp;between 4 to 30 characters!";
    error.style.color = 'white';

  }else
  {
    document.getElementById('passwordAlert').innerHTML = "OK";
  }

}

function repasswordCheck() {
  var password = document.getElementById('password').value;
  var repassword = document.getElementById('repassword').value;
  if(repassword == ""){
    var error = document.getElementById('repasswordAlert');
    error.innerHTML = " &ensp; can't left empty!";
    error.style.color ='white';

  }
  else if(repassword.length <= 3 || repassword.length >= 31){
    var error = document.getElementById('repasswordAlert');
    error.innerHTML = " &ensp;between 4 to 30 characters!";
    error.style.color = 'white';

  }
  else if(repassword != password){
    var error = document.getElementById('repasswordAlert');
    error.innerHTML = " &ensp; Not matched!";
    error.style.color = 'white';

  }else
  {
    document.getElementById('repasswordAlert').innerHTML = "OK";
  }
}

function departmentCheck() {
  var department = document.getElementById('department').value;
  if(department == ""){
    var error = document.getElementById('departmentAlert');
    error.innerHTML = " &ensp; can't left empty!";
    error.style.color ='white';

  }else
  {
    document.getElementById('departmentAlert').innerHTML = "";
  }
}
function allCheck(){


  var usernamehtml=document.getElementById("usernameAlert").innerHTML;
  var emailhtml=document.getElementById("emailAlert").innerHTML;
  var namehtml=document.getElementById("nameAlert").innerHTML;
  var passwordhtml=document.getElementById("passwordAlert").innerHTML;
  var repasswordhtml=document.getElementById("repasswordAlert").innerHTML;
  if((namehtml && emailhtml && usernamehtml && passwordhtml && repasswordhtml)=="OK")
  {
    return true;
  }
  else
  {
    alert(namehtml);
    alert(usernamehtml);
    alert(emailhtml);
    alert(passwordhtml);
    alert(repasswordhtml);
    return false;
  }

}

</script>

</body>

</html>