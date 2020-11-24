<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	//date_default_timezone_set("Asia/Dhaka");
        $sys_date= date("d-m-Y");
	
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
	}
	
	
	
		/*if (isset($_POST['search']))
 		{
	      $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];		
		}*/
		
		
		if (isset($_POST['search']))
 		{
		
				$search_sto = trim($_POST['search_sto']);	
				$search_style = trim($_POST['search_style']);	
				$search_ref = trim($_POST['search_ref']);
				
				$search_buyer = trim($_POST['search_buyer']);
				$search_fab_color = trim($_POST['search_fab_color']);	
				$search_dpdm = $_POST['search_dpd'];
				
				$search_dpdm1 = explode("~", $search_dpdm);
				$search_dpd = $search_dpdm1[0];
				$search_dpd_name = $search_dpdm1[1];
				
				
			
				/*$search_mm_date1 = trim($_POST['search_mm_date1']);	
				$search_mm_date2 = trim($_POST['search_mm_date2']);*/
				
				$search_store_date1 = trim($_POST['search_store_date1']);	
				$search_store_date2 = trim($_POST['search_store_date2']);
				
				$search_dpd_date1 = trim($_POST['search_dpd_date1']);	
				$search_dpd_date2 = trim($_POST['search_dpd_date2']);	
				
				$search = 1;
		}
		
	

	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
 
		<!--<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>-->

        <!--<script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>
        <script type="text/javascript" src="media/jquery.min.js"></script>-->



   <script type="text/javascript" src="admin/js/jquery.js"></script> 
   <script type="text/javascript" src="admin/js/jquery.form.js"></script> 
       

	<script type="text/javascript">
	$(function(){
		
//$("input:button[name=dwnldexl]").click(function() {
		
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>  

      
      
  <style type="text/css">

<!--
/*@import url("css/table_style.css");*/
-->

</style> 
  <style type="text/css">
  

td
{
padding:5px;
}
 
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 
        
        
        
        
            
        
  <?php require("re_head.php"); ?>
        
	</head>
        
  <?php // require("info.php"); ?>

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
  <h2>Available Fabric List DPD Part</h2>
  <div class="divider"></div>  
</div>




<div width="80%" style="margin-top:10px; margin-left:10px; ">
  <form action="available_fabric_list_store.php" method="POST">
      <table align="left" class="bottomBorder" id="gradient-style" style="width:1350px" border="1" cellspacing="0" cellpadding="0">
      <tr align="center" style="font-weight:bold; font-size:11px">
      
        <td bgcolor="#FF99CC">Buyer</td>
        <td bgcolor="#FF99CC">
        
        <select name="search_buyer">
        <?php if($search_buyer != ''){ ?>
        <option selected value="<?php echo $search_buyer; ?>"><?php echo $search_buyer; ?></option>
        <?php } else { ?>
        <option selected value="">Search Buyer</option>
        <?php
		}
		
		
		
		$SQL = mysql_query("SELECT concern_name FROM tb_concern WHERE concern_type = 'CUSTOMER'");
		while($row = mysql_fetch_array($SQL))
		{
		echo "<option value='".$row['concern_name']."'>".$row['concern_name']."</option>";	
		}
		?>
        </select>
        
        
 <!--<input name="search_buyer" value="<?php // echo $search_buyer; ?>" type="text" placeholder="Buyer Name" />-->
 
 </td>
        <td>Style</td>
       <td><input name="search_style" value="<?php echo $search_style; ?>" type="text" placeholder="Style NO" /></td>
        <td bgcolor="#FF99CC">STO NO</td>
        <td bgcolor="#FF99CC"><input name="search_sto" value="<?php echo $search_sto; ?>" type="text" placeholder="STO NO" /></td>
        <td>Reference No</td>
        <td><input name="search_ref" value="<?php echo $search_ref; ?>" type="text" placeholder="Ref NO" /></td>
        <td bgcolor="#FF99CC">Fab Color</td>
        <td bgcolor="#FF99CC"><input name="search_fab_color" value="<?php echo $search_fab_color; ?>" type="text" placeholder="Fabric Color" /></td>
        <td rowspan="2">&nbsp;</td>
        <td rowspan="2"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" />
        <!--&nbsp;
          <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
        </td>
        </tr>
    
        
      <tr align="center" style="font-weight:bold; font-size:11px">
        <td bgcolor="#CCFFCC">Concern DPD</td>
        <td bgcolor="#CCFFCC">
        
        <!--<input name="search_dpd" type="text" value="<?php echo $search_dpd; ?>" placeholder="DPD Name" />-->
        
        <select name="search_dpd">
        <?php if($search_dpdm != ''){ ?>
        <option selected value="<?php echo $search_dpdm; ?>"><?php echo $search_dpd_name; ?></option>
        <?php } else { ?>
        <option selected value="">Select DPD Concern</option>
        <?php
		}
		
		
		$SQL = mysql_query("SELECT dpd_id, sd_concern_dpd_name FROM tb_fabric_booking T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.`track_info_sl` WHERE store_rec_qty != '' AND (IFNULL(store_rec_qty,0)-IFNULL(store_use_qty,0)) > 0 GROUP BY T0.dpd_id");
		while($row = mysql_fetch_array($SQL))
		{
		echo "<option value='".$row['dpd_id']."~".$row['sd_concern_dpd_name']."'>".$row['sd_concern_dpd_name']."</option>";	
		}
		?>
        </select>
        
        
        
        
        
        </td>
        <td>Fabric Booking Date From</td>
        <td align="left"><input name="search_dpd_date1" value="<?php echo $search_dpd_date1 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
        <td bgcolor="#CCFFCC">Fabric Booking Date To</td>
        <td bgcolor="#CCFFCC" align="left"><input name="search_dpd_date2" value="<?php echo $search_dpd_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
        <td>Store Recv. Date From</td>
        <td><input name="search_store_date1" value="<?php echo $search_store_date1; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
        <td bgcolor="#CCFFCC">Store Recv. Date TO</td>
        <td bgcolor="#CCFFCC" align="left"><input name="search_store_date2" value="<?php echo $search_store_date2 ; ?>" class="rounded" type="text" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" /></td>
        </tr>
      </table>
  </form>
</div>
<br /><br /><br /><br />






<?php 
if ($search == 1)
{
?>

    <div id="tableWrap" style="margin-top:70px; margin-left:10px; ">



        <!--<table width="1491" border="1" cellpadding="0" cellspacing="0" style="width:3800px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">-->
       
        <table border="1"cellpadding="0" cellspacing="0" style="padding-bottom: 10px; background-color: #FFF; color:#000;">
            
            <thead>

            
            <tr bgcolor="" style="color:#000; background-color:#999; height:43px; font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:normal">
             <th><strong>SL</strong></th>
            <th>Buyer</th>
            <th>Season</th>
            <th><strong>Style</strong></th>
            <th><strong>Fab Color.</strong></th>
            <th><strong>Fabrication</strong></th>
            <th><strong>Composition</strong></th>
            <th><strong>Item Cat</strong></th>
            <th><strong>GSM</strong></th>
            <th bgcolor="#FF99CC">In Hand Qty</th>
            <th bgcolor="#FF99CC">UOM</th>
            <th bgcolor="#FF99CC">Age</th>
            <th><strong>C-Code</strong></th>
            <th><strong>Dia</strong></th>
            <th><strong>Fab Wash</strong></th>
            <th><strong>Spcl Comt</strong></th>
            <th>Vendor</th>
            <th><strong>Yarn</strong></th>
            <th>DPD Concern</th>
            <th>Comments</th>
            </tr>
            
                <!--
                
                <tr bgcolor="" style="color:#000; background-color:#999; height:43px; font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:normal">
             <th width="50"><strong>SL</strong></th>
            <th width="134">Buyer</th>
            <th width="214"><strong>Style</strong></th>
            <th width="212"><strong>Fab Color.</strong></th>
            <th width="300"><strong>Fabrication</strong></th>
            <th width="365"><strong>Composition</strong></th>
            <th width="200"><strong>Item Cat</strong></th>
            <th width="106"><strong>GSM</strong></th>
            <th width="167" bgcolor="#FF99CC">In Hand Qty</th>
            <th width="93" bgcolor="#FF99CC">UOM</th>
            <th width="101" bgcolor="#FF99CC">Age</th>
            <th width="169"><strong>C-Code</strong></th>
            <th width="70"><strong>Dia</strong></th>
            <th width="122"><strong>Fab Wash</strong></th>
            <th width="138">Season</th>
            <th width="200"><strong>Spcl Comt</strong></th>
            <th width="170">Vendor</th>
            <th width="99"><strong>Yarn</strong></th>
            <th width="238">Comments</th>
            </tr>
            
            
                
                
                
                
                <tr>
                  <td><input type="hidden" name="SL" size="2" value="SL" class="search_init" /></td>
                    <td><input type="text" name="Buyer" size="5" value="Buyer" class="search_init" /></td>
                    <td><input type="text" name="Style" size="5" value="Style" class="search_init" /></td>
                    <td><input type="text" name="Fab Clr." size="5" value="Fab Clr." class="search_init" /></td>
                    <td><input type="text" name="Fabrication" size="5" value="Fabrication" class="search_init" /></td>
                    <td><input type="text" name="Composition" size="6" value="Composition" class="search_init" /></td>
                    <td><input type="text" name="Item Cat" size="4" value="Item Cat" class="search_init" /></td>
                    <td><input type="text" name="GSM" size="4" value="GSM" class="search_init" /></td>
                    <td><input type="text" name="Store Rec Qty" size="4" value="Store Rec Qty" class="search_init" /></td>
                    <td><input type="text" name="STO PO NO" size="4" value="STO PO NO" class="search_init" /></td>
                    <td><input type="text" name="Store Recv DT" size="6" value="Store Recv DT" class="search_init" /></td>
                    <td><input type="text" name="Clr Code" size="5" value="Clr Code" class="search_init" /></td>
                    <td><input type="text" name="Dia" size="4" value="DIA" class="search_init" /></td>
                    <td><input type="text" name="Fab Wash" size="4" value="Fab Wash" class="search_init" /></td>
                    <td><input type="text" name="Season" size="5" value="Season" class="search_init" /></td>
                  <td><input type="text" name="Spcl Comnt" size="4" value="Spcl Comnt" class="search_init" /></td>
                  <td><input type="text" name="Vendor" size="6" value="Vendor" class="search_init" /></td>
                    <td><input type="text" name="Yarn" size="4" value="Yarn" class="search_init" /></td>
                    <td><input type="text" name="Comments" size="5" value="Comments" class="search_init" /></td>
              </tr>-->
            
            </thead>
            <tbody>
            
            <?php
            
        //	$SQL="select * from tb_fabric_booking";    //table name
        //	$results = $obj->sql($SQL);
            
            
            
            /*if($user_rule=='6')
            {
                    $sql="select a.*,a.sl as sll,b.sd_concern_dpd_name,b.brand_style,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date,b.sd_sample_type_name,b.customer,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sl=a.track_info_sl";    //table name
            }	
        
        if($user_rule=='3')
            {
            $sql="select a.*,a.sl as sll,b.sd_concern_dpd_name,b.brand_style,b.fab_receive_planned_date,b.sd_agreed_sample_delivery_date,b.sd_sample_type_name,b.customer,a.color_code as c_code from tb_fabric_booking a,tb_track_info b WHERE b.sd_concern_dpd_name='$user_name' AND b.sl=a.track_info_sl";    //table name
            }
        $sql= $sql . " AND a.cancel_status = 0 order by sll ASC " ;
        */
        
        
$sql = "SELECT T0.*, T1.sd_concern_dpd_name FROM tb_fabric_booking T0 LEFT JOIN tb_track_info T1 ON T1.sl = T0.track_info_sl WHERE store_rec_qty != '' AND (IFNULL(store_rec_qty,0)-IFNULL(store_use_qty,0)) > 0";


if($search_sto != NULL)
{ $sql= $sql . " AND sto_po_no LIKE '%$search_sto%'" ; }
 
if($search_style != NULL)
{ $sql= $sql . " AND sample_style LIKE '%$search_style%'" ; }

if($search_ref != NULL)
{ $sql= $sql . " AND referrence_id LIKE '%$search_ref%'" ; }


if($search_buyer != NULL)
{ $sql= $sql . " AND buyer LIKE '%$search_buyer%'" ; }

if($search_fab_color != NULL)
{ $sql= $sql . " AND fab_color LIKE '%$search_fab_color%'" ; }

if($search_dpd != NULL)
{ $sql= $sql . " AND dpd_id = '$search_dpd'" ; }
 

if($search_store_date1 != NULL && $search_store_date2 == NULL)
{
$sql= $sql . " AND store_date LIKE '$search_store_date1'" ; 
}

if($search_store_date1 == NULL && $search_store_date2 != NULL)
{
$sql= $sql . " AND store_date LIKE '$search_store_date2'" ; 
}

if($search_store_date1 != NULL && $search_store_date2 != NULL)
{
$sql= $sql . " AND STR_TO_DATE( store_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_store_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_store_date2',  '%d-%m-%Y')" ; 
}

if($search_dpd_date1 != NULL && $search_dpd_date2 == NULL)
{
$sql= $sql . " AND dpd_date LIKE '$search_dpd_date1'" ; 
}

if($search_dpd_date1 == NULL && $search_dpd_date2 != NULL)
{
$sql= $sql . " AND dpd_date LIKE '$search_dpd_date2'" ; 
}

if($search_dpd_date1 != NULL && $search_dpd_date2 != NULL)
{
$sql= $sql . " AND STR_TO_DATE( dpd_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$search_dpd_date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$search_dpd_date2',  '%d-%m-%Y')" ; 
}

// $sql= $sql . " AND a.sto_po_no LIKE '55%' AND a.del_status!='Complete' group by a.sl order by sll ASC " ;

//$sql= $sql." AND a.del_status!='Complete' AND a.cancel_status = 0 group by a.sl order by LENGTH(mm_date), mm_date ASC" ;

$sql= $sql . " order by sl DESC" ;

// LIMIT 0,5

//die($sql);





        
        
        
        
        
        
        
        
            
            
            // die($sql);
        //	$obj->sql($sql);
        $result = $obj->sql($sql);
            
            //$result = get_data();
    $today = date('d-m-Y');
            $si=1 ;
        while($row = mysql_fetch_array($result))
            {
                
                
        if($row['store_date'] != '')
        {
        $store_date = $row['store_date'];
        $time_diff = abs(strtotime($today) - strtotime($store_date));
        $day_diff = $time_diff / (60*60*24);
        $day_diff = $day_diff.' Days';
        }
        else $day_diff = ''; 
        
                
            ?>
            <tr>
                
     <td title="<?php echo $row['sd_concern_mm_name'] ;  ?>" style="text-align:center"><?php echo $si ; ?></td>
                      <td title=""><?php echo $row['buyer'] ; ?></td>
                      <td><?php echo $row['season'] ;  ?></td>
              <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
              <td><?php echo $row['fab_color'] ;  ?></td>
              <td><?php echo $row['fabrication'] ;  ?></td>
              <td><?php echo $row['composition'] ; ?></td>
              <td><?php echo $row['item_cat'] ;  ?></td>
              <td><?php echo $row['gsm'] ;  ?></td>
              <td bgcolor="#FF99CC" style="text-align:center"><?php echo $row['store_rec_qty'] ;  ?></td>
              <td bgcolor="#FF99CC"><?php echo $row['uom'] ;  ?></td>
              <td bgcolor="#FF99CC"><?php echo $day_diff ;  ?></td>
              <td><?php echo $row['c_code'] ;  ?></td>
              <td><?php echo $row['dia'] ;  ?></td>
              <td><?php echo $row['fab_wash'] ; ?></td>
            <td><?php echo $row['comments'] ;  ?></td>
            <td><?php echo $row['supplier'] ;  ?></td>
            <td><?php echo $row['yarn_count'] ;  ?></td>
            <td><?php echo strtoupper($row['sd_concern_dpd_name']) ;  ?></td>
            <td><?php echo $row['remarks'] ;  ?></td>
            </tr>
                
                <?php $si++ ; } ?>
                
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
    


<!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
&nbsp;
<input name="input" type="reset" class="btn btn-danger" value="Reset" />-->



</div>
    <br>
            
<div align="center">
          <!--<input name="submit" type="submit" class="btn btn-success" id="submit" value="Excel Download »" />-->
   
   <button class="btn btn-success" style="cursor:pointer">Click to download as Excel</button>  
          
          <!--&nbsp;
          <input name="input" type="reset" class="btn btn-danger" value="Reset" />-->
      </div>
    <br>
    
    
<?php
}
?>
    


            
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
	
    
<!--<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>-->
        
        
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

<!--<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
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
			
		</script>-->

</body>
</html>