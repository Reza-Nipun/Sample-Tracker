<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	
	
	/*$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
	$date=$datex->format('m-d-Y');
	$datex->modify('-3600 seconds');									
	$datex=$datex->format("m-d-Y H:i:s");*/

	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}

$row=0;
	foreach($_POST['checkbox'] as $rowz=>$checkbox)
{
$checkbox=$checkbox;

$gdl_cut_panel = $_POST['gdl_cut_panel'][$rowz] ;
$gdl_cut_panel_dlv = $_POST['gdl_cut_panel_dlv'][$rowz] ;
$gdl_comnt = $_POST['gdl_comnt'][$rowz] ;
$gdl_status= $_POST['gdl_status'][$rowz] ;
$gdl_print_type = $_POST['gdl_print_type'][$rowz] ;


$SQL="UPDATE  `tb_track_info` SET  gdl_cut_panel= '$gdl_cut_panel',
gdl_cut_panel_dlv = '$gdl_cut_panel_dlv',
gdl_print_type = '$gdl_print_type',
gdl_id = '$uid',
gdl_date='$sys_date' ,
gdl_comnt = '$gdl_comnt',
gdl_status='$gdl_status'
 WHERE  `tb_track_info`.`sl` ='$checkbox' ";

// die ($SQL) ;
$obj->sql($SQL);

$a='<div align="center"><font color="green" style="font-size:18px; font-weight:bold"> Sample Style  Update Successfully .</font></div>' ;

$row++ ;
}
	
	
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta charset="utf-8" />
	
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
			
</div>
			<div id="demo" style="margin-top:20px; ">
            
            <?php echo $a ; ?>

<form action="home_gdl_workspace_update1.php" method="post" enctype="multipart/form-data">    
       
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:1500px; padding-bottom: 10px; background-color: #FFF; color: #000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th>sl</th> <!--style="width: 200px !important; "-->
    <th>Buyer</th>
    <th>Style</th>
    <th style="width:80px">Color</th>
    <th style="width:80px">Season</th>
    <th>Qty</th>
    <th style="width:80px">Fabric Type</th>
    <th style="width:80px">Print Type</th>
    <th>Product</th>
    <th>Embroidery</th>
    <th style="width:150px">Sample Submit Date</th>
    <th align="center" style="width:60px; background-color:#CCCCFF">GDL Cut Panel Rcv</th>
    <th style="background-color:#CCCCFF">GDL Cut Panel Dlv</th>
    <th style="background-color:#CCCCFF">GDL Comt</th>
    <th style="background-color:#CCCCFF">GDL Status</th>
    <th style="background-color:#CCCCFF">Print Type</th>
    <th style="width:100px">SD Comt</th>
    <th style="width:100px">DPD Comt</th>  
    <th style="width:100px">MM Comt</th> 
    <th>Sample</th>
	<th style="width:100px">GDL Comt</th> 
	</tr>
    
    <tr>
        <td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /></td>
        <td><input type="text" name="search_browser" value="Customer" class="search_init" /></td>
        <td><input type="text" name="search_version" value="Style" class="search_init" /></td>
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
		$rowz = 0;
		$sl=1;	
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
        $sql="select * from tb_track_info WHERE sl='$checkbox'"; 
		// die ($sql);
  		$result = mysql_query($sql);
		$result=$obj->sql($sql);	
        while($row = mysql_fetch_array($result))
		{
	
	?>
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?> </td>
			<td valign="middle"><input name="checkbox[]" checked type="hidden" id="checkbox[]" value="<?php echo $row['sl']; ?>"> &nbsp; <?php echo $row['customer'] ; ?></td>
			<td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
			<td><?php echo $row['color'] ; ?><label style="background-color:<?php echo $row['color_code'] ; ?>; line-height:5px"> &nbsp; </label></td>
			<td><?php echo $row['season'] ; ?></td>
			<td><?php echo $row['qty'] ; ?></td>
			<td><?php echo $row['fabric_type'] ; ?></td>
			<td><?php echo $row['print_type'] ; ?></td>
		  <td><?php echo $row['product_type'] ; ?></td>
		  <td><?php echo $row['embroidery_stitch'] ; ?></td>
		  <td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
		  <td><input name="gdl_cut_panel[]" value="<?php echo $row['gdl_cut_panel'] ; ?>" size="15px" tabindex="1"></td>
		  <td><input name="gdl_cut_panel_dlv[]" value="<?php echo $row['gdl_cut_panel_dlv'] ; ?>" size="15px" tabindex="2"></td>
		  <td><textarea name="gdl_comnt[]" onClick="select()" tabindex="3" rows="3" cols="20" ><?php echo $row['gdl_comnt'] ; ?></textarea></td>
		  <td><select name="gdl_status[]" tabindex="4">
                  <option>Select</option>
                  <option value="<?php echo $row['gdl_status'] ; ?>" selected="selected"><?php echo $row['gdl_status'] ; ?></option>
                    <option value="Delivered">Delivered</option>
                    <option value="Not Delivered">Not Delivered</option>
                    <option value="Partial">Partial</option>
        		</select>
          </td>
		  <td><select name="gdl_print_type[]" tabindex="5">
            <option value="">Select Type</option>

             <option value="<?php echo $row['gdl_print_type'] ; ?>" selected><?php echo $row['gdl_print_type'] ; ?></option>
			  <?php
         $SQL8="select concern_name from tb_concern where concern_type like 'gdl_print' order by concern_name ASC";
                            $obj->sql($SQL8);
                            while($row8 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row8['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
		    </select></td>
          <td><?php echo $row['cmt_sd'] ; ?></td>
		  <td><?php echo $row['cmt_dpd'] ; ?></td>
		  <td><?php echo $row['cmt_mm'] ; ?></td>
		  <td><?php echo $row['cmt_sample'] ; ?></td>
		  <td><?php echo $row['gdl_comnt'] ; ?></td>
		</tr>
        
               <?php
		
		$sl++ ;
		  } 
		}
		?>
        
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