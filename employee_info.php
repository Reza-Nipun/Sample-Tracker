<?php

include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
	
	
	$eid=$_GET['E_ID'];
	$rule=$_GET['rule'];	
	
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

<h2 align="center"> Employee Information</h2>

<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">

<?php

$SQL="SELECT * 
FROM  `tb_admin` 
WHERE  `user_name` LIKE  '$eid' AND RULE='$rule'"; 

//die($SQL);

	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		
		?>

  <tr>
    <td bgcolor="#E5E5E5" scope="row">Employee Name</td>
    <td scope="row"> <?php echo $row['name'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Employee ID</td>
    <td scope="row"> <?php echo $row['employee_id'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Username</td>
    <td scope="row"> <?php echo $row['user_name'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Mobile</td>
    <td scope="row"> <?php echo $row['mobile'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Ext</td>
    <td scope="row"> <?php echo $row['ext'] ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E5E5E5" scope="row">Email Address</td>
    <td scope="row"> <?php echo $row['email'] ; ?></td>
  </tr>


<?php
	}
	
	?>


</table>

</body>
</html>