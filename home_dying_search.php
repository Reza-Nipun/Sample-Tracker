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
	
	$srch_style = $_POST['srch_style'];
	
	echo ' -) '.$srch_style.' - Hello';
	
	if (isset($_POST['search']))
 	{
	//  $customer=mysql_real_escape_string($_POST['customer']);
	//  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
	//  $style=mysql_real_escape_string($_POST['style']);	
	//  $color=mysql_real_escape_string($_POST['color']);
	//  $season=mysql_real_escape_string($_POST['season']);	
	$date=$_POST['date'];	
	$date1=$_POST['date1'];	
	$select_logic=$_POST['select_logic'];			
	}
	
	$style = $_POST['date1'];
	
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
$("#first_"+ID).hide();     //add jahid
$("#remark_"+ID).hide();     
$("#status_"+ID).hide();
$("#first_input_"+ID).show();    //add text box id
$("#remark_input_"+ID).show();    //add text box id
$("#status_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();     //add jahid
var remark=$("#remark_input_"+ID).val();     //add jahid
var status=$("#status_input_"+ID).val();

var dataString = 'id='+ ID +'&firstname='+first+'&remark='+remark+'&status='+status;
//$("#first_"+ID).html('<img src="load.gif" />');                 // Loading image
if(first.length>0 || remark.length>0 || status.length>0)
{
$.ajax({
type: "POST",
url: "home_dying_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);     // add jahid
$("#remark_"+ID).html(remark);    
$("#status_"+ID).html(status);
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
width:100px;
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
              <!--  for SD only-->
   
  <div class="span12">
<h2><u>VTL Dying</u></h2>

<div width="80%"  style="margin-top:5px; ">

	<!--<form action="home_knitting.php" method="POST">-->
  <form action="home_dying_search.php" method="POST">
                 
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
    <br/><br/>
</form>
</div>
</div>

<div>&nbsp;</div>

<div id="demo" style="margin-top:20px; ">

   <script type="text/javascript">
      $(document).ready(function() {
         $('#selecctall').click(function(event) {  //on click 
             if(this.checked) { // check select status
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = true;  //select all checkboxes with class "checkbox1"               
                 });
             }else{
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                 });         
             }
         });
         
      });
   </script>
   
                <form name="Form1" method="post" target="_blank">      
  
       <table cellpadding="0" cellspacing="0" border="1" class="draggable" style="width:3500px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
    <!--class="display"  forget-ordering    -->
    
<thead>
<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	<th>#<label><span style="color:#000">
	  <input type="checkbox" tabindex="1" checked="checked" id="selecctall"/></span>
</label></th>
  <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th><strong>Style</strong></th>
    <th>Sample Type</th>
    <th><strong>Grmts Color</strong></th>
    <th><strong>Fab Color</strong></th>
    <th><strong>Fabrication</strong></th>
    <th><strong>Composition</strong></th>
    <th><strong>GSM</strong></th>
    <th><strong>Dia</strong></th>
    <th>Posting Date</th>
     <th>Fab Rec. Planned Date</th>
     <th>Sample Submit Date</th>
    <th bgcolor="#FFFFCC">STO/PO</th>
    <th width="100px" bgcolor="#FFFFCC">MM STO Create Date</th>
    <th width="100px"><strong>Color Code</strong></th>
    <th><strong>Item Cat</strong></th>
    <th>labdip</th>
    <th><strong>Comt</strong></th>
    <th><strong>Yearn</strong></th>    
    <th bgcolor="#FFFFCC"><strong>Req Qty</strong></th>
    <th bgcolor="#CCFFCC">Knit Delv Qty</th>
    <th bgcolor="#CCFFCC" width="100px">Knit Comt</th>
    <th bgcolor="#CCFFCC">Knit Status</th>
    <th bgcolor="#CCFFCC">Knit Date</th>
    <th bgcolor="#FF3300">Balance</th>    
    <th bgcolor="#CCCCFF">Delivary Qty</th>
    <th bgcolor="#CCCCFF">Dying Comt</th>
    <th bgcolor="#CCCCFF">Status</th>
    <th bgcolor="#CCCCFF">Referrence</th>
    <th>UOM</th>
    <th bgcolor="#FF99CC">Store rec Qty</th>
    <th bgcolor="#FF99CC">Store Status</th>
    <th bgcolor="#FF99CC">Store Date</th>
    <th width="50px">Concern DPD</th>
    <th width="50x">Revise Reason</th>
    <th width="50x">Revise Cmnts</th>
    <th width="200px"><strong>DPD Comt</strong></th>
	</tr>
        
	</thead>
       
	<tbody>
    
    <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results  = $obj->sql($SQL);
	
	//, IFNULL(a.referrence_id, 0)

	$sql="select a.*,b.fab_receive_planned_date,b.customer,b.sd_sample_type_name,b.sd_agreed_sample_delivery_date, b.sd_concern_dpd_name,a.sl as sll,a.color_code as c_code, b.sd_concern_dpd_name from tb_fabric_booking a,tb_track_info b WHERE a.track_info_sl=b.sl";    //table name
	
	if($date!=NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	 }
	 
	// $sql= $sql . " AND a.sto_po_no LIKE '55%' AND a.del_status!='Complete' group by a.sl order by sll ASC " ;
	 $sql= $sql . " AND a.sto_po_no LIKE '55%' AND a.del_status!='Complete' AND a.cancel_status = 0 group by a.sl order by LENGTH(mm_date), mm_date ASC" ;
