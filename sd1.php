<form action="sd1_save.php" method="post">
  <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td>Buyer <span style="color:#F00">*</span></td>
        <td>
        <select name="customer" autofocus required id="customer" class="rounded" style="font-size:11px">
          <option value="">--Select Buyer--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>
        <!--<strong style="color:#F00" title="Select the particular customer that is assigned to you" >?</strong>--></td>
    </tr>
    <tr>
      <td> Brand/Dept. </td>
      <td>
      <select name="brand_style" autofocus required id="customer" style="font-size:11px">
          <option value="">--Select Brand--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Brand' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>     
    </tr>
     <tr>
      <td> Style </td>
      <td><input name="style" type="text" class="rounded" required="required" />       
     </tr>
     
       <tr>
      <td>Season</td>
      <td><input name="season" class="rounded" list="characters" type="text" autofocus required id="season" value="" size="12">
            
              <datalist id="characters">
              
              <?php
         $SQL="select concern_name from tb_concern WHERE 	concern_type='season' order by 	concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
                            </datalist>
                            </td>
    </tr>
     
     
    <tr>
      <td> Sample type </td>
      <td>
      <select name="sd_sample_type_name" autofocus required id="sd_sample_type_name" style="font-size:11px">
        <option value="" selected="selected">--Sample type--</option>
     
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'SAMPLE TYPE' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
      </td>
      
      <!--<input size="40" id="sd_sample_type_name" name="sd_sample_type_name"  type="text" value=""  required autofocus />-->
    </tr>
    <tr>
      <td valign="top">Color</td>
      <td>
	  
      
        <SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>
    
    <style type="text/css">	  
input.rounded 
{
	border: 1px solid #ccc;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border-radius: 7px;
	-moz-box-shadow: 2px 2px 3px #666;
	-webkit-box-shadow: 2px 2px 3px #666;
	box-shadow: 2px 3px 3px #666;
	font-size: 12px;
	padding: 2px 3px;
	outline: 0;
	-webkit-appearance: none;
}

input.rounded:focus 
{
border-color: #339933;
}	  

input, select 
{
width: 120px;
}
</style>
      
    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />&nbsp;
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />



    <table class="bottomBorder" id="gradientstyle" style="box-shadow:0px 0px 0px 0px #FFF ;" width="100%" border="1" cellspacing="0"  cellpadding="0">
    <tr>
          
            <td width="2%"><input type="checkbox" name="chk"/></td>
            <td width="20%"><input name="color[]" class="rounded" list="characters2" type="text" autofocus required id="color[]" value="" size="12">
            
              <datalist id="characters2">
              				<?php
         					$SQL="select color from tb_track_info group by color order by color ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['color'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>
  <input id="color_code[]" name="color_code[]" type="color" style="size:5px !important;width: 20px !important;">
            
            </td>
          </tr>
    </table>

    </td>
    </tr>
    
    <tr>
      <td>Fabric type</td>
      <td><select name="fabric_type" autofocus required id="fabric_type" style="font-size:11px">
        <option value="" selected="selected"> -- Fabric type -- </option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Fabric type' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
    
    <tr>
      <td> Print type </td>
      <td><select name="print_type" autofocus required id="print_type" style="font-size:11px">
        <option value="" selected="selected"> --  Print type --  </option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Print type' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
        <tr>
    <td>Embroidery stitch</td>
    <td>
      <input name="emb_stitch" type="text" class="rounded" id="emb_stitch" value="" size="35" /></td>
  </tr>
    <tr>
      <td> Wash type </td>
      <td><select name="wash_type" autofocus required id="wash_type" style="font-size:11px">
        <option value="" selected="selected"> -- Wash type -- </option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Wash type' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
    
    <tr>
      <td> Product type </td>
      <td><select name="product_type" autofocus required id="product_type" style="font-size:11px">
        <option value="" selected="selected">-- Product type --</option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'Product type' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
    
    
    <tr>
      <td> Sample Req. Recieve (dd-mm-YYYY)</td>
      <td><input name="sd_sample_req_rcv_date" class="rounded" type="text" id="sd_sample_req_rcv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    
     <tr>
      <td>Agreed sample Delivery Date (dd-mm-YYYY)</td>
      <td><input name="sd_sample_delv_date" class="rounded" type="text" id="sd_sample_delv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    <tr>
      <td> Concern SD </td>
      <td><select name="sd_concern_sd_name" autofocus required id="sd_concern_sd_name" style="font-size:11px">
        <option value="<?php echo $user_name ; ?>" selected="selected"> <?php echo $user_name ; ?> </option>
        
        
        
        <?php
         $SQL="select user_name from tb_admin where rule like '1' AND status='1' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
    <tr></tr>
    <tr>
      <td> Concern DPD </td>
      <td><select name="sd_concern_dpd_name" autofocus required id="sd_concern_dpd_name" style="font-size:11px">
        <option value="" selected="selected"> -- Concern DPD -- </option>
        <?php
         $SQL="select user_name from tb_admin where rule like '3' AND status='1' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    </tr>
    <td> Concern MM </td>
    <td><select name="sd_concern_mm_name" autofocus required id="sd_concern_mm_name" style="font-size:11px">
      <option value="" selected="selected"> -- Concern MM -- </option>
      <?php
         $SQL="select user_name from tb_admin where rule like '2' AND status='1' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
  </tr>
  <tr>
    <td> Fabric Concern  </td>
    <td><select name="sd_fabric_concern_name" autofocus required id="sd_fabric_concern_name" style="font-size:11px">
      <option value="Select Name" selected="selected"> -- Fabric Concern -- </option>
<?php
         $SQL="select concern_name from tb_concern where concern_type like 'FABRIC' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
  </tr>

  <tr>
  
    <td> PDM/TechPack Rcvd by SD & Forward to DPD (Date) </td>
    <td><input name="sd_techpack_rcv_fwrd_date" class="rounded" type="text" id="sd_techpack_rcv_fwrd_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
  </tr>
  
  

  <!--<tr>
 <td> Actual sample submission :</td>
                                    <td><input name="actual_submission" type="text" id="actual_submission" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required />
                                    </td>
                                  </tr>-->
  
	                             
  <tr>
    <td colspan="4" align="center" style="padding:5px;"><input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" /></td>
  </tr>
					

  </table>
</form>
