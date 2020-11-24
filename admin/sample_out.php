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
	$area=$row['area'];
	$user_type=$row['rule'];		
	}
	
	 		if($_GET['ID'])
{
	
$id=$_GET['ID'];
	$SQL="delete from tb_sustain_social1 where sl='$id'";
	$obj->sql($SQL);	 
	$a="Delete Successful";	
}

if (isset($_POST['Submit']))
 {
	$date1=$_POST['date_search']; 
	$date2=$_POST['date_search1']; 
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
<script src="../media/js/dragtable.js"></script>
<script src="../media/js/sorttable.js"></script>

           <script src="../css1/CalendarControl1.js" type="text/javascript"></script>
<link href="../css1/CalendarControl.css" rel="stylesheet" type="text/css" />

	  </div>
	
    
        <?php require("re_menu.php"); ?>
    
    
  </div>
	
	<div id="content">
		
		<div id="main1">
		  <div class="clear"></div>
		  <div class="full_w">
		    <div class="h_title">Search By Date</div>
         
              <form action="" method="post">
          From <input name="date_search" type="text" id="date_search" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required /> To
<input name="date_search1" type="text" id="date_search1" placeholder="dd-mm-yyyy" tabindex="2" onclick="showCalendarControl(this);" autofocus required />          
<input name="Submit" type="submit" value="Submit" />

            </form>
            
			
             <?php if ($a!=NULL) { ?>
                    <div class="n_ok"><p><?php echo $a ; ?></p></div>
                    <?php } ?>
				

            </div>
			
            
            <div class="full_w">
		    <div class="h_title">Add Sample out List</div>
            <div class="entry">
             
              </div>          
             <div id="preview1">
               </div>
				
				  <div class="element">
				    <div id="formbox1">
<form name="" id="form1" action="sample_out_save.php" method="post">
<INPUT type="button" value="Add Row" class="btn btn-success" onClick="addRow('gradientstyle')" />
<input type="button" value="Delete Row" class="btn btn-danger" onClick="deleteRow('gradientstyle')" />
    <table class="bottomBorder" id="gradientstyle" width="80%" border="1" cellspacing="0"  cellpadding="0">
      <tr>        
          <td width="4%" height="34"><input type="checkbox" name="chk"/></td>
          <td>
            <select name="buyer[]" autofocus required id="customer[]" class="rounded" style="font-size:11px">
          <option value="">--Select Buyer--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' order by concern_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select></td>
            <td><input name="style[]" class="rounded" placeholder="style no" list="characters1" type="text" autofocus required id="style[]" value="" size="20">
            
              <datalist id="characters1">
              				<?php
         					$SQL="select style from tb_track_info group by style order by color ASC";
                            $obj->sql($SQL);
                            while($row1 = mysql_fetch_array($obj->result))
                            { 
                            $dis1=$row1['style'];
                            echo '<option value="'.$dis1.'">';
                            }
                            ?>
             </datalist></td>
            <td><input name="color[]" class="rounded" list="characters2" placeholder="color" type="text" autofocus required id="color[]" value="" size="25">
            
              <datalist id="characters2">
              				<?php
         					$SQL="select color from tb_track_info group by color order by color ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['color'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist></td>
            <td><select name="concern_name[]" autofocus required id="concern_name[]" style="font-size:11px">
        <option value="<?php echo $user_name ; ?>" selected="selected"> <?php echo $user_name ; ?> </option>
        <?php
         $SQL="select user_name,rule from tb_admin where rule like '1' OR rule like '3' order by user_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['user_name'];
							$rule=$row['rule'];
                            echo '<option value="'.$dis.'~'.$rule.'">'.$dis.'</option>';
                            }
                            ?>
      </select>
      </td>
            <td><input name="amnt[]" type="text"  placeholder="Total" class="inp-form" id="amnt[]" value="" size="10" /></td>
            </tr>
      
  </table>            
  <button name="Submit" type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
                  </form>
                    </div>
                  <div class="entry"> </div>
              </div>
            </div>
            <div class="full_w">
				<div class="h_title">All sample OUT list</div>
             
		<!--		<h2>Lorem ipsum dolor sit ame</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
				
					<div class="sep"></div>
                    
                    <table width="97%" style="padding: 5px;" border="1" class="draggable sortable" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
						  <th scope="col">Sl</th>
						
							<th scope="col">Buyer</th>
							<th scope="col">Style No</th>
							<th scope="col">Status</th>
							<th scope="col">Color</th>
							<th scope="col">Ammount</th>
							<th scope="col">Concern name</th>
							<th scope="col">Date</th>
							<th scope="col">User ID</th>
						</tr>
					</thead>
						
					<tbody>                    
                <?php
                //PER PAGE COMPONENT
                $per_page=400;
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
									$sql = "select * from tb_sample_out a WHERE STR_TO_DATE( a.date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) order by a.date ASC";
				}
				else
				{
				$sql = "select * from tb_sample_out  ORDER BY sl DESC";
				}

