<?php
include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
if(isset($_POST['Submit']))
{ 
$row=0;
foreach($_POST['customer'] as $rowz=>$customer)
{
	$customer=$customer;
	$sample_type=$_POST['sample_type'][$row];
	$content1=$_POST['content1'][$row];
	$content2=$_POST['content2'][$row];
	$content3=$_POST['content3'][$row];
	$content4=$_POST['content4'][$row];
	$content5=$_POST['content5'][$row];
	$content6=$_POST['content6'][$row];
	$content7=$_POST['content7'][$row];
	$row++;
	
	
	if($customer){
	
//echo $objective.','.$perspective ;
$SQL="INSERT INTO `tb_lead_time` (`sl`, `buyer`, `sample_type`, `fab_booking`, `fab_receive`, `print_send`, `print_recv`, `sew_start`, `delv`, `ttl_lead_time`) VALUES ('', '$customer', '$sample_type', '$content1', '$content2', '$content3', '$content4', '$content5', '$content6', '$content7')";
//die($SQL);

$obj->sql($SQL);	
}
}
$a= "<p><font color='green'><b>&nbsp; &nbsp; &nbsp;New Lead time object Add successfully.</b></font></p>";
echo $a;
}
else
{
$a= "<font color='Red'><b>Sorry.</b></font>";
echo $a;
}
?>