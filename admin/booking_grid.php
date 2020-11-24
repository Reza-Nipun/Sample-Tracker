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
$grid["caption"] = "View All Sample Booking Information"; // expand grid to screen width 
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
                        "edit"=>false, // allow/disallow edit 
                        "delete"=>false, // allow/disallow delete 
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

$g->select_command = "SELECT * FROM tb_fabric_booking"; 

// this db table will be used for add,edit,delete 
$g->table = "tb_fabric_booking"; 
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
    .myAltRowClass { background-color:#D8D8D8; background-image: none; } 
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