$num_rows = mysql_num_rows(mysql_query($sql));
                $num_pages = ceil($num_rows / $per_page); 
                $sql .= " LIMIT $start, $per_page";
                $result = mysql_query($sql);
                $sl=1;
                while($row = mysql_fetch_array($result))
                {

$style_no=trim($row['style_no']) ;

	?>
                    
                    
						<tr>
						  <td class="align-center"><?php echo $sl ; ?></td>
							<td class="align-center"><?php echo $row['buyer'] ; ?></td>
							<td class="bottomBorder">
							<a href="../style_details.php?IDX=<?php echo trim($row['style_no']) ; ?>" target="_blank">
							<?php echo trim($row['style_no']) ; ?></a></td>
							
                            
                            <?php
							$get_style='' ;
                            $SQL="select distinct(style) from tb_track_info where style like '$style_no'";    //table name
	$results1 = $obj->sql($SQL);
	while($row1 = mysql_fetch_array($results1))
	{
	$get_style=$row1['style'];	
	}
	if($get_style!='')
	{
		echo '<td class="bottomBorder" bgcolor="#006600" style="color:#FFF">'.'Entry'.'</td>' ;
	}
	else
	{
	echo '<td class="bottomBorder" bgcolor="#FF0000" style="color:#FFF">'.'Not Entry'.'</td>' ;
	}
	
                            ?>
                            
                            
							<td class="bottomBorder"><?php echo $row['color'] ; ?></td>
							<td class="bottomBorder"><?php echo $row['amount'] ; ?></td>
							<td class="bottomBorder">
							
							<a href="JavaScript:newPopup('../employee_info.php?E_ID=<?php echo $row['concern_name'] ; ?>&rule=<?php echo $row['concern_name_rule'] ; ?>');" style="color:#036">
							
							<?php echo $row['concern_name'] ; ?></a>
							
							<?php echo $concern_name ; ?></td>
							<td class="bottomBorder"><?php echo $row['date'] ; ?></td>
							<td class="bottomBorder"><?php echo $row['id'] ; ?></td>
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
                    
                    
					<div class="sep">
                    
                    <table width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">Buyer</th>
    <th scope="col">Balance</th>
  </tr>
  
  
  <?php
  	$SQL1="SELECT COUNT(  `buyer` ) AS aa,  `buyer` 
FROM tb_sample_out a
WHERE STR_TO_DATE( a.date,  '%d-%m-%Y') 
BETWEEN STR_TO_DATE('$date1',  '%d-%m-%Y') 
AND STR_TO_DATE('$date2',  '%d-%m-%Y') 
GROUP BY  `buyer`,`style_no`,`color`  ";    //table name AND mm_fabricbooking_by_dpd_to_mm_date=''

//die($SQL1) ;

	
	$sl5=1 ;
	$results = $obj->sql($SQL1);
	while($row1 = mysql_fetch_array($results))
	{
   ?>
  
  <tr>
    <td><?php echo $sl5 ; ?></td>
    <td><?php echo $row1['buyer'] ; ?></td>
    <td><?php echo $row1['aa'] ; ?></td>
  </tr>
  <?php 
  
  $sl5++;
	} ?>
  
</table>
                    
                    
                    </div>		
				<a class="button add" href="sample_out.php">Add new Item</a> 
			  </div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>