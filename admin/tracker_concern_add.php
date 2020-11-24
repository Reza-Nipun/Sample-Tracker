
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
<!-- saved from url=(0028)http://kilab.pl/simpleadmin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
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
		  <div class="clear"></div>
		  <div class="full_w">
		    <div class="h_title">Add new item</div>
            <div class="entry">
              <div id="preview">
              
              
               </div>
              </div>
             <div id="formbox">
             
             
				<form name="" id="form" action="tracker_concern_save.php" method="post">
					<div class="element">
						<label for="comments"> Name <span class="red">(required)</span></label> 
					   <input type="text" id="name" name="c_name" required autofocus />
                        
					</div>
					<div class="element">
						<label for="category">Category<span class="red">(required)</span></label>
					  <select name="c_type" class="err" required autofocus >
							<option value="">- select item Type -</option>
                            <option value="Brand">Brand</option>
                            <option value="SAMPLE TYPE">SAMPLE TYPE</option>
                            <option value="Color">Color</option>
                            <option value="Color">season</option>
                            <option value="Fabric">Fabric Concern</option>
                            <option value="Fabric type">Fabric type</option>
                            <option value="Print type">Print type</option>
                            <option value="Wash type">Wash type</option>
                            <option value="Product type">Product type</option>
                            <option value="CUSTOMER">CUSTOMER</option>
                            <option value="Pattern Master">Pattern Master</option>
                            <option value="Sample Coordinator">Sample Coordinator</option>
                            <option value="Sample Quality Ins">Sample Quality Ins</option>
                            <option value="f_composition">F_composition</option>
                            <option value="f_dia">F_dia</option>
                            <option value="f_fabrication">F_fabrication</option>
                            <option value="f_item_cat">F_item_cat</option>
                            <option value="f_spicial_comment">F_spicial_comment</option>
                            <option value="f_uom">F_uom</option>
                            <option value="f_yarn_count">F_yarn_count</option>
                             <option value="gdl_print">GDL Print Type</option>
                              <option value="emb_type">Embroidery Type</option>
                            
                            
					  </select>
					</div>
				  
			
                  <div class="entry">
                  <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
                  
                  
                  </div>
				</form>
              </div>
			
            
            </div>
			
			<div class="full_w">
				<div class="h_title">Show All item</div>
             
		<!--		<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
				
					<div class="sep"></div>
			
                
                <table width="97%" border="1" class="draggable sortable" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Objective  Name</th>
							<th scope="col">Objective Type</th>
							<!--<th scope="col" style="width: 65px;">Modify</th>-->
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
				$sql = "select * from tb_concern ORDER BY sl DESC";
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
								<!--
                                <td>
								<a href="http://kilab.pl/simpleadmin/#" class="table-icon edit" title="Edit"></a>
								<a href="http://kilab.pl/simpleadmin/#" class="table-icon archive" title="Archive"></a>
								<a href="http://kilab.pl/simpleadmin/#" class="table-icon delete" title="Delete"></a>
								</td>
                                -->
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
                  
              //    echo"<hr>";
                  
                  if($prev>0){
                  
                  echo"<span><a href='?page=$prev'>«Previous</a></samp> ";
                  }            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
                  echo"<span class='active'> <b> $number </b></samp> ";
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
				
			  </div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>