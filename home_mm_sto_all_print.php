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
	
	
	
//	$style=$_GET['S_ID'];	
//	$season=$_GET['season'];	
	
	
	$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch from tb_track_info where style='$style' AND season='$season'";    //table name
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
		}
	
	

	
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>


<!--       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> -->
       
<script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:10px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 

       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> 
       

	<script type="text/javascript">
	$(function(){
		
//$("input:button[name=dwnldexl]").click(function() {
		
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>  

        <script src="images/CalendarControl1.js" type="text/javascript"></script>
    	<link href="images/CalendarControl.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="tableWrap"> 

<h2 align="center"><U>Fabric Booking Date of <?php echo $sys_date ; ?></U></h2>
<hr/>
<table width="1500px" border="1" cellpadding="0" cellspacing="0" class="draggable bottomBorder">

 
  <tr bgcolor="#DDDDDD" align="center" style="font-family:'MS Serif', 'New York', serif">
    <td><strong>SL</strong></strong></td>
    <td scope="row"><strong>Buyer</strong></td>
    <td scope="row"><strong>Style</strong></td>
    <td scope="row"><strong>Sample Type</strong></td>
    <td scope="row"><strong>Fabrication</strong></td>
    <td scope="row" width="100px"><strong>Composition</strong></td>
    <td scope="row"><strong>Fab Color</strong></td>
    <td width="120px" scope="row"><strong>Color Code</strong></td>
    <td scope="row"><strong>Remarks</strong></td>
    <td scope="row"><strong>GSM</strong></td>
    <td scope="row"><strong>Fab Wash</strong></td>
    <td scope="row"><strong>Dia</strong></td>
    
    <td scope="row"><strong>Collar Des</strong></td>
    <td scope="row"><strong>Collar Size</strong></td>
    <td scope="row"><strong>Collar Color</strong></td>
    <td scope="row"><strong>Collar Qty</strong></td>
    <td scope="row"><strong>Cuff Des</strong></td>
    <td scope="row"><strong>Cuff Size</strong></td>
    <td scope="row"><strong>Cuff Color</strong></td>
    <td scope="row"><strong>Cuff Qty</strong></td>
    <td scope="row"><strong>Item</strong></td>
    <td scope="row"><strong>Comments</strong></td>
    <td scope="row"><strong>Lab dip</strong></td>
    <td scope="row"><strong>STO</strong></td>
    <td scope="row">Job No</td>
    <td scope="row">Req Date</td>
    <td scope="row"><strong>Req Qty</strong></td>
    <td scope="row"><strong>UOM</strong></td>
    <td scope="row">Knit Status</td>
    <td scope="row">Dying Status</td>
    <td width="200px"><strong>DPD Remarks</strong></td>
  </tr>
  <?php
  
  $sl=1;	
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
  	$SQL="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_sample_type_name,b.sd_agreed_sample_delivery_date from tb_fabric_booking a,tb_track_info b WHERE a.sl='$checkbox' AND b.style=a.sample_style AND b.color=a.color AND b.season=a.season group by b.style";    //table name
	$results = $obj->sql($SQL);
//	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{
		?>
  
  
  <?php if($sl%2=='0') { ?>
  <tr>
  <?php } ?>
  
    <td><?php echo $sl ; ?><!--,--><?php // echo $row['sll'] ;  ?></td>
    <td scope="row"><?php echo $row['buyer'] ;  ?></td>
    <td scope="row" title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td scope="row"><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td scope="row"><?php echo $row['fabrication'] ;  ?></td>
    <td scope="row"><?php echo $row['composition'] ;  ?></td>
    <td scope="row"><?php echo $row['fab_color'] ;  ?></td>
    <td scope="row"><?php echo $row['color_code'] ;  ?></td>
    <td scope="row"><?php echo $row['remarks'] ;  ?></td>
    <td scope="row"><?php echo $row['gsm'] ;  ?></td>
    <td scope="row"><?php echo $row['f_wash'] ;  ?></td>
    <td scope="row"><?php echo $row['dia'] ;  ?></td>

    <td scope="row"><?php echo $row['collar_des'] ;  ?></td>
    <td scope="row"><?php echo $row['collar_size'] ;  ?></td>
    <td scope="row"><?php echo $row['collar_color'] ;  ?></td>
    <td scope="row"><?php echo $row['collar_qty'] ;  ?></td>
    <td scope="row"><?php echo $row['cuff_des'] ;  ?></td>
    <td scope="row"><?php echo $row['cuff_size'] ;  ?></td>
    <td scope="row"><?php echo $row['cuff_color'] ;  ?></td>
    <td scope="row"><?php echo $row['cuff_qty'] ;  ?></td>
    <td scope="row"><?php echo $row['item_cat'] ;  ?></td>
    <td scope="row"><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['labdip'] ;  ?></td>
    <td scope="row"><?php echo $row['sto_po_no'] ;  ?></td>
    <td scope="row"><?php echo $row['referrence_id'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td scope="row" align="center" bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td scope="row"><?php echo $row['uom'] ; ?></td>
    <td scope="row"><?php echo $row['knit_status'] ; ?></td>
    <td scope="row"><?php echo $row['del_status'] ; ?></td>
    <td width="12%"><?php echo $row['remark_dpd'] ;  ?></td>
    
  </tr>
<?php
$sl++ ;
	}
		}
	?>


</table>

</div>

<br />
<hr/>

<table width="90%" border="1" class="bottomBorder" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col" align="left" width="40%">Name: <?php echo $full_name ; ?><br />
ID : <?php echo $employee_id ; ?><br />
Ext : <?php echo $ext ; ?><br />
Dept : <?php  if($user_rule=='2') echo 'MM' ; ?><br />
Email : <?php echo $email ; ?><br /></th>
    <th scope="col" width="30%">&nbsp;</th>
    <th scope="col" width="30%">&nbsp;</th>
  </tr>
  <tr>
    <th scope="row">Concern MM</th>
   <th scope="row">Signature MM Head</th>
<th scope="row">Signature Fabric Head</th>
  </tr>
</table>

<br />

 <div align="center">
   <button class="link-style2" style="cursor:pointer">Click to download as Excel</button>  
 </div>


</body>
</html>