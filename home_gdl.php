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
		// $customer=$date=$_POST['customer'];
		  $customer=$_POST['customer'];
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];
		  $search = 1;	
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
$("#first_"+ID).hide();     //add jahid
$("#midle_"+ID).hide();
$("#comments_"+ID).hide();
$("#status_"+ID).hide();
$("#status_print_"+ID).hide();
$("#print_color_"+ID).hide();


$("#first_input_"+ID).show();    //add text box id
$("#midle_input_"+ID).show();
$("#comments_input_"+ID).show();
$("#status_input_"+ID).show();
$("#status_print_input_"+ID).show();
$("#print_color_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();     //add jahid
var midle=$("#midle_input_"+ID).val();
var comments=$("#comments_input_"+ID).val();
var status=$("#status_input_"+ID).val();
var status_print=$("#status_print_input_"+ID).val();
var print_color=$("#print_color_input_"+ID).val();


if (first != '')
{
var dataString = 'id='+ ID +'&firstname='+first;
//var dataString = 'id='+ ID +'&firstname='+first+'&midlename='+midle;
// var dataString_1 = 'id='+  ID +'&midlename='+midle;
}
if (midle != '')
{ var dataString = dataString +'&midlename='+midle; }

if (comments != '')
{ var dataString = dataString +'&comments='+comments; }

if (status != '')
{ var dataString = dataString +'&status='+status; }

if (status_print != '')
{ var dataString = dataString +'&status_print='+status_print; }

if (print_color != '')
{ var dataString = dataString +'&print_color='+print_color; }


// $("#first_"+ID).html('<img src="load.gif" />');                 // Loading image

if(first != '' || midle != '' || comments != '' || status != '' || status_print != '' || print_color != '')
{
$.ajax({
type: "POST",
url: "home_gdl_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);     // add jahid
$("#midle_"+ID).html(midle);
$("#comments_"+ID).html(comments);
$("#status_"+ID).html(status);
$("#status_print_"+ID).html(status_print);
$("#print_color_"+ID).html(print_color);
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
width:90px;
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
		url,'popUpWindow','height=400,width=390,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
                                <h2>SAMPLE TRACKER GDL Part</h2>
                                <div class="divider"></div>
<div width="80%"  style="margin-top:10px; ">


  <form action="home_gdl.php" method="POST">
               
               <table align="left" class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td><select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Buyer-</option>
         					     <?php
         $SQL4="select concern_name from tb_concern where concern_type like 'CUSTOMER' group by concern_name";
                            $obj->sql($SQL4);
                            while($row4 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row4['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select></td>
    <td>
      <select name="select_logic" id="select_logic">


        <option value="sd_agreed_sample_delivery_date">Agreed Sample Delivery Date</option>
      </select></td>
      
    <!--<input type="text" name="brand_style" id="brand_style">-->
      
<td>Date from</td>
<td>
<input name="date" class="rounded" type="text" id="date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>Date To</td>
    <td><input name="date1" class="rounded" type="text" id="date1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);"/></td>
    <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>
</form>

</div>
</div>
			<div id="demo" style="margin-top:20px; ">
<?php if($search== 1) { ?>
<form action="home_gdl_workspace_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:1800px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	<!--  <th>&nbsp;</th>-->
  
  
    <th><strong>SL</strong></th>
    <th style="width:70px">Buyer</th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th>Season</th>
    <th><strong>Qty</strong></th>
    <th><strong>Fabric type</strong></th>
    <th><strong>Print Type</strong></th>
    <th>Sample Type</th>
    <th>Embroidery</th>
    <th>Sample Submit Date</th>
    <th bgcolor="#CCCCFF">GDL Cut Panel Rcv</th>
    <th bgcolor="#CCCCFF">GDL Cut Panel Dlv</th>
    <th style="width:120px" bgcolor="#CCCCFF">GDL Comt</th>
    <th style="width:80px" bgcolor="#CCCCFF">GDL Status</th>
    <th style="width:80px" bgcolor="#CCCCFF">Print Type</th>
    <th bgcolor="#CCCCFF">GDL Print Color</th>
    <th bgcolor="#CCCCFF">Balance</th>
    <th>SD Comt</th>
    <th>DPD Comt</th>
    <th>MM Comt</th>
    <th>Sample</th>
    <th><strong>GDL Comt</strong></th>

	</tr>
 <tr>
		 <!-- <td><input type="hidden" name="" size="2" value="" class="search_init" /></td>-->
			<td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Buyer" size="5" style="width:50px" value="Buyer" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" style="width:40px" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="3" style="width:40px" value="Color" class="search_init" /></td>
			<td><input type="text" name="Season" size="5" style="width:40px" value="Season" class="search_init" /></td>
			<td><input type="text" name="Qty" size="5" value="Qty" class="search_init" /></td>
			<td><input type="text" name="Fabric type" size="6" value="Fabric type" class="search_init" /></td>
			<td><input type="text" name="Print" size="4" value="Print" class="search_init" /></td>
			<td><input type="text" name="Sample Type" size="6" value="Sample Type" class="search_init" /></td>
			<td><input type="text" name="Enbroidery" size="6" value="Enbroidery" class="search_init" /></td>
			<td><input type="text" name="Sample Submit Date" size="4" value="Sample Submit Date" class="search_init" /></td>
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
	
	
	$sql="SELECT * 
FROM `tb_track_info` WHERE sl!=''";    //table name
	
	if($customer!=NULL)
	{
		$sql= $sql . " AND customer like '$customer'" ;
	}
	
	if($date!=NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	 }
	 
	 $sql=$sql." AND sd_actual_sample_submission_date='' AND gdl_status !=  'Delivered'  AND print_type !=  'N/A' Limit 0 , 3000";
 	// $sql= $sql . " AND knit_status!='Complete' AND a.sto_po_no!='' group by a.sl  order by sll ASC " ;
	
//	die($sql) ;
	
//	$obj->sql($SQL);
$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;
	
	while($row = mysql_fetch_array($result))
	    {
	

	
	?>
    <tr id="<?php echo $row['sl'] ; ?>" class="edit_tr">
    		
            
			  <td bgcolor="" title="<?php echo $row['sd_concern_mm_name'] ;  ?>"><?php echo $si ; ?></td>
			  <td  title=""><label><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sl']; ?>">  <?php echo $row['customer'] ; ?></label></td>
    <td><?php echo $row['style'] ; ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['season'] ;  ?></td>
    <td><?php echo $row['qty'] ;  ?></td>
    <td><?php echo $row['fabric_type'] ;  ?></td>
    <td><?php echo $row['print_type'] ;  ?></td>
    <td><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td><?php echo $row['embroidery_stitch'] ;  ?></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td class="edit_td" bgcolor="#66FFFF">
<span onfocus="this.select()" id="first_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_cut_panel']?></span>
      <input type="number" class="editbox" onClick="this.select()" onfocus="this.select()" id="first_input_<?php echo $row['sl']; ?>" value="<?php echo $row['gdl_cut_panel'] ; ?>" style="width:50px" size="4" maxlength="4" /></td>
      
     
      <strong> <td class="edit_td" bgcolor="#66FFFF">
      <span onfocus="this.select()" id="midle_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_cut_panel_dlv']?></span>
      <input type="number" class="editbox" onClick="this.select()" onfocus="this.select()" id="midle_input_<?php echo $row['sl']; ?>" value="<?php echo $row['gdl_cut_panel_dlv'] ; ?>" style="width:50px"  size="4" maxlength="4" /></td></strong>
    
    
    
<!--<td bgcolor="#66FFFF"><?php // if($row['gdl_comnt']!=NULL) { echo $row['gdl_comnt'];  ?> 
<a href="JavaScript:newPopup1('home_knit_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030">
<strong>(+)</strong></a><?php // } else { ?>
<a href="JavaScript:newPopup1('home_gdl_cmt_update.php?SID=<?php // echo $row['sl'] ; ?>');" style="color:#030"><strong>Add+</strong></a><?php // }  ?></td>-->


	  <strong> <td class="edit_td" bgcolor="#66FFFF">
      <span onfocus="this.select()" id="comments_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_comnt']?></span>
      <textarea class="editbox" onClick="this.select()" onfocus="this.select()" id="comments_input_<?php echo $row['sl']; ?>" rows="3" cols="30" ><?php echo $row['gdl_comnt'] ; ?></textarea></td></strong>
      
      
<td class="edit_td" bgcolor="#66FFFF">
<span onfocus="this.select()" id="status_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_status']?></span>
<select class="editbox" onClick="this.select()" onfocus="this.select()" id="status_input_<?php echo $row['sl']; ?>">
<option>Select Status</option>
<option value="<?php echo $row['gdl_status'] ; ?>" selected="selected"><?php echo $row['gdl_status'] ; ?></option>
<option value="Delivered">Delivered</option>
<option value="Not Delivered">Not Delivered</option>
<option value="Partial">Partial</option>
</select></td>     



<td class="edit_td" bgcolor="#66FFFF">
<span onfocus="this.select()" id="status_print_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_print_type']?></span>
<select class="editbox" onClick="this.select()" onfocus="this.select()" id="status_print_input_<?php echo $row['sl']; ?>">
<option value="">Select Type</option>

 <option value="<?php echo $row['gdl_print_type'] ; ?>" selected><?php echo $row['gdl_print_type'] ; ?></option>
			  <?php
         $SQL8="select concern_name from tb_concern where concern_type like 'gdl_print' order by concern_name ASC";
                            $obj->sql($SQL8);
                            while($row8 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row8['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
		    </select></td>
<td class="edit_td" bgcolor="#66FFFF">
<span onfocus="this.select()" id="print_color_<?php echo $row['sl']; ?>" class="text"><?php echo $row['gdl_print_color']?></span>
<select class="editbox" onClick="this.select()" onfocus="this.select()" id="print_color_input_<?php echo $row['sl']; ?>">
<option value="">Select Color</option>

 <option value="<?php echo $row['gdl_print_color'] ; ?>" selected><?php echo $row['gdl_print_color'] ; ?></option>
 
			  <?php
			  
         for ( $i=1; $i<=20; $i++ ) { echo '<option value="'.$i.'">'.$i.'</option>'; }
		 		?>
		    </select></td>
<td bgcolor="#66FFFF"><?php echo ($row['gdl_cut_panel']-$row['gdl_cut_panel_dlv']) ; ?></td>     

    
    <td ><?php echo $row['cmt_sd'] ;  ?></td>
    <td ><?php echo $row['cmt_dpd'] ;  ?></td>
    <td ><?php echo $row['cmt_mm'] ;  ?></td>
    <td ><?php echo $row['cmt_sample'] ;  ?></td>
    <td ><?php echo $row['gdl_comnt'] ;  ?></td>
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

<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />

</form> 
<?php } ?>
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