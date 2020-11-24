<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
		
$stylex=$_GET['ID'];		  
	$SQL="select * from tb_track_info where style='$stylex'";    //table name
    //	die($SQL) ;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$customer=$row['customer'];
		$brand_style=$row['brand_style'];
		$style=$row['style'];
		$color=$row['color'];		
		$season=$row['season'];
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

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>
<script type="text/javascript" language="javascript">
 //  javascript:window.history.forward(1);
</script>

<script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>

<style>
h6 
{
/*text-decoration:blink;
color:#F00;*/
}



</style>
</head>

<body>
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                  <?php require("re_menu.php"); ?>
                </div>
            </div>
        </header>
        <!-- header --> 
        <!-- global wrapper -->
        <div id="globalWrapper">
            <!-- page content -->
            <section id="content" class="columnPage">
                <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>
                
              <!--  for SD only-->
                
                   
                <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                        
                      
					<?php if($user_rule==1) { ; ?> 
                            <div class="span12">
                                <h2>SD :</h2>
                                <div class="divider"><span></span></div>  
                            </div>    
                                                
                            <section class="span10">
                          <form action="phpmail/sd1_save.php" method="post">
  <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td>Buyer <span style="color:#F00">*</span></td>
        <td>
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
        <!--<strong style="color:#F00" title="Select the particular customer that is assigned to you" >?</strong>--></td>
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
      <td><input name="style" type="text" class="rounded" value="" required />       
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
  <input id="quantity[]" name="quantity[]" type="number" max="500" min="0" >
            
            </td>
          </tr>
    </table>

    </td>
    </tr>
     
   <tr bgcolor="#FFFFCC">
      <td> Sample Req. Recieve (dd-mm-YYYY)</td>
      <td><input name="sd_sample_req_rcv_date" class="rounded" type="text" id="sd_sample_req_rcv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    
     <tr bgcolor="#FFFFCC">
      <td>Agreed sample Delivery Date (dd-mm-YYYY)</td>
      <td><input name="sd_sample_delv_date" class="rounded" type="text" id="sd_sample_delv_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    </tr>
    
    <tr bgcolor="#FFFFCC">
  
    <td> PDM/TechPack Rcvd by SD & Forward to DPD (Date) </td>
    <td><input name="sd_techpack_rcv_fwrd_date" class="rounded" type="text" id="sd_techpack_rcv_fwrd_date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
  </tr>
      <td>Season</td>
      <td><input name="season" class="rounded" list="characters" type="text" autofocus required id="season" value="<?php echo $season ; ?>" size="12">
            
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
      <td><select name="fabric_type" autofocus required id="fabric_type" style="font-size:11px">
        <option value="<?php echo $fabric_type ; ?>" selected="selected"><?php echo $fabric_type ; ?></option>
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
    <tr></tr>
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
         $SQL="select user_name from tb_admin where rule like '2' order by user_name ASC";
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

                          <p> </p></section>   
                           <?php }  ?>   
                  
                          <div class="span12"></div>
                        </div>
                    </div>
                </div>
                
                            
               
                
             <!--   end of SD part-->
             
             
				
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php require("re_footer_head.php"); ?>
</body></html>