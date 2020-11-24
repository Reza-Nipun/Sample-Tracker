<?php

 	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
	
	$buyer=$_GET['buyer'];
	$style=$_GET['style'];
	$color=$_GET['color'];
	$season=$_GET['season'];
	
	/*$buyer= 'NEXT';
	$style= 'jl01011';
	$color= 'MILITARY ORANGE';
	$season= 'AW14';*/
	
	?>	
	 <tr style="color:#000">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

		<script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script src="media/js/sorttable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>
        
                            <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 

</head>

<body>

<section class="span12">
<h2 align="center">Fabric Booking Details</h2>

<table id="gradient-style" align="center" class="bottomBorder draggable" width="80%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th bgcolor="#E5E5E5" colspan="2" align="left">Buyer</th>
    <td colspan="2" style="color:#03C"><strong>&nbsp;<?php echo $buyer ; ?></strong></td>
    </tr>
  <tr>
    <th bgcolor="#E5E5E5" colspan="2" align="left">Style</th>
    <td colspan="2" style="color:#03C"><strong>&nbsp;<?php echo $style ; ?></strong></td>
    </tr>
  <tr style="color:#000">
     <th bgcolor="#E5E5E5" colspan="2" align="left">Color</th>
     <td colspan="2" style="color:#03C"><strong>&nbsp;<?php echo $color ; ?></strong></td>
    </tr>
   <tr style="color:#000">
     <th bgcolor="#E5E5E5" colspan="2" align="left">Season</th>
     <td colspan="2" style="color:#03C"><strong>&nbsp;<?php echo $season ; ?></strong></td>
    </tr>
</table>
<p>&nbsp;</p>
   <?php
   
	$SQL="SELECT * FROM  `tb_fabric_booking` WHERE buyer='$buyer' AND sample_style = '$style' AND color = '$color' AND season = '$season' ORDER BY fab_color ASC"; 
	$results = $obj->sql($SQL);

	while($row = mysql_fetch_array($results))
	{ 
		/*$fab_type = $row['fabrication'];
		$composition = $row['composition'];
		
		$dpd_date = $row['dpd_date'];
		$dpd_req_qty = $row['dpd_req_qty'];
		
		$mm_date = $row['mm_date'];
		$sto_po_no = $row['sto_po_no'];
		
		$knit_date = $row['knit_date'];
		$knit_del_qty = $row['knit_del_qty'];
		
		$dy_date = $row['dy_date'];
		$dy_delv_qty = $row['delv_qty'];*/

	?>
 <table align="left" class="bottomBorder draggable" width="100%" border="1" cellspacing="0" cellpadding="0">  
   <tr style="color:#000">
     <th align="left">Fabric Type</th>
     <td align="left"><?php echo $row['fabrication']; ?></td>
     <th width="33%" align="left">Composition</th>
     <td width="24%"><?php echo $row['composition']; ?></td>
   </tr>
   <tr style="color:#000">
     <th width="26%" align="left">DPD Work Date</th>
     <td width="17%"><?php echo $row['dpd_date'] ; ?></td>
     <td align="left"><strong>DPD Required Quantity</strong></td>
     <td><?php echo $row['dpd_req_qty']; ?></td>
   </tr>
   <tr style="color:#000">
     <th align="left">MM Work Date</th>
     <td><?php echo $row['mm_date']; ?></td>
     <td align="left"><strong>STO Number</strong></td>
     <td><?php echo $row['sto_po_no']; ?></td>
   </tr>
     <tr style="color:#000">
       <th align="left">Knit Work Date</th>
       <td><?php echo $row['knit_date']; ?></td>
       <td align="left"><strong>Kniting Delivery Quantity</strong></td>
       <td><?php echo $row['knit_del_qty']; ?></td>
     </tr>
     <tr style="color:#000">
       <th align="left">Dyeing Work Date</th>
       <td><?php echo $row['dy_date']; ?></td>
       <td align="left"><strong>Dyeing Delivery Quantity</strong></td>
       <td><?php echo $row['delv_qty']; ?></td>
     </tr>
  </table>
  
  <p>&nbsp;</p>
     
   <?php 
		
	}
   
   ?>
     
     
     
</section>

</body>
</html>