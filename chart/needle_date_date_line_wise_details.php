   <?php 
 	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
	
	
	
	$line=$_REQUEST['chk'];
	$date1=$_REQUEST['date1'];
	$date2=$_REQUEST['date2'];

	

	
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:11px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 


<meta charset="UTF-8" />
	<script type="text/javascript" src="../assets/jquery-1.9.0.js"></script>
	<script type="text/javascript">
	$(function(){
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>



<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=500,width=650,left=560,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>


</head>

<body>
<div id="tableWrap"> 
<table align="center" width="90%" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
    <th colspan="9" scope="col"><h2>needle Status (Details), <?php echo $date1 ; ?> To <?php echo $date2 ; ?></h2></th>
  </tr>
  <tr>
    <th scope="row">Sl.</th>
    <th bgcolor="#E5E5E5" scope="row">Employee ID</th>
    <th scope="row">Unit</th>
    <th bgcolor="#E5E5E5" scope="row">Floor</th>
    <th scope="row">Line</th>
    <th bgcolor="#E5E5E5" scope="row">Machine</th>
    <th scope="row">Date(m-d-Y)</th>
    <th bgcolor="#E5E5E5" scope="row">Size</th>
    <th scope="row">Quantity</th>
  </tr>

<?php
	$SQL="SELECT * 
FROM  `tb_niddle_details` 
WHERE  STR_TO_DATE( date,  '%m-%d-%Y' ) between STR_TO_DATE( '$date1',  '%m-%d-%Y' ) and STR_TO_DATE( '$date2',  '%m-%d-%Y' ) AND line like '$line' ORDER BY quantity DESC";    //table name
//die($SQL) ;
	$results = $obj->sql($SQL);
	$sl=1 ;
	while($row = mysql_fetch_array($results))
	{

?>
  
  <tr>
    <th scope="row"><?php echo $sl ; ?></th>
    <th bgcolor="#E5E5E5" scope="row"><a href="JavaScript:newPopup('../pop_employee_info.php?E_ID=<?php echo $row['e_id']; ?>');"><?php echo $row['e_id']; ?></a></th>
    <th scope="row"><?php echo $row['unit']; ?></th>
    <th bgcolor="#E5E5E5" scope="row"><?php echo $row['floor']; ?></th>
    <th scope="row"><?php echo $row['line']; ?></th>
    <th bgcolor="#E5E5E5" scope="row"><?php echo $row['machine']; ?></th>
    <th scope="row"><?php echo $row['date']; ?></th>
    <th bgcolor="#E5E5E5" scope="row"><?php echo $row['size']; ?></th>
    <th scope="row"><?php echo $row['quantity']; ?></th>
  </tr>
<?php
$sl++;
	}
	?>

</table>
<br />
<br />
</div>

<br />

<div align="center">
       <form id="printMe" name="printMe"> 
  <button style="cursor:pointer">Click to download as Excel</button> 
</form>
</div>
</body>
</html>