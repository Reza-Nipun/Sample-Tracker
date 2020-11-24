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
$issue=mysql_escape_String($_POST['issue']);
	
	

	$SQL="select store_rec_qty, store_use_qty from tb_fabric_booking where sl='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$store_rec_qty=$row['store_rec_qty'];
		$store_use_qty=$row['store_use_qty'];
	}
	
	
	
	
	$temp = $issue+$store_use_qty;
	
	
$SQL="update tb_fabric_booking set store_use_qty='$temp' where sl='$id'";
$obj->sql($SQL);
	
	echo $store_rec_qty-$temp;

}
?>



