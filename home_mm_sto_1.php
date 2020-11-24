<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
	
	if (isset($_POST['search']))
 		{
		
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];	
		  $sys_date='' ;
		}
	
	

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>

       <script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');

//alert(ID);

$("#first_"+ID).hide();     //add jahid
//$("#midle_"+ID).hide();

$("#first_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();     //add jahid
//var track_sl=$("#track_sl_"+ID).val();  



//var midle=$("#midle_input_"+ID).val();
//var dataString = 'id='+ ID +'&firstname='+first+'&tracksl='+track_sl;

var dataString = 'id='+ ID +'&firstname='+first;
$("#first_"+ID).html('<img src="load.gif" />');                 // Loading image

//alert(dataString);

if(first.length>0)
{
$.ajax({
type: "POST",
url: "home_mm_fabric_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);     // add jahid
$("#sto_"+ID).hide();

//$("#midle_"+ID).html(midle);
}
});
}
else
{
//alert('Enter something.');
}

});
// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
  <style type="text/css">

<!--
/*@import url("css/table_style.css");*/
-->

</style> 
  <style type="text/css">
  
.editbox
{
display:none
}
td
{
padding:5px;
}
.editbox
{
font-size:12px;
width:60px;
background-color:#ffffcc;
border:solid 1px #000;
padding:3px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}  
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 
        
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=350,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}


