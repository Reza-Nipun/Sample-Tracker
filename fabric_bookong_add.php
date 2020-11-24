<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	// die('Hello World !!!');
	
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
?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$row=0;
foreach($_POST['style'] as $rowz=>$style)
{
		
	$style= $style;
	$customer= mysql_real_escape_string($_POST['customer'][$row]);
		$season= mysql_real_escape_string($_POST['season'][$row]);
			
				$s_colorm= $_POST['s_color'][$row];
				
				$s_colorx = explode("~", $s_colorm);
					$s_color = $s_colorx[0];
					$track_info_sl = $s_colorx[1];
	
					
					
			$s_color=mysql_real_escape_string($s_color) ;
			$s_color=trim($s_color) ;	
			$s_color= str_replace('"', '', $s_color);
								
					
					
		$combo= mysql_real_escape_string($_POST['combo'][$row]);
			$f_color= mysql_real_escape_string($_POST['f_color'][$row]);
				$fabrication= mysql_real_escape_string($_POST['fabrication'][$row]);
					$composition= mysql_real_escape_string($_POST['composition'][$row]);
					$remarks= mysql_real_escape_string($_POST['remarks'][$row]);
						$gsm= mysql_real_escape_string($_POST['gsm'][$row]);
							$f_wash= mysql_real_escape_string($_POST['f_wash'][$row]);
								$dia= mysql_real_escape_string($_POST['dia'][$row]);
									$c_code= mysql_real_escape_string($_POST['c_code'][$row]);
								///	$s_color= mysql_real_escape_string($_POST['s_color'][$row]);
								$item_cat= mysql_real_escape_string($_POST['item_cat'][$row]);
							$comments= mysql_real_escape_string($_POST['comments'][$row]);
						  $yarn_count= mysql_real_escape_string($_POST['yarn_count'][$row]);					
						$labdip= mysql_real_escape_string($_POST['labdip'][$row]);
					$supplyer= mysql_real_escape_string($_POST['supplyer'][$row]);
				$req_qty= mysql_real_escape_string($_POST['req_qty'][$row]);
			$f_uom= mysql_real_escape_string($_POST['f_uom'][$row]);
			
			
			$collar_des= mysql_real_escape_string($_POST['collar_des'][$row]);
			$collar_size = mysql_real_escape_string($_POST['collar_size'][$row]);
			$collar_color = mysql_real_escape_string($_POST['collar_color'][$row]);
			$collar_qty = mysql_real_escape_string($_POST['collar_qty'][$row]);
			$cuff_des= mysql_real_escape_string($_POST['cuff_des'][$row]);
			$cuff_size = mysql_real_escape_string($_POST['cuff_size'][$row]);
			$cuff_color = mysql_real_escape_string($_POST['cuff_color'][$row]);
			$cuff_qty = mysql_real_escape_string($_POST['cuff_qty'][$row]);
			
		$dpd_cmt= mysql_real_escape_string($_POST['dpd_cmt'][$row]);
	$revise_cmnts= mysql_real_escape_string($_POST['revise_cmnts'][$row]);
	
	$cancel_sto = mysql_real_escape_string($_POST['cancel_sto'][$row]);
	$revise_status = mysql_real_escape_string($_POST['revise_status'][$row]);
	$revise_rsn = mysql_real_escape_string($_POST['revise_rsn'][$row]);
		
		$fab_rec_planned_date= mysql_real_escape_string($_POST['fab_rec_planned_date'][$row]);

if(strlen($s_color)>0 && strlen($req_qty)>0)
{
$SQL="INSERT INTO `tb_fabric_booking` (`sl`, `track_info_sl`, `buyer`, `sample_style`, `color`, `season`, `combo`, `fab_color`, `fabrication`, `composition`, `gsm`, `fab_wash`, `dia`, `color_code`, `remarks`, `item_cat`, `comments`, `sto_po_no`, `yarn_count`,labdip, `supplier`, `dpd_req_qty`, `delv_qty`, `del_status`, `uom`, `collar_des`, `collar_size`, `collar_color`, `collar_qty`, `cuff_des`, `cuff_size`, `cuff_color`, `cuff_qty`, `remark_dpd`, `attachment`, `remark_dy`, `mm_date`, `dpd_date`, `dy_date`, `store_status`, `store_date`, `store_id`, `mm_id`, `dpd_id`, `dy_id`, `cancel_sto`, `cancel_status`, `cancel_rsn`, `cancel_cmnts`, `cancel_date`, `revise_status`, `revise_rsn`, `revise_cmnts`, `ref_status`) VALUES 
('', '$track_info_sl', '$customer', '$style', '$s_color', '$season', '$combo', '$f_color', '$fabrication', '$composition', '$gsm', '$f_wash', '$dia', '$c_code', '$remarks', '$item_cat', '$comments', '', '$yarn_count', '$labdip','$supplyer', '$req_qty', '', '', '$f_uom', '$collar_des', '$collar_size', '$collar_color', '$collar_qty', '$cuff_des', '$cuff_size', '$cuff_color', '$cuff_qty', '$dpd_cmt', '', '', '', '$sys_date', '', '', '', '', '', '$uid', '', '$cancel_sto', '', '', '', '', '$revise_status', '$revise_rsn', '$revise_cmnts', '')";

// die ($SQL);
$obj->sql($SQL);

$SQL1="UPDATE `tb_track_info` SET  `mm_fabricbooking_by_dpd_to_mm_date` = '$sys_date' ,dpd_fabric_planned_date='$fab_rec_planned_date' ,fab_receive_planned_date='$fab_rec_planned_date' WHERE sl='$track_info_sl'" ;
$obj->sql($SQL1);

$a= '<div style="color:#006600"><p><strong>'.$style.', '.$fabrication.' Fabric Booking Successfully Created !</strong></p></div>';
echo $a ;
}
else
{
$a= '<div style="color:#FF0000"><p>'.$style.','.$fabrication.' item  not Create created.Required Field Sample Color and Required Quantity.</p></div>';
echo $a ;
}
$row++ ;
}
}

if ($revise_status == 1)
{ ?>
<?php 
$msg = 'Fabric Booking Revised Successfully !!!';
header("location:fabric_booking.php?S_ID=$style&season=$season&msg=$msg");
} 
/*else
{
$msg = 'Fabric Booking Created Successfully !!!';
}*/

?>

