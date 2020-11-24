<?php
	require_once('comon.php');	
?>
<?php
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
header("location:login.php?msg=<font color='green'>Successfully Logged out.</font>"); // Move back to login.php with a logout message

?>
