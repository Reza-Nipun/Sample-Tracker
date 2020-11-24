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
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		  $style=mysql_real_escape_string($_POST['style']);	
		  $color=mysql_real_escape_string($_POST['color']);
		  $season=mysql_real_escape_string($_POST['season']);	
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];		
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
//$("#first_"+ID).hide();     //add jahid
//$("#issue_"+ID).hide();

$("#first_input_"+ID).show();    //add text box id
$("#issue_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');

var store_rec_qty=$("#store_rec_qty_"+ID).val();
var first=$("#first_input_"+ID).val(); // It is the Store Receive Qty
var track_sl=$("#track_sl_input_"+ID).val();
var issue=$("#issue_input_"+ID).val();
var store_use_qty=$("#store_use_qty_"+ID).val();


var temp_rec = parseInt(first, 10) + parseInt(store_rec_qty, 10);
var temp_issue = parseInt(issue, 10) + parseInt(store_use_qty, 10);


     //add jahid
//var midle=$("#midle_input_"+ID).val();

var dataString = 'id='+ ID +'&firstname='+first+'&track_sl='+track_sl+'&issue='+issue;

//alert(first);

var dataString1 = 'id='+ ID +'&issue='+issue;


if(first.length>0)
{
	
$("#first_"+ID).html('<img src="load.gif" />');                 // Loading image
	
$.ajax({
type: "POST",
url: "home_store_update.php",
data: dataString,
cache: false,
success: function(html)
{

$("#store_balance_"+ID).html(html);
//$("#first_"+ID).html(first);     // add jahid
$("#first_"+ID).html(temp_rec);
$("#first_input_"+ID).hide();
$("#first_input_"+ID).val('');

}
});
}

if(issue.length>0)
{
	
$("#issue_"+ID).html('<img src="load.gif" />');                 // Loading image
	
		//var temp = issue+store_use_qty;
		//alert(temp_issue);
		$.ajax({
		type: "POST",
		url: "home_store_update1.php",
		data: dataString1,
		cache: false,
		success: function(html)
		{
			
		$("#store_balance_"+ID).html(html);
		$("#issue_"+ID).html(temp_issue);
		//$("#midle_"+ID).html(midle);
		$("#issue_input_"+ID).hide();
		$("#issue_input_"+ID).val('');
		}
		});
	
}

// IF first = 0 and issue = 0 then alert.
/*else
{
alert('Enter something.');
}*/

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
		url,'popUpWindow','height=350,width=450,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
              <!--  for SD only-->
   
<div align="center">
<h1 style="color:#030; font-weight:bolder;"><u>VTG Store</u></h1>
</div>
			<div id="demo" style="margin-top:30px; ">

<form action="home_dying_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:2400px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	  <!--<th>&nbsp;</th>-->
  
  
    <th width="48"><strong>SL</strong></th>
    <th width="67">Buyer</th>
    <th width="67"><strong>Style</strong></th>
    <th width="69"><strong>Color</strong></th>
    <th width="86"><strong>Fab Clr.</strong></th>
    <th width="113"><strong>Fabrication</strong></th>
    <th width="118"><strong>Composition</strong></th>
    <th width="62"><strong>GSM</strong></th>
    <th width="86"><strong>Req Qty</strong></th>
    <th width="94">DY Delv. Qty</th>
    <th width="98" bgcolor="#FFCC00">Recv. Qty</th>
    <th width="95" bgcolor="#FFCC00">Issue Qty</th>
    <th width="101" bgcolor="#FFCC00">In Hand Qty</th>
    <th width="143" bgcolor="#FFCC00">Store Recv DT</th>
    <th width="65" bgcolor="#FFCC00">Age</th>
    <th width="54"><strong>Dia</strong></th>
    <th width="162">Posting Date (DPD)</th>
    <th width="118">STO/PO(MM)</th>
    <th width="79"><strong>C Code</strong></th>
    <th width="90"><strong>Item Cat</strong></th>
    <th width="68"><strong>Comt</strong></th>
    <th width="72"><strong>Yearn</strong></th>
    
    <th width="56">UOM</th>
    <th width="101">Comment</th>
    <th width="110">Dying Comt</th>
    <th width="76">Status</th>
    <th width="115"><strong>DPD Comt</strong></th>

	</tr>
    
		<tr>
		  <!--<td><input type="hidden" name="" size="2" value="" class="search_init" /></td>-->
			<td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
			<td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
			<td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
			<td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
			<td><input type="text" name="GMS" size="4" value="GMS" class="search_init" /></td>
			<td><input type="text" name="Req Qty" size="4" value="Req Qty" class="search_init" /></td>
			<td><input type="text" name="DY Delv Qty" size="4" value="DY Delv Qty" class="search_init" /></td>
			<td><input type="text" name="Recv. Qty" size="4" value="Recv. Qty" class="search_init" /></td>
			<td><input type="text" name="Issue Qty" size="4" value="Issue Qty" class="search_init" /></td>
			<td><input type="text" name="In Hand Qty" size="4" value="In Hand Qty" class="search_init" /></td>
			<td><input type="text" name="Store Recv DT" size="4" value="Store Recv DT" class="search_init" /></td>
			<td><input type="text" name="Age" size="4" value="Age" class="search_init" /></td>
			<td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
			<td><input type="text" name="Posting Date" size="4" value="Posting Date" class="search_init" /></td>
			<td><input type="text" name="STO/PO" size="4" value="STO/PO" class="search_init" /></td>
			<td><input type="text" name="C Code" size="4" value="C Code" class="search_init" /></td>
		  <td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
			<td><input type="text" name="Comt" size="4" value="Comt" class="search_init" /></td>
			<td><input type="text" name="Yearn" size="4" value="Yearn" class="search_init" /></td>
            <td><input type="text" name="UOM" size="4" value="UOM" class="search_init" /></td>
			<td><input type="text" name="Comment" size="4" value="Comment" class="search_init" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>


	  </tr>
    
	</thead>
	<tbody>
    
    <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results = $obj->sql($SQL);
	
	

	//$SQL="select * from tb_fabric_booking WHERE sto_po_no!=''  AND delv_qty!='' AND delv_qty!=store_rec_qty OR store_status NOT like '%done%' ORDER by SL DESC LIMIT 0, 10";    //table name
	
	
	/*$SQL = "SELECT T0.* from tb_fabric_booking T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl 
	WHERE STR_TO_DATE( T1.create_date,  '%d-%m-%Y' ) > STR_TO_DATE(  '01-01-2015',  '%d-%m-%Y' ) AND  `sd_actual_sample_submission_date` =  '' AND 
AND  `sd_sample_reject_pass` =  '' AND T0.sto_po_no!='' AND T0.delv_qty!='' AND T0.delv_qty < T0.store_rec_qty OR T0.store_status NOT like '%done%' ORDER by SL DESC";*/


	$SQL = "SELECT T0.* FROM `tb_fabric_booking` T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl 
	WHERE `delv_qty` != '' AND IFNULL(store_rec_qty, 0) < delv_qty AND store_status NOT like '%done%' AND STR_TO_DATE(dy_date,  '%d-%m-%Y' ) > STR_TO_DATE( '01-01-2015',  '%d-%m-%Y' ) AND T1.`sd_actual_sample_submission_date` =  '' AND  T1.`sd_sample_reject_pass` =  ''";
	
	$SQL .= "LIMIT 0, 5";
	
	/*$SQL = "SELECT T0.* FROM `tb_fabric_booking` T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl 
	WHERE `delv_qty` != '' AND (IFNULL(store_rec_qty, 0)-IFNULL(store_use_qty, 0)) != 0 AND STR_TO_DATE(dy_date,  '%d-%m-%Y' ) > STR_TO_DATE( '01-01-2015',  '%d-%m-%Y' ) AND T1.`sd_actual_sample_submission_date` =  '' AND  T1.`sd_sample_reject_pass` =  '' LIMIT 0, 10";*/
	
	
	//die();
	//$obj->sql($SQL);  AND store_rec_qty < delv_qty AND store_status NOT like '%ok%'
$result = $obj->sql($SQL);
	
	//$result = get_data();
	$sl=1 ;
	$today = date('d-m-Y');
	
	while($row = mysql_fetch_array($result))
	{
	
		
		if($row['store_date'] != '')
		{
		$store_date = $row['store_date'];
		$time_diff = abs(strtotime($today) - strtotime($store_date));
		$day_diff = $time_diff / (60*60*24);
		$day_diff = $day_diff.' Days';
		}
		else $day_diff = ''; 
		
		
		//$years_diff = floor($time_diff / (365*60*60*24));
		//$months_diff = floor(($time_diff - $years_diff * 365*60*60*24) / (30*60*60*24));
		//$day_diff = floor(($time_diff - $years_diff * 365*60*60*24 - $months_diff*30*60*60*24)/ (60*60*24));

	


	
	?>
    <tr id="<?php echo $row['sl'] ; ?>" class="edit_tr">
    
		
        
        
		  <!--<td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php // echo $row['sl']; ?>"></td>-->
		
            
			  <td title="SL - <?php echo $row['sl'] ;  ?>"><?php echo $sl ; ?></td>
			  <td><?php echo $row['buyer'] ; ?></td>
    <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['fab_color'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ;  ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td  bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['delv_qty']?></td>
    <td class="navigate" bgcolor="#FFCC00"><span onfocus="this.select()" id="first_<?php echo $row['sl']; ?>" class="text"><?php echo $row['store_rec_qty']?></span>
      <!--<input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="first_input_<?php // echo $row['sl']; ?>" value="<?php // echo $row['store_rec_qty']; ?>" size="4" maxlength="4" />-->
      <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="first_input_<?php echo $row['sl']; ?>" size="4" maxlength="4" />
      <input type="hidden" class="editbox" id="track_sl_input_<?php echo $row['sl']; ?>" value="<?php echo $row['track_info_sl']; ?>" />
      <input type="hidden" class="editbox" id="store_rec_qty_<?php echo $row['sl']; ?>" value="<?php if($row['store_rec_qty'] == '') echo 0; else echo $row['store_rec_qty']; ?>" /></td>
    <td class="edit_td" bgcolor="#FFCC00"><span onfocus="this.select()" id="issue_<?php echo $row['sl']; ?>" class="text"><?php echo $row['store_use_qty']; ?></span>
      <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="issue_input_<?php echo $row['sl']; ?>" size="4" maxlength="4" />
      <input type="hidden" class="editbox" id="store_use_qty_<?php echo $row['sl']; ?>" value="<?php if($row['store_use_qty'] == '') echo 0; else echo $row['store_use_qty']; ?>" /></td>
    <td bgcolor="#FFCC00" id="store_balance_<?php echo $row['sl']; ?>"><?php echo $row['store_rec_qty']-$row['store_use_qty']; ?></td>
    <td bgcolor="#FFCC00"><?php echo $row['store_date']; ?></td>
    <td bgcolor="#FFCC00"><?php echo $day_diff; ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
    <td><?php echo $row['dpd_date'] ;  ?></td>
    <td title="posting Date-<?php echo $row['mm_date'] ;  ?>"><?php echo $row['sto_po_no'] ;  ?></td>
    <td><?php echo $row['color_code'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['yarn_count'] ;  ?></td>
    
    <td><span class="edit_td"><?php echo $row['uom'] ;  ?></span></td>
    <td>
      
      <?php if($row['store_status']!=NULL) { echo $row['store_status'];  ?> 
      <a href="JavaScript:newPopup1('home_store_cmt_update.php?SID=<?php echo $row['sl'] ; ?>');" style="color:#030">
        <strong>(+)</strong></a>
      
      <?php } else { ?>
      
      
      
  <a href="JavaScript:newPopup1('home_store_cmt_update.php?SID=<?php echo $row['sl'] ; ?>');" style="color:#030">
  <strong>Add+</strong></a>
  <?php }  ?>
    </td>
       <td ><?php echo $row['remark_dy'];  ?></td>
       <td ><?php echo $row['del_status'] ;  ?>
        
       </td>
    
    <td ><?php echo $row['remark_dpd'] ;  ?></td>
		</tr>
        
        <?php $sl++ ; } ?>
        
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


<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->

</form> 

		</div>
			<input type="text" name="Delv. Qty" size="4" value="Delv. Qty" class="search_init" />
			<br>
<br>
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