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
	
	//$fab_sl=$_GET['ID'];	
	//$tsl=$_GET['tsl'];
	
	// $style = trim($style);
	// $season = trim($season);	
	
	foreach($_POST['checkboxr'] as $row=>$ckbox)
	{
		$ckboxa = explode("~",$ckbox);
		$fab_sl = $ckboxa[0];
		$tsl = $ckboxa[1];
	}
	
	$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch, fab_receive_planned_date from tb_track_info where sl='$tsl'";    //table name
	$resultsx = $obj->sql($SQLX);	
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date=$rowx['create_date'];
		$customer=$rowx['customer'];
		$brand_style=$rowx['brand_style'];
		$style=$rowx['style'];
		$season=$rowx['season'];
		$fabric_type=$rowx['fabric_type'];
		$print_type=$rowx['print_type'];
		$wash_type=$rowx['wash_type'];
		$product_type=$rowx['product_type'];
		$embroidery_stitch=$rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date=$rowx['sd_agreed_sample_delivery_date'];
		$fab_receive_planned_date=$rowx['fab_receive_planned_date'];
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
            //$('document').ready(function()
//			{
//	$('#form').ajaxForm( {
//        target: '#preview', 
//        success: function() { 
//        $('#formbox').slideUp('fast'); 
//        } 
//    }); 
//            });
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

<h2 align="center">Revise Fabric Booking of Style <?php echo $style ; ?></h2>
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

<!--<div id="preview">
              
</div>

<br />
<div id="formbox">-->
<form name="" id="form" action="fabric_bookong_add.php" method="post">
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder"  id="gradientstyle">
<thead>
<tr>
    <th scope="row">GMTS Color</th>
    <th scope="row">Fab Color</th>
    <th scope="row">Fabrication</th>
    <th scope="row">Composition</th>
    <th scope="row">GSM</th>
    <th scope="row">Fabric Wash</th>
    <th scope="row">Dia</th>
    <th scope="row">Color Code</th>
    <th scope="row">Item Category</th>
    <th scope="row">Comments</th>
    <th scope="row">Yarn count</th>
 	<th scope="row">Labdip</th>
    <th scope="row">Vendor</th>
    <th scope="row">Req qty</th>
    <th scope="row">UOM</th>
    <th scope="row">Fab Req Dlv Date</th>
    <th scope="row">Collar Des</th>
    <th scope="row">Collar Size</th>
    <th scope="row">Collar Color</th>
    <th scope="row">Collar Qty</th>
    <th scope="row">Cuff Des</th>
    <th scope="row">Cuff Size</th>
    <th scope="row">Cuff Color</th>
    <th scope="row">Cuff Qty</th>
    <th scope="row">DPD Comm</th>
    <th scope="row">Revise Cmnts</th>
  </tr>
