
<form action="sample1_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                            
                             <?php if($sample_pattern_master_name!=NULL) { ; ?>
                                  <tr>
                                    <td> Pattern Master (Name):</td>
                                    <td><?php echo $sample_pattern_master_name ; ?></td>
                                  </tr>
                                  <?php } else  { ?>
                                  <tr>
                                    <td> Pattern Master (Name):</td>
                                    <td><select name="sample_pattern_master_name" autofocus required id="sample_pattern_master_name" style="font-size:11px">
          <option value="">--Select name--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Pattern Master' group by concern_name";
                            $result=$obj->sql($SQL);
							while ($row=mysql_fetch_array($result))
							{
								$dis=$row['concern_name'];
								echo '<option value="'.$dis.'">'.$dis.'</option>';
								
							}
							
                            ?>
        </select>
                                    <!--  y-->
</td>
                                  </tr>
                               <!--   <input size="40" id="sample_pattern_master_name" name="sample_pattern_master_name"  type="text" value=""  required autofocus />-->
                                  
                                  <?php } ?>
                                  
                                 <?php if($sample_sweing_operators_name!=NULL) { ?> 
                                 <tr>
                                    <td> Sewing Operators (Name/Group) :</td>
                                    <td><?php echo $sample_sweing_operators_name ; ?></td>
                                  </tr>
                                  <?php } else { ?>
                                  <tr>
                                    <td> Sewing Operators (Name/Group) :</td>
                                    <td><input size="40" id="sample_sweing_operators_name" name="sample_sweing_operators_name"  type="text" value=""  required autofocus />
                                  <!--  ad-->
</td>
                                  </tr>
                                  <?php } ?>
                                  
                                  
                                  <?php if($sample_sample_final_quality_ins_name!=NULL) { ?>
                                   <tr>
                                     <td>Sample Final quality Inspector (Name):</td>
                                     <td><?php echo $sample_sample_final_quality_ins_name ; ?></td>
                                   </tr>
                                   <?php } else { ?>
                                   <tr>
                                     <td>Sample Final quality Inspector (Name):</td>
                                     <td>
                                    <input size="40" id="sample_sample_final_quality_ins_name" name="sample_sample_final_quality_ins_name"  type="text" value=""  required autofocus />
                                    <!--ag--></td>
                                   </tr>
                                   <?php } ?>
                                   
                                   <?php if($sample_sample_rvwd_by_sd_dpd_prior_submission!=NULL) { ?>
                                   <tr>
                                    <td> Sample Reviewed by SD & DPD prior the submission (Yes/No):</td>
                                    <td><?php echo $sample_sample_rvwd_by_sd_dpd_prior_submission ; ?></td>
                                  </tr>
                                  <?php } else { ?>
                                  <tr>
                                    <td> Sample Reviewed by SD & DPD prior the submission (Yes/No):</td>
                                    <td>
        		    <input name="sample_sample_rvwd_by_sd_dpd_prior_submission" type="radio" autofocus required id="prior_submission" tabindex="5" value="yes"/>
                    <span style="color:#000"><strong>Yes</strong></span>
        		    
        		    <input type="radio" name="sample_sample_rvwd_by_sd_dpd_prior_submission" id="prior_submission" tabindex="6" value="no" />
                    <span style="color:#000"><strong>No</strong></span></td>
                                  </tr>
                                  
                                  
                                  
                                  
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;"><input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" />
 <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Submit »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                  <?php } ?>
                </table>
                
                </form>