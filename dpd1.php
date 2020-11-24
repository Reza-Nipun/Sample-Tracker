

<form action="dpd1_update.php" method="post">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">

    <?php if($dpd_clarification_sending_to_sd_date!=NULL) { ?>
    <tr>
      <td> (Clarificaition of Missing Info) Sending to SD (Date) :</td>
      <td><?php echo $dpd_clarification_sending_to_sd_date ; ?></td>
    </tr>
    <?php } else { ?>
    <tr>
      <td> (Clarificaition of Missing Info) Sending to SD (Date) :</td>
      <td><input name="dpd_clarification_sending_to_sd_date" type="text" id="dpd_clarification_sending_to_sd_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
    <?php } ?>
    
    
    
    
    <?php if($dpd_labdip_req_sent_to_lab_date!=NULL) { ?>
    <tr>
      <td>(Labdip/Yarndip/Pc Code/ Fab Test) Request Sent to LAB (Date) : </td>
      <td><?php echo $dpd_labdip_req_sent_to_lab_date ; ?></td>
    </tr>
     <?php } else { ?>
    <tr>
      <td> (Labdip/Yarndip/Pc Code/ Fab Test) Request Sent to LAB (Date) : </td>
      <td><input name="dpd_labdip_req_sent_to_lab_date" type="text" id="requdpd_labdip_req_sent_to_lab_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);"/></td>
    </tr>
    <?php } ?>
    
    
    
    
    
    <?php if($dpd_labdip_planned_rcvd_date!=NULL) { ?>
    <tr>
      <td>(Labdip/Yarndip/Pc Code/ Fab Test) Planned Recieved (Date):</td>
      <td><?php echo $dpd_labdip_planned_rcvd_date ; ?></td>
    </tr>
    
    <?php } else { ?>
    <tr>
      <td>(Labdip/Yarndip/Pc Code/ Fab Test) Planned Recieved (Date):</td>
      <td><input name="dpd_labdip_planned_rcvd_date" type="text" id="planned_recieved" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
    <?php } ?>
   
    
    
    <?php if($dpd_strikeoff_planned_sending_date!=NULL) { ?>
    <tr>
      <td> (Strikeoff/Mockup/Artwork Approval) Planned Sending (Date):</td>
      <td><?php echo $dpd_strikeoff_planned_sending_date ; ?></td>
    </tr>
     <?php } else { ?>   
     <tr>
      <td> (Strikeoff/Mockup/Artwork Approval) Planned Sending (Date):</td>
      <td><input name="dpd_strikeoff_planned_sending_date" type="text" id="dpd_strikeoff_planned_sending_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);"/></td>
    </tr>
    <?php } ?>
    
    
     <?php if($dpd_strikeoff_actual_sending_date!=NULL) { ?>
                                
            <tr>
               <td> Actual Sending Date (Strikeoff/Mockup/Artwork Approval) :</td>
                 <td><?php echo $dpd_strikeoff_actual_sending_date ; ?> </td>             </tr> 
                                   
                 <?php } else { ?>
           <tr>
              <td> Actual Sending Date (Strikeoff/Mockup/Artwork Approval) :</td>
              <td><input name="dpd_strikeoff_actual_sending_date" type="text" id="dpd_strikeoff_actual_sending_date" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                   </td>                                   
                                  </tr>
                                  
    
    
    <tr>
      <td colspan="4" align="center" style="padding:5px;"><input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $brand_style_get ; ?>" id="hiddenField" /><input name="Submit" type="submit" class="btn btn-success" id="submit" value="Submit »" />
        &nbsp;
        <input name="input" type="reset" class="btn btn-danger" value="Reset" /></td>
    </tr>
    <?php  } ?>
  </table>
</form>