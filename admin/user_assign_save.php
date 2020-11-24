
<?php require("re_db_login_check.php"); ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name=mysql_real_escape_string($_POST['customer']);
$username=mysql_real_escape_string($_POST['sd_concern_sd_name']);
$usernamex = explode("~", $username);
$usernamex[0]; // ID
$usernamex[1]; // Name


if(strlen($name)>0 && strlen($username)>0)
{
	
	
	
//	$SQL="select user_name from tb_admin where user_name='$username'";    //table name
	
//	die($SQL) ;
	
	

		$SQL="INSERT INTO `tb_admin_assign` (`sl`, `admin_sl`, `user_name`, `buyer`) VALUES ('', '$usernamex[0]', '$usernamex[1]', '$name')";
		
		$obj->sql($SQL);
		$a= "<font color='green'><b>New User Name Assign successfully.</b></font>";
			
	
	
echo $a ;
}
}


?>