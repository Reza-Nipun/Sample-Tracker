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
	}
	
	
	
		if (isset($_POST['search']))
 		{
	      $date=$_POST['date'];	
		  $date1=$_POST['date1'];	
		  $select_logic=$_POST['select_logic'];		
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
		url,'popUpWindow','height=350,width=450,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
    
        
        
  <?php  require("re_head.php"); ?>
        
	</head>
        
  <?php require("info.php"); ?>

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

			<div id="demo" style="margin-top:20px; ">


                <table width="2103" border="1" cellpadding="0" cellspacing="0" class="draggable" id="example" style="width:3800px !important; padding-bottom: 10px; background-color: #FFF; color:#000;">
                    
                    <!--class="display" forget-ordering    -->
                    
                    <thead>
                
                    
                    
                    <tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
                     <th width="42"><strong>SL</strong></th>
                    <th width="141">Buyer</th>
                    <th width="155"><strong>Style</strong></th>
                    <th width="127"><strong>Fab Color.</strong></th>
                    <th width="269"><strong>Fabrication</strong></th>
                    <th width="261"><strong>Composition</strong></th>
                    <th width="147"><strong>Item Cat</strong></th>
                    <th width="64"><strong>GSM</strong></th>
                    <th width="101" bgcolor="#FF99CC">In Hand Qty</th>
                    <th width="56" bgcolor="#FF99CC">UOM</th>
                    <th width="61" bgcolor="#FF99CC">Age</th>
                    <th width="102"><strong>C-Code</strong></th>
                    <th width="56"><strong>Dia</strong></th>
                    <th width="90"><strong>Fab Wash</strong></th>
                    <th width="95">Season</th>
                    <th width="164"><strong>Spcl Comt</strong></th>
                    <th width="122">Vendor</th>
                    <th width="62"><strong>Yarn</strong></th>
                    <th width="150">Comments</th>
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
                      </tr>
                    
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
				
				
				    
				$sql = "SELECT * FROM tb_fabric_booking WHERE store_rec_qty != '' AND (IFNULL(store_rec_qty,0)-IFNULL(store_use_qty,0)) > 0 ";
					
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
                    <tr id="<?php echo $row['sll'] ; ?>" class="edit_tr">
                        
                          <td title="<?php echo $row['sd_concern_mm_name'] ;  ?>"><?php echo $si ; ?></td>
                              <td title=""><?php echo $row['buyer'] ; ?></td>
                      <td  title="Create Date - <?php echo $row['dpd_date'] ;  ?>"><?php echo $row['sample_style'] ; ?></td>
                      <td><?php echo $row['fab_color'] ;  ?></td>
                      <td><?php echo $row['fabrication'] ;  ?></td>
                      <td><?php echo $row['composition'] ; ?></td>
                      <td><?php echo $row['item_cat'] ;  ?></td>
                      <td><?php echo $row['gsm'] ;  ?></td>
                      <td bgcolor="#FF99CC"><?php echo $row['store_rec_qty'] ;  ?></td>
                      <td bgcolor="#FF99CC"><?php echo $row['uom'] ;  ?></td>
                      <td bgcolor="#FF99CC"><?php echo $day_diff ;  ?></td>
                      <td><?php echo $row['c_code'] ;  ?></td>
                      <td><?php echo $row['dia'] ;  ?></td>
                      <td><?php echo $row['fab_wash'] ; ?></td>
                    <td><?php echo $row['season'] ;  ?></td>
                    <td><?php echo $row['comments'] ;  ?></td>
                    <td><?php echo $row['supplier'] ;  ?></td>
                    <td><?php echo $row['yarn_count'] ;  ?></td>
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
	
    
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script> <!--        
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

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
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
			
		</script>

<?php echo $row['season'] ;  ?>
</body>
</html>