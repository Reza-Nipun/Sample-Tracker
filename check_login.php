<?php
include "db_Class.php";
$obj = new db_class();
$obj->MySQL();

// To properly get the config.php file

$username=mysql_real_escape_string($_POST['username']);  //Set UserName   htmlentities()

$password=mysql_real_escape_string($_POST['password']); //Set Password

$rule=mysql_real_escape_string($_POST['rule']); //Set Password

$msg ='';

if(isset($username, $password)) 
{
    $sql="SELECT count(sl) as aa,employee_id,sl, status FROM tb_admin WHERE user_name='$username' and password='$password' and rule='$rule'";
	 
	// die ($sql) ;
	$result=$obj->sql($sql);
 //   $count=mysql_num_rows($result);	
	while($row = mysql_fetch_array($result))
	{
	$uid=$row['sl'];
	$count=$row['aa'];
	$employee_id=$row['employee_id'];
	$status=$row['status'];
	
//	echo $count ;
//	die ($count) ;
	//	$user_rule=$row['rule'];
	//	$user_name=$row['user_name'];
			
    if($count=='1')

	{
        // Register $myusername, $mypassword and redirect to file "admin.php"
		session_start(); //Start the session
        $_SESSION['userid']= $uid;
		
		
		$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));			
		$date=$datex->format('m-d-Y');
		$datex->modify('-3600 seconds');					
					
		$datex=$datex->format("Y-m-d H:i:s");
		include("date_to_month.php");
		
		
		$SQL="INSERT INTO `tb_user_track` (`sl`, `name`, `dept`, `date`, `monyh_value`, `year_value`, `current_time`) VALUES ('', '$username', '$rule', '$date', '$month_value', '$date_year', '$datex')" ;
		$obj->sql($SQL);
		
		
		
		
		if($status==0)
		{
		header("location:unauthentic.php");
		}
		else if($employee_id=='')
		{
		header("location:forced.php");
		}
		else
		{
        header("location:home.php");
		}
	
	}
     else
	{
	//	echo 'Error' ;
        $msg ="<font color='red'>Wrong Username or Password. Please retry</font>";
        header("location:login.php?msg=$msg");
    }
	
    ob_end_flush();
	}
	
	
	}	
	else
	{
    header("location:login.php?msg=Please enter some username and password");
	}
?>