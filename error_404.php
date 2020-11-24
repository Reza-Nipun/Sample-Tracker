<?php
$id=$_GET['ID'];

if($id==1)
{
	$a= "<font color='black'>1 Unknown Error.</font>";
}

if($id==2)
{
	$a= "<font color='black'>2 Unknown Error.</font>";
}


if($id==3)
{
	$a= "<font color='black'>3 Unknown Error.</font>";
}




?>



<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>
</head>
<body>
        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">                   
                    <?php // require("re_menu.php"); ?>        
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
                          
                            </div>  

                            <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>SORRY !!!</h2>
                                <div class="divider"></div>  
                            </div>
                            <section class="span12"><p><?php echo $a ; ?></p></section>
                            
                        </div>
                    </div>
                </div>
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php require("re_footer_head.php"); ?>
</body></html>