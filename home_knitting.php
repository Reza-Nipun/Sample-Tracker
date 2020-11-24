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
	//  $customer=mysql_real_escape_string($_POST['customer']);
	//  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
	//  $style=mysql_real_escape_string($_POST['style']);	
	//  $color=mysql_real_escape_string($_POST['color']);
	//  $season=mysql_real_escape_string($_POST['season']);	
	$search_sto = trim($_POST['search_sto']);	
	$search_style = trim($_POST['search_style']);	
	$search_ref = trim($_POST['search_ref']);
	$search_knit_status = trim($_POST['search_knit_status']);
	
	$search_buyer = trim($_POST['search_buyer']);
	$search_fab_color = trim($_POST['search_fab_color']);	
	$search_dpd = trim($_POST['search_dpd']);

	$search_mm_date1 = trim($_POST['search_mm_date1']);	
	$search_mm_date2 = trim($_POST['search_mm_date2']);
	
	$search_knit_date1 = trim($_POST['search_knit_date1']);	
	$search_knit_date2 = trim($_POST['search_knit_date2']);
	
	}
	
	/*if($_GET['fab_sl'])
	{
		$f_sl = $_GET['fab_sl'] ;	
		$SQLX="UPDATE tb_fabric_booking SET del_status = 'Cancelled' WHERE sl = '$f_sl'";
		$obj->sql($SQLX);
	}*/
	
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

$("#knit_yarn_count_"+ID).hide();     
$("#knit_stitch_length_"+ID).hide(); 
$("#knit_gray_gsm_"+ID).hide();

$("#knit_cmnt_"+ID).hide(); 
$("#knit_status_"+ID).hide();



//$("#midle_"+ID).hide();

$("#knit_delv_input_"+ID).show();

$("#knit_yarn_count_input_"+ID).show(); 
$("#knit_stitch_length_input_"+ID).show();
$("#knit_gray_gsm_input_"+ID).show(); 

$("#knit_cmnt_input_"+ID).show(); 
$("#knit_status_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var knit_delv=$("#knit_delv_input_"+ID).val(); 


var knit_yarn_count=$("#knit_yarn_count_input_"+ID).val(); 
var knit_stitch_length=$("#knit_stitch_length_input_"+ID).val();
var knit_gray_gsm=$("#knit_gray_gsm_input_"+ID).val();    //add jahid


var knit_cmnt=$("#knit_cmnt_input_"+ID).val();
var knit_status=$("#knit_status_input_"+ID).val();    //add jahid
//var midle=$("#midle_input_"+ID).val();

var dataString = 'id='+ ID +'&knit_delv='+knit_delv +'&knit_cmnt='+knit_cmnt +'&knit_status='+knit_status +'&knit_yarn_count='+knit_yarn_count +'&knit_stitch_length='+knit_stitch_length +'&knit_gray_gsm='+knit_gray_gsm;
//$("#knit_delv_"+ID).html('<img src="load.gif" />');                 // Loading image

//if(knit_delv.length>0 || knit_cmnt.length>0 || knit_status.length>0)
//{
$.ajax({
type: "POST",
url: "home_knit_fabric_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#knit_delv_"+ID).html(knit_delv);

$("#knit_yarn_count_"+ID).html(knit_yarn_count);     
$("#knit_stitch_length_"+ID).html(knit_stitch_length); 
$("#knit_gray_gsm_"+ID).html(knit_gray_gsm);

$("#knit_cmnt_"+ID).html(knit_cmnt); 
$("#knit_status_"+ID).html(knit_status);     // add jahid
//$("#midle_"+ID).html(midle);
}
});
//}
//else
//{
	// alert('Enter something.');
//}

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
              <!--  for SD only-->
   
  <div class="span12">
<h2><u>VTL Knitting</u></h2>

