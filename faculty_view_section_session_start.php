    <?php
    	session_start();
    	$_SESSION['ses'] = $_POST['s_id1'];
    	$good = $_SESSION['ses'];
    	echo $good;
    ?>