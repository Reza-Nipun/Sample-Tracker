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
     	<script src="media/js/jquery-latest.js"></script>
		<script src="media/js/dragtable.js"></script>
		<script src="media/js/sorttable.js"></script>   
<script type="text/javascript">
			// Popup window code
			function newPopup(url) {
				popupWindow = window.open(
					url,'popUpWindow','height=280,width=480,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
			function newPopup1(url) {
				popupWindow = window.open(
					url,'popUpWindow','height=350,width=950,left=60,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
   
<div width="80%"  style="margin-top:10px; ">
</div>

<div class="span12">
                                <h2>Sample Tracker</h2>
                                <div class="divider"></div>
<!--               <form action="home_dpd_fabric.php" method="POST">
               
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
               
               </form>
               -->
                              
                                
                                
</div>

			<div id="demo" style="margin-top:20px; ">

  
    <form action="" method="post">     
<table cellpadding="0" width="100%" cellspacing="0" border="1" class="draggable" id="example" style="padding-bottom: 5px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>

    
    
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	 <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th>Brand</th>
    <th><strong>Style</strong></th>
    <th><strong>Color</strong></th>
    <th>Season</th>
    <th>Sample Type</th>
    <th>Aggreed Sample Delv Date</th>
    <th>Concern SD</th>
    <th>Concern DPD</th>
    <th>Create Date</th>
    <th>clarif. send</th>
    <th>Fabric booking</th>
    <th>Actual Sample Submission</th>
    <th><strong>Status</strong></th>
    <th>Comt DPD</th>
    <th><strong>Comt SD</strong></th>
    </tr>
    
		<tr>
		  <td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
			<td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
			<td><input type="text" name="Brand" size="5" value="Brand" class="search_init" /></td>
			<td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
			<td><input type="text" name="Color" size="5" value="Color" class="search_init" /></td>
			<td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
			<td><input type="text" name="Sample Type" size="5" value="Sample Type" class="search_init" /></td>
			<td><input type="text" name="Sample Delv Date" size="5" value="Sample Delv Date" class="search_init" /></td>
			<td><input type="text" name="Concern SD" size="5" value="Fab Clr." class="search_init" /></td>
			<td><input type="text" name="Create Date" size="6" value="Create Date" class="search_init" /></td>
			<td><input type="text" name="Vendor" size="6" value="Vendor" class="search_init" /></td>
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
	$date1='24-11-2013' ;
	$date2=date('d-m-Y');
	
	
	$si=1 ;
	
	$SQL="select buyer from tb_admin_assign where admin_sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($rowe = mysql_fetch_array($results))
	{
		$buyer=$rowe['buyer'];
	
	
	
	$sql="SELECT * FROM `tb_track_info` WHERE sd_sample_reject_pass = '' AND  customer= '$buyer' AND STR_TO_DATE(sd_agreed_sample_delivery_date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$date1', '%d-%m-%Y') AND STR_TO_DATE('$date2', '%d-%m-%Y') Order by sl DESC";
//	 $sql= $sql . " order by sll ASC " ;
$result = $obj->sql($sql);
		//$result = get_data();
	
while($row = mysql_fetch_array($result))
	{
	?>
    <tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
    	  <td title=""><?php echo $si ; ?></td>
			  <td  title=""><?php echo $row['customer'] ; ?></td>
			  <td><?php echo $row['brand_style'] ; ?></td>
    <td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td ><?php echo $row['color'] ;  ?></td>
    <td ><?php echo $row['season'] ;  ?></td>
    <td ><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td ><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
    <td><?php echo $row['create_date'] ;  ?></td>
    <td><?php echo $row['dpd_clarification_sending_to_sd_date'] ; ?></td>
    <td><?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?></td>
    <td><?php echo $row['sd_actual_sample_submission_date'] ;  ?></td>
    <td><?php echo $row['sd_sample_reject_pass'] ;  ?></td>
    <td><?php echo $row['cmt_dpd'] ;  ?></td>
    <td><?php echo $row['cmt_sd'] ;  ?></td>
    </tr>
        
        <?php $si++ ; } } ?>
        
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
    
</table><br>
&nbsp;
    </form>

<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->



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
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script> <!--        
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

<?php echo $row['season'] ;  ?>
</body>
</html>