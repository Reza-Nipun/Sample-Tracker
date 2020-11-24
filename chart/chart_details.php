   <?php 
 	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	

	$status=$_REQUEST['status'];
	$customer=$_REQUEST['customer'];
	$chk1=$_REQUEST['chk1'];
//	$date1=$_REQUEST['date1'];
//	$date2=$_REQUEST['date2'];
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

table.bottomBorder { border-collapse:collapse; }
table.bottomBorder td, table.bottomBorder th { border-bottom:1px dotted black;padding:1px;       
font-size:11px;
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;

}

table.bottomBorder tr, table.bottomBorder tr { border:1px dotted black;padding:2px; }
</style> 


<meta charset="UTF-8" />
	<script type="text/javascript" src="../css1/jquery-1.9.0.js"></script>
	<script type="text/javascript">
	$(function(){
		$('button').click(function(){
			var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
			location.href=url
			return false
		})
	})
	</script>

<link type="text/css" rel="stylesheet" href="../images/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="../images/layout.css">

<script src="../media/js/dragtable.js"></script>
<script src="../media/js/sorttable.js"></script>


</head>

<body>

<!--<h1 align="center">Sample Tracker </h1>-->

<div id="tableWrap"> 


<table id="gradient-style" class="draggable sortable" width="100%" border="1" cellspacing="0" cellpadding="0">
  <thead align="center" style="font-weight:bold; font-size:11px; color:#000" bgcolor="#A0F21B">
  <tr>
    <th width="5%">sl</th>
    <th width="5%">Buyer</th>
    <th width="10%">Brand/Dept.</th>
    <th width="10%">Style</th>
    <th width="10%">Season</th>
    <th width="10%">Color</th>
    <th width="10%">Sample Type </th>
    <th width="10%">Sample Requet Rcv</th>    
    <th width="10%">Agreed Sample Delivery</th> 
    <th width="10%">Actual Sample Submission</th>   
    <th width="6%">Sample Reject/Pass</th>
    </tr>
    </thead>                        
    
    
     <?php


                //PER PAGE COMPONENT
                $per_page=1000;
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
				
				
if($status!=NULL OR $customer!=NULL)
{
	 $sql="select * from tb_track_info WHERE sl!=''";
	 if($customer!=NULL)
	 {
		$sql= $sql . " and customer='$customer'" ; 
	 }
	  	  	  
	 if($chk1=='0')
	 {
		$sql= $sql . " and sd_sample_reject_pass='reject' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 if($chk1=='1')
	 {
		$sql= $sql . " and sd_sample_reject_pass='pass' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 	 if($chk1=='2')
	 {
		$sql= $sql . " and sd_sample_reject_pass='' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 
	 if($status=='Due')
	 {
		$sql= $sql . " and sd_sample_reject_pass='' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 	 if($status=='Pass')
	 {
		$sql= $sql . " and sd_sample_reject_pass='pass' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 	 	 if($status=='Reject')
	 {
		$sql= $sql . " and sd_sample_reject_pass='reject' order by sd_sample_reject_pass ASC" ; 
	 }
	 
	 
	 if($style!=NULL)
	 {
		$sql= $sql . " and style='$style'" ; 
	 }
	 if($sd_concern_sd_name!=NULL)
	 {
		$sql= $sql . " and sd_concern_sd_name='$sd_concern_sd_name' " ; 
	 }
	 
}
else
{
        $sql="select * from tb_track_info WHERE STR_TO_DATE( sd_actual_sample_submission_date,  '%d-%m-%Y' ) between STR_TO_DATE( '$date1',  '%d-%m-%Y' ) and STR_TO_DATE( '$date2',  '%d-%m-%Y' ) order by sl DESC"; 
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
	 <tr style="color:#000 ;">
    <td align="center"><?php echo $sl ; ?></td>
    <td align="left">&nbsp; <?php echo $row['customer'] ; ?></a></td>
    <td align="left">&nbsp;<?php echo $row['brand_style'] ; ?></td>
    <td align="left"> &nbsp;<a href="../style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['style'] ; ?></a></td>
    <td align="left"><a href="../style_details.php?IDX=<?php echo $row['style'] ; ?>" style="color:#000" target="_blank"><?php echo $row['season'] ; ?></a></td>
    <td align="left"> &nbsp;<?php echo $row['color'] ; ?></td>
    <td align="left"> &nbsp;<?php echo $row['sd_sample_type_name'] ; ?></td>
    <td align="left"> &nbsp;<?php echo $row['sd_sample_req_rcv_date'] ; ?></td>
    <td align="left"> &nbsp;<?php echo $row['sd_agreed_sample_delivery_date'] ; ?></td>
    <td align="left"> &nbsp;<?php echo $row['sd_actual_sample_submission_date'] ; ?></td>
    
    
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
    </tr>
                      	  <?php
		$sl++;
	}
	?>
</table>


<br />
</div>

<br />

<div align="center">
       <form id="printMe" name="printMe"> 
  <button style="cursor:pointer">Click to download as Excel</button> 
</form>
</div>
</body>
</html>