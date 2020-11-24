<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
     $sys_date= date("d-m-Y");
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];		
	}
	
	
	$rowz=1;
	foreach($_POST['checkbox'] as $rowz=>$checkbox)
{
$checkbox=$checkbox;
	//$namer= mysql_real_escape_string($_POST['namer'][$row]);

		
$f_color= mysql_real_escape_string($_POST['f_color'][$rowz]);
	$fabrication= mysql_real_escape_string($_POST['fabrication'][$rowz]);
		$composition= mysql_real_escape_string($_POST['composition'][$rowz]);
			$gsm= mysql_real_escape_string($_POST['gsm'][$rowz]);
				$fab_wash= mysql_real_escape_string($_POST['fab_wash'][$rowz]);
					$dia= mysql_real_escape_string($_POST['dia'][$rowz]);
						$c_code= mysql_real_escape_string($_POST['c_code'][$rowz]);
						  $remarks= mysql_real_escape_string($_POST['remarks'][$rowz]);
 							$s_color= mysql_real_escape_string($_POST['s_color'][$rowz]); // May has no need, Plz check it !!!
								$item_cat= mysql_real_escape_string($_POST['item_cat'][$rowz]);
									$comments= mysql_real_escape_string($_POST['comments'][$rowz]);
										$yarn_count= mysql_real_escape_string($_POST['yarn_count'][$rowz]);					
												$labdip= mysql_real_escape_string($_POST['labdip'][$rowz]);
										$supplyer= mysql_real_escape_string($_POST['supplyer'][$rowz]);
									$req_qty= mysql_real_escape_string($_POST['req_qty'][$rowz]);
								$f_uom= mysql_real_escape_string($_POST['f_uom'][$rowz]);
							$collar_des= mysql_real_escape_string($_POST['collar_des'][$rowz]);
						$collar_size= mysql_real_escape_string($_POST['collar_size'][$rowz]);
					  $collar_color= mysql_real_escape_string($_POST['collar_color'][$rowz]);					
					$collar_qty= mysql_real_escape_string($_POST['collar_qty'][$rowz]);
				$cuff_des= mysql_real_escape_string($_POST['cuff_des'][$rowz]);
			$cuff_size= mysql_real_escape_string($_POST['cuff_size'][$rowz]);
		$cuff_color= mysql_real_escape_string($_POST['cuff_color'][$rowz]);
	$cuff_qty= mysql_real_escape_string($_POST['cuff_qty'][$rowz]);
$dpd_cmt= mysql_real_escape_string($_POST['dpd_cmt'][$rowz]);
	
if(strlen($f_color)>0 && strlen($req_qty)>0)
{

$SQL1="UPDATE  `tb_fabric_booking` SET  `fab_color` =  '$f_color',
`fabrication` =  '$fabrication',
`composition` =  '$composition',
`gsm` =  '$gsm',
`fab_wash` =  '$fab_wash',
`dia` =  '$dia',
`color_code` =  '$c_code',
`remarks` =  '$remarks',
`item_cat` =  '$item_cat',
`comments` =  '$comments',
`yarn_count` =  '$yarn_count',
`labdip` =  '$labdip',
`supplier` =  '$supplyer',
`dpd_req_qty`='$req_qty',
`uom` =  '$f_uom',
`collar_des` =  '$collar_des',
`collar_size` =  '$collar_size',
`collar_color` =  '$collar_color',
`collar_qty` =  '$collar_qty',
`cuff_des` =  '$cuff_des',
`cuff_size` =  '$cuff_size',
`cuff_color`='$cuff_color',
`cuff_qty` =  '$cuff_qty',
`remark_dpd` =  '$dpd_cmt' , dpd_id='$uid' WHERE  `sl`='$checkbox' AND sto_po_no=''" ;

//die($SQL1) ;
$obj->sql($SQL1);

$a="<font color='green'; size='3'> <strong>Fabric Booking Updated Successfully :)</strong></font>" ;

$rowz++ ;

}
}

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>


  <style type="text/css">

<!--
/*@import url("css/table_style.css");*/
-->

</style> 
  <style type="text/css">
  
.editbox
{
display:none
}
td
{
padding:5px;
}
.editbox
{
font-size:12px;
background-color:#ffffcc;
border:solid 1px #000;
padding:3px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}  
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 
        
  <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=350,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}


