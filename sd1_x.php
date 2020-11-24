<?php
$SQL="select * from tb_track_info where user_id='$uid' order by sl desc limit 0,1";    //table name
    //die($SQL) ;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$customer=$row['customer'];
		$brand_style=$row['brand_style'];
		$style=mysql_real_escape_string($row['style']);
		$color=$row['color'];		
		$season=mysql_real_escape_string($row['season']);
		$fabric_type=$row['fabric_type'];		
		$print_type=$row['print_type'];
		$wash_type=$row['wash_type'];
		$product_type=$row['product_type'];
		$embroidery_stitch=$row['embroidery_stitch'];		
		$sd_sample_type_name=$row['sd_sample_type_name'];	
		$sd_sample_req_rcv_date=$row['sd_sample_req_rcv_date'];
		$sd_concern_sd_name=$row['sd_concern_sd_name'];	
		$sd_concern_dpd_name=$row['sd_concern_dpd_name'];
		$sd_agreed_sample_delivery_date=$row['sd_agreed_sample_delivery_date'];
		$sd_concern_mm_name=$row['sd_concern_mm_name'];
		$sd_fabric_concern_name=$row['sd_fabric_concern_name'];
		$dpd_concern_sample_coordinator_name=$row['dpd_concern_sample_coordinator_name'];
	}
	?>
<!--id="gradient-style"-->
<script language="javascript" type="text/javascript">

        function deleteSpecialChar1(style) {
            if (style.value != '') 
            {
				str = style.value;
				res = "";
				var j;
				for (j = 0; j < str.length; j++) {
						
				if(str[j] != '&' && str[j] != '%' && str[j] != '*' && str[j] != '\\' && str[j] != '\'' && str[j] != '"' && str[j] != '*' && str[j] != '_') { res += str[j]; }
				else{
				alert('Error !!! You are trying to input Special Characters. ');
				}
				
				// res += liza[j] + "<br/>";
				//H-l&%*\'*"\_l@ W^#$d
			}
				
		// alert(res);
		document.getElementById("style").value = res;
		
			} }


		 /*function deleteSpecialChar(season) {
            if (season.value != '') 
            {
				str = season.value;
				res = "";
				var j;
				for (j = 0; j < str.length; j++) {
						
				if(str[j] != '&' && str[j] != '%' && str[j] != '*' && str[j] != '\\' && str[j] != '\'' && str[j] != '"' && str[j] != '*' && str[j] != '_') { res += str[j]; }

					// res += liza[j] + "<br/>";
					
					//H-l&%*\'*"\_l@ W^#$d
					
					}
				
				alert(res);
				
					document.getElementById("season").value = res;
					
				//document.getElementById("demo1").innerHTML = res;
                //season.value = res ;
            }
        }*/
		



        function deleteSpecialChar(season) {
            if (season.value != '' && season.value.match(/^[\w ]+$/) == null) 
            {
                season.value = season.value.replace(/[\W]/g, '');
            }
        }
		
		
		/* function deleteSpecialChar1(style) {
            if (style.value != '' && style.value.match(/^[\w ]+$/) == null) 
            {
                style.value = style.value.replace(/[\W]/g, '');
            }
        }*/
		
		
		
		
		
		
