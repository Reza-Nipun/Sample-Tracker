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
	
	
	
	$row=1;
	foreach($_POST['checkbox'] as $rowz=>$checkbox)
	{
	$checkbox=$checkbox;	
	$dpd_concern_sample_coordinator_name = $_POST['dpd_concern_sample_coordinator_name'][$rowz] ;
	$dpd_meeting_sd_mm_dpd_sample_date = $_POST['dpd_meeting_sd_mm_dpd_sample_date'][$rowz] ;
	$dpd_clarification_sending_to_sd_date= $_POST['dpd_clarification_sending_to_sd_date'][$rowz] ;
	$dpd_labdip_req_sent_to_lab_date = $_POST['dpd_labdip_req_sent_to_lab_date'][$rowz] ;
	$dpd_labdip_planned_rcvd_date = $_POST['dpd_labdip_planned_rcvd_date'][$rowz] ;
	$dpd_labdip_actual_date = $_POST['dpd_labdip_actual_date'][$rowz] ;
	$dpd_fabric_actual_date = $_POST['dpd_fabric_actual_date'][$rowz] ;
	$dpd_strikeoff_planned_sending_date = $_POST['dpd_strikeoff_planned_sending_date'][$rowz] ;
	$dpd_strikeoff_approval_required_date = $_POST['dpd_strikeoff_approval_required_date'][$rowz] ;
	$dpd_trims_planned_date = $_POST['dpd_trims_planned_date'][$rowz] ;	
	$dpd_sample_planned_date=$_POST['dpd_sample_planned_date'] [$rowz];	
	$sd_actual_sample_submission_date=$_POST['sd_actual_sample_submission_date'][$rowz] ;	
	$fab_receive_planned_date=$_POST['fab_receive_planned_date'][$rowz] ;
	$mm_fabricbooking_by_dpd_to_mm_date=$_POST['mm_fabricbooking_by_dpd_to_mm_date'][$rowz] ;
	$dpd_fabric_planned_date=$_POST['dpd_fabric_planned_date'][$rowz] ;
	$dpd_fabric_actual_date=$_POST['dpd_fabric_actual_date'][$rowz] ;
	$sd_sample_reject_pass = $_POST['sd_sample_reject_pass'][$rowz] ;	
	$cmt_dpd=mysql_real_escape_string($_POST['cmt_dpd'][$rowz]);
	$update_dpd= $_POST['udate_dpd'][$rowz];

	$SQL="UPDATE `tb_track_info` SET  dpd_concern_sample_coordinator_name= '$dpd_concern_sample_coordinator_name',
	dpd_meeting_sd_mm_dpd_sample_date = '$dpd_meeting_sd_mm_dpd_sample_date',
	dpd_clarification_sending_to_sd_date='$dpd_clarification_sending_to_sd_date' ,
	dpd_labdip_req_sent_to_lab_date = '$dpd_labdip_req_sent_to_lab_date',
	dpd_labdip_planned_rcvd_date='$dpd_labdip_planned_rcvd_date',
	dpd_labdip_actual_date='$dpd_labdip_actual_date',
	dpd_fabric_actual_date='$dpd_fabric_actual_date',
	dpd_strikeoff_planned_sending_date='$dpd_strikeoff_planned_sending_date',
	dpd_strikeoff_approval_required_date='$dpd_strikeoff_approval_required_date',
	dpd_trims_planned_date='$dpd_trims_planned_date',
	fab_receive_planned_date='$fab_receive_planned_date',
	dpd_sample_planned_date='$dpd_sample_planned_date',
	sd_actual_sample_submission_date='$sd_actual_sample_submission_date',
	mm_fabricbooking_by_dpd_to_mm_date='$mm_fabricbooking_by_dpd_to_mm_date',
	dpd_fabric_planned_date='$dpd_fabric_planned_date',
	sd_sample_reject_pass='$sd_sample_reject_pass',
	cmt_dpd='$cmt_dpd',
	update_dpd_id='$update_dpd'
	WHERE  `tb_track_info`.`sl` ='$checkbox' ";
	
//	die ($SQL) ;
	$obj->sql($SQL);
	
	$a="<font color='green'> Sample Style  Update Successfully .</font>" ;
	$row++ ;
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
		<div width="80%"  style="margin-top:10px; " align="center">
			<h3><?php echo $a ; ?></h3>
		</div>
		<div id="demo" style="margin-top:20px; ">
			<form action="home_dpd_update1.php" method="post" enctype="multipart/form-data">
				<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:4000px !important; padding-bottom: 10px; background-color: #FFF; color: #FC0;">
					<!--class="display"  forget-ordering    -->
					<thead>
						<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
							<th style="width:10px !important;">sl</th>
							<!--style="width: 200px !important; "-->
							<th style="width:120px !important;"> Customer</th>
							<th style="width:65px !important;"> Brand/Dept.</th>
							<th style="width:40px !important;">Style</th>
							<th style="width:45px !important;">Color</th>
							<th style="width:75px !important;">Season</th>
							<th style="width:125px !important;">Fabric Type</th>
							<th style="width:120px !important;">Sample Type</th>
							<th style="width:120px !important;">Print Type</th>
							<th style="width:240px !important;">Wash Type</th>
							<th style="width:135px !important;">Product Type</th>
							<th style="width:135px !important;background-color:#F90">Concern Sample Coordinator (Name)</th>
							<th style="width:255px !important;background-color:#F90">Meeting with SD, MM, DPD, Sample Fabric concern (Date)</th>
							<th style="width:135px !important;background-color:#F90">Clarificaition of Missing Info Sending to SD (Date)<span style="color:#F00; font-size:16px">****</span></th>
							<th style="width:135px !important;background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Request sent to LAB (Date)</th>
							<th style="width:135px !important;background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Planned Rcvd  (Date)</th>
							<th style="width:135px !important;background-color:#F90">Labdip/Yarndip/Pc Code/ Fab Test Actual (Date)</th>
							<th style="width:135px !important;">Fabric In-Fty Planned (Date)</th>
							<th style="width:135px !important;background-color:#F90">Fabric In-Fty Actual (Date)</th>
							<th style="width:135px !important;background-color:#F90">Strikeoff Approval Planned sending Date</th>
							<th style="width:135px !important;">Strikeoff Approval Actual sending Date</th>
							<th style="width:135px !important;background-color:#F90"><span style="width:125px !important;">Strikeoff Approval Required Date</span></th>
							<th style="width:135px !important;">Strikeoff Approval Received Date</th>
							<th style="width:125px !important;background-color:#F90">Trims In-Fty- Planned (Date) </th>
							<th style="width:125px !important;">Trims In-Fty- Actual (Date) </th>
							<th style="width:135px !important;">Print/Emb/applique Panel Rcv Planned (Date)</th>
							<th style="width:135px !important;">Print/Emb/applique Panel Rcv Actual (Date)</th>
							<th style="width:125px !important;background-color:#F90">Sample Sewing Starts Planned (Date)</th>
							<th style="width:135px !important;">Sample Sewing Starts Actual (Date)</th>
							<th style="width:135px !important;">Sample Request Rcv Date</th>
							<th style="width:125px !important;">Agreed Sample Delivery</th>
							<th style="width:125px !important;">Actual Sample Submission</th>
							<th style="width:125px !important;">Concern SD</th>
							<th style="width:125px !important;">Fabric Concern</th>
							<th style="width:125px !important;">Sweing operator</th>
							<th style="width:125px !important;">Pattern master </th>
							<th style="width:125px !important;">Cordinator Name</th>
							<th style="width:125px !important;">Quality ins Name</th>
							<th style="width:125px !important;">Sample Submission</th>
							<th style="width:115px !important;background-color:#F90">Sample Sewing Starts Planned-(Date)</th>
							<th style="width:115px !important;background-color:#F90">Fabric Booking By DPD to MM (Date) <span style="color:#F00; font-size:16px">****</span></th>
							<th style="width:115px !important;background-color:#F90">Fabric In-Fty Planned (Date) </th>
							<th style="width:125px !important;">Actual Submission Date</th>
							<th style="width:125px !important;">DPD Comments</th>
							<th style="width:125px !important;">Sample Reject/Pass</th>
						</tr>
						<tr>
							<td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /></td>
							<td><input type="text" name="search_browser" value="Customer" class="search_init" /></td>
							<td><input type="text" name="search_platform" value="Brand/Dept" class="search_init" /></td>
							<td><input type="text" name="search_version" value="Style" class="search_init" /></td>
							<td><input type="text" name="search_grade" value="Color" class="search_init" /></td>
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
							<td valign="middle"><input name="checkbox[]" checked type="hidden" id="checkbox[]" value="<?php echo $row['sl']; ?>"> &nbsp; <?php echo $row['customer'] ; ?></td>
							<td><?php echo $row['brand_style'] ; ?></td>
							<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
							<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
							<td><?php echo $row['season'] ; ?></td>
							<td><?php echo $row['fabric_type'] ; ?></td>
							<td><?php echo $row['sd_sample_type_name'] ; ?></td>
							<td><?php echo $row['print_type'] ; ?></td>
							<td><?php echo $row['wash_type'] ; ?></td>
							<td><?php echo $row['product_type'] ; ?></td>
							<td>
								<select name="dpd_concern_sample_coordinator_name[]" autofocus required id="dpd_concern_sample_coordinator_name[]" style="font-size:11px">
									<option value="" selected="selected">Select Name</option>
									<option value="<?php echo $row['dpd_concern_sample_coordinator_name'] ; ?>" selected><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></option>
									<?php
										$SQLx="select user_name from tb_admin where rule like '4' group by user_name";
										$obj->sql($SQLx);
										while($rowx = mysql_fetch_array($obj->result))
										{ 
										$dis=$rowx['user_name'];
										echo '<option value="'.$dis.'">'.$dis.'</option>';
										}
										?>
								</select>
							</td>
							<td><input name="dpd_meeting_sd_mm_dpd_sample_date[]" class="rounded" type="text" id="dpd_meeting_sd_mm_dpd_sample_date[]" value="<?php echo $row['dpd_meeting_sd_mm_dpd_sample_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="3" onclick="showCalendarControl(this);" /></td>
							<td><input name="dpd_clarification_sending_to_sd_date[]" class="rounded" type="text" id="dpd_clarification_sending_to_sd_date[]" value="<?php echo $row['dpd_clarification_sending_to_sd_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="4" onclick="showCalendarControl(this);" /></td>
							<td><input name="dpd_labdip_req_sent_to_lab_date[]" class="rounded" type="text" id="dpd_labdip_req_sent_to_lab_date[]" value="<?php echo $row['dpd_labdip_req_sent_to_lab_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="5" onclick="showCalendarControl(this);" /></td>
							<td><input name="dpd_labdip_planned_rcvd_date[]" class="rounded" type="text" id="dpd_labdip_planned_rcvd_date[]" value="<?php echo $row['dpd_labdip_planned_rcvd_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="6" onclick="showCalendarControl(this);" /></td>
							<td> <input name="dpd_labdip_actual_date[]" class="rounded" type="text" id="dpd_labdip_actual_date[]" value="<?php echo $row['dpd_labdip_actual_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="7" onclick="showCalendarControl(this);" /></td>
							<td><?php echo $row['dpd_fabric_planned_date'] ; ?></td>
							<td><input name="dpd_fabric_actual_date[]" class="rounded" type="text" id="dpd_fabric_actual_date[]" value="<?php echo $row['dpd_fabric_actual_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="8" onclick="showCalendarControl(this);" /></td>
							<td><input name="dpd_strikeoff_planned_sending_date[]" class="rounded" type="text" id="dpd_strikeoff_planned_sending_date[]" value="<?php echo $row['dpd_strikeoff_planned_sending_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="9" onclick="showCalendarControl(this);" /></td>
							<td><?php echo $row['dpd_strikeoff_actual_sending_date'] ; ?></td>
							<td><input name="dpd_strikeoff_approval_required_date[]" class="rounded" type="text" id="dpd_strikeoff_approval_required_date[]" value="<?php echo $row['dpd_strikeoff_approval_required_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
							<td><?php echo $row['dpd_strikeoff_approval_rcvd_date'] ; ?></td>
							<td><input name="dpd_trims_planned_date[]" class="rounded" type="text" id="dpd_trims_planned_date[]" value="<?php echo $row['dpd_trims_planned_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
							<td><?php echo $row['mm_trims_actual_date'] ; ?></td>
							<td><?php echo $row['dpd_print_planned_date'] ; ?></td>
							<td><?php echo $row['sample_print_actual_date'] ; ?></td>
							<td><input name="dpd_sample_planned_date[]" class="rounded" type="text" id="dpd_sample_planned_date[]" value="<?php echo $row['dpd_sample_planned_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" />							  </td>
							<td><?php echo $row['sample_sample_actual_date'] ; ?></td>
							<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
							<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
							<td>
								<input name="sd_actual_sample_submission_date[]" class="rounded" type="text" id="sd_actual_sample_submission_date[]" value="<?php echo $row['sd_actual_sample_submission_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" />
							</td>
							<td><?php echo $row['sd_concern_sd_name'] ; ?></td>
							<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
							<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
							<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
							<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
							<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
							<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
							<td><input name="fab_receive_planned_date[]" class="rounded" type="text" id="fab_receive_planned_date[]" value="<?php echo $row['fab_receive_planned_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
							<td><input name="mm_fabricbooking_by_dpd_to_mm_date[]" class="rounded" type="text" id="mm_fabricbooking_by_dpd_to_mm_date[]" value="<?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
							<td>
								<input name="dpd_fabric_planned_date[]" class="rounded" type="text" id="dpd_fabric_planned_date[]" value="<?php echo $row['dpd_fabric_planned_date'] ; ?>" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" />
							</td>
							<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
							<td class="center"><textarea name="cmt_dpd[]" id="cmt_dpd[]" cols="20" rows="3"><?php echo $row['cmt_dpd'] ; ?></textarea></td>
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
							<td class="center"><?php echo $c1 ; ?>  <input name="udate_dpd[]" id="udate_dpd[]" type="hidden" value="<?php echo $row['update_dpd_id'] ; ?>,<?php echo $uid ; ?>"></td>
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