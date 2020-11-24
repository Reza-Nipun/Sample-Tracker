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
		  /*$customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		  $style=mysql_real_escape_string($_POST['style']);	
		  $color=mysql_real_escape_string($_POST['color']);
		  $season=mysql_real_escape_string($_POST['season']);	
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];*/
		  
		  
	$search_sto = trim($_POST['search_sto']);	
	$search_style = trim($_POST['search_style']);	
	$search_ref = trim($_POST['search_ref']);
	
	$search_buyer = trim($_POST['search_buyer']);
	$search_fab_color = trim($_POST['search_fab_color']);	
	$search_dpd = trim($_POST['search_dpd']);

	$search_store_date1 = trim($_POST['search_store_date1']);	
	$search_store_date2 = trim($_POST['search_store_date2']);
		
		  
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
$("#use_qty_"+ID).hide();     //add jahid
//$("#midle_"+ID).hide();

$("#use_qty_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var first=$("#use_qty_input_"+ID).val();     //add jahid
var rec_qty=$("#rec_qty_"+ID).val();
var balance = rec_qty-first ;

var dataString = 'id='+ ID +'&firstname='+first;
$("#use_qty_"+ID).html('<img src="load.gif" />');                 // Loading image

if(first.length>0)
{
$.ajax({
type: "POST",
url: "home_store_use_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#use_qty_"+ID).html(first);     // add jahid
$("#store_balance_"+ID).html(balance);

}
});
}
else
{
alert('Enter something.');
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
   
<!--<div align="center">
<h1 style="color:#030; font-weight:bolder;"><u>VTG Store</u></h1>
</div>
-->			
            
   
<div class="span12" style="padding-top:10px">
<h2><u>VTG Store</u></h2>
<div width="80%"  style="margin-top:5px; ">
  <form name="Form1" id="Form1" action="home_store_all.php" method="POST">
  
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
    <td bgcolor="#CCCCFF">Receive Date From</td>
    <td bgcolor="#CCCCFF"><input name="search_store_date1" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>Receive Date TO</td>
    <td><input name="search_store_date2" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
  </table>

  </form>
</div>
</div>



            
            
<div class="span12">


<?php 
if ($search == 1)
{
?>
    <div id="demo" style="margin-top:30px;">
    
    <form name="Form2" id="Form2" action="home_store_update.php" method="post">    
           
    <table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:1800px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
        
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
        <th>Posting Date (DPD)</th>
        <th>STO/PO(MM)</th>
        <th><strong>C Code</strong></th>
        <th><strong>Item Cat</strong></th>
        <th><strong>Comt</strong></th>
        <th><strong>Yearn</strong></th>
        
        <th><strong>DPD Req Qty</strong></th>
        <th>DY Delv. Qty</th>
        <th bgcolor="#CCCCFF">Store Recv. Qty</th>
        <th bgcolor="#FFCC00">Store Use Qty</th>
        <th style="color:#060; font-size:15px"><strong>Balance Qty</strong></th>
        <th>UOM</th>
        <th>Comment</th>
        <th>Dying Comt</th>
        <th>Status</th>
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
                <td><input type="text" name="STO/PO" size="4" value="STO/PO" class="search_init" /></td>
                <td><input type="text" name="C Code" size="4" value="C Code" class="search_init" /></td>
              <td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
                <td><input type="text" name="Comt" size="4" value="Comt" class="search_init" /></td>
                <td><input type="text" name="Yearn" size="4" value="Yearn" class="search_init" /></td>
                <td><input type="text" name="Req Qty" size="4" value="Req Qty" class="search_init" /></td>
                <td><input type="text" name="Delv. Qty" size="4" value="Delv. Qty" class="search_init" /></td>
                <td><input type="text" name="Recv. Qty" size="4" value="Recv. Qty" class="search_init" /></td>
                <td><input type="text" name="Use Qty" size="4" value="Use Qty" class="search_init" /></td>
                <td><input type="text" name="Balance Qty" size="4" value="Balance Qty" class="search_init" /></td>
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
        
        
    
        /*$SQL="select * from tb_fabric_booking WHERE store_rec_qty!='' OR store_status like '%done%' ORDER by SL DESC";    //table name
	    //$obj->sql($SQL);  AND store_rec_qty < delv_qty AND store_status NOT like '%ok%'
   		$result = $obj->sql($SQL);*/
		
		
		
		
		
		
		
		
    
        $sql="select a.*,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date, b.sd_concern_dpd_name,a.sl as sll,a.color_code as c_code from tb_fabric_booking a LEFT JOIN tb_track_info b ON a.track_info_sl=b.sl WHERE a.store_rec_qty != ''";    //table name
        
        
        if($search_sto != NULL)
         { $sql= $sql . " AND a.sto_po_no LIKE '%$search_sto%'" ; }
         
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
         
    
         if($search_store_date1 != NULL && $search_store_date2 == NULL)
         {
        $sql= $sql . " AND a.store_date LIKE '$search_store_date1'" ; 
         }
         
         if($search_store_date1 == NULL && $search_store_date2 != NULL)
         {
        $sql= $sql . " AND a.store_date LIKE '$search_store_date2'" ; 
         }
        
         if($search_store_date1 != NULL && $search_store_date2 != NULL)
         {
        $sql= $sql . " AND STR_TO_DATE( a.store_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_store_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_store_date2',  '%d-%m-%Y')" ; 
         }
         
         
         $sql= $sql . " AND store_rec_qty >= delv_qty OR store_status like '%done%' ORDER by SL DESC " ;
         
		 
		 //die($sql);
         
    $result = $obj->sql($sql);
		
		
		
        
        //$result = get_data();
        $sl=1 ;
    
        
        while($row = mysql_fetch_array($result))
        {
        
        ?>
        <tr id="<?php echo $row['sl'] ; ?>" class="edit_tr">
            
              <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sl']; ?>"></td>
                
        <td><?php echo $sl; ?></td>
        <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
        <td ><?php echo $row['color'] ;  ?></td>
        <td ><?php echo $row['fab_color'] ;  ?></td>
        <td ><?php echo $row['fabrication'] ;  ?></td>
        <td ><?php echo $row['composition'] ;  ?></td>
        <td ><?php echo $row['gsm'] ;  ?></td>
        <td ><?php echo $row['dia'] ;  ?></td>
        <td ><?php echo $row['dpd_date'] ;  ?></td>
        <td title="posting Date-<?php echo $row['mm_date'] ;  ?>"><?php echo $row['sto_po_no'] ;  ?></td>
        <td ><?php echo $row['color_code'] ;  ?></td>
        <td ><?php echo $row['item_cat'] ;  ?></td>
        <td ><?php echo $row['comments'] ;  ?></td>
        <td ><?php echo $row['yarn_count'] ;  ?></td>
        
        <td  bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
        <td><?php echo $row['delv_qty']?></td>
        <td class="edit_td" bgcolor="#CCCCFF"><?php echo $row['store_rec_qty']; ?></td>
        <td class="edit_td" bgcolor="#FFCC00"><span onfocus="this.select()" id="use_qty_<?php echo $row['sl']; ?>" class="text"><?php echo $row['store_use_qty']; ?></span>
          <input type="text" class="editbox" onClick="this.select()" onfocus="this.select()" id="use_qty_input_<?php echo $row['sl']; ?>" value="<?php echo $row['store_use_qty']; ?>" size="4" maxlength="4" />
          <input type="hidden" id="rec_qty_<?php echo $row['sl']; ?>" value="<?php echo $row['store_rec_qty']; ?>" />
        </td>
        <td style="color:#060; font-size:15px; text-align:center"><strong><span id="store_balance_<?php echo $row['sl']; ?>"><?php echo $row['store_rec_qty']-$row['store_use_qty']; ?></span></strong></td>
        <td><?php echo $row['uom'] ;  ?></td>
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
            
        </tbody>
        
    </table>
    
    
    <br>
    
    
    <!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
          &nbsp;
          <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
    
    </form> 
    
    </div>
    
<?php } ?>  
  
</div>    
    
</body>



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