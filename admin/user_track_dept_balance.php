<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
		
	$obj1 = new db_class();
	$obj1->MySQL();
	
$name=$_GET['DPD'] ;
$date1=$_GET['DATE1'] ;
$date2=$_GET['DATE2'] ;

	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:12px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 


</head>

<body>
<table width="98%" border="1" align="center" cellspacing="0" cellpadding="0" class="bottomBorder">
  <tr bgcolor="#CCCCCC">
    <th scope="col">Serial</th>
    <th scope="col">Buyer</th>
    <th scope="col">Style</th>
    <th scope="col">Color</th>
    <th scope="col">Sample Type</th>
    <th scope="col">Create Date</th>
    <th scope="col">Concern DPD</th>
    <th scope="col">Fabric Booking by DPD to MM</th>
    <th scope="col">Clarification Sending to SD</th>
  </tr>
  
  <?php 
  $SQL="SELECT a.create_date,a.sd_concern_dpd_name,a.sd_sample_type_name,a.mm_fabricbooking_by_dpd_to_mm_date,a.dpd_clarification_sending_to_sd_date,a.customer,a.style,a.color
FROM tb_track_info a
WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y' ) 
AND STR_TO_DATE(  '$date2',  '%d-%m-%Y' ) 
AND a.sd_concern_dpd_name =  '$name'
AND (
a.mm_fabricbooking_by_dpd_to_mm_date = ''
OR a.dpd_clarification_sending_to_sd_date = ''
)
" ;

//die($SQL) ;

$sl=1 ;
$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?>
  <tr>
    <th scope="row"><?php echo $sl ; ?></th>
    <td bgcolor="#E8E8E8"><?php echo $row['customer']; ?></td>
    <td><?php echo $row['style']; ?></td>
    <td bgcolor="#E8E8E8"><?php echo $row['color']; ?></td>
    <td><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td bgcolor="#E8E8E8"><?php echo $row['create_date']; ?></td>
    <td><?php echo $row['sd_concern_dpd_name']; ?></td>
    <td bgcolor="#E8E8E8"><?php echo $row['mm_fabricbooking_by_dpd_to_mm_date']; ?></td>
    <td><?php echo $row['dpd_clarification_sending_to_sd_date']; ?></td>
  </tr>
  <?php 
  $sl++ ;
  }
   ?>
</table>

</body>
</html>