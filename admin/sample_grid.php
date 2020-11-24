<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_id=$row['id'];	
		$user_name=$row['name'];
		$rule=$row['rule'];		
	}

//$table_name=$_GET['TABLE_ID'] ;
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.4.6
 * @license: see license.txt included in package
 */
// set up DB
$conn = mysql_connect("$DBhos", "$DBuse", "$DBpas");
mysql_select_db("$DBNam");

$base_path = strstr(realpath("."),"demos",true)."lib/"; 
include($base_path."inc/jqgrid_dist.php"); 
// you can customize your own columns ... 
$g = new jqgrid(); 
//$grid["width"] = "1200"; 
//$grid["height"] = "500"; 

$col = array(); 
$col["title"] = "SL"; // caption of column 
$col["name"] = "sl";  
$col["width"] = "50"; 
$col["frozen"] = true;
//$col["editable"] = true; // May be has no need
//$col["show"] = array("edit"=>true); // only show freezed column in edit dialog
$cols[] = $col;


$col = array(); 
$col["title"] = "Customer"; 
$col["name"] = "customer";
$col["width"] = "80";
//$col["link"] = 'JavaScript:newPopup("employee_info.php?E_ID={employee_id}")'; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist
$col["frozen"] = true;
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // required:true(false), number:true(false)
$col["show"] = array("edit"=>true); // only show freezed column in edit dialog
$cols[] = $col;


$col = array(); 
$col["title"] = "Brand Name"; 
$col["name"] = "brand_style"; 
$col["width"] = "80"; 
$col["frozen"] = true;
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$cols[] = $col;


$col = array(); 
$col["title"] = "Style"; 
$col["name"] = "style"; 
$col["width"] = "80";
$col["frozen"] = true;
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$cols[] = $col;


$col = array(); 
$col["title"] = "Color"; 
$col["name"] = "color"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "80"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Color Code"; 
$col["name"] = "color_code"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "80"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Quantity"; 
$col["name"] = "qty"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "80"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Sample Swing Qty"; 
$col["name"] = "sample_swing_qty"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "80"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Season"; 
$col["name"] = "season"; 
$col["width"] = "80";
$col["editable"] = true; // this column is editable
$col["show"] = array("edit"=>true);
/*$col["edittype"] = "select";
$col["editoptions"] = array("value" => "A_positive:A (+ve);A_negative:A (-ve);B_positive:B (+ve);B_negative:B (-ve);O_positive:O (+ve);O_negative:O (-ve);AB_positive:AB(+ve);AB_negative:AB (-ve)");
$col["editrules"] = array("required"=>true); // and is required 
*/$cols[] = $col;

$col = array(); 
$col["title"] = "Fabric Type"; 
$col["name"] = "fabric_type"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "80"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Print Type"; 
$col["name"] = "print_type"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
////$col["editrules"] = array("required"=>true); // and is required 
$cols[] = $col;

$col = array(); 
$col["title"] = "Wash Type"; 
$col["name"] = "wash_type"; 
$col["width"] = "80";
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required 
$cols[] = $col;

$col = array(); 
$col["title"] = "Product Type"; 
$col["name"] = "product_type"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "100"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Embroidery Stitch"; 
$col["name"] = "embroidery_stitch"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "100"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Sample Type Name"; 
$col["name"] = "sd_sample_type_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "100"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Sample Request Rcv Dt"; 
$col["name"] = "sd_sample_req_rcv_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "100"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Concern SD Name"; 
$col["name"] = "sd_concern_sd_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Techpack Rcv Fwrd DT"; 
$col["name"] = "sd_techpack_rcv_fwrd_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Concern DPD Name"; 
$col["name"] = "sd_concern_dpd_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
//$col["link"] = 'JavaScript:newPopup("employee_info.php?E_ID={sarder_id}")'; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist
$cols[] = $col;

