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
		    <div class="h_title">Add new User</div>
            <div class="entry">
              <div id="preview">
              
              
               </div>
              </div>
             <div id="formbox">
             
             
				<form name="" id="form" action="user_new_save.php" method="post">
					<div class="element">
						<label for="password">Full Name<span class="red">(required)</span> </label>
						 
					      <input type="text" id="name" name="name" required autofocus />
						
					  
                      
					</div>
					<div class="element">
						<label for="rule">User Name <span class="red">(required)</span></label>
					  <span class="red">
					  <input type="text" id="username" name="username" required autofocus />
				    </span></div>
				  <div class="element">
						<label for="comments">Password  <span class="red">(required)</span></label> 
					   <input name="password" type="text" id="password" value="123456" required autofocus />
					</div>
                    <div class="element">
						<label for="rule">Category <span class="red">(required)</span></label>
                      <select name="rule" class="err" id="rule" required>
                          <option value="">- select Rule -</option>
                          <option value="1">SD</option>
                          <option value="2">MM</option>
                          <option value="3">DPD</option>
                          <option value="4">Sample</option>
                          <option value="6">SD/DPD/MM Head</option>
                          <option value="5">Super Admin</option>
                          <option value="7">Check list</option>
                          <option value="10">Knitting</option>
                          <option value="8">Dying</option>
                          <option value="9">Store</option>
                          <option value="11">GDL</option>
                          <option value="12">Embroidery</option>
                          
                      </select>
                  </div>
				  <div class="entry">
				    <button type="submit" class="add">Save</button> <button type="reset" class="cancel">Reset</button>
				  </div>
				</form>
              </div>
			
            
            </div>
			
			<div class="full_w" id="sidebar">
				<div class="h_title">User Information = SD</div>
				<!--<h2>Lorem ipsum dolor sit ame</h2>-->
				<!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
		<!--		<div class="entry">
					<div class="sep"></div>
				</div>
                -->

	<!--	<div class="entry">
		  <div class="sep"></div>		
				
			  </div>-->
              
              <h2>Rule = 1</h2>

                
                  <div class="sep"></div>
</div>
            
          <div class="full_w" id="sidebar">
				<div class="h_title">User Information = MM</div>
				<!--<h2>Lorem ipsum dolor sit ame</h2>-->
				<!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
		<!--		<div class="entry">
					<div class="sep"></div>
				</div>
                -->

	<!--	<div class="entry">
		  <div class="sep"></div>		
				
			  </div>-->
              
              <h2>Rule = 2</h2>
				
                
            <div class="sep"></div>
          </div>
          
          
          <div class="full_w" id="sidebar">
				<div class="h_title">User Information = DPD</div>
				<!--<h2>Lorem ipsum dolor sit ame</h2>-->
				<!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
		<!--		<div class="entry">
					<div class="sep"></div>
				</div>
                -->

	<!--	<div class="entry">
		  <div class="sep"></div>		
				
			  </div>-->
              
              <h2>Rule = 3</h2>
				
                
            <div class="sep"></div>
          </div>
          
          <div class="full_w" id="sidebar">
				<div class="h_title">User Information = Sample</div>
				<!--<h2>Lorem ipsum dolor sit ame</h2>-->
				<!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
		<!--		<div class="entry">
					<div class="sep"></div>
				</div>
                -->

	<!--	<div class="entry">
		  <div class="sep"></div>		
				
			  </div>-->
              
              <h2>Rule = 4</h2>
				
                
            <div class="sep"></div>
          </div>
                   
          <div class="full_w" id="sidebar">
				<div class="h_title">User Info = SD/DPD Head</div>
				<!--<h2>Lorem ipsum dolor sit ame</h2>-->
				<!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>-->
				
		<!--		<div class="entry">
					<div class="sep"></div>
				</div>
                -->

	<!--	<div class="entry">
		  <div class="sep"></div>		
				
			  </div>-->
              
              <h2>Rule = 6</h2>
				
                
            <div class="sep"></div>
          </div>              
          
		</div>
		<div class="clear"></div>
        
       

	
</div>
</div>
<?php require("re_footer.php"); ?>

</body></html>