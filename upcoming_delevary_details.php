<?php

	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();	
	$date=$_GET['DATE'];    	
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

 <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 


<script type="text/javascript">
// Popup window code
function newPopup(url)
{
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=550,left=360,top=90,directories=0,titlebar=0,toolbar=0,status=0, menubar=0,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<body>




<p align="center"> Upcoming Sample Delivery date On - <?php echo $date ;  ?></p><br />
<hr />
<table width="80%" align="center" class="bottomBorder" id="" border="1" cellpadding="0" cellspacing="0">
					
						<tr>
							<th scope="col">Sl</th>
							<th scope="col">Buyer</th>
							
							<th scope="col">Style</th>
							<th scope="col">User(SD)</th>
							<th scope="col">User (DPD)</th>
							<th scope="col">User (MM)</th>
							<th scope="col">User-Sample</th>
							<th scope="col">Delivary Date</th>
                            <th scope="col">Create Date (BY)</th>
                            <th scope="col">Status</th>
							<!--<th scope="col" style="width: 65px;">Modify</th>-->
						</tr>
					
				
                    
                          <?php


				
 if($date!=NULL)
                {
				$sql = "select * from tb_track_info a, tb_admin b WHERE a.sd_agreed_sample_delivery_date='$date'  AND b.sl=a.user_id";
				}
			
                $result = mysql_query($sql);
                $sl=1;
                while($row = mysql_fetch_array($result))
                {

	?>                 
	<tr>
	<td class="align-center"><?php echo $sl ; ?></td>
	<td><?php echo $row['customer'] ; ?></td>                      
    <td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['dpd_concern_sample_coordinator_name'] ; ?>&rule=4');" style="color:#036"><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></a></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td><?php echo $row['create_date'] ; ?> -
                          (<?php echo $row['name'] ; ?>)</td>
    <td><?php echo $row['sd_sample_reject_pass'] ; ?></td>
    </tr>
    <?php
		$sl++;
	}
	?>
	</table>


</body>
</html>