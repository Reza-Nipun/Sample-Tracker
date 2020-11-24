<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	/*date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}*/

if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$knit_yarn_count=mysql_escape_String($_POST['knit_yarn_count']);
$knit_stitch_length=mysql_escape_String($_POST['knit_stitch_length']);
$knit_gray_gsm=mysql_escape_String($_POST['knit_gray_gsm']);


$SQL="update tb_fabric_booking set knit_yarn_count='$knit_yarn_count', knit_stitch_length='$knit_stitch_length', knit_gray_gsm='$knit_gray_gsm', knit_id='$uid' where sl='$id'";
$obj->sql($SQL);


}
?>