<div width="80%"  style="margin-top:5px; ">


  <form action="home_knitting.php" method="POST">
  
  <table align="left" class="bottomBorder" id="gradient-style" style="width:1350px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td bgcolor="#FF99CC">Buyer</td>
    <td bgcolor="#FF99CC"><input name="search_buyer" value="<?php echo $search_buyer; ?>" type="text" placeholder="Buyer Name" /></td>
    <td>Style</td>
    <td><input name="search_style" value="<?php echo $search_style; ?>" type="text" placeholder="Style NO" /></td>
    <td bgcolor="#FF99CC">STO NO</td>
    <td bgcolor="#FF99CC"><input name="search_sto" value="<?php echo $search_sto; ?>" type="text" placeholder="STO NO" /></td>
    <td>Reference No</td>
    <td><input name="search_ref" value="<?php echo $search_ref; ?>" type="text" placeholder="Ref NO" /></td>
    <td bgcolor="#FF99CC">Fab Color</td>
    <td bgcolor="#FF99CC"><input name="search_fab_color" value="<?php echo $search_fab_color; ?>" type="text" placeholder="Fabric Color" /></td>
    <td rowspan="2">Knit Status<br /><select name="search_knit_status">
          <option value="" selected>Select Status</option>
          <option value="<?php echo $search_knit_status; ?>" selected><?php echo $search_knit_status; ?></option>
         					     <?php
   $SQLK="select knit_status from tb_fabric_booking WHERE knit_status != '' Group By knit_status order by knit_status ASC";
	$resultk = $obj->sql($SQLK);
	while($rowk = mysql_fetch_array($resultk))
		{ 
		$dis=$rowk['knit_status'];
		echo '<option value="'.$dis.'">'.$dis.'</option>';
		}
                            ?>
        </select></td>
    <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" />
    <!--&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
    </td>
    </tr>

    
  <tr align="center" style="font-weight:bold; font-size:11px">
    <td bgcolor="#CCFFCC">Concern DPD</td>
    <td bgcolor="#CCFFCC"><input name="search_dpd" type="text" value="<?php echo $search_dpd; ?>" placeholder="DPD Name" /></td>
    <td>STO Create Date From</td>
    <td><input name="search_mm_date1" value="<?php echo $search_mm_date1; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td bgcolor="#CCFFCC">STO Create Date TO</td>
    <td bgcolor="#CCFFCC" align="left"><input name="search_mm_date2" value="<?php echo $search_mm_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>Knit Delv Date From</td>
    <td align="left"><input name="search_knit_date1" value="<?php echo $search_knit_date1 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td bgcolor="#CCFFCC">Knit Delv Date TO</td>
    <td bgcolor="#CCFFCC" align="left"><input name="search_knit_date2" value="<?php echo $search_knit_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
  </table>
               
               <!--<table align="left" class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td>Search By </td>
    <td>
      <select name="select_logic" id="select_logic">
        <option value="a.dpd_date">Fabric Booking Create Date</option>
        <option value="b.fab_receive_planned_date">Fabric Receive Planned Date</option>
        <option value="b.sd_agreed_sample_delivery_date">Agreed Sample Delivery Date</option>
      </select></td>
            
<td>Date from</td>
<td>
<input name="date" class="rounded" type="text" id="date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    <td>Date To</td>
    <td><input name="date1" class="rounded" type="text" id="date1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>-->
    
    
    
  </form>
</div>
</div>

<!--<div><p>&nbsp;</p></div>-->
  <div class="span12">&nbsp;<br/></div>
  
  <!--<div class="span12">-->
      <h2>Fabric Booking Knitting Part</h2>
      <div class="divider"></div>
  
     <div id="demo">

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
   
           <form name="Form1" method="post">      

 <table cellpadding="0" cellspacing="0" border="1" id="example" style="width:3500px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">

<thead>

<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
<!--  <th>&nbsp;</th>-->


