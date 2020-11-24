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
	
		date_default_timezone_set("Asia/Dhaka");
        $sys_date = date("d-m-Y");

	if (isset($_POST['submit']))
 		{
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style=mysql_real_escape_string($_POST['brand_style']);
		  $brand_style=trim($brand_style);
		  $season=mysql_real_escape_string($_POST['season']);	
		  $fabric_type=mysql_real_escape_string($_POST['fabric_type']);
		  $print_type=mysql_real_escape_string($_POST['print_type']);
		  $wash_type=mysql_real_escape_string($_POST['wash_type']);
		  $product_type=mysql_real_escape_string($_POST['product_type']);
		  $emb_stitch=mysql_real_escape_string($_POST['emb_stitch']);
		  $style=mysql_real_escape_string($_POST['style']);
		  $style=trim($style);
		  $sd_sample_type_name=mysql_real_escape_string($_POST['sd_sample_type_name']);
		  $sd_sample_req_rcv_date=mysql_real_escape_string($_POST['sd_sample_req_rcv_date']);
		  $sd_sample_delv_date=mysql_real_escape_string($_POST['sd_sample_delv_date']);		  
		  $sd_concern_sd_name=mysql_real_escape_string($_POST['sd_concern_sd_name']);
		  $sd_concern_mm_name=mysql_real_escape_string($_POST['sd_concern_mm_name']);
		  $sd_concern_dpd_name=mysql_real_escape_string($_POST['sd_concern_dpd_name']);
		  $sd_fabric_concern_name=mysql_real_escape_string($_POST['sd_fabric_concern_name']);
		  $sd_techpack_rcv_fwrd_date=mysql_real_escape_string($_POST['sd_techpack_rcv_fwrd_date']);
 if(strlen($customer)>0 && strlen($brand_style)>0 && strlen($sd_sample_type_name)>0 )
{ 
$row=0;
foreach($_POST['color'] as $rowz=>$color)
{
$color_code=$_POST['color_code'][$row] ;
$quantity=$_POST['quantity'][$row] ;
$row++;
   
$SQL="INSERT INTO `tb_track_info` (`sl`, `customer`, `brand_style`, `style`,`color`,`color_code`,`qty`,`season`,`fabric_type` ,`print_type` ,`wash_type`,`product_type`,`embroidery_stitch`, `sd_sample_type_name`, `sd_sample_req_rcv_date`, `sd_concern_sd_name`,  `sd_concern_dpd_name`,sd_agreed_sample_delivery_date,`sd_concern_mm_name`,`sd_fabric_concern_name`,`sd_techpack_rcv_fwrd_date`, `user_id`,`create_date`)
VALUES('','$customer','$brand_style','$style','$color','$color_code','$quantity','$season','$fabric_type','$print_type','$wash_type','$product_type','$emb_stitch','$sd_sample_type_name','$sd_sample_req_rcv_date','$sd_concern_sd_name','$sd_concern_dpd_name','$sd_sample_delv_date','$sd_concern_mm_name','$sd_fabric_concern_name','$sd_techpack_rcv_fwrd_date','$uid','$sys_date')" ;
$obj->sql($SQL);	

}
$a= "<font color='green'><b>Data inserted successfully.</b></font>";
}
else
{
$a= "<font color='red'><b>ERROR!!!</b></font>";
}

}




?>
<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>

</head>
<body>
        <!-- Primary Page Layout    
        ================================================== -->
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
        <div id="globalWrapper">
            <!-- page content -->
            <section id="content" class="columnPage">
                <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>
                <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                            
                        
                          <?php echo $a ; ?>
                          
                     
                          <?php 
