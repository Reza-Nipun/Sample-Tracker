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
	
	$style=$_GET['S_ID'];	
	$season=$_GET['season'];
	
	$style = trim($style);
	$season = trim($season);	
	
	
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
<br />
<br />


<details>
    <summary>ADD FABRIC: </summary>

<div id="preview">
              
</div>
<div align="center" style="background-color:#96D3D0">
    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />&nbsp;
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />
</div>
<br />
<br />
<div id="formbox">
<form name="" id="form" action="fabric_bookong_add.php" method="post">
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder"  id="gradientstyle">

 
  <tr>
    <td><input type="checkbox" name="chk"/></td>
    <td scope="row"><select name="s_color[]" autofocus required id="s_color[]" tabindex="1" style="font-size:11px">
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
      
      
      
      <input name="customer[]" type="hidden" value="<?php echo $customer ; ?>" />
      <input name="style[]" type="hidden" value="<?php echo $style ; ?>" />
      <input name="season[]" type="hidden" value="<?php echo $season ; ?>" />
      </td>
    <td scope="row">
     
      
  <input name="f_color[]" placeholder="fab Color"  list="characters6"  type="text" tabindex="2" size="8"  id="f_color[]" autofocus required >
            
              <datalist id="characters6">
              				 <?php
         $SQL="select fab_color from tb_fabric_booking where dpd_id='$uid' GROUP BY fab_color";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['fab_color'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>  
      
    </td>
    <td scope="row"> <select name="fabrication[]" id="fabrication[]" tabindex="3" style="font-size:11px" autofocus required >
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
      </select>
      
      </td>
    <td scope="row"> <select name="composition[]" id="composition[]" tabindex="4" style="font-size:11px" autofocus required >
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
      
   <!-- <td scope="row">
       <textarea name="fab_detail[]" cols="9" rows="3" id="fab_detail[]" placeholder="Fabric Details"></textarea>
    </td>-->
      
    <td scope="row">
    
    
    <input name="gsm[]" placeholder="GSM" value="200" list="characters7"  type="text" tabindex="5" size="4" autofocus required id="gsm[]">
            
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
    <td scope="row"><select name="dia[]" id="dia[]" style="font-size:11px">
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
    <td scope="row">
    
    
    <!--<input name="c_code[]" placeholder="C code"  list="characters8"  type="text" tabindex="5" size="6"  id="c_code[]">-->
            
       <textarea name="c_code[]" cols="9" list="characters8" rows="3" id="c_code[]" autofocus required placeholder="Color Code"></textarea>
            
              <datalist id="characters8">
              				 <?php
         $SQL="select color_code from tb_fabric_booking where dpd_id='$uid' GROUP BY color_code";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['color_code'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist> 
    
    
    </td>
    <td scope="row"><select name="item_cat[]"  id="item_cat[]" autofocus required style="font-size:11px">
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
    <!--<td scope="row">
       <textarea name="item_detail[]" cols="9" rows="3" id="item_detail[]" placeholder="Item Size & Qty"></textarea>
    </td>-->
    <td scope="row"><select name="comments[]" id="comments[]" style="font-size:11px" required autofocus >
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
    <td scope="row"><select name="yarn_count[]" id="yarn_count[]" style="font-size:11px">
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

 <td scope="row"><select name="labdip[]" id="labdip[]" autofocus required >
    <option value="" selected="selected">(labdip)</option>
   <option value="Ok">Ok</option>
   <option value="Not Ok">Not Ok</option>
   <option value="Running">Running</option>
   <option value="Pending">Pending</option>
</select></td>

    <td scope="row"><input type="text" autofocus required value="VTL Fabric" size="8" placeholder="Vendor" name="supplyer[]" id="supplyer[]" /></td>
    <td scope="row"><input type="number" min="1" max="999" placeholder="req qty" autofocus required value="" size="8" name="req_qty[]" id="req_qty[]" /></td>
    <td scope="row"><select name="f_uom[]" autofocus required  id="f_uom[]" style="font-size:11px">
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
    <td scope="row"><input name="fab_rec_planned_date[]" class="rounded" type="text" id="fab_rec_planned_date[]" value="" placeholder="Fab Req Dlv Date" tabindex="2" onClick="showCalendarControl(this);" autofocus required /></td>
    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="2" id="dpd_cmt[]" placeholder="dpd Comm."></textarea></td>
  </tr>



</table><br />

<!--<div align="center" style="background-color:#FFFFCC">-->
<div align="center" style="background-color:#B4E6FE">
<input name="Submit" type="submit" />
<input type="reset" name="Reset" id="button" value="Reset" />

</div>
</form>
</div>
</details>

<br />

<details>
    <summary>ALL FABRIC BOOKING ITEM : </summary>
    
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
<div id="tableWrap"> 

<table width="100%" border="1" style="font-size:8px" cellpadding="0" cellspacing="0" class="draggable sortable bottomBorder">
 
  <tr bgcolor="#DDDDDD" style="font-family:'MS Serif', 'New York', serif">
<th><label><span style="color:#000"><!--<input type="checkbox" tabindex="1" checked="checked" id="selecctall"/>&nbsp;&nbsp;&nbsp;-->
	SL</span></label></th>
    <th scope="row">Style</th>
    <th scope="row">Color</th>
 <!--   <th scope="row">Sample Type</th>-->
    <th scope="row">Fab Clr.</th>
    <th scope="row">Fabrication</th>
    <th scope="row">Composition</th>
    <th scope="row">GSM</th>
    <th scope="row">Dia</th>
    <th scope="row" width="8%">C Code</th>
    <th scope="row">Item Cat</th>
    <th scope="row">Comments</th>
    <th scope="row">Yearn</th>
    <th scope="row">Supplier</th>
    <th scope="row">Req Qty</th>
    <th scope="row">UOM</th>
    <th scope="row">Comment</th>
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
 <!--   <td scope="row"><?php // echo $row['sd_sample_type_name'] ;  ?></td>-->
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['fab_color'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['fabrication'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['composition'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['gsm'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['dia'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['color_code'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['item_cat'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['comments'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['yarn_count'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['supplier'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?> bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['uom'] ;  ?></td>
    <td <?php if($cancel_status !=0) { ?> style="color:#F00"<?php } if ($revise_status != 0) {?>style="font-size:14px; font-weight:bold"<?php } ?>><?php echo $row['remark_dpd'] ;  ?></td>
    			<td scope="row" style="font-size:13px"><strong>
               <?php if($cancel_status == 0) { ?> 
                <span style="color:#F00"><a href="JavaScript:newPopup('cancel_booking.php?ID=<?php echo $row['sl'] ; ?>&status=<?php if($delv_qty!=NULL && $sto_po_no!=NULL){ echo '3'; } if($delv_qty==NULL && $sto_po_no!=NULL){ echo '2'; } if($delv_qty==NULL && $sto_po_no==NULL){ echo '1'; } ?>');" style="color:#036"><?php echo 'Cancel' ; ?></a></span>
               <?php } ?>  

         <?php if($cancel_status != 0 && $sto_po_no==NULL) { ?>
                <span style="color:#0C0"><a href="fabric_booking_revise.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>" target="_blank"><?php echo 'Revise' ; ?></a></span>
         <?php } ?>
         
         <?php if($cancel_status != 0 && $sto_po_no!=NULL) { ?>
                <span style="color:#0C0"><a href="fabric_booking_copy.php?ID=<?php echo $row['sl'] ; ?>&tsl=<?php echo $row['track_info_sl'] ; ?>" target="_blank"><?php echo 'Copy' ; ?></a></span>
         <?php } ?>
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

    <br/>

<div align="center" style="background-color:#CCCCFF">
<button class="link-style2" style="cursor:pointer">Click to download as Excel</button>            
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

</body>
</html>