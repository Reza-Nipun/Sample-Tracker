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
$midlename=mysql_escape_String($_POST['midlename']);
$comments=mysql_escape_String($_POST['comments']);
$status=mysql_escape_String($_POST['status']);
$status_print=mysql_escape_String($_POST['status_print']);

//$sql = "update tb_admin set name='$firstname',user_name='$lastname' where id='$id'";
//mysql_query($sql);

$SQL="update tb_track_info set emb_cut_panel='$firstname',emb_cut_panel_dlv='$midlename',emb_emb_type='$status_print',emb_comnt='$comments', emb_status='$status',emb_date='$sys_date',emb_id='$uid' where sl='$id'";

$obj->sql($SQL);

}
?>


