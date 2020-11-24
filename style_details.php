<?php

	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$stylex=$_GET['IDX'];
	$stylex = mysql_real_escape_string($stylex);
	
	// die($stylex);
	//$name=mysql_real_escape_string($_POST['name']);

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
        <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

<script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>

	<script type="text/javascript" src="css1/jquery-1.9.0.js"></script>


     
  <?php  require("re_head.php"); ?>
        
	</head>
<body>

        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                  <style>

a:link{ text-decoration: none;
	color: gray;
}
	
a:visited{ text-decoration: none;
	color: gray;
}
a:hover{ text-decoration: none;
	color: black;
	font-weight: bolder;
	/*letter-spacing: 1px;*/
	font-size:12px;
}

</style>
<div class="container">

<a href="#index.html" class="brand"><img src="images/main-logo.png" alt="Ohmy website template"></a>
                        <nav id="mainMenu" class="clearfix">
                            <ul>
                                <li><img name="" src="images/user-icon.jpg" width="52" height="32" alt="" /></li>
                                <li><a href="index.php" class="firstLevel">Home</a>
                              </li>     
                                
                               
                              
                                
                                
                            </ul>
						</nav>
						</div>
                </div>
            </div>
            </header>
                    
        <!-- header --> 
        <!-- global wrapper -->
        <!--<div id="globalWrapper" style="position:fixed; width:100%">-->  
            <!-- page content -->
            <!-- <section id="content" class="columnPage">
                <header class="headerPage">
			  <?php // require("re_header_page.php"); ?>
                </header>
                </section> --><!--</div>-->
              <!--  for SD only-->
    <?php		  
	$SQL="select * from tb_track_info where style='$stylex'";    //table name
    //	die($SQL) ;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$customer[]=$row['customer'];
		$brand_style[]=$row['brand_style'];
		$style[]=$row['style'];
		$color[]=$row['color'];		
		$season[]=$row['season'];
		$fabric_type[]=$row['fabric_type'];		
		$print_type[]=$row['print_type'];
		$wash_type[]=$row['wash_type'];
		$product_type[]=$row['product_type'];
		$embroidery_stitch[]=$row['embroidery_stitch'];
		$sd_sample_type_name[]=$row['sd_sample_type_name'];
		$sd_sample_req_rcv_date[]=$row['sd_sample_req_rcv_date'];
		$sd_concern_sd_name[]=$row['sd_concern_sd_name'];
		$sd_techpack_rcv_fwrd_date[]=$row['sd_techpack_rcv_fwrd_date'];
		$sd_concern_dpd_name[]=$row['sd_concern_dpd_name'];
		$dpd_concern_sample_coordinator_name[]=$row['dpd_concern_sample_coordinator_name'];		
		$dpd_meeting_sd_mm_dpd_sample_date[]=$row['dpd_meeting_sd_mm_dpd_sample_date'];
		$dpd_clarification_sending_to_sd_date[]=$row['dpd_clarification_sending_to_sd_date'];
		$sd_clarification_arng_confrm_from_buyer_date[]=$row['sd_clarification_arng_confrm_from_buyer_date'];
		$sd_agreed_sample_delivery_date[]=$row['sd_agreed_sample_delivery_date'];
		$dpd_labdip_req_sent_to_lab_date[]=$row['dpd_labdip_req_sent_to_lab_date'];
		$dpd_labdip_planned_rcvd_date[]=$row['dpd_labdip_planned_rcvd_date'];
		$dpd_labdip_actual_date[]=$row['dpd_labdip_actual_date'];
		$sd_concern_mm_name[]=$row['sd_concern_mm_name'];
		
		$mm_fabricbooking_by_dpd_to_mm_date[]=$row['mm_fabricbooking_by_dpd_to_mm_date'];
		$fab_receive_planned_date[]=$row['fab_receive_planned_date'];		
		$fab_receive_actual_date[]=$row['fab_receive_actual_date'];
		$dpd_fabric_planned_date[]=$row['dpd_fabric_planned_date'];
		$dpd_fabric_actual_date[]=$row['dpd_fabric_actual_date'];
		$dpd_strikeoff_planned_sending_date[]=$row['dpd_strikeoff_planned_sending_date'];
		$dpd_strikeoff_actual_sending_date[]=$row['dpd_strikeoff_actual_sending_date'];
		$dpd_strikeoff_approval_required_date[]=$row['dpd_strikeoff_approval_required_date'];
		$dpd_strikeoff_approval_rcvd_date[]=$row['dpd_strikeoff_approval_rcvd_date'];
		$dpd_trims_planned_date[]=$row['dpd_trims_planned_date'];
		
		$mm_trims_actual_date[]=$row['mm_trims_actual_date'];
		$sample_pattern_master_name[]=$row['sample_pattern_master_name'];		
		$sample_pattern_planned_date[]=$row['sample_pattern_planned_date'];
		$sample_pattern_actual_date[]=$row['sample_pattern_actual_date'];
		$dpd_print_planned_date[]=$row['dpd_print_planned_date'];
		$sample_print_actual_date[]=$row['sample_print_actual_date'];
		$sample_sweing_operators_name[]=$row['sample_sweing_operators_name'];
		$dpd_sample_planned_date[]=$row['dpd_sample_planned_date'];
		$sample_sample_actual_date[]=$row['sample_sample_actual_date'];
		$sample_sample_final_quality_ins_name[]=$row['sample_sample_final_quality_ins_name'];
		
		$sample_sample_rvwd_by_sd_dpd_prior_submission[]=$row['sample_sample_rvwd_by_sd_dpd_prior_submission'];
		$sd_actual_sample_submission_date[]=$row['sd_actual_sample_submission_date'];
		$sd_sample_ontime_delay[]=$row['sd_sample_ontime_delay'];
		$sd_comments_rcvd_date[]=$row['sd_comments_rcvd_date'];
		$sd_sample_reject_pass[]=$row['sd_sample_reject_pass'];
		$sd_fabric_concern_name[]=$row['sd_fabric_concern_name'];
		

		$gdl_cut_panel[] = $row['gdl_cut_panel'];
		$gdl_comnt[] = $row['gdl_comnt'];
		$gdl_status[] = $row['gdl_status'];
		$gdl_date[] = $row['gdl_date'];
		
		$create_date[]=$row['create_date'];
		$cmt_sd[]=$row['cmt_sd'];
		$cmt_mm[]=$row['cmt_mm'];
		$cmt_dpd[]=$row['cmt_dpd'];
		$cmt_sample[]=$row['cmt_sample'];
		
		
	}
			     
			  
			  
			  ?>
              
              <?php  // die ('iamhear') ;  ?> 
              
              
              
            <div id="demo" style="margin-top:20px; ">
            	<script type="text/javascript">
	$(function(){
		$('#aa').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>
            
 <div id="tableWrap"> 
 
  <table cellpadding="0" cellspacing="0" border="1" class="draggable sortable" id="example" style="width: 90% !important; padding-bottom: 10px; color: #000;">
	<thead>
	<tr bgcolor="#CCFFCC" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	  <th>SL</th>
    <th>Objective</th> <!--style="width: 200px !important; "-->
    <th class="col2">Color-  <?php echo $color[0] ;  ?></th>
    <th class="col3">Color - <?php echo $color[1] ;  ?></th>
    <th class="col3">Color - <?php echo $color[2] ;  ?></th>
    <th class="col3">Color - <?php echo $color[3] ;  ?></th>
    <th class="col3">Color - <?php echo $color[4] ;  ?></th>
    <th class="col3"> Color - <?php echo $color[5] ;  ?></th>
    </tr>
	</thead>
	<tbody style="color:#000">


    
		<tr>
		  <td>1</td>
		  <td>Buyer</td>
		  <td><?php echo $customer[0] ;  ?></td>
		  <td><?php echo $customer[1] ; ?></td>
		  <td><?php echo $customer[2] ; ?></td>
		  <td><?php echo $customer[3] ; ?></td>
		  <td><?php echo $customer[4] ; ?></td>
		  <td><?php echo $customer[5] ; ?></td>
	  </tr>
		<tr>
		  <td>2</td>
		  <td>Brand/Dept.</td>
		  <td><?php echo $brand_style[0] ; ?></td>
		  <td><?php echo $brand_style[1] ; ?></td>
		  <td><?php echo $brand_style[2] ; ?></td>
		  <td><?php echo $brand_style[3] ; ?></td>
		  <td><?php echo $brand_style[4] ; ?></td>
		  <td><?php echo $brand_style[5] ; ?></td>
	  </tr>
		<tr>
		  <td>3</td>
		  <td>Style</td>
		  <td><?php echo $style[0] ; ?> </td>
		  <td><?php echo $style[1] ; ?></td>
		  <td><?php echo $style[2] ; ?></td>
		  <td><?php echo $style[3] ; ?></td>
		  <td><?php echo $style[4] ; ?></td>
		  <td><?php echo $style[5] ; ?></td>
	  </tr>
      <tr>
		  <td>3</td>
		  <td>Color</td>
		  <td><?php echo $color[0] ; ?> </td>
		  <td><?php echo $color[1] ; ?></td>
		  <td><?php echo $color[2] ; ?></td>
		  <td><?php echo $color[3] ; ?></td>
		  <td><?php echo $color[4] ; ?></td>
		  <td><?php echo $color[5] ; ?></td>
	  </tr>
		<tr>
		  <td>4</td>
		  <td>Season</td>
		  <td><?php echo $season[0] ; ?></td>
		  <td><?php echo $season[1] ; ?></td>
		  <td><?php echo $season[2] ; ?></td>
		  <td><?php echo $season[3] ; ?></td>
		  <td><?php echo $season[4] ; ?></td>
		  <td><?php echo $season[5] ; ?></td>
	  </tr>
      <tr>
		  <td>6</td>
		  <td>Fabric type</td>
		  <td><?php echo $fabric_type[0] ; ?></td>
		  <td><?php echo $fabric_type[1] ; ?></td>
		  <td><?php echo $fabric_type[2] ; ?></td>
		  <td><?php echo $fabric_type[3] ; ?></td>
		  <td><?php echo $fabric_type[4] ; ?></td>
		  <td><?php echo $fabric_type[5] ; ?></td>
	  </tr>
		<tr>
		  <td>7</td>
		  <td>Print type</td>
		  <td><?php echo $print_type[0] ; ?></td>
		  <td><?php echo $print_type[1] ; ?></td>
		  <td><?php echo $print_type[2] ; ?></td>
		  <td><?php echo $print_type[3] ; ?></td>
		  <td><?php echo $print_type[4] ; ?></td>
		  <td><?php echo $print_type[5] ; ?></td>
	  </tr>
		<tr>
		  <td>8</td>
		  <td>Wash type</td>
		  <td><?php echo $wash_type[0] ; ?></td>
		  <td><?php echo $wash_type[1] ; ?></td>
		  <td><?php echo $wash_type[2] ; ?></td>
		  <td><?php echo $wash_type[3] ; ?></td>
		  <td><?php echo $wash_type[4] ; ?></td>
		  <td><?php echo $wash_type[5] ; ?></td>
	  </tr>
      <tr>
		  <td>9</td>
		  <td>Product type</td>
		  <td><?php echo $product_type[0] ; ?></td>
		  <td><?php echo $product_type[1] ; ?></td>
		  <td><?php echo $product_type[2] ; ?></td>
		  <td><?php echo $product_type[3] ; ?></td>
		  <td><?php echo $product_type[4] ; ?></td>
		  <td><?php echo $product_type[5] ; ?></td>
	  </tr>
      <tr>
		  <td>10</td>
		  <td>Embroidey stitch</td>
		  <td><?php echo $embroidery_stitch[0] ; ?></td>
		  <td><?php echo $embroidery_stitch[1] ; ?></td>
		  <td><?php echo $embroidery_stitch[2] ; ?></td>
		  <td><?php echo $embroidery_stitch[3] ; ?></td>
		  <td><?php echo $embroidery_stitch[4] ; ?></td>
		  <td><?php echo $embroidery_stitch[5] ; ?></td>
	  </tr>
		<tr>
		  <td>11</td>
		  <td>Sample type</td>
		  <td><?php echo $sd_sample_type_name[0] ; ?></td>
		  <td><?php echo $sd_sample_type_name[1] ; ?></td>
		  <td><?php echo $sd_sample_type_name[2] ; ?></td>
		  <td><?php echo $sd_sample_type_name[3] ; ?></td>
		  <td><?php echo $sd_sample_type_name[4] ; ?></td>
		  <td><?php echo $sd_sample_type_name[5] ; ?></td>
	  </tr>
		
		
		<tr>
		  <td>12</td>
		  <td>Sample Req. Recieve Date</td>
		  <td><?php echo $sd_sample_req_rcv_date[0] ; ?></td>
		  <td><?php echo $sd_sample_req_rcv_date[1] ; ?></td>
		  <td><?php echo $sd_sample_req_rcv_date[2] ; ?></td>
		  <td><?php echo $sd_sample_req_rcv_date[3] ; ?></td>
		  <td><?php echo $sd_sample_req_rcv_date[4] ; ?></td>
		  <td><?php echo $sd_sample_req_rcv_date[5] ; ?></td>
	  </tr>
		<tr bgcolor="#FFFFCC">
		  <td>13</td>
		  <td>Concern SD</td>
		  <td><?php echo $sd_concern_sd_name[0] ; ?></td>
		  <td><?php echo $sd_concern_sd_name[1] ; ?></td>
		  <td><?php echo $sd_concern_sd_name[2] ; ?></td>
		  <td><?php echo $sd_concern_sd_name[3] ; ?></td>
		  <td><?php echo $sd_concern_sd_name[4] ; ?></td>
		  <td><?php echo $sd_concern_sd_name[5] ; ?></td>
	  </tr>
      <tr>
		  <td>14</td>
		  <td>Teckpack Recieved Forward</td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[0] ; ?></td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[1] ; ?></td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[2] ; ?></td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[3] ; ?></td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[4] ; ?></td>
		  <td><?php echo $sd_techpack_rcv_fwrd_date[5] ; ?></td>
	  </tr>
		<tr bgcolor="#FFFFCC">
		  <td>15</td>
		  <td>Concern DPD</td>
		  <td><?php echo $sd_concern_dpd_name[0] ; ?></td>
		  <td><?php echo $sd_concern_dpd_name[1] ; ?></td>
		  <td><?php echo $sd_concern_dpd_name[2] ; ?></td>
		  <td><?php echo $sd_concern_dpd_name[3] ; ?></td>
		  <td><?php echo $sd_concern_dpd_name[4] ; ?></td>
		  <td><?php echo $sd_concern_dpd_name[5] ; ?></td>
	  </tr>
      <tr bgcolor="#FFFFCC">
		  <td>16</td>
		  <td>Sample Coordinator</td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[0] ; ?></td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[1] ; ?></td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[2] ; ?></td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[3] ; ?></td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[4] ; ?></td>
		  <td><?php echo $dpd_concern_sample_coordinator_name[5] ; ?></td>
	  </tr>
      <tr>
		  <td>17</td>
		  <td>Meeting with SD, MM, DPD, SAMPLE</td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[0] ; ?></td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[1] ; ?></td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[2] ; ?></td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[3] ; ?></td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[4] ; ?></td>
		  <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>18</td>
		  <td>Clarification Sending to SD</td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[0] ; ?></td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[1] ; ?></td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[2] ; ?></td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[3] ; ?></td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[4] ; ?></td>
		  <td><?php echo $dpd_clarification_sending_to_sd_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>19</td>
		  <td>Clarification Arrange Confirmation from Buyer</td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[0] ; ?></td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[1] ; ?></td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[2] ; ?></td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[3] ; ?></td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[4] ; ?></td>
		  <td><?php echo $sd_clarification_arng_confrm_from_buyer_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>20</td>
		  <td>Agreed Sample Delivery Date</td>
		  <td><?php echo $sd_agreed_sample_delivery_date[0] ; ?></td>
		  <td><?php echo $sd_agreed_sample_delivery_date[1] ; ?></td>
		  <td><?php echo $sd_agreed_sample_delivery_date[2] ; ?></td>
		  <td><?php echo $sd_agreed_sample_delivery_date[3] ; ?></td>
		  <td><?php echo $sd_agreed_sample_delivery_date[4] ; ?></td>
		  <td><?php echo $sd_agreed_sample_delivery_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>21</td>
		  <td>Labdip Request Sent to Lab Date</td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[0] ; ?></td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[1] ; ?></td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[2] ; ?></td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[3] ; ?></td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[4] ; ?></td>
		  <td><?php echo $dpd_labdip_req_sent_to_lab_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>22</td>
		  <td>Labdip Planned Recieved Date</td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[0] ; ?></td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[1] ; ?></td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[2] ; ?></td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[3] ; ?></td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[4] ; ?></td>
		  <td><?php echo $dpd_labdip_planned_rcvd_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>23</td>
		  <td>Labdip Actual Date</td>
		  <td><?php echo $dpd_labdip_actual_date[0] ; ?></td>
		  <td><?php echo $dpd_labdip_actual_date[1] ; ?></td>
		  <td><?php echo $dpd_labdip_actual_date[2] ; ?></td>
		  <td><?php echo $dpd_labdip_actual_date[3] ; ?></td>
		  <td><?php echo $dpd_labdip_actual_date[4] ; ?></td>
		  <td><?php echo $dpd_labdip_actual_date[5] ; ?></td>
	  </tr>
		<tr bgcolor="#FFFFCC">
		  <td>24</td>
		  <td>Concern MM</td>
		  <td><?php echo $sd_concern_mm_name[0] ; ?></td>
		  <td><?php echo $sd_concern_mm_name[1] ; ?></td>
		  <td><?php echo $sd_concern_mm_name[2] ; ?></td>
		  <td><?php echo $sd_concern_mm_name[3] ; ?></td>
		  <td><?php echo $sd_concern_mm_name[4] ; ?></td>
		  <td><?php echo $sd_concern_mm_name[5] ; ?></td>
	  </tr>
		<tr>
		  <td>25</td>
		  <td>Fabric Concern --</td>
		  <td><?php echo $sd_fabric_concern_name[0] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[1] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[2] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[3] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[4] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[5] ; ?></td>
	  </tr>
      
      
      
      
      
		<tr>
		  <td>26</td>
		  <td>Fabric Booking by DPD to MM</td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[0] ;  ?></td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[1] ; ?></td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[2] ; ?></td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[3] ; ?></td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[4] ; ?></td>
		  <td><?php echo $mm_fabricbooking_by_dpd_to_mm_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>27</td>
		  <td>Fabric Recieved Planned Date</td>
		  <td><?php echo $fab_receive_planned_date[0] ; ?></td>
		  <td><?php echo $fab_receive_planned_date[1] ; ?></td>
		  <td><?php echo $fab_receive_planned_date[2] ; ?></td>
		  <td><?php echo $fab_receive_planned_date[3] ; ?></td>
		  <td><?php echo $fab_receive_planned_date[4] ; ?></td>
		  <td><?php echo $fab_receive_planned_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>28</td>
		  <td>Fabric Recieved Actual Date</td>
		  <td><?php echo $fab_receive_actual_date[0] ; ?> </td>
		  <td><?php echo $fab_receive_actual_date[1] ; ?></td>
		  <td><?php echo $fab_receive_actual_date[2] ; ?></td>
		  <td><?php echo $fab_receive_actual_date[3] ; ?></td>
		  <td><?php echo $fab_receive_actual_date[4] ; ?></td>
		  <td><?php echo $fab_receive_actual_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>29</td>
		  <td>Fabric Planned Date</td>
		  <td><?php echo $dpd_fabric_planned_date[0] ; ?> </td>
		  <td><?php echo $dpd_fabric_planned_date[1] ; ?></td>
		  <td><?php echo $dpd_fabric_planned_date[2] ; ?></td>
		  <td><?php echo $dpd_fabric_planned_date[3] ; ?></td>
		  <td><?php echo $dpd_fabric_planned_date[4] ; ?></td>
		  <td><?php echo $dpd_fabric_planned_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>30</td>
		  <td>Fabric Actual Date</td>
		  <td><?php echo $dpd_fabric_actual_date[0] ; ?></td>
		  <td><?php echo $dpd_fabric_actual_date[1] ; ?></td>
		  <td><?php echo $dpd_fabric_actual_date[2] ; ?></td>
		  <td><?php echo $dpd_fabric_actual_date[3] ; ?></td>
		  <td><?php echo $dpd_fabric_actual_date[4] ; ?></td>
		  <td><?php echo $dpd_fabric_actual_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>31</td>
		  <td>Strikeoff Planned Sending Date</td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[0] ; ?></td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[1] ; ?></td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[2] ; ?></td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[3] ; ?></td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[4] ; ?></td>
		  <td><?php echo $dpd_strikeoff_planned_sending_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>32</td>
		  <td>Strikeoff Actual Sending Date</td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[0] ; ?></td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[1] ; ?></td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[2] ; ?></td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[3] ; ?></td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[4] ; ?></td>
		  <td><?php echo $dpd_strikeoff_actual_sending_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>33</td>
		  <td>Strikeoff Approval Required Date</td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[0] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[1] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[2] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[3] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[4] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_required_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>34</td>
		  <td>Strikeoff Approval Recieved Date</td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[0] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[1] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[2] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[3] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[4] ; ?></td>
		  <td><?php echo $dpd_strikeoff_approval_rcvd_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>35</td>
		  <td>Trims Planned Date</td>
		  <td><?php echo $dpd_trims_planned_date[0] ; ?></td>
		  <td><?php echo $dpd_trims_planned_date[1] ; ?></td>
		  <td><?php echo $dpd_trims_planned_date[2] ; ?></td>
		  <td><?php echo $dpd_trims_planned_date[3] ; ?></td>
		  <td><?php echo $dpd_trims_planned_date[4] ; ?></td>
		  <td><?php echo $dpd_trims_planned_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>36</td>
		  <td>trims Actual Date</td>
		  <td><?php echo $mm_trims_actual_date[0] ; ?></td>
		  <td><?php echo $mm_trims_actual_date[1] ; ?></td>
		  <td><?php echo $mm_trims_actual_date[2] ; ?></td>
		  <td><?php echo $mm_trims_actual_date[3] ; ?></td>
		  <td><?php echo $mm_trims_actual_date[4] ; ?></td>
		  <td><?php echo $mm_trims_actual_date[5] ; ?></td>
	  </tr>
		
		
		<tr>
		  <td>37</td>
		  <td>Pattern Master Name</td>
		  <td><?php echo $sample_pattern_master_name[0] ; ?></td>
		  <td><?php echo $sample_pattern_master_name[1] ; ?></td>
		  <td><?php echo $sample_pattern_master_name[2] ; ?></td>
		  <td><?php echo $sample_pattern_master_name[3] ; ?></td>
		  <td><?php echo $sample_pattern_master_name[4] ; ?></td>
		  <td><?php echo $sample_pattern_master_name[5] ; ?></td>
	  </tr>
		<tr>
		  <td>38</td>
		  <td>Pattern Planned Date</td>
		  <td><?php echo $sample_pattern_planned_date[0] ; ?></td>
		  <td><?php echo $sample_pattern_planned_date[1] ; ?></td>
		  <td><?php echo $sample_pattern_planned_date[2] ; ?></td>
		  <td><?php echo $sample_pattern_planned_date[3] ; ?></td>
		  <td><?php echo $sample_pattern_planned_date[4] ; ?></td>
		  <td><?php echo $sample_pattern_planned_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>39</td>
		  <td>Pattern Actual Date</td>
		  <td><?php echo $sample_pattern_actual_date[0] ; ?></td>
		  <td><?php echo $sample_pattern_actual_date[1] ; ?></td>
		  <td><?php echo $sample_pattern_actual_date[2] ; ?></td>
		  <td><?php echo $sample_pattern_actual_date[3] ; ?></td>
		  <td><?php echo $sample_pattern_actual_date[4] ; ?></td>
		  <td><?php echo $sample_pattern_actual_date[5] ; ?></td>
	  </tr>
		<tr>
		  <td>40</td>
		  <td>Print Planned Date</td>
		  <td><?php echo $dpd_print_planned_date[0] ; ?></td>
		  <td><?php echo $dpd_print_planned_date[1] ; ?></td>
		  <td><?php echo $dpd_print_planned_date[2] ; ?></td>
		  <td><?php echo $dpd_print_planned_date[3] ; ?></td>
		  <td><?php echo $dpd_print_planned_date[4] ; ?></td>
		  <td><?php echo $dpd_print_planned_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>41</td>
		  <td>Print Actual Date</td>
		  <td><?php echo $sample_print_actual_date[0] ; ?></td>
		  <td><?php echo $sample_print_actual_date[1] ; ?></td>
		  <td><?php echo $sample_print_actual_date[2] ; ?></td>
		  <td><?php echo $sample_print_actual_date[3] ; ?></td>
		  <td><?php echo $sample_print_actual_date[4] ; ?></td>
		  <td><?php echo $sample_print_actual_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>42</td>
		  <td>Swing Operator Name/Group</td>
		  <td><?php echo $sample_sweing_operators_name[0] ; ?></td>
		  <td><?php echo $sample_sweing_operators_name[1] ; ?></td>
		  <td><?php echo $sample_sweing_operators_name[2] ; ?></td>
		  <td><?php echo $sample_sweing_operators_name[3] ; ?></td>
		  <td><?php echo $sample_sweing_operators_name[4] ; ?></td>
		  <td><?php echo $sample_sweing_operators_name[5] ; ?></td>
	  </tr>
      <tr>
		  <td>43</td>
		  <td>Sample Swing Planned Date</td>
		  <td><?php echo $dpd_sample_planned_date[0] ; ?></td>
		  <td><?php echo $dpd_sample_planned_date[1] ; ?></td>
		  <td><?php echo $dpd_sample_planned_date[2] ; ?></td>
		  <td><?php echo $dpd_sample_planned_date[3] ; ?></td>
		  <td><?php echo $dpd_sample_planned_date[4] ; ?></td>
		  <td><?php echo $dpd_sample_planned_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>44</td>
		  <td>Sample Swing Actual Date</td>
		  <td><?php echo $sample_sample_actual_date[0] ; ?></td>
		  <td><?php echo $sample_sample_actual_date[1] ; ?></td>
		  <td><?php echo $sample_sample_actual_date[2] ; ?></td>
		  <td><?php echo $sample_sample_actual_date[3] ; ?></td>
		  <td><?php echo $sample_sample_actual_date[4] ; ?></td>
		  <td><?php echo $sample_sample_actual_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>45</td>
		  <td>Sample Final Quality Inspector Name</td>
		  <td><?php echo $sample_sample_final_quality_ins_name[0] ; ?></td>
		  <td><?php echo $sample_sample_final_quality_ins_name[1] ; ?></td>
		  <td><?php echo $sample_sample_final_quality_ins_name[2] ; ?></td>
		  <td><?php echo $sample_sample_final_quality_ins_name[3] ; ?></td>
		  <td><?php echo $sample_sample_final_quality_ins_name[4] ; ?></td>
		  <td><?php echo $sample_sample_final_quality_ins_name[5] ; ?></td>
	  </tr>
      <tr>
		  <td>46</td>
		  <td>Sample Reviewed by SD, DPD prior Submission</td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[0] ; ?></td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[1] ; ?></td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[2] ; ?></td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[3] ; ?></td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[4] ; ?></td>
		  <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission[5] ; ?></td>
	  </tr>
      <tr bgcolor="#CCCCFF">
        <td>47</td>
        <td>GDL Cut Panel</td>
		  <td><?php echo $gdl_cut_panel[0].' ( Receive Date: '.$gdl_date[0].' )' ; ?></td>
		  <td><?php echo $gdl_cut_panel[1].' ( Receive Date: '.$gdl_date[1].' )' ; ?></td>
		  <td><?php echo $gdl_cut_panel[2].' ( Receive Date: '.$gdl_date[2].' )'  ; ?></td>
		  <td><?php echo $gdl_cut_panel[3].' ( Receive Date: '.$gdl_date[3].' )'  ; ?></td>
		  <td><?php echo $gdl_cut_panel[4].' ( Receive Date: '.$gdl_date[4].' )'  ; ?></td>
		  <td><?php echo $gdl_cut_panel[5].' ( Receive Date: '.$gdl_date[5].' )'  ; ?></td>
      </tr>
      <tr bgcolor="#CCCCFF">
        <td>48</td>
        <td>GDL Comment</td>
		  <td><?php echo $gdl_comnt[0] ; ?></td>
		  <td><?php echo $gdl_comnt[1] ; ?></td>
		  <td><?php echo $gdl_comnt[2] ; ?></td>
		  <td><?php echo $gdl_comnt[3] ; ?></td>
		  <td><?php echo $gdl_comnt[4] ; ?></td>
		  <td><?php echo $gdl_comnt[5] ; ?></td>
      </tr>
      <tr bgcolor="#CCCCFF">
        <td>49</td>
        <td>GDL Status</td>
		  <td><?php echo $gdl_status[0] ; ?></td>
		  <td><?php echo $gdl_status[1] ; ?></td>
		  <td><?php echo $gdl_status[2] ; ?></td>
		  <td><?php echo $gdl_status[3] ; ?></td>
		  <td><?php echo $gdl_status[4] ; ?></td>
		  <td><?php echo $gdl_status[5] ; ?></td>
      </tr>
      <tr>
		  <td>50</td>
		  <td>Actual Sample Submission Date</td>
		  <td><?php echo $sd_actual_sample_submission_date[0] ; ?></td>
		  <td><?php echo $sd_actual_sample_submission_date[1] ; ?></td>
		  <td><?php echo $sd_actual_sample_submission_date[2] ; ?></td>
		  <td><?php echo $sd_actual_sample_submission_date[3] ; ?></td>
		  <td><?php echo $sd_actual_sample_submission_date[4] ; ?></td>
		  <td><?php echo $sd_actual_sample_submission_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>51</td>
		  <td>Sample Ontime Delay</td>
		  <td><?php echo $sd_sample_ontime_delay[0] ; ?></td>
		  <td><?php echo $sd_sample_ontime_delay[1] ; ?></td>
		  <td><?php echo $sd_sample_ontime_delay[2] ; ?></td>
		  <td><?php echo $sd_sample_ontime_delay[3] ; ?></td>
		  <td><?php echo $sd_sample_ontime_delay[4] ; ?></td>
		  <td><?php echo $sd_sample_ontime_delay[5] ; ?></td>
	  </tr>
		<tr>
		  <td>52</td>
		  <td>Comments Recieved Date</td>
		  <td><?php echo $sd_comments_rcvd_date[0] ; ?></td>
		  <td><?php echo $sd_comments_rcvd_date[1] ; ?></td>
		  <td><?php echo $sd_comments_rcvd_date[2] ; ?></td>
		  <td><?php echo $sd_comments_rcvd_date[3] ; ?></td>
		  <td><?php echo $sd_comments_rcvd_date[4] ; ?></td>
		  <td><?php echo $sd_comments_rcvd_date[5] ; ?></td>
	  </tr>
      <tr>
		  <td>53</td>
		  <td>Sample Reject/Pass</td>
		  <td><?php echo $sd_sample_reject_pass[0] ; ?></td>
		  <td><?php echo $sd_sample_reject_pass[1] ; ?></td>
		  <td><?php echo $sd_sample_reject_pass[2] ; ?></td>
		  <td><?php echo $sd_sample_reject_pass[3] ; ?></td>
		  <td><?php echo $sd_sample_reject_pass[4] ; ?></td>
		  <td><?php echo $sd_sample_reject_pass[5] ; ?></td>
	  </tr>
		<tr>
		  <td>54</td>
		  <td>Fabric Concern</td>
		  <td><?php echo $sd_fabric_concern_name[0] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[1] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[2] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[3] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[4] ; ?></td>
		  <td><?php echo $sd_fabric_concern_name[5] ; ?></td>
	  </tr>
		<tr>
		  <td>55</td>
		  <td>Create Date</td>
		  <td><?php echo $create_date[0] ; ?></td>
		  <td><?php echo $create_date[1] ; ?></td>
		  <td><?php echo $create_date[2] ; ?></td>
		  <td><?php echo $create_date[4] ; ?></td>
		  <td><?php echo $create_date[5] ; ?></td>
		  <td><?php echo $create_date[6] ; ?></td>
	    </tr>
		<tr>
		  <td>56</td>
		  <td>Remark SD </td>
		  <td><?php echo $cmt_sd[0] ; ?></td>
		  <td><?php echo $cmt_sd[1] ; ?></td>
		  <td><?php echo $cmt_sd[2] ; ?></td>
		  <td><?php echo $cmt_sd[3] ; ?></td>
		  <td><?php echo $cmt_sd[4] ; ?></td>
		  <td><?php echo $cmt_sd[5] ; ?></td>
	    </tr>
		<tr>
		  <td>57</td>
		  <td>Remark DPD</td>
		  <td><?php echo $cmt_dpd[0] ; ?></td>
		  <td><?php echo $cmt_dpd[1] ; ?></td>
		  <td><?php echo $cmt_dpd[2] ; ?></td>
		  <td><?php echo $cmt_dpd[3] ; ?></td>
		  <td><?php echo $cmt_dpd[4] ; ?></td>
		  <td><?php echo $cmt_dpd[5] ; ?></td>
	    </tr>
		<tr>
		  <td>58</td>
		  <td>Remark sample</td>
		  <td><?php echo $cmt_sample[0] ; ?></td>
		  <td><?php echo $cmt_sample[1] ; ?></td>
		  <td><?php echo $cmt_sample[2] ; ?></td>
		  <td><?php echo $cmt_sample[3] ; ?></td>
		  <td><?php echo $cmt_sample[4] ; ?></td>
		  <td><?php echo $cmt_sample[5] ; ?></td>
	    </tr>
		<tr>
		  <td>59</td>
		  <td>Remark MM</td>
		  <td><?php echo $cmt_mm[0] ; ?></td>
		  <td><?php echo $cmt_mm[1] ; ?></td>
		  <td><?php echo $cmt_mm[2] ; ?></td>
		  <td><?php echo $cmt_mm[3] ; ?></td>
		  <td><?php echo $cmt_mm[4] ; ?></td>
		  <td><?php echo $cmt_mm[5] ; ?></td>
	    </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
        
      
        
<!--		<tr class="gradex">
		  <td>2</td>
			<td>Trident</td>
			<td>Internet
				 Explorer 5.0</td>
			<td>soeab</td>
			<td>&nbsp;</td>
			<td>Win 95+</td>
			<td class="center">5</td>
			<td class="center">C</td>
		</tr>-->

	</tbody>
    
</table>

</div>
<div align="center">
<br /><button id="aa" style="cursor:pointer">Click to download as Excel</button>
</div>
  <br>


<table align="center" class="bottomBorder" id="gradient-style" width="50%" border="1" cellspacing="0" cellpadding="0">
  
  <tr bgcolor="#CCFFCC">
    <td><strong>Sl</strong></td>
    <td><strong>Style</strong></td>    
    <td><strong>Color </strong></td> 
    <td><strong>Responsible for Delay</strong></td>
    <td><strong>Day</strong></td></tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$stylex' AND sample_status_event  like 'Responsible person delay' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><?php echo $row['brand_style']; ?></td>
    <td><?php echo $row['color']; ?></td>
    <td><span style="font-size:12px"><?php echo $row['sample_status_objective']; ?></span>
	</td>
    <td><?php echo $row['update_date']; ?></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
<br>
  <table align="center" class="bottomBorder" id="gradient-style" width="50%" border="1" cellspacing="0" cellpadding="0">
  
  <tr bgcolor="#CCFFCC">
    <td><strong>Sl</strong></td>
    <td><strong>Style</strong></td>   
    <td><strong> Color  </strong></td> 
    <td><strong>Message</strong></td>
    <td><strong>Reasons of Sample Rejection</strong></td>
  </tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$stylex' AND sample_status_event  like 'SD DPD HEAD COMMENT' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><?php echo $row['brand_style']; ?></td>
    <td><?php echo $row['color']; ?></td>
    <td><span style="font-size:13px"><?php echo $row['update_date']; ?></span><br><?php echo $row['user']; ?>
</td>
    <td><?php echo $row['sample_status_objective']; ?></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
  <br>                         
<table align="center" class="bottomBorder" id="gradient-style" width="50%" border="1" cellspacing="0" cellpadding="0">
  
  <tr bgcolor="#CCFFCC">
    <td width="10%"><strong>Sl</strong></td>
    <td width="45%"><strong>Style- Color </strong></td>   
    <td width="45%"><strong>Message</strong></td>
    <td width="45%"><strong>Responsible Person</strong></td>
  </tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$stylex' AND sample_status_event  like 'Responsible Person Rejection' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><?php echo $row['brand_style']; ?>  - <?php echo $row['color']; ?></td>
    <td><span style="font-size:12px"><?php echo $row['update_date']; ?></span><br><?php echo $row['user']; ?>
</td>
    <td><?php echo $row['sample_status_objective']; ?></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
<br>



	<script type="text/javascript">
	$(function(){
		$('#bb').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap1').html()) 
			location.href=url
			return false
		})
	})
	</script>
    <div id="tableWrap1" align="center">

