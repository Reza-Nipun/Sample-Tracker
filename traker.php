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
	
$sl=$_GET['ID'];
$style_get=$_GET['ID1'];

include('variables.php');

//rule1=sd , rule2=mm , rule3=dpd , rule4=sample , rule5=superadmin , rule6=sd/dpd head 

if($sl==NULL OR $style_get==NULL)
{
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
die('ERROR!!!.Please login again.');

}

    $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	$datex->modify('-3600 seconds');
	$datex=$datex->format("Y-m-d H:i:s");
// end common
//only capture post item
//change

if($sl!=NULL)
{
	

function daysDifference($endDate, $beginDate)
{
   $date_parts1=explode("-", $beginDate);
   $date_parts2=explode("-", $endDate);
   //int gregoriantojd ( int $month , int $day , int $year )
   $start_date=gregoriantojd($date_parts1[1], $date_parts1[0], $date_parts1[2]);
   $end_date=gregoriantojd($date_parts2[1], $date_parts2[0], $date_parts2[2]);
   return $end_date - $start_date;
}

//$ed=$sd_agreed_sample_delivery_date ;
//$sd=$sd_actual_sample_submission_date_post ;
   //$daf=daysDifference($sd_agreed_sample_delivery_date,$sd_actual_sample_submission_date_post);  
   
   //S,T
$diffst=daysDifference($dpd_strikeoff_planned_sending_date,$dpd_strikeoff_actual_sending_date); 

if($diffst<0)
{  
$SQL1="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', 'Strikeoff/Mockup/Artwork Approval', '$diffst', '$user_name')" ;
$obj->sql($SQL1);
}

//$daf=daysDifference($dpd_sample_planned_date,$sample_sample_actual_date_post);   
$diffzaa=daysDifference($sample_pattern_planned_date,$sample_pattern_actual_date);  
if($diffzaa<0)
{ 
$SQL2="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', 'Pattern', '$diffzaa', '$user_name')" ;
$obj->sql($SQL2);
}


$diffabac=daysDifference($dpd_print_planned_date,$sample_print_actual_date);  
if($diffabac<0)
{    
$SQL3="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', 'Print/Emb/applique', '$diffabac', '$user_name')" ;
$obj->sql($SQL3);
}

$diffaeaf=daysDifference($dpd_sample_planned_date,$sample_sample_actual_date);  
if($diffaeaf<0)
{ 
$SQL4="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', '$sample_sweing_operators_name', '$diffaeaf', '$user_name')" ;
$obj->sql($SQL4);
}

$diffmn=daysDifference($dpd_labdip_planned_rcvd_date,$dpd_labdip_actual_date);  
if($diffmn<0)
{ 
$SQL5="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', 'Labdip/Yarndip/Pc Code/ Fab Test', '$diffmn', '$user_name')" ;
$obj->sql($SQL5);
}


$difffb=daysDifference($fab_receive_planned_date,$fab_receive_actual_date);  
if($difffb<0)
{ 
$SQL6="INSERT INTO `tb_sample_status` (`sl`, `brand_style`,t_sl,color, `sample_status_event`, `sample_status_objective`, `update_date`, `user`) VALUES ('', '$style','$sl','$color', 'Responsible person delay', '$sd_concern_mm_name', '$difffb', '$user_name')" ;
$obj->sql($SQL6);
}




$SQL8="UPDATE `tb_track_info` SET  `track_status` = '1' WHERE `sl` ='$sl' AND style='$style'" ;
//die($SQL8) ;
$obj->sql($SQL8);

}
/*else
{
	$msg="<font color='red'><b>Error!!! Please Try again.Fill all input field</b></font>";
}
*///change

    $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	$datex->modify('-3600 seconds');
	$datex=$datex->format("Y-m-d H:i:s");

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
                                <div class="divider"><span><br>

                                Tracking successfull
                                
                                </span></div>  
                            </div>  
                          
                          <section class="span6">
                            <?php echo $msg ; ?>
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