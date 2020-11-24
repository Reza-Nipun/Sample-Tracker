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
font-size:15px;
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
                                   <div class="container clearfix">
<h1 class="span8" style="height:42px">

<span>Samples Tracker (Embroidery) </span></h1>
                        <div class="span4" style="color:#000"> 
    
                        </div>
                    </div>
                </header>
                <div class="slice clearfix">
                    <div class="container"> 
                        
                        <div class="row">
                          <div class="span12">
                          </div>
                          <br>



						<section class="span12">
                        
                      <form action="report_gdl.php" method="post">    
                    
       <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
    <th colspan="5" style="color:#000" scope="col"><h2>Embroidery Sample Work From <?php echo $date1 ; ?> to <?php echo $date2 ; ?> </h2></th>
    </tr>
  <tr>
    <th scope="col" style="color:#000">Date from</th>
    <th scope="col" align="center"><input name="datef" class="rounded" type="text" id="datef" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></th>
    <th scope="col" style="color:#000">Date To</th>
    <th scope="col" align="center"><input name="datel" class="rounded" type="text" id="datel" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></th>
    <th scope="col" align="center"><input name="Submit" type="submit" class="btn btn-success" id="Submit" tabindex="4" value="Submit">
      <input name="input2" type="reset" tabindex="5" class="btn btn-danger" value="Reset"></th>
  </tr>
  </table>
 
</form>
						</section>
         
                        
                        
<section class="span12">
<h2>BUYER WISE SAMPLE SUMMARY VIEW</h2>

<table id="gradient-style" align="left" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" bgcolor="#A0F21B">
  <tr>
    <th width="5%" style="font-size:16px; font-weight:bold; color:#000; font-color:#000">sl</th>
    <th width="35%" style="font-size:16px; font-weight:bold; color:#000; font-color:#000"><strong>Buyer</strong></th>
    <th width="20%"style="font-size:16px; font-weight:bold; color:#000; font-color:#000">Tiotal Cut Panel Rcv</th>
    <th width="20%"style="font-size:16px; font-weight:bold; color:#000; font-color:#000">Total Cut Panel Dlv</th>
    </tr>
    </thead>                        
    
    
     <?php
	 
	// $t=0 ;
	 $sl1=1;
	 
	 $tcp1=0 ;
	 $tcpd2=0 ;
	 	
	  // $SQL3 = "SELECT T0.customer, T0.ttl, T1.cnt AS 'count', (T0.ttl-T1.cnt) AS 'pending' FROM (SELECT  customer , COUNT( style ) AS ttl FROM  `tb_track_info` GROUP BY  customer) T0 LEFT JOIN (SELECT  customer ,  COUNT(style) AS cnt FROM  tb_track_info WHERE  mm_fabricbooking_by_dpd_to_mm_date !=  '' GROUP BY customer) T1 on T1.customer = T0.customer ";
	
	
	// $SQL3a = "SELECT T0.customer, T0.ttl , COALESCE(T1.cnt, 0) AS 'cnt', COALESCE((T0.ttl-T1.cnt), 0) AS 'Pending' FROM (SELECT  customer , COUNT( style ) AS ttl FROM  `tb_track_info` GROUP BY  customer) T0 LEFT JOIN (SELECT  customer ,  COUNT(style) AS cnt FROM  tb_track_info WHERE  mm_fabricbooking_by_dpd_to_mm_date !=  '' GROUP BY customer) T1 on T1.customer = T0.customer";
	
	
	 $SQL3 = "SELECT customer , SUM(emb_cut_panel) AS tcp, SUM(emb_cut_panel_dlv) as tcpd, emb_date FROM  `tb_track_info` WHERE STR_TO_DATE( emb_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) GROUP BY customer ORDER BY customer ASC "; // The Avobe $SQL3a Query is also Correct
	
	$results3 = $obj->sql($SQL3);
	while($row3 = mysql_fetch_array($results3))
	{
	
	
	?>	
    
  <tr style="color:#000">
    <td align="center"><?php echo $sl1 ; ?></td>
    <td align="center"><a href="chart/chart_details.php?customer=<?php echo $row3['customer'] ; ?>&chk1=2" target="_blank"><?php echo $row3['customer'] ; ?></a></td>
    <td align="center"><?php echo $row3['tcp'] ; ?></td>
    <td align="center"><?php echo $row3['tcpd'] ; ?></td>
    </tr>
	
    <?php
	$tcp1=$tcp1+$row3['tcp'] ;
	$tcpd2=$tcpd2+$row3['tcpd'] ;
	
	
		$sl1++;
	}
	?>
     <tr style="color:#000">
	   <td align="center">&nbsp;</td>
	   <td align="center"><strong>Total</strong></td>
	   <td align="center"><strong><?php echo $tcp1 ; ?></strong></td>
       <td align="center"><strong><?php echo $tcpd2 ; ?></strong></td>
       </tr>
</table>
</section>
                        
<hr/>
<span class="span12">.</span>
  <br/>    

                        
<section class="span12">
<h2>PRINT TYPE WISE SAMPLE SUMMERY VIEW</h2>

<table id="gradient-style" align="left" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
  <tr>
    <th width="5%" style="font-size:16px; font-weight:bold; color:#000; font-color:#000">sl</th>
    <th width="35%" style="font-size:16px; font-weight:bold; color:#000; font-color:#000"><strong>Embroidery Type</strong></th>
    <th width="20%"style="font-size:16px; font-weight:bold; color:#000; font-color:#000">Tiotal Cut Panel Rcv</th>
    <th width="20%"style="font-size:16px; font-weight:bold; color:#000; font-color:#000">Total Cut Panel Dlv</th>
    </tr>
    </thead>                        
    
     <?php
	 
	// $t=0 ;
	 $sl1=1;
	 $tcp1x=0 ;
	 $tcpd2x=0 ;
	
	$SQL="SELECT emb_emb_type , SUM(emb_cut_panel) AS tcpx, SUM(emb_cut_panel_dlv) as tcpdx, emb_date FROM  `tb_track_info` WHERE STR_TO_DATE( emb_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) GROUP BY emb_emb_type ORDER BY emb_emb_type ASC"; 
$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{       
 
	?>	
	<tr style="color:#000">
    <td align="center"><?php echo $sl1 ; ?></td>
    <td align="center"><?php echo $row['emb_emb_type'] ; ?></td>
    <td align="center"><?php echo $row['tcpx'] ; ?></td>
    <td align="center"><?php echo $row['tcpdx'] ; ?></td>
    </tr>
	
    <?php
	$tcp1x=$tcp1x+$row['tcpx'] ;
	$tcpd2x=$tcpd2x+$row['tcpdx'] ;
						  
		$sl1++;
	}
	?>
     <tr style="color:#000">
	 <td align="center">&nbsp;</td>
	 <td align="center"><strong>Total</strong></td>
	 <td align="center"><strong><?php echo $tcp1x ; ?></strong></td>
     <td align="center"><strong><?php echo $tcpd2x ; ?></strong></td>
	 </tr>
     
</table>
</section>
<hr/>
<span class="span12">.</span>
  <br/>    
                        
                          <section class="span12"><!-- <a href="signup.php" tabindex="5"> Sign Up</a>&nbsp;
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
            <!-- footer --><script type="text/javascript" charset="utf-8">
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