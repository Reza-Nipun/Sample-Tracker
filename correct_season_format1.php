<?php

	include "db_Class.php";
  	$obj = new db_class();
	$obj->MySQL();
		
?>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
$rowz=0;
foreach($_POST['serial'] as $rowz=>$serial)
{		
$season=mysql_real_escape_string($_POST['season'][$rowz]);

$SQL="UPDATE tb_fabric_booking SET season='$season' WHERE sl='$serial'";
// die ($SQL);

$obj->sql($SQL);
	
$rowz++;
}

$a= '<div class="n_ok"><p> Total Style - '.$rowz.' is updated Successfully !</p></div>';

echo $a ;

}


?>