<div align="center" style="width:800px; margin-left:20px">
  <h2 align="center">Check List</h2>
  <table align="center" class="draggable sortable" id="gradient-style" width="50%" border="1" cellspacing="0" cellpadding="0">

  
  <thead style="color:#000">
  
  <tr bgcolor="#FFFFCC" style="color:#000">
    <th>Sl</th>
    <th>Style </th>   
    <th>Color   </th>
    <th>Type    </th>
    <th>Item Name</th>
    <th>Remark        </th>
    
    </tr>
    </thead>
  
 <?php
 $SQL="select * from tb_check_list where style ='$stylex' order by color ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></td>
    <td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td><?php echo $row['color'] ; ?></td>
    <td><?php echo $row['object'] ; ?></td>
    <td><?php echo $row['list_name'] ; ?></td>
    <td><?php echo $row['remark'] ; ?></td>
</tr>
<?php
$sl++;
	}
	?>

</table>

</div>

<br/>
<button id="bb" style="cursor:pointer">Click to download as Excel</button>

</div>


        </div>
			<br>
<br>
<br>
<br>

            
          <!--  <form>

    <input type="checkbox" name="col02" checked="checked" /> Customer 
    <input type="checkbox" name="col3" checked="checked" /> Brand/Dept 
    <input type="checkbox" name="col4" checked="checked" />  Style
    <input type="checkbox" name="col5" checked="checked" />  Color 
    <input type="checkbox" name="col6" checked="checked" /> Sample Type 
    <input type="checkbox" name="col7" checked="checked" /> Season
    <input type="checkbox" name="col8" checked="checked" /> Fabric Type
    <input type="checkbox" name="col9" checked="checked" /> Print Type
    <input type="checkbox" name="col10" checked="checked" /> Product Type

    </form>-->
	

        

		

</body>
</html>