/*						  
						  $customer=$customer ;
						  $sd_sample_type_name=$sd_sample_type_name  ;
						  $sd_sample_delv_date=$sd_sample_delv_date ;
						  
			  						  
	$SQL="select * from tb_lead_time where buyer='$customer' AND sample_type='$sd_sample_type_name'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$fab_booking=trim($row['fab_booking']);
		$newdate = strtotime ( '-' . $fab_booking .' day' , strtotime ( $sd_sample_delv_date ) ) ;
		$newdate = date ( 'd-m-Y' , $newdate );
		
		
		$fab_receive=$row['fab_receive'];		
		$newdate1 = strtotime ( '-' . $fab_receive .' day' , strtotime ( $sd_sample_delv_date ) ) ;
		$newdate1 = date ( 'd-m-Y' , $newdate1 );
		
		
		$print_send=$row['print_send'];
		$newdate2 = strtotime ( '-' . $print_send .' day' , strtotime ( $sd_sample_delv_date ) ) ;
		$newdate2 = date ( 'd-m-Y' , $newdate2 );
	
		
		$sew_start=$row['sew_start'];
		$newdate3 = strtotime ( '-' . $sew_start .' day' , strtotime ( $sd_sample_delv_date ) ) ;
		$newdate3 = date ( 'd-m-Y' , $newdate3 );

				
		$print_recv=$row['print_recv'];
		$newdate4 = strtotime ( '-' . $print_recv .' day' , strtotime ( $sd_sample_delv_date ) ) ;
		$newdate4 = date ( 'd-m-Y' , $newdate4 );
		
		
		$delv=$row['delv'];
		
	}
	
	*/
	 ?>
                          
                          <form action="sd2_save.php" method="post">
                          
                          <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>Buyer</td>
                              <td><?php echo $customer ; ?><input name="customer" type="hidden" value="<?php echo $customer ; ?>"></td>
                            </tr>
                            <tr>
                              <td>Sample Type</td>
                              <td><?php echo $sd_sample_type_name ;  ?><input name="sd_sample_type_name" type="hidden" value="<?php echo $sd_sample_type_name ;  ?>"></td>
                            </tr>
                             <tr>
                              <td>Style</td>
                              <td><?php echo $style ;  ?><input name="style" type="hidden" value="<?php echo $style ;  ?>"></td>
                            </tr>
                            <tr>
                              <td>Sample Req. Recieve Date</td>
                              <td><?php  echo $sd_sample_req_rcv_date ;  ?></td>
                            </tr>
                             <tr>
                               <td>Actual Sample Delevery Date</td>
                               <td><?php echo $sd_sample_delv_date ;  ?><input name="sd_sample_delv_date" type="hidden" value="<?php echo $sd_sample_delv_date ;  ?>"></td>
                             </tr>
                           <!--  <tr>
                              <td>Fabric Booking Date ( - <?php // echo $fab_booking ;  ?> Days)<span style="color:#F00">*</span></td>
                              <td><input name="fab_booking" class="rounded" type="text" id="fab_booking" placeholder="dd-mm-yyyy" tabindex="2" value="<?php // echo $newdate ; ?>" onclick="showCalendarControl(this);" autofocus required /></td>
                            </tr>
              
							<tr>
                              <td>Fabric Receive Date ( - <?php // echo $fab_receive ;  ?> )<span style="color:#F00">*</span></td>
                              <td><input name="fab_receive" class="rounded" type="text" id="fab_receive" placeholder="dd-mm-yyyy" tabindex="2" value="<?php // echo $newdate1 ; ?>" onclick="showCalendarControl(this);" autofocus required /></td>
                            </tr>
                            
                            
                            <tr>
                              <td>Print/Emb Send Date ( - <?php // echo $print_send ;  ?> Days)<span style="color:#F00">*</span></td>
                              <td><input name="print_send" class="rounded" type="text" id="print_send" placeholder="dd-mm-yyyy" tabindex="2" value="<?php // echo $newdate2 ; ?>" onclick="showCalendarControl(this);" autofocus required /></td>
                            </tr>
                            
                             <tr>
                              <td>Print/Emb Recv Date ( - <?php // echo $print_recv ;  ?> Days)<span style="color:#F00">*</span></td>
                              <td><input name="print_recv" class="rounded" type="text" id="print_recv" placeholder="dd-mm-yyyy" tabindex="2" value="<?php // echo $newdate4 ; ?>" onclick="showCalendarControl(this);" autofocus required /></td>
                            <tr>
<td>Sample Sewing Starts Planned-Date  (- <?php // echo $sew_start ;  ?> Days)<span style="color:#F00">*</span></td>
							  <td><input name="sew_start" class="rounded" type="text" id="sew_start" placeholder="dd-mm-yyyy" tabindex="2" value="<?php // echo $newdate3 ; ?>" onclick="showCalendarControl(this);" autofocus required /></td>
						    </tr>
                            <tr align="center">
                              <td colspan="2"><input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" /></td>
                            </tr>-->
							</table>
                          </form>
                      </div>
                          
                    </div>
                          </div>
                          </section>
                          </div>
                          </body>
                          </html>
                          
                          

                            