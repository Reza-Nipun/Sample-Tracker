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
        $sys_date = date("m-d-Y");
	
?>
<?php

if (isset($_POST['Submit']))
 {
	$date=$_POST['date_search']; 
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
          <input name="date_search" type="text" id="date_search" value="<?php echo $sys_date ; ?>" placeholder="mm-dd-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required />
          <button type="submit" name="Submit">Search</button> 
            </form>
            </div>
            
				
					<div class="sep"></div>
                    <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				


				  <table width="97%" style="padding: 5px;" border="1" class="draggable sortable" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Name</th>
							<th scope="col">Department</th>
							<th scope="col">Ext</th>
							<th scope="col">email</th>
                            <th scope="col">Date</th>
                             <th scope="col">Login time</th>
							<!--<th scope="col" style="width: 65px;">Modify</th>-->
						</tr>
					</thead>
						
					
                    
                          <?php

$sd=0;
	$dpd=0;
	$mm=0;
	$sample=0;
                //PER PAGE COMPONENT
                $per_page=300;
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
				
				
 if($date!=NULL)
                {
				$sql = "select * from tb_user_track a,tb_admin b WHERE a.date='$date' AND b.user_name=a.name AND b.rule=a.dept GROUP BY a.name,a.dept ORDER BY a.sl DESC";
				}
				else
				{
				$sql = "select * from tb_user_track a,tb_admin b WHERE a.date='$sys_date' AND b.user_name=a.name AND b.rule=a.dept GROUP BY a.name ORDER BY a.sl DESC";
				}

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
							<td><?php echo $row['name'] ; ?></td>
                            <td>
							<?php 
							if ($row['dept']==1)
							{
							echo "SD" ;
							$sd=$sd+1; 
							}
							if ($row['dept']==2)
							{
							echo "MM" ; 
							$mm=$mm+1;
							}
							if ($row['dept']==3)
							{
							echo "DPD" ;
							$dpd=$dpd+1;
							 
							}
							if ($row['dept']==4)
							{
							echo "Sample" ;
							$sample=$sample+1; 
							}
						
							?>
                            </td>
                            <td><?php echo $row['ext'] ; ?></td>
                            <td><?php echo $row['email'] ; ?></td>
                            <td><?php echo $row['date'] ; ?></td>
							<td><?php echo $row['current_time'] ; ?></td>

					  </tr>
    <?php
	
	
	
		$sl++;
	}
	?> 
	
							
			
				 
				</table>
  <br />
<div style="padding-left:20px; font-size:14px; color:#000">SD = <?php echo $sd ; ?> , DPD= <?php echo $dpd ; ?> , MM= <?php echo $mm ; ?> Sapmle = <?php echo $sample ; ?> </div>
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