function newPopup1(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=350,width=350,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
    
        
        
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
              <!--  for SD only--><br>

   <div class="span12">
                                <h2>Fabric Booking MM Part</h2><?php
								
								// $mydate=getdate(date("U"));
							// echo "$mydate[mday]-$mydate[mon]-$mydate[year]";
								// echo print_r(getdate()); //date("m-d-Y"); ?>

                                <div class="divider"></div>
<div width="80%"  style="margin-top:10px; ">


<form action="" method="post" >    
               
               <table align="left" class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td>Search By </td>
    <td>
      <select name="select_logic" id="select_logic">
        <option value="a.dpd_date">Fabric Booking Create Date</option>
        <option value="b.fab_receive_planned_date">Fabric Receive Planned Date</option>
        <option value="b.sd_agreed_sample_delivery_date">Agreed Sample Delivery Date</option>
      </select></td>
      
    <!--<input type="text" name="brand_style" id="brand_style">-->
      
<td>Date from</td>
<td>
<input name="date" class="rounded" type="text" id="date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    <td>Date To</td>
    <td><input name="date1" class="rounded" type="text" id="date1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>
</form>

</div>
</div>

   <div class="span12">&nbsp;
        <!--<div class="divider"></div>-->
	</div>

			<div id="demo" style="margin-top:20px; ">

<form action="home_mm_sto_print1.php" target="_blank" method="post">
  <table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:3000px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
    <!--class="display"  forget-ordering    -->
    <thead>
      <tr>
        <th>s</th>
        <!--  <th>&nbsp;</th>-->
        <th><strong>SL</strong></th>
        <th>Buyer</th>
        <th><strong>Style</strong></th>
        <th><strong>Color</strong></th>
        <th>Season</th>
        <th>Combo</th>
        <th>Concern DPD</th>
        <th bgcolor="#FFFFCC"><strong>Req Qty(DPD)</strong></th>
        <th>UOM</th>
        <th bgcolor="#FFCC00">STO/PO</th>
        <th bgcolor="#FFCC00">MM Date</th>
        
        <th>Sample Type</th>
        <th><strong>Fabrication</strong></th>
        <th><strong>Composition</strong></th>
        <th><strong>Fab Clr.</strong></th>
        <th><strong>Color Code</strong></th>
        <th><strong>Comments</strong></th>
        <th><strong>GSM</strong></th>
        <th><strong>Fab Wash</strong></th>
        <th><strong>Dia</strong></th>
        
        <th><strong>Collar Des</strong></th>
        <th><strong>Collar Size</strong></th>
        <th><strong>Collar Color</strong></th>
        <th><strong>Collar Qty</strong></th>
        <th><strong>Cuff Des</strong></th>
        <th><strong>Cuff Size</strong></th>
        <th><strong>Cuff Color</strong></th>
        <th><strong>Cuff Qty</strong></th>
        <th>Fabric Booking Date</th>
        <th>MM Concern</th>
        <th>Attachment</th>
        <th>Vendor</th>
        <th>Fab Rec. Planned Date</th>
        <th>Sample Submit Date</th>
        <th>Labdip</th>
        <th><strong>Item Cat</strong></th>
        <th><strong>Special Comt</strong></th>
        <th><strong>Yarn</strong></th>
        <th bgcolor="#CCCCFF">Knit Delv Qty</th>
        <th bgcolor="#CCCCFF">Knit Comt</th>
        <th bgcolor="#CCCCFF">Knit Status</th>
        <th bgcolor="#CCCCFF">Knit Date</th>
        <th bgcolor="#3399FF">Dying Delv Qty</th>
        <th bgcolor="#3399FF">Dying Comt</th>
        <th bgcolor="#3399FF">Status</th>
        <th bgcolor="#3399FF">Dying Date</th>
        <th bgcolor="#FF99CC">Store rec Qty</th>
        <th bgcolor="#FF99CC">Store Status</th>
        <th bgcolor="#FF99CC">Store Date</th>
        <th>Revise Reason</th>
        <th>Revise Cmnts</th>
        <th><strong>DPD Remarks</strong></th>
        
        
        
      </tr>
      <tr>
        <td><input type="hidden" name="s" size="2" value="s" class="search_init" /></td>
        <td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
        <td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
        <td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
        <td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
        <td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
        <td><input type="text" name="Combo" size="5" value="Combo" class="search_init" /></td>
        <td><input type="text" name="DPD Name" size="5" value="DPD Name" class="search_init" /></td>
        <td><input type="text" name="Req Qty" size="5" value="Req. Qty" class="search_init" /></td>
        <td><input type="hidden" name="UOM" size="5" value="UOM" class="search_init" /></td>
        <td><input type="hidden" name="STO NO" size="5" value="STO NO" class="search_init" /></td>
        <td><input type="hidden" name="MM Date" size="5" value="MM Date" class="search_init" /></td>
        
        <td><input type="text" name="Sample Type" size="5" value="Sample Type" class="search_init" /></td>
        <td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
        <td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
        <td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
        <td><input type="text" name="Color Code" size="5" value="Color Code" class="search_init" /></td>
        <td><input type="text" name="Remarks" size="5" value="Remarks" class="search_init" /></td>
        <td><input type="text" name="GSM" size="4" value="GMS" class="search_init" /></td>
        <td><input type="text" name="Fab Wash" size="4" value="Fab Wash" class="search_init" /></td>
        <td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
        
            <td><input type="text" name="Collar Des" size="5" value="Collar Des" class="search_init" /></td>
			<td><input type="text" name="Collar Size" size="6" value="Collar Size" class="search_init" /></td>
			<td><input type="text" name="Collar Color" size="4" value="Collar Color" class="search_init" /></td>
			<td><input type="text" name="Collar Qty" size="4" value="Collar Qty" class="search_init" /></td>

            <td><input type="text" name="Cuff Des" size="4" value="Cuff Des" class="search_init" /></td>
			<td><input type="text" name="Cuff Size" size="5" value="Cuff Size" class="search_init" /></td>
			<td><input type="text" name="Cuff Color" size="6" value="Cuff Color" class="search_init" /></td>
			<td><input type="text" name="Cuff Qty" size="4" value="Cuff Qty" class="search_init" /></td>
		  <td><input type="text" name="Create Date" size="6" value="Create Date" class="search_init" /></td>
        <td><input type="text" name="MM Concern" size="4" value="MM Concern" class="search_init" /></td>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </thead>
    <tbody>
      <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results = $obj->sql($SQL);
	
	

//	$SQL="select *,a.sl as sll,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sd_concern_mm_name='$user_name' AND a.sample_style=b.style AND b.color=a.color";    //table name
	
	
	
	$sql="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_sample_type_name, b.sd_concern_dpd_name,b.sd_agreed_sample_delivery_date from tb_fabric_booking a,tb_track_info b WHERE a.track_info_sl=b.sl";    //table name
	
	
	//b.sd_concern_mm_name='$user_name' AND
	
	if($date!=NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	 }

/*
if($sys_date!='')
{
$sql=$sql . " AND mm_date='$sys_date'" ;	
 $sql= $sql . "  order by sll ASC " ;
}
*/

if($sys_date!='')
{
	 $sql= $sql . " AND a.sto_po_no='' AND a.cancel_status = 0 group by a.sl order by sll ASC" ;
}
//	echo $sql ;

// die($sql);
	
//	$obj->sql($SQL);
$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;

	
	while($row = mysql_fetch_array($result))
	{
	
		$serial = $row['sll'];
		$revise_status = $row['revise_status'];
	
	?>
      <tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
        <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#03F"<?php } ?>><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sll']; ?>"></td>
        <!--  <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php // echo $row['sll']; ?>"></td>-->
        <td title="<?php echo $row['sd_concern_mm_name'] ; ?>"<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $si ; ?></td>
        <td title="Create Date - <?php echo $row['dpd_date'] ; ?>"<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['customer'] ; ?></td>
        <td title="Create Date - <?php echo $row['dpd_date'] ; ?>" <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['sample_style'] ; ?></td>
 <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['color'] ; ?></td>
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['season'] ; ?></td>
<td bgcolor="#88E4EC" style="color:#000" title="Create Date - <?php echo $row['dpd_date'] ; ?>" <?php if($revise_status != 0) { ?> <?php } ?>><?php echo $row['combo'] ;  ?></td>
        <!--<td ><?php // echo $row['season'] ; ?></td>-->
<td><?php echo $row['sd_concern_dpd_name'] ; ?></td>
        <td  bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['uom'] ; ?></td>
          
        <td class="edit_td" bgcolor="#FFCC00"><span onfocus="this.select()" id="first_<?php echo $row['sll']; ?>" class="text"><?php $row['sto_po_no']; ?></span>
                
     <span id="sto_<?php echo $row['sll']; ?>"><?php if ($row['cancel_sto'] != '') { ?>Prev STO: <?php echo $row['cancel_sto']; } else echo 'No Prev STO';?></span>
          
						<input type="number" class="editbox" onClick="this.select()" onFocus="this.select()" id="first_input_<?php echo $row['sll']; ?>" value="<?php echo $row['sto_po_no']; ?>" size="11" maxlength="15" />
                        <!--<input id="track_sl_<?php // echo $row['sll']; ?>" type="hidden" value="<?php // echo $row['track_info_sl']; ?>" />-->
                        
                        </td>
          
        <td bgcolor="#FFCC00"><?php echo $row['mm_date']?></td>

        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['sd_sample_type_name'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['fabrication'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['composition'] ; ?></td>
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['fab_color'] ; ?></td>
  <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['c_code'] ; ?></td>
  <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['remarks'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['gsm'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['f_wash'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['dia'] ; ?></td>
        
        
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['collar_des'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['collar_size'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['collar_color'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['collar_qty'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['cuff_des'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['cuff_size'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['cuff_color'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['cuff_qty'] ;  ?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['dpd_date'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['sd_concern_mm_name'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><a target="_blank" href="<?php echo $row['attachment'] ;  ?>"><?php echo $row['attachment'] ;  ?></a></td>
 <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['supplier'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['fab_receive_planned_date'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['labdip'] ; ?></td>
        <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['item_cat'] ; ?></td>        
 <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['comments'] ; ?></td>
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['yarn_count'] ; ?></td>

        <td bgcolor="#3399FF"><?php echo $row['knit_del_qty']?></td>
        <td bgcolor="#3399FF"><?php echo $row['knit_comnt']?></td>
        <td bgcolor="#3399FF"><?php echo $row['knit_status']?></td>
        <td bgcolor="#3399FF"><?php echo $row['knit_date']?></td>
        <td bgcolor="#CCCCFF"><?php echo $row['delv_qty']?></td>
        <td bgcolor="#CCCCFF"><?php  echo $row['remark_dy'];  ?></td>
        <td bgcolor="#CCCCFF"><?php echo $row['del_status'] ;  ?></td>
        <td bgcolor="#CCCCFF"><?php echo $row['dy_date'] ;  ?></td>
        <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
        <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
        <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td>
    <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php if($row['revise_rsn'] == 1) echo 'Buyer Change' ; if($row['revise_rsn'] == 2) echo 'Wrong Booking' ; ?></td>
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['revise_cmnts'] ;  ?></td> 
<td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" style="color:#000" <?php } ?>><?php echo $row['remark_dpd'] ; ?></td>
      </tr>
      <?php $si++ ; } ?>
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
  <div align="center">
<input name="submit" type="submit" class="btn btn-success" id="submit" value="Excel Preview »" />
      &nbsp;
<input name="input" type="reset" class="btn btn-danger" value="Reset" />
</div>
<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->

</form> 

		</div>
			<br>
<br>
<br>
<br>	
    
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf-8">
			var asInitVals = new Array();
			
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all:"
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