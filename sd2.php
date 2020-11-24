<form action="sd2_update.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                 
                                 <tr>
                                    <td> Sending to SD Date(Clarificaition of Missing Info) </td>
                                   <td><?php
								   
								
								    echo $dpd_clarification_sending_to_sd_date ; ?>
                                   </td>
                                     
                                 </tr>
								 
								 <?php if($sd_clarification_arng_cnfrm_from_buyer_date!=NULL) { ?>
                                 <tr>
                                    <td> Arrange Confirmation from buyer (Date) : </td>
                                   <td><?php
								   
								
								    echo $sd_clarification_arng_cnfrm_from_buyer_date ; ?>
                                   <!--j--></td>
                                     
                                 </tr>
                                 <?php } else { ?>
                                 
                                 
                                 
                                  <tr>
                                    <td> Arrange Confirmation from buyer (Date) :</td>
                                   <td><input name="sd_clarification_arng_cnfrm_from_buyer_date" type="text" id="sd_clarification_arng_cnfrm_from_buyer_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                   <!--j--></td>
                                     
                                  </tr>
                                  <?php } ?>
                                  
                                  
                                  <?php if($sd_agreed_sample_delivery_date!=NULL) { ?>
                                  <tr>
                                    <td> Agreed Sample Delivery (Date) :</td>
                                    <td><?php echo $sd_agreed_sample_delivery_date ; ?>
                                  <!--  k-->
                                    </td>
                                    </tr>
                                    
                                  <?php } else { ?> 
                                  <tr>
                                    <td> Agreed Sample Delivery (Date):
                                    </td>
                                    <td><input name="sd_agreed_sample_delivery_date" type="text" id="sd_agreed_sample_delivery_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                   <!-- k-->
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
                