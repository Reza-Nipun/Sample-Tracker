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

	$sl=$_GET['ID'];
	$SQL="select * from tb_concern WHERE sl='$sl'";
	$obj->sql($SQL);
	
	while($row = mysql_fetch_array($obj->result))
	{ 
             
				   $c_name=$row['concern_name'];
				   $c_type=$row['concern_type'];
				   
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
		    <div class="h_title">Update Item Info</div>
            <div class="entry">
              <div id="preview"> </div></div>
             <div id="formbox">
             
             
				<form name="" id="form" action="tracker_concern_update1.php" method="post">
                
                	<div class="element">
						<label for="comments"> Name <span class="red">(required)</span></label> 
					   <input type="text" id="name" name="c_name" value="<?php echo $c_name; ?>" required autofocus />
					</div>
                     
					<div class="element">
					<label for="category">Category<span class="red">(required)</span></label>
					  <select name="c_type" class="err" required autofocus >
						<option value="<?php echo $c_type; ?>" selected="selected"><?php echo $c_type; ?></option>
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
                            <option value="Sample Co-ordinator">Sample Co-ordinator</option>
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
<input name="sl" type="hidden" value="<?php echo $sl ; ?>" />
				  <div class="entry">
				    <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
				  </div>
				</form>
              </div>
			
            
            </div>
            
            
		</div>
		<div class="clear">
        <a class="button add" href="tracker_concern_add.php">Add new Item</a>  <a class="button add" href="tracker_concern_show.php">Show All</a> 
        
        </div>
	</div>

	
</div>

<?php require("re_footer.php"); ?>

</body></html>