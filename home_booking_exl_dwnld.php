<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$search = 0;
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");  // Additional then home_mm.php
	
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
		
				$search_sto = trim($_POST['search_sto']);	
				$search_style = trim($_POST['search_style']);	
				$search_ref = trim($_POST['search_ref']);
				
				$search_buyer = trim($_POST['search_buyer']);
				$search_fab_color = trim($_POST['search_fab_color']);	
				$search_dpd = trim($_POST['search_dpd']);
			
				$search_mm_date1 = trim($_POST['search_mm_date1']);	
				$search_mm_date2 = trim($_POST['search_mm_date2']);
				
				$search_dpd_date1 = trim($_POST['search_dpd_date1']);	
				$search_dpd_date2 = trim($_POST['search_dpd_date2']);	
				
				$search = 1;
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
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        
       <script type="text/javascript" src="js/jquery.js"></script> 
       <script type="text/javascript" src="js/jquery.form.js"></script> 
       


        
  <!--<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>-->




	<script type="text/javascript">
	$(function(){
		
//$("input:button[name=dwnldexl]").click(function() {
		
		$('#exl_button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
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

   <!--<div class="span12">-->
     <h2>Fabric Booking Excel Download</h2>
       <!--<div class="divider"></div>-->
            <!---->
 
 <div width="80%" style="margin-top:10px; ">           

    <form action="home_booking_exl_dwnld.php" method="POST">
  
  		<table align="left" class="bottomBorder" id="gradient-style" style="width:1350px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td bgcolor="#FF99CC">Buyer</td>
    <td bgcolor="#FF99CC"><input name="search_buyer" value="<?php echo $search_buyer; ?>" type="text" placeholder="Buyer Name" /></td>
    <td>Style</td>
    <td><input name="search_style" value="<?php echo $search_style; ?>" type="text" placeholder="Style NO" /></td>
    <td bgcolor="#FF99CC">STO NO</td>
    <td bgcolor="#FF99CC"><input name="search_sto" value="<?php echo $search_sto; ?>" type="text" placeholder="STO NO" /></td>
    <td>Job No</td>
    <td><input name="search_ref" value="<?php echo $search_ref; ?>" type="text" placeholder="Job NO" /></td>
    <td bgcolor="#FF99CC">Fab Color</td>
    <td bgcolor="#FF99CC"><input name="search_fab_color" value="<?php echo $search_fab_color; ?>" type="text" placeholder="Fabric Color" /></td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" />
    <!--&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
    </td>
    </tr>

    
  <tr align="center" style="font-weight:bold; font-size:11px">
    <td bgcolor="#CCFFCC">Concern DPD</td>
    <td bgcolor="#CCFFCC"><input name="search_dpd" type="text" value="<?php echo $search_dpd; ?>" placeholder="DPD Name" /></td>
    <td>Fabric Booking Date From</td>
    <td align="left"><input name="search_dpd_date1" value="<?php echo $search_dpd_date1 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td bgcolor="#CCFFCC">Fabric Booking Date To</td>
    <td bgcolor="#CCFFCC" align="left"><input name="search_dpd_date2" value="<?php echo $search_dpd_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>STO Create Date From</td>
    <td><input name="search_mm_date1" value="<?php echo $search_mm_date1; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td bgcolor="#CCFFCC">STO Create Date TO</td>
    <td bgcolor="#CCFFCC" align="left"><input name="search_mm_date2" value="<?php echo $search_mm_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
  </table>
    
    </form>
    
</div>

<br />

<!--</div>-->
<?php 
if ($search == 1)
{
?>
			<div id="demo" style="margin-top:80px; ">
  
   
<form id="exl_from">   
 
 
 
<div id="tableWrap" style="margin-top:10px; "> 
<table cellpadding="0" cellspacing="0" border="1" class="draggable bottomBorder" style="width:4090px !important;">
	
    <!-- padding-bottom: 10px; background-color: #FFF; color:#000;   class="display"  forget-ordering    -->
    
    <thead>
    
<tr bgcolor="#DDDDDD" align="center" style="font-family:'MS Serif', 'New York', serif">
  
    <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th>Season</th>
    <th>Combo</th>
    <th><strong>Req Qty(DPD)</strong></th>
    <th>UOM</th>
    <th bgcolor="#FFCC00">Job No</th>
    <th>Sample Type Name</th>
    <th><strong>Item Cat</strong></th>
    <th><strong>Fabrication</strong></th>
    <th><strong>Composition</strong></th>
    <th><strong>Fab Color</strong></th>
    <th width="5%"><strong>Color Code</strong></th>
    <th><strong>Remarks</strong></th>
    <th><strong>GSM</strong></th>
    <th><strong>Fab Wash</strong></th>
    <th>Labdip</th>
    <th><strong>Dia</strong></th>
    <th><strong>Yearn</strong></th>
    <th><strong>Comt</strong></th>
    
    <th><strong>Collar Des</strong></th>
    <th><strong>Collar Size</strong></th>
    <th><strong>Collar Color</strong></th>
    <th><strong>Collar Qty</strong></th>
    <th><strong>Cuff Des</strong></th>
    <th><strong>Cuff Size</strong></th>
    <th><strong>Cuff Color</strong></th>
    <th><strong>Cuff Qty</strong></th>
    <th>Create Date</th>
    <th>Attachment</th>
    <th bgcolor="#93FFDC">STO/PO</th>
    <th bgcolor="#93FFDC">MM Date</th>
    <th>MM</th>
    <th>Vendor</th>
    <th>Fab Rec. Planned Date</th>
    <th>Sample Submit Date</th>
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
    <th width="100px"><strong>DPD Comt</strong></th>

	</tr>
	</thead>
	<tbody>
    
    <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results = $obj->sql($SQL);
	
	

//	$SQL="select *,a.sl as sll,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sd_concern_mm_name='$user_name' AND a.sample_style=b.style AND b.color=a.color";    //table name
	
		$sql="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date,b.sd_sample_type_name from tb_fabric_booking a LEFT JOIN tb_track_info b ON a.track_info_sl = b.sl WHERE a.sl != ''";    //table name
	
	
	if($search_sto != NULL)
	 { $sql= $sql . " AND sto_po_no LIKE '%$search_sto%'" ; }
	 	 
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
	 
	if($search_dpd_date1 != NULL && $search_dpd_date2 == NULL)
	 {
	$sql= $sql . " AND dpd_date LIKE '$search_dpd_date1'" ; 
	 }
	 
	 if($search_dpd_date1 == NULL && $search_dpd_date2 != NULL)
	 {
	$sql= $sql . " AND dpd_date LIKE '$search_dpd_date2'" ; 
	 }
	
	 if($search_dpd_date1 != NULL && $search_dpd_date2 != NULL)
	 {
	$sql= $sql . " AND STR_TO_DATE( dpd_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_dpd_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_dpd_date2',  '%d-%m-%Y')" ; 
	 }
	 
	// $sql= $sql . " AND a.sto_po_no LIKE '55%' AND a.del_status!='Complete' group by a.sl order by sll ASC " ;
	
//$sql= $sql." AND a.del_status!='Complete' AND a.cancel_status = 0 group by a.sl order by LENGTH(mm_date), mm_date ASC" ;
	
	 $sql= $sql . " AND a.sto_po_no!='' group by a.sl  order by sll DESC" ;
	 
	 //die($sql);
	
	/*$sql="select a.*,a.sl as sll,a.sample_style,a.color_code as c_code,b.sd_concern_mm_name,b.customer,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date from tb_fabric_booking a,tb_track_info b WHERE a.sample_style=b.style AND b.color=a.color ";    //table name
	
	//b.sd_concern_mm_name='$user_name' AND
	
	if($date!=NULL)
	 {
	$sql= $sql . "AND STR_TO_DATE( $select_logic,  '%d-%m-%Y' ) between STR_TO_DATE( '$date',  '%d-%m-%Y' ) and STR_TO_DATE( '$date1',  '%d-%m-%Y')" ; 
	 }
	 
	 $sql= $sql . "AND a.sto_po_no!='' group by a.sl  order by sll DESC" ;*/

	$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;

	
	while($row = mysql_fetch_array($result))
	{
	
	?>
    <tr>
<td title="<?php echo $row['sd_concern_mm_name'] ;  ?>"><?php echo $si ; ?></td>
<td  title=""><?php echo $row['buyer'] ; ?></td>
    <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td ><?php echo $row['color'] ;  ?></td>
    <td ><?php echo $row['season'] ;  ?></td>
    <td><?php echo $row['combo'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['uom'] ;  ?></td>
    <td bgcolor="#FFCC00"><?php echo $row['referrence_id']?></td>
    <td><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td><?php echo $row['item_cat'] ;  ?></td>
    <td><?php echo $row['fabrication'] ;  ?></td>
    <td><?php echo $row['composition'] ;  ?></td>
    <td ><?php echo $row['fab_color'] ;  ?></td>
    <td><?php echo $row['c_code'] ;  ?></td>
    <td><?php echo $row['remarks'] ;  ?></td>
    <td><?php echo $row['gsm'] ;  ?></td>
    <td><?php echo $row['f_wash'] ;  ?></td>
    <td><?php echo $row['labdip'] ;  ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
    <td><?php echo $row['yarn_count'] ;  ?></td>
    <td><?php echo $row['comments'] ;  ?></td>
    <td><?php echo $row['collar_des'] ;  ?></td>
    <td><?php echo $row['collar_size'] ;  ?></td>
    <td><?php echo $row['collar_color'] ;  ?></td>
    <td><?php echo $row['collar_qty'] ;  ?></td>
    <td><?php echo $row['cuff_des'] ;  ?></td>
    <td><?php echo $row['cuff_size'] ;  ?></td>
    <td><?php echo $row['cuff_color'] ;  ?></td>
    <td><?php echo $row['cuff_qty'] ;  ?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['dpd_date'] ;  ?></td>
    <td><a target="_blank" href="<?php echo $row['attachment'] ;  ?>"><?php echo $row['attachment'] ;  ?></a></td>
    <td class="edit_td" bgcolor="#93FFDC"><?php echo $row['sto_po_no']?></td>
    <td bgcolor="#93FFDC"><?php echo $row['mm_date']?></td>
    <td><?php echo $row['mm_id'] ;  ?></td>
    <td><?php echo $row['supplier'] ;  ?></td>
    <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
    <td><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['knit_del_qty']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['knit_comnt']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['knit_status']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['knit_date']?></td>
    <td bgcolor="#3399FF"><?php echo $row['delv_qty']?></td>
    <td bgcolor="#3399FF"><?php  echo $row['remark_dy'];  ?></td>
    <td bgcolor="#3399FF"><?php echo $row['del_status'] ;  ?></td>
    <td bgcolor="#3399FF"><?php echo $row['dy_date'] ;  ?></td>
 <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
 <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td> 
    
    <td><?php echo $row['remark_dpd'] ;  ?></td>
	</tr>
    <?php $si++ ; } ?>

	</tbody>
    
</table>
</div>


<br>

      <!--<div align="center">
          <input class="btn btn-success" id="exl_button" value="Excel Download »" />
          &nbsp;
          <input name="input" type="reset" class="btn btn-danger" value="Reset" />
      </div>-->
      
      
      
 <div align="center">
   <button id="exl_button" class="link-style2" style="cursor:pointer">Click to download as Excel</button>  
 </div>



      
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
    
<!--<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>-->
			<!--<script type="text/javascript" charset="utf-8">
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