<?php


/*$date = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
$date->modify('-3600 seconds');
$date=$date->format("m-d-Y");*/



//$hash = md5("production".$email."head")

	 
//$toemail='ahasan-interfab@viyellatexgroup.com' ;
// $toemail='masum.ikbal@viyellatexgroup.com' ;
//$toemail='liza.amena@viyellatexgroup.com' ;
 
 //jahidur.rahman@viyellatexgroup.com
 
//$toemail= array('jahidur.rahman@viyellatexgroup.com', 'mhrahman@viyellatexgroup.com');



//$toemail= array('abdur.razzak@viyellatexgroup.com', 'mhrahman@viyellatexgroup.com', 'liza.amena@viyellatexgroup.com');
// $toemail= array('liza.amena@viyellatexgroup.com');
//$toname=$toemail;


$toemail = $user_email ;
$toname = $toemail ;



$fromemail='noreply@viyellatexgroup.com';
$fromname = 'VTL Sample Tracker';

$report_send_date = date('l, j-F-Y', strtotime(now));

//$attach='images/phpmailer.gif';
include_once('phpmail/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail = new PHPMailer();
//$body             = $mail->getFile('contents.php');
$body= eregi_replace("[\]",'','<body>
<table width="100%" height="100%"  cellpadding="0" bgcolor="#DDDDDD" cellspacing="0" style="padding: 20px 0px 5px 0px">
      <tr align="center">
         <td>
		     <table width="65%" cellpadding="0" cellspacing="0">
                  	<tr>
                     <td height="4" colspan="3" bgcolor="#6B6BB2"></td>
                  </tr>
                  
                    <tr>
                      <td width="1%" bgcolor="#6B6BB2"></td>
                      <td width="98%" style="background-color:#9999FF; padding: 14px 0px 14px 12px">
                         <span style="font-size: 25px; color:#000">Fabric of Style </span><span style="font-size: 25px; color:#5C005C">'.$sample_style.'</span><span style="font-size: 25px; color:#000"> has been received by Store. </span>
                      </td>
                   	  <td width="1%" bgcolor="#6B6BB2"></td>
                   </tr>
                   
                    <tr>
                      <td width="1%" bgcolor="#6B6BB2"></td>
                      <td width="98%" align="left" bordercolor="6B6BB2" bgcolor="#B8B8FF" style="font-weight:normal;font-size: 16px; color:#000;"><span style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Mail Send Date &#8594;&nbsp;</span>'.$report_send_date.'</td>
                      <td width="1%" bgcolor="#6B6BB2"></td>
                    </tr>
                    
                   <tr>
                      <td width="1%" bgcolor="#6B6BB2"></td>
                      <td bgcolor="#9999FF" width="98%" height="13"></td>
                      <td width="1%" bgcolor="#6B6BB2"></td>
                   </tr>
             </table>            
             <table cellpadding="0" cellspacing="0" width="65%" style="padding: 0px 0px 0px 0px" bgcolor="#FFFFFF">
                  <tr>
                     <td height="4" colspan="3" bgcolor="#6B6BB2"></td>
                  </tr>
                  <tr>
                    <td width=".5%" bgcolor="#6B6BB2"></td>
                    <td>&nbsp;</td>
                    <td width=".5%" bgcolor="#6B6BB2"></td>
                  </tr>
                  <tr>
                    <td bgcolor="#6B6BB2" width=".5%" height="100"></td>
                    <!--<td bgcolor="#B8B8FF">&nbsp;</td>-->
                    <td width="99%" valign="top" style="font-family: Arial, Verdana, sans-serif; padding-left: 2px; line-height: 20px; color:#222222" >
					<h2 align="center" style="color:#4C4C80" >Fabric Details</h2>
                        <table align="center" border="1" width="90%" cellspacing="0" cellpadding="0">
                           <tr style="font-size:14px; text-align:center;">
                              <th width="25%" bgcolor="#DDDDDD" scope="row">DPD Req Qty</th>
                              <th width="13%" bgcolor="#DDDDDD" scope="row">Knit Qty</th>
                              <th width="18%" bgcolor="#DDDDDD" scope="row">DY Qty</th>
                              <th width="22%" bgcolor="#DDDDDD" scope="row">Ttl Store Recv Qty</th>
                              <th width="22%" bgcolor="#DDDDDD" scope="row">Balance Qty</th>
						   </tr>
                           <tr align="center" style="font-size:14px">
                              <td>'.$dpd_req_qty.' KG</td>
                              <td>'.$knit_del_qty.' KG</td>
                              <td>'.$delv_qty.' KG</td>
                              <td><strong>'.$temp.' KG</strong></td>
                              <td>'.$balance.' KG</td>
						   </tr>
                        </table>
                        
                        <br/>
                        
                        <table align="center" border="1" width="90%" cellspacing="0" cellpadding="0">
                          <tr style="font-size:14px">
                            <th width="20%" align="left" bgcolor="#DDDDDD" scope="row">&nbsp;&nbsp;Buyer Name:</th>
                            <td width="30%" align="left" bgcolor="#F4F4F4" scope="row">&nbsp;&nbsp;'.$buyer.'</td>
                            <th width="18%" align="left" bgcolor="#DDDDDD" scope="row">&nbsp;&nbsp;Style:</th>
                            <td width="32%" align="left" bgcolor="#F4F4F4">&nbsp;&nbsp;'.$sample_style.'</td>
                          </tr>
                          <tr align="center" style="font-size:14px">
                            <th bgcolor="#DDDDDD" align="left">&nbsp;&nbsp;Fabrication:</th>
                            <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$fabrication.'</td>
                            <th align="left" bgcolor="#DDDDDD">&nbsp;&nbsp;Composition:</th>
                            <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$composition.'</td>
                          </tr>
                          <tr style="font-size:14px">
                            <th bgcolor="#DDDDDD" scope="row" align="left">&nbsp;&nbsp;Fab Color:</th>
                            <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$fab_color.'</td>
                            <th align="left" bgcolor="#DDDDDD" scope="row">&nbsp;&nbsp;GSM:</th>
                            <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$gsm.'</td>
                          </tr>
                          <tr align="center" style="font-size:14px">
                            <th bgcolor="#DDDDDD" align="left">&nbsp;&nbsp;Fabric Type:</th>
                            <td bgcolor="#F4F4F4" scope="row" align="left">&nbsp;&nbsp;'.$item_cat.'</td>
                            <th align="left" bgcolor="#DDDDDD">&nbsp;&nbsp;Dia:</th>
                            <td bgcolor="#F4F4F4" align="left">&nbsp;&nbsp;'.$dia.'</td>
                          </tr>
                          
                        </table>
                        
                        <br/>
                      
                    </td>
                    <td bgcolor="#6B6BB2" width=".5%" height="100"></td>
                  </tr>
      			  <tr>
                    <td width=".5%" bgcolor="#6B6BB2"></td>
                    <td width="99%">&nbsp;</td>
                    <td width=".5%" bgcolor="#6B6BB2"></td>
             	  </tr>
            </table>
             <table cellpadding="0" cellspacing="0" width="65%" height="76">
                  <tr>
                     <td height="4" colspan="3" bgcolor="#6B6BB2"></td>
                  </tr>
                  <tr>
                     <td width="1%" bgcolor="#6B6BB2">&nbsp;</td>
                     <td width="98%" height="64" bgcolor="#B8B8FF" style="font-size: 11px; font-family: Arial, Verdana, sans-serif; color:#000; padding-left: 15px; width:350px;">
                        <strong>This is a system generated email. Please do not reply to this message. <br>
                        Copyright &copy; 2015  <a href="http://www.viyellatexgroup.com/" style="font-weight:bold; color:#000;">VIYELLATEX</a> All rights reserved.
                        </strong>
                     </td>
                     <td width="1%" bgcolor="#6B6BB2">&nbsp;</td>
                  </tr>
                  <tr>
                     <td height="4" colspan="3" bgcolor="#6B6BB2">
                     </td>
                  </tr>
               </table>
            <td>
         <tr>
</table>
</body>');
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "webmail.viyellatexgroup.com"; // SMTP server
$mail->From       = "$fromemail";
$mail->FromName   = "$fromname";
$mail->Subject    = 'Fabric Received by Store of Style '.$sample_style.'';
$mail->AltBody    = "."; // optional, comment out and test
//To view the message, please use an HTML compatible email viewer!
$mail->MsgHTML($body);


/*$rowz = 0;
foreach($toemail as $namex)
{		
$mail->AddAddress($toemail[$rowz], '$namex');	
$rowz++;
}*/

$mail->AddAddress("$toemail", "$toname");
//$mail->AddAttachment($attach);             // attachment

//$msg='GROUP HR has been proceed with your request. Thank you';
?>


<?php			
//echo $msg ;
		
if(!$mail->Send()) 
{
 //echo "Mailer Error: " . $mail->ErrorInfo;
} else 
{
	
	
$SQL_ins="INSERT INTO `tb_qc_records` (`sl`, `sl_of_tb_recheck`, `sticker_no`, `sticket_color`, `qc_eid`, `qc_name`) VALUES ('', '', '$id', '$temp', '$toemail', '$datex');";
$obj->sql($SQL_ins);

	
 //echo "Message sent!";
}

?>