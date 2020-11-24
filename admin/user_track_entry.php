<?php
	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username'];
	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_id=$row['id'];	
		$user_name=$row['name'];		
	}
	
		date_default_timezone_set("Asia/Dhaka");
        $sys_date = date("d-m-Y");
	
	
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
		url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
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
		    <div class="h_title">Select Info </div>
			
		
		
   			<div style="clear:both">
        <form action="" method="post">
          From <input name="date_search" type="text" id="date_search" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /> To
          <input name="date_search1" type="text" id="date_search1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required />
          <input name="Submit" type="submit" value="Submit" />

            </form>
            </div>
            
				
					<div class="sep"></div>
                    <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				

						<div id="tableWrap"> 
				<table width="97%" class="draggable sortable" border="1" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Sl</th>
							<th scope="col">Buyer</th>
							
							<th scope="col">Style</th>
							<th scope="col">User(SD)</th>
							<th scope="col">User (DPD)</th>
							<th scope="col">User (MM)</th>
							<th scope="col">User-Sample</th>
							<th scope="col">Delivary Dt.</th>
                            <th scope="col">Create Date (BY)</th>
                            <th scope="col">Status</th>
							<!--<th scope="col" style="width: 65px;">Modify</th>-->
						</tr>
					</thead>
						
					<tbody>
                    
                          <?php


                //PER PAGE COMPONENT
                $per_page=3000;
                //PAGE NO.
                if(!isset($_GET['page']))
                {
                $page=1;
                }else
                {
                $page = $_GET['page'];
                }
                if($page<=1)
                $start=0;
                else
                $start = $page * $per_page - $per_page;
				
				
 if($date1!=NULL)
                {
				$sql = "select * from tb_track_info a, tb_admin b WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' )  AND b.sl=a.user_id group by style";
				}
				else
				{
				$sql = "select * from tb_track_info a, tb_admin b WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$sys_date',  '%d-%m-%Y' ) and STR_TO_DATE( '$sys_date',  '%d-%m-%Y' )  AND b.sl=a.user_id  group by style";
				}
//echo $sql ;
$num_rows = mysql_num_rows(mysql_query($sql));
                $num_pages = ceil($num_rows / $per_page); 
                $sql .= " LIMIT $start, $per_page";
                $result = mysql_query($sql);
                $sl=1;
                while($row = mysql_fetch_array($result))
                {

	?>
                    
                    
						<tr>
							<td class="align-center"><?php echo $sl ; ?></td>
							<td><?php echo $row['customer'] ; ?></td>
                            
                            <td><a href="../style_details.php?IDX=<?php echo $row['style'] ; ?>" target="_blank">
							<?php echo $row['style'] ; ?></a></td>
                            <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['sd_concern_sd_name'] ; ?>&rule=1');" style="color:#036"><?php echo $row['sd_concern_sd_name'] ; ?></a></td>
                            <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['sd_concern_dpd_name'] ; ?>&rule=3');" style="color:#036"><?php echo $row['sd_concern_dpd_name'] ; ?></a></td>
                            <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['sd_concern_mm_name'] ; ?>&rule=2');" style="color:#036"><?php echo $row['sd_concern_mm_name'] ; ?></a></td>
                            <td><a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['dpd_concern_sample_coordinator_name'] ; ?>&rule=4');" style="color:#036"><?php echo $row['dpd_concern_sample_coordinator_name'] ; ?></a></td>
                            <td><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
                            <td><?php echo $row['create_date'] ; ?> - 
                          (<?php echo $row['name'] ; ?>)</td>
                            <td><?php echo $row['sd_sample_reject_pass'] ; ?></td>

					  </tr>
    <?php
		$sl++;
	}
	?>
	
							
			
				  </tbody>
				</table>
                
                              </div><br />

                <div align="center">
       <form id="printMe" name="printMe"> 
  <button style="cursor:pointer">Click to download as Excel</button> 
</form>
</div>
				<div class="entry">
					<div class="pagination">
                    
                    <?php
                  
                  $prev = $page - 1;
                  $next = $page + 1;
                  
                  echo"<br>";
                  
                  if($prev>0){
                  
                  echo"<span><a href='?page=$prev'>«Previous</a></samp> ";
                  }            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
                  echo" <b> [$number] </b> ";
                  }
                  else
                  {
                  echo"<a href='?page=$number'> $number </a> &nbsp;";
                  }
                  }
                  if($page < ceil($num_rows/$per_page))
                  echo"<a href='?page=$next'>Next »</a> ";                
                  ?>
                    
                    
                    
                    
                    
		<!--				<span>« First</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">Last »</a>-->
					</div>

         <div class="half_w">
            <table width="80%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">User SD</th>
    <th scope="col">Total</th>
  </tr>
  
  
  <?php
  	$SQL="SELECT COUNT(*) as tot , `sd_concern_sd_name` 
FROM tb_track_info a
WHERE STR_TO_DATE( a.create_date,  '%d-%m-%Y' ) 
BETWEEN STR_TO_DATE(  '$date1',  '%d-%m-%Y' ) 
AND STR_TO_DATE(  '$date2',  '%d-%m-%Y' )
AND sd_concern_sd_name!=''
GROUP BY  `sd_concern_sd_name` order by tot DESC";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
   ?>
  
  <tr>
    <td><?php echo $row['sd_concern_sd_name'] ; ?></td>
    <td><?php echo $row['tot'] ; ?></td>
  </tr>
  <?php 
	} ?>
  
</table>        
</div>
         <div class="sep">
           
           
           
           
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