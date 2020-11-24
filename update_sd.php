
<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	if($uid==null)
	{
	die ('Error') ;	
	}
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
	
$sl=$_GET['ID'];
$brand_style_get=$_GET['ID1'];

include('variables.php');

	
	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>

<?php require("re_head.php"); ?>

<script type="text/javascript" language="javascript">
//   javascript:window.history.forward(1);
</script>


</head>

<body >
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
                                <h2>SD :</h2>
                                <div class="divider"><span></span></div>  
                            </div>  
                            
          					 <section class="span6">
                            
                            <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                 <tr>
                                    <td>Brand/Dept. :</td>
                                   <td><?php echo  $brand_style ; ?></td> 
                                 </tr>
                                 <tr>
                                    <td>Style :</td>
                                   <td><?php echo  $brand_style ; ?></td> 
                                 </tr>
                                  <tr>
                                    <td>Sample Type (Name) :</td>
                                   <td><?php echo $sd_sample_type_name ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Sample Request Rcv (Date) :</td>
                                    <td><?php echo $sd_sample_req_rcv_date ; ?></td>
                                    </tr>
                                  <tr>
                                    <td>Concern SD (Name) :</td>
                                    <td><?php echo $sd_concern_sd_name ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Concern DPD (Name) :</td>
                                    <td><?php echo $sd_concern_dpd_name ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Concern MM (Name) :</td>
                                    <td><?php echo $sd_concern_mm_name ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Fabric Concern (Name) :</td>
                                    <td><?php echo $sd_fabric_concern_name ; ?></td>
                                  </tr>
                                  
                                  <!--<tr>
                                    <td>PDM/TechPack Rcvd by SD &amp; Forward to DPD (Date) :</td>
                                    <td><?php echo $sd_techpack_rcv_fwrd_date ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Clarificaition of Missing Info Sending to SD (Date) from DPD [i]</td>
                                    <td><?php echo $dpd_clarification_sending_to_sd_date ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>(Strikeoff/Mockup/Artwork Approval) Planned Sending (Date) from DPD [S]</td>
                                    <td><?php echo $sd_clarification_arng_cnfrm_from_buyer_date ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>(Strikeoff/Mockup/Artwork Approval) Approval Required (Date) from DPD [u]</td>
                                    <td><?php echo $dpd_strikeoff_approval_required_date ; ?></td>
                                    </tr>-->
                </table>
                            
                            </section>
                 
           					<section class="span6">
                              <!--<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>Actual Sample Submission (Date) From SD[ai]</td>
                                   <td><?php // echo $sd_actual_sample_submission_date ;  ?></td>
                                     
                                 </tr>
                                  <tr>
                                    <td>Comments received (Date) From SD[al]</td>
                                   <td><?php // echo $sd_comments_rcvd_date ; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Sample Reject/Pass</td>
                                    <td><?php // echo $sd_sample_reject_pass ; ?> </td>
                                    </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><?php ?></td>
                                    </tr>
                </table>-->
                            
                            </section>
          <div class="span12"><div class="divider"></div></div>
          						<br>

          
          					<div class="span12"></div>
          
          <div class="span12">
                            <h2>SD Update Area  :</h2>
                            <div class="divider"><span></span></div>  
                            </div> 
          
          <div class="span12">
          
          					<?php if($dpd_clarification_sending_to_sd_date!=NULL){?>
                            <section class="span6">
                            <?php include("sd2.php"); //depends in dpd1(i)  ?> 
                            </p></section>
                            <?php } ?>
                                                       
                            
                            <?php // if($dpd_strikeoff_planned_sending_date!=NULL){?>
                          <!--  <section class="span6">-->
                            <?php // include("sd3.php");  // depend on dpd1 (s)?> 
                            <!--</p></section>-->
                            <?php // } ?>
                        
                          
                            <?php //if($dpd_strikeoff_approval_required_date!=NULL){?>
                           <!-- <section class="span6">-->
                            <?php //include("sd4.php"); // depend on dpd5 (u) ?> 
                           <!-- </p></section>-->
                            <?php //} ?>
                           
                           
                            <?php if($sd_agreed_sample_delivery_date!=NULL){?>   
                            <section class="span6">
                            <?php include("sd7.php");  // dependancy (K) ?> 
                            </p></section>
                            <?php } ?>
                            
                            <?php if($sd_actual_sample_submission_date!=NULL){?>
                            <section class="span6">
                            <?php include("sd6.php"); // depend on sd7(ai) ?> 
                            </p></section>
                            <?php } ?>
                            
    						<?php if($sd_comments_rcvd_date!=NULL){ ?>
                            <section class="span6">
                              <?php include("sd8.php"); ?>
                              </p>
                            </section>
                            <?php } ?>
                            
                            
                               </div>
                    </div>
                </div>
                </div>
              <div class="span12"></div>
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