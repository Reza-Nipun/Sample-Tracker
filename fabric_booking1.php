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

	$s_colorm=$_POST['s_color'];
	$s_colorx = explode("~", $s_colorm);
		$s_color = $s_colorx[0];
		$track_info_sl = $s_colorx[1];

	/*$style=$_POST['style'];	
	$season=$_POST['season'];
	
	$style = trim($style);
	$season = trim($season);*/	
	
	$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch from tb_track_info where sl = '$track_info_sl'";    //table name
	$resultsx = $obj->sql($SQLX);
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date = $rowx['create_date'];
		$customer = $rowx['customer'];
		$brand_style = $rowx['brand_style'];
		$style = $rowx['style'];
		$season = $rowx['season'];
		$fabric_type = $rowx['fabric_type'];
		$print_type = $rowx['print_type'];
		$wash_type = $rowx['wash_type'];
		$product_type = $rowx['product_type'];
		$embroidery_stitch = $rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date = $rowx['sd_agreed_sample_delivery_date'];
	}
	
	if($customer==NULL)
	{
  die('<span style="color:#F60"><strong>&nbsp;&nbsp;&nbsp;&nbsp;ERROR!!! PLEASE INPUT CORRECT STYLE AND SEASON</strong></span>');
	}	
	
	$combo = $_POST['combo'];
	$item_cat = $_POST['item_cat'];
	$dia = $_POST['dia'];
	$comments = $_POST['comments'];
	
	$yarn_count = $_POST['yarn_count'];
	$labdip = $_POST['labdip'];
	$supplyer = $_POST['supplyer'];
	
	$collar_des = $_POST['collar_des'];
	$collar_size = $_POST['collar_size'];
	$collar_color = $_POST['collar_color'];
	$collar_qty = $_POST['collar_qty'];
	$cuff_des = $_POST['cuff_des'];
	$cuff_size = $_POST['cuff_size'];
	$cuff_color = $_POST['cuff_color'];
	$cuff_qty = $_POST['cuff_qty'];
	
	$fab_rec_planned_date = $_POST['fab_rec_planned_date'];
	$dpd_cmt = $_POST['dpd_cmt'];
	//$supplyer = $_POST['supplyer'];
	
	define ("MAX_SIZE","1024");  
	//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension. 
	function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
	}

	require("dpd_image_upload.php");

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>

        <link type="text/css" rel="stylesheet" href="images/bootstrap.min.css">
        

        <link href="css1/chosen/charisma-app.css" rel="stylesheet">
        <link href='css1/chosen/chosen.min.css' rel='stylesheet'>

        
        
<?php require("editor.php"); ?>

<style>
.td_liza {
    text-align: center;
	width: 120px;
}
</style>


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
           
    <script>
     $(document).ready(function() {  
     
     $("#solidbooking").hide();
	 $("#ydbooking").hide();
                         
       }); 
    </script>
                   
        <script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>

        <SCRIPT language="javascript">
		
		function sldBooking() {
			$("#solidbooking").show();
			$("#ydbooking").hide();
			$("#options").hide();
			}
		
		function yarndiedBooking() {
			$("#ydbooking").show();
			$("#solidbooking").hide();
			$("#options").hide();
			}	
			
		function addRowCmp(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
           // var row = table.insertRow(rowCount);
			//var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);			   
			newcell.innerHTML = document.getElementById('cmp').value;               
        }

		function addRowClr(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
           // var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);
			newcell.className = 'td_liza';			   
			newcell.innerHTML = document.getElementById('clr').value;               
        }

		function addRowClrcode(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
           // var row = table.insertRow(rowCount);
			//var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);
			newcell.className = 'td_liza';
			// td_liza	
			newcell.color='red';		   
			newcell.innerHTML = document.getElementById('clrcode').value;               
        }
		
		function addRowCmnts(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
           // var row = table.insertRow(rowCount);
			//var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);
			newcell.className = 'td_liza';			   
			newcell.innerHTML = document.getElementById('cmnts').value;               
        }

		
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                // alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>
    
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

/*.zoom {
  -webkit-transition: all .10s ease-in-out;
          transition: all .10s ease-in-out;
}
.zoom:hover {
  -webkit-transform: scale(1.4);
          transform: scale(1.4);
}*/

