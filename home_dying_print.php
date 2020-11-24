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

<h2 align="center"><U>List of Fabrics with Delivery Completed</U></h2>
<hr/>

<div id="tableWrap" style="margin-left:15px"> 
								<!--<h2 align="center"><U>Print on Date <?php // echo $sys_date ; ?> (Without Reference)</U></h2>-->
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="draggable bottomBorder">

  <tr bgcolor="#DDDDDD" align="center" style="font-family:'MS Serif', 'New York', serif">
    <td><strong>SL</strong></strong></td>
    <td scope="row"><strong>Buyer</strong></td>
    <td scope="row">Dept.</td>
    <td scope="row"><strong>Style</strong></td>
    <td scope="row"><strong>Sample Type</strong></td>
    <td scope="row"><strong>Fab Color</strong></td>
    <td scope="row"><strong>Fabrication</strong></td>
    <td scope="row"><strong>Composition</strong></td>
    <td scope="row"><strong>GSM</strong></td>
    <td scope="row"><strong>Color Code</strong></td>
    <td scope="row"><strong>Item</strong></td>
    <td scope="row"><strong>Comments</strong></td>
    <td scope="row"><strong>STO</strong></td>
    <td scope="row">Req Date</td>
    <td scope="row"><strong>Lab dip</strong></td>
    <td scope="row"><strong>Req Qty</strong></td>
    <td scope="row"><strong>UOM</strong></td>
    <td scope="row">Reference No</td>
    <td scope="row"><strong>DPD Remarks</strong></td>
    <td scope="row">Revise Remark</td>
  </tr>
  <?php
  
  $sl=1;	
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
		
  	$SQL="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.customer,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_sample_type_name,b.sd_agreed_sample_delivery_date from tb_fabric_booking a,tb_track_info b WHERE a.sl='$checkbox' AND b.sl=a.track_info_sl group by b.style";    //table name
	$results = $obj->sql($SQL);
//	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{		
		?>
  
   <?php if($sl%2=='0') { ?>
  <tr bgcolor="#F4F4F4">
  <?php } else { ?>
  <tr>
  <?php } ?>
  
    <td><?php echo $sl ; ?></td>
    <td><?php echo $row['customer'] ;  ?></td>
    <td><?php echo $row['brand_style'] ;  ?></td>
    <td><?php echo $row['sample_style'] ; ?></td>
    <td><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td><?php echo $row['fab_color'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ;  ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td><?php echo $row['color_code'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['sto_po_no'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td><?php echo $row['labdip'] ;  ?></td>
    <td align="center" bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['uom'] ; ?></td>
    <td><?php echo $row['referrence_id'] ; ?></td>
    <td width="16%"><?php echo $row['remark_dpd'] ; ?></td>
    <td width="8%"><?php echo $row['revise_cmnts'] ; ?></td>
        
  </tr>
<?php
$sl++ ;
	}
		}
	?>

</table>
<br />
</div>

<div align="center">
<button class="btn btn-inverse" style="cursor:pointer">Click to download as Excel</button> 
</div>

<br />
<br />

</body>
</html>