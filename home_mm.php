
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
	
		if (isset($_POST['search']))
 		{
		  $customer=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		  $style=mysql_real_escape_string($_POST['style']);	
		  $color=mysql_real_escape_string($_POST['color']);
		  $season=mysql_real_escape_string($_POST['season']);		
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

            <table align="center" style="position:fixed ; margin-left:25px" class="bottomBorder" id="gradient-style" width="90%" border="1" cellspacing="0" cellpadding="0">
              <tr align="center" style="font-weight:bold; font-size:11px">
                
                <td width="8%">
                  <select name="customer" autofocus id="customer" style="font-size:11px">
                      <option value="">--Select Buyer--</option>
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
                    </select>
                </td>
                  <!--<input type="text" name="brand_style" id="brand_style">-->
                  
                
                   
                
                <td width="8%">
                  <input type="text" name="style" placeholder="Style No" id="style"></td>
                  
                  
                  
                  
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
                
                 <td width="12%">
            
                   <select name="color" autofocus id="color" style="font-size:11px">
                     <option value="">--Select color--</option>
                     <?php 
                      $SQL="select color from tb_track_info group by color"; 
                            $result=$obj->sql($SQL);
                            while($row=mysql_fetch_array($result))
                            {
                                $dis=$row['color'];
                                echo '<option value="'.$dis.'">'.$dis.'</option>';
                                                
                            }
                                         
                       ?>                     
                     
                     </select>
                 </td>
                 <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
                
                <td width="10%"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
                </tr></table>
            
        </form>
</div>
			<div id="demo" style="margin-top:80px; ">

<form action="home_mm_update.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width: 3000px !important; padding-bottom: 10px; background-color: #FFF; color:#000">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr  style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th>sl</th> <!--style="width: 200px !important; "-->
    <th> Customer</th>
    <th> Brand/Dept.</th>
    <th>Style</th>
    <th>Color</th>
    <th>Season</th>
    <th>Qty</th>
    <th>Fabric Type</th>
    <th>Print Type</th>
    <th>Wash Type</th>
    <th>Product Type</th>
    <th>Embroidery stitch</th>
    <th>Sample Type </th>
    <th>Sample Request Rcv (Date)</th>  
    <th>Agreed Sample Delivery</th> 
    <th>Concern SD</th> 
	<th>Concern DPD</th> 
    <th>Fabric Concern</th> 
    <th>Sweing operator</th> 
    <th>Pattern master </th> 
    <th>Sample Cordinator Name</th> 
    <th>Quality ins Name</th> 
    <th>Sample Submission</th>
    <th>Labdip req sent to Lab (DPD)</th>
    <th>labdip actual date (DPD)</th>
    <th>Fab receive planned (Date)</th>
    <th style="background-color:#FF9">Fab receive Actual (Date)</th>
    <th style="background-color:#FF9"">Fabric Booking By DPD to MM (Date) </th>
    <th >Trims In-Fty- Planned (Date) </th>
    <th style="background-color:#FF9">Trims In-Fty- Actual (Date) </th>
    <th>Actual Submission (Date)</th> 
    <th style="width:125px !important;">Sample Reject/Pass</th> 
	</tr>
    
		<tr>
			<td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /></td>
			<td><input type="text" name="search_browser" value="Customer" class="search_init" /></td>
			<td><input type="text" name="search_platform" value="Brand/Dept" class="search_init" /></td>
			<td><input type="text" name="search_version" value="Style" class="search_init" /></td>
			<td><input type="text" name="search_grade" value="Color" class="search_init" /></td>
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
    
	</thead>
	<tbody>
    
    <?php
	 
	 $sql="select * from tb_track_info WHERE sd_concern_mm_name='$user_name' AND (fab_receive_actual_date= '' OR mm_fabricbooking_by_dpd_to_mm_date = '' OR mm_trims_actual_date = '')";
	 
	if($customer!=NULL OR $brand_style_search!=NULL OR $style!=NULL OR $season!=NULL OR $color!=NULL)
{
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
	 if($color!=NULL)
	 {
		$sql= $sql . " and color='$color' " ; 
	 }
	  if($season!=NULL)
	 {
		$sql= $sql . " and season='$season' " ; 
	 }
	 
	 $sql= $sql . " order by sl DESC " ;
	 
}
else
{
        $sql .= " order by sl DESC"; 
}
  
  //die($sql);
  
  $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	?>    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?> </td>
			<td valign="middle"><label><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['sl']; ?>"> &nbsp; <?php echo $row['customer'] ; ?></label></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><?php echo $row['style'] ; ?></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['qty'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['embroidery_stitch'] ; ?></td>
			<td><?php echo $row['sd_sample_type_name'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
			<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036">
			<?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['dpd_concern_sample_coordinator_name'] ; ?>&rule=4');" style="color:#036"><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></a></td>
			<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><?php echo $row['dpd_labdip_req_sent_to_lab_date'] ; ?></td>
			<td><?php echo $row['dpd_labdip_actual_date'] ; ?></td>
			<td><?php echo $row['fab_receive_planned_date'] ; ?></td>
			<td><?php echo $row['fab_receive_actual_date'] ; ?></td>
			<td><?php echo $row['mm_fabricbooking_by_dpd_to_mm_date'] ; ?></td>
			<td><?php echo $row['dpd_trims_planned_date'] ; ?></td>
			<td><?php echo $row['mm_trims_actual_date'] ; ?></td>
	<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
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
            <td class="center"><?php echo $c1 ; ?></td>
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


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />

</form> 

		</div>
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