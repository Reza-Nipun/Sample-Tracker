
<?php require("re_db_login_check.php"); ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name=mysql_real_escape_string($_POST['name']);
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);
$rule=mysql_real_escape_string($_POST['rule']);
if(strlen($name)>0 && strlen($username)>0 && strlen($password)>0)
{
	
	
	
//	$SQL="select user_name from tb_admin where user_name='$username'";    //table name
	
//	die($SQL) ;
	
	$SQL="select user_name from tb_admin where user_name='$username' AND rule='$rule'";    //table name
	$results1 = $obj->sql($SQL);
	while($row1 = mysql_fetch_array($results1))
	{
		$un1=$row1['user_name'];
		
	}
	
	if($un1!=null)
	
	{
		$a= "<font color='red'><b>Username already exits. Please try to add another name</b></font>";
				
	}
	
else
	{
		$SQL="INSERT INTO `tb_admin` (`sl`, `name`, `user_name`, `password`, `rule`) VALUES ('', '$name', '$username', '$password', '$rule')";
		
		$obj->sql($SQL);
		$a= "<font color='green'><b>New User Name create successfully.</b></font>";
			
	}
	
echo $a ;
}
}


?>