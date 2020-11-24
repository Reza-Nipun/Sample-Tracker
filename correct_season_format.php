<?php
	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
	
	?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    
    <script language="javascript" type="text/javascript">
        function deleteSpecialChar(season) {
            if (season.value != '' && season.value.match(/^[\w ]+$/) == null) 
            {
                season.value = season.value.replace(/[\W]/g, '');
            }
        }
    </script>
    
<!--        <script language="javascript" type="text/javascript">
        function deleteSpecialChar(a) {
            if (a.value != '' && a.value.match(/^[\w ]+$/) == null) 
            {
                return (a.value.replace(/[\W]/g, ''));
            }
        }
    </script>
-->
    
</head>
<body>


<?php
/*
$r_season = $_REQUEST['season'];

$req_season = deleteSpecialChar($r_season);
echo '------';
echo $req_season ;
*/?>

<form action="correct_season_format1.php" method="post">    
       
<table cellpadding="0" cellspacing="0" border="1">
	
    <thead>
        <tr bgcolor="" style="color:#000; font-family:'Courier New', Courier, monospace; font-weight:normal">
            <th>sl</th> <!--style="width: 200px !important; "-->
            <th>Season</th>
        </tr>
    </thead>
<tbody>
    
    <?php
	
        $sql="select * from tb_fabric_booking order by sl DESC LIMIT 2000, 1000";
		
		// $sql="select * from tb_track_info WHERE sl = '5655'";
				
	    $result = mysql_query($sql);
		$result=$obj->sql($sql);
		$sl=1;
        while($row = mysql_fetch_array($result))
        {
	
	?>
		<tr style="color:#000">
		  <td><input name="serial[]" type="hidden" value="<?php echo $row['sl'] ; ?>"><?php echo $sl ; ?></td>
		  <td><input id="season[]" name="season[]" type="text" onKeyDown="javascript:deleteSpecialChar(this)" value="<?php echo $row['season'] ; ?>"><?php echo $row['season'] ; ?></td>
          
          <!--<input name="season" type="text" value="<?php // echo $row['season'] ; ?>">-->
          
	    </tr>
        
        <?php $sl++ ; } ?>
        
	</tbody>
    
</table>


<br>


<input name="submit" type="submit" class="btn btn-success" id="submit" value="Update »" />
      &nbsp;
      <input name="input" type="reset" class="btn btn-danger" value="Reset" />

</form> 

  </body>
</html>