/*#text a:hover {
text-shadow: 0px 0 15px #fff;
}
#text a {
-webkit-transition: all 0.7s ease;
transition: all 0.7s ease;
}*/

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

<!--<div id="text">
    <a href="#">SOME ZOOM TEXT</a>
</div>-->

<h3 align="center">Fabric Booking of Style <?php echo $style ; ?></h3>
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

    <!--<summary id="sfb"><strong>ADD Solid Fabric Booking: </strong></summary>
    <summary id="yfb"><strong>ADD Yarn Died Fabric Booking: </strong></summary>-->

	<br />

<strong><span style="color:#025C64; font-size:14px">Yarn Died Fabric Booking</span><span style="color:#025C64; font-size:20px"> &#10145; </span></strong>
    <br />
    <br />
    
    <!--<div id="formbox">-->
    <form name="" action="fabric_booking_save.php" method="post">
    <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">
      <tr>
        <th scope="row">&nbsp;Options&nbsp;</th>
        <th scope="row">GMTS Color</th>
        <th scope="row">Item Category</th>
        <th scope="row">&nbsp;</th>
        <th scope="row">Dia</th>
        <th scope="row">Special Comments</th>
        <th scope="row">Yarn Count</th>
        <th scope="row">Lab Dip</th>
        <th scope="row">Vendor</th>
        <th scope="row">Required Date</th>
        <th scope="row">Collar Des.</th>
        <th scope="row">Collar Size</th>
        <th scope="row">Collar Color</th>
        <th scope="row">Collar Qty</th>
        <th scope="row">Cuff Des.</th>
        <th scope="row">Cuff Size</th>
        <th scope="row">Cuff Color</th>
        <th scope="row">Cuff Qty</th>
        <th scope="row">DPD Remarks</th>
        </tr>
      <tr>
        <td scope="row"><?php echo $combo ; ?>
        <input name="combo" type="hidden" value="<?php echo $combo; ?>" /></td>
        <td scope="row"><?php echo $s_color; ?>
          <input name="s_color" type="hidden" value="<?php echo $s_color ; ?>" />
          <input name="tsl" type="hidden" value="<?php echo $track_info_sl ; ?>" />
          <input name="customer" type="hidden" value="<?php echo $customer ; ?>" />
          <input name="style" type="hidden" value="<?php echo $style ; ?>" />
          <input name="season" type="hidden" value="<?php echo $season ; ?>" />
          <input name="attachment" type="hidden" value="<?php echo $newname ; ?>" />
        </td>
        <td scope="row"><select name="item_cat" id="item_cat" autofocus required style="font-size:11px">
 <option value="<?php echo $item_cat;?>" selected="selected"><?php echo $item_cat ; ?></option>
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
        <td scope="row">
          
          <table class="bottomBorder" border="1" id="fab">
          <tr>
          	<th scope="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fabrication&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th scope="row">&nbsp;&nbsp;GSM&nbsp;&nbsp;</th>
            <th scope="row">&nbsp;&nbsp;Fab Wash&nbsp;&nbsp;</th>
            <th scope="row">&nbsp;&nbsp;Qty&nbsp;&nbsp;</th>
            <th scope="row">&nbsp;&nbsp;Uom&nbsp;&nbsp;</th>
         <th scope="row">Composition&nbsp;<select name="cmp" id="cmp" data-rel="chosen" style="font-size:11px" >
        <option value="" selected="selected">(composition)</option>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'f_composition' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></th>
    <th align="center" scope="row">Color&nbsp;<input name="clr" id="clr" size="15px" type="text" /></th>
       <th align="center" scope="row">Color Code&nbsp;<input name="clrcode" id="clrcode" size="20px" type="text" onclick="Select()" /></th>
		<th align="center" scope="row">Comments&nbsp;<input name="cmnts" size="25px" id="cmnts" type="text" onclick="Select()" /></th>
    
          </tr>
             	<?php
				$row = 0;
				foreach($_POST['fabrication'] as $row=>$fabrication)
				{
					$gsm=mysql_real_escape_string($_POST['gsm'][$row]) ;
					$f_wash=mysql_real_escape_string($_POST['f_wash'][$row]) ;
					$req_qty=mysql_real_escape_string($_POST['req_qty'][$row]) ;
					$f_uom=mysql_real_escape_string($_POST['f_uom'][$row]) ;
				?>
            <tr>
              <td><strong><?php echo $fabrication ; ?></strong><input name="fabrication[]" type="hidden" value="<?php echo $fabrication; ?>"  /></td>
   <td><strong><?php echo $gsm ; ?></strong><input name="gsm[]" type="hidden" value="<?php echo $gsm ; ?>" ></td>
   <td><strong><?php echo $f_wash ; ?></strong><input name="f_wash[]" type="hidden" value="<?php echo $f_wash ; ?>" ></td>
   <td><strong><?php echo $req_qty ; ?></strong><input name="req_qty[]" type="hidden" value="<?php echo $req_qty ; ?>" ></td>
	<td><strong><?php echo $f_uom ; ?></strong><input name="f_uom[]" type="hidden" value="<?php echo $f_uom ; ?>" ></td>
    <td align="center"><div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRowCmp('composition<?php echo $row; ?>')" />&nbsp;
        </div>
        
        <textarea name="composition[]" cols="43" rows="3">
        <?php echo '<table class="bottomBorder" border="1" id="composition'.$row.'">
        </table>' ; ?>
    	</textarea></td>
        <td align="center">
        <div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add" onClick="addRowClr('color<?php echo $row; ?>')" />&nbsp;
        </div>
        
        <textarea name="color[]" cols="20" rows="3">
        <?php echo '<table class="bottomBorder" border="1" id="color'.$row.'">
        </table>
'; ?>
    	</textarea>
        </td>
        <td align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add" onClick="addRowClrcode('ColorCode<?php echo $row; ?>')" />&nbsp;
        </div>
    	<textarea name="color_code[]" cols="25" rows="3">
        <?php echo '<table class="bottomBorder" border="1" id="ColorCode'.$row.'">
        </table>
'; ?>
    	</textarea></td>
    <td align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add" onClick="addRowCmnts('comments<?php echo $row; ?>')" />&nbsp;
        </div>
    	<textarea name="remarks[]" cols="30" rows="3">
        <?php echo '<table class="bottomBorder" border="1" id="comments'.$row.'">
        </table>
		'; ?>
    	</textarea></td>
              </tr>
        <?php 
		$row ++ ;
		} ?>
            </table>
          
        </td>
        <!-- <td scope="row">
           <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
        </td>-->
          
        <td scope="row"><select name="dia" id="dia" style="font-size:11px">
          <option value="<?php echo $dia ; ?>" selected="selected"><?php echo $dia ; ?></option>
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
        <!--<td scope="row">
           <textarea name="item_detail[]" cols="9" rows="3" id="item_detail[]" placeholder="Item Size & Qty"></textarea>
        </td>-->
        <td scope="row"><select name="comments" id="comments" data-rel="chosen" style="font-size:11px" required autofocus >
