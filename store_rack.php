<?php

	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		$employee_id=$row['employee_id'];
		
	}
	
	
	
	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>

<?php require("re_head.php"); ?>
<?php // require("editor.php"); ?>
<script type="text/javascript" language="javascript">
  // javascript:window.history.forward(1);
</script>
       <script type="text/javascript" src="images/jquery.js"></script> 
       <script type="text/javascript" src="images/jquery.form.js"></script> 
       <script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>


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
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=250,width=550,left=360,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
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
        

    

</head>

<body >
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">                   
                    <?php require("re_menu.php"); ?>        
                </div>
            </div>
        </header>
        <!-- header --> 
        
        
        
        <!-- global wrapper -->
        <div id="globalWrapper">
            <!-- page content -->
            <section id="content" class="columnPage">
                <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>

             
                <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                            <div class="span12">
                                <h2>Store Rack</h2>
                                 <div class="divider"><span>
                                 </span></div>  
                            </div>  


							
						 

						  <section class="span12">
                              <div id="preview">
                              
                                </div>
                                </section>
                              
                              <div  class="span12">
                              
                      
				    <div id="formbox">
<form name="" id="form" action="sample_out_save.php" method="post">
<INPUT type="button" value="Add Row"  onClick="addRow('gradientstyle')" />
<input type="button" value="Delete Row" onClick="deleteRow('gradientstyle')" /><br>

    <table class="bottomBorder" id="gradientstyle" width="100%" border="1" cellspacing="0"  cellpadding="0">
      <tr>        
          <td width="4%"><input type="checkbox" name="chk"/></td>
          <td>
            <select name="buyer[]" autofocus required id="customer[]" class="rounded" style="font-size:11px">
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
        </select></td>
            <td><input name="style[]" class="rounded" placeholder="style no" list="characters1" type="text" autofocus required id="style[]" value="" size="20">
            
              <datalist id="characters1">
                <?php
      
	
	   $SQL2="select style from tb_track_info group by style order by style ASC";
	   
	   
                            $obj->sql($SQL2);
                            while($row2 = mysql_fetch_array($obj->result))
                            { 
                            $dis2=$row2['style'];
                            echo '<option value="'.$dis2.'">';
                            }
                            ?>
              </datalist></td>
            <td><input name="color[]" class="rounded" list="characters2" placeholder="color" type="text" autofocus required id="color[]" value="" size="25">
              
              <!--<datalist id="characters2">
                <?php

				  /*$SQL3="select fab_color from tb_fabric_booking group by fab_color order by fab_color ASC";

				  $obj->sql($SQL3);
				  while($row3 = mysql_fetch_array($obj->result))
				  { 
				  $dis3=$row3['fab_color'];
				  echo '<option value="'.$dis3.'">';
				  }*/
                ?>
              </datalist>--></td>
            <td><input name="fabrication[]" class="rounded" list="characters3" placeholder="fabrication" type="text" autofocus required id="fabrication[]" value="">
              
              <datalist id="characters3">
                <?php

//$SQL4="select fabrication from tb_fabric_booking group by fabrication order by fabrication ASC";
$SQL4="select concern_name from tb_concern WHERE concern_type = 'f_fabrication' group by concern_name order by concern_name ASC";
                            $obj->sql($SQL4);
                            while($row4 = mysql_fetch_array($obj->result))
                            { 
                            $dis4=$row4['concern_name'];
                            echo '<option value="'.$dis4.'">';
                            }
                            ?>
              </datalist></td>
            <td>
            <input name="composition[]" class="rounded" list="characters4" placeholder="composition" type="text" autofocus required id="composition[]" value="">
              
              <datalist id="characters4">
                <?php


$SQL5="select concern_name from tb_concern WHERE concern_type = 'f_composition' group by concern_name order by concern_name ASC";

//$SQL5="select composition from tb_fabric_booking group by composition order by composition ASC";
 
                            $obj->sql($SQL5);
                            while($row5 = mysql_fetch_array($obj->result))
                            { 
                            $dis5=$row5['concern_name'];
                            echo '<option value="'.$dis5.'">';
                            }
                            ?>
              </datalist>
            </td>
            <td>
               <input name="gsm[]" class="rounded" list="characters5" placeholder="gsm" type="text" autofocus required id="gsm[]" value="">
              
              <!--<datalist id="characters5">
                <?php

				  /*$SQL6="select gsm from tb_fabric_booking group by gsm order by gsm ASC";

				  $obj->sql($SQL6);
				  while($row6 = mysql_fetch_array($obj->result))
				  { 
				  $dis6=$row6['gsm'];
				  echo '<option value="'.$dis6.'">';
				  }*/
                ?>
              </datalist>-->
            </td>
            <td><input name="amnt[]" type="text" placeholder="Qnty" id="amnt[]" value="" size="5" /></td>
            <td><input name="amnt[]" type="number" placeholder="Total" class="inp-form" id="amnt[]" value="" size="10" /></td>
            </tr>
      
  </table>
    <br>
<input name="Submit" type="submit" class="btn btn-success" id="submit" value="Save »">
  <button type="reset" class="btn btn-danger">Reset</button>
                  </form>
                    </div>
                  <div class="entry"> </div>
            
                              
                            
                            </div>
                            
                          
                            
                            <div id="formbox">
                           
                          <div class="span12">
                           
                                  
                            </div>
                            
                            </div>
                            
                            <div class="span12">


  <h2>Sample Out Information</h2>
                                 <div class="divider"><span>
                                 </span></div>  

                           <table id="gradient-style" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
						<tr>
						  <th scope="col">Sl</th>
						
							<th scope="col">Buyer</th>
							<th scope="col">Style No</th>
						
							<th scope="col">Color</th>
							<th scope="col">Ammount</th>
							<th scope="col">Concern name</th>
							<th scope="col">Date</th>
					
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
				$sql = "select * from tb_sample_out a WHERE STR_TO_DATE( a.date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) AND id='$uid' order by a.date ASC";
				}
				else
				{
				$sql = "select * from tb_sample_out WHERE id='$uid'  ORDER BY sl DESC";
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
							<td>
							<a href="style_details.php?IDX=<?php echo trim($row['style_no']) ; ?>" style="color:#000" target="_blank">
							<?php echo trim($row['style_no']) ; ?></a></td>
							
                            
                        
                            
							<td class="bottomBorder"><?php echo $row['color'] ; ?></td>
							<td class="bottomBorder"><?php echo $row['amount'] ; ?></td>
							<td class="bottomBorder">
							
							<a href="JavaScript:newPopup('employee_info.php?E_ID=<?php echo $row['concern_name'] ; ?>&rule=<?php echo $row['concern_name_rule'] ; ?>');" style="color:#036">
							
							<?php echo $row['concern_name'] ; ?></a>
							
							<?php echo $concern_name ; ?></td>
							<td class="bottomBorder"><?php echo $row['date'] ; ?></td>
					
						</tr>
     <?php
		$sl++;
	}
	?>
	
							
			
				  </tbody>
				</table>
  
  </div>




                        
                            
                            
<br>
                      </div>
                    </div>
                </div>
              <div class="span12"></div>
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
                     
            <!-- footer --><br>
<br>
<br>
<br>
<br>
<br>
<br>

        </div>
        
        <?php require("re_footer.php"); ?>  
         <?php //  require("re_footer_head.php"); ?>
</body>
</html>