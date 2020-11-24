<?php 


	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_type=$row['rule'];
	}

if($user_type==5)
{
require("menu_admin.php");
}
else
{
require("menu_user.php");
}
?>

