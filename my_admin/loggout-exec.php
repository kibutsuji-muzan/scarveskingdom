<?php
	//Start session
	session_start();
	//Unset the variables stored in session
	unset($_SESSION['SESS_ADMIN_ID']);
	unset($_SESSION['SESS_ADMIN_FNAME']);
	unset($_SESSION['SESS_ADMIN_LNAME']);
	
	$errmsg_arragoy[] = 'You Have Successfuly Logged Out!';
	$errflaglets = true;
	if($errflaglets) {
	$_SESSION['ERRMSG_ARROGOY'] = $errmsg_arragoy;
	session_write_close();
	header("location: ../my_admin");
	exit();
	}
	else {
		die("Query failed");
	}
?>
