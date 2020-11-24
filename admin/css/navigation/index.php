<!DOCTYPE html>
<!-- saved from url=(0080)http://webdesigntutsplus.s3.amazonaws.com/tuts/291_vertical_menu/demo/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		
		<title></title>
		
		<link rel="stylesheet" href="style.css">
		
		<script src="jquery.min.js"></script>
						
	</head>
<body>

<div id="wrapper">

	<ul class="menu">
		<li class="item1"><a href="" class="active">Friends </a>
	  <ul style="display: block;">
		
		
				<li class="subitem3"><a href="">Automatic Fails </a></li>
			</ul>
		</li>
		<li class="item2"><a href="" class="">Videos </a>
	  <ul style="display: none;">
				<li class="subitem1"><a href="">Cute Kittens <span>14</span></a></li>

			</ul>
		</li>
		<li class="item3"><a href="" class="">Galleries </a>
	  <ul style="display: none;">
				<li class="subitem1"><a href="">Cute Kittens <span>14</span></a></li>
		
			</ul>
		</li>
		<li class="item4"><a href="" class="">Podcasts </a>
	  <ul style="display: none;">
				<li class="subitem1"><a href="">Cute Kittens <span>14</span></a></li>
	
			</ul>
		</li>
		<li class="item5"><a href="" class="">Robots </a>
	  <ul style="display: none;">
				<li class="subitem1"><a href="">Cute Kittens <span>14</span></a></li>

			</ul>
		</li>
	</ul>

</div>

<!--initiate accordion-->
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>


<div id="shadowMeasureIt"></div><div id="divCoordMeasureIt"></div><div id="divRectangleMeasureIt"><div id="divRectangleBGMeasureIt"></div></div></body></html>