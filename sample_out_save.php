<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
//	date_default_timezone_set("Asia/Dhaka");
  //      $sys_date= date("d-m-Y");
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
	
	
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('d-m-Y');
		$datex->modify('-3600 seconds');									
		$datex=$datex->format("Y-m-d H:i:s");
	
if(isset($_POST['Submit']))
{ 
$row=0;
foreach($_POST['style'] as $rowz=>$style)
{

	$style=$_POST['style'][$row];
	$buyer=$_POST['buyer'][$row];
	$color=$_POST['color'][$row];
	$amnt=$_POST['amnt'][$row];

	
//	$geta = explode("~", $concern_namea);	
//	$concern_name = $geta[0]; // piece1
//   $concern_name_rule = $geta[1]; // piece2
	
	
	$SQL1="select sl from tb_track_info where customer='$buyer' AND  style='$style' AND color='$color'";    //table name
	$results1 = $obj->sql($SQL1);
	while($row1 = mysql_fetch_array($results1))
	{
		$have_sl=$row1['sl'];
			
	}
	
	
if($have_sl!=NULL){

$SQL="INSERT INTO `tb_sample_out` (`sl`, `date`, `buyer`, `style_no`, `color`, `amount`,`concern_name`,`concern_name_rule`, `id`) VALUES ('', '$date', '$buyer', '$style', '$color', '$amnt','$user_name','$user_rule', '$uid')";

$obj->sql($SQL);	
$a= "<p><font color='green'><b>".$buyer.",".$style.",".$color.", Amount ".$amnt." Add successfully.</b></font></p>";
echo $a;
$have_sl='' ;
}

else
{
$a= "<p><font color='red'><b>".$buyer.",".$style.",".$color.", Amount ".$amnt." failed to add.Not Listed in Sample Tracker.</b></font></p>";
echo $a;
}
$row++;
}
}

?>