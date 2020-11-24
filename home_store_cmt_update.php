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
	$store_cmt=$_POST['dying_cmt'];

	
	
	$SQL="UPDATE  `tb_fabric_booking` SET  
`store_status` = '$store_cmt' WHERE  `tb_fabric_booking`.`sl` ='$slid'" ;
	
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

<h2 align="center"> Store Fabrig Comment Update</h2><br />



<?php echo $msg ; ?>
<form action="home_store_cmt_update.php" method="post">
<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">
<?php
$SQL="SELECT * 
FROM  tb_fabric_booking 
WHERE  sl='$slid'"; 

//die($SQL);
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
	?>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Style No</td>
    <td scope="row"> <?php echo $row['sample_style'] ; ?> 
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
    <td bgcolor="#E5E5E5" scope="row">Fabrication</td>
    <td scope="row"> <?php echo $row['fabrication'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Composition</td>
    <td scope="row"> <?php echo $row['composition'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Fabric Color</td>
    <td scope="row"><?php echo $row['fab_color'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Comment</td>
    <td scope="row"><textarea name="dying_cmt" id="dying_cmt"><?php echo $row['store_status'] ; ?></textarea></td>
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