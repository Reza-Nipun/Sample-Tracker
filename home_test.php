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
		  $sd_concern_sd_name=mysql_real_escape_string($_POST['sd_concern_sd_name']);		
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
            

<table align="center" class="draggable sortable" id="gradient-style" width="90%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
    
    <td width="8%">Customer - 
      <select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Customer--</option>
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
      
    
    
    
    
    <td width="8%">Brand/Dept - 
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
      
    
       
    
    <td width="8%"> Style No - 
      <input type="text" name="style" id="style"></td>
      
      
      
      
      <td width="12%">Concern SD - 
    <select name="sd_concern_sd_name" autofocus id="sd_concern_sd_name" style="font-size:11px">
          <option value="">--Select Concern SD--</option>
          <?php 
		  $SQL="select concern_name from tb_concern where concern_type='SD' group by concern_name"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['concern_name'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
    
     <td width="12%">Concern DPD - 
    <select name="dpd_name" autofocus id="dpd_name" style="font-size:11px">
          <option value="">--Select Concern dpd--</option>
          <?php 
		  $SQL="select concern_name from tb_concern where concern_type='DPD' group by concern_name"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['concern_name'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
    
      <td width="12%">Concern MM - 
    <select name="mm_name" autofocus id="mm_name" style="font-size:11px">
          <option value="">--Select Concern mm--</option>
          <?php 
		  $SQL="select concern_name from tb_concern where concern_type='MM' group by concern_name"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['concern_name'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
    
     <td width="12%">Concern Sample
    <select name="mm_name" autofocus id="mm_name" style="font-size:11px">
          <option value="">-Select Concern mm-</option>
          <?php 
		  $SQL="select concern_name from tb_concern where concern_type='Sample Coordinator' group by concern_name"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['concern_name'];
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
			<div id="demo" style="margin-top:20px; ">
<table cellpadding="0" cellspacing="0" border="1" class="display" id="example" style="width: 2500px !important; padding-bottom:10px; background-color:#FFF">
	<thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th class="col1" style="width:10px !important;">sl</th> <!--style="width: 200px !important; "-->
    <th class="col2" style="width:65px !important;"><input type="checkbox" name="col2" checked="checked" /> Customer</th>
    <th class="col3" style="width:65px !important;"><input type="checkbox" name="col3" checked="checked" /> Brand/Dept.</th>
    <th class="col4" style="width:40px !important;"><input type="checkbox" name="col4" checked="checked" /> <br>Style</th>
    <th class="col5" style="width:45px !important;"><input type="checkbox" name="col5" checked="checked" /> <br> Color</th>
    <th class="col6" style="width:75px !important;"><input type="checkbox" name="col6" checked="checked" /> <br>Season</th>
    <th class="col7" style="width:125px !important;"><input type="checkbox" name="col7" checked="checked" /> <br/> Fabric Type</th>
    <th class="col8" style="width:120px !important;"><input type="checkbox" name="col8" checked="checked" /> <br>Print Type</th>
    <th class="col9" style="width:120px !important;"><input type="checkbox" name="col9" checked="checked" /> <br>Wash Type</th>
    <th style="width:135px !important;">Product Type</th>
    <th style="width:170px !important;">Embroidery stitch</th>
    <th style="width:135px !important;">Sample Type </th>
    <th style="width:125px !important;">Sample Request Rcv Date</th>  
    <th style="width:125px !important;">Agreed Sample Delivery</th> 
    <th style="width:125px !important;">Actual Sample Submission</th>
	<th style="width:125px !important;">Concern SD</th> 
	<th style="width:125px !important;">Concern DPD</th> 
    <th style="width:125px !important;">Concern MM</th> 
    <th style="width:125px !important;">Fabric Concern</th> 
    <th style="width:125px !important;">Sweing operator</th> 
    <th style="width:125px !important;">Pattern master </th> 
    <th style="width:125px !important;">Cordinator Name</th> 
    <th style="width:125px !important;">Quality ins Name</th> 
    <th style="width:125px !important;">Sample Submission</th> 
    <th style="width:125px !important;">Submission Date</th> 
    <th style="width:125px !important;">Ontime / Delay</th> 
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
	  </tr>    
    
	</thead>
	<tbody>
    
    <?php
	
	if($customer!=NULL OR $brand_style_search!=NULL OR $style!=NULL OR $sd_concern_sd_name!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!=''";
	 if($customer!=NULL)
	 {
		$sql= $sql . "and customer='$customer'" ; 
	 }
	 if($brand_style_search!=NULL)
	 {
		$sql= $sql . " and brand_style='$brand_style_search'" ; 
	 }
	 if($style!=NULL)
	 {
		$sql= $sql . "and style='$style'" ; 
	 }
	 if($sd_concern_sd_name!=NULL)
	 {
		$sql= $sql . "and sd_concern_sd_name='$sd_concern_sd_name' " ; 
	 }
	 
}
else
{
        $sql="select * from tb_track_info order by sl DESC"; 
}
  $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	
	?>
    
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?></td>
			<td width=""><?php echo $row['customer'] ; ?></td>
			<td><?php echo $row['brand_style'] ; ?></td>
			<td><?php echo $row['style'] ; ?></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
			<td><?php echo $row['wash_type'] ; ?></td>
			<td><?php echo $row['product_type'] ; ?></td>
			<td><?php echo $row['embroidery_stitch'] ; ?></td>
			<td><?php echo $row['sd_sample_type_name'] ; ?></td>
			<td><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
			<td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
			<td><?php echo $row['sd_concern_sd_name'] ; ?></td>
			<td><?php echo $row['sd_concern_dpd_name'] ; ?></td>
			<td><?php echo $row['sd_concern_mm_name'] ; ?></td>
			<td><?php echo $row['sd_fabric_concern_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['sample_sweing_operators_name'] ; ?></td>
			<td><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></td>
			<td><?php echo $row['sample_sample_final_quality_ins_name'] ; ?></td>
			<td><?php echo $row['sample_sample_rvwd_by_sd_dpd_prior_submission'] ; ?></td>
			<td><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
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





		</div>
			<br>
<br>
<br>
<br>

            
            <form>

    <input type="checkbox" name="col02" checked="checked" /> Customer 
    <input type="checkbox" name="col3" checked="checked" /> Brand/Dept 
    <input type="checkbox" name="col4" checked="checked" />  Style
    <input type="checkbox" name="col5" checked="checked" />  Color 
    <input type="checkbox" name="col6" checked="checked" /> Sample Type 
    <input type="checkbox" name="col7" checked="checked" /> Season
    <input type="checkbox" name="col8" checked="checked" /> Fabric Type
    <input type="checkbox" name="col9" checked="checked" /> Print Type
    <input type="checkbox" name="col10" checked="checked" /> Product Type

    </form>
	
    
    
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
        

</body>
</html>