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
 
 if($date1!=NULL)
                {
	$SQL="SELECT  `date` 
FROM  `tb_user_track` WHERE STR_TO_DATE( date,  '%m-%d-%Y' ) between STR_TO_DATE( '$date1',  '%m-%d-%Y' ) and STR_TO_DATE( '$date2',  '%m-%d-%Y')
GROUP BY `date`";
	}
	else
	{
	$SQL="SELECT  `date` 
FROM  `tb_user_track`
GROUP BY `date`";

//GROUP BY  `date` 

//WHERE STR_TO_DATE( date,  '%d-%m-%Y' ) between STR_TO_DATE( '$sys_date',  '%d-%m-%Y' ) and STR_TO_DATE( '$sys_date',  '%d-%m-%Y' )


	}
	$icount=0;
	
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$dates=$row['date'];
		$datea[]=$dates ;
		
		
	$SQL1="select COUNT( * ) AS aa, `dept`  from `tb_user_track`  where date='$dates' GROUP BY `dept`";    //table name
	$results1 = $obj->sql($SQL1);
	while($row1 = mysql_fetch_array($results1))
	{		
		if($row1['dept']=='1')
				{
				$sdtot[$icount]=$row1['aa'];
				}
		if($row1['dept']=='2')
				{
				$mmtot[$icount]=$row1['aa'];
				}
		if($row1['dept']=='3')
				{
				$dpdtot[$icount]=$row1['aa'];
				}
		if($row1['dept']=='4')
				{
				$sampletot[$icount]=$row1['aa'];
				}	
	}
	$icount++ ;			
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

           <script src="../css1/CalendarControl.js" type="text/javascript"></script>
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
				<p>Welcome, <strong><?php  echo $user_name ; ?></strong> [ <a href="logout.php">logout</a> ]</p>
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
							<th scope="col">Date</th>
							
							<th scope="col">SD</th>
							<th scope="col">DPD</th>
							<th scope="col">MM</th>
							<th scope="col">Sample</th>
							<th scope="col">Status</th>
							<!--<th scope="col" style="width: 65px;">Modify</th>-->
						</tr>
					</thead>
						
					<tbody>
                    
                          <?php
$sl=1;
for($i=0;$i<$icount;$i++)
{
	
               

	?>
                    
                    
						<tr>
							<td class="align-center"><?php echo $sl ; ?></td>
							<td><?php echo $datea[$i] ; ?></td>                           
                            <td><?php echo $sdtot[$i] ; ?></td>
                            <td><?php echo $dpdtot[$i] ; ?></td>
                            <td><?php echo $mmtot[$i] ; ?></td>
                            <td><?php echo $sampletot[$i] ; ?></td>
                            <td></td>

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
					<div class="sep"></div>		
					<!--<a class="button add" href="tracker_concern_add.php">Add new Item</a>  -->
			</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>