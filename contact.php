<!DOCTYPE html>
<!-- saved from url=(0068)http://ohmy-website-template.little-neko.com/template-contact-2.html -->
<head><?php require("re_head.php"); ?>
<link type="text/css" rel="stylesheet" href="images/layout1.css">
<link type="text/css" rel="stylesheet" href="images/bootstrap.min1.css">
 </head>
    <body>
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
            <section id="content">

               <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>



                <div class="container clearfix slideContactpage">
                    <div class="row">
                        <div id="contactinfoWrapperPage" class="clearfix">
                            <div class="span3">
                                <p>Curabitur turpis orci, gravida non ornare id, venenatis nec enim. Praesent posuere condimentum leo eget volutpat. Maecenas in ligula in lacus aliquam ultricies scelerisque vitae nisl. Pellentesque quam dui, cursus in mollis sed, pretium quis dui. Proin ac nibh et leo malesuada congue.</p>
                            </div>

                            <!-- contact form -->
                            <div class="span6">

                                <form method="post" action="http://ohmy-website-template.little-neko.com/js-plugin/ajax-contact-extend/classes/contact.php" id="contactform">

                                    <label for="name"></label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="">

                                    <label for="email"></label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="">

                                    <label for="phone"></label>
                                    <input name="phone" type="text" id="phone" size="30" value="" placeholder="Phone">

                                    <label for="comments"></label>
                                    <textarea name="comments" id="comments" cols="3" rows="5" placeholder="Comment" class=""></textarea>

                                    <fieldset class="clearfix securityCheck">
                                    </fieldset>
                                    <br>
                                    <button name="submit" type="submit" class="btn" id="submit"> Submit</button>

                                </form>

                                <div id="message"></div>
                            </div>
                            <!-- contact form -->

                            <div class="span3">
                                <address>
                                    Address:<br>
                                    Himalaya Company<br>
                                    77 Mass. Ave., E14/E15<br>
                                    Cambridge, MA 02139-4307 USA <br>
                                    <br>
                                    phone:<br>
                                    615.987.1234<br>
                                </address>
                                <h2>MAP</h2>
                                <a href="" title="locate us" id="mapTriggerLoader"><img src="images/map-trigger.png" alt="locate us"></a> </div>
                        </div>
                        <div class="span12" id="mapSlideWrapper">
                            <div id="mapWrapper"></div>
                            <a href="" title="" id="mapReturn"><i class="icon iconReturn"></i> back</a> 
                        </div>
                    </div>
                </div>

            </section>
            <!-- page content -->




            <!-- footer -->
                       <?php require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?> 
            
            <!-- footer -->
        </div>
         <?php require("re_footer_head.php"); ?>
</body></html>