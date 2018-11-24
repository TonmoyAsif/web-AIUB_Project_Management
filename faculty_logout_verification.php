<?php

setcookie('user','',time()-1,'/');
setcookie('remembered','',time()-1,'/');
header("location: faculty_login.php");


?>