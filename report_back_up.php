<?php
 	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
	


$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
$date1=$datex->format('01-m-Y');
$date2=$datex->format('31-m-Y');


if (isset($_POST['Submit']))
 		{
		$date1=$_POST['datef'];
		$date2=$_POST['datel'];	
		$customer=$_POST['customer'];
		$status=$_POST['status'];	
		}

?>


<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>


<script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script src="media/js/sorttable.js"></script>
        
        <script type="text/javascript" src="media/jquery.min.js"></script>
<script type="text/javascript">
// Popup window code
function newPopup(url) {
popupWindow = window.open(
url,'popUpWindow','height=350,width=700,left=350,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
 
                            <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 
  
</head>
<body>
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">       
                
                <div class="container">

                        <a href="index.php" class="brand"><img src="images/main-logo.png" alt="Ohmy website template"></a>

				</div>
                            
                    <?php // require("re_menu.php"); ?>        
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
                        <section class="span6"><h2>Total Sample Status</h2>
                                      
     <iframe src="chart/sample_status.php?date1=<?php echo $date1 ; ?>&date2=<?php echo $date2 ; ?>" width="500" height="350" frameborder="0"></iframe>
                   
                        </section>
                        
                        <section class="span6">
                        
                        <h2>Buyer wise Sample Progress</h2>
                        
                        <iframe src="chart/customer_status.php?date1=<?php echo $date1 ; ?>&date2=<?php echo $date2 ; ?>" width="500" height="350" frameborder="0"></iframe>
                        
                        </section>
                        <div class="span12">
                          </div>
                          
                          <section class="span12">
                        
                        <h2>Buyer wise Sample Status (Pass)</h2>
 <iframe align="middle" src="chart/sample_sample_status.php" width="1000" height="370" frameborder="0"></iframe>
                          </section>
                        <br>



						<section class="span12">
                        
                        <h2>Buyer wise Sample Status (Reject)</h2>
                          <iframe align="middle" src="chart/sample_sample_status_reject.php" width="1000" height="370" frameborder="0"></iframe>
                          </section>
                        <?php echo $row['sd_sample_type_name'] ; // Not clear why it is here. ?><br>
                        
                        
<section class="span12">
<h2>Buyer wise Sample Summary View</h2>

<table id="gradient-style" align="left" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
  <tr>
    <th width="5%">sl</th>
    <th width="35%">Buyer</th>
    <th width="20%">Total Sample Order</th>
    <th width="20%">Fabric Booking</th>
    <th width="20%">Fabric Not Booked</th>
    </tr>
    </thead>                        
    
    
     <?php
	 
	 $t=0 ;
	 $t_fab_booked = 0;
	 $t_fab_not_booked = 0;
	 $sl1=1;
	 	
	  // $SQL3 = "SELECT T0.customer, T0.ttl, T1.cnt AS 'count', (T0.ttl-T1.cnt) AS 'pending' FROM (SELECT  customer , COUNT( style ) AS ttl FROM  `tb_track_info` GROUP BY  customer) T0 LEFT JOIN (SELECT  customer ,  COUNT(style) AS cnt FROM  tb_track_info WHERE  mm_fabricbooking_by_dpd_to_mm_date !=  '' GROUP BY customer) T1 on T1.customer = T0.customer ";
	
	
	// $SQL3a = "SELECT T0.customer, T0.ttl , COALESCE(T1.cnt, 0) AS 'cnt', COALESCE((T0.ttl-T1.cnt), 0) AS 'Pending' FROM (SELECT  customer , COUNT( style ) AS ttl FROM  `tb_track_info` GROUP BY  customer) T0 LEFT JOIN (SELECT  customer ,  COUNT(style) AS cnt FROM  tb_track_info WHERE  mm_fabricbooking_by_dpd_to_mm_date !=  '' GROUP BY customer) T1 on T1.customer = T0.customer";
	
	
	 $SQL3 = "SELECT T0.customer, T0.ttl , IFNULL(T1.cnt, 0) AS count, IFNULL((T0.ttl-T1.cnt), 0) AS 'pending' FROM (SELECT  customer , COUNT( style ) AS ttl FROM  `tb_track_info` GROUP BY  customer) T0 LEFT JOIN (SELECT  customer ,  COUNT(style) AS cnt FROM  tb_track_info WHERE  mm_fabricbooking_by_dpd_to_mm_date !=  '' GROUP BY customer) T1 on T1.customer = T0.customer "; // The Avobe $SQL3a Query is also Correct
	
	$results3 = $obj->sql($SQL3);
	while($row3 = mysql_fetch_array($results3))
	{
	$row3_customer = $row3['customer'] ;
	$t=$t+$row3['ttl'] ; 
	$t_fab_booked=$t_fab_booked+$row3['count'] ; 
	$t_fab_not_booked=$t_fab_not_booked+$row3['pending'] ; 
	
	?>	
    
  <tr style="color:#000">
    <td align="center"><?php echo $sl1 ; ?></td>
    <td align="center"><a href="chart/chart_details.php?customer=<?php echo $row3['customer'] ; ?>&chk1=2" target="_blank"><?php echo $row3['customer'] ; ?></a></td>
    <td align="center"><?php echo $row3['ttl'] ; ?></td>
    <td align="center"><?php echo $row3['count'] ; ?></td>
    <td align="center"><?php echo $row3['pending'] ; ?></td>
  </tr>
	
    <?php
		$sl1++;
	}
	?>
     <tr style="color:#000">
	   <td align="center">&nbsp;</td>
	   <td align="center"><strong>Total</strong></td>
	   <td align="center"><strong><?php echo $t ; ?></strong></td>
       <td align="center"><strong><?php echo $t_fab_booked ; ?></strong></td>
       <td align="center"><strong><?php echo $t_fab_not_booked ; ?></strong></td>
	 </tr>
</table>
</section>
                        
<hr/>
<div class="span12">.</div>
<span class="span12">.</span>
  <br/>    

                        
<section class="span12">
<h2>Buyer wise Sample Due list</h2>

<table id="gradient-style" align="left" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
  <tr>
    <th width="5%">sl</th>
    <th width="75%">Buyer</th>
    <th width="20%">Total Due</th>
    </tr>
    </thead>                        
    
     <?php
	 
	 $t=0 ;
	 $sl1=1;
	$SQL="SELECT COUNT( * ) as pa ,  `customer`,sd_sample_reject_pass 
FROM  `tb_track_info` WHERE sd_sample_reject_pass=''
GROUP BY  `customer` order by `customer` ASC"; 
$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{       
	$t=$t+$row['pa'] ; 
	?>	
	 <tr style="color:#000">
    <td align="center"><?php echo $sl1 ; ?></td>
    <td align="center"><a href="chart/chart_details.php?customer=<?php echo $row['customer'] ; ?>&chk1=2" target="_blank"><?php echo $row['customer'] ; ?></a></td>
    <td align="center"><?php echo $row['pa'] ; ?></td>
   
	<!-- <td align="center"></td>-->
    </tr>
	
                      	  <?php
		$sl1++;
	}
	?>
     <tr style="color:#000">
	   <td align="center">&nbsp;</td>
	   <td align="center"><strong>Total</strong></td>
	   <td align="center"><strong><?php echo $t ; ?></strong></td>
	   </tr>
</table>
</section>
<hr/>
<div class="span12">.</div>
<span class="span12">.</span>
  <br/>    
                        
                          <section class="span12">
                            
                      <form action="report.php" method="post">    
                    
       <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
    <th colspan="9" style="color:#000" scope="col"><h2>Sample Due list By Agreed Sample Delivery Date From <?php echo $date1 ; ?> to <?php echo $date2 ; ?> </h2></th>
    </tr>
  <tr>
    <th scope="col" style="color:#000">Date from</th>
    <th scope="col" align="center"><input name="datef" class="rounded" type="text" id="datef" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></th>
    <th scope="col" style="color:#000">Date To</th>
    <th scope="col" align="center"><input name="datel" class="rounded" type="text" id="datel" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></th>
    <th scope="col" align="center">Customer</th>
    <th scope="col" align="center">
	<select name="customer">
    <option value="" selected>Select Customer</option>
	<?php 
	
	$sql1="SELECT DISTINCT(customer) FROM `tb_track_info` order by `customer` ASC"; 
	$results1 = $obj->sql($sql1);
	while($row1 = mysql_fetch_array($results1))
	{       
	$dis=$row1['customer'] ; 
	echo '<option value="'.$dis.'">'.$dis.'</option>';
	}
	?></select></th>
    <th scope="col" align="center">Status</th>
    <th scope="col" align="center">
    <select name="status"> 
    	<option value="" selected>Select</option>
		<option value="Pass">Pass</option>
		<option value="Reject">Reject</option>
		<option value="No Comments">No Comments</option>
		<option value="Order Confirm">Order Confirm</option>
        <option value="Due">Due</option>
        <!--<option value="Dispatch">Dispatch</option>-->
	</select></th>
    <th scope="col" align="center"><input name="Submit" type="submit" class="btn btn-success" id="Submit" tabindex="4" value="Submit">
      <input name="input2" type="reset" tabindex="5" class="btn btn-danger" value="Reset"></th>
  </tr>
  </table>
 
</form>
<!-- <a href="signup.php" tabindex="5"> Sign Up</a>&nbsp;
 <strong>|</strong> <a href="forget.php" tabindex="5">Forgot Your Password?</a>-->
   


                                                  
                            
                  
                          </section>
                            
                            <section class="span12"></section>
                            <div class="span12">
                          </div>
                        </div>
                    </div>
                </div>
            </section> 
            <!-- page content -->
            </div>
            <!-- footer --> 
            <div id="demo">
<table cellpadding="0" align="center" cellspacing="0" border="1" class="bottomBorder draggable sortable" id="example" style="width:97% !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
 <!-- <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">-->
  <thead>
  <tr bgcolor="#FFCC33">
    <th>sl</th>
    <th>Buyer</th>
    <th>Style</th>
    <th>Color</th>
    <th>Season</th>
    <th>Sample Type </th>
    <th>Req. Qty</th>
    <th>Create-Date</th>
    <th>Sample Req. <br> Rcv</th>
    <th>Fab Booking (DPD)</th>
    <th>STO Status</th>
    <th>Agreed Sample <br>Delivery</th> 
    <th>Actual Sample <br>Submission</th>
    <th>SD</th>
    <th>DPD</th>
    <th>MM</th>   
    <th>Status</th>
    </tr>
    </thead>                        
    	<tbody>
    
     <?php


                //PER PAGE COMPONENT
                $per_page=300;
               // PAGE NO.
                if(!isset($_GET['page']))
                {
                $page=1;
                }else
                {
                $page = $_GET['page'];
                }
                if($page<=1)
                $start=0;
                else
                $start = $page * $per_page - $per_page;
				
				
if($customer!=NULL OR $status!=NULL OR $datef!=NULL OR $datel!=NULL)
{
	// $sql="select * from tb_track_info WHERE sl!='' AND STR_TO_DATE( sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' )";
	 
	 
		// $sql = "SELECT T1.* , IFNULL(T0.sto_po_no, 0) as 'sto_po_no' FROM tb_track_info T1 LEFT JOIN (SELECT T2.track_info_sl, T2.sto_po_no FROM tb_fabric_booking T2 LEFT JOIN tb_track_info T3 ON T3.sl = T2.track_info_sl WHERE T2.sto_po_no != '' AND STR_TO_DATE( T3.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) GROUP BY T2.track_info_sl) T0 ON T0.track_info_sl = T1.sl WHERE STR_TO_DATE( T1.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' )";
	 
	 
	 $sql = "SELECT T0.*, IFNULL(T1.sto_po_no, 0) AS 'sto_po_no' FROM tb_track_info T0 LEFT JOIN tb_fabric_booking T1 ON T1.track_info_sl = T0.sl WHERE STR_TO_DATE( T0.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' )";
	 
	 	 
	 if($customer!=NULL)
	 {
		$sql= $sql . " and T0.customer='$customer'" ; 
	 }
	 	 
	 if($status!=NULL)
	 {
		if($status=='Due')
		{
		$sql= $sql . " AND T0.sd_sample_reject_pass=''" ;	
		}
		else
		{
		$sql= $sql . " AND T0.sd_sample_reject_pass='$status'" ; 
		}
	 }
	 else // Checking of $status!=NULL
	 {
		$sql= $sql . " AND T0.sd_sample_reject_pass=''" ;	 
	 }
	 
	$sql= $sql . " ORDER BY T0.sl DESC" ; 
	 
}

else
{
     // $sql="select * from tb_track_info WHERE STR_TO_DATE( sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) order by sl DESC"; 
		
	//	$sql = "SELECT T1.* , IFNULL(T0.sto_po_no, 0) as 'sto_po_no' FROM tb_track_info T1 LEFT JOIN (SELECT T2.track_info_sl, T2.sto_po_no FROM tb_fabric_booking T2 LEFT JOIN tb_track_info T3 ON T3.sl = T2.track_info_sl WHERE T2.sto_po_no != '' AND STR_TO_DATE( T3.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) GROUP BY T2.track_info_sl) T0 ON T0.track_info_sl = T1.sl WHERE STR_TO_DATE( T1.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) ORDER BY T1.sl DESC ";
		
		$sql = "SELECT T0.*, IFNULL(T1.sto_po_no, 0) AS 'sto_po_no' FROM tb_track_info T0 LEFT JOIN tb_fabric_booking T1 ON T1.track_info_sl = T0.sl WHERE STR_TO_DATE( T0.sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) ORDER BY T0.sl DESC";
		
}




		 $sql .= " Limit 0, 5";
		 
		 //die($sql);
		 //die('Hello World !!!');
		
		$num_rows = mysql_num_rows(mysql_query($sql));
        $num_pages = ceil($num_rows / $per_page); 
        $sql .= " LIMIT $start, $per_page";
        $result = mysql_query($sql);
		
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
			/*$row_customer = $row['customer'] ;
			$row_style = $row['style'] ;
			$row_color = $row['color'] ;
			$row_season = $row['season'] ;*/
			
			//$serial = $row['sl'] ; // It will require when tb_fabric_booking Table will fully contain the sl fo tb_track_info.
			
			 /*$f_customer = $row['customer'] ;
			$f_style = $row['style'] ;
			$f_color = $row['color'] ;
			$f_season = $row['season'] ;
			
			
       $sql1="select sto_po_no from tb_fabric_booking WHERE buyer = '$f_customer' AND sample_style = '$f_style' AND color = '$f_color' AND season = '$f_season' AND sto_po_no != '' order by sl DESC LIMIT 0, 1"; 
		$result1=$obj->sql($sql1);
        while($row1 = mysql_fetch_array($result1))
        {
			$sto_po_no = $row1['sto_po_no'];
		}*/
		
		// die ($sql1);
			
			$fab_booking_date = $row['mm_fabricbooking_by_dpd_to_mm_date'] ;
	
			if ($fab_booking_date != '') { $booking_date = $fab_booking_date ; $c= '#D1FEC7'; }
			else { $booking_date = '<strong>Not Yet</strong>' ; $c= '#FFC1D3'; }
			
			
			$sto_po_no = $row['sto_po_no'] ;
	
			if ($fab_booking_date != '') { $booking_date = $fab_booking_date ; $c= '#D1FEC7'; }
			else { $booking_date = '<strong>Not Yet</strong>' ; $c= '#FFC1D3'; }
			
			
	?>
	 <tr>
    <td align="center"><?php echo $sl ; ?></td>
    <td align="center"><a href="chart/chart_details.php?customer=<?php echo $row['customer'] ; ?>&chk1=2" target="_blank"><?php echo $row['customer'] ; ?></a></td>
<td align="left"><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" title="View Style Details" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td align="left"><?php echo $row['color'] ; ?></td>
    <td align="center"><?php echo $row['season'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td align="center"><?php echo $row['qty'] ; ?></td>
    <?php 
	
/*   $sql2="select COUNT(*) AS 'cnt' from tb_fabric_booking WHERE buyer = '$row_customer' AND sample_style = '$row_style' AND color = '$row_color' AND season = '$row_season'";
   $results2=$obj->sql($sql2);
        while($row2 = mysql_fetch_array($results2))
        {
			$count = $row2['cnt'];
		}
*/	

	// $sql2="select * from tb_fabric_booking WHERE buyer = '$row_customer' AND sample_style = '$row_style' AND color = '$row_color' AND season = '$row_season'";
    // $results2 = mysql_query($sql2);
	// $results2=$obj->sql($sql2);
	// $count = mysql_num_rows($results2);
	 
	?>
    
  <td align="center"><?php echo $row['create_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
    <td align="center" bgcolor="<?php echo $c ; ?>"><a href="JavaScript:newPopup('fabric_booking_summary.php?buyer=<?php echo $row['customer'] ; ?>&style=<?php echo $row['style'] ; ?>&color=<?php echo $row['color'] ; ?>&season=<?php echo $row['season'] ; ?>');" style="color:#00F" title="View Fabric Booking Details"><?php echo $booking_date ; ?></a></td>
  <td align="center" style="background-color:#CCCCFF"><?php if ($row['sto_po_no'] != NULL) { echo $row['sto_po_no'] ; } else echo 'Not Create'; ?></td>
    <td align="center"><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
    <td align="center"><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#00F" title="View User Details"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td align="center"><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#00F" title="View User Details"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
    <td align="center"><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#00F" title="View User Details"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
   
	<td style="padding-right:5px; color:#000" align="center"><strong style="color:#FFF"><?php echo $row['sd_sample_reject_pass'] ; ?></strong></td>
	
   <!-- <td align="center"><?php //echo $row['sd_sample_reject_pass'] ; ?></td>-->
    </tr>
    <?php
		$sl++;
		// $sto_po_no = '';
	}
	?>
    </tbody>
    <tfoot>
    
    <tr>
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
    
    </tfoot>
</table>

<div id="pagination" align="center">
<?php
                  
                  $prev = $page - 1;
                  $next = $page + 1;
                  
                //  echo"<hr>";
                  
                  if($prev>0){
                  
                  echo"<span><a href='?page=$prev'>«Previous</a></samp> ";
                  }            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
                  echo" <b> [$number] </b> ";
                  }
                  else
                  {
                  echo"<a href='?page=$number'> $number </a> &nbsp;";
                  }
                  }
                  if($page < ceil($num_rows/$per_page))
                  echo"<a href='?page=$next'>Next »</a> ";                
                  ?>
                  
          </div>
            
</div>    

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
              
          <?php // require("re_footer1.php"); ?>
            <?php // require("re_footer.php"); ?>           
            <!-- footer -->
        
         <?php // require("re_footer_head.php"); ?>
</body></html>