<th><strong>SL</strong></th>
<th>Buyer</th>
<th><strong>Style</strong></th>
<th bgcolor="#CCCCFF">Referrence</th>
<th><strong>Fabric Color</strong></th>
<th><strong>Fabrication</strong></th>
<th><strong>Composition</strong></th>
<th bgcolor="#88E4EC" style="color:#F00"><strong>GSM</strong></th>
<th bgcolor="#FFCC00">STO/PO</th>
<th bgcolor="#FF3300">Balance</th>
<th align="left" bgcolor="#CCCCFF">Knit Delv Qty&nbsp;&nbsp;</th>
<th align="left" bgcolor="#CCCCFF">Knit Status&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th align="left" bgcolor="#CCCCFF">Knit Comt&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th align="left" bgcolor="#CCCCFF">Yarn Count</th>
<th align="left" bgcolor="#CCCCFF">Stitch Length</th>
<th align="left" bgcolor="#CCCCFF">Gray GSM</th>
<th align="left" bgcolor="#CCCCFF">Knit Date&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th bgcolor="#FFCC00"><strong>Fab Wash</strong></th>
<th align="left" bgcolor="#FFCC00">MM Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th bgcolor="#3399FF">Dying Delv Qty</th>
<th bgcolor="#3399FF">Dying Comt</th>
<th bgcolor="#3399FF">Status</th>
<th bgcolor="#3399FF">Dying Date</th>
<th>Season</th>
<th>Combo</th>
<th>Attachment</th>
<th><strong>Color</strong></th>
<th><strong>Dia</strong></th>
<th><strong>Comments</strong></th>
<th><strong>Collar Des</strong></th>
<th><strong>Collar Size</strong></th>
<th><strong>Collar Color</strong></th>
<th><strong>Collar Qty</strong></th>
<th><strong>Cuff Des</strong></th>
<th><strong>Cuff Size</strong></th>
<th><strong>Cuff Color</strong></th>
<th><strong>Cuff Qty</strong></th>


<th>Create Date</th>
<th>Fab Rec. Planned Date</th>
<th>SD Agreed Delv. Date</th>
<th><strong>Color Code</strong></th>
<th><strong>Vendor</strong></th>
<th>Labdip</th>
<th><strong>Item Cat</strong></th>
<th><strong>Special Comt</strong></th>
<th><strong>Yearn</strong></th>
<th><strong>Req Qty(DPD)</strong></th>
<th>UOM</th>
<th bgcolor="#FF99CC">Store rec Qty</th>
<th bgcolor="#FF99CC">Store Status</th>
<th bgcolor="#FF99CC">Store Date</th>
<th width="6%"><strong>DPD Remarks</strong></th>

