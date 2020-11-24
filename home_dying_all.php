<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$search = 0;
	
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
	
		if (isset($_POST['search']))
 		{
		//  $customer=mysql_real_escape_string($_POST['customer']);
		//  $brand_style_search=mysql_real_escape_string($_POST['brand_style']);
		//  $style=mysql_real_escape_string($_POST['style']);	
		//  $color=mysql_real_escape_string($_POST['color']);
		//  $season=mysql_real_escape_string($_POST['season']);	
	     /* $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];*/
		  
	$search_sto = trim($_POST['search_sto']);	
	$search_style = trim($_POST['search_style']);	
	$search_ref = trim($_POST['search_ref']);
	
	$search_buyer = trim($_POST['search_buyer']);
	$search_fab_color = trim($_POST['search_fab_color']);	
	$search_dpd = trim($_POST['search_dpd']);

	$search_dy_date1 = trim($_POST['search_dy_date1']);	
	$search_dy_date2 = trim($_POST['search_dy_date2']);
		
		  $search = 1;
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
width:60px;
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
		url,'popUpWindow','height=350,width=350,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
   
  <div class="span12">
<h2><u>VTL Dying</u></h2>

<div width="80%"  style="margin-top:5px; ">

  <form action="home_dying_all.php" method="POST">
  
  <table align="left" class="bottomBorder" id="gradient-style" style="width:1300px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td bgcolor="#FF99CC">Buyer</td>
    <td bgcolor="#FF99CC"><input name="search_buyer" type="text" placeholder="Buyer Name" /></td>
    <td>Style</td>
    <td><input name="search_style" type="text" placeholder="Style NO" /></td>
    <td bgcolor="#FF99CC">STO NO</td>
    <td bgcolor="#FF99CC"><input name="search_sto" type="text" placeholder="STO NO" /></td>
    <td>Reference No</td>
    <td><input name="search_ref" type="text" placeholder="Ref NO" /></td>
    <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr>

    
  <tr align="center" style="font-weight:bold; font-size:11px">
    <td bgcolor="#CCCCFF">Fab Color</td>
    <td bgcolor="#CCCCFF"><input name="search_fab_color" type="text" placeholder="Fabric Color" /></td>
    <td>Concern DPD</td>
    <td><input name="search_dpd" type="text" placeholder="DPD Name" /></td>
    <td bgcolor="#CCCCFF">Delivery Date From</td>
    <td bgcolor="#CCCCFF"><input name="search_dy_date1" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    <td>Delivery Date TO</td>
    <td><input name="search_dy_date2" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    </tr>
  </table>
  
  <!--<table align="left" class="bottomBorder" id="gradient-style" style="width:1340px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td>STO NO</td>
    <td><input name="search_sto" type="text" placeholder="STO NO" /></td>
    <td>Style</td>
    <td><input name="search_style" type="text" placeholder="Style NO" /></td>
    <td>Reference No</td>
    <td><input name="search_ref" type="text" placeholder="Ref NO" /></td>
    
    
    <td>MM STO Create Date From</td>
    <td><input name="search_mm_date1" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    
    <td>MM STO Create Date TO</td>
    <td><input name="search_mm_date2" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>-->
               
<!--               <table align="left" class="bottomBorder" id="gradient-style" width="1300px" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    <td>Search By </td>
    <td>
      <select name="select_logic" id="select_logic">
        <option value="a.dpd_date">Fabric Booking Create Date</option>
        <option value="b.fab_receive_planned_date">Fabric Receive Planned Date</option>
        <option value="b.sd_agreed_sample_delivery_date">Agreed Sample Delivery Date</option>
      </select></td>
      
<td>Date from</td>
<td>
<input name="date" class="rounded" type="text" id="date" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    <td>Date To</td>
    <td><input name="date1" class="rounded" type="text" id="date1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /></td>
    
    <td><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>
-->

</form>

</div>

</div>







  <div class="span12">&nbsp;</div>

<?php 
if ($search == 1)
{
?>
	<div id="demo" style="margin-top:20px; ">
    
    <script type="text/javascript">
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

    <form action="home_dying_print.php" method="post">    
       
    <table cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width:2500px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
        
        <!--class="display"  forget-ordering    -->
        
        <thead>
    
        
        
        <tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
          <th><label><span style="color:#000">
	  <input type="checkbox" tabindex="1" id="selecctall"/></span>
</label></th>
      
      
  <th><strong>SL</strong></th>
    <th>Buyer</th>
    <th>Dept.</th>
    <th><strong>Style</strong></th>
    <th><strong>Season</strong></th>
    <th><strong>Combo</strong></th>
    <th><strong>Fab Color</strong></th>
    <th><strong>Color Code</strong></th>
    <th bgcolor="#FFFFCC">STO/PO</th>
    <th bgcolor="#CCCCFF">Referrence</th>
    <th width="100px" bgcolor="#FFFFCC">MM STO Create Date</th>
    <th bgcolor="#FFFFCC"><strong>Req Qty</strong></th>
    <th>UOM</th>
    <th bgcolor="#CCCCFF">DY Delv Qty</th>
    <th bgcolor="#CCCCFF">Dying Comt</th>
    <th bgcolor="#CCCCFF">DY Status</th>
    <th bgcolor="#CCCCFF">DY Delv Date</th>
    <th bgcolor="#CCFFCC">Knit Delv Qty</th>
    <th bgcolor="#CCFFCC" width="100px">Knit Comt</th>
    <th bgcolor="#CCFFCC">Knit Status</th>
    <th bgcolor="#CCFFCC">Knit Date</th>
    <th><strong>Fabrication</strong></th>
    <th><strong>Composition</strong></th>
    <th><strong>Collar Des</strong></th>
    <th><strong>Collar Size</strong></th>
    <th><strong>Collar Color</strong></th>
    <th><strong>Collar Qty</strong></th>
    <th><strong>Cuff Des</strong></th>
    <th><strong>Cuff Size</strong></th>
    <th><strong>Cuff Color</strong></th>
    <th><strong>Cuff Qty</strong></th>
    <th><strong>Remarks</strong></th>
    <th><strong>GSM</strong></th>
    <th><strong>Fab Wash</strong></th>
    <th><strong>Item Cat</strong></th>
    <th width="50px">Concern DPD</th>
    <th>Posting Date</th>
    <th>Attachment</th>
     <th>Sample Submit Date</th>
     <th width="90px" style="color:red">Booking Cancel Date</th>
     <th width="50x">Cancel Comments</th>
    
    <th width="50x">Revise Cmnts</th>
    <th width="200px"><strong>DPD Comt</strong></th>

    <th>Sample Type</th>
    <th><strong>Grmts Color</strong></th>
    <th><strong>Dia</strong></th>
     <th>Fab Rec. Planned Date</th>
    <th>labdip</th>
    <th><strong>Comt</strong></th>
    <th><strong>Yearn</strong></th>
    <th><strong>Supplier</strong></th>    
    <th bgcolor="#FF3300">Balance</th>    
    <th bgcolor="#FF99CC">Store rec Qty</th>
    <th bgcolor="#FF99CC">Store Status</th>
    <th bgcolor="#FF99CC">Store Date</th>
    <th width="50x">Cancel Reason</th>
    <th width="50x">Revise Reason</th>
    
        </tr>
                
      </thead>
        <tbody>
        
        <?php
        
    //	$SQL="select * from tb_fabric_booking";    //table name
    //	$results = $obj->sql($SQL);
        
    
        $sql="select a.*,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date, b.sd_concern_dpd_name,a.sl as sll,a.color_code as c_code from tb_fabric_booking a LEFT JOIN tb_track_info b ON a.track_info_sl=b.sl WHERE a.sl != ''";    //table name
        
        
        if($search_sto != NULL)
         { $sql= $sql . " AND a.sto_po_no LIKE '%$search_sto%'" ; }
         else
         { $sql= $sql . " AND a.sto_po_no!=''" ; }
         
         
        if($search_style != NULL)
         { $sql= $sql . " AND a.sample_style LIKE '%$search_style%'" ; }
         
        if($search_ref != NULL)
         { $sql= $sql . " AND a.referrence_id LIKE '%$search_ref%'" ; }
         
        
        if($search_buyer != NULL)
         { $sql= $sql . " AND a.buyer LIKE '%$search_buyer%'" ; }
         
        if($search_fab_color != NULL)
         { $sql= $sql . " AND a.fab_color LIKE '%$search_fab_color%'" ; }
         
        if($search_dpd != NULL)
         { $sql= $sql . " AND b.sd_concern_dpd_name LIKE '%$search_dpd%'" ; }
         
    
         if($search_dy_date1 != NULL && $search_dy_date2 == NULL)
         {
        $sql= $sql . " AND a.dy_date LIKE '$search_dy_date1'" ; 
         }
         
         if($search_dy_date1 == NULL && $search_dy_date2 != NULL)
         {
        $sql= $sql . " AND dy_date LIKE '$search_dy_date2'" ; 
         }
        
         if($search_dy_date1 != NULL && $search_dy_date2 != NULL)
         {
        $sql= $sql . " AND STR_TO_DATE( dy_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_dy_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_dy_date2',  '%d-%m-%Y')" ; 
         }
         
         
         $sql= $sql . " AND a.del_status='Complete' group by a.sl order by sll ASC " ;
         //die($sql);
         
    $result = $obj->sql($sql);
    
        
        //$result = get_data();
        $sl=1 ;
    
        
        while($row = mysql_fetch_array($result))
        {
        
        ?>
        <tr>
            
              <td><label><input name="checkbox[]" type="checkbox" class="checkbox1" id="checkbox[]" value="<?php echo $row['sll']; ?>"></label>
</td>
                
                  <td><?php echo $sl; ?></td>
                  <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['buyer'] ; ?></td>
<td><?php echo $row['brand_style'] ; ?></td>
<td title="Create Date - <?php echo $row['dpd_date'] ; ?>"><?php echo $row['sample_style'] ; ?></td>
<td><?php echo $row['season'] ; ?></td>
<td><?php echo $row['combo'] ; ?></td>
<td><?php echo $row['fab_color'] ;  ?></td>
<td><?php echo $row['color_code'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['sto_po_no'] ; ?></td>
    <td align="center" bgcolor="#CCCCFF"><?php echo $row['referrence_id']?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['mm_date'] ;  ?></td>
    <td bgcolor="#FFFFCC"><?php echo $row['dpd_req_qty'] ;  ?></td>
    <td><?php echo $row['uom'] ;  ?></td>
    
    <td bgcolor="#CCCCFF"><strong><?php echo $row['delv_qty']?></strong></td>
    <td bgcolor="#CCCCFF"><?php echo $row['remark_dy']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['del_status']?></td>
    <td bgcolor="#CCCCFF"><?php echo $row['dy_date']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_del_qty']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_comnt']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_status']?></td>
    <td bgcolor="#CCFFCC"><?php echo $row['knit_date']?></td>
<td><?php echo $row['fabrication'] ;  ?></td>
<td><?php echo $row['composition'] ;  ?></td>
<td><?php echo $row['collar_des'] ;  ?></td>
<td><?php echo $row['collar_size'] ;  ?></td>
<td><?php echo $row['collar_color'] ;  ?></td>
<td><?php echo $row['collar_qty'] ;  ?></td>
<td><?php echo $row['cuff_des'] ;  ?></td>
<td><?php echo $row['cuff_size'] ;  ?></td>
<td><?php echo $row['cuff_color'] ;  ?></td>
<td><?php echo $row['cuff_qty'] ;  ?></td>
<td><?php echo $row['remarks'] ;  ?></td>
<td><?php echo $row['gsm'] ;  ?></td>
<td  title="Item Category"><?php echo $row['f_wash'] ;  ?></td>
 <td  title="Item Category"><?php echo $row['item_cat'] ;  ?></td>
    
    
    
    
    
<td><a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#000"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
   <td title="Booking Date"><?php echo $row['dpd_date'] ;  ?></td>
   <td  title="Agreed Sample Submit Date"><a target="_blank" href="<?php echo $row['attachment'] ;  ?>"><?php echo $row['attachment'] ;  ?></a></td>
    <td  title="Agreed Sample Submit Date"><?php echo $row['sd_agreed_sample_delivery_date'] ;  ?></td>
    <td title="Booking Cancel Date"><strong><?php echo $row['cancel_date'] ;  ?></strong></td>
    <td><?php echo $row['cancel_cmnts'] ; ?></td>

<td><?php echo $row['revise_cmnts'] ;  ?></td> 
<td><?php echo $row['remark_dpd'] ;  ?></td>
    
    
     <td><?php echo $row['sd_sample_type_name'] ;  ?></td>
    <td><?php echo $row['color'] ;  ?></td>
    <td><?php echo $row['dia'] ;  ?></td>
  <td><?php echo $row['fab_receive_planned_date'] ;  ?></td>
 <td><?php echo $row['labdip'] ;  ?></td>
 <td><?php echo $row['comments'] ;  ?></td>
 <td><?php echo $row['yarn_count'] ;  ?></td>
 <td><?php echo $row['supplier'] ;  ?></td>
    <td bgcolor="#FF3300" style="font-size:14px; color:#FFF"><?php echo trim($row['dpd_req_qty']-$row['delv_qty']) ; ?></td>
        <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_status'] ;  ?></td>
    <td bgcolor="#FF99CC"><?php echo $row['store_date'] ;  ?></td>
<td><?php if($row['cancel_rsn'] == 1) echo 'Buyer Change'; if($row['cancel_rsn'] == 2) echo 'Wrong Booking'; ?></td>
<td><?php if($row['revise_rsn'] == 1) echo 'Buyer Change'; if($row['revise_rsn'] == 2) echo 'Wrong Booking'; ?></td>
            </tr>
            
            <?php $sl++ ; } ?>
            
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
        
    </table>

    <br>
    
    <div align="center">
<input name="submit" type="submit" class="btn btn-success" id="submit" value="Excel Preview »" /> &nbsp; <input name="input" type="reset" class="btn btn-danger" value="Reset" />
	</div>


      <!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->

    </form> 

	</div>
<?php 
}
?>
        
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
	
        
<!--        
        <script>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});
</script>
		-->

</body>
</html>