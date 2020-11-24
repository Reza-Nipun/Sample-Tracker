<form action="sd7_update.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
 
     <tr>
                                  <td> Agreed Sample Delivery (Date) : </td>
                                    <td><?php echo $sd_agreed_sample_delivery_date ; ?></td>
    </tr>
 
 
                                <?php if($sd_actual_sample_submission_date!=NULL) { ?>
                                <tr>
                                  <td> Actual sample submission (Date) : </td>
                                    <td><?php echo $sd_actual_sample_submission_date ; ?></td>
    </tr>
                                  <?php } else { ?>
                                  
                                
                                <tr>
                                   <td> Actual sample submission (Date) : <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /></td>
                                    <td><input name="sd_actual_sample_submission_date" type="text" id="sd_actual_sample_submission_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                  </tr>
                                
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;"><input name="Submit" type="submit" class="btn btn-success" id="submit" value="Update »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                  <?php } ?>
                </table>
                </form>