</tr>
<tr>
       <!-- <td><input type="hidden" name="" size="2" value="" class="search_init" /></td>-->
          <td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
          <td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
          <td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
          <td><input type="text" name="Referrence2" size="4" value="Referrence" class="search_init" /></td>
          <td><input type="text" name="Fab Color" size="5" value="Fab Color" class="search_init" /></td>
          <td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
          <td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
          <td><input type="text" name="GSM" size="4" value="GSM" class="search_init" /></td>
          <td><input type="text" name="STO/PO" size="4" value="STO/PO" class="search_init" /></td>
          <td><input type="text" name="Knit Balance" size="4" value="Knit Balance" class="search_init" /></td>
          <td><input type="text" name="Knit Delv Qty" size="15" value="Knit Delv Qty" class="search_init" /></td>
          <td><input type="text" name="Knit Status" size="8" value="Knit Status" class="search_init" /></td>
          <td><input type="text" name="Knit Cmnt" size="10" value="Knit Cmnt" class="search_init" /></td>
          <td><input type="text" name="Yarn Count" size="4" value="Yarn Count" class="search_init" /></td>
          <td><input type="text" name="Stitch Length" size="4" value="Stitch Length" class="search_init" /></td>
          <td><input type="text" name="Gray GSM" size="4" value="Gray GSM" class="search_init" /></td>
          
          <td><input type="text" name="Knit Date" size="10" value="Knit Date" class="search_init" /></td>
          <td><input type="text" name="Fab Wash" size="4" value="Fab Wash" class="search_init" /></td>
          <td><input type="text" name="MM Date" size="20" value="MM Date" class="search_init" /></td>
          
          <td><input type="text" name="Dying Delv Qty" size="8" value="Dying Delv Qty" class="search_init" /></td>
          <td><input type="text" name="Dying Cmnt" size="10" value="Dying Cmnt" class="search_init" /></td>
          <td><input type="text" name="Dying Status" size="4" value="Dying Status" class="search_init" /></td>
          <td><input type="text" name="Dying Date" size="20" value="Dying Date" class="search_init" /></td>

          <td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
          <td><input type="text" name="Combo" size="5" value="Combo" class="search_init" /></td>
          <td><input type="hidden" name="atachment" size="1" value="atachment" class="search_init" /></td>
          <td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
          <td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
          <td><input type="text" name="remarks" size="4" value="Comments" class="search_init" /></td>
          
          
          <td><input type="text" name="Colloar Des" size="4" value="Colloar Des" class="search_init" /></td>
          <td><input type="text" name="Colloar Size" size="4" value="Colloar Size" class="search_init" /></td>
          <td><input type="text" name="Colloar Color" size="4" value="Colloar Color" class="search_init" /></td>
          <td><input type="text" name="Colloar Qty" size="4" value="Colloar Qty" class="search_init" /></td>
          <td><input type="text" name="Cuff Des" size="4" value="Cuff Des" class="search_init" /></td>
          <td><input type="text" name="Cuff Size" size="4" value="Cuff Size" class="search_init" /></td>
          <td><input type="text" name="Cuff Color" size="4" value="Cuff Color" class="search_init" /></td>
          <td><input type="text" name="Cuff Qty" size="4" value="Cuff Qty" class="search_init" /></td>


          <td><input type="text" name="Create Date" size="6" value="Create Date" class="search_init" /></td>
          <td><input type="text" name="Fab Rec. Planned Date" size="4" value="Fab Rec. Planned Date" class="search_init" /></td>
          <td><input type="text" name="Sample Submit Date" size="4" value="Sample Submit Date" class="search_init" /></td>
          <td><input type="text" name="C Code" size="4" value="C Code" class="search_init" /></td>
          <td><input type="text" name="Vendor" size="4" value="Vendor" class="search_init" /></td>
          <td><input type="text" name="Labdip" size="4" value="Labdip" class="search_init" /></td>
          <td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
          <td><input type="text" name="Comt" size="4" value="Spcl Comt" class="search_init" /></td>
          <td><input type="text" name="Yearn" size="4" value="Yearn" class="search_init" /></td>
          <td><input type="text" name="Req Qty(DPD)" size="4" value="Req Qty(DPD)" class="search_init" /></td>
          <td><input type="text" name="UOM" size="4" value="UOM" class="search_init" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>


    </tr>

</thead>
 
<tbody>

<?php

//	$SQL="select * from tb_fabric_booking";    //table name
//	$results  = $obj->sql($SQL);

//, IFNULL(a.referrence_id, 0)

//$sql="select a.*,b.fab_receive_planned_date,b.customer, b.brand_style,b.sd_sample_type_name,b.sd_agreed_sample_delivery_date, b.sd_concern_dpd_name,a.sl as sll,a.color_code as c_code, b.sd_concern_dpd_name from tb_fabric_booking a LEFT JOIN tb_track_info b ON a.track_info_sl = b.sl WHERE a.sl != ''";    //table name


$sql = "select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date FROM tb_fabric_booking a LEFT JOIN tb_track_info b on b.sl = a.`track_info_sl` WHERE a.sl != ''";


