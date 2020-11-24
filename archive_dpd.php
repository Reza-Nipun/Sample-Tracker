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
		
	}
	
	$sl_id=$_GET['sl_id'];
	$ID=$_GET['ID'];
	
	$SQL="UPDATE `tb_track_info` SET archive_dpd='$ID' WHERE sl='$sl_id' AND  sd_concern_dpd_name='$user_name'" ;
$obj->sql($SQL);	


//	
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:14px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 

</head>

<body>

<h2 align="center"> Update Information</h2>

<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">



  <tr>
    <td bgcolor="#E5E5E5" scope="row" align="center"> &rarr; Update Successfully</td>
  </tr>




</table>

</body>
</html>