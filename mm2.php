
<form action="mm2_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">


 <tr>
                                    <td> Planned Date (Trims In-Fty-Date):</td>
                                   <td><?php echo $dpd_trims_planned_date ; ?></td>                                    
    </tr>
                              
                              <?php if($mm_trims_actual_date!=NULL) { ?>
                               <tr>
                                    <td> Actual Date (Trims In-Fty-Date):</td>
                                   <td><?php echo $mm_trims_actual_date ; ?></td>                                    
    </tr>
								  <?php } else { ?>
                              
                                  <tr>
                                    <td> Actual Date (Trims In-Fty-Date):</td>
                                   <td><input name="mm_trims_actual_date" type="text" id="mm_trims_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>                                    
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
