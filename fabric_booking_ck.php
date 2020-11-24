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
	$msg=$_GET['msg'];
	//$tsl=$_GET['tsl'];
	
	
	$style = trim($style);
	$season = trim($season);	
	
	
	$SQLX="select create_date,customer,brand_style,style, qty,sd_agreed_sample_delivery_date,season,fabric_type,print_type,wash_type,product_type,embroidery_stitch, sd_concern_dpd_name from tb_track_info where style='$style' AND season='$season'";    //table name
	$resultsx = $obj->sql($SQLX);
	while($rowx = mysql_fetch_array($resultsx))
	{
		$create_date=$rowx['create_date'];
		$customer=$rowx['customer'];
		$brand_style=$rowx['brand_style'];
		$season=$rowx['season'];
		$qty=$rowx['qty'];
		
		$fabric_type=$rowx['fabric_type'];
		$print_type=$rowx['print_type'];
		$wash_type=$rowx['wash_type'];
		$product_type=$rowx['product_type'];
		$embroidery_stitch=$rowx['embroidery_stitch'];
		$sd_agreed_sample_delivery_date=$rowx['sd_agreed_sample_delivery_date'];
		
		$sd_concern_dpd_name=$rowx['sd_concern_dpd_name'];
		//$user_name
	}
	
	if($customer==NULL)
	{
  die('<span style="color:#F60"><strong>&nbsp;&nbsp;&nbsp;&nbsp;ERROR!!! PLEASE INPUT CORRECT STYLE AND SEASON</strong></span>')	 ;
	}
	if($sd_concern_dpd_name != $user_name)
	{
  die('<br/><span style="color:#F00; text-transform: uppercase;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Opps Sorry !!! This Style is not Assigned to you from SD End.</strong></span>')	 ;
	}
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample tracker</title>

        <link type="text/css" rel="stylesheet" href="images/bootstrap.min.css">
        <link rel="stylesheet" href="jquery.hoverZoom.css">
        

        <link href="css1/chosen/charisma-app.css" rel="stylesheet">
        <link href='css1/chosen/chosen.min.css' rel='stylesheet'>

        

	<script type="text/javascript" src="images/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $(".box .h_title").not(this).next("ul").hide("normal");
        $(".box .h_title").not(this).next("#home").show("normal");
        $(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
    });
    </script>

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
	 
	document.getElementById("fabrication_chosen").style.width = '200px';
	document.getElementById("composition_chosen").style.width = '300px';
	
	
	document.getElementById("fabrication_2_chosen").style.width = '150px';
	//document.getElementById("composition_2_chosen").style.width = '130px';
	
	
	document.getElementById("comments_chosen").style.width = '200px';
	document.getElementById("comments_yd_chosen").style.width = '200px';
	
	
	//document.getElementById("fabrication_yd_chosen").style.width = '200px';

	//element.style.backgroundColor = "red";
	
	//element.setAttribute("style", "background-color: red;");
                         
       }); 
    </script>
           
        <script type="text/javascript">
            $('document').ready(function()
			{
										
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
			
		
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
				
				
                var newcell = row.insertCell(i);

				if(i == 3)
				{
			
			
					
//var radio = '<input type="radio" name="RadioGroup1['+radio_array+']" value="1" id="RadioGroup1_1" /> Yes';
			
			
//var radio1 = '<select name="composition[]" id="composition_2" data-rel="chosen" tabindex="-1" style="font-size: 11px; display: none;" autofocus="" required=""><option value="" selected="selected">(composition)</option><option value="100% Carded Cotton">100% Carded Cotton</option><option value="100% Cotton">100% Cotton</option><option value="100% Cotton as VTL Ref-4650">100% Cotton as VTL Ref-4650</option><option value="100% Cotton BCI">100% Cotton BCI</option></select><div class="chosen-container chosen-container-single" style="width: 150px;" title="" id="composition_2_chosen"><a class="chosen-single" tabindex="-1"><span>Select Compo</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="4"></div><ul class="chosen-results"></ul></div></div>';

//var radio1 = '<select name="fabrication[]" id="fabrication_2" data-rel="chosen" tabindex="-1" style="font-size: 11px; display: none;" autofocus="" required=""><option value="" selected="selected">(composition)</option><option value="100% Carded Cotton">100% Carded Cotton</option><option value="100% Cotton">100% Cotton</option><option value="100% Cotton as VTL Ref-4650">100% Cotton as VTL Ref-4650</option><option value="100% Cotton BCI">100% Cotton BCI</option></select><div class="chosen-container chosen-container-single" style="width: 150px;" title="" id="fabrication_2_chosen"><a class="chosen-single" tabindex="-1"><span>Select Fab</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="4"></div><ul class="chosen-results"></ul></div></div>';

				
var radio1 = '<select name="fabrication[]" id="fabrication_3" data-rel="chosen" tabindex="-1" style="font-size: 11px; display: none;" autofocus="" required=""><option value="" selected="selected">(fabrication)</option><option value="Liza">Liza</option><option value="Sima">Sima</option></select><div class="chosen-container chosen-container-single" style="width: 150px;" title="" id="fabrication_3_chosen"><a class="chosen-single" tabindex="-1"><span>(fabrication)</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" tabindex="3"></div><ul class="chosen-results"><li class="active-result result-selected" data-option-array-index="0">(fabrication)</li><li class="active-result" data-option-array-index="1">Liza</li><li class="active-result" data-option-array-index="2">Sima</li></ul></div></div>';
				
			newcell.innerHTML = radio1;



			  // newcell.innerHTML = document.getElementById('data'+i).value;               
				
				}
				else
				{
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				}
				
 
                /*newcell.innerHTML = table.rows[0].cells[i].innerHTML;
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
                }*/
				
				
				
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
	function exl_dwnld () {
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
	}
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
    <td><strong>SD Sample Req Qty</strong></td>
    <td><?php echo $qty ; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />

<div align="center"><?php echo $msg; ?></div>

<br />

<div style="margin-left:30px">


    <div id="preview">
    </div>
    
    <div id="formbox">

    <details>
        <summary><strong>ADD FABRIC: </strong></summary>
        <!--<summary id="sfb"><strong>ADD Solid Fabric Booking: </strong></summary>
        <summary id="yfb"><strong>ADD Yarn Died Fabric Booking: </strong></summary>-->
    
        <br />
        
        <div align="center" id="options">
            <INPUT type="button" class="btn btn-success" value="Solid Fabric Booking" onClick="sldBooking()" />&nbsp;
            <input type="button" class="btn btn-info" value="Y/D Fabric Booking" onClick="yarndiedBooking()" />        
            <!--<input type="button" class="btn-primary" value="Y/D" onClick="ydBooking()" />
            <input type="button" class="btn btn-inverse" value="YD" onClick="ydBooking()" />-->
        </div>
    
        <br />
    
        <div id="solidbooking">
    
        <strong><span style="color:#025C64; font-size:14px">Solid Fabric Booking</span><span style="color:#025C64; font-size:20px"> &#10145; </span></strong>
        <br />
        <div align="center">
            <input type="button" class="btn btn-info" value="Add"  onClick="addRow('gradientstyle')" />&nbsp;
            <input type="button" class="btn btn-danger" value="Delete" onClick="deleteRow('gradientstyle')" />
        </div>
        <br />  
        <form name="form1" id="form" action="fabric_bookong_add.php" method="post">
        
        <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder" id="gradientstyle">
          <tr>
            <td><input type="checkbox" name="chk"/></td>
            <td scope="row"><select name="s_color[]" autofocus required id="s_color[]" tabindex="1" style="font-size:11px">
             <option value="" selected="selected">Gmt Color</option>
              <?php
               /*if($tsl != ''){
               $SQL="select color from tb_track_info where style like '$style' AND season='$season' ORDER BY sl DESC";
                      $obj->sql($SQL);
                      while($row = mysql_fetch_array($obj->result))
                      { 
                      echo '<option value="'.$row['color'].'~'.$tsl.'">'.$row['color'].'</option>';
                      }
                  }
               else{*/
               $SQL="select sl, color, sd_sample_type_name from tb_track_info where style like '$style' AND season='$season' AND sd_sample_reject_pass = '' ORDER BY sl DESC";
               //die($SQL);
                      $obj->sql($SQL);
                      while($row = mysql_fetch_array($obj->result))
                      { 
                      //$dis=$row['color'];
                      //$dis1=$row['sd_sample_type_name'];
                      echo '<option value="'.$row['color'].'~'.$row['sl'].'">'.$row['color'].' - '.$row['sd_sample_type_name'].'</option>';
                      }
                 // }
              ?>
              </select>
              
              <input name="customer[]" type="hidden" value="<?php echo $customer ; ?>" />
              <input name="style[]" type="hidden" value="<?php echo $style ; ?>" />
              <input name="season[]" type="hidden" value="<?php echo $season ; ?>" />
              </td>
            <td scope="row">      
          <input name="f_color[]" placeholder="Fab Color" type="text" tabindex="2" size="8" id="f_color[]" autofocus required >
                    
                    <!--list="characters6"-->
                    
                      <!--<datalist id="characters6">
                                     <?php
                 /*$SQL="select fab_color from tb_fabric_booking where dpd_id='$uid' GROUP BY fab_color";
                                    $obj->sql($SQL);
                                    while($row = mysql_fetch_array($obj->result))
                                    { 
                                    $dis=$row['fab_color'];
                                    echo '<option value="'.$dis.'">';
                                    }*/
                                    ?>
                     </datalist>-->  
              
            </td>
            <td scope="row"> <select name="fabrication[]" id="fabrication" data-rel="chosen" tabindex="3" style="font-size:11px" autofocus required >
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
              
              <td scope="row"> <select name="fabrication[]" id="fabrication_2" data-rel="chosen" tabindex="3" style="font-size:11px" autofocus required >
                <option value="" selected="selected">(fabrication)</option>
                <option value="Liza">Liza</option>
                <option value="Sima">Sima</option>
             
                <?php
                /*$SQL="select concern_name from tb_concern where concern_type like 'f_fabrication' order by concern_name ASC LIMIT 0,2";
					$obj->sql($SQL);
					while($row = mysql_fetch_array($obj->result))
					{ 
					$dis=$row['concern_name'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
					}*/
				?>
                
              </select>
              </td>
              
              
              
              
            <td scope="row"> <select name="composition[]" id="composition" data-rel="chosen" tabindex="4" style="font-size:11px" autofocus required >
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
            
            <input name="gsm[]" placeholder="GSM" list="characters7" type="number" tabindex="5" size="4" autofocus required id="gsm[]">
            
                    <!--<input name="gsm[]" placeholder="GSM" list="characters7" type="number" step="any" tabindex="5" size="4" autofocus required id="gsm[]">
    -->
                    
                      <!--<datalist id="characters7">
                                     <?php
                 /*$SQL="select gsm from tb_fabric_booking where dpd_id='$uid' GROUP BY gsm";
                                    $obj->sql($SQL);
                                    while($row = mysql_fetch_array($obj->result))
                                    { 
                                    $dis=$row['gsm'];
                                    echo '<option value="'.$dis.'">';
                                    }*/
                                    ?>
                     </datalist>--> 
            </td>
            <td scope="row"><textarea name="f_wash[]" cols="9" rows="3" id="f_wash[]" placeholder="Fabric Wash"></textarea></td>
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
                    
               <textarea name="c_code[]" cols="9" rows="3" id="c_code[]" autofocus required placeholder="Color Code"></textarea>
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
            <td scope="row"><select name="comments[]" id="comments" data-rel="chosen" style="font-size:11px" required autofocus >
              <option value="" selected="selected">(Special Comments)</option>
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
        
         <td scope="row"><textarea name="labdip[]" cols="9" list="characters8" rows="3" id="labdip[]" autofocus required placeholder="Lab Dip"></textarea>
         <!--<select name="labdip[]" id="labdip[]" autofocus required >
            <option value="" selected="selected">(labdip)</option>
           <option value="Ok">Ok</option>
           <option value="Not Ok">Not Ok</option>
           <option value="Running">Running</option>
           <option value="Pending">Pending</option>
        </select>--></td>
        
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
            
       <td scope="row"><textarea name="collar_des[]" cols="9" rows="3" placeholder="Collar Des"></textarea></td>
       <td scope="row"><textarea name="collar_size[]" cols="15" rows="3" placeholder="Size/Fabrication"></textarea></td>
       <td scope="row"><textarea name="collar_color[]" cols="9" rows="3" placeholder="Collar Color"></textarea></td>
       <td scope="row"><textarea name="collar_qty[]" cols="9" rows="3" placeholder="Collar Qty"></textarea></td>
            
       <td scope="row"><textarea name="cuff_des[]" cols="9" rows="3" placeholder="Cuff Des"></textarea></td>
       <td scope="row"><textarea name="cuff_size[]" cols="15" rows="3" placeholder="Size/Fabrication"></textarea></td>
       <td scope="row"><textarea name="cuff_color[]" cols="9" rows="3" placeholder="Cuff Color"></textarea></td>
       <td scope="row"><textarea name="cuff_qty[]" cols="9" rows="3" placeholder="Cuff Qty"></textarea></td>
    <td scope="row"><textarea name="dpd_cmt[]" cols="9" rows="3" id="dpd_cmt[]" placeholder="dpd Comm."></textarea></td>
    
          </tr>
              
        </table><br />
        
        <!--<div align="center" style="background-color:#FFFFCC">-->
        <div align="center">
        <input class="btn btn-success" name="Submit" type="submit" />
        <input class="btn btn-danger" type="reset" name="Reset" id="button" value="Reset" />
        </div>
        
        </form>
        <br />
        </div>
    
        <div id="ydbooking">
        
        <strong><span style="color:#025C64; font-size:14px">Yarn Died Fabric Booking</span><span style="color:#025C64; font-size:20px"> &#10145; </span></strong>
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
        <form name="form2" action="fabric_booking1.php" enctype="multipart/form-data" method="post">
        
        <table width="100%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder"  id="gradientstyle">
          <tr>
            <th scope="row">Combo</th>
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
            <th scope="row">Size/Fabrication</th>
            <th scope="row">Collar Color</th>
            <th scope="row">Collar Qty</th>
            <th scope="row">Cuff Des.</th>
            <th scope="row">Size/Fabrication</th>
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
                 $SQL="select sl, color, sd_sample_type_name from tb_track_info where style like '$style' AND season='$season' AND sd_sample_reject_pass = '' ORDER BY sl DESC";
                 //die($SQL);
                                    $obj->sql($SQL);
                                    while($row = mysql_fetch_array($obj->result))
                                    { 
                                    $dis=$row['color'];
                                    $dis1=$row['sd_sample_type_name'];
                                    echo '<option value="'.$dis.'~'.$row['sl'].'">'.$dis.' - '.$dis1.'</option>';
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
                  <td><select name="fabrication[]" id="fabrication_yd" tabindex="3" style="font-size:11px" autofocus required >
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
                  <td><textarea name="f_wash[]" id="f_wash[]" rows="3" cols="9" placeholder="Fab wash"></textarea></td>
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
            <td scope="row"><select name="comments" id="comments_yd" data-rel="chosen" style="font-size:11px" required autofocus >
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
            
     <td scope="row"><textarea name="collar_des" cols="9" rows="3" placeholder="Collar Des"></textarea></td>
    <td scope="row"><textarea name="collar_size" cols="9" rows="3" placeholder="Size/Fabrication"></textarea></td>
    <td scope="row"><textarea name="collar_color" cols="9" rows="3" placeholder="Collar Color"></textarea></td>
    <td scope="row"><textarea name="collar_qty" cols="9" rows="3" placeholder="Collar Qty"></textarea></td>
    
    <td scope="row"><textarea name="cuff_des" cols="9" rows="3" placeholder="Cuff Des"></textarea></td>
    <td scope="row"><textarea name="cuff_size" cols="9" rows="3" placeholder="Size/Fabrication"></textarea></td>
    <td scope="row"><textarea name="cuff_color" cols="9" rows="3" placeholder="Cuff Color"></textarea></td>
    <td scope="row"><textarea name="cuff_qty" cols="9" rows="3" placeholder="Cuff Qty"></textarea></td>
            
      <td scope="row"><textarea name="dpd_cmt" cols="9" rows="3" id="dpd_cmt" placeholder="DPD Comm."></textarea></td>
            <td><input type="file" name="attachment" id="attachment" />
            
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
        <input class="btn btn-success" name="submit" type="submit" value="Next" />
        <input class="btn btn-danger" type="reset" name="Reset" id="button" value="Reset" />
        </div>
        </form>
        
        </div>
    
    </details>

    </div>

    <br />
	<br />
<!--<br />-->

<details>
    <summary><strong>ALL FABRIC BOOKING ITEM : </strong></summary>
    
    <br />
    
       <!--<script type="text/javascript">
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
   </script>-->
   
<form action="fabric_booking_make_copy.php" method="post" target="_blank" enctype="multipart/form-data" name="form1" id="form1"> 
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
    <!--<form name="Form3" method="post">-->
<div align="center">
<?php 

  /*$cancel_cnt = 0;
  $knit_cnt = 0;
  $sto_cnt = 0;
    
$SQLCK1="select count(sto_po_no) AS 'sto_cnt' from tb_fabric_booking a WHERE a.sample_style='$style' AND a.season='$season' AND a.cancel_status = '0' AND a.sto_po_no != ''";
	$resultck1 = $obj->sql($SQLCK1);
	while($row = mysql_fetch_array($resultck1))
	{ $sto_cnt = $row['sto_cnt']; }
	
	
$SQLCK2="SELECT count(cancel_status) AS 'cancel_cnt' from tb_fabric_booking a WHERE a.sample_style='$style' AND a.season='$season' AND a.cancel_status = '0'";
	$resultck2 = $obj->sql($SQLCK2);
	while($row = mysql_fetch_array($resultck2))
	{ $cancel_cnt = $row['cancel_cnt']; }
	
	
$SQLCK3="select count(knit_status) AS 'knit_cnt' from tb_fabric_booking a WHERE a.sample_style='$style' AND a.season='$season' AND a.cancel_status = '0' AND knit_status = 'Complete'";
	$resultck3 = $obj->sql($SQLCK3);
	while($row = mysql_fetch_array($resultck3))
	{ $knit_cnt = $row['knit_cnt']; }*/	
	
// if ($cancel_cnt != 0 && $knit_cnt == 0)
//if ($knit_cnt == 0)
//{ // Cancel Cnt == 0 means did n't cancel Yet ?>
<!--<input name="Submit" type="submit" class="btn btn-info" onclick="OnButton1()" value="Cancel"> -->
<?php //}
// else if($cancel_cnt == 0 && $knit_cnt != 0)
//else if($knit_cnt != 0)
//{ ?>
<!--<input name="Submit" type="submit" class="btn btn-info" onclick="OnButton2()" value="Copy">--> 
<?php 
//}
//else
//{ // here it will forwarded to booking_revise_all ?>
<!--<input name="Submit" type="submit" class="btn btn-info" onclick="OnButton3()" value="Revise">--> 
<?php // }
//else echo '<strong> Error !!! </strong>';
?>
   
   <!--<a href="JavaScript:newPopup('cancel_booking.php');"><input name="test" type="button" class="btn btn-inverse" value="Test"></a>-->

</div>
<br />
<br />

<table width="2300px" border="1" style="font-size:8px" cellpadding="0" cellspacing="0" class="bottomBorder">
 
  <tr bgcolor="#DDDDDD" style="font-family:'MS Serif', 'New York', serif">
    <th><!--<label><span style="color:#000">
    <input type="checkbox" tabindex="1" id="selecctall"/></span>
    </label>-->#</th>
    <th width="20px">SL</th>
    <th scope="row" width="100px">Style</th>
    <th scope="row" width="100px">Color</th>
    <th scope="row" width="90px">Item Cat</th>
 	<!--<th scope="row">Sample Type</th>-->
    <th scope="row" width="120px">Fabrication</th>
    <th scope="row">GSM</th>
    <th scope="row">Req Qty</th>
    <th scope="row">UOM</th>
    <th scope="row" width="210px">Composition</th>
    <th scope="row" width="100px">Fab Clr.</th>
    <th scope="row" width="210px">C Code</th>
    <th scope="row" width="110px">Remarks</th>
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
  
  	<input name="h_style" value="<?php echo $style; ?>" type="hidden" />
    <input name="h_season" value="<?php echo $season; ?>" type="hidden" />
  
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
    <td><label><input name="checkbox[]" type="checkbox" class="checkbox1" id="checkbox[]" value="<?php echo $row['sl']; ?>"></label></td>
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

<script language="Javascript">
//function OnButton1()
//{
//    document.Form3.action = "cancel_booking_all.php"
//        // Open in a new window
//    document.Form3.submit();   	
//	document.Form3.target="_blank";
//    return true;
//}
//
//function OnButton2()
//{
//    document.Form3.action = "fabric_booking_copy_all.php"
//	document.Form3.target="_blank";
//	document.Form3.submit();             // Submit the page
//    return true;
//}
//
//function OnButton3()
//{
//    document.Form3.action = "fabric_booking_revise_all.php"
//    document.Form3.submit();             // Submit the page
//    return true;
//}
</script>

</div>
</div>
    <br/>

	   <div align="center" style="margin-left:500px">
            <div align="center" style="float:left">
            	<button class="btn btn-inverse" onClick="exl_dwnld()" style="cursor:pointer">Click to download as Excel</button>  
            </div>
          
			<div align="left" style="float:left">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" class="btn btn-info" size="14px" name="printMe2" onclick="printSpecial()" value="Click to Print">
			</div>
                        
			<div align="left">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            	<input name="search" type="submit" class="btn btn-success" id="Submit" value="Make Copy" />
			</div>
            
       </div>

</form>

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
      
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="jquery.hoverZoom.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
                $('.thumb img').hoverZoom({speedView:600, speedRemove:400, showCaption:true, speedCaption:600, debug:true, hoverIntent: true, loadingIndicatorPos: 'center', useBgImg : true});
        });
    </script>
    
    
    
    
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