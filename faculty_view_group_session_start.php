    <?php
    	session_start();
    	$_SESSION['grp'] = $_POST['g_id1'];
    	$good1 = $_SESSION['grp'];
    	echo $good1;
    ?>