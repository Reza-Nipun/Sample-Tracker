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


//echo $date1 ;

//echo $date2 ;
?>




<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>


<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>


        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
                        <?php echo $row['sd_sample_type_name'] ; ?><br>
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
<form></form>

                        
                          <section class="span12">
                            
                      <form action="report.php" method="post">    
                    
       <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
    <th colspan="5" style="color:#000" scope="col"><h2>Sample Due list By Agreed Sample Delivery Date From <?php echo $date1 ; ?> to <?php echo $date2 ; ?> </h2></th>
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
<!-- <a href="signup.php" tabindex="5"> Sign Up</a>&nbsp;
 <strong>|</strong> <a href="forget.php" tabindex="5">Forgot Your Password?</a>-->
   


                                                  
                            
                  
                          </section>
                            
                          <!--  <section class="span12"></section>
                            <div class="span12">
                          </div>-->
                        </div>
                    </div>
                </div>
            </section> 
            <!-- page content -->
            </div>
            <!-- footer --> 
            <div id="demo">
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:1600px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
 <!-- <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">-->
  <thead>
  <tr>
    <th>sl</th>
    <th>Buyer</th>
    <th>Style</th>
    <th>Color</th>
    <th>Season</th>
    <th>Sample Type </th>
    <th>Create Date</th>
    <th>Sample Request Rcv</th>  
    
    <th>Agreed Sample Delivery</th> 
    <th>Actual Sample Submission</th>
    <th>Sd Person</th>
    <th>DPD Person</th>
    <th>MM Person</th>   
    <th>Status</th>
    </tr>
    </thead>                        
    	<tbody>
    
     <?php


      /*          //PER PAGE COMPONENT
                $per_page=1000;
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
				
	*/			
if($customer!=NULL OR $brand_style_search!=NULL OR $style!=NULL OR $sd_concern_sd_name!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!=''";
	 if($customer!=NULL)
	 {
		$sql= $sql . " and customer='$customer'" ; 
	 }
	 if($brand_style_search!=NULL)
	 {
		$sql= $sql . " and brand_style='$brand_style_search'" ; 
	 }
	 if($style!=NULL)
	 {
		$sql= $sql . " and style='$style'" ; 
	 }
	 if($sd_concern_sd_name!=NULL)
	 {
		$sql= $sql . " and sd_concern_sd_name='$sd_concern_sd_name' " ; 
	 }
	 
}
else
{
        $sql="select * from tb_track_info WHERE STR_TO_DATE( sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) order by sl DESC"; 
}
	//	$num_rows = mysql_num_rows(mysql_query($sql));
    //    $num_pages = ceil($num_rows / $per_page); 
   //     $sql .= " LIMIT $start, $per_page";
        $result = mysql_query($sql);
		//die($sql) ;
		
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	?>	
	 <tr>
    <td align="center"><?php echo $sl ; ?></td>
    <td align="center"><?php echo $row['customer'] ; ?></a></td>
    <td align="center"><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td align="center"><?php echo $row['color'] ; ?></td>
    <td align="center"><?php echo $row['season'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td align="center"><?php echo $row['create_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
    
    
    <?php if($row['sd_sample_reject_pass']=='pass') 
	         {
				 $c="#093" ;
				 $c1="Pass";
			 }
	elseif ($row['sd_sample_reject_pass']=='reject')
	         {
			   $c="#FF0000" ;
			   $c1="Reject";
			  }
			  else
			  {
				 $c='';
				 $c1='';
			  }
			  ?>
	<td bgcolor="<?php echo $c ; ?>" style="padding-right:5px; color:#000" align="center"><strong style="color:#FFF"><?php echo $c1 ; ?></strong></td>
            
	
	
   <!-- <td align="center"><?php //echo $row['sd_sample_reject_pass'] ; ?></td>-->
    </tr>
                      	  <?php
		$sl++;
	}
	?>
    </tbody>
    <tfoot>
    
    <tr>
    <td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
    <td><input type="text" name="Buyer"  value="Buyer" class="search_init" /></td>
    <td><input type="text" name="Style" size="2" value="Style" class="search_init" /></td>
    <td><input type="text" name="Color" size="2" value="Color" class="search_init" /></td>
    <td><input type="text" name="Season" size="2" value="Season" class="search_init" /></td>
    <td><input type="text" name="Sample Type" size="2" value="Sample Type" class="search_init" /></td>
    <td><input type="text" name="Create Date" size="2" value="Create Date" class="search_init" /></td>
    <td><input type="text" name="Sample Request Rcv" size="2" value="Sample Request Rcv" class="search_init" /></td>
    <td><input type="text" name="Agreed Sample Delivery" size="2" value="Agreed Sample Delivery" class="search_init" /></td>
    <td><input type="text" name="Actual Sample Submission" size="2" value="Actual Sample Submission" class="search_init" /></td>
    <td><input type="text" name="SD Person" size="2" value="SD Person" class="search_init" /></td>
    <td><input type="text" name="DPD Person" size="2" value="DPD Person" class="search_init" /></td>
    <td><input type="text" name="MM Person" size="2" value="MM Person" class="search_init" /></td>
    <td>&nbsp;</td>
    </tr>
    
    </tfoot>
</table>

<?php
                  
  /*                $prev = $page - 1;
                  $next = $page + 1;
                  
                  echo"<hr>";
                  
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
				  */
				      
                  ?>
            
            </div>    
            
           

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf-8">
			var asInitVals = new Array();
			
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
					}
				} );
				
				
				
				$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );
				
				
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
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