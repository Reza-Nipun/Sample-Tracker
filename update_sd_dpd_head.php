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
	
	
$sl=$_GET['ID'];
$style_get=$_GET['ID1'];
$color=$_GET['ID2'];

include('variables.php');

	
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
                                <h2>Head of SD/DPD :</h2>
                                <div class="divider"></div>  
                            </div>  


							<div class="span12">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="5%"><strong>Sl</strong></th>
    <td width="15%"><strong>Style    </strong>    
    <td width="15%"><strong>Color </strong>    
    <td width="25%"><strong>Responsible for Delay</strong>
      </th>
    <td width="15%"><strong>Day</strong></tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$style_get' AND color='$color' AND sample_status_event  like 'Responsible person delay' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><?php echo $row['brand_style']; ?></td>
    <td><?php echo $row['color']; ?></td>
    <td><span style="font-size:12px"><?php echo $row['sample_status_objective']; ?></span>
	</td>
    <td><?php echo $row['update_date']; ?></td>
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
                            
                          
                            
                            <div id="formbox">
                            <?php if($sd_sample_reject_pass=='reject'){ ?>
                          <div class="span6">
                            <form id="form" action="update_sd_dpd_head2.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                  <tr valign="top">   
                                    <td width="40%"> Reasons of Sample Rejection (Major Points) :</td>
                                    <td width="60%">
<textarea name="sd_dpd_comments" cols="40" rows="3" autofocus required id="content"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;">   
                                    <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $style_get ; ?>" id="hiddenField" />
<input type="hidden" name="color" value="<?php echo $color ; ?>" id="hiddenField" />
    
                                    
                                    <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Update »">
                                    &nbsp;</td>
                                  </tr>
                </table>
                
                </form>
                                  
                            </div>
                            <?php  } ?>
                            
                            <div id="formbox1">
                            <?php if($sd_sample_reject_pass=='reject'){ ?>
                            <div class="span6">
                            <form id="form1" action="update_sd_dpd_head3.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                  <tr valign="top">   
                                    <td width="50%"> Responsible Person due to Rejection (Name):</td>
<td width="50%">

    <INPUT type="button" value="Add"  onClick="addRow('gradientstyle')" />
    <input type="button" value="Delete" onClick="deleteRow('gradientstyle')" />


    <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0"  cellpadding="0">
                       
                       </table>
    <table class="bottomBorder" id="gradientstyle" width="100%" border="1" cellspacing="0"  cellpadding="0">
    <tr>
          
            <td width="4%"><input type="checkbox" name="chk"/></td>
            <td width="24%"><input name="namer[]" type="text" autofocus required class="inp-form" id="namer[]" value="" size="35"></td>
            </tr>
    </table>

</td>
                                 
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="center" style="padding:5px;">   
                                    <input type="hidden" name="update_sl" value="<?php echo $sl ; ?>" id="hiddenField" />
<input type="hidden" name="update_brand_style" value="<?php echo $style_get ; ?>" id="hiddenField" />
<input type="hidden" name="color" value="<?php echo $color ; ?>" id="hiddenField" />
    
                                    
                                    <input name="Submit" type="submit" class="btn btn-success" id="submit" value="Add »">
                                    &nbsp;</td>
                                  </tr>
                </table>
                
                </form>            
                            </div>
                            </div>
                            <?php } ?>
                            </div>
                            
                            <div class="span12"><br>
<br>

                            <h2>Reasons of Sample Rejection</h2><br>

                            
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="10%"><strong>Sl</strong></th>
    <td width="45%"><strong>Message</strong></th>
    <td width="45%"><strong>Reasons of Sample Rejection</strong></th>
  </tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$style_get' AND color='$color' AND sample_status_event  like 'SD DPD HEAD COMMENT' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><span style="font-size:13px"><?php echo $row['update_date']; ?></span><br><?php echo $row['user']; ?>
</td>
    <td><?php echo $row['sample_status_objective']; ?></td>
  </tr>
<?php
$sl++;
	}
	?>

</table>
                            </div>
                        
                            <div id="preview1"></div>
<br>

                            <div class="span12">
<br>
                          
                                <h2>Responsible Person :</h2>
                                <div class="divider"></div>  
                            </div> 
                            <div class="span12">
<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="10%"><strong>Sl</strong></th>
    <td width="45%"><strong>Message</strong></th>
    <td width="45%"><strong>Responsible Person</strong></th>
  </tr>
  
 <?php
 $SQL="select * from tb_sample_status where brand_style ='$style_get' AND color='$color' AND sample_status_event  like 'Responsible Person Rejection' order by sl ASC";    //table name
 $sl=1;
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
 ?> 
  <tr>
    <td><?php echo $sl ; ?></th>
    <td><span style="font-size:12px"><?php echo $row['update_date']; ?></span><br><?php echo $row['user']; ?>
</td>
    <td><?php echo $row['sample_status_objective']; ?></td>
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
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php //  require("re_footer_head.php"); ?>
</body>
</html>