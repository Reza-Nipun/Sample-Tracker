<?php
//common
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
	
$style=$_POST['style'];



    $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	//$datex->modify('-3600 seconds');
	//$datex=$datex->format("Y-m-d H:i:s");
$datex=$datex->format("d-m-Y");

// end common
//only capture post item
	
if(isset($_POST['Submit']))
{ 






$row=0;
foreach($_POST['style'] as $rowz=>$style)
{
		
	$style= $style;
	$season= mysql_real_escape_string($_POST['season'][$row]);
	$remark= mysql_real_escape_string($_POST['remark'][$row]);
	$type= mysql_real_escape_string($_POST['type'][$row]);
	$score= mysql_real_escape_string($_POST['score'][$row]);


$rowx=0;
foreach($_POST['color'] as $rowy=>$color)
{
$color=$_POST['color'][$rowx] ;
$rowx++;


 if(strlen($namer)>0)
{ 
		
$SQL="INSERT INTO `tb_check_list` (`si`, `date`, `style`, `color`, `object`, `list_name`, `remark`,`score`, `user_id`) VALUES ('', '$datex', '$style', '$color', '$type', '$namer', '$remark','$score', '$uid')" ;
//die($SQL);
$obj->sql($SQL);	
}


}

$row++;
}

$a= "<font color='green'><b>Add successfully.</b></font>";

echo $a;
echo '<br/>' ;

						


	}
	else
	{
	$a= "<font color='Red'><b>Sorry!!!</b></font>";
	echo $a;
	}
?>
