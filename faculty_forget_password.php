<?php

if(isset($_GET['status'])){
  $status = $_GET['status'];
  if($status == "empty"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Email Address field is blank!"."</p></center>";
 }
 if($status == "wrong"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Email Address not matched with database"."</p></center>";
 }
 if($status == "wrngemail"){
   echo "<center><p style='color:white;font-family:sans-serif;font-size: 150%;padding: 10px;line-height: 170%;'>"."Email Address not valid"."</p></center>";
 }
 
}

?>


<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Forget Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="description" content="Faculty Forget Password Page">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Zaman,F.M.Asif-uz-">
  <link rel="stylesheet" type="text/css" href="faculty_properties.css">
  <link rel="stylesheet" type="text/css" href="textbox.css">
  <style>
</style>
</head>

<body style="background-color:darkslategrey;">
  <h1 id="myHeader" title="Faculty Login Page">Forget Password</h1>
  <!-- <h2 class="city">London</h2>-->
  <div><img src="projectLogoBig.png" alt="Smiley face" style="float:left;width:300px;height:300px;padding-top:4%;padding-left:10%;">
    <form class="city" style="padding-left: 60%" method="post" action="faculty_forgetPassword_verify.php" onSubmit="return allCheck()">
      <br/>
      <br/>
      <br/>
      <div id="block_container">
        <span>Email &ensp;<input type="email"  class="textbox1" name="email" size="40" autocomplete="on" required="required" id="email" onkeyup="emailCheck()" onblur="emailCheck()" autofocus > </span>
        <span class="warning" id="emailAlert" > </span>
      </div>
      <pre>       <input type="submit" value="Submit" name="submit" class="button button2">     <input type="reset" name="reset" value="reset" class="button button2"></pre>
      <p style="font-size: 90%">Register as Faculty!! Click<a href="faculty_registration.php" title="Go to Faculty Registration page" style="font-size:90%"> HERE!!</a></p>
    </form>
  </div>


  <script type="text/javascript">



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

         xmlHttp.open('POST', 'faculty_forgetPassword_verify_ajax.php', true);
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






function allCheck(){


  
  var emailhtml=document.getElementById("emailAlert").innerHTML;
  if((emailhtml)=="OK")
  {
    return true;
  }
  else
  {
    alert(emailhtml);
    return false;
  }

}


</script>

</body>

</html>