$col = array(); 
$col["title"] = "Concern Sample Coordinator Name"; 
$col["name"] = "dpd_concern_sample_coordinator_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "200"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_meeting_sd_mm_dpd_sample_date"; 
$col["name"] = "dpd_meeting_sd_mm_dpd_sample_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "200"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_clarification_sending_to_sd_date"; 
$col["name"] = "dpd_clarification_sending_to_sd_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "200"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_clarification_arng_confrm_from_buyer_date"; 
$col["name"] = "sd_clarification_arng_confrm_from_buyer_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "240"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_agreed_sample_delivery_date"; 
$col["name"] = "sd_agreed_sample_delivery_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "170"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_labdip_req_sent_to_lab_date"; 
$col["name"] = "dpd_labdip_req_sent_to_lab_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "170"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_labdip_planned_rcvd_date"; 
$col["name"] = "dpd_labdip_planned_rcvd_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_labdip_actual_date"; 
$col["name"] = "dpd_labdip_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "140"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Concern MM Name"; 
$col["name"] = "sd_concern_mm_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "100"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "mm_fabricbooking_by_dpd_to_mm_date"; 
$col["name"] = "mm_fabricbooking_by_dpd_to_mm_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "180"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "fab_receive_planned_date"; 
$col["name"] = "fab_receive_planned_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "fab_receive_actual_date"; 
$col["name"] = "fab_receive_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_fabric_planned_date"; 
$col["name"] = "dpd_fabric_planned_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_fabric_actual_date"; 
$col["name"] = "dpd_fabric_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_strikeoff_planned_sending_date"; 
$col["name"] = "dpd_strikeoff_planned_sending_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "180"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_strikeoff_actual_sending_date"; 
$col["name"] = "dpd_strikeoff_actual_sending_date"; 
$col["editable"] = true; // this column is editable 
////$col["editrules"] = array("required"=>true); // and is required 
$col["width"] = "180";
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_strikeoff_approval_required_date"; 
$col["name"] = "dpd_strikeoff_approval_required_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "200"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_strikeoff_approval_rcvd_date"; 
$col["name"] = "dpd_strikeoff_approval_rcvd_date"; 
$col["width"] = "180"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_trims_planned_date"; 
$col["name"] = "dpd_trims_planned_date"; 
$col["width"] = "150"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "mm_trims_actual_date"; 
$col["name"] = "mm_trims_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_pattern_master_name"; 
$col["name"] = "sample_pattern_master_name"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_pattern_planned_date"; 
$col["name"] = "sample_pattern_planned_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_pattern_actual_date"; 
$col["name"] = "sample_pattern_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "150"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_print_planned_date"; 
$col["name"] = "dpd_print_planned_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_print_actual_date"; 
$col["name"] = "sample_print_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_sweing_operators_name"; 
$col["name"] = "sample_sweing_operators_name"; 
$col["width"] = "120"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "dpd_sample_planned_date"; 
$col["name"] = "dpd_sample_planned_date"; 
$col["width"] = "120";
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_sample_actual_date"; 
$col["name"] = "sample_sample_actual_date"; 
$col["editable"] = true; // this column is editable 
$col["show"] = array("edit"=>true);
$col["width"] = "120"; 
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_sample_final_quality_ins_name"; 
$col["name"] = "sample_sample_final_quality_ins_name"; 
$col["width"] = "200"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sample_sample_rvwd_by_sd_dpd_prior_submission"; 
$col["name"] = "sample_sample_rvwd_by_sd_dpd_prior_submission"; 
$col["width"] = "250"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_actual_sample_submission_date"; 
$col["name"] = "sd_actual_sample_submission_date"; 
$col["width"] = "180"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_sample_ontime_delay"; 
$col["name"] = "sd_sample_ontime_delay"; 
$col["width"] = "120"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_comments_rcvd_date"; 
$col["name"] = "sd_comments_rcvd_date"; 
$col["width"] = "120"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_sample_reject_pass"; 
$col["name"] = "sd_sample_reject_pass"; 
$col["width"] = "120"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "sd_fabric_concern_name"; 
$col["name"] = "sd_fabric_concern_name"; 
$col["width"] = "130"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "track_status"; 
$col["name"] = "track_status"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "user_id"; 
$col["name"] = "user_id"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "update_sd_id"; 
$col["name"] = "update_sd_id"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "update_mm_id"; 
$col["name"] = "update_mm_id"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "update_dpd_id"; 
$col["name"] = "update_dpd_id"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "create_date"; 
$col["name"] = "create_date"; 
$col["width"] = "80"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "cmt_sd"; 
$col["name"] = "cmt_sd"; 
$col["width"] = "100"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "cmt_mm"; 
$col["name"] = "cmt_mm"; 
$col["width"] = "100"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "cmt_dpd"; 
$col["name"] = "cmt_dpd"; 
$col["width"] = "100"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array(); 
$col["title"] = "cmt_sample"; 
$col["name"] = "cmt_sample"; 
$col["width"] = "100"; 
$col["editable"] = true; // this column is editable 
//$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$grid["altRows"] = true;  
$grid["altclass"] = "myAltRowClass";  
$grid["rowactions"] = true; // allow you to multi-select through checkboxes 
// export XLS file 
// export to excel parameters 
//$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test"); 


