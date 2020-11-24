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
		$password=$row['password'];
		
	}
	

	
if(isset($_POST['Submit']))
{ 
    $old_pass= mysql_real_escape_string($_POST['old_pass']);
	$your_pass= mysql_real_escape_string($_POST['your_pass']);
	$your_c_pass= mysql_real_escape_string($_POST['your_c_pass']);



if($password!=$old_pass)
{
$a= "<font color='Red'><b>Old Passwor not matched!!!SOrry Please Try Again</b></font>";
echo $a;
}
elseif($old_pass==NULL)
{
$a= "<font color='Red'><b>Sorry!!!</b></font>";
echo $a;
}
else
{	
$SQL="UPDATE  `tb_admin` SET  password =  '$your_pass'
 WHERE  `tb_admin`.`sl` ='$uid'" ;
//die($SQL);
$obj->sql($SQL);
$a= "<font color='green'><b>Password Update successfully.</b></font>";
echo $a;
	
}




}
?>
