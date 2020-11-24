<?php

include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
		
	/*$id=$_GET['ID'];
	$tsl=$_GET['tsl'];
	$cancel_status=$_GET['status'];*/	
	
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:14px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 

  <?php  require("re_head.php"); ?>
</head>

<body>
<br />
<h2 align="center" style="color:#F00"> Cancel Fabric Booking </h2>
<br />

<form action="cancel_booking_save_all.php" method="post">   
 
<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" style="color:#000" class="bottomBorder">

<?php

	foreach($_POST['checkbox'] as $row=>$ckbox)
	{
		//$sarder_y = mysql_real_escape_string($_POST['sarder_x'][$rowx]) ;
		//echo $sarder_y ;
		?>
		<input name="checkbox_x[]" type="hidden" value="<?php echo $ckbox ; ?>" />
		<?php
	}

/*$SQL="SELECT * 
FROM  tb_fabric_booking 
WHERE  sl = '$id'"; 

//die($SQL);

	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		*/
?>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Cancel Reason</td>
    <td scope="row"><label><input type="radio" required autofocus name="cancel_rsn" id="cancel_rsn" value="1" /> Cancel Due to Change from Buyer End.</label><label><input type="radio" required autofocus name="cancel_rsn" id="cancel_rsn" value="2" /> Cancel Due to Wrong Booking.</label>
    </td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Cancel Comments</td>
    <td scope="row"><textarea name="cancel_cmnts" rows="3" cols="40" onclick="select()" required autofocus>N/A</textarea></td>
    <!--<input name="fab_sl" type="hidden" value="<?php // echo $id; ?>" /><input name="cancel_status" type="hidden" value="<?php // echo $cancel_status; ?>" />
      <input name="tsl" value="<?php // echo $tsl; ?>" type="hidden" />-->
  </tr>


<?php
	// }
?>


</table>
<br />
    <div align="center">
    <input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />
          &nbsp;
    <input name="input" type="reset" class="btn btn-danger" value="Reset" />
    </div>
</form> 

</body>
</html>