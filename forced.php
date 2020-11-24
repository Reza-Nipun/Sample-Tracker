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
		$email=$row['email'];
		$ext=$row['ext'];
		$full_name=$row['full_name'];
		$mobile=$row['mobile'];
		$password=$row['password'];
		
		
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

        <script type="text/javascript">
            $('document').ready(function()
			{		
	$('#form').ajaxForm( {
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    });
	
	
		$('#form1').ajaxForm( {
        target: '#preview1', 
        success: function() { 
        $('#formbox1').slideUp('fast'); 
        } 
    }); 
						
            });
        </script> 
        

    

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
                                <h2>Update Personal Information :</h2>
                                <div class="divider"></div>  
                            </div>  


							
						 

						  <section class="span12">
                              <div id="preview"></div>
                            </section>
                            
                          
                            
                            <div id="formbox">
                           
                          <div class="span6">
                            <form id="form" action="forced1.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                  <tr valign="top">   
                                    <td width="40%"> Full Name</td>
                                    <td width="60%"><input type="text" name="name" value="<?php echo $full_name ; ?>" required autofocus id="name"></td>
                                  </tr>
                                  <tr valign="top">
                                    <td>Employee ID</td>
                                    <td><input type="text" name="id" value="<?php echo $employee_id ; ?>" required autofocus id="id"></td>
                                  </tr>
                                  <tr valign="top">
                                    <td>Ext No</td>
                                    <td><input type="text" name="ext" value="<?php echo $ext ; ?>" required autofocus id="ext"></td>
                                  </tr>
                                  <tr valign="top">
                                    <td>Mobile No</td>
                                    <td><input type="text" name="mobile" value="<?php echo $mobile ; ?>" required autofocus id="mobile"></td>
                                  </tr>
                                  <tr valign="top">
                                    <td>Email Address </td>
                                    <td><input type="email" name="email" value="<?php echo $email ; ?>" required autofocus id="email"></td>
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
                            
                            </div>
                            
                            <div class="span12"><br>
</div><br>

                            <div class="span12">
                                <h2>Update Password :</h2>
                                <div class="divider"></div>  
                            </div> 
                            <section class="span12">
                              <div id="preview1"></div>
                            </section>
                            <div id="formbox1">
                           
                          <div class="span8">
                          <script type="text/javascript">
    function confirmPass1() {
        var old_pass = document.getElementById("old_pass").value
        var old_pass1 = document.getElementById("old_pass1").value
		
		if(old_pass != old_pass1) {
            alert('Old password not Matched!');
        }
	
    }


    function confirmPass() {
    
		var pass = document.getElementById("pass").value
        var confPass = document.getElementById("c_pass").value
        
		
		
		if(pass != confPass) {
            alert('Wrong confirm password !');
        }
    }
</script>
                            <form id="form1" action="password_update.php" method="post">

<table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
                                  <tr valign="top">   
                                    <td width="40%"> Old Password</td>
                                    <td width="60%"><input type="password" name="old_pass" onblur="confirmPass1()" id="old_pass">
<input type="hidden" name="old_pass1" value="<?php echo $password ; ?>" id="old_pass1">
                                    </td>
                                  </tr>
                                  <tr valign="top">
                                    <td>New Password</td>
                                    <td><input type="password" id="pass" class="text" name="your_pass" value=""/></td>
                                  </tr>
                                  <tr valign="top">
                                    <td>Confirm Password</td>
   <td> <input type="password" id="c_pass" class="text" name="your_c_pass" value="" onblur="confirmPass()"/></td>
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
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php //  require("re_footer_head.php"); ?>
</body>
</html>