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
		url,'popUpWindow','height=350,width=1050,left=160,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
		    <div class="h_title">Department Wise User Track Style wise </div>
			
		
		
   			<div style="clear:both">
        <form action="" method="post">
          From <input name="date_search" type="text" id="date_search" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /> To
          <input name="date_search1" type="text" id="date_search1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required />
          <input name="Submit" type="submit" value="Submit" />

            </form>
            </div>
            
				
			<div class="sep">
            
            

<div id = "container" style = "width:100%">
    <div id ="left" style = "float:left; border:1px dotted #000000; width: 33%;">
    <div class="h_title">SD   From <?php echo $date1 ; ?> to <?php echo $date2 ; ?></div>
   
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">User SD</th>
    <th scope="col">Confirm Style</th>
  </tr>
  
  
  <?php
  	$SQL="SELECT COUNT(*) as tot , `sd_concern_sd_name` 
FROM tb_track_info a
WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y' ) 
AND STR_TO_DATE(  '$date2',  '%d-%m-%Y' )
AND sd_concern_sd_name!=''
GROUP BY  `sd_concern_sd_name` order by tot DESC";    //table name
	
	$sll=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
   ?>
  
  <tr>
    <td><?php echo $sll ; ?></td>
    <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
    <td><?php echo $row['tot'] ; ?></td>
  </tr>
  <?php 
  $sll++ ;
  
	} ?>
  
</table>
    
    
    
    
    </div>
    
    
    <div id = "middle" style = "float:left; border:1px dotted #000000; width: 33%;">
  <div class="h_title">DPD Track From <?php echo $date1 ; ?> to <?php echo $date2 ; ?></div>

<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">DPD</th>
    <th scope="col">Required</th>
    <th scope="col">Effort</th>
    <th scope="col">Balance</th>
  </tr>
  
<?php
  	$SQL="SELECT COUNT(*) as tot1 ,b.user_name,b.status, a.sd_concern_dpd_name,a.mm_fabricbooking_by_dpd_to_mm_date
FROM tb_track_info a , tb_admin b
WHERE b.status='1' AND  STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y' ) 
AND STR_TO_DATE(  '$date2',  '%d-%m-%Y' )
AND   a.sd_concern_dpd_name=b.user_name AND b.rule='3' AND  a.sd_concern_dpd_name!='' GROUP BY  a.sd_concern_dpd_name order by tot1 DESC";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''
	
	$tot1=0;
	
	$sl=1 ;
	$results = $obj->sql($SQL);
	while($row1 = mysql_fetch_array($results))
	{
   ?>
  
  <tr>
    <td><?php echo $sl ; ?></td>
    <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row1['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php echo $row1['sd_concern_dpd_name'] ;    $c_dpd=$row1['sd_concern_dpd_name'] ; ?></a></td>
    <td><?php echo $row1['tot1'] ;  $tot1=$row1['tot1'] ;    ?></td>
    <td>
    
	  <?php
  	$SQL2="SELECT COUNT(*) as tot2 , sd_concern_dpd_name,mm_fabricbooking_by_dpd_to_mm_date,sd_sample_reject_pass,dpd_clarification_sending_to_sd_date
FROM tb_track_info a
WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y') 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y') 
AND STR_TO_DATE(  '$date2', '%d-%m-%Y')
AND sd_concern_dpd_name='$c_dpd'
AND (mm_fabricbooking_by_dpd_to_mm_date!='' OR dpd_clarification_sending_to_sd_date!='')
";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''
	$results2 = $obj1->sql($SQL2);
	while($row2 = mysql_fetch_array($results2))
	{
   echo $row2['tot2'] ;    
   $tot2=$row2['tot2'] ; 
    }
	$c_dpd='' ;
?>
    </td>
    <td><a href="JavaScript:newPopup('user_track_dept_balance.php?DPD=<?php echo $row1['sd_concern_dpd_name'] ; ?>&DATE1=<?php echo $date1 ; ?>&DATE2=<?php echo $date2 ;  ?>');" style="color:#036"><?php echo trim($tot1-$tot2) ; ?></a></td>
  </tr>
  <?php   
  $sl++;
	} 
  ?>
  
</table>
    </div>
    
    
    
    <div id = "right" style = "float:left;border:1px dotted #000000; width: 32%;">
 <div class="h_title">MM Track From <?php echo $date1 ; ?> to <?php echo $date2 ; ?></div>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">Buyer</th>
    <th scope="col">Required</th>
    <th scope="col">Effort</th>
    <th scope="col">Balance</th>
  </tr>
  	<?php 
	$SQL3="SELECT COUNT( customer ) as cocus , a.customer
