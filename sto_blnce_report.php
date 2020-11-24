<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		$ext=$row['ext'];
		$full_name=$row['full_name'];
		$mobile=$row['mobile'];
		$email=$row['email'];
		$employee_id=$row['employee_id'];
	}	
			
	//die($revise_clm);
			
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>


<!--       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> -->
       

       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> 
       
       
<script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>
	<script type="text/javascript">
	$(function(){
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>    

<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:10px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 
        <script src="images/CalendarControl1.js" type="text/javascript"></script>
        
    	<link href="images/CalendarControl.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="tableWrap"> 
								<h2 align="center"><U>Print on Date <?php echo $sys_date ; ?> (Without Reference)</U></h2>
<hr/>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="draggable bottomBorder">

  <tr bgcolor="#DDDDDD" align="center" style="font-family:'MS Serif', 'New York', serif">
    <td><strong>SL</strong></strong></td>
    <td scope="row"><strong>Buyer</strong></td>
    <td scope="row"><strong>Sample Type</strong></td>
    <td scope="row">Fabric Booking Date</td>
    <td scope="row">Agreed Sample Delv Date</td>
    <td scope="row"><strong>STO PO No</strong></td>
    <td scope="row"><strong>DPD Req Qty</strong></td>
    <td scope="row"><strong>Dying Delv Qty</strong></td>
    <td scope="row"><strong>Dying Delv Balance</strong></td>
    <td scope="row"><strong>Knitting Delv Qty</strong></td>
    <td scope="row"><strong>Knitting Delv Balance</strong></td>
    </tr>
  <?php
  
  $sl=1;	
		
  	$SQL="SELECT T0.`buyer` , T0.`sample_style` , T0.`dpd_date` , T1.sd_agreed_sample_delivery_date, T0.`sto_po_no` , SUM( `dpd_req_qty` ) AS 'DPD_Req_Qty', SUM( `delv_qty` ) AS 'Dying_Delv', SUM( `dpd_req_qty` ) - SUM( `delv_qty` ) AS 'Dying_BL', SUM( `knit_del_qty` ) AS 'Knit_Delv', SUM( `dpd_req_qty` ) - SUM( `knit_del_qty` ) AS 'Knitt_BL'
FROM `tb_fabric_booking` T0
LEFT JOIN tb_track_info T1 ON T1.sl = T0.`track_info_sl`
WHERE STR_TO_DATE( dpd_date, '%d-%m-%Y' )
BETWEEN STR_TO_DATE( '01-07-2014', '%d-%m-%Y' )
AND STR_TO_DATE( '06-01-2015', '%d-%m-%Y' )
GROUP BY T0.sto_po_no
ORDER BY T1.sd_agreed_sample_delivery_date, T0.`sto_po_no` ASC";    //table name

		// die($SQL);
	$results = $obj->sql($SQL);
//	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{
		$revise_status = $row['revise_status'];
		
		?>
  
  
   <?php if($sl%2=='0') { ?>
   <tr>
  <?php } ?>
  
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $sl ; ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['buyer'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['sample_style'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['dpd_date'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['sto_po_no'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['DPD_Req_Qty'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['Dying_Delv'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['Dying_BL'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['Knit_Delv'] ;  ?></td>
		<td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo round($row['Knitt_BL'] , 2);  ?></td>
                
  </tr>
<?php
$sl++ ;
	}
	?>


</table>

<br />
<hr/>


</div>

<div align="center" style="background-color:#CCCCFF">
<button class="link-style2" style="cursor:pointer">Click to download as Excel</button>            
</div>


</body>
</html>