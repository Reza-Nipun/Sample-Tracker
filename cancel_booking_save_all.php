<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		$ext=$row['ext'];
	}
	if($user_rule == 3) { $dept = 'DPD'; } else if($user_rule == 1) { $dept = 'SD'; } else $dept = 'N/A';
	if($ext != NULL) {$extension = 'Ext: '.$ext ;}
	
	$sys_date= date("d-m-Y");

	$cancel_rsn = $_POST['cancel_rsn'];
	$cancel_cmnts = $_POST['cancel_cmnts'];

	foreach($_POST['checkbox_x'] as $row=>$ckbox)
	{
		$ckboxa = explode("~",$ckbox);
		$fab_sl = $ckboxa[0];
		$cancel_status = $ckboxa[1];
		
	$SQL="UPDATE `tb_fabric_booking` SET  cancel_status= '$cancel_status',
	cancel_rsn = '$cancel_rsn',
	cancel_cmnts='$cancel_cmnts', cancel_date = '$sys_date'
	WHERE `sl` ='$fab_sl' ";
	$obj->sql($SQL);
	
	}

	/*$fab_sl = $_POST['fab_sl'];
	$tsl = $_POST['tsl'];
	$cancel_rsn = $_POST['cancel_rsn'];
	$cancel_cmnts = $_POST['cancel_cmnts'];
	$cancel_status = $_POST['cancel_status'];*/
	
	// if ($cancel_rsn == 1) { $cancel_rsn_details = 'Cancel Due to Change from Buyer End.';}
	// if ($cancel_rsn == 2) { $cancel_rsn_details = 'Cancel Due to Wrong Booking.';}
	
	
	
	// require("phpmail/fabric_booking_cancel_notification.php");
	
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Sample Tracker</title>
    <!--<script>
		window.close()
	</script>-->		
	</head>
	<body>
    
    <div align="center" style="font-size:16px; color:#060"><strong>Your Fabric Booking is Cancelled Sucessfully.<br/><?php // echo $msg; ?></strong></div>
    
    <!--
    A Notification mail is send to Concern MM, Dyeing and DPD Head.
    <div align="center">Please <strong>Close</strong> the Browser.</div>-->
    
	</body>
</html>