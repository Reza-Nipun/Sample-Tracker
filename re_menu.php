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
<a href="index.php" class="brand">
VTG
<!--<img src="images/main-logo.png" alt="Ohmy website template">--></a>
                        <nav id="mainMenu" class="clearfix">
                            <ul>
      <li><img name="" src="images/user-icon.jpg" width="52" height="32" alt="" />(<?php echo $user_name ; ?>)</li>
      <?php if($user_rule!='13') { ?><li><a href="home.php" class="firstLevel">Home</a></li><?php } ?> 
      
                           <?php if($user_rule=='6') { ?>
  <li><a href="report_mm_head.php" class="firstLevel last">MM</a></li>
  <li><a href="home_sd_all.php" class="firstLevel last">SD</a></li>
  <li><a href="sd_buyer_head_track.php" class="firstLevel last">Track</a></li>
  <li><a href="home_dpd_all.php" class="firstLevel last">All(DPD)</a></li>
                           <li><a href="home_dpd_fabric.php" class="firstLevel last">Fab. Booking</a></li>
                           <li><a href="home_dpd_cancel_fabric.php" class="firstLevel last">Cancel List</a></li>
                           
						   <?php } if($user_rule=='13') { ?> 
  <li><a href="home_sd_all.php" class="firstLevel">SD Requisition</a></li>
  <!--<li><a href="report_mm_head.php" class="firstLevel last">MM</a></li>
  <li><a href="home_dpd_all.php" class="firstLevel last">DPD</a></li>-->
  <li><a href="sd_fabric_status_all.php" class="firstLevel last">Fabric Status</a></li>
														   
						<?php }  if($user_rule=='1') { ?>
                                 <li><a href="home_sd.php" class="firstLevel last">Work Space (SD)</a></li>
                                 <li><a href="sd_fabric_status.php" class="firstLevel last">Fabric Status</a></li>
                                 <li><a href="home_sd_all.php" class="firstLevel last">All Sample</a></li>
                                 <li><a href="home_booking_exl_dwnld.php" class="firstLevel last">Booking Dwnld (Exl)<img src="images/new_animated3.gif" width="35" height="12" /></a></li>
                                        <li><a href="sd_status.php" class="firstLevel last">Status Update</a></li>
                                                           <?php } ?>  
                                                            <?php if($user_rule=='2') { ?>
                                 <li><a href="home_mm.php" class="firstLevel last">Work(MM)</a></li>
                                 <li><a href="home_mm_sto.php" class="firstLevel last">STO</a></li>
                                 <li><a style="padding-right:1px" href="home_mm_sto_update.php" class="firstLevel last">Update STO <img src="images/new_animated3.gif" width="35" height="12" /></a></li>
                                 
                                 <!--<li><a href="home_mm_sto_update.php" class="firstLevel last">Update STO</a></li>-->
                                 <li><a href="home_mm_sto_all.php" class="firstLevel last">STO(ALL)</a></li>
                                 <li><a href="home_dying_all.php" class="firstLevel last">Dyeing Complete List</a></li>
                                 <li><a href="home_mm_cancel_fabric.php" class="firstLevel last">Cancel List</a></li>
                                                           
														   <?php } ?> 
                                                            <?php if($user_rule=='3') { ?>
                                 <li><a href="home_dpd.php" class="firstLevel last">Work(DPD)</a></li>
                                 <li><a href="home_dpd_all.php" class="firstLevel last">All(DPD)</a></li>
                                 <li><a href="home_dpd_fabric.php" class="firstLevel last">Fab. Booking</a></li>
                                 
                                 <li><a href="home_booking_exl_dwnld.php" class="firstLevel last">Download Exl<img src="images/new_animated3.gif" width="35" height="12" /></a></li>
                                 
                                 <li><a style="padding-right:1px" href="available_fabric_list.php" class="firstLevel last">Available Fab. List</a></li>
                              <!--<li><a href="yd_fabric_booking.php" target="_blank" class="firstLevel last">Yarn Dyed</a></li>-->
                                 <li><a href="home_dpd_cancel_fabric.php" class="firstLevel last">Cancel List</a></li>
                                 <!--<li><a href="sample_out.php" class="firstLevel last">Sample Out</a></li>-->
                                                           <?php } ?> 
                                                           <?php if($user_rule=='4') { ?>
                                 <li><a href="home_sample.php" class="firstLevel last">Work Space (Sample)</a></li>
                                                           <?php } ?>  
                                                           <?php if($user_rule=='7') { ?>
                                 <li><a href="home_check.php" class="firstLevel last">Work Space (Check list)</a></li>
                                 <li><a href="check_list.php" class="firstLevel last">Check list details</a></li>
                                                           <?php } ?> 
                                                            <?php if($user_rule=='8') { ?>
                                                            
                                 <li><a href="home_dying.php" class="firstLevel last">Work Space (Dying)</a></li>
                                 
                                 <!--<li><a href="home_dying_search.php" class="firstLevel last">Work Search</a></li>-->
                                 
                                 <li><a href="home_dying_all.php" class="firstLevel last">All Work</a></li>
                                 <li><a href="home_dying_cancel_fabric.php" class="firstLevel last">Cancel List</a></li>
                                                           <?php } ?>  
                                                             <?php if($user_rule=='9') { ?>
                                 <li><a href="home_store.php" class="firstLevel last">Work (Store)</a></li>
                                 <li><a href="home_store_all.php" class="firstLevel last">All Work</a></li>
                                 <li><a href="available_fabric_list_store.php" class="firstLevel last">Available Fab. List</a></li>
                                 <li><a href="store_rack.php" class="firstLevel last">Rack in</a></li>
                                                           <?php } ?>  
                                          	                 
                                                                  <?php if($user_rule=='10') { ?>
                                 <li><a href="home_knitting.php" class="firstLevel last">Work Space(Knitting)</a></li>
                                 <li><a href="home_knitting_complete.php" class="firstLevel last">Completed Work</a></li>
                                 <li><a href="home_knitting_all.php" class="firstLevel last">All Work</a></li>
                                 <li><a href="home_knitting_cancel_fabric.php" class="firstLevel last">Cancel List</a></li>
                                 <li><a href="tracker_balance_report.php" target="_blank" class="firstLevel last">Knitting Report</a></li>
                                                           <?php } ?>  
                                                           
                                                              <?php if($user_rule=='11') { ?>
                                 <li><a href="home_gdl.php" class="firstLevel last">Work Space(GDL)</a></li>
                                 <li><a href="home_gdl_all.php" class="firstLevel last">All Work</a></li>
                                                           <?php } ?>  
                                                           
                                                           <?php if($user_rule=='12') { ?>
                                 <li><a href="home_emb.php" class="firstLevel last">Work Space(EMB)</a></li>
                                 <li><a href="home_emb_all.php" class="firstLevel last">All Work</a></li>
                                                           <?php } ?>
                                                           
                                                           
                                <li><a href="forced.php" class="firstLevel last">Accounts</a>
                               <!-- 
                                <ul>
                                <li><a href="forced.php" class="firstLevel last">Accounts</a>
                                </li></ul><--></li>
                                
                                
                                </li>                                             
                                <li><a href="logout.php" class="firstLevel last">Logout</a></li>
                                
                                
                            </ul>
						</nav>
						</div>