</script>
    <form action="phpmail/sd1_save.php" method="post">
  <table class="bottomBorder"  width="100%" style="color:#000; font-size:15px" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="40%" style="padding-top:5px">Buyer <span style="color:#F00">*</span></td>
        <td width="60%">
        <select name="customer" autofocus required id="customer" class="rounded" style="font-size:11px">
          <option value="<?php echo $customer ; ?>" selected><?php echo $customer ; ?></option>
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
    </td>
    </tr>
    <tr>
      <td> Brand/Dept. </td>
      <td>
      <select name="brand_style" autofocus required id="customer" style="font-size:11px">
          <option value="<?php echo $brand_style ; ?>" selected><?php echo $brand_style ; ?></option>
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
     <tr bgcolor="#FFFFCC">
      <td> Style </td>
      <td><!--<input name="style" type="text" class="rounded" value="" required /> -->
      <input name="style" class="rounded" type="text" onClick="Select()" onChange="javascript:deleteSpecialChar1(this)" autofocus required id="style" value="<?php echo $style ; ?>">
            
     </tr>
     
      
           <tr bgcolor="#FFFFCC">
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
            <td width="20%"><input name="color[]" class="rounded" placeholder="Color" list="characters2" type="text" autofocus required id="color[]" value="" size="12">
            
              <datalist id="characters2">
              				<?php
         					$SQL="SELECT DISTINCT color FROM tb_track_info ORDER BY color ASC ";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['color'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>
  <input id="color_code[]" name="color_code[]" type="color" style="size:5px !important;width: 20px !important;">
  
  <input id="quantity[]" name="quantity[]" required="required" autofocus="autofocus" placeholder="Quantity" type="number" max="500" min="0" >
            
            </td>
          </tr>
    </table>

    </td>
    </tr>
     
   <tr bgcolor="#FFFFCC">
      <td> Sample Request Recieve Date</td>
      <td><input name="sd_sample_req_rcv_date" class="rounded" type="text" id="sd_sample_req_rcv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    
     <tr bgcolor="#FFFFCC">
      <td>Agreed sample Delivery Date</td>
      <td><input name="sd_sample_delv_date" class="rounded" type="text" id="sd_sample_delv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    <tr bgcolor="#FFFFCC">
  
    <td> PDF/TechPack Rcvd by SD & Forward to DPD (Date) </td>
    <td><input name="sd_techpack_rcv_fwrd_date" class="rounded" type="text" id="sd_techpack_rcv_fwrd_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
  </tr>
      <td>Season</td>
      <td><input name="season" class="rounded" list="characters" type="text" onClick="Select()" onChange="javascript:deleteSpecialChar(this)" autofocus required id="season" value="<?php echo $season ; ?>" size="12">
      
<!--      <input id="txtName"  type="text"  />-->
            
              <datalist id="characters">
              
              <?php
         $SQL="select DISTINCT season FROM tb_track_info WHERE sd_concern_sd_name='$user_name'";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['season'];
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
        <option value="<?php echo $sd_sample_type_name ; ?>" selected="selected"><?php echo $sd_sample_type_name ; ?></option>
     
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
      <td>Fabric type</td>
      <td><select name="fabric_type" id="fabric_type" data-rel="chosen" required style="font-size:11px">
        <option value="<?php echo $fabric_type ; ?>"  selected="selected"><?php echo $fabric_type ; ?></option>
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
        <option value="<?php echo $print_type ; ?>" selected="selected"><?php echo $print_type ; ?></option>
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
      <input name="emb_stitch" type="text" class="rounded" id="emb_stitch" value="<?php echo $embroidery_stitch ; ?>" size="35" /></td>
  </tr>
    <tr>
      <td> Wash type </td>
      <td><select name="wash_type" autofocus required id="wash_type" style="font-size:11px">
        <option value="<?php echo $wash_type ; ?>" selected="selected"><?php echo $wash_type ; ?></option>
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
        <option value="<?php echo $product_type ; ?>" selected="selected"><?php echo $product_type ; ?></option>
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
      <td> Concern SD </td>
      <td><select name="sd_concern_sd_name" autofocus required id="sd_concern_sd_name" style="font-size:11px">
        <option value="<?php echo $user_name ; ?>" selected="selected"> <?php echo $user_name ; ?> </option>

        <?php
         $SQL="select user_name from tb_admin where rule like '1' order by user_name ASC";
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
      <td> Concern DPD </td>
      <td><select name="sd_concern_dpd_name" autofocus required id="sd_concern_dpd_name" style="font-size:11px">
        <option value="<?php echo $sd_concern_dpd_name ; ?>" selected="selected"><?php echo $sd_concern_dpd_name ; ?></option>
        <?php
         $SQL="select user_name from tb_admin where rule like '3' order by user_name ASC";
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
      <option value="<?php echo $sd_concern_mm_name ; ?>" selected="selected"><?php echo  $sd_concern_mm_name ;  ?></option>
      <?php
         $SQL="select user_name from tb_admin where rule like '2' and status='1' order by user_name ASC";
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
      <option value="<?php echo $sd_fabric_concern_name ; ?>" selected="selected"><?php echo $sd_fabric_concern_name ; ?></option>
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
    <td> Concern Sample Co-Ordinator </td>
    <td><select name="dpd_concern_sample_coordinator_name" autofocus required id="dpd_concern_sample_coordinator_name" style="font-size:11px">
 <option value="<?php echo $dpd_concern_sample_coordinator_name ; ?>" selected="selected"><?php echo $dpd_concern_sample_coordinator_name ; ?></option>
        <?php
         $SQL="select user_name from tb_admin where rule like '4' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
							echo '<option value="N/A">N/A</option>';
                            ?>
    </select></td>
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
