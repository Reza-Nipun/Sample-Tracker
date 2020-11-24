<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
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
   
<div width="80%"  style="margin-top:10px; "></div>
			<div id="demo" style="margin-top:20px; ">

<form action="home_mm_update1.php" method="post" enctype="multipart/form-data">           
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width: 2200px !important; padding-bottom:10px; background-color:#FFF">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th style="width:10px !important;">sl</th> <!--style="width: 200px !important; "-->
    <th style="width:65px !important;"> Customer</th>
    <th style="width:65px !important;"> Brand/Dept.</th>
    <th style="width:40px !important;">Style</th>
    <th style="width:45px !important;">Color</th>
    <th style="width:75px !important;">Season</th>
    <th style="width:125px !important;">Fabric Type</th>
    <th style="width:120px !important;">Print Type</th>
    <th style="width:240px !important;">Wash Type</th>
    <th style="width:135px !important;">Product Type</th>
    <th style="width:170px !important;">Embroidery stitch</th>
    <th style="width:135px !important;">Sample Type </th>
    <th style="width:175px !important;">Sample Request Rcv Date</th>  
    <th style="width:125px !important;">Agreed Sample Delivery</th> 
    <th style="width:125px !important;">Actual Sample Submission</th>
	<th style="width:125px !important;">Concern SD</th> 
	<th style="width:125px !important;">Concern DPD</th> 
    <th style="width:125px !important;">Fabric Concern</th> 
    <th style="width:125px !important;">Sweing operator</th> 
    <th style="width:125px !important;">Pattern master </th> 
    <th style="width:125px !important;">Cordinator Name</th> 
    <th style="width:125px !important;">Quality ins Name</th> 
    <th style="width:125px !important;">Sample Submission</th>
    <th style="width:125px !important;"><span style="width:125px !important; ">Fab receive planned date</span></th>
    <th style="width:125px !important;"><span style="width:125px !important; ">Fab receive Actual date</span></th>
    <th style="width:125px !important;">Fabric Booking By DPD to MM (Date) </th>
    <th style="width:125px !important;">Trims In-Fty- Planned (Date) </th>
    <th style="width:125px !important;">Trims In-Fty- Actual (Date) </th>
    <th style="width:125px !important;">Actual Submission Date</th> 
    <th style="width:125px !important;">Sample Reject/Pass</th> 
	</tr>
	</thead>
	<tbody>
    
    <?php
		$sl=1;			
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
        $sql="select * from tb_track_info WHERE sl='$checkbox'"; 
  		$result = mysql_query($sql);
		$result=$obj->sql($sql);	
        while($row = mysql_fetch_array($result))
		{	
	?>
    
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?> </td>
			<td valign="middle"><label><input name="checkbox[]" type="hidden" id="checkbox[]" value="<?php echo $row['sl']; ?>" checked>&nbsp; </label><?php echo $row['customer'] ; ?></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['embroidery_stitch'] ; ?></td>
			<td><?php echo $row['sd_sample_type_name'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<td><?php echo $row['sd_concern_sd_name'] ; ?></td>
			<td><?php echo $row['sd_concern_dpd_name'] ; ?></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
			<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><?php echo $row['fab_receive_planned_date'] ; ?></td>
			<td>
		    <input name="fab_receive_actual_date[]" class="rounded" type="text" id="fab_receive_actual_date[]" value="<?php echo $row['fab_receive_actual_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="1" onClick="showCalendarControl(this);" /></td>
			<td>
            <?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?>
		    <input name="mm_fabricbooking_by_dpd_to_mm_date[]" class="rounded" type="hidden" id="mm_fabricbooking_by_dpd_to_mm_date[]" value="<?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="1" onclick="showCalendarControl(this);" /></td>
			<td><?php echo $row['dpd_trims_planned_date'] ; ?></td>
			<td><input name="mm_trims_actual_date[]" class="rounded" type="text" id="mm_trims_actual_date[]" value="<?php echo $row['mm_trims_actual_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" />
			</td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<?php if($row['sd_sample_reject_pass']=='pass') 
	         {
				 $c="#093" ;
				 $c1="Pass";
			 }
	elseif ($row['sd_sample_reject_pass']=='reject')
	         {
			   $c="#FF0000" ;
			   $c1="Reject";
			  }
			  else
			  {
				 $c='';
				 $c1='';
			  }
			  ?>
            <td class="center"><?php echo $c1 ; ?>  <input name="udate_mm[]" id="udate_mm[]" type="hidden" value="<?php echo $row['update_mm_id'] ; ?>,<?php echo $uid ; ?>"></td>
		</tr>
        
        <?php
		
		$sl++ ;
		  } 
		
}


		?>
        
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


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />


</form> 

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