<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();

    $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
    $datex->modify('-3600 seconds');
    $sys_date= date("d-m-Y");
    $ref_id_updating_date_time = $datex->format("Y-m-d H:i:s");

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
	
	$msg = 0;

			$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
			$datex->modify('-3600 seconds');
			$datex=$datex->format("Y-m-d H:i:s");
	
	/*$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch, sd_concern_dpd_name from tb_track_info where style='$style' AND season='$season'";    //table name
	//die($SQLX);
	$resultsx = $obj->sql($SQLX);
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date=$rowx['create_date'];
		$customer=$rowx['customer'];
		$brand_style=$rowx['brand_style'];
		$season=$rowx['season'];
		$fabric_type=$rowx['fabric_type'];
		$print_type=$rowx['print_type'];
		$wash_type=$rowx['wash_type'];
		$product_type=$rowx['product_type'];
		$embroidery_stitch=$rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date=$rowx['sd_agreed_sample_delivery_date'];
		
		$sd_concern_dpd_name=$rowx['sd_concern_dpd_name'];
		
	}*/

	foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkboxa=explode("~",$checkbox);
		//$fab_sl = $checkboxa['0'];
		$sto = $checkboxa['1'];
		$sd_concern_dpd_name = $checkboxa['2'];
		}
		
		
	if($sto != ''){	
		
$SQLX="Select referrence_id from tb_fabric_booking WHERE sto_po_no = '$sto' AND referrence_id <> '0' GROUP BY sto_po_no";
	$resultsx = $obj->sql($SQLX);
	while($rowx = mysql_fetch_array($resultsx))
	{ $ref = $rowx['referrence_id']; }
		
	$SQLX="Select * from tb_fabric_booking WHERE sto_po_no = '$sto' AND revise_status <> 0";
	$resultsx = $obj->sql($SQLX);
	$revise_clm = mysql_num_rows($resultsx);
	// It is required to show the Revise Column in Print View.
	
	/*$SQLX="Select * from tb_fabric_booking WHERE sto_po_no = '$sto' AND referrence_id <> '0' AND revise_status <> 0";
	$resultsx = $obj->sql($SQLX);
	$revise_cnt = mysql_num_rows($resultsx);
		if ($revise_cnt > 0)
		{
			$revise_msg = '<strong> (Revised)</strong>';
		}*/
			
		if ($ref == '')
		{
			$SQLX="Select (MAX(referrence_id)+1) AS 'max_ref' from tb_fabric_booking";
			//die($SQLX);
			$resultsx = $obj->sql($SQLX);
			while($rowx = mysql_fetch_array($resultsx))
			{ $update_ref = $rowx['max_ref']; }
		}
		else
		{ 
			$update_ref = $ref;
			//$SQLX="Select * from tb_fabric_booking WHERE sto_po_no = '$sto' AND referrence_id = '0'";
		$SQLX="Select COUNT(*) AS 'revise_cnt' from tb_fabric_booking WHERE sto_po_no = '$sto' AND referrence_id = '0'";
			$resultsx = $obj->sql($SQLX);
			//$revise_cnt = mysql_num_rows($resultsx);
			while($rowx = mysql_fetch_array($resultsx))
			{ $revise_cnt = $rowx['revise_cnt']; }
			
							
				if ($revise_cnt > 0)
				{ $revise_msg = '<strong> (Revised)</strong>';
				  $msg = 1;
				}
				else
				{
				$SQLX="Select COUNT(*) AS 'rev_msg' from tb_fabric_booking WHERE sto_po_no = '$sto' AND ref_status = '1'";
					$resultsx = $obj->sql($SQLX);
					while($rowx = mysql_fetch_array($resultsx))
					{ $rev_msg = $rowx['rev_msg']; }
					//$rev_msg = mysql_num_rows($resultsx); // Here mysql_num_rows is not working as the logic I put is > 0, it can use as if($rev_msg == 1) {  }
					if($rev_msg > 0) { $revise_msg = '<strong> (Revised)</strong>'; $msg = 1;}
				}
		}		
		
		if ($update_ref != '')
		{
			$SQLX="UPDATE tb_fabric_booking SET referrence_id = '$update_ref', ref_id_updating_date_time = '$ref_id_updating_date_time'";
			if($msg == 1) { $SQLX= $SQLX. ", ref_status = '1'"; }
			$SQLX= $SQLX. " WHERE sto_po_no = '$sto'";
			//die($SQLX);
			$obj->sql($SQLX);
			
			$SQLP = "INSERT INTO `vt_tracker`.`tb_print_ref` (`sl`, `sto_po_no`, `ref_id`, `update_ref`, `revise_msg`, `u_id`, `print_time`) VALUES ('', '$sto', '$ref', '$update_ref', '$rev_msg', '$uid', '$datex')";
			$obj->sql($SQLP);
		}
		
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>

        <link type="text/css" rel="stylesheet" href="images/bootstrap.min.css">

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
								<h3 align="center"><U>Date of <?php echo $sys_date ; ?>, Reference No: <?php echo $update_ref; ?><?php echo $revise_msg; ?></U></h3>
<hr/>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="draggable bottomBorder">

  <tr bgcolor="#DDDDDD" align="center" style="font-family:'MS Serif', 'New York', serif">
    <td width="2%" align="center"><strong>SL</strong></strong></td>
    <td scope="row"><strong>Buyer</strong></td>
    <td scope="row"><strong>Dept.</strong></td>
    <td scope="row"><strong>Style</strong></td>
    <td scope="row"><strong>Sample Type</strong></td>
    <td scope="row"><strong>Combo</strong></td>
    <td scope="row"><strong>Fab Color</strong></td>
    <td scope="row"><strong>Color Code</strong></td>
    <td scope="row"><strong>Fabrication</strong></td>
    <td scope="row"><strong>Composition</strong></td>
    <td scope="row"><strong>Remarks</strong></td>
    <td scope="row"><strong>Collar Des</strong></td>
    <td scope="row"><strong>Collar Size</strong></td>
    <td scope="row"><strong>Collar Color</strong></td>
    <td scope="row"><strong>Colar Qty</strong></td>
    <td scope="row"><strong>Cuff Des</strong></td>
    <td scope="row"><strong>Cuff Size</strong></td>
    <td scope="row"><strong>Cuff Color</strong></td>
    <td scope="row"><strong>Cuff Qty</strong></td>
    <td scope="row"><strong>GSM</strong></td>
    <td scope="row"><strong>Fab Wash</strong></td>
    <td scope="row"><strong>Item</strong></td>
    <td scope="row"><strong>Comments</strong></td>
    <td scope="row"><strong>STO</strong></td>
    <td scope="row"><strong>Req Date</strong></td>
    <td scope="row"><strong>Lab dip</strong></td>
    <td scope="row"><strong>Req Qty</strong></td>
    <td scope="row"><strong>UOM</strong></td>


    <td><strong>DPD Remarks</strong></td>
    <?php if ($revise_clm != 0) { ?><td>Revise Remark</td> <?php } ?>
  </tr>
  <?php
  
  $sl=1;	
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
		
		
  	$SQL="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.customer, b.brand_style,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_sample_type_name,b.sd_agreed_sample_delivery_date from tb_fabric_booking a,tb_track_info b WHERE a.sl='$checkbox' AND b.sl=a.track_info_sl group by b.style";    //table name
	$results = $obj->sql($SQL);
//	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{
		$revise_status = $row['revise_status'];
		
		?>
  
   <?php if($sl%2=='0') { ?>
  <tr bgcolor="#F4F4F4">
  <?php } else { ?>
  <tr>
  <?php } ?>
  
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $sl ; ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['buyer'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['brand_style'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['combo'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['fab_color'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['color_code'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['fabrication'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['composition'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['remarks'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['collar_des'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['collar_size'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['collar_color'] ;  ?></td>
    <td style="background-color:#E8EAF9" <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['collar_qty'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['cuff_des'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['cuff_size'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['cuff_color'] ;  ?></td>
    <td style="background-color:#E8EAF9" <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['cuff_qty'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['gsm'] ;  ?></td>
    		<td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['f_wash'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['item_cat'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['comments'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['sto_po_no'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['labdip'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?> align="center" bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['uom'] ; ?></td>
    <td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['remark_dpd'] ; ?></td>

    <?php if ($revise_clm != 0) { ?><td <?php if ($revise_status != 0) {?>style="font-size:12px; font-weight:bold"<?php } ?>><?php echo $row['revise_cmnts'] ; ?></td><?php } ?>
        
  </tr>
<?php
$sl++ ;
	}
		}
	?>


</table>

<br />
<hr/>

<?php 
	$SQLX="select * from tb_admin where user_name='$sd_concern_dpd_name'";    //table name
	//die($SQLX);
	$resultx = $obj->sql($SQLX);
	while($row = mysql_fetch_array($resultx))
	{
		$dpd_employee_id=$row['employee_id'];
		$dpd_name=$row['name'];
		$dpd_rule=$row['rule'];
		$dpd_full_name=$row['full_name'];
		$dpd_ext=$row['ext'];
		$dpd_mobile=$row['mobile'];
		$dpd_email=$row['email'];
	}	

 ?>
Name: <?php if ($dpd_full_name != '') echo $dpd_full_name ; else echo $dpd_name; ?><br />
ID : <?php echo $dpd_employee_id ; ?><br />
Ext : <?php echo $dpd_ext ; ?><br />
Mobile No : <?php echo $dpd_mobile; ?><br />
Dept : <?php  if($dpd_rule=='3') echo 'DPD' ; else if ($dpd_rule=='1') echo 'SD' ; else echo 'N/A'; ?><br />
Email : <?php echo $dpd_email ; ?><br />

<br />

</div>

<div align="center">
<button class="btn btn-inverse" style="cursor:pointer">Click to download as Excel</button>            
</div>


</body>
</html>