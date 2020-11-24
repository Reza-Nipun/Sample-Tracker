
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
		
	}
	
	
	
	$slid=$_GET['SID'] ;
	
	
	if (isset($_POST['Submit']))
 		{
	$slid=$_POST['slid'] ;
	$knit_comnt=$_POST['knit_comnt'];
	$gdl_cut_panel=$_POST['gdl_cut_panel'] ;
	$knit_status=$_POST['knit_status'];
	
	
	$SQL="UPDATE  tb_track_info SET  gdl_cut_panel='$gdl_cut_panel' , gdl_comnt =  '$knit_comnt',
gdl_status = '$knit_status' WHERE  `sl` ='$slid'" ;
	
	$obj->sql($SQL) ;
	
		 $msg ="<font color='green'>Update successfull.</font>";
	
		}
	
	
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

</head>

<body>

<h2 align="center"> GDL Comment Update</h2>

<br />
<?php echo $msg ; ?>

<form action="home_gdl_cmt_update.php" method="post">
<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">

<?php

$SQL="SELECT * 
FROM  tb_track_info 
WHERE  sl='$slid'"; 

//die($SQL);
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
	?>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Buyer</td>
    <td scope="row"><?php echo $row['customer'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Style No</td>
    <td scope="row"> <?php echo $row['style'] ; ?> 
    <input name="slid" type="hidden" value="<?php echo $row['sl'] ; ?>" />
    </td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Color</td>
    <td scope="row"> <?php echo $row['color'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Season</td>
    <td scope="row"> <?php echo $row['season'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Print Type</td>
    <td scope="row"> <?php echo $row['print_type'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Embroidery stitch</td>
    <td scope="row"> <?php echo $row['embroidery_stitch'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Agreed delivery date</td>
    <td scope="row"><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Cut Panel Recv</td>
    <td scope="row"><label for="textfield"></label>
      <input type="text" value="<?php echo $row['gdl_cut_panel']?>" name="gdl_cut_panel" id="textfield" />
</td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">GDL Comment</td>
    <td scope="row"><textarea name="knit_comnt" rows="3" cols="30" id="knit_comnt"><?php echo $row['gdl_comnt'] ; ?></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">GDL Status</td>
    <td scope="row"><select name="knit_status" id="knit_status">
      <option>select</option>
   <option value="<?php echo $row['gdl_status'] ; ?>" selected="selected"><?php echo $row['gdl_status'] ; ?>
      </option>
      <option value="Complete">Complete</option>
      <option value="Partial">Partial</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#E5E5E5" scope="row">
    <input type="Submit" name="Submit" id="Submit" value="Submit" />
         <input type="reset" name="Reset" id="button" value="Reset" />
    </td>
  </tr>


<?php
	}
	
	?>


</table>
</form>

</body>
</html>