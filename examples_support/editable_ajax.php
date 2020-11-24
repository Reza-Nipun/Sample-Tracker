<?php


//	echo $_POST['value'].' (server updated)';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "../../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);



//$sql = "update tb_admin set name='$firstname',user_name='$lastname' where id='$id'";
//mysql_query($sql);

$SQL="update tb_training_mh_info set actual_attendance='$firstname' where sl='$id'";
$obj->sql($SQL);


}
?>
</body>
</html>