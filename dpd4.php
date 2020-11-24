

<form action="dpd4_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                              
                             
                                 <?php if($dpd_meeting_sd_mm_dpd_sample_date!=NULL) { ?>
                                 <tr>
                                    <td> Meeting with SD, MM, DPD, Sample Fabric concern (Date):</td>
                                   <td><?php echo $dpd_meeting_sd_mm_dpd_sample_date ; ?></td>
                                  </tr>
                                  <?php } else { ?>
                                  
                                 
                                  <tr>
                                    <td> Meeting with SD, MM, DPD, Sample Fabric concern (Date):</td>
                                   <td><input name="dpd_meeting_sd_mm_dpd_sample_date" type="text" id="dpd_meeting_sd_mm_dpd_sample_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>                                     
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