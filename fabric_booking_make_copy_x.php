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
		$ext=$row['ext'];
		$full_name=$row['full_name'];
		$mobile=$row['mobile'];
		$email=$row['email'];
		$employee_id=$row['employee_id'];
	}
	
	$h_style = $_POST['h_style'];
	$h_season = $_POST['h_season'];
	
$SQLX="select create_date,customer,brand_style,style, qty,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch, sd_concern_dpd_name from tb_track_info where style='$h_style' AND season='$h_season'";    //table name
	$resultsx = $obj->sql($SQLX);
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date=$rowx['create_date'];
		$customer=$rowx['customer'];
		$brand_style=$rowx['brand_style'];
		//$season=$rowx['season'];
		//$qty=$rowx['qty'];
		
		$fabric_type=$rowx['fabric_type'];
		$print_type=$rowx['print_type'];
		$wash_type=$rowx['wash_type'];
		$product_type=$rowx['product_type'];
		$embroidery_stitch=$rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date=$rowx['sd_agreed_sample_delivery_date'];
		
		//$sd_concern_dpd_name=$rowx['sd_concern_dpd_name'];
		//$user_name
	}
	
	if($customer==NULL)
	{
  die('<span style="color:#F60"><strong>&nbsp;&nbsp;&nbsp;&nbsp;ERROR!!! PLEASE INPUT CORRECT STYLE AND SEASON</strong></span>')	 ;
	}
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>

        <link type="text/css" rel="stylesheet" href="images/bootstrap.min.css">
        
<?php require("editor.php"); ?>

       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> 
       
       <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=280,width=520,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}

/*function newPopup1(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=350,width=950,left=60,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}*/

