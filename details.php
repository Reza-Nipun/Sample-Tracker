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
<style>
<!--#1
{
	/*background-color:#09F;*/}-->
</style>
</head>

<body >
        <!-- Primary Page Layout    
        
        >?
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
                
              
             
             
            <!-- for MM, DPD, SAMPLE, SD/DPD HEAD-->   
                   
<?php if($user_rule==1 OR $user_rule==2 OR $user_rule==3 OR $user_rule==4  OR $user_rule==5 OR $user_rule==6) {  ?>
               
               
   <!--   -----------------SD PART BEGINS--------------   -->
                <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                                                      
                                                     
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>SD Part :</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            
          
                            <section class="span12">
                            
                            <!--Table 1 for SD Starts-->
                            
                              <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#CAF2C6">
    <td width="12%" id="1">Customer</td>
    <td width="12%" id="1">Brand/Dept.</td>
    <td width="12%" id="1">Style</td>
    <td width="12%" id="1">Sample Type </td>
    <td width="10%" id="1">Sample Request Rcv</td> 
    <td width="10%" id="1">Concern SD</td>   
    <td width="10%" id="1">Concern DPD</td>  
    <td width="10%" id="1">Concern MM</td>    
    <td width="10%" id="1">Fabric Concern </td>    
       
  </tr>   
   
	 <tr>
	<td align="center"><?php echo $customer ; ?></a></td>
    <td align="center"><?php echo $brand_style ; ?></td>
    <td align="center"><?php echo $style ; ?></td>
    
    <td align="center"><?php echo $sd_sample_type_name ; ?></td>
    
    <td align="center"><?php echo $sd_sample_req_rcv_date ; ?></td>
    <td align="center"><?php echo $sd_concern_sd_name ; ?></td>
    <td align="center"><?php echo $sd_concern_dpd_name ; ?></td>
    <td align="center"><?php echo $sd_concern_mm_name  ; ?></td>
    <td align="center"><?php echo $sd_fabric_concern_name    ; ?></td>
    
  </tr>
    
</table>

      <!-- Table 1 for SD ended-->
      
      <!-- Table 2 for SD starts-->
<div class="divider"><span></span></div>  
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr align="center" bgcolor="#CAF2C6" >
  
    <td width="10%">PDM/TechPack Rcvd by SD & Forward to DPD (Date)</td> 
    <td width="14%">(Clarificaition of Missing Info) Arrange the Confirmation from buyer (Date)</td>  
    <td width="10%">Agreed Sample Delivery (Date)</td> 
    <td width="12%">Actual Sample Submission (Date)</td>
    <td width="11%">Sample (Ontime/ Delay) </td>
    <td width="11%">Comments received (Date)</td>
    <td width="11%">Sample Reject/Pass</td> 
    
    </tr>                        
   
	 <tr>
   <td align="center"><?php echo $sd_techpack_rcv_fwrd_date ?></a></td>
   <td align="center"><?php echo $sd_clarification_arng_cnfrm_from_buyer_date ?></a></td>
    <td align="center"><?php echo $sd_agreed_sample_delivery_date ; ?></td>
    <td align="center"><?php echo $sd_actual_sample_submission_date ; ?></td>   
    <td align="center"><?php echo $sd_sample_ontime_delay; ?></td>
    <td align="center"><?php echo $sd_comments_rcvd_date ; ?></td>
    <td align="center"><?php echo $sd_sample_reject_pass ; ?></td>
    
    
    
  
   
  </tr>
                      	  
</table>

<!-- Table 2 for SD ended-->
                            
                           
                            
                           </section>
                            
                            
                        </div>
                    </div>
                </div>
                
     <!--   -----------------SD PART ENDS--------------    -->
                
     <!--   -----------------MM PART BEGINS--------------    -->        
                   
                    <div class="container"> 
                        <div class="row"> 
                      <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>MM Part :</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            
          
                            <section class="span12">
                                                                 
                              <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center">
    
    <td width="12%" bgcolor="#CAF2C6">Customer</td>
    <td width="16%" bgcolor="#CAF2C6">Brand</td>
    <td width="16%" bgcolor="#CAF2C6">Style</td>
    <td width="12%" bgcolor="#CAF2C6">Fabric Booking By DPD to MM (Date)</td>
    <td width="10%" bgcolor="#CAF2C6">(Trims In-Fty-Date) Actual (Date)</td>     
    </tr>  
      
  	
	 <tr>   
    <td align="center"><?php echo $customer ; ?></a></td>
    <td align="center"><?php echo $brand_style ; ?></td>
    <td align="center"><?php echo $style ; ?></td>
    <td align="center"><?php echo $mm_fabric_booking_by_dpd_to_mm_date ; ?></td>
    <td align="center"><?php echo $mm_trims_actual_date ; ?></td>
     
   
  </tr>
   
</table>

                            </p> </section>
                            
                          
                          
                          
                            
                        </div>
                    </div>
               
                         
            
            
           <!-- MM PART ENDS-->
             
              <!--   -----------------DPD PART BEGINS--------------    -->         
           
                    <div class="container"> 
                        <div class="row"> 
                                                      
                                                     
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>DPD Part :</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            
          
                            <section class="span12">
                            
                            <!--Table 1 for DPD Starts-->
                            
                              <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#CAF2C6">
    <td width="12%">Customer</td>
    <td width="12%">Brand</td>
    <td width="12%">Style</td>
    <td width="12%">Concern Sample Coordinator (Name)</td>
    <td width="24%">Meeting with SD, MM, DPD, Sample Fabric concern (Date)</td> 
    <td width="10%">(Clarificaition of Missing Info) Sending to SD (Date)</td>    
    <td width="10%">(Labdip/Yarndip/Pc Code/ Fab Test) Request sent to LAB (Date)</td>  
    <td width="10%">(Labdip/Yarndip/Pc Code/ Fab Test) Planned Rcvd  (Date)</td> 
    <td width="10%">(Labdip/Yarndip/Pc Code/ Fab Test) Actual (Date)</td>    
        
  </tr>   
   
    
	 <tr>
	<td align="center"><?php echo $customer ; ?></a></td>
    <td align="center"><?php echo $brand_style ; ?></td>
    <td align="center"><?php echo $style ; ?></td>
    <td align="center"><?php echo $dpd_concern_sample_coordinator_name ; ?></td>
    <td align="center"><?php echo $dpd_meeting_sd_mm_dpd_sample_date ; ?></td>
    <td align="center"><?php echo $dpd_clarification_sending_to_sd_date ; ?></td>
    <td align="center"><?php echo $dpd_labdip_req_sent_to_lab_date; ?></td>
    <td align="center"><?php echo $dpd_labdip_planned_rcvd_date  ; ?></td>
    <td align="center"><?php echo $dpd_labdip_actual_date    ; ?></td>
    
     
    
  
   
  </tr>
    
</table>

      <!-- Table 1 for DPD ended-->
      
      <!-- Table 2 for DPD starts-->
<div class="divider"><span></span></div>  
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-size:13px" bgcolor="#CAF2C6">
  
    <td width="10%">(Fabric In-Fty) Planned (Date)</td> 
    <td width="14%">(Fabric In-Fty) Actual (Date)</td> 
    <td width="11%">(Strikeoff/Mockup/ Artwork Approval) Planned Sending (Date)</td> 
    <td width="13%">(Strikeoff/Mockup/ Artwork Approval) Actual Sending Date</td>    
    <td width="12%">(Strikeoff/Mockup/ Artwork Approval)	 Approval Required (Date)</td>
     <td width="10%">(Strikeoff/Mockup/ Artwork Approval) Approval Recvd Date</td>         
    <td width="10%">(Trims In-Fty-Date) Planned (Date)</td>
    <td width="10%">(Print/Emb/ applique Panel Rcv) Planned (Date)</td>
    <td width="10%">(Sample Sewing Starts-Date) Planned (Date)</td> 
    
    </tr>                        
   
	 <tr>
    <td align="center"><?php echo $dpd_fabric_planned_date   ; ?></td>
    <td align="center"><?php echo $dpd_fabric_actual_date ; ?></td>
    <td align="center"><?php echo $dpd_strikeoff_planned_sending_date ; ?></td>
    <td align="center"><?php echo $dpd_strikeoff_actual_sending_date ; ?></td>
    <td align="center"><?php echo $dpd_strikeoff_approval_required_date ; ?></td> 
    <td align="center"><?php echo $dpd_strikeoff_approval_rcvd_date ; ?></td>  
    <td align="center"><?php echo $dpd_trims_planned_date; ?></td>
    <td align="center"><?php echo $dpd_print_planned_date ; ?></td>
    <td align="center"><?php echo $dpd_sample_planned_date ; ?></td>
    
    
    
  
   
  </tr>
                      	  
		
</table>

<!-- Table 2 for DpD ended-->
                            
                           
                            
                          </p> </section>
                            
                            
                        </div>
                    </div>
            
            
            
           <!-- DPD PART ENDS-->
           
           
            <!--   -----------------Sample PART BEGINS--------------    -->    <div class="container"> 
                        <div class="row"> 
                                                      
                                                     
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>Sample Part :</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            
          
                            <section class="span12">
                            
                           
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#CAF2C6">  
    <td width="12%" >Customer</td>
    <td width="12%" >Brand</td>
    <td width="12%" >Style</td>
    <td width="18%" >Pattern Master (Name)</td> 
    <td width="12%" >(Pattern Delivery) Planned (Date)</td> 
    <td width="12%" >(Pattern Delivery) Actual (Date)</td>    
    <td width="12%" >(Print/Emb/applique Panel Rcv) Actual (Date)</td>        
    <td width="18%" >Sewing Operators (Name/Group)</td>
    <td width="12%" >(Sample Sewing Starts-Date) Actual (Date)</td>
    <td width="18%" >Sample Final quality Inspector (Name)</td>    
    <td width="10%" >Sample Reviewed by SD & DPD prior the submission (Yes/No)</td>    
        
  </tr>   
   
    
	 <tr>
    <td align="center"><?php echo $customer ; ?></a></td>
    <td align="center"><?php echo $brand_style ; ?></td>
    <td align="center"><?php echo $style ; ?></td>
	<td align="center"><?php echo $sample_pattern_master_name ; ?></a></td>
    <td align="center"><?php echo $sample_pattern_planned_date ; ?></td>
    <td align="center"><?php echo $sample_print_actual_date ; ?></td>
    <td align="center"><?php echo $sample_print_actual_date ; ?></td>
    <td align="center"><?php echo $sample_sweing_operators_name ; ?></td>
    <td align="center"><?php echo $sample_sample_actual_date; ?></td>
    <td align="center"><?php echo $sample_sample_final_quality_ins_name  ; ?></td>
    <td align="center"><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission   ; ?></td>
    
     
    
  
   
  </tr>
 
</table>

                          </p> </section>
                            
                            
                        </div>
                    </div>
             
                
          
            
            
           <!-- Sample PART ENDS-->
           
            <!--   -----------------Sample Status PART BEGINS--------------    -->    <div class="container"> 
                        <div class="row"> 
                                                      
                                                     
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>Sample Status :</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            
          
                            <section class="span12">
                            
                           
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#CAF2C6">  
    <td width="3%" >sl</td>
    <td width="12%" >Brand</td>
     <td width="12%" >Style</td>
    <td width="18%" >Sample Status Event</td> 
    <td width="12%" >Sample Status Objective</td> 
    <td width="12%" >Time</td>    
   
  </tr>   
   <?php
    $SQL2="select * from tb_sample_status where brand_style='$brand_style_get' AND t_sl='$sl' AND sample_status_event='Responsible person delay'";
$result2=$obj->sql($SQL2);
$sl=1;
while($row=mysql_fetch_array($result2))
{
	
	?>
	 <tr>
    <td align="center"><?php echo $sl ; ?></td>
    <td align="center"><?php echo $row['brand_style'] ; ?></td>
    <td align="center"><?php echo $style ; ?></td>
	<td align="center"><?php echo $row['sample_status_event'] ; ?></a></td>
    <td align="center"><?php echo $row['sample_status_objective'] ; ?></td>
    <td align="center"><?php echo $row['update_date'] ; ?></td>
    
  </tr>
  
  <?php
  $sl++ ;
}
?>
 
</table>

                          </p> </section>
                            
                            
                        </div>
                    </div>
             
                
             <?php  } ?>
            
            
           <!-- Sample Status PART ENDS-->
             
				
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php require("re_footer_head.php"); ?>
</body></html>