if($search_sto != NULL)
{ $sql= $sql . " AND sto_po_no LIKE '%$search_sto%'" ; }
else
{ $sql= $sql . " AND sto_po_no LIKE '55%'" ; }

if($search_style != NULL)
{ $sql= $sql . " AND sample_style LIKE '%$search_style%'" ; }

if($search_ref != NULL)
{ $sql= $sql . " AND referrence_id LIKE '%$search_ref%'" ; }


if($search_buyer != NULL)
{ $sql= $sql . " AND buyer LIKE '%$search_buyer%'" ; }

if($search_fab_color != NULL)
{ $sql= $sql . " AND fab_color LIKE '%$search_fab_color%'" ; }

if($search_dpd != NULL)
{ $sql= $sql . " AND sd_concern_dpd_name LIKE '%$search_dpd%'" ; }

if($search_knit_status != NULL)
{ $sql= $sql . " AND knit_status LIKE '%$search_knit_status%'" ; }



if($search_mm_date1 != NULL && $search_mm_date2 == NULL)
{
$sql= $sql . " AND mm_date LIKE '$search_mm_date1'" ; 
}

if($search_mm_date1 == NULL && $search_mm_date2 != NULL)
{
$sql= $sql . " AND mm_date LIKE '$search_mm_date2'" ; 
}

if($search_mm_date1 != NULL && $search_mm_date2 != NULL)
{
$sql= $sql . " AND STR_TO_DATE( mm_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_mm_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_mm_date2',  '%d-%m-%Y')" ; 
}

if($search_knit_date1 != NULL && $search_knit_date2 == NULL)
{
$sql= $sql . " AND knit_date LIKE '$search_knit_date1'" ; 
}

if($search_knit_date1 == NULL && $search_knit_date2 != NULL)
{
$sql= $sql . " AND knit_date LIKE '$search_knit_date2'" ; 
}

if($search_knit_date1 != NULL && $search_knit_date2 != NULL)
{
$sql= $sql . " AND STR_TO_DATE( knit_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_knit_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_knit_date2',  '%d-%m-%Y')" ; 
}

// $sql= $sql . " AND a.sto_po_no LIKE '55%' AND a.del_status!='Complete' group by a.sl order by sll ASC " ;

//$sql= $sql." AND a.del_status!='Complete' AND a.cancel_status = 0 group by a.sl order by LENGTH(mm_date), mm_date ASC" ;

$sql= $sql . " AND a.knit_status NOT IN ('Complete', 'Cancelled') AND a.knit_comnt NOT LIKE '%cancel%' AND a.sto_po_no!='' group by a.sl order by sll, length(sll) ASC" ;

//die($sql);

$result = $obj->sql($sql);

//$result = get_data();
$sl=1 ;