</script>
       
        <script type="text/javascript">
            $('document').ready(function()
			{
		 /* var oldSize = parseFloat($("#content").css('font-size'));
		  var newSize = oldSize  * 2;
		  $("#content").hover(
			function() {
			 $("#content").animate({ fontSize: newSize}, 200);
			},
			function() {
			$("#content").animate({ fontSize: oldSize}, 200);
		   }
		 );*/
								
	$('#form').ajaxForm( {
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
            });
        </script> 
        
        <script src="media/js/dragtable.js"></script>
		<script src="media/js/sorttable.js"></script>
    
	<script type="text/javascript">
	$(function(){
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>   
    
    <script language="JavaScript">
var gAutoPrint = true; // Tells whether to automatically call the print function

function printSpecial()
{
if (document.getElementById != null)
{
var html = '<HTML>\n<HEAD>\n';

if (document.getElementsByTagName != null)
{
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0)
html += headTags[0].innerHTML;
}
html += '\n</HE>\n<body style="background:none; !important ; ">\n';

var printReadyElem = document.getElementById("printReady");

if (printReadyElem != null)
{
html += printReadyElem.innerHTML;
}
else
{
alert("Could not find the printReady function");
return;
}

html += '\n</BO>\n</HT>';


var printWin = window.open("","printSpecial");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();
if (gAutoPrint)
printWin.print();
}
else
{
alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
}
}

</script>   
    
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:12px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 
        <script src="images/CalendarControl1.js" type="text/javascript"></script>
    	<link href="images/CalendarControl.css" rel="stylesheet" type="text/css" />

</head>

<body>

<h3 align="center">Make Copy of Fabric Booking for Style <?php echo $h_style ; ?></h3>
<table align="center" width="80%" border="1" cellspacing="0" class="bottomBorder" cellpadding="0">
  <tr align="center">
    <td scope="col"><strong>Create Date</strong></td>
    <td scope="col"><?php echo $create_date ; ?></td>
    <td scope="col"><strong>Buyer</strong></td>
    <td scope="col"><?php echo $customer ; ?></td>
    <td scope="col"><strong>Style</strong></td>
    <td scope="col"><?php echo $h_style ; ?></td>
  </tr>
  <tr align="center">
    <td scope="row"><strong>Fabric Type</strong></td>
    <td><?php echo $fabric_type ; ?></td>
    <td><strong>Season</strong></td>
    <td><?php echo $h_season ; ?></td>
    <td><strong>Brand style</strong></td>
    <td><?php echo $brand_style ; ?></td>
  </tr>
  <tr align="center">
    <td scope="row"><strong>Print type</strong></td>
    <td><?php echo $print_type ; ?></td>
    <td><strong>Wash Type</strong></td>
    <td><?php echo $wash_type ; ?></td>
    <td><strong>Embroidery Stich</strong></td>
    <td><?php echo $embroidery_stitch ; ?></td>
  </tr>
  <tr align="center">
    <td scope="row"><strong>Product Type</strong></td>
    <td><?php echo $product_type ; ?></td>
    <td><strong>Sample Submission Date</strong></td>
    <td><?php echo $sd_agreed_sample_delivery_date ; ?></td>
    <!--<td><strong>SD Sample Req Qty</strong></td>
    <td><?php // echo $qty ; Here Qty can not give bcz it can differ from color to color ?></td>-->
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<br />

<div style="margin-left:30px">

<div id="preview">
              
</div>

<br />
<div id="formbox">
<form name="" id="form" action="fabric_bookong_add.php" method="post">
<table width="2200px" border="1" cellpadding="0" cellspacing="0" class="bottomBorder"  id="gradientstyle">
<thead>
<tr>
    <th scope="row">SL</th>
    <th scope="row">GMTS Color</th>
    <th scope="row">Combo</th>
    <!--<?php //if ($combo != NULL) { ?><th scope="row">Combo</th><?php // } ?>-->
    <th scope="row">Fabrication</th>
    <th scope="row">Composition</th>
    <th scope="row">Fab Color</th>
    <th scope="row">Color Code</th>
    <th scope="row">Comments</th>
    <th scope="row">GSM</th>
    <th scope="row">Fab Wash</th>
    <th scope="row">Dia</th>
    <th scope="row">Item Category</th>
    <th scope="row">Special Comments</th>
    <th scope="row">Yarn count</th>
 	<th scope="row">Labdip</th>
    <th scope="row">Vendor</th>
    <th scope="row">Req qty</th>
    <th scope="row">UOM</th>
    <th scope="row">Fab Req Dlv Date</th>
    <th scope="row">Collar Des</th>
    <th scope="row">Size/Fabrication</th>
    <th scope="row">Collar Color</th>
    <th scope="row">Collar Qty</th>
    <th scope="row">Cuff Des</th>
    <th scope="row">Size/Fabrication</th>
    <th scope="row">Cuff Color</th>
    <th scope="row">Cuff Qty</th>
    <th scope="row">DPD Remarks</th>
  </tr>
</thead>
 
 <?php 
		$sl=1;			
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;

	$sql_fetch="SELECT T0.*, T1.fab_receive_planned_date from tb_fabric_booking T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl WHERE T0.sl='$checkbox'";    //table name
	$result_fetch = $obj->sql($sql_fetch);
	//$si=1 ;
	while($row_fetch = mysql_fetch_array($result_fetch))
	{
		
		$style = '' ;
		$season = '' ;
		$combo = '' ;
		
		$style = $row_fetch['sample_style'] ;
		$season = $row_fetch['season'] ;
		$combo = $row_fetch['combo'] ;
?> 
 
  <tr>
  <td><?php echo $sl; ?></td>
    <td scope="row"><select name="s_color[]" autofocus required id="s_color[]" tabindex="1" style="font-size:11px">
     <option value="<?php echo $row_fetch['color'].'~'.$row_fetch['track_info_sl']; ?>" selected="selected"><?php echo $row_fetch['color']; ?></option>
        <?php
         $SQL="select sl, color from tb_track_info where style like '$style' AND season='$season'";
		 //die($SQL);
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['color'];
                            echo '<option value="'.$dis.'~'.$row['sl'].'">'.$dis.'</option>';
                            }
                            ?>
      </select>
            
      <input name="customer[]" type="hidden" value="<?php echo $row_fetch['buyer'] ; ?>" />
      <input name="style[]" type="hidden" value="<?php echo $style ; ?>" />
      <input name="season[]" type="hidden" value="<?php echo $season ; ?>" />
	  </td>
      <?php // if($combo != NULL) { ?>
       <td scope="row"><select name="combo[]" id="combo[]" tabindex="1" style="font-size:11px">
         <option selected value="<?php echo $combo ; ?>"><?php echo $combo ; ?></option>
         <option value="">Select Combo</option>
         <option value="Combo 1">Combo 1</option>
         <option value="Combo 2">Combo 2</option>
         <option value="Combo 3">Combo 3</option>
         <option value="Combo 4">Combo 4</option>
         <option value="Combo 5">Combo 5</option>
        </select></td>
        <?php // } ?>
    <td scope="row"> <select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px" autofocus required >
         <option value="<?php echo $row_fetch['fabrication'] ; ?>" selected="selected"><?php echo $row_fetch['fabrication']; ?></option>
        <?php
    $SQL="select concern_name from tb_concern where concern_type like 'f_fabrication' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
      
      </td>
    <td scope="row">
    <?php if($combo == NULL) { ?>    
     
     <select name="composition[]" id="composition[]" tabindex="4" style="font-size:11px" autofocus required >
        <option value="<?php echo $row_fetch['composition']; ?>" selected="selected"><?php echo $row_fetch['composition']; ?></option>
     
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_composition' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
      
      <?php } if($combo != NULL) {  ?>
    <textarea name="composition[]" placeholder="Composition" rows="3" cols="35"><?php echo $row_fetch['composition']; ?></textarea>
      <?php } ?>
      </td>
      
    <td scope="row">
    <?php if($combo == NULL) { ?>
	 <input name="f_color[]" value="<?php echo $row_fetch['fab_color'] ;  ?>" type="text" placeholder="Fab Color" tabindex="2" size="8"  id="f_color[]">
    <?php } if($combo != NULL) { ?><textarea name="f_color[]" placeholder="Fab Color" rows="3" cols="20" ><?php echo $row_fetch['fab_color']; ?></textarea><?php } ?>      
    </td>
    <td scope="row"><textarea name="c_code[]" cols="30" rows="3" id="c_code[]" autofocus required placeholder="Color Code"><?php echo $row_fetch['color_code']; ?></textarea>
    </td>
   <!-- <td scope="row">
       <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
    </td>-->
    <td scope="row"><textarea name="remarks[]" cols="20" rows="3" id="remarks[]" placeholder="Remarks"><?php echo $row_fetch['remarks']; ?></textarea></td>
    <td scope="row">
    
    
    <input name="gsm[]" placeholder="GSM" value="<?php echo $row_fetch['gsm']; ?>" list="characters7"  type="text" tabindex="5" size="4" autofocus required id="gsm[]">
            
              <datalist id="characters7">
              				 <?php
         $SQL="select gsm from tb_fabric_booking where dpd_id='$uid' GROUP BY gsm";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['gsm'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>     
    
    </td>
    <td scope="row"><textarea name="f_wash[]" cols="9" rows="3" id="f_wash[]" placeholder="Fabric Wash"><?php echo $f_wash; ?></textarea></td>
    <td scope="row"><select name="dia[]" id="dia[]" style="font-size:11px">
      <option value="<?php echo $row_fetch['dia']; ?>" selected="selected"><?php echo $row_fetch['dia']; ?></option>
      <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_dia' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <td scope="row"><select name="item_cat[]"  id="item_cat[]" autofocus required style="font-size:11px">
      <option value="<?php echo $row_fetch['item_cat']; ?>" selected="selected"><?php echo $row_fetch['item_cat']; ?></option>
      <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_item_cat' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <!--<td scope="row">
       <textarea name="item_detail[]" cols="9" rows="3" id="item_detail[]" placeholder="Item Size & Qty"></textarea>
    </td>-->
    <td scope="row"><select name="comments[]" id="comments[]" style="font-size:11px" required autofocus>
      <option value="<?php echo $row_fetch['comments']; ?>" selected="selected"><?php echo $row_fetch['comments']; ?></option>
      <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_spicial_comment' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
    </select></td>
    <td scope="row"><select name="yarn_count[]" id="yarn_count[]" style="font-size:11px">
      <option value="<?php echo $row_fetch['yarn_count']; ?>" selected="selected"><?php echo $row_fetch['yarn_count']; ?></option>
      <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_yarn_count' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                 ?>
    </select></td>

 <td scope="row"><textarea name="labdip[]" cols="9" list="characters8" rows="3" id="labdip[]" autofocus required placeholder="Lab Dip"><?php echo $row_fetch['labdip']; ?></textarea></td>

    <td scope="row"><input name="supplyer[]" id="supplyer[]" value="<?php echo $row_fetch['supplier']; ?>"  type="text" autofocus required size="8" placeholder="Vendor" /></td>
    <td scope="row"><input name="req_qty[]" id="req_qty[]" value="<?php echo $row_fetch['dpd_req_qty']; ?>" type="number" min="1" max="999" placeholder="req qty" autofocus required size="8" /></td>
    <td scope="row"><select name="f_uom[]" autofocus required  id="f_uom[]" style="font-size:11px">
      <option value="<?php echo $row_fetch['uom']; ?>" selected="selected"><?php echo $row_fetch['uom']; ?></option>
      <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_uom' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                 ?>
    </select></td>
    <td scope="row"><input name="fab_rec_planned_date[]" class="rounded" type="text" id="fab_rec_planned_date[]" placeholder="Fab Req Dlv Date" value="<?php echo $row_fetch['fab_receive_planned_date']; ?>" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>
    
    <td scope="row"><textarea name="collar_des[]" cols="9" rows="3" placeholder="Collar Des"><?php echo $row_fetch['collar_des']; ?></textarea></td>
            <td scope="row"><textarea name="collar_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $row_fetch['collar_size'] ; ?></textarea></td>
        <td scope="row"><textarea name="collar_color[]" cols="9" rows="3" placeholder="Collar Color"><?php echo $row_fetch['collar_color'] ; ?></textarea></td>
        <td scope="row"><textarea name="collar_qty[]" cols="9" rows="3" placeholder="Collar Qty"><?php echo $row_fetch['collar_qty']; ?></textarea></td>
        
        <td scope="row"><textarea name="cuff_des[]" cols="9" rows="3" placeholder="Cuff Des"><?php echo $row_fetch['cuff_des']; ?></textarea></td>
   <td scope="row"><textarea name="cuff_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $row_fetch['cuff_size']; ?></textarea></td>
        <td scope="row"><textarea name="cuff_color[]" cols="9" rows="3" placeholder="Cuff Color"><?php echo $row_fetch['cuff_color']; ?></textarea></td>
        <td scope="row"><textarea name="cuff_qty[]" cols="9" rows="3" placeholder="Cuff Qty"><?php echo $row_fetch['cuff_qty']; ?></textarea></td>
    
    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="3" id="dpd_cmt[]" placeholder="dpd Comm."><?php echo $row_fetch['remark_dpd']; ?></textarea></td>
         
  </tr>
  
  <?php } $sl ++ ; }?>

</table>

<br />

<!--<div align="center" style="background-color:#FFFFCC">-->
<div align="center">
<!--<input name="Submit" class="btn btn-success" type="submit" />
<input type="reset" class="btn btn-danger" name="Reset" id="button" value="Reset" />-->

<input name="submit" type="submit" class="btn btn-success" id="submit" value="Submit" />
      &nbsp;
<input name="input" type="reset" class="btn btn-danger" value="Reset" />
</div>
</form>
</div>

<br />

<hr/>
Name: <?php echo $full_name ; ?><br />
ID : <?php echo $employee_id ; ?><br />
Ext : <?php echo $ext ; ?><br />
Dept : <?php  if($user_rule=='3') echo 'DPD' ; ?><br />
Email : <?php echo $email ; ?><br />
</div>
</body>
</html>