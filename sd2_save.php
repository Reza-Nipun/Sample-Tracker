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
	


	
	if (isset($_POST['submit']))
 		{
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $style=mysql_real_escape_string($_POST['style']);
		  $style=trim($style);
		  $fab_booking=mysql_real_escape_string($_POST['fab_booking']);
		  $fab_receive=mysql_real_escape_string($_POST['fab_receive']);
		  
		  
		  
		// $print_send=mysql_real_escape_string($_POST['print_send']);
		  $sd_sample_delv_date=mysql_real_escape_string($_POST['sd_sample_delv_date']);	
		  $print_recv=mysql_real_escape_string($_POST['print_recv']);	  
		  $sew_start=mysql_real_escape_string($_POST['sew_start']);
		  
		  
		  
$SQL="UPDATE `tb_track_info` SET  `fab_receive_planned_date` =  '$fab_receive',
`dpd_fabric_planned_date` =  '$fab_booking',
`dpd_print_planned_date` =  '$print_recv',
`dpd_sample_planned_date` =  '$sew_start' WHERE customer='$customer' AND style='$style' AND sd_agreed_sample_delivery_date='$sd_sample_delv_date'" ;
$obj->sql($SQL);	


$a= "<font color='Green'><b>Data Update Successfully</b></font>";

		}
else
{
$a= "<font color='red'><b>ERROR!!!</b></font>";
}






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
                          <?php echo $a ; ?>
                      </div>
                    </div>
                          </div>
                          </section>
                          </div>
                          </body>
                          </html>