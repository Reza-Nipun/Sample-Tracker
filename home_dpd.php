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
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		  $style=mysql_real_escape_string($_POST['style']);	
		  $color=mysql_real_escape_string($_POST['color']);
		  $season=mysql_real_escape_string($_POST['season']);	
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];		
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

table tr:hover td{ 
	background: #97FF2F;
	color: #000000; 
}
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script src="media/js/sorttable.js"></script>
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=350,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
			<form action="" method="post">
            

<table align="center" style="position:fixed ; margin-left:25px" class="bottomBorder" id="gradient-style" width="90%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
    
    <td width="8%">
      <select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Buyer--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' group by concern_name";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select></td>
      
    
    
    
    
    <td width="8%"> 
    <select name="brand_style" autofocus id="brand_style" style="font-size:11px">
          <option value="">--Select Brand--</option>
         					     <?php
         $SQL="select brand_style from tb_track_info group by brand_style";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['brand_style'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>
    </td>
      <!--<input type="text" name="brand_style" id="brand_style">-->
      
    
       
    
    <td width="8%"> 
      <input type="text" placeholder="Style No" name="style" id="style"></td>
      
      
      
      
      <td width="12%">

    <select name="season" autofocus id="season" style="font-size:11px">
          <option value="">--Select season--</option>
          <?php 
		  $SQL="select season from tb_track_info group by season"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['season'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
    
     <td width="12%">

       <select name="color" autofocus id="color" style="font-size:11px; width:90px">
         <option value="">--Select color--</option>
         <?php 
		  $SQL="select color from tb_track_info group by color"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['color'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
				}
				             
           ?>                     
         </select>
     </td>
     <td width="10%"><input name="date" class="rounded" type="text" id="date" value="" placeholder="(Create Date From)" tabindex="2" onclick="showCalendarControl(this);" /></td>
     <td width="10%"><input name="date1" class="rounded" type="text" id="date1" value="" placeholder="(Create Date To)" tabindex="2" onclick="showCalendarControl(this);" /></td>
     <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
    
    <td width="10%"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>


            
            </form>
</div>
			<div id="demo" style="margin-top:80px; ">

<form action="home_dpd_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable sorttable" id="example" style="width:5500px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th style="width:10px !important;">sl</th> <!--style="width: 200px !important; "-->
    <th> BUYER</th>
    <th> Brand</th>
    <th>Style</th>
    <th width="120px">Color</th>
    <th>Qty</th>
    <th>Create date</th>
    <th>Season</th>
    <th>Sample Type</th>
    <th>Fabric Type</th>
    <th>Print Type</th>
    <th>Wash Type</th>
    <th>Product Type</th>
    <th style="background-color:#F90">Concern Sample Coordinator (Name)</th>
    <th style="background-color:#F90">Meeting with SD, MM, DPD, Sample Fabric concern (Date)</th>
    <th style="background-color:#F90">Clarificaition of Missing Info Sending to SD (Date)</th>
    <th style="background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Request sent to LAB (Date)</th>
    <th style="background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Planned Rcvd  (Date)</th>
    <th style="background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Actual (Date)</th>
    <th>Fab receive planned date</th>
    <th style="background-color:#F90">Fabricbooking by dpd to mm (date)</th>
    <th>Fabric In-Fty Planned (Date) </th>
    <th>Fabric In-Fty Actual (Date)</th>
    <th style="background-color:#F90">Strikeoff Approval Planned sending (Date)</th>
    <th style="">Strikeoff Approval Actual sending (Date)</th>
    <th style="background-color:#F90"><span style="width:125px !important;">Strikeoff Approval Required (Date)</span></th>
    <th style="">Strikeoff Approval Received (Date)</th>
    <th>Trims In-Fty- Planned (Date) </th>
    <th style="">Trims In-Fty- Actual (Date) </th>
    <th style="">Print/Emb/applique Panel Rcv Planned (Date)</th>
    <th style="">Print/Emb/applique Panel Rcv Actual (Date)</th>
    <th style="">Sample Sewing Starts Planned (Date)</th>
    <th style="">Sample Sewing Starts Actual (Date)</th>
    <th style="">Sample Request Rcvd (Date)</th>  
    <th style="">Agreed Sample Delivery</th> 
    <th style="">Actual Sample Submission</th>
	<th style="">Concern SD</th>
	<th style="">Concern MM</th> 
	<th style="">Fabric Concern</th> 
    <th style="">Sweing operator</th> 
    <th style="">Pattern master </th> 
    <th style="">Cordinator Name</th> 
    <th style="">Quality ins Name</th> 
    <th style="">Sample Submission</th>
    <th style="">Fabric Booking By DPD to MM (Date) </th>
    <th style="">Actual Submission (Date)</th>
    <th style="">Remark DPD</th> 
    <th style="">Sample Reject/Pass</th> 
	</tr>
    	<tr>
		<td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /> </td>
		<td><input type="text" name="search_browser" value="BUYER" size="30" class="search_init" /></td>
		<td><input type="text" name="search_platform" value="Brand" size="8" class="search_init" /> </td>
		<td><input type="text" name="search_version" value="Style" class="search_init" /></td>
		<td><input type="text" name="search_grade" value="Color" size="10" class="search_init" /></td>
		<td><input name="Qty" type="text" class="search_init" id="Qty" value="Qty" size="10" /></td>
		<td><input name="Create date" type="text" class="search_init" id="Create date" value="Create date" size="10" /></td>
		<td><input name="Season" type="text" class="search_init" id="Season" value="Season" size="10" /></td>
		<td><input name="Sample Type" type="text" class="search_init" id="Sample Type" value="Sample Type" size="10" /></td>
		<td><input type="text" name="Fabric Type" value="Fabric Type" size="10" class="search_init" /></td>
		<td><input type="text" name="Print Type" value="Print Type" size="10" class="search_init" /></td>
		<td><input type="text" name="Wash Type" value="Wash Type" size="10" class="search_init" /></td>
		<td><input type="text" name="Product Type" value="Product Type" size="10" class="search_init" /></td>
		<td><input type="text" name="Concern Sample Coordinator (Name)" value="Concern Sample Coordinator (Name)" size="10" class="search_init" /></td>
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
	
	if($customer!=NULL OR $brand_style_search!=NULL OR $style!=NULL OR $season!=NULL OR $color!=NULL OR $date!=NULL)
{
	$sql="select * from tb_track_info WHERE sl!='' AND archive_dpd='0' AND sd_concern_dpd_name='$user_name'  AND (mm_fabricbooking_by_dpd_to_mm_date='' OR dpd_clarification_sending_to_sd_date='' OR sd_sample_reject_pass='')";
	if($customer!=NULL)
	 {
	$sql= $sql . " and customer='$customer'" ; 
	 }
	 if($brand_style_search!=NULL)
	 {
	$sql= $sql . " and brand_style='$brand_style_search'" ; 
	 }
	if($style!=NULL)
	 {
	$sql= $sql . " and style='$style'" ; 
	 }
	if($color!=NULL)
	 {
	$sql= $sql . " and color='$color' " ; 
	 }
	if($season!=NULL)
	 {
	$sql= $sql . " and season='$season' " ; 
	 }	 
	
	
//	STR_TO_DATE( sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y')
	
	
	
	if($date!=NULL)
	 {
	 $sql= $sql . " and create_date='$date'" ; 
	 }
	$sql= $sql . " order by sl DESC " ;
}
else
{
     //   $sql="select * from tb_track_info WHERE archive_dpd='0' AND sd_sample_reject_pass='' AND  sd_concern_dpd_name='$user_name' order by sl DESC"; 
	   
	  $sql="select * from tb_track_info WHERE archive_dpd='0' AND  sd_concern_dpd_name='$user_name'  AND (mm_fabricbooking_by_dpd_to_mm_date='' OR dpd_clarification_sending_to_sd_date='') order by sl DESC"; 
	  
	//  echo $sql ;
}
  $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	
	?>
    
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?><a href="JavaScript:newPopup('archive_dpd.php?sl_id=<?php echo $row['sl'] ; ?>');" title="Click to send archive" style="color:#036"> <img src="images/Flag-red-icon.png"></a></td>
			<td valign="middle"><label><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sl']; ?>"> &nbsp; <?php echo $row['customer'] ; ?></label></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['qty'] ; ?>
            <!--
            <a href="JavaScript:newPopup1('fabric_booking.php?S_ID=<?php // echo $row['style'] ; ?>&season=<?php // echo $row['season'] ; ?>');" style="color:#036">(+)</a>-->
             <a href="fabric_booking.php?S_ID=<?php echo $row['style'] ; ?>&season=<?php echo $row['season'] ; ?>&tsl=<?php echo $row['sl'] ; ?>" style="color:#036" target="_blank">(+)</a>
            </td>
			<td><?php echo $row['create_date'] ; ?></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['sd_sample_type_name'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
			<td><?php echo $row['dpd_meeting_sd_mm_dpd_sample_date'] ; ?></td>
			<td><?php echo $row['dpd_clarification_sending_to_sd_date'] ; ?></td>
			<td><?php echo $row['dpd_labdip_req_sent_to_lab_date'] ; ?></td>
			<td><?php echo $row['dpd_labdip_planned_rcvd_date'] ; ?></td>
			<td><?php echo $row['dpd_labdip_actual_date'] ; ?></td>
			<td><?php echo $row['fab_receive_planned_date'] ; // update new ?></td>
			<td><?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; // update new ?></td>
			<td><?php echo $row['dpd_fabric_planned_date'] ; // update new ?></td>
			<td><?php echo $row['dpd_fabric_actual_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_planned_sending_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_actual_sending_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_approval_required_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_approval_rcvd_date'] ; ?></td>
			<td><?php echo $row['dpd_trims_planned_date'] ; ?></td>
			<td><?php echo $row['mm_trims_actual_date'] ; ?></td>
			<td><?php echo $row['dpd_print_planned_date'] ;  //update new ?></td>
			<td><?php echo $row['sample_print_actual_date'] ; ?></td>
			<td><?php echo $row['dpd_sample_planned_date'] ; //update new ?></td>
			<td><?php echo $row['sample_sample_actual_date'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
			<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<td class="center"><?php echo $row['cmt_dpd'] ; ?></td>
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
            <td class="center"><?php echo $c1 ; ?></td>
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


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />

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