
<form action="sample2_update.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                             
                                  <?php if ($sample_pattern_planned_date!=NULL) { ?>
                                  <tr>
                                    <td> Planned Date (Pattern Delivery): </td>
                                   <td><?php echo $sample_pattern_planned_date ; ?>
                                   <!--z--></td>                                    
                                  </tr>
                                  
                                  <?php } else { ?>                                  
                                  <tr>
                                    <td> Planned Date (Pattern Delivery): </td>
                                   <td><input name="sample_pattern_planned_date" type="text" id="sample_pattern_planned_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                   <!--z--></td>                                    
                                  </tr>
                                  
                                  <?php  } ?>
                                  
                                  
                                  
                                  
                                  
                                  <?php if($sample_pattern_actual_date!=NULL) { ?>
                                  <tr>
                                    <td> Actual Date (Pattern Delivery): </td>
                                   <td><?php echo ($sample_pattern_actual_date) ; ?>
                                   <!--aa--></td>                                     
                                  </tr>
                                  
                                  <?php } else { ?> 
                                  <tr>
                                    <td> Actual Date (Pattern Delivery): </td>
                                   <td><input name="sample_pattern_actual_date" type="text" id="sample_pattern_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                  <!-- aa--></td>                                     
                                  </tr>
                                  <?php } ?>
                                                                 
                                  
                                  
                                  
                                 <tr>
                                    <td> Planned Date (Print/Emb/applique Panel Rcv): </td>
                                   <td><?php echo $dpd_print_planned_date ; ?>
                                  </td>                                     
                                  </tr>
                                 <?php if ($sample_print_actual_date) { ?> 
								 <tr>
                                    <td> Actual Date (Print/Emb/applique Panel Rcv): </td>
                                   <td><?php echo $sample_print_actual_date ; ?>
                                   <!--ac--></td>                                     
                                  </tr>
                                  
                                  <?php } else { ?>
                                   <tr>
                                    <td> Actual Date (Print/Emb/applique Panel Rcv): </td>
                                   <td><input name="sample_print_actual_date" type="text" id="sample_print_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                   <!--ac--></td>                                     
                                  </tr>
                                  <?php  } ?>
                                  
                                  
                                  <tr>
                                    <td> Planned Date (Sample Sewing Starts-Date): </td>
                                   <td><?php echo $dpd_sample_planned_date ; ?>
                                   </td>                                    
                                  </tr>
                                  
                                  <?php if ($sample_sample_actual_date!=NULL) { ?>
                                  <tr>
                                    <td> Actual Date (Sample Sewing Starts-Date): </td>
                                   <td><?php echo $sample_sample_actual_date ; ?>
                                   <!--af--></td>                                    
                                  </tr>
                                  
                                  <?php } else { ?>
                                  <tr>
                                    <td> Actual Date (Sample Sewing Starts-Date): </td>
                                   <td><input name="sample_sample_actual_date" type="text" id="sample_sample_actual_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                  <!-- af--></td>                                    
                                  </tr>
                                  
                                 
                                    
                                    
                                  
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;"><input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /><input name="Submit" type="submit" class="btn btn-success" id="submit" value="Update »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                  <?php  } ?>
                </table>
                </form>