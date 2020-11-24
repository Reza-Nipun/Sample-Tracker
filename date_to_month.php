<?php


$date_to_m=$date;

//$date_to_m='01-05-2013';
$date_to_m = explode("-", $date_to_m);
$date_year=$date_to_m[2] ;

if($date_to_m[0]=='01')
{
$date_month='January' ;
$date_year_value='1'.$date_year ;
$month_value='1';
//die($date_year_value);
}
else if($date_to_m[0]=='02')
{
$date_month='February'	;
$date_year_value='2'.$date_year ;
$month_value='2';
}
 else if($date_to_m[0]=='03')
{
$date_month='March'	;
$date_year_value='3'.$date_year ;
$month_value='3';
}
 else if($date_to_m[0]=='04')
{
$date_month='April'	;
$date_year_value='4'.$date_year ;
$month_value='4';
}
 else if($date_to_m[0]=='05')
{
$date_month='May'	;
$date_year_value='5'.$date_year ;
$month_value='5';
}
  else if($date_to_m[0]=='06')
{
$date_month='June'	;
$date_year_value='6'.$date_year ;
$month_value='6';
}
  else if($date_to_m[0]=='07')
{
$date_month='july'	;
$date_year_value='7'.$date_year ;
$month_value='7';
}
  else if($date_to_m[0]=='08')
{
$date_month='August' ;	
$date_year_value='8'.$date_year ;
$month_value='8';
}
  else if($date_to_m[0]=='09')
{
$date_month='Syptember'  ;	
$date_year_value='9'.$date_year ;
$month_value='9';
}
  else if($date_to_m[0]=='10')
{
$date_month='October'	;
$date_year_value='10'.$date_year ;
$month_value='10';
}
  else if($date_to_m[0]=='11')
{
$date_month='November'	;
$date_year_value='11'.$date_year ;
$month_value='11';
}
  else if($date_to_m[0]=='12')
{
$date_month='December'	;
$date_year_value='12'.$date_year ;
$month_value='12';
}


//echo $date_month ;
//echo $date_year ;
//echo $date_year_value ;