</thead>
 <?php
		$sl =1;
 	
	foreach($_POST['checkboxr'] as $row=>$ckbox)
	{
		$ckboxa = explode("~",$ckbox);
		$fab_sl = $ckboxa[0];
		$tsl = $ckboxa[1];
	
	$SQLF="select * from tb_fabric_booking where sl='$fab_sl'";    //table name
	$resultsf = $obj->sql($SQLF);	
	while($rowf = mysql_fetch_array($resultsf))
	{
		//$style=$rowf['sample_style'];
		//$color=$rowf['color'];
		//$fab_color=$rowf['fab_color'];
		
		//$cancel_sto=$rowf['sto_po_no'];
		//$remark_dpd=$rowf['remark_dpd'];
		//$cancel_rsn=$rowf['cancel_rsn'];
	
	  if($sl%2 == 0) { ?>
      <tr>
      <?php } else { ?>
      <tr style="background-color:#F4F4F4">
      <?php } ?>
  
  
    <td scope="row"><select name="s_color[]" autofocus required id="s_color[]" tabindex="1" style="font-size:11px">
     <option value="<?php echo $rowf['color'].'~'.$tsl; ?>" selected="selected"><?php echo $rowf['color']; ?></option>
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
      <input name="cancel_sto[]" type="hidden" value="<?php echo $rowf['sto_po_no'] ; ?>" />
      <input name="revise_status[]" type="hidden" value="<?php echo 1 ; ?>" />
      <input name="revise_rsn[]" type="hidden" value="<?php echo $rowf['cancel_rsn'] ; // here Cancel rsn is also duplicated 
	  
	  ?>" />
      </td>
    <td scope="row">
      
  <input name="f_color[]" placeholder="fab Color" value="<?php echo $rowf['fab_color']; ?>" type="text" tabindex="2" size="12" id="f_color[]" autofocus required >
            
              <datalist id="characters6">
              				 <?php
         /*$SQL="select fab_color from tb_fabric_booking where dpd_id='$uid' GROUP BY fab_color";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['fab_color'];
                            echo '<option value="'.$dis.'">';
                            }*/
                            ?>
             </datalist>  
      
    </td>
    <td scope="row"> <select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px" autofocus required >
         <option value="<?php echo $rowf['fabrication']; ?>" selected="selected"><?php echo $rowf['fabrication']; ?></option>
     
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
    <td scope="row"> <select name="composition[]" id="composition[]" tabindex="4" style="font-size:11px" autofocus required >
        <option value="<?php echo $rowf['composition']; ?>" selected="selected"><?php echo $rowf['composition']; ?></option>
     
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_composition' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
      
   <!-- <td scope="row">
       <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
    </td>-->
      
    <td scope="row">
    
    
    <input name="gsm[]" placeholder="GSM" value="<?php echo $rowf['gsm']; ?>" list="characters7"  type="text" tabindex="5" size="4" autofocus required id="gsm[]">
            
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
<td scope="row"><textarea name="f_wash[]" cols="9" rows="3" id="f_wash[]" placeholder="Fabric Wash"><?php $rowf['fab_wash']; ?></textarea></td>
    <td scope="row"><select name="dia[]" id="dia[]" style="font-size:11px">
      <option value="<?php echo $rowf['dia']; ?>" selected="selected"><?php echo $rowf['dia']; ?></option>
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
    <td scope="row"><textarea name="c_code[]" cols="9" rows="3" id="c_code[]" autofocus required placeholder="Color Code"><?php echo $rowf['color_code']; ?></textarea></td>
    <td scope="row"><select name="item_cat[]"  id="item_cat[]" autofocus required style="font-size:11px">
      <option value="<?php echo $rowf['item_cat']; ?>" selected="selected"><?php echo $rowf['item_cat']; ?></option>
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
      <option value="<?php echo $rowf['comments']; ?>" selected="selected"><?php echo $rowf['comments']; ?></option>
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
      <option value="<?php echo $rowf['yarn_count']; ?>" selected="selected"><?php echo $rowf['yarn_count']; ?></option>
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

 <td scope="row"><textarea name="labdip[]" cols="9" list="characters8" rows="3" id="labdip[]" autofocus required placeholder="Lab Dip"><?php echo $rowf['labdip']; ?></textarea></td>

    <td scope="row"><input type="text" autofocus required size="8" placeholder="Vendor" name="supplyer[]" id="supplyer[]" value="<?php echo $rowf['supplier']; ?>" /></td>
    <td scope="row"><input type="number" min="1" max="999" placeholder="req qty" autofocus required value="<?php echo $rowf['dpd_req_qty']; ?>" size="8" name="req_qty[]" id="req_qty[]" /></td>
    <td scope="row"><select name="f_uom[]" autofocus required  id="f_uom[]" style="font-size:11px">
      <option value="<?php echo $rowf['uom']; ?>" selected="selected"><?php echo $rowf['uom']; ?></option>
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
    <td scope="row"><textarea name="collar_des[]" cols="9" rows="3" placeholder="Collar Des"><?php echo $rowf['collar_des']; ?></textarea></td>
        <td scope="row"><textarea name="collar_size[]" cols="9" rows="3" placeholder="Collar Size"><?php echo $rowf['collar_size']; ?></textarea></td>
        <td scope="row"><textarea name="collar_color[]" cols="9" rows="3" placeholder="Collar Color"><?php echo $rowf['collar_color']; ?></textarea></td>
        <td scope="row"><textarea name="collar_qty[]" cols="9" rows="3" placeholder="Collar Qty"><?php echo $rowf['collar_qty']; ?></textarea></td>
        
        <td scope="row"><textarea name="cuff_des[]" cols="9" rows="3" placeholder="Cuff Des"><?php echo $rowf['cuff_des']; ?></textarea></td>
        <td scope="row"><textarea name="cuff_size[]" cols="9" rows="3" placeholder="Cuff Size"><?php echo $rowf['cuff_size']; ?></textarea></td>
        <td scope="row"><textarea name="cuff_color[]" cols="9" rows="3" placeholder="Cuff Color"><?php echo $rowf['cuff_color']; ?></textarea></td>
        <td scope="row"><textarea name="cuff_qty[]" cols="9" rows="3" placeholder="Cuff Qty"><?php echo $rowf['cuff_qty']; ?></textarea></td>

    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="2" id="dpd_cmt[]" placeholder="dpd Comm."><?php echo $rowf['remark_dpd']; ?></textarea></td>
    
     <td scope="row"><textarea name="revise_cmnts[]" rows="2" cols="12" palceholder="Revise Comments If Any"></textarea></td>
     
  </tr>
		
	<?php	
		$sl ++;
		$fab_sl = '';
	
		//$style='';
		/*$color='';
		$fab_color='';
		$fabrication='';
		$composition='';
		$gsm='';
		$dia='';
		$color_code='';
		$item_cat='';
		$comments='';
		$yarn_count='';
		$cancel_sto='';
		$labdip='';
		$supplier='';
		$dpd_req_qty='';
		$uom='';
		$remark_dpd='';
		$cancel_rsn='';*/
	}
	}
	?>

</table>

<br />

<!--<div align="center" style="background-color:#FFFFCC">-->
<div align="center">
<input name="Submit" class="btn btn-info" type="submit" />
<input type="reset" class="btn btn-danger" name="Reset" id="button" value="Reset" />

</div>
</form>
<!--</div>-->

<br />
<hr/>
Name: <?php echo $full_name ; ?><br />
ID : <?php echo $employee_id ; ?><br />
Ext : <?php echo $ext ; ?><br />
Dept : <?php  if($user_rule=='3') echo 'DPD' ; ?><br />
Email : <?php echo $email ; ?><br />

</body>
</html>