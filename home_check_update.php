<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
	}
	
if($_GET['ID'])
{
$id=$_GET['ID'];
$style_get=$_GET['style'];
$SQL="delete from tb_check_list  where si='$id'";
$obj->sql($SQL);	 
$a="Delete Successful";	
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
		<title>Sample Tracker</title>
        <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        <script src="media/js/dragtable.js"></script>

        
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
   
<div width="80%"  style="margin-top:10px; ">
			
</div>
			<div id="demo" style="margin-top:20px; ">

<form action="home_check_update1.php" method="post">    
       
<table align="center" cellpadding="0" cellspacing="0" border="1" class="draggable" id="example" style="width: 90% !important; padding-bottom: 10px; background-color: #FFF; color: #FC0;">
	
    <!--class="display"  forget-ordering    -->
    
    <thead>
	<tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
    <th style="width:10px !important;">sl</th> <!--style="width: 200px !important; "-->
    <th style="width:65px !important;"><span style="width:40px !important;">Style</span></th>
    <th style="width:65px !important;"><span style="width:45px !important;">Color</span></th>
    <th style="width:65px !important;"> Type</th>
    <th style="width:40px !important;">List Name</th>
    <th style="width:45px !important;">Remark</th>
    <th style="width:75px !important;">Score</th>
    <th style="width:75px !important;">Date</th>
    <th style="width:75px !important;">Action</th>
    </tr>
    
		<tr>
			<td><input type="hidden" name="search_engine" value="Search engines" class="search_init" /></td>
			<td><input type="text" name="search_browser" value="Style" class="search_init" /></td>
			<td><input type="text" name="search_grade" value="Color" class="search_init" /></td>
			<td><input type="text" name="search_platform" value="Type" class="search_init" /></td>
			<td><input type="text" name="search_version" value="Name" class="search_init" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
    
	</thead>
	<tbody>
    
    <?php
	$sl=1;			
		foreach($_POST['checkbox'] as $rowz=>$checkbox)
		{	
		$checkbox=$checkbox;
        $sql="select * from tb_check_list WHERE si='$checkbox'"; 
  		$result = mysql_query($sql);
		$result=$obj->sql($sql);	
        while($row = mysql_fetch_array($result))
		{	

	
	?>
    
    
		<tr class="gradeA">
		  <td width=""><?php echo $sl ; ?> </td>
			<td valign="middle"><label><input name="checkbox[]" type="hidden" checked id="checkbox[]" value="<?php echo $row['si']; ?>"> &nbsp;<?php echo $row['style'] ; ?></label></td>
			<td><?php echo $row['color'] ; ?></td>
			<td><?php echo $row['object'] ; ?></td>
			<td><input name="list_name[]" id="list_name[]" value="<?php echo $row['list_name'] ; ?>" type="text"></td>
			<td><input name="remark[]" id="remark[]" value="<?php echo $row['remark'] ; ?>" type="text"></td>
			<td><input name="score[]" id="score[]" value="<?php echo $row['score'] ; ?>" type="text"></td>
			<td><?php echo $row['date'] ; ?></td>
			<td><a href="check_list.php?ID=<?php echo $row['si'] ; ?>&style=<?php echo $style_get ; ?>"><strong style="color:#CC0000" title="Delete" onclick="return confirm('Are you sure you want to delete?')">X</strong></a></td>
			
        </tr>
        
        <?php $sl++ ; } }?>
        
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


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />

</form> 

		</div>
			<br>
<br>
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
						this.value = asInitVals[$("tfoot input").index(this)];
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