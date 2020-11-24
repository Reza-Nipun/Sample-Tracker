<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
	}
	
	if(isset($_POST['Submit']))
	{
		$fabrication = $_POST['fabrication'];
		$gsm = $_POST['gsm'];
		$qty = $_POST['qty'];
		
		$composition = $_POST['composition'];
		$color = $_POST['color'];
		$color_code = $_POST['color_code'];
		$comments = $_POST['comments'];		
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

<!--<script>
		window.close()
</script>-->
</head>

<body>

<br/>
<h3 style="color:#060" align="center">Thank You !</h3>
<br/>

<table align="center" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">

 
  <tr>
    <td scope="row">Fabrication</td>
    <td scope="row">GSM</td>
    <td scope="row">Qty</td>
    <td scope="row">Composition</td>
    <td scope="row">Color</td>
    <td scope="row">Color Code</td>
    <td scope="row">Comments</td>
    </tr>
  <tr>
<td scope="row"><?php echo $fabrication ; ?></td>
    <td scope="row"><?php echo $gsm; ?></td>
    <td scope="row"><?php echo $qty; ?></td>
    <td scope="row"><?php echo $composition; ?></td>
    <td scope="row"><?php echo $color; ?></td>
    <td scope="row"><?php echo $color_code; ?></td>
    <td scope="row"><?php echo $comments; ?></td>
</tr>

</table>

</body>
</html>