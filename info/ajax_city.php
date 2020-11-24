<?php
include "../db_Class.php";
//$search = $HTTP_POST_VARS['search'];
$obj = new db_class();
$obj->MySQL();

?>


<?php

if($_POST['dis'])
{
		$id=trim($_POST['dis']);

// echo '<option selected="selected value="0">-Select size-</option>';

		$SQL2="select season from tb_track_info where style LIKE '%$id%' group by season order by sl DESC";
		$obj->sql($SQL2);

		while($row2 = mysql_fetch_array($obj->result))
				{ 
					$data=$row2['season'];
					echo '<option value="'.$data.'">'.$data.'</option>';
				}


/*
$SQL2="select * from tb_size_set group by concern_name order by LENGTH( concern_name ) , concern_name ASC";
		$obj->sql($SQL2);

		while($row2 = mysql_fetch_array($obj->result))
				{ 


$data=$row2['concern_name'];


echo '<option value="'.$data.'">'.$data.'</option>';
}

*/
}
?>