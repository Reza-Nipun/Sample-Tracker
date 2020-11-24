<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un' AND RULE='5'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
	$user_id=$row['sl'];	
	$user_name=$row['name'];
		
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
	$concern_namea=$_POST['concern_name'][$row];
	
	$geta = explode("~", $concern_namea);
	
	$concern_name = $geta[0]; // piece1
    $concern_name_rule = $geta[1]; // piece2
	
	
	$row++;
	if($style!=NULL){
//echo $objective.','.$perspective ;
$SQL="INSERT INTO `tb_sample_out` (`sl`, `date`, `buyer`, `style_no`, `color`, `amount`,`concern_name`,`concern_name_rule`, `id`) VALUES ('', '$date', '$buyer', '$style', '$color', '$amnt','$concern_name','$concern_name_rule', '$user_id')";
//die($SQL);

$obj->sql($SQL);	

}
else
{
$a= "<font color='Red'><b>Sorry.Fail to add1</b></font>";
echo $a;
}
$a= "<p><font color='green'><b>&nbsp; &nbsp; &nbsp;Add successfully.</b></font></p>";
echo $a;
}

}
else
{
$a= "<font color='Red'><b>Sorry.Fail to add</b></font>";
echo $a;
}
?>