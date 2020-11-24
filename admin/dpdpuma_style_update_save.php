<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_id=$row['id'];	
		$user_name=$row['name'];		
	}
	
/*if($_SERVER["REQUEST_METHOD"] == "POST")
{
*/

$rowz=0;
foreach($_POST['serial'] as $rowz=>$serial)
{		
$re_qty=mysql_real_escape_string($_POST['re_qty'][$rowz]);

$SQL3="UPDATE tb_fabric_booking SET dpd_req_qty = '$re_qty' WHERE sl = '$serial'" ;
//die($SQL3);
$obj->sql($SQL3);

$a= '<div class="n_ok"><p><strong><span style="color:#000">Serial: </span><span style="color:#00F">'.$serial.'</span><span style="color:#000"> Req Qty: </span><span style="color:#00F">'.$re_qty.'</span></strong></p></div>';

echo $a ;	
$rowz++;

}
/*}*/
	
?>

