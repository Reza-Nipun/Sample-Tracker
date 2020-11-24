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
	
	$fab_sl=$_GET['ID'];	
	$tsl=$_GET['tsl'];
	
	// $style = trim($style);
	// $season = trim($season);	
	
	
	$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch, fab_receive_planned_date from tb_track_info where sl='$tsl'";    //table name
	$resultsx = $obj->sql($SQLX);	
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date=$rowx['create_date'];
		$customer=$rowx['customer'];
		$brand_style=$rowx['brand_style'];
		$season=$rowx['season'];
		$fabric_type=$rowx['fabric_type'];
		$print_type=$rowx['print_type'];
		$wash_type=$rowx['wash_type'];
		$product_type=$rowx['product_type'];
		$embroidery_stitch=$rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date=$rowx['sd_agreed_sample_delivery_date'];
		$fab_receive_planned_date=$rowx['fab_receive_planned_date'];
	}
	
	
	$SQLF="select * from tb_fabric_booking where sl='$fab_sl'";    //table name
	$resultsf = $obj->sql($SQLF);	
	while($rowf = mysql_fetch_array($resultsf))
	{
		$combo=$rowf['combo'];
		
		$style=$rowf['sample_style'];
		$color=$rowf['color'];
		$fab_color=$rowf['fab_color'];
		$fabrication=$rowf['fabrication'];
		$composition=$rowf['composition'];
		$remarks=$rowf['remarks'];
		$gsm=$rowf['gsm'];
		$dia=$rowf['dia'];
		$color_code=$rowf['color_code'];
		$item_cat=$rowf['item_cat'];
		$comments=$rowf['comments'];
		$yarn_count=$rowf['yarn_count'];
		
		$labdip=$rowf['labdip'];
		
		$cancel_sto=$rowf['sto_po_no'];
		$labdip=$rowf['labdip'];
		$supplier=$rowf['supplier'];
		$dpd_req_qty=$rowf['dpd_req_qty'];
		$uom=$rowf['uom'];
		$remark_dpd=$rowf['remark_dpd'];
		
		$f_wash=$rowf['fab_wash'];
		
		$cancel_rsn=$rowf['cancel_rsn'];
		
		$collar_des=$rowf['collar_des'];
		$collar_color=$rowf['collar_color'];
		$collar_qty=$rowf['collar_qty'];
		$collar_size=$rowf['collar_size'];
		
		$cuff_des=$rowf['cuff_des'];
		$cuff_size=$rowf['cuff_size'];
		$cuff_color=$rowf['cuff_color'];
		$cuff_qty=$rowf['cuff_qty'];
	}
	
	
	if($customer==NULL)
	{
	die("ERROR!PLEASE INPUT CORRECT STYLE AND SEASON") ;
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

<h3 align="center">Revise Fabric Booking of Style <?php echo $style ; ?></h3>
<br />
<table align="center" width="80%" border="1" cellspacing="0" class="bottomBorder" cellpadding="0">
  <tr align="center">
    <td scope="col"><strong>Create Date</strong></td>
    <td scope="col"><?php echo $create_date ; ?></td>
    <td scope="col"><strong>Buyer</strong></td>
    <td scope="col"><?php echo $customer ; ?></td>
    <td scope="col"><strong>Style</strong></td>
    <td scope="col"><?php echo $style ; ?></td>
  </tr>
  <tr align="center">
    <td scope="row"><strong>Fabric Type</strong></td>
    <td><?php echo $fabric_type ; ?></td>
    <td><strong>Season</strong></td>
    <td><?php echo $season ; ?></td>
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
    <td scope="row"><strong>Sample Submission Date</strong></td>
    <td><?php echo $sd_agreed_sample_delivery_date ; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <th scope="row">GMTS Color</th>
    <?php if ($combo != NULL) { ?><th scope="row">Combo</th><?php } ?>
    <th scope="row">Fabrication</th>
    <th scope="row">Composition</th>
    <th scope="row">Fab Color</th>
    <th scope="row">Color Code</th>
    <th scope="row">Remarks</th>
    <th scope="row">GSM</th>
    <th scope="row">Fabric Wash</th>
    <th scope="row">Dia</th>
    <th scope="row">Item Category</th>
    <th scope="row">Comments</th>
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
    <th scope="row">DPD Comm</th>
    <th scope="row">Revise Cmnts</th>
  </tr>
</thead>
 
  <tr>
    <td scope="row"><select name="s_color[]" autofocus required id="s_color[]" tabindex="1" style="font-size:11px">
     <option value="<?php echo $color.'~'.$tsl; ?>" selected="selected"><?php echo $color; ?></option>
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
            
      <input name="customer[]" type="hidden" value="<?php echo $customer ; ?>" />
      <input name="style[]" type="hidden" value="<?php echo $style ; ?>" />
      <input name="season[]" type="hidden" value="<?php echo $season ; ?>" />
      <input name="cancel_sto[]" type="hidden" value="<?php echo $cancel_sto ; ?>" />
      <input name="revise_status[]" type="hidden" value="<?php echo 1 ; ?>" />
      <input name="revise_rsn[]" type="hidden" value="<?php echo $cancel_rsn ; // here Cancel rsn is also duplicated 
	  
	  ?>" />
      </td>
      <?php if($combo != NULL) { ?>
       <td scope="row"><select name="combo" autofocus required id="combo" tabindex="1" style="font-size:11px">
         <option selected value="<?php echo $combo ; ?>"><?php echo $combo ; ?></option>
         <option value="">Select Combo</option>
         <option value="Combo 1">Combo 1</option>
         <option value="Combo 2">Combo 2</option>
         <option value="Combo 3">Combo 3</option>
         <option value="Combo 4">Combo 4</option>
         <option value="Combo 5">Combo 5</option>
        </select></td>
        <?php } ?>
    <td scope="row"> <select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px" autofocus required >
         <option value="<?php echo $fabrication; ?>" selected="selected"><?php echo $fabrication; ?></option>
     
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
    <td scope="row">    <?php if($combo != NULL) { ?>
    <textarea name="composition[]" placeholder="Composition" rows="3" cols="35"><?php echo $composition; ?></textarea>
    <?php } else { ?>    
     <select name="composition[]" id="composition[]" tabindex="4" style="font-size:11px" autofocus required >
        <option value="<?php echo $composition; ?>" selected="selected"><?php echo $composition; ?></option>
     
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
      
      <?php } ?></td>
      
    <td scope="row">
      
      <textarea name="f_color[]" placeholder="Fab Color" rows="3" cols="20" ><?php echo $fab_color; ?></textarea>
      
  <!--<input name="f_color[]" placeholder="Fab Color" value="<?php // echo $fab_color; ?>"  list="characters6"  type="text" tabindex="2" size="12" id="f_color[]" autofocus required >-->
      
    </td>
      
   <!-- <td scope="row">
       <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
    </td>-->
    
    <td scope="row"><textarea name="c_code[]" cols="30" rows="3" id="c_code[]" autofocus required placeholder="Color Code"><?php echo $color_code; ?></textarea></td>
    
    <td scope="row"><textarea name="remarks[]" cols="20" rows="3" id="remarks[]" placeholder="Remarks"><?php echo $remarks; ?></textarea></td>

    <td scope="row">
    
    <input name="gsm[]" placeholder="GSM" value="<?php echo $gsm; ?>" list="characters7"  type="text" tabindex="5" size="4" autofocus required id="gsm[]">
            
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
      <option value="<?php echo $dia; ?>" selected="selected"><?php echo $dia; ?></option>
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
      <option value="<?php echo $item_cat; ?>" selected="selected"><?php echo $item_cat; ?></option>
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
      <option value="<?php echo $comments; ?>" selected="selected"><?php echo $comments; ?></option>
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
      <option value="<?php echo $yarn_count; ?>" selected="selected"><?php echo $yarn_count; ?></option>
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

 <td scope="row"><textarea name="labdip[]" cols="9" list="characters8" rows="3" id="labdip[]" autofocus required placeholder="Lab Dip"><?php echo $labdip; ?></textarea></td>

    <td scope="row"><input type="text" autofocus required size="8" placeholder="Vendor" name="supplyer[]" id="supplyer[]" value="<?php echo $supplier; ?>" /></td>
    <td scope="row"><input type="number" min="1" max="999" placeholder="req qty" autofocus required value="<?php echo $dpd_req_qty; ?>" size="8" name="req_qty[]" id="req_qty[]" /></td>
    <td scope="row"><select name="f_uom[]" autofocus required  id="f_uom[]" style="font-size:11px">
      <option value="<?php echo $uom; ?>" selected="selected"><?php echo $uom; ?></option>
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
    <td scope="row"><input name="fab_rec_planned_date[]" class="rounded" type="text" id="fab_rec_planned_date[]" placeholder="Fab Req Dlv Date" value="<?php echo $fab_receive_planned_date; ?>" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>
    <td scope="row"><textarea name="collar_des[]" cols="9" rows="3" autofocus required placeholder="Collar Des"><?php echo $collar_des; ?></textarea></td>
            <td scope="row"><textarea name="collar_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $rowf['collar_size']; ?></textarea></td>
        <td scope="row"><textarea name="collar_color[]" cols="9" rows="3" placeholder="Collar Color"><?php echo $collar_color ; ?></textarea></td>
        <td scope="row"><textarea name="collar_qty[]" cols="9" rows="3" placeholder="Collar Qty"><?php echo $collar_qty; ?></textarea></td>
        
        <td scope="row"><textarea name="cuff_des[]" cols="9" rows="3" placeholder="Cuff Des"><?php echo $cuff_des; ?></textarea></td>
   <td scope="row"><textarea name="cuff_size[]" cols="15" rows="3" placeholder="Size/Fabrication"><?php echo $cuff_size; ?></textarea></td>
        <td scope="row"><textarea name="cuff_color[]" cols="9" rows="3" placeholder="Cuff Color"><?php echo $cuff_color; ?></textarea></td>
        <td scope="row"><textarea name="cuff_qty[]" cols="9" rows="3" placeholder="Cuff Qty"><?php echo $cuff_qty; ?></textarea></td>



    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="2" id="dpd_cmt[]" placeholder="dpd Comm."><?php echo $remark_dpd; ?></textarea></td>
    
     <td scope="row"><textarea name="revise_cmnts[]" rows="2" cols="12" palceholder="Revise Comments If Any"></textarea></td>
     
  </tr>

</table>

<br />

<!--<div align="center" style="background-color:#FFFFCC">-->
<div align="center">
<input name="Submit" class="btn btn-success" type="submit" />
<input type="reset" class="btn btn-danger" name="Reset" id="button" value="Reset" />
</div>

</form>
</div>

<br />

<details>
    <summary>ALL FABRIC BOOKING ITEM : </summary>
    
      <div id="printReady">
<div id="tableWrap"> 
<br />
<h4 align="left">Fabric Booking Style of <?php echo $style ; ?></h4>
<br />
<table align="center" width="80%" border="1" cellspacing="0" class="bottomBorder" cellpadding="0">
  <tr align="center">
    <td scope="col"><strong>Create Date</strong></td>
    <td scope="col"><?php echo $create_date ; ?></td>
    <td scope="col"><strong>Buyer</strong></td>
    <td scope="col"><?php echo $customer ; ?></td>
    <td scope="col"><strong>Style</strong></td>
    <td scope="col"><?php echo $style ; ?></td>
  </tr>
  <tr align="center">
    <td scope="row"><strong>Fabric Type</strong></td>
    <td><?php echo $fabric_type ; ?></td>
    <td><strong>Season</strong></td>
    <td><?php echo $season ; ?></td>
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
    <td scope="row"><strong>Sample Submission Date</strong></td>
    <td><?php echo $sd_agreed_sample_delivery_date ; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<br />

<table width="2000px" border="1" style="font-size:8px" cellpadding="0" cellspacing="0" class="draggable sortable bottomBorder">
 
  <tr bgcolor="#DDDDDD" style="font-family:'MS Serif', 'New York', serif">
<th width="20px">SL</th>
    <th scope="row" width="100px">Style</th>
    <th scope="row" width="100px">Color</th>
    <th scope="row" width="90px">Item Cat</th>
 <!--   <th scope="row">Sample Type</th>-->
    <th scope="row" width="120px">Fabrication</th>
    <th scope="row">GSM</th>
    <th scope="row">Req Qty</th>
    <th scope="row">UOM</th>
    <th scope="row" width="210px">Composition</th>
    <th scope="row" width="100px">Fab Clr.</th>
    <th scope="row" width="210px">C Code</th>
    <th scope="row" width="150px">Remarks</th>
    <th scope="row" width="110px">Comments</th>
    <th scope="row" width="60px">LabDip</th>
    <th scope="row">Collar Des</th>
    <th scope="row">Size/Fabrication</th>
    <th scope="row">Collar Color</th>
    <th scope="row">Collar Qty</th>
    <th scope="row">Cuff Des</th>
    <th scope="row">Size/Fabrication</th>
    <th scope="row">Cuff Color</th>
    <th scope="row">Cuff Qty</th>
    <th scope="row">Dia</th>
    <th scope="row">Yarn</th>
    <th scope="row" width="70px">Supplier</th>
    <th scope="row">Comment</th>
    <th scope="row">STO_PO_NO</th>
    <th scope="row">Attachment</th>
    <th scope="row">Option</th>
  </tr>
    <?php
  
    $SQL="select * from tb_fabric_booking a WHERE a.sample_style='$style' AND a.season='$season'";
    	// die($SQL);
//	$SQL="select * from tb_fabric_booking where sample_style='$style' AND season='$season'";    //table name
	$results = $obj->sql($SQL);
	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{
		$delv_qty = $row['delv_qty'];
		$sto_po_no = $row['sto_po_no'];
		$cancel_status = $row['cancel_status'];
		$revise_status = $row['revise_status'];
		
		$knit_status = $row['knit_status'];
		
	?>
<?php if($delv_qty!=NULL && $sto_po_no!=NULL){ $cs = '3'; } if($delv_qty==NULL && $sto_po_no!=NULL){ $cs = '2'; } if($delv_qty==NULL && $sto_po_no==NULL){ $cs = '1'; } ?>
       
  <?php if($sl%2=='0') { ?>
  <tr bgcolor="#F4F4F4">
  <?php }   
  else { ?>
  <tr>
  <?php } ?>
      
    <?php
	// Here checkboxr indicates that this row will activate while the booking is canceled and need Revise
	
		if($cancel_status !=0) { ?>
    <td style="color:#F00"><!--<input name="checkboxr[]" type="checkbox" checked="checked" value="<?php // echo $row['sl'].'~'.$row['track_info_sl']; ?>">--><?php echo $sl ; ?></td>    
    <?php } else if ($revise_status != 0) { ?>  
    <td style="font-size:14px; font-weight:bold"><!--<input name="checkbox[]" type="checkbox" checked="checked" value="<?php // echo $row['sl'].'~'.$cs.'~'.$row['track_info_sl']; // Not Clear here cs is need or no need ?>">--><?php echo $sl ; ?></td><?php }
			else { ?>
    <td><!--<input name="checkbox[]" type="checkbox" checked="checked" value="<?php // echo $row['sl'].'~'.$cs.'~'.$row['track_info_sl']; ?>">--><?php echo $sl ; ?></td>
    <?php } ?>
      
    
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?> title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['color'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['item_cat'] ;  ?></td>
 <!--   <td scope="row"><?php // echo $row['sd_sample_type_name'] ;  ?></td>-->
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['fabrication'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['gsm'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?> bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['uom'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['composition'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['fab_color'] ;  ?></td>
    
    
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['color_code'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['remarks'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['comments'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['labdip'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['collar_des'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['collar_size'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['collar_color'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['collar_qty'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['cuff_des'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['cuff_size'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['cuff_color'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['cuff_qty'] ; ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['dia'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['yarn_count'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['supplier'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['remark_dpd'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['sto_po_no'] ; ?></td>
    <td scope="row"><a target="_blank" href="<?php echo $row['attachment'] ;  ?>"><?php echo $row['attachment'] ;  ?></a></td>
    			<td scope="row" style="font-size:13px"><strong>
               <?php if($cancel_status == 0 && $knit_status != 'Complete') { ?> 
                <span style="color:#F00"><a href="JavaScript:newPopup('cancel_booking.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>&status=<?php if($delv_qty!=NULL && $sto_po_no!=NULL){ echo '3'; } if($delv_qty==NULL && $sto_po_no!=NULL){ echo '2'; } if($delv_qty==NULL && $sto_po_no==NULL){ echo '1'; } ?>');" style="color:#036"><?php echo 'Cancel' ; ?></a></span>
               <?php } ?>  
               
         <?php if($cancel_status == 0 && $knit_status == 'Complete') { ?>
                <span style="color:#0C0"><a href="fabric_booking_copy.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>" title="Knit Status - <?php echo $knit_status; ?>" target="_blank"><?php echo 'Copy' ; ?></a></span>
         <?php } ?>

         <?php if($cancel_status != 0 && $sto_po_no==NULL) { ?>
                <span style="color:#0C0"><a href="fabric_booking_revise.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>" title="No STO Created Yet !" target="_blank"><?php echo 'Revise' ; ?></a></span>
         <?php } ?>
         
         <?php if($cancel_status != 0 && $sto_po_no!=NULL) { ?>
                <span style="color:#0C0"><a href="fabric_booking_copy.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>" title="STO No: <?php echo $sto_po_no; ?>" target="_blank"><?php echo 'Copy' ; ?></a></span>
         <?php } ?>
         
         <!--fabric_booking_copy fabric_booking_x-->
         
                </strong>
    
<!--<a class="zoom" href='#' style='font-size:12px;top:50px;left:50px'>Hover me!</a>-->


<!--<a class="text" href="#">Hello !!!</a>-->

    </td>
  </tr>
	<?php
    $sl++ ;

		$delv_qty = '';
		$sto_po_no = '';
	}
	?>

</table>
</div>
</div>

    <br/>

	   <div align="center" style="margin-left:500px">
            <div align="center" style="float:left">
            <button class="btn btn-inverse" style="cursor:pointer">Click to download as Excel</button>  
            </div>
          
			<div align="left">
		<form id="printMe" name="printMe">
				<!-- <input type="button" size="14px" name="printMe2" onclick="printSpecial()" value="Print">-->
				<!--<button type="submit" name="printMe2" onclick="printSpecial()" value="Print"><span style="font-size:14px">Print</span></button> -->
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" class="btn btn-inverse" size="14px" name="printMe2" onclick="printSpecial()" value="Click to Print">
		</form>
			</div>
       </div>

</details>

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