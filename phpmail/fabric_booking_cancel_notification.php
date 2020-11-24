<?php

   /*include "../../db_Class.php";
   $obj = new db_class();
   $obj->MySQL();*/
   
		$date = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
		$date->modify('-3600 seconds');
		$date=$date->format("m-d-Y");

		$fromemail='noreply@viyellatexgroup.com';
		$fromname = 'Fabric Booking Cancel Notification';
		
		$report_send_date = date('l, j-F-Y');
		
		  
    $SQL1="SELECT T0.*, T1.sd_sample_type_name, T1.sd_agreed_sample_delivery_date FROM tb_fabric_booking T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl WHERE T0.sl = '$fab_sl' ";
	
    $results1 = $obj->sql($SQL1);
     	while($row1 = mysql_fetch_array($results1))
          {
			  $buyer=$row1['buyer'] ;
			  $sample_style=$row1['sample_style'] ;
			  $sd_sample_type_name=$row1['sd_sample_type_name'] ;

			  $fab_color=$row1['fab_color'] ;
			  $fabrication=$row1['fabrication'] ;
			  $composition=$row1['composition'] ;
			  $gsm=$row1['gsm'] ;
			  $color_code=$row1['color_code'] ;
			  $item_cat=$row1['item_cat'] ;
			  $comments=$row1['comments'] ;
			  
			  $sto_po_no=$row1['sto_po_no'] ;
			  $fab_receive_planned_date=$row1['fab_receive_planned_date'] ;
			  
			  // $labdip=$row1['labdip'] ;
			  
			  $dpd_req_qty=$row1['dpd_req_qty'] ;
			  $uom=$row1['uom'] ;
			  $referrence_id=$row1['referrence_id'] ;
			  
			  $remark_dpd=$row1['remark_dpd'] ;
          }	
		
				
