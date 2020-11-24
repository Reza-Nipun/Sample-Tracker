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
	      $search_buyer=trim($_POST['search_buyer']);	
	      $search_style=trim($_POST['search_style']);	
	      $search_gmts_color=trim($_POST['search_gmts_color']);	
	      $search_fab_color=trim($_POST['search_fab_color']);
		  
	      $search_fabrication=trim($_POST['search_fabrication']);	
	      $search_dpd_date1=trim($_POST['search_dpd_date1']);	
	      $search_dpd_date2=trim($_POST['search_dpd_date2']);
		  
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

       <script type="text/javascript">/*
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();     //add jahid
//$("#midle_"+ID).hide();

$("#first_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();     //add jahid
//var midle=$("#midle_input_"+ID).val();

var dataString = 'id='+ ID +'&firstname='+first;
$("#first_"+ID).html('<img src="load.gif" />');                 // Loading image

if(first.length>0)
{
$.ajax({
type: "POST",
url: "home_dpd_fabric_comt_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);     // add jahid
//$("#midle_"+ID).html(midle);

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

});*/
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

	function exl_dwnld () {
		
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('demo');
		
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
		table_html= table_html.replace(/<img[^>]*>/gi,"");  // remove if u want images in your table
		table_html= table_html.replace(/<A[^>]*>|<\/A>/g, "");  //remove if u want links in your table
		table_html= table_html.replace(/<input[^>]*>|<\/input>/gi, "");  // reomves input params

        var url = data_type + ', ' + table_html;
		
		location.href=url
		return false

			/*var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false*/
	}

</script>
    
        
        
  <?php  require("re_head.php"); ?>
        
	</head>
        
  <?php require("info.php"); ?>

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
   
<div width="80%"  style="margin-top:10px; ">
</div>

<div class="span12">
<h2>Fabric Booking DPD Part</h2>

<div class="divider"></div>  
                                
<form action="home_dpd_fabric_exl_dwnld.php" method="POST">
  
  <table align="left" class="bottomBorder" id="gradient-style" style="width:1450px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td bgcolor="#CCFFCC">Buyer</td>
    <td bgcolor="#CCFFCC"><input name="search_buyer" value="<?php echo $search_buyer; ?>" type="text" placeholder="Buyer Name" /></td>
    <td>Style</td>
    <td><input name="search_style" value="<?php echo $search_style; ?>" type="text" placeholder="Style NO" /></td>
    <td bgcolor="#CCFFCC">Gmts Color</td>
    <td bgcolor="#CCFFCC"><input name="search_gmts_color" value="<?php echo $search_gmts_color; ?>" type="text" placeholder="GMTS Color" /></td>
    <td>Fab Color</td>
    <td><input name="search_fab_color" value="<?php echo $search_fab_color; ?>" type="text" placeholder="Fabric Color" /></td>
    <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" />
      <!--&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
    </td>
    </tr>

    
  <tr align="center" style="font-weight:bold; font-size:11px">
    <td bgcolor="#CCFFCC">Fabrication</td>
    <td bgcolor="#CCFFCC"><input name="search_fabrication" type="text" value="<?php echo $search_fabrication; ?>" placeholder="Fabrication" /></td>
    <td>Fabric Booking Date From</td>
    <td><input name="search_dpd_date1" value="<?php echo $search_dpd_date1; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td bgcolor="#CCFFCC">Fabric Booking Date To</td>
    <td bgcolor="#CCFFCC" align="left"><input name="search_dpd_date2" value="<?php echo $search_dpd_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    </tr>
  </table>
                                
</form> 
                      
</div>
                                
                                
                                
  <!--<form action="home_dpd_fabric_exl_dwnld.php" method="POST">
               
               <table align="left" class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
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
               
 </form>-->
                                

