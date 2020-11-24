<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
		
	$obj1 = new db_class();
	$obj1->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_id=$row['id'];	
		$user_name=$row['name'];		
	}
	
		date_default_timezone_set("Asia/Dhaka");
        $sys_date = date("d-m-Y");
		 $date1='24-11-2013' ;
		 $date2=$sys_date ;
	
	
?>
<?php

if (isset($_POST['Submit']))
 {
	$date1=$_POST['date_search']; 
	$date2=$_POST['date_search1']; 
 }
// 
// 		if($_GET['ID'])
//{
//$id=$_GET['ID'];
//	$SQL="delete from tb_concern where sl='$id'";
//	$obj->sql($SQL);	 
//	$a="Delete Successful";	
//}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://kilab.pl/simpleadamin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<?php require("re_head.php"); ?>
<script src="../media/js/dragtable.js"></script>
<script src="../media/js/sorttable.js"></script>

           <script src="../css1/CalendarControl1.js" type="text/javascript"></script>
<link href="../css1/CalendarControl.css" rel="stylesheet" type="text/css" />


<meta charset="UTF-8" />
	<script type="text/javascript" src="../css1/jquery-1.9.0.js"></script>
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
		url,'popUpWindow','height=350,width=1000,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

<body>
<div class="wrap">
  <div id="header">
	<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php  echo $user_name ; ?></strong>[<a href="logout.php">logout</a>]</p>
			</div>


<?php require("re_head_date.php"); ?>


	  </div>
	
    
        <?php require("re_menu.php"); ?>
    
    
  </div>
	
	<div id="content">
		
		<div id="main1">
		  <div class="clear">
          <div class="clear" align="center"><h2><a href="user_track.php">LOGIN TRACK</a> | 
           <a href="user_track_entry.php">Sample Entry Track</a></h2></div>
          </div>
		  <div class="full_w">
		    <div class="h_title">Department Wise Track Sample Status</div>
			
		
		
   			<div style="clear:both">
        <form action="" method="post">
          From <input name="date_search" type="text" id="date_search" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /> To
          <input name="date_search1" type="text" id="date_search1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required />
          <input name="Submit" type="submit" value="Submit" />

            </form>
            </div>
            
				
			<div class="sep">
            
            

<div id = "container" style = "width:100%">
    <div id ="left" style = "float:left; border:1px dotted #000000; width: 50%;">
    <div class="h_title">SD   From <?php echo $date1 ; ?> to <?php echo $date2 ; ?></div>
   
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">User SD</th>
    <th scope="col">Status Not Update</th>
  </tr>
  
  
  <?php
  
  	$SQL="SELECT T0.sd_concern_sd_name, COUNT(T0.sd_sample_reject_pass) AS 'sd_status' FROM  `tb_track_info` T0 LEFT JOIN tb_admin T1 ON T1.status ='1' AND T1.rule ='1'AND T1.user_name = T0.sd_concern_sd_name WHERE  T0.sd_sample_reject_pass =  '' AND T0.sd_concern_sd_name=t1.user_name AND STR_TO_DATE(T0.sd_agreed_sample_delivery_date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$date1', '%d-%m-%Y') AND STR_TO_DATE('$date2', '%d-%m-%Y') GROUP BY T0.sd_concern_sd_name ORDER BY sd_status DESC ";
	
	$sll=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
   ?>
  
  <tr>
    <td><?php echo $sll ; ?></td>
    <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td><a href="JavaScript:newPopup('user_track_dept_status.php?SD=<?php echo $row['sd_concern_sd_name'] ; ?>&DATE1=<?php echo $date1 ; ?>&DATE2=<?php echo $date2 ;  ?>');" style="color:#036"><?php echo $row['sd_status'] ; ?></a></td>
  </tr>
  <?php 
  $sll++ ;
  
	} ?>
  
</table>
    
    </div>
    
    <div id = "middle" style = "float:left; border:1px dotted #000000; width: 49%;">
<!--  <div class="h_title">DPD Track From <?php // echo $date1 ; ?> to <?php // echo $date2 ; ?></div>-->

<!--<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">User DPD</th>
    <th scope="col">Status Not Update</th>
    </tr>
  
<?php

//	$SQL1="SELECT T0.sd_concern_dpd_name, COUNT(T0.sd_sample_reject_pass) AS 'dpd_status' FROM  `tb_track_info` T0 LEFT JOIN tb_admin T1 ON T1.status ='1' AND T1.rule ='3' AND T1.user_name = T0.sd_concern_dpd_name WHERE  T0.sd_sample_reject_pass ='' AND T0.sd_concern_dpd_name=t1.user_name AND STR_TO_DATE(T0.sd_agreed_sample_delivery_date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$date1', '%d-%m-%Y') AND STR_TO_DATE('$date2', '%d-%m-%Y') GROUP BY T0.sd_concern_dpd_name ORDER BY dpd_status DESC";
//	$sl=1 ;
//	$results1 = $obj->sql($SQL1);
//	while($row1 = mysql_fetch_array($results1))
//	{
   ?>
  
  <tr>
    <td><?php// echo $sl ; ?></td>
    <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php // echo $row1['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php // echo $row1['sd_concern_dpd_name'] ;    $c_dpd=$row1['sd_concern_dpd_name'] ; ?></a></td>
    
    <td><a href="JavaScript:newPopup('user_track_dept_status.php?DPD=<?php // echo $row1['sd_concern_dpd_name'] ; ?>&DATE1=<?php // echo $date1 ; ?>&DATE2=<?php  // echo $date2 ;  ?>');" style="color:#036"><?php // echo $row1['dpd_status'] ; ?></a></td>
    </tr>
  <?php   
//  $sl++;
//	} 
  ?>
  
</table>-->
    </div>    
    
 </div><br />

            
            </div>
                 

			<div id="tableWrap"></div>
				<div class="entry">
					

 <!--        <div class="half_w">
        
                    
</div>
                  <div class="half_w">
                  
                    
</div>
      -->            <div class="sep">
                    
                    
                  </div>		
					<!--<a class="button add" href="tracker_concern_add.php">Add new Item</a>  -->
			</div>
		  </div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>