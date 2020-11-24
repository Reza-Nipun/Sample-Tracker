  <?php 
 	include "../db_Class.php";
  	$obj = new db_class();
	$obj->MySQL(); 	
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
          ['Buyer', 'Reject'],      
		   <?php			   

$SQL="SELECT `customer`
FROM  `tb_track_info` 
GROUP BY  customer"; 
//die($SQL);



	$results = $obj->sql($SQL);
	while($row = mysql_fetch_array($results))
	{
  	$tid=$row['customer'];
//	$tid1=$row['sd_sample_reject_pass'];
	//$tid2="20";
	

$SQLx="SELECT count(`sd_sample_reject_pass`) as ta,`sd_sample_reject_pass`,customer
FROM  `tb_track_info` where customer='$tid' AND sd_sample_reject_pass='reject'"; 
//die($SQL);
	$resultsa = $obj->sql($SQLx);
	while($rowx = mysql_fetch_array($resultsa))
	{
	$tid1=$rowx['sd_sample_reject_pass'];
	$ta=$rowx['ta'];
	//$tid2="20";	
	}
echo "['$tid',$ta],";
$data='reject' ;
//,$t1,$t2   
}	
  ?> 
	//['Work', 11]
        ]);
        
		  var options = {
          title:'Sample Status Reject Chart',
          hAxis: {title: 'Buyer'},
          vAxis: {title: 'Ammount'},
		  'colors':['red'],
          bubble: {textStyle: {fontSize: 11}}
        };
		
		
		
		var chart = new google.visualization.ColumnChart(document.getElementById('visualization'))
        chart.draw(data, options);
        google.visualization.events.addListener(chart, 'select', function()
		{
          var row = chart.getSelection()[0].row;
          var element = data.getValue(row, 0);
       
		//  var element2 = data.getValue(row, 2);
		
		
	 window.open("chart_details.php?customer=" + element + "&chk1=" + 0 +"","mywindow","menubar=1,resizable=1,width=700,height=490,left=20,top=90,location=yes");
	  colors:['red','#004411'];
	 
	    }
		);
      }
      google.setOnLoadCallback(drawVisualization);
    </script>
    
  </head>
  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family: Arial;border: 0 none;">
   <div id="visualization" style="width: 920px; height: 330px; left:-20px"></div>
  </body>
</html>

​