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
             
             
<form name="" id="form" action="dpdpuma_style_update_save.php" method="post" enctype="multipart/form-data">

  <?php 
  
  $qty = $_POST['qty'];
  
  // die($entry_date);

	if (isset($_FILES['file'])) {
	
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"exl/" . $_FILES["file"]["name"]);
			
			$root = $_SERVER["DOCUMENT_ROOT"];
			
			//$n=$root."/csv/" . $_FILES["file"]["name"];
			
			$n="exl/" . $_FILES["file"]["name"];
			
			// echo $n ;

		require_once 'Excel/reader.php';

			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP1251');
			$data->read("$n");

		error_reporting(E_ALL ^ E_NOTICE);
		$cnt = 1;

		for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) 
		{
				// $srl = $data->sheets[0]['cells'][$i][1];
				$a[$cnt]=$data->sheets[0]['cells'][$i][1];  // Team
				//$b[$cnt]=$data->sheets[0]['cells'][$i][2]; // Buyer
				
				$cnt ++;
				//echo $a[$cnt].$cnt;
		}
	}
		
?> 


   <table width="60%" class="bottomBorder" border="1" cellspacing="0" cellpadding="0">
  	<tr>
      <th scope="row">#</th>
      <th scope="row">Serial</th>
      <th scope="row">Req Qty</th>
    </tr>
  <?php for($j=1;$j<$cnt;$j++) { ?>
  
  <tr style="color:#000">
  	<td><?php echo $j; ?></td>
  	<td><input name="serial[]" type="text" value="<?php echo $a[$j]; ?>" class="inp-form" /></td>
    <td><input name="re_qty[]" type="text" value="<?php echo $qty; ?>" class="inp-form" /></td>
  </tr>
  
  <?php } ?>
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