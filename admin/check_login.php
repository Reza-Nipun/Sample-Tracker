<?php
include "../db_Class.php";
$obj = new db_class();
$obj->MySQL();

// To properly get the config.php file

$username=mysql_real_escape_string($_POST['username']);  //Set UserName   htmlentities()

$password=mysql_real_escape_string($_POST['password']); //Set Password

$msg ='';

if(isset($username, $password)) 
{
    $sql="SELECT * FROM tb_admin WHERE user_name='$username' and password='$password' AND RULE='5'";
	 $result=$obj->sql($sql);
    $count=mysql_num_rows($result);
    if($count==1){
        // Register $myusername, $mypassword and redirect to file "admin.php"
		session_start(); //Start the session
        $_SESSION['username']= $username;
        header("location:home.php");
    }
    else {
        $msg ="<font color='red'>Wrong Username or Password. Please retry</font>";
        header("location:login.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:login.php?msg=Please enter some username and password");
}
?>