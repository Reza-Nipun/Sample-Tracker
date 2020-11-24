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
	
	
	 		if($_GET['ID'])
{
$id=$_GET['ID'];
	$SQL="delete from tb_lead_time where sl='$id'";
	$obj->sql($SQL);	 
	$a="Delete Successful";	
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
        
                <script type="text/javascript">
            $('document').ready(function()
			{		
	$('#form1').ajaxForm( {
        target: '#preview1', 
        success: function() { 
        $('#formbox1').slideUp('fast'); 
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
		    <div class="h_title">Lead time Action</div>
            <div class="entry">
              <div id="preview">
              
              
               </div>
              </div>
             <div id="formbox"></div>
			
             <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				

            </div>
			
            
            <div class="full_w">
		    <div class="h_title">Multiple Add Lead time</div>
            <div class="entry">
             
              </div>          
             <div id="preview1">
               </div>
				
				  <div class="element">
				    <div id="formbox1">
<form name="" id="form1" action="content_multi_save.php" method="post">
<INPUT type="button" value="Add Row" class="btn btn-success" onClick="addRow('gradientstyle')" />
<input type="button" value="Delete Row" class="btn btn-danger" onClick="deleteRow('gradientstyle')" />
    <table class="bottomBorder" id="gradientstyle" width="40%" border="1" cellspacing="0"  cellpadding="0">
      <tr>        
          <td width="4%" height="34"><input type="checkbox" name="chk"/></td>
          <td width="24%">
          <select name="customer[]" autofocus required id="customer[]" class="rounded" style="font-size:11px">
          <option value="">--Select Customer--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>
            </td>
            <td width="24%"><select name="sample_type[]" autofocus required id="sample_type[]" style="font-size:11px">
        <option value="" selected="selected">--Sample type--</option>
        <p></p>
        <?php
         $SQL="select concern_name from tb_concern where concern_type like 'SAMPLE TYPE' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
      </select></td>
            <td width="24%"><input name="content1[]" type="text" autofocus="autofocus" required="required" placeholder="Fab Booking" class="inp-form" id="content1[]" value="" size="8" /></td>
      		<td width="24%"><input name="content2[]" type="text" autofocus="autofocus" required="required" placeholder="Fab Recive" class="inp-form" id="content2[]" value="" size="8" /></td>
            <td width="24%"><input name="content3[]" type="text" autofocus="autofocus" required="required" placeholder="Print/Emb Send" class="inp-form" id="content3[]" value="" size="8" /></td>
            <td width="24%"><input name="content4[]" type="text" autofocus="autofocus" required="required" placeholder="Print/Emb Receive" class="inp-form" id="content4[]" value="" size="8" /></td>
            <td width="24%"><input name="content5[]" type="text" autofocus="autofocus" required="required" placeholder="Sew Start" class="inp-form" id="content5[]" value="" size="8" /></td>
            <td width="24%"><input name="content6[]" type="text" autofocus="autofocus" required="required" placeholder="Delv" class="inp-form" id="content6[]" value="" size="6" /></td>
      		<td width="24%"><input name="content7[]" type="text" autofocus="autofocus" required="required" placeholder="ttl Lead Time" class="inp-form" id="content7[]" value="" size="6" /></td>
      </tr>
      
  </table>            
  <button name="Submit" type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
                  </form>
                    </div>
                  <div class="entry"> </div>
              </div>
            </div>
            <div class="full_w">
				<div class="h_title">Show All Content</div>
             
		<!--		<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
				
					<div class="sep"></div>
                    
                    <table width="97%" border="1" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Buyer</th>
							<th scope="col">Sample type</th>
							<th scope="col">Fab Bok.</th>
							<th scope="col">Fab Rec</th>
							<th scope="col">Pr./Em Send</th>
							<th scope="col">Pr./Em Rec</th>
							<th scope="col">Sew Start</th>
							<th scope="col">Delv</th>
							<th scope="col" style="width: 50px;">Action</th>
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
				
				
				 if($item!=NULL)
                {
					$sql = "select * from tb_lead_time  ORDER BY sl DESC";
				}
				else
				{
				$sql = "select * from tb_lead_time  ORDER BY sl DESC";
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
							<td class="align-center"><?php echo $row['buyer'] ; ?></td>
							<td><?php echo $row['sample_type'] ; ?></td>
							<td><?php echo $row['fab_booking'] ; ?></td>
							<td><?php echo $row['fab_receive'] ; ?></td>
							<td><?php echo $row['print_send'] ; ?></td>
							<td><?php echo $row['print_recv'] ; ?></td>
							<td><?php echo $row['sew_start'] ; ?></td>
							<td><?php echo $row['delv'] ; ?></td>
							<td>
                            
                            <a href="content_update.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon edit" title="Edit"></a>
							<!--<a href="#" class="table-icon archive" title="Archive"></a>-->
                            
							<a href="content_add.php?ID=<?php echo $row['sl'] ; ?>" class="table-icon delete" onclick="return confirm('Are you sure you want to delete?')" title="Delete" ></a>
                            
                            
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
				</div>
                    
                    
					<div class="sep"></div>		
				<a class="button add" href="content_add.php">Add new Item</a> 
			  </div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>