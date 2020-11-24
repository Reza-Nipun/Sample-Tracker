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
	
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample Tracker</title>

        <!--<link type="text/css" rel="stylesheet" href="../images/bootstrap.min.css">-->
        
	<script type="text/javascript">
	function exl_dwnld () {
		
		alert('Hello');
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
	}
	</script> 
    
<!--<script type="text/javascript">
	$(function(){
		$('#dd').click(function(){
			alert('Hello');
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
</script>-->
    

	<style type="text/css">
    table.bottomBorder { border-collapse:collapse; }
    table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
    font-size:13px;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
    </style> 
    
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="margin:auto; overflow:hidden">

<div align="center" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-size:18px; color:#5F7D0E">
<img src="images/uksbd1.png" width="200" height="*" /> <br/>
Sample Tracker Knitting Delivery Balance
</div>

<div align="center">
<br/>
<!--<span style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-size:17px">Date-<?php 

/*$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
$date=$datex->format('d-m-Y');
echo $date ;*/

?></span>
<br/>-->

<div id="tableWrap"> 

<span style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; font-size:20px"><u>Style Wise Knitting Delivery Balance Report from <?php echo '01-01-2015 TO 17-02-2015'; ?></u></span><br/>
<!--<hr />-->
<br/>

<table width="1000px" border="1" style="text-align:left" cellspacing="0" cellpadding="0" class="bottomBorder">
  <tr bgcolor="#BFBFBF">
    <th scope="col">Serial</th>
    <th scope="col">Buyer</th>
    <th scope="col">Style</th>
    <th scope="col">Season</th>
    <th scope="col">Fab Color</th>
    <th scope="col">Fabrication</th>
    <th scope="col">Composition</th>
    <th width="90px" scope="col">DPD Req Qty</th>
    <th width="90px" scope="col">Knit Delv Qty</th>
    <th width="60px" scope="col">Knit Balance</th>
    <th scope="col">UOM</th>
    </tr>
  
   <?php
   
   $SQL = "SELECT T0.`buyer`, T0.`sample_style`, T0.`season`, T0.`fab_color`, T0.`fabrication`, T0.`composition`, T0.Req_Qty, T1.knit_delv_qty, (
T0.Req_Qty - T1.knit_delv_qty
) AS Balance, T0.uom
FROM (

SELECT `buyer`, `sample_style`, `season`, `fab_color`, `fabrication`, `composition`, SUM( dpd_req_qty ) AS Req_Qty, uom
FROM `tb_fabric_booking` 
WHERE STR_TO_DATE( dpd_date, '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE( '01-01-2015', '%d-%m-%Y' ) 
AND STR_TO_DATE( '17-02-2015', '%d-%m-%Y' ) 
AND cancel_status =0
GROUP BY `sample_style`
)T0
LEFT JOIN (

SELECT sample_style, SUM( knit_del_qty ) AS knit_delv_qty, uom
FROM `tb_fabric_booking` 
WHERE STR_TO_DATE( dpd_date, '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE( '01-01-2015', '%d-%m-%Y' ) 
AND STR_TO_DATE( '17-02-2015', '%d-%m-%Y' ) 
AND cancel_status =0
GROUP BY `sample_style`
)T1 ON T1.sample_style= T0.sample_style";
   
	 // $SQL="SELECT count(a.line_des) as aa,a.line_des,a.floor_des,a.floor_id,a.unit_des FROM tb_employee a, tb_prescription b WHERE b.date like '$date' and a.employee_code=b.id group by a.line_des,a.floor_des,a.unit_des  order by aa DESC";    //table name
	$results = $obj->sql($SQL);
	$sl=1;
	while($row = mysql_fetch_array($results))
	{
	 ?>
  
  <tr align="center">
    <td bgcolor="#E6E6E6"><?php echo $sl; ?>.</td>
    
    <td align="left"><?php echo $row['buyer']; ?></td>
    <td align="left" bgcolor="#E6E6E6"><?php echo $row['sample_style']; ?></td>
    <td align="left"><?php echo $row['season']; ?></td>
    <td align="left" bgcolor="#E6E6E6"><?php echo $row['fab_color']; ?></td>
    <td align="left"><?php echo $row['fabrication']; ?></td>
    <td align="left" bgcolor="#E6E6E6"><?php echo $row['composition']; ?></td>
    <td align="right"><?php echo $row['Req_Qty']; ?></td>
    <td align="right" bgcolor="#E6E6E6"><?php echo $row['knit_delv_qty']; ?></td>
    <td align="right"><?php echo round($row['Balance'], 2); ?></td>
    <td align="left" bgcolor="#E6E6E6"><?php echo $row['uom']; ?></td>
    </tr>
  
  <?php $sl++ ; } ?>
</table>

</div>

<!--<br/>
<div align="center" style="margin-left:90px">
	<button class="btn btn-inverse" id="dd" onClick="exl_dwnld()" style="cursor:pointer">Click to download as Excel</button>  
</div>-->

	<!--<button class="btn btn-inverse" id="dd" style="cursor:pointer">Click to download as Excel</button>-->  

<br/><br/>
<!--<hr />
<br/>-->

</div>             
</div>
</body>
</html>