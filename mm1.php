

<form action="mm1_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
									
                                    
                                    <?php if($mm_fabric_booking_by_dpd_to_mm_date!=NULL) { ?>
                                    <tr>
                                    <td> Fabric Booking By DPD to MM (Date): </td>
                                   <td><?php echo $mm_fabric_booking_by_dpd_to_mm_date ; ?>
                                  <!-- p--></td>                                     
                                  </tr>
                                  <?php } else { ?>
                                  
                                  <tr>
                                    <td> Fabric Booking By DPD to MM (Date): </td>
                                   <td><input name="mm_fabric_booking_by_dpd_to_mm_date" type="text" id="mm_fabric_booking_by_dpd_to_mm_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                  <!-- p--></td>                                     
                                  </tr>
                                  
                                  
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;">
                                                                       <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" />
                                    <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Submit »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                   <?php } ?>
                				</table>
                                </form>