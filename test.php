


<?php



	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();



$SQL1="select * from tb_track_info where sl='28' AND brand_style='IZOD/4588399'";
$result1=$obj->sql($SQL1);
while($row=mysql_fetch_array($result1))
{
	//$sl=$row['sl'];
	$customer=$row['customer'];   //
	$brand_style=$row['brand_style'];  //A
	$sd_sample_type_name=$row['sd_sample_type_name'];  //B
	$sd_sample_req_rcv_date=$row['sd_sample_req_rcv_date'];  //C
	$sd_concern_sd_name=$row['sd_concern_sd_name'];   //D
	$sd_techpack_rcv_fwrd_date=$row['sd_techpack_rcv_fwrd_date'];   //E
	$sd_concern_dpd_name=$row['sd_concern_dpd_name'];    // F
	$dpd_concern_sample_coordinator_name=$row['dpd_concern_sample_coordinator_name'];  //G
	$dpd_meeting_sd_mm_dpd_sample_date=$row['dpd_meeting_sd_mm_dpd_sample_date'];  //H
	$dpd_clarification_sending_to_sd_date=$row['dpd_clarification_sending_to_sd_date'];  //I
	$sd_clarification_arng_cnfrm_from_buyer_date=$row['sd_clarification_arng_confrm_from_buyer_date'];  //J
	$sd_agreed_sample_delivery_date=$row['sd_agreed_sample_delivery_date'];  //K
	$dpd_labdip_req_sent_to_lab_date=$row['dpd_labdip_req_sent_to_lab_date'];  //L
	$dpd_labdip_planned_rcvd_date=$row['dpd_labdip_planned_rcvd_date'];  //M
	$dpd_labdip_actual_date=$row['dpd_labdip_actual_date'];  //N
	$sd_concern_mm_name=$row['sd_concern_mm_name'];  //O
	$mm_fabric_booking_by_dpd_to_mm_date=$row['mm_fabricbooking_by_dpd_to_mm_date']; //P 
	$dpd_fabric_planned_date=$row['dpd_fabric_planned_date'];  //Q
	$dpd_fabric_actual_date=$row['dpd_fabric_actual_date'];  //R
	$dpd_strikeoff_planned_sending_date=$row['dpd_strikeoff_planned_sending_date']; //S
	$dpd_strikeoff_actual_sending_date=$row['sd_strikeoff_actual_sending_date'];  //T
	$dpd_strikeoff_approval_required_date=$row['dpd_strikeoff_approval_required_date'];  //U
	$sd_strikeoff_approval_rcvd_date=$row['sd_strikeoff_approval_rcvd_date'];  //V
   	$dpd_trims_planned_date=$row['dpd_trims_planned_date'];  //W
	$mm_trims_actual_date=$row['mm_trims_actual_date'];  //X
	$sample_pattern_master_name=$row['sample_pattern_master_name']; //Y
	$sample_pattern_planned_date=$row['sample_pattern_planned_date'];  //Z
	$sample_pattern_actual_date=$row['sample_pattern_actual_date'];  //AA
	$dpd_print_planned_date=$row['dpd_print_planned_date'];  //AB
	$sample_print_actual_date=$row['sample_print_actual_date'];  //AC
	$sample_sweing_operators_name=$row['sample_sweing_operators_name'];  //AD
	$dpd_sample_planned_date=$row['dpd_sample_planned_date'];  //AE
	$sample_sample_actual_date=$row['sample_sample_actual_date']; //AF
	$sample_sample_final_quality_ins_name=$row['sample_sample_final_quality_ins_name'];  //AG
$sample_sample_rvwd_by_sd_dpd_prior_submission=$row['sample_sample_rvwd_by_sd_dpd_prior_submission']; //AH
	$sd_actual_sample_submission_date=$row['sd_actual_sample_submission_date'];  //AI
	$sd_sample_ontime_delay=$row['sd_sample_ontime_delay'];  // AJ
	$sd_comments_rcvd_date=$row['sd_comments_rcvd_date']; // AL
	$sd_sample_reject_pass=$row['sd_sample_reject_pass'];  //AM
	$sd_fabric_concern_name=$row['sd_fabric_concern_name'];  //
	
	
	}
	
	
	
	
	function daysDifference($endDate, $beginDate)
{
   //explode the date by "-" and storing to array
   $date_parts1=explode("-", $beginDate);
   $date_parts2=explode("-", $endDate);
   //gregoriantojd() Converts a Gregorian date to Julian Day Count
   //int gregoriantojd ( int $month , int $day , int $year )
   $start_date=gregoriantojd($date_parts1[1], $date_parts1[0], $date_parts1[2]);
   $end_date=gregoriantojd($date_parts2[1], $date_parts2[0], $date_parts2[2]);
   return $end_date - $start_date;
}
$ed=$dpd_meeting_sd_mm_dpd_sample_date ;
$sd=$dpd_clarification_sending_to_sd_date ;

//Usage:
   $daf=daysDifference($ed,$sd);   
   echo $daf ;
	
	
	?>