<form action="sd6_update.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                              
                              
                              <?php if($sd_comments_rcvd_date!=NULL) { ?>
                                 <tr>
                                    <td> Comments received (Date) :</td>
                                    <td><?php echo $sd_comments_rcvd_date ; ?></td>
    </tr>
                                  <?php } else { ?>
                                
                                  <tr>
                                    <td> Comments received (Date) : <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /></td>
                                    <td><input name="sd_comments_rcvd_date" type="text" id="sd_comments_rcvd_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
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