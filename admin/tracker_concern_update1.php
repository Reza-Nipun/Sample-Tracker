<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_id=$row['id'];	
		$user_name=$row['name'];		
	}
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$c_name=mysql_real_escape_string($_POST['c_name']);
$c_type=mysql_real_escape_string($_POST['c_type']);
$sl=mysql_real_escape_string($_POST['sl']);
if(strlen($c_name)>0 && strlen($c_type)>0)
{

		$SQL="UPDATE tb_concern SET  `concern_name` =  '$c_name',
`concern_type` =  '$c_type' WHERE  `sl` ='$sl'";
		
		//die($SQL) ;
		
		$obj->sql($SQL);
		$a= '<div class="n_ok"><p>Item Info has been Successfully Updated!</p></div>';


echo $a ;
}
}


?>