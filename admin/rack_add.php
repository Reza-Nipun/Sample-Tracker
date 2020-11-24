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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://kilab.pl/simpleadmin/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<?php require("re_head.php"); ?>
       <script type="text/javascript" src="js/jquery.js"></script> 
       <script type="text/javascript" src="js/jquery.form.js"></script> 
<script type="text/javascript" src="images/jquery.min.js"></script>
       
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
        
  <SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>
        
        
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
		    <div class="h_title">Add new Rack</div>
             <div class="entry">
              <div id="preview">
              <?php //echo $a ; ?>
               </div>
              </div>

		    <div id="formbox">
             
		    <form name="" id="form" action="rack_save.php" method="post">
					<div class="element">
						<label for="comments">Add New Rack</label> 
					</div>
                    <div class="element">
                     <input type="button" value="Add"  onClick="addRow('gradientstyle')" />
    				 <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />
			  </div>
					<div class="element">
   <table width="60%" border="1" cellspacing="1" id="gradientstyle" class="bottomBorder" cellpadding="1">
   <tr>
   <td scope="col"><input type="checkbox" name="chk"/></td>
   <td scope="col" valign="middle" style="color:#000">Buyer :
     <select name="c_type[]" autofocus required id="c_type[]" class="rounded" style="font-size:11px">
          <option value="">--Select Buyer--</option>
         					     <?php
         $SQL1="select concern_name from tb_concern where concern_type like 'CUSTOMER' order by concern_name ASC";
                            $obj->sql($SQL1);
                            while($row1 = mysql_fetch_array($obj->result))
                            { 
                            $dis1=$row1['concern_name'];
                            echo '<option value="'.$dis1.'">'.$dis1.'</option>';
                            }
                            ?>
                            <option value="Other">Other</option>
        </select>
    </td>
 <td scope="col" valign="middle" style="color:#000">Rack Name :
   <input type="text" id="c_name[]" name="c_name[]" required autofocus placeholder="Rack Name"/></td>
    </tr>
	</table>
			  </div>
                  			
            <div class="entry">
                 <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
                 <!-- <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>-->                                   
            </div>
				</form>
        </div>            
        </div>
			
			<div class="full_w">
				<div class="h_title">Show All Rack List</div>
             
		<!--		<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
				
					<div class="sep"></div>
                    
				<table width="97%" border="1" class="draggable sortable" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Buyer  Name</th>
							<th scope="col">Rack Name</th>
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
				
				
			
				$sql = "select * from tb_rack_list ORDER BY sl DESC";
			
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
							<td><?php echo $row['buyer'] ; ?></td>
							<td><?php echo $row['rack'] ; ?></td>

							<td><?php if($rule=='5') { ?> <a href="rack_edit.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon edit" title="Edit"></a>
							<a href="#" class="table-icon archive" title="Archive"></a>
							<a href="rack_add.php.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon delete" onclick="return confirm('Are you sure you want to delete?')" title="Delete" ></a>
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