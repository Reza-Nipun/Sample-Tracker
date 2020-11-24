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
$firstname=trim($firstname);
$remark=mysql_escape_String($_POST['remark']);
$status=mysql_escape_String($_POST['status']);
$lot=mysql_escape_String($_POST['lot']);
$finish_gsm=mysql_escape_String($_POST['finish_gsm']);
$finish_dia=mysql_escape_String($_POST['finish_dia']);


$SQL="update tb_fabric_booking set delv_qty='$firstname', remark_dy='$remark', del_status = '$status', dy_lot='$lot', dy_finish_gsm='$finish_gsm', dy_finish_dia = '$finish_dia', dy_date='$sys_date',dy_id='$uid' where sl='$id'";
$obj->sql($SQL);

}
?>



