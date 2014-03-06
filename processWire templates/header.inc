<?php
/*
	Header File	
	Markup for Header Universal to all pages
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- metadata -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	<link rel="icon" href="<?php echo $config->urls->templates?>images/favicon.ico" />
	<title><?php echo $page->title ?> | FRC 2590 | Robbinsville Robotics</title>
	
	<meta charset="utf-8">
	<meta name="description" content= "FRC Team 2590, Nemesis, is an award winning FIRST Robotics team 
		based out of Robbinsville High School in New Jersey">
	<meta name="keywords" content= "nemesis,robotics,robbinsville,FIRST,frc2590,high school,competition">
	
	<!-- stylesheets -->
	<link rel="stylesheet" href="<?php echo $config->urls->templates?>scripts/FlexSlider/flexslider.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $config->urls->templates?>css/main.css" type="text/css">
	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?php echo $config->urls->templates?>scripts/FlexSlider/jquery.flexslider-min.js"></script>
	<script src="<?php echo $config->urls->templates?>scripts/functions.js"></script>
	<script src="<?php echo $config->urls->templates?>scripts/scrolld.js"></script>
	<?php if($page->canvas == 1){echo "<script src='".$config->urls->templates."scripts/processing-1.4.1.min.js'></script>";} ?>
	<!-- php -->
	<?php include("./scripts/functions.php"); ?>
	
	<script>
	$(window).load(function() {
		$('.flexslider').flexslider({
		animation: "slide"
		});
	  
	$(window).scroll(function () {
        var o = $(window).scrollTop();
        if (o > 300) {
            $('#topscroller').css('display','block');
            $("#topscroller").stop().animate({ opacity: 0.2 }); 
        } else {
            $('#topscroller').css('display','none');
        }
        if(o > 600) {$("#topscroller").stop().animate({ opacity: 0.6 }); }
        if(o > 900) {$("#topscroller").stop().animate({ opacity: 1 }); }
	});
	  
	});
	</script>
	
</head>
<body>
	<!--Andrey Top Scroller-->
	<div id='toptarg' class='*' style="width:1px;height:1px"  href='*'></div>
	<div id="topscroller">
        <a id='toptargBtn' class='*'><img src="<?php echo $config->urls->templates?>images/upArrow.png"/ alt="back to top" title="back to top"></a>
    </div>
	
	<header id="header-home" class="container">
		<div id="nemesis">
			<a href="<?php echo $config->urls->root?>">
				<img src="<?php echo $config->urls->templates?>images/Nemesis_transparent_black.png">
			</a>
		</div>
		<div id="logo"><a href= "<?php echo $config->urls->root?>"><img src="<?php echo $config->urls->templates?>images/logo_winged.jpg"></a></div>
	</header>
	
