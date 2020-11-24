

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
?>
<?php

if (isset($_POST['Submit']))
 {
	$rule=$_POST['rule']; 
 }
if($_GET['ID'])
{
$id=$_GET['ID'];


	$SQL="select * from tb_admin where sl='$id'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$sla=$row['sl'];		
	}


if($sla!=NULL)
{
	$SQL="delete from tb_admin where sl='$id'";
	$obj->sql($SQL);	 
	$a="Delete Successful";	
}

}


//
//if($_GET['ID1'])
//{
//$id1=$_GET['ID1'];
//	$SQL="UPDATE `tb_admin` SET  `password` =  '123456' WHERE  `sl` ='$id1'";
//	$obj->sql($SQL);	 
//	$a="Password Update Successfully. New Password is 123456";	
//}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://kilab.pl/simpleadmin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<?php require("re_head.php"); ?>

<body>
<div class="wrap">
  <div id="header">
	<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php  echo $user_name ; ?></strong> [ <a href="logout.php">logout</a> ]</p>
			</div>


<?php require("re_head_date.php"); ?>
<script src="../media/js/dragtable.js"></script>
<script src="../media/js/sorttable.js"></script>


	  </div>
	
    
        <?php require("re_menu.php"); ?>
    
    
  </div>
	
	<div id="content">
		
		<div id="main1">
		  <div class="clear"></div>
		  <div class="full_w">
		    <div class="h_title">Select Info </div>
				<h3>Search</h3>
				
				  <form action="" method="post">
			<select name="rule" autofocus class="err" id="rule">

   <option selected="selected" value="">--Select rule--</option>
                            <?php
                          /*  $SQL="select * from tb_admin group by rule";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['rule'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }  */
                            ?>
                          <option value="1">SD</option>
                          <option value="2">MM</option>
                          <option value="3">DPD</option>
                          <option value="4">Sample</option>
                          <option value="6">SD/DPD/MM Head</option>
                          <option value="5">Super Admin</option>
                          <option value="7">Check list</option>
                          <option value="10">Knitting</option>
                          <option value="8">Dying</option>
                          <option value="9">Store</option>
                          <option value="11">GDL</option>
                          <option value="12">Embroidery</option>
                            
                            </select> <button type="submit" name="Submit">Search</button> 
                </form>
            
				<div class="sep" align="center"><strong style="color:#060">Rule-1=SD </strong>&nbsp;&nbsp;<strong style="color:#06C">Rule-2=MM </strong>&nbsp;&nbsp; <strong style="color:#9C0">Rule-3=DPD</strong>&nbsp;&nbsp; <strong style="color:#F3F">Rule-4=Sample </strong>&nbsp;&nbsp;<strong>Rule-6=SD/DPD Head </strong>&nbsp;&nbsp;<strong style="color:#030">Rule-7=Check list</strong>|&nbsp;&nbsp;<strong style="color:#030">Rule-11=GDL</strong></div>
                
					<div class="sep"></div>
                    <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				










				<table width="97%" class="draggable sortable" border="1"  cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Name</th>
							<th scope="col">User Name</th>
							<th scope="col">Ext</th>
							<th scope="col">Mobile</th>
							<th scope="col">email</th>
							<th scope="col">User Rule</th>
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
				
				
				 if($rule!=NULL)
                {
					$sql = "select * from tb_admin where rule like '$rule' ORDER BY sl DESC";
				}
				else
				{
				$sql = "select * from tb_admin ORDER BY name ASC";
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
							<td class="align-center" title="<?php echo $row['password'] ; ?>"><?php echo $sl ; ?></td>
							<td><?php echo $row['full_name'] ; ?></td>
							<td><?php echo $row['user_name'] ; ?></td>
							<td><?php echo $row['ext'] ; ?></td>
							<td><?php echo $row['mobile'] ; ?></td>
							<td><?php echo $row['email'] ; ?></td>
							<td><?php echo $row['rule'] ; ?></td>
							<td>
							<!--<a href="#.php?ID=<?php // echo $row['sl'] ; ?>" class="table-icon edit" title="Edit"></a>-->
							<a href="user_show.php?ID1=<?php echo $row['sl'] ; ?>" class="table-icon archive" onclick="return confirm('Are you sure want to Update password?')" title="Reset Password (123456)"></a>
							<a href="user_show.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon delete" onclick="return confirm('Are you sure want to delete?')" title="Delete" ></a>
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
					<a class="button add" href="user_new_add.php">Add new Item</a>  
			</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>