// export PDF file params 
$grid["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4"); 
// for excel, sheet header  landscape portrait
$grid["export"]["sheetname"] = "All Sample Information"; 

// export filtered data or all data 
$grid["export"]["range"] = "filtered"; // or "all" 

// RTL support 
# Customization of Action column width and other properties 
// $grid["direction"] = "rtl"; 

$grid["sortname"] = 'sl'; // by default sort grid by this field 
$grid["sortorder"] = "desc"; // ASC or DESC 
$grid["caption"] = "View All Sample Information"; // expand grid to screen width 
$grid["autowidth"] = true; // expand grid to screen width 
$grid["multiselect"] = true; // allow you to multi-select through checkboxes 
$grid["reloadedit"] = true;
/*$col["hight"] = "1300"; 
$col["width"] = "500"; */
$grid["view_options"] = array("width"=>"80"); 
$grid["view_options"] = array("hight"=>"60"); 
$grid["shrinkToFit"] = false; // dont shrink to fit on screen
$grid["sortable"] = false; // it is required for freezed column feature
$grid["form"]["position"] = "center"; 

$g->set_options($grid); 

				$g->set_actions(array(     
                        "add"=>false, // allow/disallow add 
                        "edit"=>true, // allow/disallow edit 
                        "delete"=>true, // allow/disallow delete 
						"inlineedit"=>false,
						"closeAfterEdit"=>true,
						"showhidecolumns"=>true,
                        "rowactions"=>true, // show/hide row wise edit/del/save option 
                      //  "export"=>true, // show/hide export to excel option 
						 "export_excel"=>true, // export excel button 
                        "export_pdf"=>true, // export pdf button 
                        "export_csv"=>true, // export csv button 
                        "autofilter" => true, // show/hide autofilter for search 
						"autoscroll" => true,
						"view"=>true, // allow/disallow delete 
                        "search" => "advance" // show single/multi field search condition (e.g. simple or advance) 
                    ));

// you can provide custom SQL query to display data 
//$g->select_command = "SELECT * FROM tb_track_info where sl = '57'"; 

$g->select_command = "SELECT * FROM tb_track_info"; 

// this db table will be used for add,edit,delete 
$g->table = "tb_track_info"; 
// pass the cooked columns to grid 
$g->set_columns($cols); 
// generate grid output, with unique grid name as 'list1' 
$out = $g->render("list1"); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html> 
<head> 
<?php require("re_head.php"); ?>
    
       
       
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>     
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>     
     
    <script src="lib/js/jquery.min.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>     
    <script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script> 
    <script type="text/javascript">
// Popup window code
function newPopup(url) {
popupWindow = window.open(
url,'popUpWindow','height=400,width=700,left=350,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

</head> 
<body>

<div class="container">

  <div id="header">
	<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php  echo $user_name ; ?></strong> [ <a href="logout.php">logout</a> ]</p>
			</div>


<?php require("re_head_date.php"); ?>


	  </div>
       <?php require("re_menu.php"); ?>
	<br />
 <div class="row">
		
		<div id="main1">
        
    <style> 
    .myAltRowClass { background-color: #DDDDDC; background-image: none; } 
    </style> 
    <div style="margin:10px"><br/>

    <?php echo $out?> 
    </div> 
    </div></div>
    
    </div>
    </div>
    <br/>
        <br/>
            <br/>
   <?php //require("re_footer.php"); ?> 
    
</body> 
</html> 