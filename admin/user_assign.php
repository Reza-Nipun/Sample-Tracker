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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require("re_head.php"); ?>

       <script type="text/javascript" src="js/jquery.js"></script> 
       <script type="text/javascript" src="js/jquery.form.js"></script> 

        <script type="text/javascript">
            $('document').ready(function()
			{		
	$('#form').ajaxForm( {
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
						
            });
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
		  <div class="clear"></div>
		  <div class="full_w">
		    <div class="h_title">Assign User</div>
            <div class="entry">
              <div id="preview">
              
              
               </div>
              </div>
             <div id="formbox">
             
             
				<form name="" id="form" action="user_assign_save.php" method="post">
					<div class="element">
						<label for="password">Buyer<span class="red">(required)</span> </label>
						 
					      <select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Buyer-</option>
         					     <?php
         $SQL4="select concern_name from tb_concern where concern_type like 'CUSTOMER' group by concern_name";
                            $obj->sql($SQL4);
                            while($row4 = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row4['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>
						
					  
                      
					</div>
					<div class="element">
					  <label for="rule">User Name -- (SD/DPD Head)<span class="red">(required)</span></label>
                      
                      <select name="sd_concern_sd_name" autofocus required id="sd_concern_sd_name" style="font-size:11px">
        <option value="<?php echo $user_name ; ?>" selected="selected"> <?php echo $user_name ; ?> </option>
        
        
        
        <?php
         $SQL="select user_name,sl from tb_admin where rule like '6' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
							 $sl=$row['sl'];
                            echo '<option value="'.$sl.'~'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
                      
				  </div>
				  <div class="entry">
				    <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
				  </div>
				</form>
                
                
               <div class="sep"></div>
                <table width="97%" class="draggable sortable" border="1"  cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">User Name</th>
							<th scope="col">Buyer</th>
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
				
				
		
				$sql = "select * from tb_admin_assign ORDER BY user_name ASC";
		
$num_rows = mysql_num_rows(mysql_query($sql));
                $num_pages = ceil($num_rows / $per_page); 
                $sql .= " LIMIT $start, $per_page";
                $result = mysql_query($sql);
                $sl=1;
                while($row = mysql_fetch_array($result))
                {

	?>
                    
                    
						<tr>
							<td class="align-center" title=""><?php echo $sl ; ?></td>
							<td><?php echo $row['user_name'] ; ?></td>
							<td><?php echo $row['buyer'] ; ?></td>
							<td>
							<!--<a href="#.php?ID=<?php // echo $row['sl'] ; ?>" class="table-icon edit" title="Edit"></a>-->
							<!--<a href="user_show.php?ID1=<?php // echo $row['sl'] ; ?>" class="table-icon archive" onclick="return confirm('Are you sure want to Update password?')" title="Reset Password (123456)"></a>
							<a href="user_show.php?ID=<?php // echo $row['sl'] ; ?>" class="table-icon delete" onclick="return confirm('Are you sure want to delete?')" title="Delete" ></a>-->
							</td>
						</tr>
                        
                        
                        
                        	  <?php
		$sl++;
	}
	?>
	
							
			
				  </tbody>
				</table>
                </br>
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
              </div>
			
            
            </div>
		</div>
		<div class="clear"></div>
        
       

	
</div>
</div>

<?php require("re_footer.php"); ?>

</body>
</html>