while($row = mysql_fetch_array($result))
{   
  $bgc = '';
  $revise_status = $row['revise_status'];
  $cancel_status = $row['cancel_status'];
  if($cancel_status != 0) { $bgc = ' bgcolor="#FACFDB"';} if($revise_status != 0) { $bgc = ' bgcolor="#88E4EC"'; 	}

//if($sl%2=='0') { ?>
<?php // } //else if($knit_status ) { }?>  
  
<tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
        <td<?php echo $bgc; ?> title="<?php echo $row['sd_concern_mm_name'] ; ?>"><?php  if($cancel_status != 0) { ?>
          <a href="JavaScript:newPopup('archive_knitting.php?fab_sl=<?php echo $row['sl'] ; ?>');" title="Click to Remove from Work Space" style="color:#036"> <img src="images/Flag-red-icon.png"></a><?php } ?><?php echo $sl ; ?></td>
        <td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?> title="Customer"><?php echo $row['buyer'] ; ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?> title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
<td bgcolor="#CCCCFF"><?php echo $row['referrence_id']?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['fab_color'] ;  ?></td>
<td><?php echo $row['fabrication'] ;  ?></td>
<td><?php echo $row['composition'] ;  ?></td>
<td bgcolor="#88E4EC" style="color:#F00"><?php echo $row['gsm'] ;  ?></td>
<td bgcolor="#FFCC00"><?php echo $row['sto_po_no']; ?></td>
<td bgcolor="#FF3300" style="font-size:14px; color:#000; font-weight:bold; text-align:center"><?php echo trim($row['dpd_req_qty']-$row['knit_del_qty']) ; ?></td>
<td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_delv_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_del_qty']?></span>
  <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_delv_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_del_qty'] ; ?>" size="11" maxlength="15" /></td>
<td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_status_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_status']?></span>
  <select name="knit_status" class="editbox" id="knit_status_input_<?php echo $row['sll']; ?>">
    <!--<option value="">Select</option>-->
    <option value="Complete">Complete</option>
    <option value="Partial">Partial</option>
    <option value="<?php echo $row['knit_status'] ; ?>" selected="selected"><?php echo $row['knit_status'] ; ?></option>
  </select></td>
<td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_cmnt_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_comnt']?></span>
  <textarea name="knit_comnt" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_cmnt_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_comnt'] ; ?>"><?php echo $row['knit_comnt'] ; ?></textarea></td>
  
  
<td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_yarn_count_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_yarn_count']?></span>
  <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_yarn_count_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_yarn_count'] ; ?>" size="11" /></td>
  
  <td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_stitch_length_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_stitch_length']?></span>
  <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_stitch_length_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_stitch_length'] ; ?>" size="11" /></td>
  
  
  <td class="edit_td" bgcolor="#CCCCFF"><span onfocus="this.select()" id="knit_gray_gsm_<?php echo $row['sll']; ?>" class="text"><?php echo $row['knit_gray_gsm']?></span>
    <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="knit_gray_gsm_input_<?php echo $row['sll']; ?>" value="<?php echo $row['knit_gray_gsm'] ; ?>" size="11" /></td>
    
<td bgcolor="#CCCCFF"><?php echo $row['knit_date']?></td>
<td bgcolor="#88E4EC" style="color:#F00"><?php echo $row['fab_wash'] ;  ?></td>
<td bgcolor="#FFCC00"><?php echo $row['mm_date']?></td>
<td bgcolor="#3399FF"><?php echo $row['delv_qty']?></td>
<td bgcolor="#3399FF"><?php echo $row['remark_dy'];  ?></td>
<td bgcolor="#3399FF"><?php echo $row['del_status'] ;  ?></td>
<td bgcolor="#3399FF"><?php echo $row['dy_date'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['season'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['combo'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><a target="_blank" href="<?php echo $row['attachment'] ;  ?>"><?php echo $row['attachment'] ;  ?></a></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['color'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['dia'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['remarks'] ;  ?></td>

<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['collar_des'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['collar_size'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['collar_color'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['collar_qty'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['cuff_des'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['cuff_size'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['cuff_color'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['cuff_qty'] ;  ?></td>


<td bgcolor="#CCFFCC"><?php echo $row['dpd_date'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['fab_receive_planned_date'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['color_code'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['supplier'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['labdip'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['item_cat'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['comments'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['yarn_count'] ;  ?></td>

<td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['uom'] ;  ?></td>
<!--<td bgcolor="#3399FF"><?php // if($row['knit_comnt']!=NULL) { echo $row['knit_comnt'];  ?> 
<a href="JavaScript:newPopup1('home_knit_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030">
<strong>(+)</strong></a><?php // } else { ?>
<a href="JavaScript:newPopup1('home_knit_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030"><strong>Add+</strong></a><?php // }  ?></td>-->

<td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
<td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
<td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td> 
 
<td<?php if($revise_status != 0) { ?> bgcolor="#88E4EC" <?php } if($cancel_status != 0) { ?> style="color:#F00"<?php } ?>><?php echo $row['remark_dpd'] ;  ?></td>
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
   <!--</div>-->
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

</body>
</html>