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
		$user_id=$row['sl'];	
		$user_name=$row['name'];		
	}
?>

<?php
	$SQL="select * from tb_admin where `sl` = '$user_id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$id=$row['sl'];
		$password=$row['password'];
		
	}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

error_reporting(0);
$change="";
$abc="";
define ("MAX_SIZE","400");
function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

$errors=0;

$old_password=$_POST['old_password'];
$new_password=$_POST['password1'];
if($password==$old_password)
{
	
	$SQL="UPDATE tb_admin SET `password` = '$new_password' WHERE `sl` = '$user_id'";
	
	//die($SQL);
	$obj->sql($SQL);
	
	$a= "<font color='green'><b>password Update Successful</b></font>";
	header("location:user_password_change.php?a=$a");	
}
else
{
$a= "<font color='red'><b>ERROR !!! Password Update Failed ! Please Retry</b></font>";		

header("location:user_password_change.php?a=$a");	
}
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://kilab.pl/simpleadmin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Account Password Change Option</title>
<link rel="stylesheet" type="text/css" href="images/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="images/navi.css" media="screen">
<link href="../../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="images/jquery-1.7.2.min.js"></script>
<script src="../../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>


        

<body>
<div class="wrap">
  <div id="header">
	<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php  echo $user_name ; ?></strong> [ <a href="logout.php">logout</a> ]</p>
			</div>


<?php require("re_head_date.php"); ?>


    </div>
	
    
        <?php require("re_menu.php"); ?>
    
    
  </div>
	
	<div id="content">
		
		<div id="main1">
		  <div class="clear"></div>
		  <div class="full_w">
		    <div class="h_title">Change User password</div>
            <div class="entry">
            
            <?php
			if($a!=NULL)
			{
			echo $a ;
			}
			else
			{
			}
			?>
          <!--    <div id="preview">
              
              
              </div>-->
            </div>
             <div id="formbox">
             
             
				<form action="user_password_change.php" method="post">
				  <div class="element">
					<label for="password">Old Password<span class="red"> (required)</span> </label>
						 
				        <input type="text" id="old_password" name="old_password" required autofocus />
						
					  
                      
					</div>
				  <div class="element">
					<label for="rule">New Password <span class="red">(required)</span></label>
                    <span id="sprypassword1">
                    <label for="password1"></label>
                    <input type="password" name="password1" id="password1" />
                  <span class="passwordRequiredMsg">A value is required.</span></span> </div>
				  <div class="element">
					<label for="comments">retype New Password  <span class="red">(required)</span></label>
                    
                    <span id="spryconfirm1">
                    <label for="password2"></label>
                    <input type="password" name="password2" id="password2" />
                  <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">New Password don't match.</span></span> </div>
                    <div class="element"></div>
				  <div class="entry">
				    <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
				  </div>
				</form>
            </div>
			
            
          </div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password1");
</script>
</body></html>