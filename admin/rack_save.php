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

	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");

	if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$rowz=0;
		foreach($_POST['c_name'] as $rowz=>$c_name)
		{		
			$c_name = $c_name;
			$c_type=mysql_real_escape_string($_POST['c_type'][$rowz]);
/*		if(strlen($c_name)>0 && strlen($c_type)>0)
		{

*/			$SQL="INSERT INTO `tb_rack_list` (`sl`, `buyer`, `rack`) VALUES ('', '$c_name', '$c_type')";
			$obj->sql($SQL);
			$a= '<div class="n_ok"><p>New Rack <span">Named: <strong>'.$c_name.'</strong> Buyer of: <strong>'.$c_type.'</strong></span> has been Created Successfully!</p></div>';

			echo $a ;
		//}
		}
		
		}

/*if($_SERVER["REQUEST_METHOD"] == "POST")
{
$c_name=mysql_real_escape_string($_POST['c_name']);
$c_type=mysql_real_escape_string($_POST['c_type']);
if(strlen($c_name)>0 && strlen($c_type)>0)
{

		$SQL="INSERT INTO `tb_concern` (`sl`, `concern_name`, `concern_type`) VALUES ('', '$c_name', '$c_type')";
		$obj->sql($SQL);
		$a= '<div class="n_ok"><p>New item has been Successfully created!</p></div>';

echo $a ;
}
}
*/

?>