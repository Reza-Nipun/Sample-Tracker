
  <?php 
 	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
	
	

//$datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
//$date=$datex->format('m-d-Y');

//	$date1=$_GET['date1'];
//	$date2=$_GET['date2'];


//require("../admin/date_to_month.php");
//$month_value=$month_value;


	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>VIYELLATEX</title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['Floor', 'Total needle'],        
		   <?php	
		 
$SQL="SELECT COUNT( * ) as pa ,  `customer`,sd_sample_reject_pass 
FROM  `tb_track_info` WHERE sd_sample_reject_pass=''
GROUP BY  `customer` order by `customer` ASC"; 

//die($SQL);

	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
  	$tid2=$row['pa'];
  	$tid=$row['customer'];
	//$tid2="20";
	


	
//$tid1=$tidx-$tid2;
//echo "['.jahid.','.12.']" ;
// echo ',' ;
echo "['$tid',$tid2],";   

}	
  ?> 
		//  ['Work', 11]

        ]);
      
	  
	
	  
        // Create and draw the visualization.
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, {title:"" ,  is3D: true,});
        google.visualization.events.addListener(chart, 'select', function()
		{
          var row = chart.getSelection()[0].row;
          var element = data.getValue(row, 0);
          var element1 = data.getValue(row, 1);
		   
		//  var element2 = data.getValue(row, 2);
	
   
	   
	    //   alert('You just selected: ' + element);
        //  window.location.href = 'http://www.example.com';
		// 
	//	window.open ("a.php?ID=<?php // echo $element ; ?>&ID1=<?php // echo $tid2 ; ?>&ID2=<?php // echo $tid3 ; ?>","mywindow","menubar=1,resizable=1,width=550,height=450");
		
		// window.open('https://support.wwf.org.uk/earth_hour/index.php?type=individual','_blank'  );
     
	 window.open("chart_details.php?customer=" + element + "&chk1=" + 2 +"","mywindow","menubar=1,resizable=1,width=1000,height=590,left=20,top=90,location=yes");
	  colors:['red','#000000'];
	 
	    }
		
		);
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family: Arial;border: 0 none;">
  <div id="piechart_3d" style="width: 490px; height: 330px; left:-20px"></div>
  </body>
</html>

​