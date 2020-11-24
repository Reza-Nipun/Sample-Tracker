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
		$rule=$row['rule'];		
	}
?>
<?php

if (isset($_POST['Submit']))
 {
	$concern=$_POST['concern']; 
 }
 
 		if($_GET['ID'])
{
$id=$_GET['ID'];
	$SQL="delete from tb_concern where sl='$id'";
	$obj->sql($SQL);	 
	$a="Delete Successful";	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://kilab.pl/simpleadamin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<?php require("re_head.php"); ?>
<script src="../media/js/dragtable.js"></script>
<script src="../media/js/sorttable.js"></script>

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
		  <div class="clear" align="center"><h2><a href="user_track.php">LOGIN TRACK</a> | 
           <a href="user_track_entry.php">Sample Entry Track</a></h2></div><br />
		  </div>
		  <div class="full_w">
		    <div class="h_title"> </div>
				<h3>Search</h3>
				
				  <form action="" method="post">
			<select name="concern" autofocus class="err" id="concern" required >

   <option selected="selected" value="">Select Concern Type</option>
                            <?php
                            $SQL="select * from tb_concern group by concern_type ";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_type'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
                            </select>                      <button type="submit" name="Submit">Search</button> 
                </form>
            
				
					<div class="sep"></div>
                    <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				


				<table width="97%" border="1" class="draggable sortable" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Concern Name</th>
							<th scope="col">Concern Type</th>
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
                    
                          <?php


                //PER PAGE COMPONENT
                $per_page=100;
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
				
				
				 if($concern!=NULL)
                {
					$sql = "select * from tb_concern where concern_type like '$concern' ORDER BY sl DESC";
				}
				else
				{
				$sql = "select * from tb_concern ORDER BY sl DESC";
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
							<td><?php echo $row['concern_name'] ; ?></td>
							<td><?php echo $row['concern_type'] ; ?></td>

							<td>
                            <?php if($rule=='5') { ?>
							<a href="tracker_concern_update.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="tracker_concern_show.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon delete" onclick="return confirm('Are you sure you want to delete?')" title="Delete" ></a>
							<?php } ?>
                            </td>
						</tr>
                        
                        
                        
                        	  <?php
		$sl++;
	}
	?>
	
							
			
				  </tbody>
				</table>
				<div class="entry">
					<div class="pagination">
                    
                    <?php
                  
                  $prev = $page - 1;
                  $next = $page + 1;
                  
                  echo"<hr>";
                  
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
					<a class="button add" href="tracker_concern_add.php">Add new Item</a>  
			</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>