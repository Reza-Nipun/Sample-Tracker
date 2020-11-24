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
	
$sl=$_POST['update_sl'];
$brand_style_get=$_POST['update_brand_style'];
$color=$_POST['color'];


//die($brand_style_get) ;

//include('variables.php');

//rule1=sd , rule2=mm , rule3=dpd , rule4=sample , rule5=superadmin , rule6=sd/dpd head 

if($sl==NULL OR $brand_style_get==NULL OR $user_rule!=6)
{
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
die('ERROR!!!.Please login again.');

}

    $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	$datex->modify('-3600 seconds');
	$datex=$datex->format("Y-m-d H:i:s");

// end common
//only capture post item
	
if(isset($_POST['Submit']))
{ 
$sd_dpd_comments=mysql_real_escape_string($_POST['sd_dpd_comments']);
		
$SQL="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,`t_sl`,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$brand_style_get','$sl','$color', 'SD DPD HEAD COMMENT', '$sd_dpd_comments', '$datex', '$un')" ;
$obj->sql($SQL);	


$a= "<font color='green'><b>New Comments add successfully.</b></font>";

echo $a;
echo '<br/>' ;

						


	}
	else
	{
	$a= "<font color='Red'><b>Sorry!!!</b></font>";
	echo $a;
	}
?>
