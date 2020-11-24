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
		
	}
	
	

$style_get=$_GET['style'];

//include('variables.php');


if($_GET['ID'])
{
$id=$_GET['ID'];
$style_get=$_GET['style'];
$SQL="delete from tb_check_list  where si='$id'";
$obj->sql($SQL);	 
$a="Delete Successful";	
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
                                <h2>Create Check-list of <?php echo $style_get ?> :</h2>
                                <div class="divider">
                                
                                <?php echo $a ;  ?>
                                
                                </div>  
                            </div>  


							<div class="span12">
<table id="gradient-style" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead>
  <tr>
    <th width="5%"><strong>Sl</strong></th>
    <th><strong>Style    </strong>    </th>
    <th><strong>Color </strong>    </th>
    <th><strong>Fabric Type</strong></th>
    <th><strong>wash Type</strong>        </th>
    <th><strong>Print type</strong>        </th>
    <th><strong>Sample type</strong>      </th>  
    <th><strong>Product type</strong></th></tr>
    </thead>
  
 <?php
 $SQL="select * from tb_track_info where style ='$style_get' order by sl ASC";    //table name
 $sl=0;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$colorr[]=$row['color'];
		
 ?> 
  <tr>
    <td><?php echo $sl ; ?></td>
    <td><?php echo $row['style']; ?></td>
    <td><?php echo $row['color']; ?></td>
    <td><?php echo $row['fabric_type']; ?></td>
    <td><?php echo $row['wash_type']; ?></td>
    <td><?php echo $row['print_type']; ?></td>
    <td><?php echo $row['sd_sample_type_name']; ?></td>
    <td><?php echo $row['product_type']; ?></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
                            </div><br><br>


 <div class="span12"><br>
</div>
<br>


 							<section class="span12">
                              <div id="preview"></div>
                            </section>
                            
                          
                            
                           
                            <div id="formbox1">
                           
                            <div class="span10">
                            <form id="form1" action="checklist_create_save.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                  <tr valign="top">   
                                    <td width="20%"><h3 style="color:#030"> Fabric :</h3></td>
<td width="80%">

    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />



    <table class="bottomBorder" id="gradientstyle" width="100%" border="1" cellspacing="0"  cellpadding="0">
    <tr>
      
      <td width="4%"><input type="checkbox" name="chk"/></td>
      <td width="24%"><input name="namer[]" type="text" list="characters1" placeholder="Name" class="inp-form" id="namer[]" value="" size="25">
      
       <datalist id="characters1">
              				<?php
         					$SQL="select list_name from tb_check_list WHERE object like 'Fabric' group by list_name order by list_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['list_name'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>
      
      </td>
      <td width="24%"><input name="remark[]" type="text" placeholder="Remark" class="inp-form" id="namer[]" value="" size="25">
        <input type="hidden" name="type[]" value="Fabric" id="type[]"></td>
      <td width="24%"><select name="score[]" id="score[]">
        <option>select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select></td>
    </tr>
    </table>

</td>
                                 
                                  </tr>
                                  <tr valign="top">
                                    <td colspan="2">&nbsp;</td>
                                  </tr>
                                  <tr valign="top">
                                    <td><h3 style="color:#030">Trims :</h3></td>
                                    <td>    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle1')" />
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle1')" />



    <table class="bottomBorder" id="gradientstyle1" width="100%" border="1" cellspacing="0"  cellpadding="0">
    <tr>
      
      <td width="4%"><input type="checkbox" name="chk"/></td>
      <td width="24%"><input name="namer[]" type="text" list="characters2" placeholder="Name" class="inp-form" id="namer[]" value="" size="25">
      
      <datalist id="characters2">
              				<?php
         					$SQL="select list_name from tb_check_list WHERE object like 'Triems' group by list_name order by list_name  ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['list_name'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>
      
      </td>
      <td width="24%"><input name="remark[]" type="text" placeholder="Remark" class="inp-form" id="namer[]" value="" size="25">
        <input type="hidden" name="type[]" value="Triems" id="type[]"></td>
        <td width="24%"><select name="score[]2" id="score[]2">
          <option>select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select></td>
    </tr>
    </table></td>
                                  </tr>
                                  <tr valign="top">
                                    <td colspan="2">&nbsp;</td>
                                  </tr>
                                 <tr valign="top">
                                    <td><h3 style="color:#030">Pack list :</h3></td>
                                    <td>    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle2')" />
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle2')" />



    <table class="bottomBorder" id="gradientstyle2" width="100%" border="1" cellspacing="0"  cellpadding="0">
    <tr>
      
      <td width="4%"><input type="checkbox" name="chk"/></td>
      <td width="24%"><input name="namer[]" type="text" list="characters2" placeholder="Name" class="inp-form" id="namer[]" value="" size="25">
      
      <datalist id="characters2">
              				<?php
         					$SQL="select list_name from tb_check_list WHERE object like 'Pack' group by list_name order by list_name ASC";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['list_name'];
                            echo '<option value="'.$dis.'">';
                            }
                            ?>
             </datalist>
      
      </td>
      <td width="24%"><input name="remark[]" type="text" placeholder="Remark" class="inp-form" id="namer[]" value="" size="25">
        <input type="hidden" name="type[]" value="Pack" id="type[]"></td>
        <td width="24%"><select name="score[]3" id="score[]3">
          <option>score</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select></td>
    </tr>
    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;">   
                                    
                                    
                                    <?php for($i=0;$i<$sl;$i++) {  ?>
                                    
                                    <input name="color[]" type="checkbox" value="<?php echo $colorr[$i] ; ?>" checked><strong><?php echo $colorr[$i] ; ?></strong>  &nbsp;
                                    
                                    <?php } ?><br><br>


                                    
<input type="hidden" name="style" value="<?php echo $style_get ; ?>" id="hiddenField" />
    
                                    
                                    <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Add »">
                                    &nbsp;</td>
                                  </tr>
                </table>
                
                </form>            
                            </div>
                            </div>
                           
                      </div>
                            <div id="preview1"></div>
<br>

                            <div class="span12">
<br>
                          
                                <h2>Responsible Person :</h2>
                                <div class="divider"></div>  
                            </div> 
                            <div class="span12">
<table id="gradient-style" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <thead style="color:#000">
  
  <tr bgcolor="#FFFFCC" style="color:#000">
    <th>Sl</th>
    <th>Style </th>   
    <th>Color    </th>
    <th>Type    </th>
    <th>List Name</th>
    <th>Remark        </th>
    <th>Score</th>
    <th>Action</th>
    </tr>
    </thead>
  
 <?php
 $SQL="select * from tb_check_list where style ='$style_get' order by color ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td><?php echo $row['color'] ; ?></td>
    <td><?php echo $row['object'] ; ?></td>
    <td><?php echo $row['list_name'] ; ?></td>
    <td><?php echo $row['remark'] ; ?></td>
    <td><?php echo $row['score'] ; ?></td>
    <td><a href="checklils_create.php?ID=<?php echo $row['si'] ; ?>&style=<?php echo $style_get ; ?>"><strong style="color:#CC0000" title="Delete" onclick="return confirm('Are you sure you want to delete?')">X</strong></a></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
                            </div>
                          
                          
                            
                  </div>
                    </div>
                </div>
              <div class="span12"></div>

            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php //  require("re_footer_head.php"); ?>
</body>
</html>