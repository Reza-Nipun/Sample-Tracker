<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	//date_default_timezone_set("Asia/Dhaka");
    //$sys_date= date("d-m-Y");
	
	
	$date = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	$date->modify('-3600 seconds');
	$sys_date=$date->format("d-m-Y");
	$datex=$date->format("d-m-Y H:i:s");

	
	
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
$track_sl=mysql_escape_String($_POST['track_sl']);


	//$SQL="select * from tb_fabric_booking where sl='$id'";    //table name
	
	$SQL = "select T0.*, T1.email from tb_fabric_booking T0 LEFT JOIN tb_admin T1 on T1.sl = T0.dpd_id  where T0.sl='$id'";
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		
		$user_email=trim($row['email']);

		$dpd_req_qty=$row['dpd_req_qty'];
		$delv_qty=$row['delv_qty'];
		$knit_del_qty=$row['knit_del_qty'];
		
		$store_rec_qty=$row['store_rec_qty'];
		$store_use_qty=$row['store_use_qty'];
		
		
		$buyer=$row['buyer'];
		$sample_style=$row['sample_style'];
		$fabrication=$row['fabrication'];
		$composition=$row['composition'];
		
		$fab_color=$row['fab_color'];
		$item_cat=$row['item_cat']; // Fab Type
		$gsm=$row['gsm'];
		$dia=$row['dia'];
		
	}
	
	
	
	
	$temp = $firstname+$store_rec_qty;
	
	


/*$SQL="select sample_style,color,season from tb_fabric_booking where sl='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$sample_style=$row['sample_style'];
		$color=$row['color'];
		$season=$row['season'];
		
	}*/
	
	
$SQL2="update tb_track_info set dpd_fabric_actual_date='sys_date',fab_receive_actual_date='$sys_date' WHERE sl='$track_sl'";
$obj->sql($SQL2);	


//$sql = "update tb_admin set name='$firstname',user_name='$lastname' where id='$id'";
//mysql_query($sql);

$SQL="update tb_fabric_booking set store_rec_qty='$temp',store_date='$sys_date',store_id='$uid' where sl='$id'";
$obj->sql($SQL);

	
	echo $temp-$store_use_qty;
	$balance = $dpd_req_qty-$temp;


	
	if($user_email != '')
	{
	require('mail_store_rcv.php');
	}
	

}
?>



