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
$("#knit_delv_"+ID).hide();     //add jahid
$("#knit_cmnt_"+ID).hide(); 
$("#knit_status_"+ID).hide();
//$("#midle_"+ID).hide();

$("#knit_delv_input_"+ID).show(); 
$("#knit_cmnt_input_"+ID).show(); 
$("#knit_status_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var knit_delv=$("#knit_delv_input_"+ID).val(); 
var knit_cmnt=$("#knit_cmnt_input_"+ID).val();
var knit_status=$("#knit_status_input_"+ID).val();    //add jahid
//var midle=$("#midle_input_"+ID).val();

var dataString = 'id='+ ID +'&knit_delv='+knit_delv +'&knit_cmnt='+knit_cmnt +'&knit_status='+knit_status;
//$("#knit_delv_"+ID).html('<img src="load.gif" />');                 // Loading image

if(knit_delv.length>0 || knit_cmnt.length>0 || knit_status.length>0)
{
$.ajax({
type: "POST",
url: "home_knit_fabric_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#knit_delv_"+ID).html(knit_delv); 
$("#knit_cmnt_"+ID).html(knit_cmnt); 
$("#knit_status_"+ID).html(knit_status);     // add jahid
//$("#midle_"+ID).html(midle);
}
});
}
else
{
// alert('Enter something.');
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
		url,'popUpWindow','height=250,width=450,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
                                <h2>Fabric Booking Knitting Part</h2>
                                <div class="divider"></div>
<div width="80%"  style="margin-top:10px; ">


  <form action="home_knitting.php" method="POST">
               
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
			<div id="demo" style="margin-top:20px; ">

<form action="" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:4000px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	<!--  <th>&nbsp;</th>-->
  
  
    <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th>Season</th>
    <th><strong>Fab Color</strong></th>
    <th><strong>Fabrication</strong></th>
    <th><strong>Composition</strong></th>
    <th><strong>GSM</strong></th>
    <th><strong>Dia</strong></th>
    <th><strong>Collar Des</strong></th>
    <th><strong>Collar Size</strong></th>
    <th><strong>Collar Color</strong></th>
    <th><strong>Collar Qty</strong></th>
    <th><strong>Cuff Des</strong></th>
    <th><strong>Cuff Size</strong></th>
    <th><strong>Cuff Color</strong></th>
    <th><strong>Cuff Qty</strong></th>
    <th><strong>Remarks</strong></th>
    <th>Create Date</th>
    <th>Fab Rec. Planned Date</th>
    <th>Sample Submit Date</th>
    <th><strong>Color Code</strong></th>
    <th>Labdip</th>
    <th><strong>Item Cat</strong></th>
    <th><strong>Comt</strong></th>
    <th><strong>Yarn</strong></th>
    <th><strong>Req Qty(DPD)</strong></th>
    <th>UOM</th>
    <th>Referrence</th>
    <th bgcolor="#FFCC00">STO/PO</th>
    <th bgcolor="#FFCC00">MM Date</th>
    <th bgcolor="#CCCCFF">Knit Delv Qty</th>
    <th bgcolor="#CCCCFF">Knit Comt</th>
    <th bgcolor="#CCCCFF">Knit Status</th>
    <th bgcolor="#CCCCFF">Knit Date</th>
    <th bgcolor="#FF3300">Balance</th>
    <th bgcolor="#3399FF">Dying Delv Qty</th>
    <th bgcolor="#3399FF">Dying Comt</th>
    <th bgcolor="#3399FF">Status</th>
    <th bgcolor="#3399FF">Dying Date</th>
    <th bgcolor="#FF99CC">Store rec Qty</th>
    <th bgcolor="#FF99CC">Store Status</th>
    <th bgcolor="#FF99CC">Store Date</th>
    <th>Cancel Rsn</th>
    <th>Cancel Cmnts</th>
    <th width="6%"><strong>DPD Comt</strong></th>

	</tr>
 <tr>
		 <!-- <td><input type="hidden" name="" size="2" value="" class="search_init" /></td>-->
			<td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
			<td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
			<td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
			<td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
			<td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
			<td><input type="text" name="GMS" size="4" value="GMS" class="search_init" /></td>
			<td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
			
            <td><input type="text" name="Collar Des" size="5" value="Collar Des" class="search_init" /></td>
			<td><input type="text" name="Collar Size" size="6" value="Collar Size" class="search_init" /></td>
			<td><input type="text" name="Collar Color" size="4" value="Collar Color" class="search_init" /></td>
			<td><input type="text" name="Collar Qty" size="4" value="Collar Qty" class="search_init" /></td>

            <td><input type="text" name="Cuff Des" size="4" value="Cuff Des" class="search_init" /></td>
			<td><input type="text" name="Cuff Size" size="5" value="Cuff Size" class="search_init" /></td>
			<td><input type="text" name="Cuff Color" size="6" value="Cuff Color" class="search_init" /></td>
			<td><input type="text" name="Cuff Qty" size="4" value="Cuff Qty" class="search_init" /></td>
			<td><input type="text" name="Remarks" size="4" value="Remarks" class="search_init" /></td>
			
            
            <td><input type="text" name="Create Date" size="6" value="Create Date" class="search_init" /></td>
			<td><input type="text" name="Fab Rec. Planned Date" size="4" value="Fab Rec. Planned Date" class="search_init" /></td>
			<td><input type="text" name="Sample Submit Date" size="4" value="Sample Submit Date" class="search_init" /></td>
			<td><input type="text" name="C Code" size="4" value="C Code" class="search_init" /></td>
			<td><input type="text" name="Labdip" size="4" value="Labdip" class="search_init" /></td>
			<td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
			<td><input type="text" name="Comt" size="4" value="Comt" class="search_init" /></td>
			<td><input type="text" name="Yearn" size="4" value="Yearn" class="search_init" /></td>
            <td><input type="text" name="Req Qty(DPD)" size="4" value="Req Qty(DPD)" class="search_init" /></td>
            <td><input type="text" name="UOM" size="4" value="UOM" class="search_init" /></td>
            <td><input type="text" name="Referrence2" size="4" value="Referrence" class="search_init" /></td>
            <td><input type="text" name="STO/PO" size="4" value="STO/PO" class="search_init" /></td>
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
	
	
	$sql="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date FROM tb_fabric_booking a,tb_track_info b WHERE a.track_info_sl=b.sl";    //table name
	
	if($date!=NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	 }
	 
	 $sql= $sql . " AND a.sto_po_no!='' AND a.cancel_status <> 0 group by a.sl order by sll ASC " ;
	
//	$obj->sql($SQL);
$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;

	
	while($row = mysql_fetch_array($result))
	{ ?>
    
		<tr id="<?php echo $row['sll'] ; ?>" class="edit_tr" style="color:#F00">
        
		  <!--<td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php // echo $row['sll']; ?>"></td>-->
            
			  <td title="<?php echo $row['sd_concern_mm_name'] ; ?>"><?php echo $si ; ?></td>
			  <td title="Customer"><?php echo $row['customer'] ; ?></td>
    <td><?php echo $row['sample_style'] ; ?></td>
<td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['season'] ;  ?></td>
    <td><?php echo $row['fab_color'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ;  ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
    <td><?php echo $row['collar_des'] ;  ?></td>
    <td><?php echo $row['collar_size'] ;  ?></td>
    <td><?php echo $row['collar_color'] ;  ?></td>
    <td><?php echo $row['collar_qty'] ;  ?></td>
    <td><?php echo $row['cuff_des'] ;  ?></td>
    <td><?php echo $row['cuff_size'] ;  ?></td>
    <td><?php echo $row['cuff_color'] ;  ?></td>
    <td><?php echo $row['cuff_qty'] ;  ?></td>
    <td><?php echo $row['remarks'] ;  ?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['dpd_date'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td><?php echo $row['c_code'] ;  ?></td>
    <td><?php echo $row['labdip'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['yarn_count'] ;  ?></td>
    
    <td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['uom'] ;  ?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['referrence_id']?></td>
     <td><?php echo $row['sto_po_no']; ?></td>
       
    
    <td bgcolor="#FFCC00"><?php echo $row['mm_date']?></td>
     <td class="edit_td" bgcolor="#3399FF">
    <span onfocus="this.select()" id="knit_delv_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_del_qty']?></span>
	<input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_delv_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_del_qty'] ; ?>" size="11" maxlength="15" /></td>
    
     <td class="edit_td" bgcolor="#3399FF">
  <span onfocus="this.select()" id="knit_cmnt_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_comnt']?></span>
	<textarea name="knit_comnt" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_cmnt_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_comnt'] ; ?>"><?php echo $row['knit_comnt'] ; ?></textarea></td>    
    
<!--<td bgcolor="#3399FF"><?php // if($row['knit_comnt']!=NULL) { echo $row['knit_comnt'];  ?> 
<a href="JavaScript:newPopup1('home_knit_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030">
<strong>(+)</strong></a><?php // } else { ?>
<a href="JavaScript:newPopup1('home_knit_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030"><strong>Add+</strong></a><?php // }  ?></td>-->

     <td class="edit_td" bgcolor="#3399FF">
  <span onfocus="this.select()" id="knit_status_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_status']?></span><select name="knit_status" class="editbox" id="knit_status_input_<?php echo $row['sll']; ?>">
      <option>Select</option>
      <option value="<?php echo $row['knit_status'] ; ?>" selected="selected"><?php echo $row['knit_status'] ; ?></option>
      <option value="Complete">Complete</option>
      <option value="Partial">Partial</option>
    </select></td>    

    
    <td bgcolor="#3399FF"><?php echo $row['knit_date']?></td>
    <td bgcolor="#FF3300" style="font-size:14px; color:#FFF"><?php echo trim($row['dpd_req_qty']-$row['knit_del_qty']) ; ?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['delv_qty']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['remark_dy'];  ?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['del_status'] ;  ?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['dy_date'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td>
<td><?php if($row['cancel_rsn'] == 1) echo 'Buyer Change' ; if($row['cancel_rsn'] == 2) echo 'Wrong Booking' ; ?></td>
    <td><?php echo $row['cancel_cmnts'] ;  ?></td>        
    <td><?php echo $row['remark_dpd'] ;  ?></td>
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
    <tfoot>
       
		
      </tfoot>
    
</table>


<br>
<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->

</form> 

		</div>
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