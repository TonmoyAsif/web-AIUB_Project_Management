<?php

if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "not_matched"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Username or Password do not matched!"."</p></center>";
}
if($status == "rule"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Please follow Rules"."</p></center>";
}
if($status == "success"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Registration Successfull"."</p></center>";
}
if($status == "email_sent"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Password has been sent to your email address"."</p></center>";
}
}

if(isset($_COOKIE['remembered']) )
{
  header('location: faculty_home.php');

}
else
{

  ?>


  <!DOCTYPE html>
  <html lang="en-US">

  <head>
    <title>Faculty Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Faculty Login Page">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Zaman,F.M.Asif-uz-">
    <link rel="stylesheet" type="text/css" href="faculty_properties.css">
    <link rel="stylesheet" type="text/css" href="textbox.css">
    <link rel="stylesheet" type="text/css" href="switch.css">
    <style>
</style>



</head>

<body style="background-color:darkslategrey;">
    <h1 id="myHeader" title="Faculty Login Page">Faculty Login</h1>
    <!-- <h2 class="city">London</h2>-->
    <div><img src="projectLogoBig.png" alt="Smiley face" style="float:left;width:300px;height:300px;padding-top:4%;padding-left:10%;">
        <form class="city" style="padding-left: 55%" method="post" action="faculty_login_verification.php" onSubmit="return nullCheck()">
            <br/>

            <div id="block_container">
                <p>Username &ensp; <input type="text" name="username" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" class="textbox1" id="username"> </p>
                <div class="warning" id="usernameAlert"> </div>
            </div>

            <div id="block_container">
                <p>Password &ensp; &nbsp;<input type="password" name="password" maxlength="30" required="required" size="30" pattern="[A-Za-z,1-9]{4,30}" title="Only Numbers and Letters,Atleast 4 characters long" class="textbox1" id="password"> </p>
                <div class="warning" id="passwordAlert"> </div>
            </div>

            <span id="data"> </span>
            <div class="warning" id="wrong_message" style="color: red;"> </div>
            

            <p style="font-size: 80%">Forgot Password? click <a href="faculty_forget_password.php" title="Click Here if you have forgot your Password" style="font-size:100%">HERE!!</a></p>
            <label class="container">Remember Me!!
                <input type="checkbox" name="remember">
                <span class="checkmark"></span>
            </label>
            <pre>         <input type="submit" value="Login" name="submit" class="button button2" >    <input type="reset" name="reset" value="reset" class="button button2"></pre>
        </form>
    </div>

    <script type="text/javascript">
        function nullCheck() {

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var state = true;
            var decision = " ";

            if (username == "") {
                var error = document.getElementById('usernameAlert');
                error.innerHTML = " &ensp; can't left empty!";
                error.style.color = 'white';
                state = false;
            } else {
                document.getElementById('usernameAlert').innerHTML = "";
            }
            if (password == "") {
                var error = document.getElementById('passwordAlert');
                error.innerHTML = " &ensp; can't left empty!";
                error.style.color = 'white';
                state = false;
            } else {
                document.getElementById('passwordAlert').innerHTML = "";
            }


            if (username.length <= 3 || username.length >= 31) {
                var error = document.getElementById('usernameAlert');
                error.innerHTML = " &ensp; between 4 to 40 characters";
                error.style.color = 'white';
                state = false;
            } else {
                document.getElementById('usernameAlert').innerHTML = "";
            }
            if (password.length <= 3 || password.length >= 31) {
                var error = document.getElementById('passwordAlert');
                error.innerHTML = " &ensp; between 4 to 40 characters";
                error.style.color = 'white';
                state = false;
            } else {
                document.getElementById('passwordAlert').innerHTML = "";
            }
            if (state == false) {
                return false;
            } 
            
            var xmlHttp = new XMLHttpRequest();

            xmlHttp.open('POST', 'faculty_login_verification_ajax.php', true);
            xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var username1 = "username1="+document.getElementById('username').value;
            var password1 = "password1="+document.getElementById('password').value;
            xmlHttp.send(username1+"&"+password1);

            xmlHttp.onreadystatechange = function(){

                if(this.readyState == 4 && this.status==200)
                {
                    //alert(this.responseText);
                    decision = this.responseText;
                    
                    //alert(this.responseText);
                    //if (decision == "false"){return false;}else{return true;};
                    document.getElementById('data').innerHTML = decision;
                    
                    
                }

            }
            
            
            
            if (document.getElementById('data').innerHTML == "false") {
                document.getElementById('wrong_message').innerHTML = "Invalid Username or Password!!";
                return false;
            }
            
            
            return true;
            
        }
    </script>

</body>

</html>


<?php
}
?>