$result = $obj->sql($sql);
	
	//$result = get_data();
	$sl=1 ;

	
	while($row = mysql_fetch_array($result))
	{
		$revise_status = $row['revise_status'];
	
	?>
    <tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
        
		  <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><input class="checkbox1" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sll']; ?>~<?php echo $row['sto_po_no']; ?>~<?php echo $row['sd_concern_dpd_name']; ?>"></td>
            
    <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $sl; ?></td>
	<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['customer'] ; ?></td>
    <td title="Create Date - <?php echo $row['dpd_date'] ; ?>"<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['sample_style'] ; ?></td>
     <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['color'] ;  ?></td>
  <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['fab_color'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['fabrication'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['composition'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['gsm'] ;  ?></td>
    <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['dia'] ;  ?></td>
   <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['dpd_date'] ;  ?></td>
  <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td <?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['sto_po_no'] ; ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['mm_date'] ;  ?></td>
 <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['color_code'] ;  ?></td>
 <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['item_cat'] ;  ?></td>
 <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['labdip'] ;  ?></td>
 <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['comments'] ;  ?></td>
 <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['yarn_count'] ;  ?></td>
    
    <td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_del_qty']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_comnt']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_status']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_date']?></td>
    <td bgcolor="#FF3300" style="font-size:14px; color:#FFF"><?php echo trim($row['dpd_req_qty']-$row['delv_qty']) ; ?></td>
    
    <td class="edit_td" bgcolor="CCCCFF">
      <span onfocus="this.select()" id="first_<?php echo $row['sll']; ?>" class="text"><?php echo $row['delv_qty']?></span>
      <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="first_input_<?php echo $row['sll']; ?>" value="<?php echo $row['delv_qty']; ?>" size="4" maxlength="4" />
      
    </td>
    <td class="edit_td" bgcolor="CCCCFF">
  <span onfocus="this.select()" id="remark_<?php echo $row['sll']; ?>" class="text"><?php echo $row['remark_dy']?></span> 
      <textarea class="editbox" onClick="this.select()" onfocus="this.select()" id="remark_input_<?php echo $row['sll']; ?>" value="<?php echo $row['remark_dy']; ?>"><?php echo $row['remark_dy'] ; ?></textarea></td>
    
    <td class="edit_td" bgcolor="CCCCFF">
 <span onfocus="this.select()" id="status_<?php echo $row['sll']; ?>" class="text"><?php echo $row['del_status']?></span>
    
    <select class="editbox" onClick="this.select()" onfocus="this.select()" id="status_input_<?php echo $row['sll']; ?>">
      <option value="">Select</option>
      <option value="<?php echo $row['del_status'] ; ?>" selected="selected"><?php echo $row['del_status'] ; ?></option>
      <option value="Complete">Complete</option>
      <option value="Partial">Partial</option>
    </select>
    </td>
    <td bgcolor="CCCCFF"><?php echo $row['referrence_id']?></td>
       
    <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['uom'] ;  ?></td>
        <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#000"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php if($row['revise_rsn'] == 1) echo 'Buyer Change' ; if($row['revise_rsn'] == 2) echo 'Wrong Booking' ; ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['revise_cmnts'] ;  ?></td> 

<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } ?>><?php echo $row['remark_dpd'] ;  ?></td>

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
  
  
        <INPUT name="Submit" type="submit" class="btn btn-success" onclick="return OnButton1();" value="Print Preview »"> 
        &nbsp;
    	<INPUT name="Submit" type="submit" class="btn btn-success" onclick="return OnButton2();" value="Print with Ref. »"> 
      
<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Print »" />-->
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />
</form> 

          <script language="Javascript">
<!--
function OnButton1()
{
    document.Form1.action = "home_dying_clarification_print.php"
        // Open in a new window
    document.Form1.submit();   	
	// document.Form1.target="_blank";
    return true;
}

function OnButton2()
{
    document.Form1.action = "home_dying_clarification_print_ref.php"
     // Open in a new window
    document.Form1.submit();             // Submit the page
    return true;
}
-->
</script>
<noscript>You need Javascript enabled for this to work</noscript>


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
	
    
<!--<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
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

		</script>-->
        
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