<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$search = 0;
	
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
	     /* $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];*/
		  
	$search_sto = trim($_POST['search_sto']);	
	$search_style = trim($_POST['search_style']);	
	$search_ref = trim($_POST['search_ref']);
	
	$search_buyer = trim($_POST['search_buyer']);
	$search_fab_color = trim($_POST['search_fab_color']);	
	$search_dpd = trim($_POST['search_dpd']);

	$search_mm_date1 = trim($_POST['search_mm_date1']);	
	$search_mm_date2 = trim($_POST['search_mm_date2']);
		
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
              <!--  for SD only-->
   
  <div class="span12">
<h2><u>VTL Dying</u></h2>

<div width="80%"  style="margin-top:5px; ">


  <form action="home_dying_all.php" method="POST">
  
  <table align="left" class="bottomBorder" id="gradient-style" style="width:1300px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td bgcolor="#FF99CC">Buyer</td>
    <td bgcolor="#FF99CC"><input name="search_buyer" type="text" placeholder="Buyer Name" /></td>
    <td>Style</td>
    <td><input name="search_style" type="text" placeholder="Style NO" /></td>
    <td bgcolor="#FF99CC">STO NO</td>
    <td bgcolor="#FF99CC"><input name="search_sto" type="text" placeholder="STO NO" /></td>
    <td>Reference No</td>
    <td><input name="search_ref" type="text" placeholder="Ref NO" /></td>
    <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr>

    
  <tr align="center" style="font-weight:bold; font-size:11px">
    <td bgcolor="#CCCCFF">Fab Color</td>
    <td bgcolor="#CCCCFF"><input name="search_fab_color" type="text" placeholder="Fabric Color" /></td>
    <td>Concern DPD</td>
    <td><input name="search_dpd" type="text" placeholder="DPD Name" /></td>
    <td bgcolor="#CCCCFF">STO Create Date From</td>
    <td bgcolor="#CCCCFF"><input name="search_mm_date1" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>STO Create Date TO</td>
    <td><input name="search_mm_date2" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
  </table>
  
  <!--<table align="left" class="bottomBorder" id="gradient-style" style="width:1340px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td>STO NO</td>
    <td><input name="search_sto" type="text" placeholder="STO NO" /></td>
    <td>Style</td>
    <td><input name="search_style" type="text" placeholder="Style NO" /></td>
    <td>Reference No</td>
    <td><input name="search_ref" type="text" placeholder="Ref NO" /></td>
    
    
    <td>MM STO Create Date From</td>
    <td><input name="search_mm_date1" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    
    <td>MM STO Create Date TO</td>
    <td><input name="search_mm_date2" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>-->
               
<!--               <table align="left" class="bottomBorder" id="gradient-style" width="1300px" border="1" cellspacing="0" cellpadding="0">
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
    </tr></table>
-->

</form>

</div>

</div>

