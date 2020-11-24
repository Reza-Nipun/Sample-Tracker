
<form action="dpd3_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                        
                        
                        <?php if($dpd_concern_sample_coordinator_name!=NULL) {?>
						<tr>
                                <td> Concern Sample Coordinator :</td>
                                <td><?php echo $dpd_concern_sample_coordinator_name ; ?></td>
                              
                        </tr>                               
                                  
                        <?php } else { ?>
						
                                  <tr>
                                    <td> Concern Sample Coordinator : 
<input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /></td>
                                   <td>
                                   <select name="dpd_concern_sample_coordinator_name" autofocus required id="dpd_concern_sample_coordinator_name" style="font-size:11px">
        <option value="" selected="selected">Select Name</option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Sample Coordinator' group by concern_name";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
                                   </td>
                                     
                                  </tr>
                                  
                                  <!--
                                  <input size="40" id="dpd_concern_sample_coordinator_name" name="dpd_concern_sample_coordinator_name"  type="text" value=""  required autofocus />
                                  -->
                                                                 
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;"><input name="Submit" type="submit" class="btn btn-success" id="submit" value="Update »">
                                      &nbsp;
                                      <input name="" type="reset" class="btn btn-danger" value="Reset">
                                    </td>
                                  </tr>
                                  <?php } ?>
                                  
                </table>
                </form>