


	<?php

	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	

	?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/media/images/favicon.ico" />
		
		<title>DataTables example</title>
				<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
		</style>

        <script src="media/js/jquery-latest.js"></script>
        
        <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="media/js/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

        
        

		
        
        
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				/* Init DataTables */
				var oTable = $('#example').dataTable();
				
				/* Apply the jEditable handlers to the table */
				oTable.$('td').editable( 'examples_support/editable_ajax.php', {
					"callback": function( sValue, y ) {
						var aPos = oTable.fnGetPosition( this );
						oTable.fnUpdate( sValue, aPos[0], aPos[1] );
					},
					"submitdata": function ( value, settings ) {
						return {
							"row_id": this.parentNode.getAttribute('id'),
							"column": oTable.fnGetPosition( this )[2]
						};
					},
					"height": "14px",
					"width": "100%"
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				DataTables editing example
			</div>
			<div id="demo">
			  <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
    
        <?php
	
	if($customer!=NULL OR $brand_style_search!=NULL OR $style!=NULL OR $sd_concern_sd_name!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!=''";
	 if($customer!=NULL)
	 {
		$sql= $sql . "and customer='$customer'" ; 
	 }
	 if($brand_style_search!=NULL)
	 {
		$sql= $sql . " and brand_style='$brand_style_search'" ; 
	 }
	 if($style!=NULL)
	 {
		$sql= $sql . "and style='$style'" ; 
	 }
	 if($sd_concern_sd_name!=NULL)
	 {
		$sql= $sql . "and sd_concern_sd_name='$sd_concern_sd_name' " ; 
	 }
	 
}
else
{
        $sql="select * from tb_track_info order by sl DESC"; 
}
  $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	$id=$row['sl'] ;
	?>
    
		<tr id="1" class="gradeX">
			<td><?php echo $row['customer'] ; ?></td>
			<td><?php echo $row['brand_style'] ; ?>				</td>
			<td>Win 95+</td>
			<td class="center">4</td>
			<td class="center">X</td>
		</tr>
	
    
    <?php } ?>
    
	</tbody>
	<tfoot>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			<pre class="brush: js;">
			<script type="text/javascript" language="javascript" src="../examples_support/syntax/js/shCore.js"></script></pre>
			<div id="footer" class="clear" style="text-align:center;"></div>
		</div>
	</body>
</html>