FROM tb_track_info a,  `tb_fabric_booking` b
WHERE a.style = b.`sample_style` 
AND a.color = b.`color` 
AND a.season = b.season
GROUP BY a.customer
ORDER BY  `b`.`sto_po_no` ASC";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''
	$siii=1;
	$results3 = $obj1->sql($SQL3);
	while($row3 = mysql_fetch_array($results3))
	{
		$buyer_mm=$row3['customer'] ;
		
		
		
	?>
  <tr>
    <td scope="row"><?php echo $siii ; ?></td>
    <td><?php echo $row3['customer'] ; ?></td>
    <td><?php  $cocus=$row3['cocus'] ; echo $row3['cocus'] ; ?></td>
    <td>  	<?php 
	$cocus1='0' ;
	$SQL4="SELECT COUNT( customer ) as cocus1 , a.customer
FROM tb_track_info a, `tb_fabric_booking` b
WHERE
a.customer='$buyer_mm'
AND a.style = b.`sample_style` 
AND a.color = b.`color` 
AND a.season = b.season
AND `b`.`sto_po_no`!=''
GROUP BY a.customer
ORDER BY  `b`.`sto_po_no` ASC";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''
	
	$results4 = $obj1->sql($SQL4);
	while($row4 = mysql_fetch_array($results4))
	{
		$cocus1=$row4['cocus1'] ;
		echo $cocus1 ;
	}
	
	?></td>
    <td><?php echo ($cocus-$cocus1) ; ?></td>
  </tr>
  <?php $siii++ ; } ?>
</table>
<table border="1" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <th>Concern MM</th>
        <th>Buyer Name</th>
      </tr>
      <tr>
        <td>Mosaraf </td>
        <td>PVH</td>
      </tr>
      <tr>
        <td rowspan="4">Ismail</td>
        <td>ESPRIT</td>
      </tr>
      <tr>
        <td>Soliver</p></td>
      </tr>
      <tr>
        <td>P and C</p></td>
      </tr>
      <tr>
        <td>PUMA</p></td>
      </tr>
      <tr>
        <td rowspan="4">Hedayet </p></td>
        <td>M and S</p></td>
      </tr>
      <tr>
        <td>NEXT</p></td>
      </tr>
      <tr>
        <td>DK</p></td>
      </tr>
      <tr>
        <td>SACOOR</p></td>
      </tr>
    </table>
    </div>
</div>
            
            
            <table width="100%" border="0" style=" clear: !important" cellspacing="0" cellpadding="0">
  <tr>
    <td scope="col" valign="top">

    </td>
    <td scope="col" valign="top">
   
   
    </td>
    <td scope="col" valign="top">
      
<!--    <table width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">MM</th>
    <th scope="col">Required</th>
    <th scope="col">Effort</th>
    <th scope="col">Balance</th>
  </tr>
  
<?php
/*

 $SQL1="SELECT COUNT(*) as tot5 , a.sd_concern_mm_name,a.fab_receive_actual_date,a.create_date
FROM tb_track_info a
WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y' ) 
AND STR_TO_DATE(  '$date2',  '%d-%m-%Y' )
AND a.sd_concern_mm_name!=''
GROUP BY  a.sd_concern_mm_name order by tot5 DESC";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''

	$sl5=1 ;
	$results = $obj->sql($SQL1);
	while($row1 = mysql_fetch_array($results))
	{
		*/
   ?>
  <tr>
    <td><?php // echo $sl5 ; ?></td>
    <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php // echo $row1['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php // echo $row1['sd_concern_mm_name'] ; $c_mm=$row1['sd_concern_mm_name'] ; ?></a></td>
    <td><?php // echo $row1['tot5'] ; $tot5=$row1['tot5'] ; ?></td>
    <td>
	<?php /*  $SQL2="SELECT COUNT(*) as tot7,a.create_date,a.sd_concern_mm_name,a.fab_receive_actual_date FROM tb_track_info a
WHERE STR_TO_DATE(a.create_date,  '%d-%m-%Y') 
BETWEEN STR_TO_DATE('$date1',  '%d-%m-%Y') 
AND STR_TO_DATE('$date2', '%d-%m-%Y')
AND a.sd_concern_mm_name='$c_mm'
AND a.fab_receive_actual_date!=''";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''
	$results2 = $obj1->sql($SQL2);
	while($row2 = mysql_fetch_array($results2))
	{
   echo $row2['tot7'] ;   
   $tot7=$row2['tot7'] ;   
    }
	$c_mm='' ;
	
	*/
	 ?>
    </td>
    <td><?php //echo trim($tot5-$tot7) ; ?></td>
  </tr>
  <?php 
//  $sl5++;
//	} ?>
  
</table>-->




    <p></p></td>
  </tr>
</table><br />








            
            
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