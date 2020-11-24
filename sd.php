<?php

	require_once('comon.php');
	session_start(); 
	$un=$_SESSION['username_traker'];
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	$SQL="select * from tb_admin where user_name='$un'";    //table name
	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
		$user_name=$row['user_name'];
		$rule=$row['rule'];
		
	}
	
//	
//	if (isset($_POST['submit']))
// {
//		  $customer=mysql_real_escape_string($_POST['customer']);		  
//		  $brand_style=mysql_real_escape_string($_POST['brand_style']);	
//		  $sample_type=mysql_real_escape_string($_POST['sample_type']);
//		  $sample_req_recieve=mysql_real_escape_string($_POST['sample_req_recieve']);
//		  $sd_concern=mysql_real_escape_string($_POST['sd_concern']);
//		  $mm_concern=mysql_real_escape_string($_POST['mm_concern']);
//		  $dpd_concern=mysql_real_escape_string($_POST['dpd_concern']);
//		  $fabric_concern=mysql_real_escape_string($_POST['fabric_concern']);
//		  $tech_recv_forward=mysql_real_escape_string($_POST['tech_recv_forward']);
// }
	
	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>
<script type="text/javascript" language="javascript">
   javascript:window.history.forward(1);
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
                                <h2>SD :</h2>
                                <div class="divider"><span></span></div>  
                            </div>  
                            <section class="span6">
                            <?php include("sd1.php") ; ?>
                            
                          <p> </p></section>
                            
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>Sample Information</h2>
                                <div class="divider"><span></span></div>  
                            </div>
                            <section class="span12">
                            
                              <table class="bottomBorder" id="gradient-style" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" style="font-weight:bold">
    <td width="8%">Serial</td>
    <td width="12%">Customer</td>
    <td width="16%">Brand/Style</td>
    <td width="12%">Sample Type </td>
    <td width="10%">Sample Request Rcv Dare</td>  
    <td width="10%">Agreed Sample Delivery</td> 
    <td width="10%">Actual Sample Submission</td>   
    <td width="10%">Sample Reject/Pass</td>
    <td width="10%">Action</td>
    </tr>                        
    
    
     <?php


                //PER PAGE COMPONENT
                $per_page=100;
               // PAGE NO.
                if(!isset($_GET['page']))
                {
                $page=1;
                }else
                {
                $page = $_GET['page'];
                }
                if($page<=1)
                $start=0;
                else
                $start = $page * $per_page - $per_page;
				
				
//
//$num_rows = mysql_num_rows(mysql_query($sql));
//                $num_pages = ceil($num_rows / $per_page); 
//                $sql .= " LIMIT $start, $per_page";
//                $result = mysql_query($sql);
//                $sl=1;
//                while($row = mysql_fetch_array($result))
//                {

	?>				
		<?php 
//		$sql="select * from tb_track_info order by brand_style DESC"; 
//		$num_rows = mysql_num_rows(mysql_query($sql));
//                $num_pages = ceil($num_rows / $per_page); 
//                $sql .= " LIMIT $start, $per_page";
//                $result = mysql_query($sql);
//                $sl=1;
//                while($row = mysql_fetch_array($result))
//                {
//		?>
     <?php   
        $sql="select * from tb_track_info order by brand_style DESC"; 
		$num_rows = mysql_num_rows(mysql_query($sql));
                $num_pages = ceil($num_rows / $per_page); 
                $sql .= " LIMIT $start, $per_page";
                $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	?>	
	 <tr>
    <td align="center"><?php echo $sl ; ?></td>
    <td align="center"><?php echo $row['customer'] ; ?></a></td>
    <td align="center"><?php echo $row['brand_style'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_reject_pass'] ; ?></td>
    
    
    <td align="center">    
    <a href="show_all.php?ID=<?php echo $customer ; ?>&ID1=<?php echo $brand_style ; ?>"> Details </a>
    |<a href="delete.php?ID=<?php echo $row['sl'] ?>" onClick="return confirm('Are you sure you want to delete?')" title="DELETE"> <strong style="color:#F00">X</strong> </a>
    </td>
    
  
   
  </tr>
                      	  <?php
		$sl++;
	}
	?>
</table>


                            
                           
                            
                             <?php
                  
                  $prev = $page - 1;
                  $next = $page + 1;
                  
                  echo"<hr>";
                  
                  if($prev>0){
                  
                  echo"<span><a href='?page=$prev'>«Previous</a></samp> ";
                  }            
                  $number=1;
                  for($number=1; $number<=$num_pages; $number+=1)
                  {
                  if($page==$number){
                  echo" <b> [$number] </b> ";
                  }
                  else
                  {
                  echo"<a href='?page=$number'> $number </a> &nbsp;";
                  }
                  }
                  if($page < ceil($num_rows/$per_page))
                  echo"<a href='?page=$next'>Next »</a> ";                
                  ?>
                            </p> </section>
                            
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