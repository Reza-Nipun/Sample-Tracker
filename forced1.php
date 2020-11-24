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
    $name= mysql_real_escape_string($_POST['name']);
	$id= mysql_real_escape_string($_POST['id']);
	$ext= mysql_real_escape_string($_POST['ext']);
	$mob= mysql_real_escape_string($_POST['mobile']);
	$email= mysql_real_escape_string($_POST['email']);

		
$SQL="UPDATE  `tb_admin` SET  `employee_id` =  '$id',
`email` =  '$email',
`ext` =  '$ext',
`full_name` =  '$name',
`mobile` =  '$mob' WHERE  `tb_admin`.`sl` ='$uid'" ;
//die($SQL);
$obj->sql($SQL);	


$a= "<font color='green'><b>Information successfully.</b></font>";
echo $a;
echo '<br/>' ;
}
else
{
$a= "<font color='Red'><b>Sorry!!!</b></font>";
echo $a;
}
?>