<?php if($search != '') { ?>

  <div class="span12">
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
   
	<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:3800px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	 <!--<th><label><span style="color:#000">
	  <input type="checkbox" tabindex="1" id="selecctall"/></span>
</label></th>-->
    <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th>Brand</th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th>Season</th>
    <th>Sample Type</th>
    <th>Sample Delv Date</th>
    <th>Gmts Color</th>
    <th><strong>Fabrication</strong></th>
    <th width="300px"><strong>Composition</strong></th>
    <th><strong>Fab Color.</strong></th>
    <th width="200px"><strong>C-Code</strong></th>
    <th>Fabric Wash</th>
    <th><strong>GSM</strong></th>
    <th><strong>Dia</strong></th>
    <th bgcolor="#FFFF99">Create Date</th>
    <th>Vendor</th>
    <th>Fab Required Date</th>
    <th><strong>Item Cat</strong></th>
    <th>Labdip Status</th>
    <th><strong>Comt</strong></th>
    <th><strong>Yarn Count</strong></th>
    
    <th><strong>Req Qty(DPD)</strong></th>
    <th>UOM</th>
    <th>Collar Des</th>
    <th>Size/Fabrication</th>
    <th>Collar Color</th>
    <th>Collar Qty</th>
    <th>Cuff Des</th>
    <th>Size/Fabrication</th>
    <th>Cuff Color</th>
    <th>Cuff Qty</th>
    <th>Combo</th>
        <th><strong>DPD Comt</strong></th>

	</tr>
    
		<!--<tr>
		  <td><input type="hidden" name="" size="2" value="" class="search_init" /></td>
			<td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
			<td><input type="text" name="Brand" size="5" value="Brand" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
			<td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
			<td><input type="text" name="Sample Type" size="5" value="Sample Type" class="search_init" /></td>
		<td><input type="text" name="Sample Delv Date" size="5" value="Sample Delv Date" class="search_init" /></td>
			<td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
			<td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
			<td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
			<td><input type="text" name="Clr Code" size="5" value="Clr Code" class="search_init" /></td>
			<td><input type="text" name="GMS" size="4" value="GMS" class="search_init" /></td>
			<td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
			<td><input type="text" name="Create Date" size="6" value="Create Date" class="search_init" /></td>
			<td><input type="text" name="Vendor" size="6" value="Vendor" class="search_init" /></td>
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
	  </tr>-->
    
	</thead>
	<tbody>
    
    <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results = $obj->sql($SQL);


	$sql="select a.*,a.sl as sll,b.sd_concern_dpd_name,b.brand_style,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date,b.sd_sample_type_name,b.customer,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sl=a.track_info_sl";    //table name
	
	if($search_buyer == '')
	{
	$sql=" AND a.sd_concern_dpd_name='$user_name'";    //table name
	}


	
	/*if($user_rule=='6')
	{
	$sql="select a.*,a.sl as sll,b.sd_concern_dpd_name,b.brand_style,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date,b.sd_sample_type_name,b.customer,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sl=a.track_info_sl";    //table name
	}*/	

	if($user_rule=='3')
	{
	$sql=" AND b.sd_concern_dpd_name='$user_name'";    //table name
	}
	
	if($date!=NULL)
	{
	$sql= $sql . " AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	}
	 
	 $sql= $sql . " order by sll ASC " ;
	
	// die($sql);
	
//	$obj->sql($sql);
$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;
while($row = mysql_fetch_array($result))
	{
	?>
  <tr>
    <!--<td>
<label><input name="checkbox[]" type="checkbox" class="checkbox1" id="checkbox[]" value="<?php // echo $row['sll']; ?>"></label>
    </td>-->
    <td title="<?php echo $row['sd_concern_mm_name'] ;  ?>"><?php echo $si ; ?></td>
    <td title=""><?php echo $row['customer'] ; ?></td>
    <td><?php echo $row['brand_style'] ; ?></td>
    <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['season'] ;  ?></td>
    <td><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ; ?></td>
    <td><?php echo $row['fab_color'] ; ?></td>
    <td><?php echo $row['c_code'] ; ?></td>
    <td><?php echo $row['fab_wash'] ; ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
    <td bgcolor="#FFFF99"><?php echo $row['dpd_date'] ;  ?></td>
    <td><?php echo $row['supplier'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['labdip'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['yarn_count'] ;  ?></td>
    <td><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['uom'] ;  ?></td>
    <td><?php echo $row['collar_des'] ;  ?></td>
    <td><?php echo $row['collar_size'] ;  ?></td>
    <td><?php echo $row['collar_color'] ; ?></td>
    <td><?php echo $row['collar_qty'] ; ?></td>
    <td><?php echo $row['cuff_des'] ; ?></td>
    <td><?php echo $row['cuff_size'] ; ?></td>
    <td><?php echo $row['cuff_color'] ; ?></td>
    <td><?php echo $row['cuff_qty'] ; ?></td>
    <td><?php echo $row['combo'] ; ?></td>
     <td bgcolor="#FFCC00"><?php echo $row['remark_dpd']?></td>
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
 <button class="btn btn-inverse" onClick="exl_dwnld()" style="cursor:pointer">Click to download as Excel</button>
	</div>
    
<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->

	</div>
   </div>
   
<?php } ?>
            
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
-->

<?php // echo $row['season'] ;  ?>
</body>
</html>