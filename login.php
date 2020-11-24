<?php
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>
<?php
date_default_timezone_set("Asia/Dhaka");
        $sys_date = date("d-m-Y");
		
		
		$newdate = strtotime ( '+' . 1 .' day' , strtotime ( $sys_date  ) ) ;
		$newdate = date ( 'd-m-Y' , $newdate );
		
		
		$newdate1 = strtotime ( '+' . 2 .' day' , strtotime ( $sys_date  ) ) ;
		$newdate1 = date ( 'd-m-Y' , $newdate1 );

?>



</head>
<body>



        <!-- Primary Page Layout    
        ================================================== -->
        <!-- header -->
        <header id="mainHeader" class="clearfix">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">       
                
                <div class="container">

                        <a href="#index.html" class="brand"><img src="images/main-logo.png" alt="Ohmy website template"></a>

				</div>
                            
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
                          <section class="span6">
                            
                          
                            
                            <style type="text/css">
table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;
font-size:13px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}
table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:1px; }
</style> 


<form action="check_login.php" method="post">
<?php
EOD;
$msg = $_GET['msg'];  //GET the message ?URL=<?php echo $url ; 
if($msg!='') echo $msg; //If message is set echo it
//echo $login_form;
?>
   
        
       <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
    <th colspan="2" style="color:#000" scope="col"><h2>Login Information</h2></th>
    </tr>
  <tr>
    <th scope="col" style="color:#000">Username</th>
    <th scope="col" align="center"><input name="username" type="text" autofocus required id="username" tabindex="1" />
  
    
    </th>
    </tr>
  <tr>
    <th scope="row" style="color:#000">Password</th>
    <td align="center"><input type="password" tabindex="2" name="password" id="password" /></td>
  </tr>
  
    <tr>
    <th scope="row" style="color:#000">User Type</th>
    <td align="center"><select name="rule" class="err" tabindex="3" id="rule" required>
                          <option value="">- Select  -</option>
                          <option value="1">SD</option>
                          <option value="2">MM</option>
                          <option value="3">DPD</option>
                          <option value="4">Sample</option>
                          <option value="7">Check List</option>
                          <option value="6">SD/DPD/MM Head</option>
                          <option value="13">Fabric Head</option>
                          <option value="8">Dying</option>
                          <option value="9">Store</option>
                           <option value="10">Knitting</option>
                           <option value="11">GDL</option>
                           <option value="12">Embroidery</option>
                       <!--   <option value="5">Super Admin</option>-->
                      </select></td>
  </tr>

  <tr>
    <th colspan="2" scope="row">
    <input name="" type="submit" tabindex="4" class="btn btn-success" value="Submit">
     <input name="" type="reset" tabindex="5" class="btn btn-danger" value="Reset">
    </th>
  </tr> 
</table><br>
<br>

<h2 align="center"><a href="report.php"><strong>Dashboard</strong></a></h2>


<h2 align="center"><a href="report_gdl.php"><strong>Dashboard GDL</strong></a></h2>
<h2 align="center"><a href="report_emb.php"><strong>Dashboard Embroidery</strong></a></h2><br>

 <section class="span6">
 <table width="95%" border="1" align="left" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr>
   <th colspan="3" scope="col" style=" font:'Times New Roman', Times, serif; font-weight:bold; color:#000; font-size:20px">Upcoming Sample Delivery date</th>
  </tr>
  <tr>
    <th scope="col" bgcolor="#FB8C8F" style="color:#000"><?php echo $sys_date ;  ?></th>
    <th scope="col" bgcolor="#FFCC99" style="color:#000"><?php echo $newdate ; ?></th>
    <th scope="col" bgcolor="#FFFFCC" style="color:#000"><?php echo $newdate1 ; ?></th>
  </tr>
  <tr>
    <th scope="row" bgcolor="#FB8C8F"  style="color:#000">
    <a href="upcoming_delevary_details.php?DATE=<?php echo $sys_date ;  ?>" target="_blank">
    <?php  $SQL="select count(*) as aa from tb_track_info where sd_agreed_sample_delivery_date='$sys_date'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		echo $row['aa'];
		
	}
	?>
    </a>
    </th>
    <th style="color:#000" bgcolor="#FFCC99">
    <a href="upcoming_delevary_details.php?DATE=<?php echo $newdate ;  ?>" target="_blank">
	<?php  $SQL="select count(*) as ab from tb_track_info where sd_agreed_sample_delivery_date='$newdate'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		echo $row['ab'];
		
	}
	
	?>
    </a>
    </th>
    <th style="color:#000"  bgcolor="#FFFFCC">
	<a href="upcoming_delevary_details.php?DATE=<?php echo $newdate1 ;  ?>" target="_blank">
	<?php  $SQL="select count(*) as ac from tb_track_info where sd_agreed_sample_delivery_date='$newdate1'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		echo $row['ac'];
		
	}
	?>
    </a>
    </th>
  </tr>
</table>

 
 </section>

<!-- <a href="signup.php" tabindex="5"> Sign Up</a>&nbsp;
 <strong>|</strong> <a href="forget.php" tabindex="5">Forgot Your Password?</a>-->
        
       <br/>    
</form>

                            </section>
                            
                            <section class="span6">
                            <img src="images/group-clients.jpg"></section>
                            <div class="span12"></div>
                        </div>
                    </div><br>
<br>
<br>
<br>
<br>

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