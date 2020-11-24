<?php

// Note: this page is created for test YD Fabric booking from DPD end. It works fine.

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
	
	/*$style=$_GET['S_ID'];	
	$season=$_GET['season'];
	
	$style = trim($style);
	$season = trim($season);*/	
	
	$style = 'HLX01365';
	$season = 'AW14';
	
	
	
	$SQLX="select create_date,customer,brand_style,style,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch from tb_track_info where style='$style' AND season='$season'";    //table name
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
		
		function addRowCmp(tableID) {
            var table = document.getElementById(tableID);
			var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);			   
			newcell.innerHTML = document.getElementById('cmp').value;               
        }

		function addRowClr(tableID) {
            var table = document.getElementById(tableID);
			var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);			   
			newcell.innerHTML = document.getElementById('clr').value;               
        }

		function addRowClrcode(tableID) {
            var table = document.getElementById(tableID);
			var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);			   
			newcell.innerHTML = document.getElementById('clrcode').value;               
        }
		
		function addRowCmnts(tableID) {
            var table = document.getElementById(tableID);
			var rowCount = 1 ;
            var row = table.insertRow(rowCount);
			var newcell = row.insertCell(0);			   
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
//function copyText() {
////var compo = document.getElementById('compo').value;
////document.getElementById('clr_cd').value = compo;	
//	
//compo = document.getElementById("compo");
//clr_cd = document.getElementById("clr_cd");
//clr_cd.value = compo.value + '        ' + clr_cd.value;
//
////var compo = jQuery('select[name="compo"]').val();
////jQuery('textarea[name="clr_cd"]').val(compo);
//
//
//}
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

<h2 align="center">Fabric Booking Style of <?php echo $style ; ?></h2>
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


<!--<details>-->
   <!-- <summary>ADD FABRIC: </summary>-->
<!--<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />&nbsp;
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />
</div>-->
<br />
<br />
<form name="" action="yd_fabric_booking1.php" method="post">
<table align="center" width="80%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">

 
  <tr bgcolor="#DDDDDD">
    <td scope="row">Fabrication</td>
    <td scope="row">GSM</td>
    <td scope="row">Qty</td>
    <td scope="row">Composition&nbsp;<select name="cmp" id="cmp" style="font-size:11px" >
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
      </select></td>
    <td scope="row">Color&nbsp;&nbsp;&nbsp;<input name="clr" id="clr" type="text" onclick="Select()" /></td>
    <td scope="row">Color Code&nbsp;<input name="clrcode" id="clrcode" type="text" onclick="Select()" /></td>
    <td scope="row">Comments&nbsp;<input name="cmnts" id="cmnts" type="text" onclick="Select()" /><!--<textarea name="cmnts" id="cmnts"></textarea>--></td>
    </tr>
  <tr bgcolor="#F4F4F4">
<td scope="row"><?php echo 'Brush Black'; ?><input name="fabrication" type="hidden" value="<?php echo 'Brush Black'; ?>" /></td>
    <td scope="row"><?php echo '500'; ?><input name="gsm" type="hidden" value="<?php echo '500'; ?>" /></td>
    <td scope="row"><?php echo '12 KG'; ?><input name="qty" type="hidden" value="<?php echo '12 KG'; ?>" /></td>
    <td scope="row" align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRowCmp('composition')" />&nbsp;
        </div>
        
        <textarea name="composition" readonly cols="30" rows="3">
        <?php echo '<table class="bottomBorder" id="composition">
           <tr></tr> 
        </table>' ; ?>
    	</textarea>
    </td>
    <td scope="row" align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRowClr('color0')" />&nbsp;
        </div>
        
        <textarea name="color" cols="20" rows="3">
        <?php echo '<table class="bottomBorder" id="color0">
            <tr></tr>
        </table>
'; ?>
    	</textarea>
    </td>
            
    <td scope="row" align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRowClrcode('ColorCode')" />&nbsp;
        </div>
        
        <textarea name="color_code" cols="25" rows="3">
        <?php echo '<table class="bottomBorder" id="ColorCode">
            <tr></tr>
        </table>
'; ?>
    	</textarea>
</td>
    <td scope="row" align="center">
    	<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add" onClick="addRowCmnts('comments')" />&nbsp;
        </div>
        
        <textarea name="comments" cols="30" rows="3">
        <?php echo '<table class="bottomBorder" id="comments">
            <tr></tr>
        </table>
		'; ?>
    	</textarea>
</td>
    <!--<td scope="row">
       <textarea name="item_detail[]" cols="9" rows="3" id="item_detail[]" placeholder="Item Size & Qty"></textarea>
    </td>-->    </tr>



</table><br />

<!--<div align="center" style="background-color:#FFFFCC">-->
<div align="center" style="background-color:#B4E6FE">
<input name="Submit" type="submit" />
<input type="reset" name="Reset" id="button" value="Reset" />

</div>
</form>
<!--</details>-->

<br />



</body>
</html>