<option value="<?php echo $comments ; ?>" selected="selected"><?php echo $comments ; ?></option>
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
        <td scope="row"><select name="yarn_count" id="yarn_count" style="font-size:11px">
          <option value="<?php echo $yarn_count ; ?>" selected="selected"><?php echo $yarn_count ; ?></option>
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
    
     <td scope="row"><textarea name="labdip" cols="9" rows="3" id="labdip" autofocus required placeholder="Lab Dip"><?php echo $labdip ; ?></textarea>
     </td>
        <td scope="row"><input type="text" autofocus required value="<?php echo $supplyer ; ?>" size="8" placeholder="Vendor" name="supplyer" id="supplyer" /></td>
        <td scope="row"><input name="fab_rec_planned_date" class="rounded" type="text" id="fab_rec_planned_date" value="<?php echo $fab_rec_planned_date ; ?>" placeholder="Fab Req Dlv Date" tabindex="2" onclick="showCalendarControl(this);" autofocus="autofocus" required="required" /></td>
        <td scope="row"><textarea name="collar_des" cols="9" rows="3" placeholder="Collar Des"><?php echo $collar_des ; ?></textarea></td>
        <td scope="row"><textarea name="collar_size" cols="9" rows="3" placeholder="Collar Size"><?php echo $collar_size ; ?></textarea></td>
        <td scope="row"><textarea name="collar_color" cols="9" rows="3" placeholder="Collar Color"><?php echo $collar_color ; ?></textarea></td>
        <td scope="row"><textarea name="collar_qty" cols="9" rows="3" placeholder="Collar Qty"><?php echo $collar_qty ; ?></textarea></td>
        
        <td scope="row"><textarea name="cuff_des" cols="9" rows="3" placeholder="Cuff Des"><?php echo $cuff_des ; ?></textarea></td>
        <td scope="row"><textarea name="cuff_size" cols="9" rows="3" placeholder="Cuff Size"><?php echo $cuff_size ; ?></textarea></td>
        <td scope="row"><textarea name="cuff_color" cols="9" rows="3" placeholder="Cuff Color"><?php echo $cuff_color ; ?></textarea></td>
        <td scope="row"><textarea name="cuff_qty" cols="9" rows="3" placeholder="Cuff Qty"><?php echo $cuff_qty ; ?></textarea></td>
        
        <td scope="row"><textarea name="dpd_cmt" cols="9" rows="2" id="dpd_cmt" placeholder="dpd Comm."><?php echo $dpd_cmt ; ?></textarea></td>
        </tr>
    
    
    
    </table><br />
    
    <!--<div align="center" style="background-color:#FFFFCC">-->
    <div align="center">
    <input class="btn btn-success" name="Submit" type="submit" />
    <input class="btn btn-danger" type="reset" name="Reset" id="button" value="Reset" />
    </div>
    </form>
    <!--</div>-->

