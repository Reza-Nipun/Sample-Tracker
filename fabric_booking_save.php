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

//if($_SERVER["REQUEST_METHOD"] == "POST")
//{

$combo = $_POST['combo'];
$s_color = $_POST['s_color'];
$tsl = $_POST['tsl'];
$customer = $_POST['customer'];
$style = $_POST['style'];
$season = $_POST['season'];

$item_cat = $_POST['item_cat'];
$dia = $_POST['dia'];
$comments = $_POST['comments'];
$yarn_count = $_POST['yarn_count'];
$labdip = $_POST['labdip'];
$supplyer = $_POST['supplyer'];

$fab_rec_planned_date = $_POST['fab_rec_planned_date'];
$collar_des = $_POST['collar_des'];
$collar_size = $_POST['collar_size'];
$collar_color = $_POST['collar_color'];
$collar_qty = $_POST['collar_qty'];

$cuff_des = $_POST['cuff_des'];
$cuff_size = $_POST['cuff_size'];
$cuff_color = $_POST['cuff_color'];
$cuff_qty = $_POST['cuff_qty'];

$dpd_cmt = $_POST['dpd_cmt'];
$attachment = $_POST['attachment'];

$row=0;
foreach($_POST['fabrication'] as $row=>$fabrication)
{
		
	$gsm= trim($_POST['gsm'][$row]);
	$f_wash= trim($_POST['f_wash'][$row]);
	$req_qty= trim($_POST['req_qty'][$row]);
	$f_uom= trim($_POST['f_uom'][$row]);
	
	/*$composition= trim($_POST['composition'][$row]);
	$color= trim($_POST['color'][$row]);
	$color_code= trim($_POST['color_code'][$row]);
	$remarks= trim($_POST['remarks'][$row]);*/
	
	$composition= $_POST['composition'][$row];
	$color= $_POST['color'][$row];
	$color_code= $_POST['color_code'][$row];
	$remarks= $_POST['remarks'][$row];

if(strlen($fabrication)>0 && strlen($req_qty)>0)
{
	
	$SQL = "INSERT INTO `tb_fabric_booking` (`sl`, `track_info_sl`, `buyer`, `sample_style`, `color`, `season`, `combo`, `fab_color`, `fabrication`, `composition`, `gsm`, `fab_wash`, `dia`, `color_code`, `remarks`, `item_cat`, `comments`,  `sto_po_no`, `yarn_count`, `labdip`, `supplier`, `dpd_req_qty`, `delv_qty`, `del_status`, `uom`, `collar_des`, `collar_size`, `collar_color`, `collar_qty`, `cuff_des`, `cuff_size`, `cuff_color`, `cuff_qty`, `remark_dpd`, `attachment`, `remark_dy`, `referrence_id`, `mm_date`, `dpd_date`, `dy_date`, `knit_del_qty`, `knit_status`, `knit_comnt`, `knit_date`, `knit_id`, `store_rec_qty`, `store_status`, `store_date`, `store_id`, `mm_id`, `dpd_id`, `dy_id`, `cancel_sto`, `cancel_status`, `cancel_rsn`, `cancel_cmnts`, `cancel_date`, `revise_status`, `revise_rsn`, `revise_cmnts`, `ref_status`) VALUES ('', '$tsl', '$customer', '$style', '$s_color', '$season', '$combo', '$color', '$fabrication', '$composition', '$gsm', '$f_wash', '$dia', '$color_code', '$remarks', '$item_cat', '$comments', '', '$yarn_count', '$labdip', '$supplyer', '$req_qty', '', '', '$f_uom', '$collar_des', '$collar_size', '$collar_color', '$collar_qty', '$cuff_des', '$cuff_size', '$cuff_color', '$cuff_qty', '$dpd_cmt', '$attachment', '', '', '', '$sys_date', '', '', '', '', '', '', '', '', '', '', '', '$uid', '', '', '', '', '', '', '', '', '', '')";

//die ($SQL);
$obj->sql($SQL);

$SQL1="UPDATE `tb_track_info` SET  `mm_fabricbooking_by_dpd_to_mm_date` = '$sys_date' ,dpd_fabric_planned_date='$fab_rec_planned_date' ,fab_receive_planned_date='$fab_rec_planned_date' WHERE sl='$tsl'" ;
$obj->sql($SQL1);

//$a= '<div align="center" style="color:#006600"><p><strong>'.$style.', '.$fabrication.' Fabric Booking Successfully Created !</strong></p></div>';
//echo $a ;

//}
/*else
{
$a= '<div style="color:#FF0000"><p>'.$style.','.$fabrication.' Booking can not Created.Required Field Sample Color and DPD Required Quantity.</p></div>';
echo $a ;
}*/
$row++ ;
}
}
//header("location:index.php");
$encd_opt = base64_encode($combo);
header("location:fabric_booking_yd.php?S_ID=$style&season=$season&opt=$encd_opt");
?>

<!--<div align="center"><a href="fabric_booking_yd.php?S_ID=<?php // echo $style; ?>&season=<?php // echo $season; ?>">Click to Go Back</a></div>-->