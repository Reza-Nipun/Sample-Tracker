
<form action="dpd5_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
   
   
   <?php if($dpd_labdip_actual_date!=NULL) { ?>
   <tr>
      <td> Actual Date (Labdip/Yarndip/Pc Code/ Fab Test) : </td>
       <td><?php echo $dpd_labdip_actual_date ; ?></td>    
    </tr>
    
    
    <?php } else { ?>
    <tr>
      <td> Actual Date (Labdip/Yarndip/Pc Code/ Fab Test) : </td>
       <td><input name="dpd_labdip_actual_date" type="text" id="dpd_labdip_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>    
    </tr>
    <?php } ?>
    
    
    
                                     <?php if($dpd_fabric_planned_date!=NULL) { ?>
    								<tr>
                                    <td>Planned Date (Fabric In-Fty):</td>
                                    <td><?php echo $dpd_fabric_planned_date ; ?>
                                    </td>
                                    </tr>  
									
								  <?php } else { ?>
                                  <tr>
                                    <td>Planned Date (Fabric In-Fty):</td>
                                    <td><input name="dpd_fabric_planned_date" type="text" id="dpd_fabric_planned_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    
                                    
                               
                                 
                                 
                                 <?php if($dpd_fabric_actual_date!=NULL) { ?>
                                 <tr>
                                    <td> Actual Date (Fabric In-Fty):</td>
                                    <td><?php echo $dpd_fabric_actual_date ; ?>
                                    </td>
                                   </tr>
                                 
								 <?php } else { ?>
                                  <tr>
                                    <td> Actual Date (Fabric In-Fty):</td>
                                    <td><input name="dpd_fabric_actual_date" type="text" id="dpd_fabric_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                   </tr>
                                   <?php } ?>
                                   
                                   
                                   
                                   <?php if($dpd_strikeoff_approval_required_date!=NULL) { ?>
                                    <tr>
                                    <td>Approval Required Date (Strikeoff/Mockup/Artwork Approval):</td>
                                    <td><?php echo $dpd_strikeoff_approval_required_date ; ?></td>
                                   </tr>
                                   
                                   <?php } else { ?>
                                   <tr>
                                    <td>Approval Required Date (Strikeoff/Mockup/Artwork Approval):</td>
                                    <td><input name="dpd_strikeoff_approval_required_date" type="text" id="dpd_strikeoff_approval_required_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                   </tr>
								   <?php } ?>
                                   
                                    <?php if($dpd_strikeoff_approval_rcvd_date!=NULL) { ?>
                   
                    <tr>
                     <td> Approval Recvd Date (Strikeoff/Mockup/Artwork Approval): </td>
                      <td><?php echo $dpd_strikeoff_approval_rcvd_date ; ?></td>
                        </tr>
                                  
                                  <?php } else { ?> 
                                  <tr>
                                    <td> Approval Recvd Date (Strikeoff/Mockup/Artwork Approval) : </td>
                                   <td><input name="dpd_strikeoff_approval_rcvd_date" type="text" id="dpd_strikeoff_approval_rcvd_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>
                                  </tr>
                                  <?php } ?>
                                   
                                   
                                   <?php if($dpd_trims_planned_date!=NULL) { ?>
                                    <tr>
                                    <td>Planned Date (Trims In-Fty-Date):</td>
                                    <td><?php echo $dpd_trims_planned_date ; ?>
                                    </td>
                                    </tr>
                                    
                                    <?php } else { ?>
                                    <tr>
                                    <td>Planned Date (Trims In-Fty-Date):</td>
                                    <td><input name="dpd_trims_planned_date" type="text" id="dpd_trims_planned_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                    </tr>
                                     <?php } ?>
                                    
                               
                               <?php if($dpd_print_planned_date!=NULL) { ?>
                               <tr>
                                    <td> Planned Date (Print/Emb/applique Panel Rcv) :</td>
                                    <td><?php echo $dpd_print_planned_date ; ?>
                                    </td>
                                   </tr>
                               
                                  <?php } else { ?>
                                  <tr>
                                    <td> Planned Date (Print/Emb/applique Panel Rcv) :</td>
                                    <td><input name="dpd_print_planned_date" type="text" id="dpd_print_planned_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                   </tr>
                                    <?php } ?>
                                   
                                   <?php if($dpd_sample_planned_date!=NULL) { ?>
                                    <tr>
                                    <td>Planned Date (Sample Sewing Starts-Date)</td>
                                    <td><?php echo $dpd_sample_planned_date ; ?>
                                    </td>
                                    </tr>
                                    
                                    <?php } else { ?>
                                    <tr>
                                    <td>Planned Date (Sample Sewing Starts-Date)</td>
                                    <td><input name="dpd_sample_planned_date" type="text" id="dpd_sample_planned_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                    </tr>
                               
                                
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;">
                                     <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" />
                                    <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Update »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                  <?php } ?>
                                 
                </table>
                </form>