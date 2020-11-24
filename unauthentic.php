<?php
	require_once('comon.php');
	session_start(); 
	$uid=$_SESSION['userid'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	date_default_timezone_set("Asia/Dhaka");
    $sys_date= date("d-m-Y");
	
	$SQL="select * from tb_admin where sl='$uid'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$name=$row['name'];
		$user_rule=$row['rule'];
		$user_name=$row['user_name'];
		
	}
	

	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>

<style>
h6 
{
/*text-decoration:blink;
color:#F00;*/
}
</style>

        <!--<link href="css1/chosen/charisma-app.css" rel="stylesheet">
        <link href='css1/chosen/chosen.min.css' rel='stylesheet'>-->

       <script type="text/javascript" src="admin/js/jquery.js"></script> 
       <script type="text/javascript" src="admin/js/jquery.form.js"></script> 
       
	   <!--<script type="text/javascript" src="images/jquery-1.7.2.min.js"></script>-->

</head>

<body>
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                  <?php //require("re_menu.php"); ?>
                  
						<style>
                            a:link{ text-decoration: none;
                                color: gray;
                            }
                            a:visited{ text-decoration: none;
                                color: gray;
                            }
                            a:hover{ text-decoration: none;
                                color: black;
                                font-weight: bolder;
                                font-size:12px;
                            }
                        </style>
                        
                        <div class="container">
                            <a href="index.php" class="brand">VTG</a>
                            <nav id="mainMenu" class="clearfix">
                                <ul>
                                    <li style="margin-right:20px"><img name="" src="images/user-icon.jpg" width="52" height="32" alt="" />(<?php echo $user_name ; ?>)</li>
                                    <!--<li><a href="home.php" class="firstLevel">Home</a></li>-->
                                    <li><a href="logout.php" class="firstLevel last">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
						<!--End of Logout Menu Bar-->
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
                
              <!--  for SD only-->
                
                   
                <div class="slice clearfix">
                    <div class="container" style="padding-bottom:270px"> 
                        <div class="row"> 
                        
                      
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>Hello! 
							  
							  <span style="color:#5A8303"><?php echo $name; ?></span>
                              
                              </h2>
                                <div class="divider"><span>
                                 </span></div>  
                            </div>  
                           
                            
          
                            <section class="span12">
                            
                            <h3 style="color:#F00">You are using an Invalid account!!! Please contact at Ext: 205 for more details.</h3>
                            
 							</section>
                            
                            
                        </div>
                    </div>
                </div>
                
             <!--   end of SD part-->
				
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php 
			
			session_start(); //Start the current session
			session_destroy(); //Destroy it! So we are logged out now

			// require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
    
<!--
<script src="js/chosen/jquery.cookie.js"></script>
<script src="js/chosen/chosen.jquery.min.js"></script>

<script src="js/chosen/jquery.history.js"></script>
<script src="js/chosen/charisma.js"></script>
-->
      

         <?php require("re_footer_head.php"); ?>
</body></html>