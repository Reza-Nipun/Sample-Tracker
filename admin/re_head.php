<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />

<title>VTL Sample Tracker Admin Panel</title>
<link rel="stylesheet" type="text/css" href="images/style.css" media="screen">
<link rel="stylesheet" type="text/css" href="images/navi.css" media="screen">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>