<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}

if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);



/*$SQL="select sample_style,color,season from tb_fabric_booking where sl='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$sample_style=$row['sample_style'];
		$color=$row['color'];
		$season=$row['season'];
		
	}*/
	
	$SQL="select store_id from tb_fabric_booking where sl='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$store_id=$row['store_id'];
	}
	
	$store_id .= ', '.$uid ;
	
//$SQL2="update tb_track_info set store_use_qty='$firstname',fab_receive_actual_date='$sys_date' WHERE style='$sample_style' AND color='$color' AND season='$season'";
//$obj->sql($SQL2);	

$SQL="update tb_fabric_booking set store_use_qty='$firstname',store_id='$store_id' where sl='$id'";
$obj->sql($SQL);


}
?>



