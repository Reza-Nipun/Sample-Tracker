   <?php 
 	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
		
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:11px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 

		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

    <script src="media/js/jquery-latest.js"></script>
    <meta charset="UTF-8" />
    <script type="text/javascript" src="css1/jquery-1.9.0.js"></script><!--../assets/jquery-1.9.0.js-->
	<script type="text/javascript">
	$(function(){
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#demo').html()) 
			location.href=url
			return false
		})
	})
	</script>
    
    <script type="text/javascript">
	// Popup window code
	function newPopup(url) {
	popupWindow = window.open(
	url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
	}
	</script>
        
</head>

<body>
<div id="demo"> 
<p>&nbsp;</p>
<table align="center" border="1" cellpadding="2" cellspacing="" class="bottomBorder">
	<tr>
    	<!--<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">-->
	  <th>&nbsp;&nbsp;SL&nbsp;&nbsp;</th> <!--style="width: 200px !important; "-->
	  <th>Buyer</th>
	  <th>Brand/Dept.</th>
	  <th>Style</th>
	  <th>Color</th>
	  <th>Qty.</th>
	  <th>Season</th>
	  <th>Sample Type</th>
	  <th>Fabric Type</th>
	  <th>Print Type</th>
	  <th>Wash Type</th>
	  <th>Product Type</th>
	  <th>Embroidery stitch</th>
	  <th>Sample Request Rcv (Date)</th>  
	  <th>Agreed Sample Delivery (Date)</th> 
	  <th>PDM/TechPack Rcvd by SD &amp; Forward to DPD (Date)</th>
	  <th>Concern DPD</th> 
	  <th>Concern MM</th> 
	  <th>Fabric Concern</th> 
	  <th>Status</th>
	  <th>Remark</th> 
	  </tr>
    
<!--  <tr>
    <th scope="row">Sl.</th>
    <th bgcolor="#E5E5E5" scope="row">Employee ID</th>
    <th scope="row">Unit</th>
    <th bgcolor="#E5E5E5" scope="row">Floor</th>
    <th scope="row">Line</th>
    <th bgcolor="#E5E5E5" scope="row">Machine</th>
    <th scope="row">Date(m-d-Y)</th>
    <th bgcolor="#E5E5E5" scope="row">Size</th>
    <th scope="row">Quantity</th>
  </tr>
-->
    <?php
		$sl = 1;
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
        $sql="select * from tb_track_info WHERE sl='$checkbox'"; 
  		$result = mysql_query($sql);
		$result=$obj->sql($sql);	
        while($row = mysql_fetch_array($result))
		{	
	
	?>  
		<tr>
		  <td title="<?php echo $row['sl'] ; ?>">&nbsp;&nbsp;<?php echo $sl ; ?>&nbsp;&nbsp;</td>
			<td valign="middle"><?php echo $row['customer'] ; ?></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><?php echo $row['style'] ; ?></td>
			<td><?php echo $row['color'] ; ?></td>
			<td><?php echo $row['qty'] ; ?></td>
			<td><?php echo $row['season'] ; ?></td>
<td><?php echo $row['sd_sample_type_name']; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['embroidery_stitch'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><?php echo $row['sd_techpack_rcv_fwrd_date'] ; ?></td>
			<td><?php echo $row['sd_concern_dpd_name'] ; ?></td>
			<td><?php echo $row['sd_concern_mm_name'] ; ?></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td class="center"><?php echo $row['sd_sample_reject_pass'] ; ?></td>
            <td class="center"><?php echo $row['cmt_sd'] ; ?></td>
		</tr>
        
        <?php $sl++ ; 
		}
		
		} ?>

</table>
<br />
</div>
<br />

<div align="center">
       <form id="printMe" name="printMe"> 
  <button style="cursor:pointer">Click to download as Excel</button> 
</form>
</div>
</body>
</html>