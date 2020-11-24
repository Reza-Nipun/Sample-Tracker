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
		
		if (isset($_POST['search']))
 		{
		  $customer1=mysql_real_escape_string($_POST['customer']);
		  $brand_style_search1=mysql_real_escape_string($_POST['brand_style']);
		  $style1=mysql_real_escape_string($_POST['style']);	
		  $sd_concern_sd_name1=mysql_real_escape_string($_POST['sd_concern_sd_name']);
		  $datef1=mysql_real_escape_string($_POST['datef']);
		  $datel1=mysql_real_escape_string($_POST['datel']);		
		}
	

	?>

<!DOCTYPE html>
<!-- saved from url=(0066)http://ohmy-website-template.little-neko.com/template-columns.html -->
<html lang="en"><!--<![endif]-->
<head>
<?php require("re_head.php"); ?>
<script type="text/javascript" language="javascript">
 //  javascript:window.history.forward(1);
</script>

<script src="media/js/dragtable.js"></script>
<script src="media/js/sorttable.js"></script>

<style>
h6 
{
/*text-decoration:blink;
color:#F00;*/
}



</style>
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
            <section id="content" class="columnPage">
                <header class="headerPage">
				<?php require("re_header_page.php"); ?>
                </header>
                
              <!--  for SD only-->
                
                   
                <div class="slice clearfix">
                    <div class="container"> 
                        <div class="row"> 
                        
                      
					<?php if($user_rule==1) { ; ?> 
                            <div class="span12">
                                <h2>SD :</h2>
                                <div class="divider"><span></span></div>  
                            </div>    
                                                
                            <section class="span12">
                          <?php include("sd1_x_delete.php") ; ?>
                          <p> </p></section>   
                           <?php }  ?>   
                  
                          <div class="span12"></div>
                            
                            <div class="span12">
                              <h2>Sample Information</h2>
                                <div class="divider"><span>
                                 </span></div>  
                            </div>  
                           
                            
          
                            <section class="span12">
   <form action="" method="post">
   <table id="gradient-style" border="1" cellpadding="0" cellspacing="0" class="bottomBorder">
  <tr align="center" style="font-weight:bold; font-size:11px">
  
    
    
    
    <td width="8%">Buyer</td>
    <td width="12%">
      <select name="customer" autofocus id="customer" style="font-size:11px">
          <option value="">--Select Customer--</option>
         					     <?php
         $SQL="select concern_name from tb_concern where concern_type like 'CUSTOMER' group by concern_name";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['concern_name'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select></td>
      
    
    
    
    
    <td width="8%">Brand/Dept.</td>
    <td width="12%">
    <select name="brand_style" autofocus id="brand_style" style="font-size:11px">
          <option value="">--Select Brand--</option>
         					     <?php
         $SQL="select brand_style from tb_track_info group by brand_style";
                            $obj->sql($SQL);
                            while($row = mysql_fetch_array($obj->result))
                            { 
                            $dis=$row['brand_style'];
                            echo '<option value="'.$dis.'">'.$dis.'</option>';
                            }
                            ?>
        </select>
    </td>
      <!--<input type="text" name="brand_style" id="brand_style">-->
      
    
       
    
    <td width="8%">Style</td>
    <td width="12%">
      <input type="text" name="style" id="style"></td>
    <td width="12%">Concern SD</td>
    <td width="12%">
    <select name="sd_concern_sd_name" autofocus id="sd_concern_sd_name" style="font-size:11px">
          <option value="">--Select Concern SD--</option>
          <?php 
		  $SQL="select concern_name from tb_concern where concern_type='SD' group by concern_name"; 
         		$result=$obj->sql($SQL);
				while($row=mysql_fetch_array($result))
				{
     				$dis=$row['concern_name'];
					echo '<option value="'.$dis.'">'.$dis.'</option>';
                 					
				}
				             
           ?>                     
                                
        </select>
    </td>
      <!--<input type="text" name="sd_concern_sd_name" id="sd_concern_sd_name">-->
    
    <td width="10%"><input name="search" type="submit" class="btn btn-success" id="search" value="Search" /></td>
    </tr></table>
    <label></label>
    <table width="100%" border="1" align="center" id="gradient-style" cellpadding="0" cellspacing="0" class="bottomBorder">
 <tr align="center" style="font-weight:bold; font-size:12px">
    <td scope="col" style="color:#000">Date from Sample Delivery </td>
    <td scope="col" align="center"><input name="datef" class="rounded" type="text" id="datef" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" /></td>
    <td scope="col" style="color:#000">Date To Sample Delivery</td>
    <td scope="col" align="center"><input name="datel" class="rounded" type="text" id="datel" placeholder="dd-mm-yyyy" tabindex="2" onClick="showCalendarControl(this);" /></td>
    </tr>
  </table>
                                </form>
                                
                              <br>
                              
                        
                              <table id="gradient-style" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
  <tr>
    <th width="3%">sl</th>
    <th width="5%">Buyer</th>
    <th width="10%">Brand</th>
    <th width="10%">Style</th>
    <th width="10%">Color</th>
    <th width="10%"> Type </th>
    <th width="10%"> Request Rcv. Date</th>      
    <th width="10%">Sample Delivery</th> 
    <th width="10%">Sample Submission</th>   
    <th width="6%">Status</th>
    <!--<th width="10%">Department to act</th> --> 
    <th width="8%">Action</th>
    </tr>
    </thead>                        
    
    
     <?php


                //PER PAGE COMPONENT
                $per_page=500;
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
				
				
if($customer1!=NULL OR $brand_style_search1!=NULL OR $style1!=NULL OR $sd_concern_sd_name1!=NULL OR $datef1!=NULL OR
$datel1!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!=''";
	 if($customer1!=NULL)
	 {
		$sql= $sql . " and customer='$customer1'" ; 
	 }
	 if($brand_style_search1!=NULL)
	 {
		$sql= $sql . " and brand_style='$brand_style_search1'" ; 
	 }
	 
	  if($datef1!=NULL AND $datel1!=NULL)
	 {
		$sql= $sql . " and STR_TO_DATE( sd_agreed_sample_delivery_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$datef1',  '%d-%m-%Y' ) and STR_TO_DATE( '$datel1',  '%d-%m-%Y' )" ; 
	 }
	 
	 if($style1!=NULL)
	 {
		$sql= $sql . " and style='$style1'" ; 
	 }
	 if($sd_concern_sd_name1!=NULL)
	 {
		$sql= $sql . " and sd_concern_sd_name='$sd_concern_sd_name1' " ; 
	 }
	 $sql= $sql . " ORDER BY SL DESC" ;
	 
}
else
 {
     $sql="select * from tb_track_info where create_date='$sys_date' order by sl DESC"; 
 }
		$num_rows = mysql_num_rows(mysql_query($sql));
        $num_pages = ceil($num_rows / $per_page); 
        $sql .= " LIMIT $start, $per_page";
        $result = mysql_query($sql);
		//die($sql) ;
		
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	?>	
	 <tr style="color:#000">
    <td align="center"><?php echo $sl ; ?></td>
    <td align="center"><?php echo $row['customer'] ; ?></a></td>
    <td align="center"><?php echo $row['brand_style'] ; ?></td>
    <td align="center"><a href="style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td align="center"><?php echo $row['color'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_type_name'] ; ?></td>
    <td align="center"><?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td align="center"><?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
    
    
    <?php if($row['sd_sample_reject_pass']=='pass') 
	         {
				 $c="#093" ;
				 $c1="Pass";
			 }
	elseif ($row['sd_sample_reject_pass']=='reject')
	         {
			   $c="#FF0000" ;
			   $c1="Reject";
			  }
			  else
			  {
				 $c='';
				 $c1='';
			  }
			  ?>
	<td bgcolor="<?php echo $c ; ?>" style="padding-right:5px; color:#000" align="center"><strong style="color:#FFF"><?php echo $c1 ; ?></strong></td>
            
	
	
   <!-- <td align="center"><?php //echo $row['sd_sample_reject_pass'] ; ?></td>-->
    
    
    
    
<!--    <td align="center">-->
	<?php
	/*
	if($row['customer']!=NULL && $row['dpd_concern_sample_coordinator_name']==NULL)
	{ 
	echo '<font color="green">DPD -</font>' ; //dpd3     (1)
	}	
	if($row['dpd_concern_sample_coordinator_name']!=NULL && $row['dpd_meeting_sd_mm_dpd_sample_date']==NULL)
	{ 
	echo '<font color="green">DPD -</font>' ; //dpd4		(2)
	}	
	if($row['dpd_clarification_sending_to_sd_date']!=NULL && ( $row['sd_clarification_arng_confrm_from_buyer_date']==NULL) )	
	{ 
	echo 'SD -' ; //sd2
	}	
	if($row['dpd_meeting_sd_mm_dpd_sample_date']!=NULL && $row['dpd_labdip_actual_date']==NULL )
	{
	echo '<font color="green">DPD -</font>' ; //dpd5    (3)
	}
	if($row['dpd_meeting_sd_mm_dpd_sample_date']!=NULL && $row['mm_trims_actual_date']==NULL )
	{
	echo '<font color="Purple">MM -</font>' ;	//mm2     
	}
	if($row['dpd_meeting_sd_mm_dpd_sample_date']!=NULL && $row['sample_pattern_planned_date']==NULL )
	{
	echo 'Sample -' ; 	//Sample2
	}
	if($row['dpd_labdip_req_sent_to_lab_date']==NULL )
	{
	echo '<font color="green">DPD -</font>' ; //dpd(Free)    (3)
	}
		
	if($row['sd_agreed_sample_delivery_date']!=NULL && $row['sd_actual_sample_submission_date']==NULL )
	{
	echo '<font color="blue">SD -</font>' ;    //sd7
	}
//	if($row['sd_actual_sample_submission_date']!=NULL && $row['sd_sample_ontime_delay']==NULL )
//	{
//	echo '<font color="blue">SD(auto) -</font>' ;   //sd `sd_sample_ontime_delay` sd7 auto update
//	}
	if($row['sd_actual_sample_submission_date']!=NULL && $row['sd_comments_rcvd_date']==NULL )
	{
	echo '<font color="blue">SD -</font>' ; //sd6
	}
	if($row['sd_comments_rcvd_date']!=NULL && $row['sd_sample_reject_pass']==NULL )
	{
	echo '<font color="blue">SD -</font>' ; //sd8
	}
	if($row['sd_sample_reject_pass']=='reject')
	{
	echo '<font color="Maroon">Head SD/DPD</font>' ;
	}
	else 
	{
		 
	}
	
	*/
	?>
   <!-- </td>-->
    <td align="center" style="font-size:9px">  
    
      
    <!--<a style="color:#03F" href="style_details.php?IDX=<?php // echo $row['style'] ; ?>" target="_blank"> <img name="" src="images/app-vnd-oasis-opendocument-text-icon.png" width="20" height="20" title="Details" alt=""> </a>-->
    
    <!--|<a href="delete.php?ID=<?php // echo $row['sl'] ?>" onclick="return confirm('Are you sure you want to delete?')" title="DELETE"> <strong style="color:#F00">Update</strong> </a>
    
    onclick="return confirm('Are you sure you want to update?')"
-->    
 
<!--
   <?php // if($user_rule==1){ ?>       
   <a href="update_sd.php?ID=<?php // echo $row['sl'] ?>&ID1=<?php // echo $row['brand_style'] ?>"  title="Update"> <img name="" src="images/Apps-system-software-update-icon.png" width="20" height="20" title="Update" alt=""> </a>
   <?php //  } if($user_rule==2){ ?> 
   <a href="update_mm.php?ID=<?php // echo $row['sl'] ?>&ID1=<?php // echo $row['brand_style'] ?>"  title="Update"> <img name="" src="images/Apps-system-software-update-icon.png" width="20" height="20" title="Update" alt=""> </a>
   <?php //  } if($user_rule==3){ ?> 
   <a href="update_dpd.php?ID=<?php // echo $row['sl'] ?>&ID1=<?php // echo $row['brand_style'] ?>"  title="Update"> <img name="" src="images/Apps-system-software-update-icon.png" width="20" height="20" title="Update" alt=""> </a>
   <?php //  } if($user_rule==4){ ?> 
   <a href="update_sample.php?ID=<?php // echo $row['sl'] ?>&ID1=<?php // echo $row['brand_style'] ?>"  title="Update"> <img name="" src="images/Apps-system-software-update-icon.png" width="20" height="20" title="Update" alt=""> </a>
   <?php // } ?>
-->
    
    
    
    
       <?php  if($user_rule==6){ ?> 
       <a href="update_sd_dpd_head.php?ID=<?php echo $row['sl'] ?>&ID1=<?php echo $row['style'] ?>&ID2=<?php echo $row['color'] ?>"  title="Update"> <img name="" src="images/Apps-system-software-update-icon.png" width="20" height="20" title="Update" alt=""> </a> 
       
       
       <?php if($row['sd_sample_reject_pass']!=NULL && $row['track_status']==0) { ?>
       
        <!--<strong> |</strong>--><a style="color:#03F" href="traker.php?ID=<?php echo $row['sl'] ; ?>&ID1=<?php echo $row['style'] ; ?>" class="firstLevel">Track</a>
      
       <?php }  ?>
       
     
      
       
     <?php  }  ?>
    <a href="home_copy.php?ID=<?php echo $row['style'] ; ?>" target="_blank">Make Copy</a>
    
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
                
                            
               
                
             <!--   end of SD part-->
             
             
				
            </section> 
            <!-- page content -->
            <!-- footer -->           
            <?php // require("re_footer1.php"); ?>
            <?php require("re_footer.php"); ?>           
            <!-- footer -->
        </div>
         <?php require("re_footer_head.php"); ?>
</body></html>