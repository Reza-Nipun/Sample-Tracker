<?php

	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username_traker'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	// $SQL="select * from admin";
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$rule=$row['rule'];
		
		//$rule_id=$row['rule']; 
		//require_once('rule_varification.php');
	}
	 
	
	//$a=$_GET['a'];
	//$SQL="select * from info_project";
	//$results = $obj->sql($SQL);
	//while($row = mysql_fetch_array($results))
	//{
	//	$id=$row['Id'];
	//}
	
	
	
	if($_GET['ID'])
{
$id=$_GET['ID'];

$SQL="delete from tb_track_info where sl='$id'";
$obj->sql($SQL);	 
$a="Delete Successfull";	
//echo $a;	
header("location:home.php?ID=$a");
}

?>