if($fromemail !=NULL)
{
$date = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
$date->modify('-3600 seconds');
$date=$date->format("m-d-Y");	

	//$toemail= array('mosaraf.hossain@viyellatexgroup.com', 'sample.dyeing@viyellatexgroup.com', 'nazrul.roni@viyellatexgroup.com', 'hedayetur.rahaman@viyellatexgroup.com', 'md.ismail@viyellatexgroup.com');
	
	$toemail= array('sd.fabrics@viyellatexgroup.com', 'sample.dyeing@viyellatexgroup.com', 'md.ismail@viyellatexgroup.com');
$cc_mail_list = array('reji.paulo@viyellatexgroup.com', 'mhrahman@viyellatexgroup.com', 'liza.amena@viyellatexgroup.com');
//$cc_mail_list = array('ishtiaque.azim@viyellatexgroup.com', 'mhrahman@viyellatexgroup.com', 'liza.amena@viyellatexgroup.com');

//$toemail= array('jahidur.rahman@viyellatexgroup.com');
//$cc_mail_list = array('liza.amena@viyellatexgroup.com');

include_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail             = new PHPMailer();
//$body             = $mail->getFile('contents.php');

$body             = eregi_replace("[\]",'','<body>

<table width="100%" height="100%"  cellpadding="0" bgcolor="#DDDDDD" cellspacing="0" style="padding: 20px 0px 5px 0px">
      <tr align="center">
         <td>
		     <table width="65%" cellpadding="0" cellspacing="0">
                   <tr>
                     <td style="background-color:#025C64; color:#FFF; padding: 14px 0px 14px 12px">
                         <span style="font-size: 25px;">Fabric Booking Cancel Notification of Style '.$sample_style.'</span>
                      </td>
                   </tr>
                    <tr>
                      <td width="317" align="left" bgcolor="#068C99" style="font-weight:normal;font-size: 16px; color:#FFF;">
                       <p><span style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Mail Send Date &#8594;&nbsp;</span>'.$report_send_date.'</p></td>
                    </tr>
                   <tr>
                      <td bgcolor="#025C64" width="448" height="13"></td>
                   </tr>
                   <tr>
                     <td width="317" align="left" bgcolor="#068C99" style="font-weight:normal;font-size: 17px; color:#FFF;">
             <p><span style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Cancelled By : &#10154;&nbsp;</span>'.$name.', '.$dept.', '.$extension.'</p></td>
                    </tr>
                   <tr>
                      <td bgcolor="#025C64" width="448" height="13"></td>
                   </tr> 
                   <tr>
                      <td bgcolor="#FFFFFF" height="10" width="562">&nbsp;</td>
                   </tr>
            </table>            
           <table cellpadding="0" cellspacing="0" width="65%" style="padding: 0px 0px 0px 5px" bgcolor="#FFFFFF">
                  <tr>
                    <td>&nbsp;</td>
                    <td valign="top" style="font-family: Arial, Verdana, sans-serif; padding-left: 2px; line-height: 20px; color:#222222" >
					<h2 align="center" style="color:#030" >Booking Details</h2>
                        <table align="center" border="1" width="90%" cellspacing="0" cellpadding="0" class="bottomBorder">
                           <tr style="font-size:14px">
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Buyer Name</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$buyer.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Style</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$sample_style.'</td>
						   </tr>
                           <tr align="center" style="font-size:14px">
                              <th bgcolor="#DDDDDD" align="left">&nbsp;&nbsp;Sample Type</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$sd_sample_type_name.'</td>
                              <th bgcolor="#DDDDDD" align="left">&nbsp;&nbsp;Fabric Color</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$fab_color.'</td>
						   </tr>
                           <tr style="font-size:14px">
                              <th  bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Item Name</th>
							  <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$item_cat.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Color Code</th>
                        	  <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$color_code.'</td>
						   </tr>
                            <tr style="font-size:14px">
                              <th  bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Fabrication</th>
							  <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$fabrication.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Composition</th>
                        	  <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$composition.'</td>
						   </tr>
                            <tr style="font-size:14px">
                              <th  bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;GSM</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$fabrication.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Comments</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$comments.'</td>
                            </tr>
                            <tr style="font-size:14px">
                              <th  bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;STO No</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$sto_po_no.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Required Date</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$fab_receive_planned_date.'</td>
                            </tr>
                            <tr style="font-size:14px">
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Req Qty</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$dpd_req_qty.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;UOM</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$uom.'</td>
                            </tr>
                            <tr style="font-size:14px">
                              <th  bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Reference ID</th>
                              <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$uom.'</td>
                              <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;DPD Remark</th>
                              <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$remark_dpd.'</td>
                            </tr>
                          <tr bgcolor="#FFFFCC" style="font-size:15px">
                            <th scope="row" bgcolor="#FFFFCC" align="left">&nbsp;&nbsp;Cancel reason</th>
                         <td colspan="3" bgcolor="#FFFFCC" scope="row" align="left">&nbsp;&nbsp;'.$cancel_rsn_details.'</td>
                          </tr>
                          <tr bgcolor="#FFFFCC" style="font-size:15px">
                            <th scope="row" bgcolor="#FFFFCC" align="left">&nbsp;&nbsp;Cancel Comments</th>
                     <td colspan="3" bgcolor="#FFFFCC" align="left">&nbsp;&nbsp;'.$cancel_cmnts.'</td>
                          </tr>
                        </table>
                    </td>
                    <td bgcolor="#FFFFFF" width="10" height="100"></td>
                  </tr>
      			  <tr><td>&nbsp;</td></tr>
            </table>
             <table cellpadding="0" cellspacing="0" width="65%" height="76">
                  <tr>
                     <td height="5" bgcolor="#025C64">
                     </td>
                  </tr>
                  <tr>
                     <td height="64" bgcolor="#068C99" style="font-size: 11px; font-family: Arial, Verdana, sans-serif; color:#FFFFFF; padding-left: 15px; width:350px;">
                        <strong>This is system generated email. Please do not reply to this message. <br>
                        Copyright &copy; 2014  <a href="http://www.viyellatexgroup.com/" style="font-weight:bold; color:#FFFFFF;">VIYELLATEX</a> All rights reserved.
                        </strong>
                     </td>
                  </tr>
                  <tr>
                     <td height="5" bgcolor="#025C64">
                     </td>
                  </tr>
               </table>
            <td>
         <tr>
</table></body>
');
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "webmail.viyellatexgroup.com"; // SMTP server
$mail->From       = "$fromemail";
$mail->FromName   = "$fromname";
$mail->Subject    = "Fabric Booking Cancel Notification";
//Sample Tracker Concern DPD and MM assignation for Buyer - '.$customer.' Style - '.$style.'
$mail->AltBody    = "."; // optional, comment out and test
//To view the message, please use an HTML compatible email viewer!
$mail->MsgHTML($body);
//$mail->AddAddress("liza.amena@viyellatexgroup.com", "liza.amena@viyellatexgroup.com");	
//$mail->AddAddress("jui.banerjee@viyellatexgroup.com", "jui.banerjee@viyellatexgroup.com");	
/*$mail->AddAddress("$toemail", "$toname");	
$rowz = 0;
foreach($cc_mail_list as $namex)
{		
$mail->AddCC($cc_mail_list[$rowz], '$namex');	
$rowz++;
}*/

//$mail->AddAddress("$toemail", "$toname");	

$rowz = 0;
foreach($toemail as $namex)
{		
$mail->AddAddress($toemail[$rowz], '$namex');	
$rowz++;
}

$rowy = 0;
foreach($cc_mail_list as $rowy=>$namey)
{		
$mail->AddCC($cc_mail_list[$rowy], '$namey');	
$rowy++;
}
						
//$mail->AddAttachment("images/logo.png");      // attachment

$msg='<font color="#0000CC">A Notification has been send by Mail <br/> to the Concern MM, Dyeing and DPD Head.</font>';
//echo $msg ;

$sendmail=1;

}// End of checking From Email
else
{
	$msg='<font color="red">Mail Send is Failed. Please Try Again.</font>' ;
	echo $msg ;
	$sendmail=0;
}

		echo '<br/><br/>';
		if($sendmail==0) 
		echo '<h2 style="color:#F00" align="center">Oops ! Sorry.</h2> </br>';
		else 
		echo '<h2 align="center">Thank You ! </h2>' ;
		
		if($sendmail=='1')
		{
				
		if(!$mail->Send()) {
			error_reporting(0);
			ini_set('display_errors', "Off");
			echo "Mailer Error: " . $mail->ErrorInfo;
							}
		else 
echo '<br/><div align="center"><strong><span style="font-size:18px; color:#060">Your Fabric Booking is Cancelled Sucessfully.</span><br/><br/><span style="font-size:16px; color:blue">'.$msg.'</span></strong></div>';


		//echo '<h3 align="center">'.$msg.'</h3> </br>' ;	
		 //echo "Message sent!";
		}


//}// End of POST .

?>

<!--<script type="text/javascript">
window.close();
</script>-->



