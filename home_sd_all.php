<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$search = 0;
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
	
	$date_form = date('d-m-Y', strtotime('-7 days'));
	$date_to = date('d-m-Y');
	
	
		if (isset($_POST['search']))
 		{
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		  $sample_type=mysql_real_escape_string($_POST['sample_type']);
		  $style=mysql_real_escape_string($_POST['style']);	
		  $color=mysql_real_escape_string($_POST['color']);
		  $season=mysql_real_escape_string($_POST['season']);	
		  $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  
			$search = 1;
		}
	

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
        <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
    
        
        
  <?php  require("re_head.php"); ?>
        
	</head>
<body>

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
        <!--<div id="globalWrapper" style="position:fixed; width:100%">-->
        
            <!-- page content -->
            <!-- <section id="content" class="columnPage">
                <header class="headerPage">
				<?php // require("re_header_page.php"); ?>
                </header>
                
                </section> --><!--</div>-->
              <!--  for SD only-->
   
<div width="80%"  style="margin-top:10px; ">
			<form action="" method="post">
            

<table align="center" class="bottomBorder" id="gradient-style" width="70%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
    
    <td width="8%">
      <select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Buyer-</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' group by concern_name";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select></td>
      
    
    
    
    
    <td width="8%">
      <select name="brand_style" autofocus id="brand_style" style="font-size:11px">
        <option value="">--Select Brand--</option>
        <?php
         $SQL="select brand_style from tb_track_info group by brand_style";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['brand_style'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
    <td width="8%">
    
    <select name="sample_type" autofocus id="sample_type" style="font-size:11px">
        <option value="">--Sample Type--</option>
        <?php
         $SQL="select concern_name FROM tb_concern WHERE concern_type = 'SAMPLE TYPE'";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
    
    </td>   
       
    
    <td width="8%"> 
      <input type="text" name="style" placeholder="Style" id="style"></td>
      
      
      
      
      <td width="12%">

    <select name="season" autofocus id="season" style="font-size:11px">
          <option value="">--Select season--</option>
          <?php 
		  $SQL="select season from tb_track_info group by season"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['season'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
    
     <td width="12%"><select name="color" autofocus id="color" style="font-size:11px ; width:55px">
       <option value="">Color</option>
       <?php 
		  $SQL="select color from tb_track_info group by color"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['color'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>
     </select></td>
     <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
     
 <td width="10%"><input name="date" class="rounded" type="text" id="date" value="" placeholder="(Create Date From)" tabindex="2" onclick="showCalendarControl(this);" /></td>
 <td width="10%"><input name="date1" class="rounded" type="text" id="date1" value="" placeholder="(Create Date To)" tabindex="2" onclick="showCalendarControl(this);" /></td>
    
    <td width="10%"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>


            
            </form>
</div>


	<h2 style="padding-left:420px; color:#060">Showing Data from <?php echo $date_form; ?> to <?php echo $date_to; ?></h2>


<?php 
//if ($search == 1)
//{

?>
<div id="demo" style="margin-top:20px; ">
  
  <form action="home_sd_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width: 3000px !important; padding-bottom:10px; background-color:#FFF">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th>sl</th> <!--style="width: 200px !important; "-->
    <th> Buyer</th>
    <th> Brand/Dept.</th>
    <th>Style</th>
    <th>Color</th>
    <th>Season</th>
    <th>Sample Type </th>
    <th>Req Qty</th>
    <th>Sample Request Rcv (Date)</th>  
    <th>Agreed Sample Delivery (Date)</th> 
    <th>Concern SD</th> 
	<th>Concern DPD</th>
	<th style="background-color:#F90;">Actual Sample Submission (Date)</th>
	<th style="background-color:#F90;">Sample<br/>
	  Reject/Pass</th> 
    <th>Concern MM</th> 
    <th>Fabric Concern</th> 
    <th>Sweing operator</th> 
    <th>Pattern master </th> 
    <th>Cordinator Name</th> 
    <th>Quality ins Name</th>
    <th style="background-color:#F90;">PDM/TechPack Rcvd by SD &amp; Forward to DPD (Date)</th>
    <th style="background-color:#F90;">Clarificaition of Missing Info Arrange the Confirmation from buyer (Date)</th>
    <th>Fabric Type</th>
    <th >Print Type</th>
    <th>Wash Type</th>
    <th>Product Type</th>
    <th>Embroidery stitch</th> 
    <th>Sample Submission</th>
    <th>Strikeoff Approval Planned sending (Date)</th>
    <th style="background-color:#F90;">Strikeoff Approval Actual sending (Date)</th>
    <th>Strikeoff Approval Required (Date)</th>
    <th style="background-color:#F90;">Strikeoff Approval Received (Date)</th> 
    <th>Ontime / Delay</th> 
    <th>Remark</th> 
	</tr>
    

		<tr bgcolor="#FFCCCC">
			<td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /></td>
			<td><input type="text" name="search_browser" value="Customer" class="search_init" /></td>
			<td><input type="text" name="search_platform" value="Brand/Dept" class="search_init" /></td>
			<td><input type="text" name="search_version" value="Style" class="search_init" /></td>
			<td><input type="text" name="search_grade" value="Color" class="search_init" /></td>
			<td><input type="text" name="search_grade" placeholder="Season" class="Season" /></td>
			<td><input type="text" name="search_grade" placeholder="sample Type" class="Sample Type" /></td>
			
            
			<td><input type="text" name="search_platform" value="Qty" class="search_init" /></td>
			<td><input type="text" name="search_version" value="Request Date" class="search_init" /></td>
			<td><input type="text" name="search_grade" value="Agreed Delv Date" class="search_init" /></td>
			<td><input type="text" name="search_grade" placeholder="SD Name" class="Season" /></td>
			<td><input type="text" name="search_grade" placeholder="DPD Name" class="Sample Type" /></td>

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
     		<td><input type="text" name="search_grade" placeholder="Fabric Type" class="Fabric Type" /></td>
     		<td><input type="text" name="search_grade" placeholder="Print Type" class="Print Type" /></td>
     		<td><input type="text" name="search_grade" placeholder="Wash Type" class="Wash Type" /></td>
     		<td><input type="text" name="search_grade" placeholder="Product Type" class="Product Type" /></td>
     		<td><input type="text" name="search_grade" placeholder="Embrodery stitch" class="Embrodery stitch" /></td> 
     		<td>&nbsp;</td>
     		<td>&nbsp;</td>
     		<td>&nbsp;</td>
     		<td>&nbsp;</td>
     		<td>&nbsp;</td> 
     		<td>&nbsp;</td> 
     		<td>&nbsp;</td> 
	    </tr>

	</thead>
	<tbody>
    
    <?php
	
	if($customer!=NULL OR $brand_style_search!=NULL OR $sample_type!=NULL OR $style!=NULL OR $season!=NULL OR $color!=NULL OR $date!=NULL OR $date1!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!='' ";
	 if($customer!=NULL)
	 {
		$sql= $sql . " and customer='$customer'" ; 
	 }
	 if($brand_style_search!=NULL)
	 {
		$sql= $sql . " and brand_style='$brand_style_search'" ; 
	 }
	 if($sample_type!=NULL)
	 {
		$sql= $sql . " and sd_sample_type_name='$sample_type'" ; 
	 }
	 if($style!=NULL)
	 {
		$sql= $sql . " and style='$style'" ; 
	 }
	 if($color!=NULL)
	 {
		$sql= $sql . " and color='$color' " ; 
	 }
	  if($season!=NULL)
	 {
		$sql= $sql . " and season='$season' " ; 
	 }
	
	if($date!=NULL && $date1==NULL)
	 {
	 $sql= $sql . " and create_date='$date'" ; 
	 }
	 
	if($date!=NULL && $date1!=NULL)
	 {
	// $sql= $sql . " and create_date='$date'" ;
	 
$sql= $sql . " and STR_TO_DATE( create_date, '%d-%m-%Y' ) between STR_TO_DATE( '$date', '%d-%m-%Y' ) and STR_TO_DATE( '$date1', '%d-%m-%Y')";
	 }
	 
	 
	 $sql= $sql . " order by sl DESC" ;
	 
}
else
{
        $sql="select * from tb_track_info WHERE STR_TO_DATE(create_date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$date_form', '%d-%m-%Y') and STR_TO_DATE('$date_to', '%d-%m-%Y') order by sl DESC"; 
}

//die ($sql);

  $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	
	?>
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?> </td>
			<td valign="middle"> <?php echo $row['customer'] ; ?></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['sd_sample_type_name'] ; ?></td>
			<td><?php echo $row['qty'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036">
			<?php echo $row['sd_concern_sd_name'] ; ?></a></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036">
			<?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<td class="center"><?php echo $c1 ; ?></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
			<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
			<td><?php echo $row['sd_techpack_rcv_fwrd_date'] ; ?></td>
			<td><?php echo $row['sd_clarification_arng_confrm_from_buyer_date'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['embroidery_stitch'] ; ?></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_planned_sending_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_actual_sending_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_approval_required_date'] ; ?></td>
			<td><?php echo $row['dpd_strikeoff_approval_rcvd_date'] ; ?></td>
			<td><?php echo $row['sd_sample_ontime_delay'] ; ?></td>
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
				 $c1=$row['sd_sample_reject_pass'];
			  }
			  ?>
            <td class="center"><?php echo $row['cmt_sd'] ; ?></td>
		</tr>
        
        <?php $sl++ ; } ?>
        
<!--		<tr class="gradex">
		  <td>2</td>
			<td>Trident</td>
			<td>Internet
				 Explorer 5.0</td>
			<td>soeab</td>
			<td>&nbsp;</td>
			<td>Win 95+</td>
			<td class="center">5</td>
			<td class="center">C</td>
		</tr>-->

	</tbody>
    
</table>
    
<br>
&nbsp;
</form> 

		</div>
        
<?php 
//}
?>
			<br>
<br>
<br>
<br>

            
          <!--  <form>

    <input type="checkbox" name="col02" checked="checked" /> Customer 
    <input type="checkbox" name="col3" checked="checked" /> Brand/Dept 
    <input type="checkbox" name="col4" checked="checked" />  Style
    <input type="checkbox" name="col5" checked="checked" />  Color 
    <input type="checkbox" name="col6" checked="checked" /> Sample Type 
    <input type="checkbox" name="col7" checked="checked" /> Season
    <input type="checkbox" name="col8" checked="checked" /> Fabric Type
    <input type="checkbox" name="col9" checked="checked" /> Print Type
    <input type="checkbox" name="col10" checked="checked" /> Product Type

    </form>-->
	
    
    
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
        
        
<!--        
        <script>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});
</script>
		-->

</body>
</html>