<?php

	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$style=$_GET['S_ID'];	
	$season=$_GET['season'];
	$en_opt=$_GET['opt'];
	$decode_opt = base64_decode($en_opt);
	
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>

        <link type="text/css" rel="stylesheet" href="images/bootstrap.min.css">

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
        
    	<!--<script type="text/javascript">
		$(document).ready(function() {
		  var oldSize = parseFloat($("#content").css('font-size'));
		  var newSize = oldSize  * 2;
		  $("#content").hover(
			function() {
			 $("#content").animate({ fontSize: newSize}, 200);
			},
			function() {
			$("#content").animate({ fontSize: oldSize}, 200);
		   }
		 );
		});
		</script>-->
        
        <script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>

        <SCRIPT language="javascript">
		
		//function sldBooking() {
//			$("#solidbooking").show();
//			$("#ydbooking").hide();
//			$("#options").hide();
//			}
//		
//		function yarndiedBooking() {
//			$("#ydbooking").show();
//			$("#solidbooking").hide();
//			$("#options").hide();
//			}	
			
		
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
			
			if(rowCount > 4) {
                        alert("Cannot add more than 5 rows.");
                        // break;
                    }
			else {
										
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

     <div align="center"><strong><span style="color:#063; font-size:13px">Yarn Died Fabric Booking Successfully Created for </span><span style="color:#F30;font-size:15px"> <?php echo $decode_opt; ?></span><span style="color:#025C64; font-size:20px"></span></strong></div>
     
    <strong><span style="color:#025C64; font-size:14px">Add Yarn Died Fabric Booking</span><span style="color:#025C64; font-size:20px"> &#10145; </span></strong>
<!--    <br />
    <br />
    
    <div id="preview">
    </div>
<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />&nbsp;
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />
</div>
--><br />
<br />
    <div id="formbox">
    <form name="form2" action="fabric_booking1.php" enctype="multipart/form-data" method="post">
    
    <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder"  id="gradientstyle">
      <tr>
        <th scope="row">Options</th>
        <th scope="row">GMTS Color</th>
        <th scope="row">Item Category</th>
        <th scope="row"><div align="center" style="background-color:#96D3D0">
          <input type="button" value="Add" onClick="addRow('fab')" />
          <input type="button" value="Delete" onClick="deleteRow('fab')" />
        </div></th>
        <th scope="row">Dia</th>
        <th scope="row">Comments</th>
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
        <th scope="row">Attachment</th>
      </tr>
      <tr>
        <td scope="row"><select name="combo" autofocus required id="combo" tabindex="1" style="font-size:11px">
         <option value="" selected="selected">Select Combo</option>
         <option value="Combo 1">Combo 1</option>
         <option value="Combo 2">Combo 2</option>
         <option value="Combo 3">Combo 3</option>
         <option value="Combo 4">Combo 4</option>
         <option value="Combo 5">Combo 5</option>
        </select></td>
        <td scope="row"><select name="s_color" autofocus required id="s_color" tabindex="1" style="font-size:11px">
          <option value="" selected="selected">Gmt Color</option>
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
          <input name="customer" type="hidden" value="<?php echo $customer ; ?>" />
          <input name="style" type="hidden" value="<?php echo $style ; ?>" />
          <input name="season" type="hidden" value="<?php echo $season ; ?>" />
        </td>
        <td scope="row"><select name="item_cat" id="item_cat" autofocus required style="font-size:11px">
          <option value="" selected="selected">(item/cat)</option>
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
          
          <table class="bottomBorder" id="fab">
            <tr>
              <td><input type="checkbox" name="chk"/></td>
              <td><select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px" autofocus required >
                <option value="" selected="selected">(fabrication)</option>
                <?php
             $SQL="select concern_name from tb_concern where concern_type like 'f_fabrication' order by concern_name ASC";
                                $obj->sql($SQL);
                                while($row = mysql_fetch_array($obj->result))
                                { 
                                $dis=$row['concern_name'];

                                echo '<option value="'.$dis.'">'.$dis.'</option>';
                                }
                                ?>
                </select></td>
              <td><input name="gsm[]" placeholder="GSM" type="number" tabindex="5" size="4" autofocus required id="gsm[]"></td>
              <td><input type="number" min="1" max="999" placeholder="req qty" autofocus required value="" size="8" name="req_qty[]" id="req_qty[]" /></td>
              <td><select name="f_uom[]" autofocus required  id="f_uom[]" style="font-size:11px">
                <option value="" selected="selected">UOM</option>
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
              </tr>
            </table>
          
          
          
          
        </td>
        <!-- <td scope="row">
           <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
        </td>-->
          
        <td scope="row"><select name="dia" id="dia" style="font-size:11px">
          <option value="" selected="selected">(dia)</option>
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
        <td scope="row"><select name="comments" id="comments" style="font-size:11px" required autofocus >
          <option value="" selected="selected">(Comments)</option>
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
          <option value="" selected="selected">yarn cnt.</option>
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
    
     <td scope="row"><textarea name="labdip" cols="9" list="characters8" rows="3" id="labdip" autofocus required placeholder="Lab Dip"></textarea>
     </td>
        <td scope="row"><input type="text" autofocus required value="VTL Fabric" size="8" placeholder="Vendor" name="supplyer" id="supplyer" /></td>
        <td scope="row"><input name="fab_rec_planned_date" class="rounded" type="text" id="fab_rec_planned_date" value="" placeholder="Fab Req Dlv Date" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>
        
         <td scope="row"><textarea name="collar_des" cols="9" rows="3" autofocus required placeholder="Collar Des">N/A</textarea></td>
        <td scope="row"><textarea name="collar_size" cols="9" rows="3" autofocus required placeholder="Collar Size">N/A</textarea></td>
        <td scope="row"><textarea name="collar_color" cols="9" rows="3" autofocus required placeholder="Collar Color">N/A</textarea></td>
        <td scope="row"><textarea name="collar_qty" cols="9" rows="3" autofocus required placeholder="Collar Qty">N/A</textarea></td>
        
        <td scope="row"><textarea name="cuff_des" cols="9" rows="3" autofocus required placeholder="Cuff Des">N/A</textarea></td>
        <td scope="row"><textarea name="cuff_size" cols="9" rows="3" autofocus required placeholder="Cuff Size">N/A</textarea></td>
        <td scope="row"><textarea name="cuff_color" cols="9" rows="3" autofocus required placeholder="Cuff Color">N/A</textarea></td>
        <td scope="row"><textarea name="cuff_qty" cols="9" rows="3" autofocus required placeholder="Cuff Qty">N/A</textarea></td>
        
        <td scope="row"><textarea name="dpd_cmt" cols="9" rows="2" id="dpd_cmt" placeholder="dpd Comm."></textarea></td>
        <td><input type="file" name="attachment" id="attachment" multiple="true" />
        
<br />

<div style="width:200px; height:auto">
<output id="list"></output></div>
<script>
function handleFileSelect(evt) {
var image = evt.target.files; // FileList object
// Loop through the FileList and render image files as thumbnails.
for (var i = 0, f; f = image[i]; i++) {
// Only process image files.
if (!f.type.match('image.*')) {
continue;
}
var reader = new FileReader();
// Closure to capture the file information.
reader.onload = (function(theFile) {
return function(e) {
// Render thumbnail.
var span = document.createElement('span');
span.innerHTML = ['<img class="thumb" src="', e.target.result,
'" title="', escape(theFile.name), '"/>'].join('');
document.getElementById('list').insertBefore(span, null);
};
})(f);
// Read in the image file as a data URL.
reader.readAsDataURL(f);
}
}
document.getElementById('attachment').addEventListener('change', handleFileSelect, false);
</script>
        
        </td>
      </tr>    
    
    </table><br />
    
    <!--<div align="center" style="background-color:#FFFFCC">-->
    <div align="center">
    <input class="btn btn-success" name="Submit" type="submit" />
    <input class="btn btn-danger" type="reset" name="Reset" id="button" value="Reset" />
    </div>
    </form>
    </div>
    

    <br />

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
    <th scope="row" width="120px">C Code</th>
    <th scope="row" width="110px">Remarks</th>
    <th scope="row" width="110px">Comments</th>
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
    <th scope="row">Comment</th>
    <th scope="row">Attachment</th>
    <th scope="row">Option</th>
  </tr>
  <?php
  
    $SQL="select * from tb_fabric_booking a WHERE a.sample_style='$style' AND a.season='$season'";
    	
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
       
  <?php if($sl%2=='0') { ?>
  <tr bgcolor="#F4F4F4">
  <?php }   
  else { ?>
  <tr>
  <?php } ?>
  
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><!--<input class="checkbox1" tabindex="2" name="checkbox[]" type="checkbox" checked="checked" id="checkbox[]" value="<?php // echo $row['sl']; ?>">&nbsp;&nbsp;&nbsp;-->
	<?php echo $sl ; ?></td>
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
    <td scope="row">&nbsp;</td>
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

</body>
</html>