<!--<br />-->

<details>
    <summary><strong>ALL FABRIC BOOKING ITEM : </strong></summary>
    
    <br />
    
     <!--  <script type="text/javascript">
      $(document).ready(function() {
         $('#selecctall').click(function(event) {  //on click 
             if(this.checked) { // check select status
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = true;  //select all checkboxes with class "checkbox1"               
                 });
             }else{
                 $('.checkbox1').each(function() { //loop through each checkbox
                     this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                 });         
             }
         });
         
      });
   </script>
   
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> -->
      <div id="printReady">
<div id="tableWrap"> 

<h4 align="left">Fabric Booking of Style <?php echo $style ; ?></h4>
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

<table width="2300px" border="1" style="font-size:8px" cellpadding="0" cellspacing="0" class="draggable sortable bottomBorder">
 
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
    <th scope="row" width="110px">Comments</th>
    <th scope="row" width="110px">Special Comments</th>
    <th scope="row" width="60px">LabDip</th>
    <th scope="row">Collar Des</th>
    <th scope="row">Collar Size</th>
    <th scope="row">Collar Color</th>
    <th scope="row">Collar Qty</th>
    <th scope="row">Cuff Des</th>
    <th scope="row">Cuff Size</th>
    <th scope="row">Cuff Color</th>
    <th scope="row">Cuff Qty</th>
    <th scope="row">Dia</th>
    <th scope="row">Yarn</th>
    <th scope="row" width="70px">Supplier</th>
    <th scope="row">DPD Remarks</th>
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
  <tr valign="middle" bgcolor="#F4F4F4">
  <?php }   
  else { ?>
  <tr valign="middle">
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
    <td align="center" <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['composition'] ;  ?></td>
    <td align="center" <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['fab_color'] ;  ?></td>
    
    
    <td align="center" <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['color_code'] ;  ?></td>
    <td align="center" <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['remarks'] ;  ?></td>
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
    
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['sto_po_no'] ;  ?></td>
    
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

<!--<div align="center" style="background-color:#CCCCFF">
<input name="Submit" type="submit" value="Excel Preview" />
<input type="reset" name="Reset" id="button" value="Reset" />
</div>-->

<!--</form>-->

</details>

<br />
<hr/>
Name: <?php echo $full_name ; ?><br />
ID : <?php echo $employee_id ; ?><br />
Ext : <?php echo $ext ; ?><br />
Dept : <?php  if($user_rule=='3') echo 'DPD' ; ?><br />
Email : <?php echo $email ; ?><br />

</div>
    
    
    
    <!-- external javascript for Chosen Select Box-->

<!-- library for cookie management -->
<script src="js/chosen/jquery.cookie.js"></script>
<!-- select or dropdown enhancer -->
<script src="js/chosen/chosen.jquery.min.js"></script>

<!-- history.js for cross-browser state change on ajax -->
<script src="js/chosen/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/chosen/charisma.js"></script>
      


</body>
</html>