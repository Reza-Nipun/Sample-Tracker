<?php
//common
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username_traker'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];	
	}
	
$sl=$_POST['update_sl'];
$brand_style_get=$_POST['update_brand_style'];

include('variables.php');

//rule1=sd , rule2=mm , rule3=dpd , rule4=sample , rule5=superadmin , rule6=sd/dpd head 

if($sl==NULL OR $brand_style_get==NULL OR $user_rule!=3)
{
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
die('ERROR!!!.Please login again.');

}

// end common


//only capture post item
//change
 
$dpd_concern_sample_coordinator_name_post=mysql_real_escape_string($_POST['dpd_concern_sample_coordinator_name']);

if($dpd_concern_sample_coordinator_name!=NULL)
{
	die('ERROR!!!.Data already Updated.');
}

if(strlen($dpd_concern_sample_coordinator_name_post)>0)
{
	
$SQL="UPDATE `tb_track_info` SET `dpd_concern_sample_coordinator_name` = '$dpd_concern_sample_coordinator_name_post' WHERE `tb_track_info`.`sl` ='$sl' AND brand_style='$brand_style_get'" ;

$obj->sql($SQL);	


$msg="<font color='green'><b>Concern Sample Coordinator Name Update Successfully.</b></font>";

}
else
{
	$msg="<font color='red'><b>Error!!! Please Try again</b></font>";
}
//change
	
	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>

<?php require("re_head.php"); ?>


</head>

<body>
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">                   
                    <?php require("re_menu.php"); ?>        
                </div>
            </div>
        </header>
        <!-- header --> 
        <!-- global wrapper -->
        <div id="globalWrapper">
            <!-- page content -->
            <section id="content" class="columnPage">
                <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>    
                             <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                            <div class="span12">
                                <h2>Message</h2>
                                <div class="divider"><span></span></div>  
                            </div>  
                          
                          <section class="span6">
                           
                            <p><?php echo $msg ; ?></p>
							<p>Go back to <a style="color:#03F" href="update_dpd.php?ID=<?php echo $sl ; ?>&ID1=<?php echo $brand_style_get ; ?>"  title="Update">Previous page</strong> </a></p>
							<p>Go back to <a style="color:#03F" href="home.php">Home page</a></p>
                            
                          </p></section>
                          
                         
                          
						 </div>
                    </div>
                </div>
                      
              <div class="span12"></div>
              <section class="span6">     
                </p></section>
                            
                     
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        	</div>
         <?php  require("re_footer_head.php"); ?>
</body>
</html>