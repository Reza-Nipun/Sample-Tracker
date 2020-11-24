

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
	
	
	


	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
        <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }

table tr:hover td{ 
	background: #BBE628;
	color: #000000; 
}
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>

        
  <?php  require("re_head.php"); ?>
        
	</head>
<body>

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
        <!--<div id="globalWrapper" style="position:fixed; width:100%">-->
        
            <!-- page content -->
            <!-- <section id="content" class="columnPage">
                <header class="headerPage">
				<?php // require("re_header_page.php"); ?>
                </header>
                
                </section> --><!--</div>-->
              <!--  for SD only-->
   
<div width="80%"  style="margin-top:10px; "></div>
			<div id="demo" style="margin-top:20px; ">

<form name="" id="form1" action="home_sd_update1.php" method="post" enctype="multipart/form-data">           
<table cellpadding="0" cellspacing="0" border="1" class="draggable  forget-ordering" id="example" style="width: 3600px !important; padding-bottom:10px; background-color:#FFF">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th>sl</th> <!--style="width: 200px !important; "-->
    <th> Buyer</th>
    <th> Brand/Dept.</th>
    <th>Style</th>
    <th>Color</th>
    <th>Season</th>
    <th>Qty</th>
    <th>Fabric Type</th>
    <th>Print Type</th>
    <th>Wash Type</th>
    <th>Product Type</th>
    <th>Embroidery stitch</th>
    <th>Sample Request Rcv Date</th>  
    <th>Agreed Sample Delivery (Date)</th>
	<th>PDM/TechPack Rcvd by SD &amp; Forward to DPD (Date)</th> 
	<th>Clarificaition of Missing Info Arrange the Confirmation from buyer (Date)</th> 
    <th>Strikeoff/Mockup/Artwork Approval Planned Sending (Date) </th>
    <th>Strikeoff/Mockup/Artwork Approval Actual Sending (Date) </th>
    <th>Strikeoff/Mockup/Artwork Approval Reqiired  (Date) </th>
    <th>Strikeoff/Mockup/Artwork Approval Received (Date) </th> 
    <th>Sample Submission</th>
    <th>Actual Sample Submission (Date)</th>
    <th>Concern SD</th>
    <th>Concern DPD</th>
    <th>Concern MM</th>
    <th>Fabric Concern</th>
    <th>Status</th>
    <th>Remark</th>
    </tr>
	</thead>
	<tbody>
    
    <?php
		$sl=1;			
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
        $sql="select * from tb_track_info WHERE sl='$checkbox'"; 
  		$result = mysql_query($sql);
		$result=$obj->sql($sql);	
        while($row = mysql_fetch_array($result))
		{	
	?>
    
    
		<tr class="gradeA">
		  <td title="<?php echo $checkbox ; ?>"><?php echo $sl ; ?> </td>
			<td valign="middle"><label><input name="checkbox[]" type="hidden" id="checkbox[]" value="<?php echo $row['sl']; ?>" checked> &nbsp; <?php echo $row['customer'] ; ?></label></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
			<td>
            <?php echo $row['color'] ; ?>
			
			
			
		  </td>
			<td><!--<input name="season[]" type="text" id="season[]" value="" size="12">--> 
            <?php echo $row['season'] ; ?>
          </td>
			<td><input name="qty[]" type="number" id="qty[]" value="<?php echo $row['qty'] ; ?>" min="0" max="10000" size="5"></td>
            
            
			<td><select name="fabric_type[]" id="fabric_type[]" style="font-size:11px">
        <option value="" selected="selected">Select</option>
        <option value="<?php echo $row['fabric_type'] ; ?>" selected><?php echo $row['fabric_type'] ; ?></option>
		<?php
         $SQL1="select concern_name from tb_concern where concern_type like '%Fabric type%' order by concern_name ASC";
                            $obj->sql($SQL1);
                            while($row1 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row1['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            } 
                            ?>
      </select>
      
      <!--<input name="fabric_type[]"  class="rounded" placeholder="fabric_type" list="characters5" type="text" autofocus required id="fabric_type[]" value="<?php // echo $row['fabric_type'] ; ?>" size="12">
            
              <datalist id="characters5">
              				<?php
         					/*$SQL="select concern_name from tb_concern where concern_type like 'Fabric type' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row1 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row1['concern_name'];
                            echo '<option value="'.$dis.'">';
                            }*/
                            ?>
             </datalist>-->
      
      </td>
			<td><select name="print_type[]" id="print_type[]" style="font-size:11px">
			  <option value="<?php echo $row['print_type'] ; ?>" selected><?php echo $row['print_type'] ; ?></option>
			  <?php
         $SQL2="select concern_name from tb_concern where concern_type like 'Print type' order by concern_name ASC";
                            $obj->sql($SQL2);
                            while($row2 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row2['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
		    </select></td>
			<td><select name="wash_type[]" id="wash_type[]" style="font-size:11px">
        
        <option value="<?php echo $row['wash_type'] ; ?>" selected><?php echo $row['wash_type'] ; ?></option>
        <?php
         $SQL3="select concern_name from tb_concern where concern_type like 'Wash type' order by concern_name ASC";
                            $obj->sql($SQL3);
                            while($row3 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row3['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
			<td><select name="product_type[]" autofocus required id="product_type[]" style="font-size:11px">
        <option value="<?php echo $row['product_type'] ; ?>" selected><?php echo $row['product_type'] ; ?></option
        ><?php
         $SQL4="select concern_name from tb_concern where concern_type like 'Product type' order by concern_name ASC";
                            $obj->sql($SQL4);
                            while($row4 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row4['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
      
			<td><input name="embroidery_stitch[]" type="text" id="embroidery_stitch[]" value="<?php echo $row['embroidery_stitch'] ; ?>" size="12"></td>
            
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?> <input type="hidden" value="<?php echo $row['sd_agreed_sample_delivery_date'] ; ?>" name="sd_agreed_sample_delivery_date[]" id="sd_agreed_sample_delivery_date[]"></td>
			<td><input name="sd_techpack_rcv_fwrd_date[]" class="rounded" type="text" id="sd_techpack_rcv_fwrd_date[]" value="<?php echo $row['sd_techpack_rcv_fwrd_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /> </td>
			<td><input name="sd_clarification_arng_confrm_from_buyer_date[]" class="rounded" type="text" id="sd_clarification_arng_confrm_from_buyer_date[]" value="<?php echo $row['sd_clarification_arng_confrm_from_buyer_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="3" onclick="showCalendarControl(this);" /></td>
			<td><?php echo $row['dpd_strikeoff_planned_sending_date'] ; ?></td>
			<td><input name="dpd_strikeoff_actual_sending_date[]" class="rounded" type="text" id="dpd_strikeoff_actual_sending_date[]" value="<?php echo $row['dpd_strikeoff_actual_sending_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="4" onClick="showCalendarControl(this);" /></td>
			<td><?php echo $row['dpd_strikeoff_approval_required_date'] ; ?></td>
			<td><input name="dpd_strikeoff_approval_rcvd_date[]" class="rounded" type="text" id="dpd_strikeoff_approval_rcvd_date[]" value="<?php echo $row['dpd_strikeoff_approval_rcvd_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="5" onclick="showCalendarControl(this);" /></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><input name="sd_actual_sample_submission_date[]" class="rounded" type="text" id="sd_actual_sample_submission_date[]" value="<?php echo $row['sd_actual_sample_submission_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="6" onclick="showCalendarControl(this);" /></td>
			<td><select name="sd_concern_sd_name[]" autofocus required id="sd_concern_sd_name[]" style="font-size:11px">
			  <option value="<?php echo $row['sd_concern_sd_name'] ; ?>" selected = "selected"><?php echo $row['sd_concern_sd_name'] ; ?></option>
			  <?php
        	 $SQL="select user_name from tb_admin where rule like '1' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row5 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row5['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
		    </select></td>
			<td><select name="sd_concern_dpd_name[]" autofocus required id="sd_concern_dpd_name[]" style="font-size:11px">
			  <option value="<?php echo $row['sd_concern_dpd_name']; ?>" selected = "selected"><?php echo $row['sd_concern_dpd_name'] ; ?></option>
        <?php
         $SQL="select user_name from tb_admin where rule like '3' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row6 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row6['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
			  </select></td>
			<td><select name="sd_concern_mm_name[]" autofocus required id="sd_concern_mm_name[]" style="font-size:11px">
			  <option value="<?php echo $row['sd_concern_mm_name'] ; ?>" selected><?php echo $row['sd_concern_mm_name'] ; ?></option>
     		  <?php
        			 $SQL="select user_name from tb_admin where rule like '2' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row7 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row7['user_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
              ?>
			  </select></td>
		  <td><select name="sd_fabric_concern_name[]" autofocus required id="sd_fabric_concern_name[]" style="font-size:11px">
			  <option value="<?php echo $row['sd_fabric_concern_name'] ; ?>" selected><?php echo $row['sd_fabric_concern_name'] ; ?></option>
<?php
         $SQL="select concern_name from tb_concern where concern_type like 'FABRIC' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row8 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row8['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
			  </select></td>
			<td><select name="sd_sample_reject_pass[]" id="sd_sample_reject_pass[]">
			  <option>Select</option>
              <option value="<?php echo $row['sd_sample_reject_pass'] ; ?>" selected><?php echo $row['sd_sample_reject_pass'] ; ?></option>
			  <option value="pass">Pass</option>
			  <option value="reject">Reject</option>
              <option value="No Comments">No Comments</option>
              <option value="Order Confirm">Order Confirm</option>
              <option value="Resubmit">Resubmit</option>
              <option value="Cancel">Cancel</option>
              <option value="No Comments (Customer reference sample)">No Comments (Customer reference sample)</option>
           </select> <input name="udate_sd[]" id="udate_sd[]" type="hidden" value="<?php echo $row['update_sd_id'] ; ?>,<?php echo $uid ; ?>"></td>
			<td>
		    <textarea name="cmt_sd[]" id="cmt_sd[]" cols="20" rows="2"><?php echo $row['cmt_sd'] ; ?></textarea></td>
		</tr>
        
        <?php
		
		$sl++ ;
		  } 
		
}


		?>
        
<!--		<tr class="gradex">
		  <td>2</td>
			<td>Trident</td>
			<td>Internet
				 Explorer 5.0</td>
			<td>soeab</td>
			<td>&nbsp;</td>
			<td>Win 95+</td>
			<td class="center">5</td>
			<td class="center">C</td>
		</tr>-->

	</tbody>
    
    
    
</table>
<br>


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />


</form> 

		</div>
			<br>
<br>

            
          <!--  <form>

    <input type="checkbox" name="col02" checked="checked" /> Customer 
    <input type="checkbox" name="col3" checked="checked" /> Brand/Dept 
    <input type="checkbox" name="col4" checked="checked" />  Style
    <input type="checkbox" name="col5" checked="checked" />  Color 
    <input type="checkbox" name="col6" checked="checked" /> Sample Type 
    <input type="checkbox" name="col7" checked="checked" /> Season
    <input type="checkbox" name="col8" checked="checked" /> Fabric Type
    <input type="checkbox" name="col9" checked="checked" /> Print Type
    <input type="checkbox" name="col10" checked="checked" /> Product Type

    </form>-->
	
    
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf-8">
			var asInitVals = new Array();
			
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
					}
				} );
				
				
				
				$("thead input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("thead input").index(this) );
				} );
				
				
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
				$("thead input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("thead input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("thead input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("thead input").index(this)];
					}
				} );
			} );
			
			
			
	/* select */		
			
			
			$(document).ready(function() {
    /* Add/remove class to a row when clicked on */
    $('#example tr').click( function() {
        $(this).toggleClass('row_selected');
    } );
     
    /* Init the table */
    var oTable = $('#example').dataTable( );
} );
 
 
/*
 * I don't actually use this here, but it is provided as it might be useful and demonstrates
 * getting the TR nodes from DataTables
 */
function fnGetSelected( oTableLocal )
{
    return oTableLocal.$('tr.row_selected');
}

</script>
        
        
<!--        
        <script>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});
</script>
		-->

</body>
</html>