<?php 
if ($search == 1)
{
?>

			<div id="demo" style="margin-top:20px; ">

<form action="home_dying_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:2500px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	  <th>&nbsp;</th>
  
  
    <th><strong>SL</strong></th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th><strong>Fab Clr.</strong></th>
    <th><strong>Fabrication</strong></th>
    <th><strong>Composition</strong></th>
    <th><strong>GSM</strong></th>
    <th><strong>Dia</strong></th>
    <th>Posting Date</th>
     <th>Fab Rec. Planned Date</th>
     <th>Sample Submit Date</th>
     <th bgcolor="#FFFFCC">STO Create Date</th>
    <th bgcolor="#FFFFCC">STO/PO</th>
    <th><strong>Color Code</strong></th>
    <th><strong>Item Cat</strong></th>
    <th><strong>Comt</strong></th>
    <th><strong>Yearn</strong></th>    
    <th bgcolor="#FFFFCC"><strong>Req Qty</strong></th>
    <th>UOM</th>
    <th bgcolor="#CCFFCC">Knit Delv Qty</th>
    <th bgcolor="#CCFFCC">Knit Comt</th>
    <th bgcolor="#CCFFCC">Knit Status</th>
    <th bgcolor="#CCFFCC">Knit Date</th>
    <th bgcolor="#CCCCFF">Referrence</th>    
    <th bgcolor="#CCCCFF">Delivary Qty</th>
    <th bgcolor="#CCCCFF">Dying Comt</th>
    <th bgcolor="#CCCCFF">Status</th>
        <th bgcolor="#FF99CC">Store rec Qty</th>
    <th bgcolor="#FF99CC">Store Status</th>
    <th bgcolor="#FF99CC">Store Date</th>
    
    <th><strong>DPD Comt</strong></th>

	</tr>
    
		<tr>
		  <td><input type="hidden" name="" size="2" value="" class="search_init" /></td>
			<td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
			<td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
			<td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
			<td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
			<td><input type="text" name="GMS" size="4" value="GMS" class="search_init" /></td>
			<td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
			<td><input type="text" name="Posting Date" size="4" value="Posting Date" class="search_init" /></td>
			<td><input type="text" name="Fab Rec. Planned Date" size="4" value="Fab Rec. Planned Date" class="search_init" /></td>
			<td><input type="text" name="Sample Submit Date" size="4" value="Sample Submit Date" class="search_init" /></td>
			<td><input type="text" name="STO Create Date" size="4" value="STO Create Date" class="search_init" /></td>
			<td><input type="text" name="STO/PO" size="4" value="STO/PO" class="search_init" /></td>
			<td><input type="text" name="C Code" size="4" value="C Code" class="search_init" /></td>
			<td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
			<td><input type="text" name="Comt" size="4" value="Comt" class="search_init" /></td>
			<td><input type="text" name="Yearn" size="4" value="Yearn" class="search_init" /></td>
            <td><input type="text" name="Req Qty" size="4" value="Req Qty" class="search_init" /></td>
			<td><input type="text" name="UOM" size="4" value="UOM" class="search_init" /></td>		
			<td><input type="text" name="Knit Delv Qty" size="4" value="Knit Delv Qty" class="search_init" /></td>
			<td><input type="text" name="Knit Comt" size="4" value="Knit Comt" class="search_init" /></td>
			<td><input type="text" name="Knit Status" size="4" value="Knit Status" class="search_init" /></td>
			<td><input type="text" name="Knit Date" size="4" value="Knit Date" class="search_init" /></td>
			<td><input type="text" name="Referrence" size="4" value="Referrence" class="search_init" /></td>
			<td><input type="text" name="Delivary Qty" size="4" value="Delivary Qty" class="search_init" /></td>
			<td><input type="text" name="Dying Comt" size="4" value="Dying Comt" class="search_init" /></td>
			<td><input type="text" name="Status" size="4" value="Status" class="search_init" /></td>
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
	

	$sql="select a.*,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date, b.sd_concern_dpd_name,a.sl as sll,a.color_code as c_code from tb_fabric_booking a LEFT JOIN tb_track_info b ON a.track_info_sl=b.sl WHERE a.sl != ''";    //table name
	
	
	if($search_sto != NULL)
	 { $sql= $sql . " AND a.sto_po_no LIKE '%$search_sto%'" ; }
	 else
	 { $sql= $sql . " AND a.sto_po_no!=''" ; }
	 
	 
	if($search_style != NULL)
	 { $sql= $sql . " AND a.sample_style LIKE '%$search_style%'" ; }
	 
	if($search_ref != NULL)
	 { $sql= $sql . " AND a.referrence_id LIKE '%$search_ref%'" ; }
	 
	
	if($search_buyer != NULL)
	 { $sql= $sql . " AND a.buyer LIKE '%$search_buyer%'" ; }
	 
	if($search_fab_color != NULL)
	 { $sql= $sql . " AND a.fab_color LIKE '%$search_fab_color%'" ; }
	 
	if($search_dpd != NULL)
	 { $sql= $sql . " AND b.sd_concern_dpd_name LIKE '%$search_dpd%'" ; }
	 

	 if($search_mm_date1 != NULL && $search_mm_date2 == NULL)
	 {
	$sql= $sql . " AND a.mm_date LIKE '$search_mm_date1'" ; 
	 }
	 
	 if($search_mm_date1 == NULL && $search_mm_date2 != NULL)
	 {
	$sql= $sql . " AND mm_date LIKE '$search_mm_date2'" ; 
	 }
	
	 if($search_mm_date1 != NULL && $search_mm_date2 != NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( mm_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_mm_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_mm_date2',  '%d-%m-%Y')" ; 
	 }
	 
	 
	 $sql= $sql . " AND a.del_status='Complete' group by a.sl order by sll ASC" ;
	 //die($sql);
	 
$result = $obj->sql($sql);

	
	//$result = get_data();
	$sl=1 ;

	
	while($row = mysql_fetch_array($result))
	{
	
	?>
    <tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
        
		  <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sll']; ?>"></td>
            
			  <td><?php echo $sl; ?></td>
    <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['fab_color'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ;  ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
    <td><?php echo $row['dpd_date'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['mm_date'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['sto_po_no'] ;  ?></td>
    <td><?php echo $row['color_code'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['yarn_count'] ;  ?></td>
    
    <td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td ><?php echo $row['uom'] ;  ?></td>
        <td bgcolor="#CCFFCC"><?php echo $row['knit_del_qty']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_comnt']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_status']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_date']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['referrence_id']?></td>
    
    
    <td bgcolor="#CCCCFF">
    <span onfocus="this.select()" id="first_<?php echo $row['sll']; ?>" class="text"><?php echo $row['delv_qty']?></span>
	</td>
       <td bgcolor="#CCCCFF">
       
   <?php if($row['remark_dy']!=NULL) { echo $row['remark_dy'];  ?> 
  <!-- <a href="JavaScript:newPopup1('home_dying_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030">
   <strong>(+)</strong></a>-->
   
   <?php } else { ?>

<!--<a href="JavaScript:newPopup1('home_dying_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030"><strong>Add+</strong></a>-->
<?php }  ?>
    </td>
       <td bgcolor="#CCCCFF"><?php echo $row['del_status'] ;  ?>
        <!--<a href="JavaScript:newPopup1('home_dying_cmt_update.php?SID=<?php // echo $row['sll'] ; ?>');" style="color:#030">
   <strong>(+)</strong></a>-->
       </td>
        <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td> 
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
<?php 
}
?>
        
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