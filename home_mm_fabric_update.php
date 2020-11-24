<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	/*date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");*/
	
$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
$datex->modify('-3600 seconds');
/*$sys_date=$datex->format('m-d-Y');
$datex->modify('-3600 seconds');									
$datex=$datex->format("m-d-Y H:i:s");*/

$sys_date= date("d-m-Y");
$sys_date_update_date_time= $datex->format("Y-m-d H:i:s");

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
	
$id=$_POST['id'];

	//$idm = explode("~",$id);
	//$fab_sl = $idm[0];
	//$track_info_sl = $idm[1];
	
$firstname=mysql_escape_String($_POST['firstname']);
$firstname = trim($firstname);

$tracksl = trim($_POST['tracksl']);





//$sql = "update tb_admin set name='$firstname',user_name='$lastname' where id='$id'";
//mysql_query($sql);

$SQL="update tb_fabric_booking set sto_po_no='$firstname',mm_date='$sys_date',mm_update_date='$sys_date_update_date_time',mm_id='$uid' where sl='$id'";
$obj->sql($SQL);


//$SQL="update tb_track_info set mm_fabricbooking_by_dpd_to_mm_date='$sys_date' where sl='$track_info_sl'";
//$obj->sql($SQL);


}
?>



