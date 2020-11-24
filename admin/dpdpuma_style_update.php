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
		    <div class="h_title">Updaet Required Qty of PUMA</div>
            <div class="entry">
              <div id="preview">
              
              
               </div>
              </div>
             <div id="formbox">
             
             
<form name=""  action="dpdpuma_style_update_view.php" method="post" enctype="multipart/form-data">

   <table width="60%" class="bottomBorder" border="1" cellspacing="0" cellpadding="0">
  <tr style="color:#000">
  <td scope="row">Req Qty</td>
  	<td><input name="qty" type="text" class="inp-form" size="15" /></td>
    <td scope="row">Select Excel File</td>
    <td><input name="file" type="file" id="file" /></td>
  </tr>
</table><br />
<button name="Submit" type="submit" class="add" tabindex="12">Submit</button>
<button type="reset" tabindex="14" class="cancel">Reset</button>
                       </form>                
             
              </div>
			
            
            </div>
		</div>
		<div class="clear"></div>
        
       

	
</div>
</div>

<?php require("re_footer.php"); ?>

</body>
</html>