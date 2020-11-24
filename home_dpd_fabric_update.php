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

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
        
		<?php require("editor.php"); ?>

		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>

       <script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();     //add jahid
//$("#midle_"+ID).hide();

$("#first_input_"+ID).show();    //add text box id
//$("#midle_input_"+ID).show();


}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();     //add jahid
//var midle=$("#midle_input_"+ID).val();

var dataString = 'id='+ ID +'&firstname='+first;
$("#first_"+ID).html('<img src="load.gif" />');                 // Loading image

if(first.length>0)
{
$.ajax({
type: "POST",
url: "home_dpd_fabric_comt_update.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);     // add jahid
//$("#midle_"+ID).html(midle);

}
});
}
else
{
alert('Enter something.');
}

});
// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
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

			<div id="demo" style="margin-top:20px; ">

  
    <form action="home_dpd_fabric_update1.php" method="post">     
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
    <th scope="row">Yarn</th>
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
        
	<td><?php echo $si ; ?><input name="checkbox[]" type="hidden" id="checkbox[]" value="<?php echo $row['sl']; ?>"></td>
		
	<td scope="row" title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td scope="row"><?php echo $row['color'] ;  ?></td>
    <td scope="row">
    <?php if($row['combo'] == '') { ?>
	 <input name="f_color[]" value="<?php echo $row['fab_color'] ;  ?>" type="text" tabindex="2" size="8"  id="f_color[]">
    <?php } if($row['combo'] != '') { ?><textarea name="f_color[]" cols="20" rows="3"><?php echo $row['fab_color'] ;  ?></textarea><?php } ?>

	</td>
    <td scope="row">
	<select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px">
        <option value="<?php echo $row['fabrication'] ;  ?>" selected="selected"><?php echo $row['fabrication'] ;  ?></option>
     
        <?php
         $SQL2="select concern_name from tb_concern where concern_type like 'f_fabrication' order by concern_name ASC";
                            $obj->sql($SQL2);
                            while($row2 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row2['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
	
	</td>
    <td scope="row">
    <?php if($row['combo'] == '') { ?>
	 <select name="composition[]" id="composition[]" tabindex="4" style="font-size:11px">
        <option value="<?php echo $row['composition'] ;  ?>" selected="selected"><?php echo $row['composition'] ;  ?></option>
        <?php
         $SQL3="select concern_name from tb_concern where concern_type like 'f_composition' order by concern_name ASC";
			$obj->sql($SQL3);
			while($row3 = mysql_fetch_array($obj->result))
			{ 
			$dis=$row3['concern_name'];
			echo '<option value="'.$dis.'">'.$dis.'</option>';
			}
		?>
     </select>
    <?php } if($row['combo'] != '') { ?><textarea name="composition[]" cols="30" rows="3"><?php echo $row['composition'] ;  ?></textarea><?php } ?>
	</td>
    <td scope="row"><input name="gsm[]" type="number" value="<?php echo $row['gsm'] ;  ?>" tabindex="5" size="4"  id="gsm[]"></td>
    <td scope="row"> <textarea name="fab_wash[]" cols="9" rows="3" id="fab_wash[]"><?php echo $row['fab_wash'] ; ?></textarea></td>
    <td scope="row"><select name="dia[]" id="dia[]" style="font-size:11px">
      <option value="<?php echo $row['dia'] ;  ?>" selected="selected"><?php echo $row['dia'] ;  ?></option>
      <?php
         $SQL4="select concern_name from tb_concern where concern_type like 'f_dia' order by concern_name ASC";
                            $obj->sql($SQL4);
                            while($row4 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row4['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <td scope="row"> <textarea name="c_code[]" cols="9"  rows="3" id="c_code[]"><?php echo $row['color_code'] ;  ?></textarea>
            </td>
    <td scope="row"><textarea name="remarks[]" cols="9"  rows="3" id="remarks[]"><?php echo $row['remarks'] ;  ?></textarea></td>
    <td scope="row"><select name="item_cat[]"  id="item_cat[]" style="font-size:11px">
      <option value="<?php echo $row['item_cat'] ;  ?>" selected="selected"><?php echo $row['item_cat'] ;  ?></option>
      <?php
         $SQL5="select concern_name from tb_concern where concern_type like 'f_item_cat' order by concern_name ASC";
                            $obj->sql($SQL5);
                            while($row5 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row5['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <td scope="row"><select name="comments[]" id="comments[]" style="font-size:11px">
      <option value="<?php echo $row['comments'] ;  ?>" selected="selected"><?php echo $row['comments'] ;  ?></option>
      <?php
         $SQL6="select concern_name from tb_concern where concern_type like 'f_spicial_comment' order by concern_name ASC";
                            $obj->sql($SQL6);
                            while($row6 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row6['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <td scope="row"><select name="yarn_count[]" id="yarn_count[]" style="font-size:11px">
      <option value="<?php echo $row['yarn_count'] ;  ?>" selected="selected"><?php echo $row['yarn_count'] ;  ?></option>
      <?php
         $SQL7="select concern_name from tb_concern where concern_type like 'f_yarn_count' order by concern_name ASC";
                            $obj->sql($SQL7);
                            while($row7 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row7['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                 ?>
    </select></td>
    <td scope="row"><textarea name="labdip[]" cols="9"  rows="3" id="labdip[]"><?php echo $row['labdip'] ;  ?></textarea></td>
    <td scope="row"><input type="text" value="<?php echo $row['supplier'] ;  ?>" size="8" name="supplyer[]" id="supplyer[]" /></td>
    <td scope="row" bgcolor="#FFFFCC"><input type="number" min="1" max="999" value="<?php echo $row['dpd_req_qty'] ;  ?>" size="4" name="req_qty[]" id="req_qty[]" /></td>
    <td scope="row"><select name="f_uom[]"  id="f_uom[]" style="font-size:11px">
      <option value="<?php echo $row['uom'] ;  ?>" selected="selected"><?php echo $row['uom'] ;  ?></option>
      <?php
         $SQL8="select concern_name from tb_concern where concern_type like 'f_uom' order by concern_name ASC";
                            $obj->sql($SQL8);
                            while($row8 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row8['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                 ?>
    </select></td>
    
   <td scope="row"><textarea name="collar_des[]" cols="9" rows="3" placeholder="Collar Des"><?php echo $row['collar_des'] ;  ?></textarea></td>
   <td scope="row"><textarea name="collar_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $row['collar_size'] ;  ?></textarea></td>
   <td scope="row"><textarea name="collar_color[]" cols="9" rows="3" placeholder="Collar Color"><?php echo $row['collar_color'] ;  ?></textarea></td>
   <td scope="row"><textarea name="collar_qty[]" cols="9" rows="3" placeholder="Collar Qty"><?php echo $row['collar_qty'] ;  ?></textarea></td>
        
   <td scope="row"><textarea name="cuff_des[]" cols="9" rows="3" placeholder="Cuff Des"><?php echo $row['cuff_des'] ;  ?></textarea></td>
   <td scope="row"><textarea name="cuff_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $row['cuff_size'] ;  ?></textarea></td>
   <td scope="row"><textarea name="cuff_color[]" cols="9" rows="3" placeholder="Cuff Color"><?php echo $row['cuff_color'] ;  ?></textarea></td>
   <td scope="row"><textarea name="cuff_qty[]" cols="9" rows="3" placeholder="Cuff Qty"><?php echo $row['cuff_qty'] ;  ?></textarea></td>
    
    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="2" id="dpd_cmt[]"><?php echo $row['remark_dpd'] ;  ?></textarea></td>
 
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

<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />
</form>

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