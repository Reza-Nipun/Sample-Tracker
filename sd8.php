<form action="sd8_update.php" method="post">


<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                              
                                  
                                   
                                  <?php if($sd_sample_reject_pass!=NULL) { ?>
                                  <tr>
                                    <td width="46%"> Sample Reject/Pass :</td>
                                    <td width="54%"><?php echo $sd_sample_reject_pass ; ?>
                                    </td>
                                  </tr>
                                  <?php } else { ?>
                                  
                                  <tr>
                                    <td width="46%"> Sample Reject/Pass : <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /></td>
                                    <td width="54%"><input name="sd_sample_reject_pass" type="radio" value="pass" />
                    <span style="color:#000"><strong>Pass</strong></span></br>
                    <input type="radio" name="sd_sample_reject_pass" id="sd_sample_reject_pass" value="reject" />
                   
                    <span style="color:#000"><strong>Reject</strong></span>
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