function newPopup1(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=350,width=450,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
</div>

<div class="span12">
                                <h2>Fabric Booking DPD Part</h2>
                                <div class="divider"></div>  
                                
                 
                                
                                
</div>

<div> <?php echo $a ;  ?> </div>

			<div id="demo" style="margin-top:20px; ">

  
<table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="padding-bottom: 10px; background-color: #FFF; color:#000;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
	 
    <th>SL</th>
    <th scope="row">Style</th>
    <th scope="row">Color</th>
    <th scope="row">Fab Clr.</th>
    <th scope="row">Fabrication</th>
    <th scope="row">Composition</th>
    <th scope="row">GSM</th>
    <th scope="row">Fab Wash</th>
    <th scope="row">Dia</th>
    <th scope="row" width="8%">C Code</th>
    <th scope="row">Comments</th>
    <th scope="row">Item Cat</th>
    <th scope="row">Special Comments</th>
    <th scope="row">Yearn</th>
    <th scope="row">Lab/Dip</th>
    <th scope="row">Supplier</th>
    <th scope="row">Req Qty</th>
    <th scope="row">UOM</th>
    
    <th scope="row">Collar Des</th>
    <th scope="row">Collar Size</th>
    <th scope="row">Collar Color</th>
    <th scope="row">Collar Qty</th>
    <th scope="row">Cuff Des</th>
    <th scope="row">Cuff Size</th>
    <th scope="row">Cuff Color</th>
    <th scope="row">Cuff Qty</th>
    
    <th scope="row">DPD Remarks</th>
  </tr>
	</thead>
	<tbody>
    
    <?php
	
//	$SQL="select * from tb_fabric_booking";    //table name
//	$results = $obj->sql($SQL);
	
		$sl=1;			
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;

	$sql="select * from tb_fabric_booking WHERE sl='$checkbox'";    //table name

	
	
//	$obj->sql($sql);
$result = $obj->sql($sql);
	
	//$result = get_data();
	$si=1 ;
while($row = mysql_fetch_array($result))
	{
	?>
    <tr>
    
		
        
        
		  <td><?php echo $si ; ?></td>
		
            
			    <td scope="row" title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td scope="row"><?php echo $row['color'] ;  ?></td>
    <td scope="row">
	 <?php echo $row['fab_color'] ;  ?>
           
	</td>
    <td scope="row">
	<?php echo $row['fabrication'] ;  ?>
     
      
	</td>
    <td scope="row">
<?php echo $row['composition'] ;  ?>
	</td>
    <td scope="row"><?php echo $row['gsm'] ;  ?></td>
    <td scope="row"><?php echo $row['fab_wash'] ;  ?></td>
    <td scope="row"><?php echo $row['dia'] ;  ?></td>
    <td scope="row"><?php echo $row['color_code'] ;  ?></td>
    <td scope="row"><?php echo $row['remarks'] ;  ?></td>
    <td scope="row"><?php echo $row['item_cat'] ;  ?></td>
    <td scope="row"><?php echo $row['comments'] ;  ?></td>
    <td scope="row"><?php echo $row['yarn_count'] ;  ?></td>
    <td scope="row"><?php echo $row['labdip'] ;  ?></td>
    <td scope="row"><?php echo $row['supplier'] ;  ?></td>
    <td scope="row" bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td scope="row"><?php echo $row['uom'] ;  ?></td>
    
   <td scope="row"><?php echo $row['collar_des'] ;  ?></td>
   <td scope="row"><?php echo $row['collar_size'] ;  ?></td>
   <td scope="row"><?php echo $row['collar_color'] ;  ?></td>
   <td scope="row"><?php echo $row['collar_qty'] ;  ?></td>
        
   <td scope="row"><?php echo $row['cuff_des'] ;  ?></td>
   <td scope="row"><?php echo $row['cuff_size'] ;  ?></td>
   <td scope="row"><?php echo $row['cuff_color'] ;  ?></td>
   <td scope="row"><?php echo $row['cuff_qty'] ;  ?></td>
    
    <td scope="row"><?php echo $row['remark_dpd'] ; ?></td>
		</tr>
        
        <?php $si++ ; } } ?>
        
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
            <td>&nbsp;</td>
            <td>&nbsp;</td>

	  </tr>
	</tfoot>
</table><br>



<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->



		</div>
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
                
</body>
</html>