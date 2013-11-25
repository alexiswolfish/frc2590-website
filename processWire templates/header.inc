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
	<title>frc2590 | Team Nemesis Robotics | Robbinsville High School Robotics</title>
	
	<meta charset="utf-8">
	<meta name="description" content= "FRC Team 2590, Nemesis, is an award winning FIRST Robotics team 
		based out of Robbinsville High School in New Jersey">
	<meta name="keywords" content= "nemesis,robotics,robbinsville,FIRST,frc2590,high school,competition">
	
	<!-- stylesheets -->
	<link rel="stylesheet" href="<?php echo $config->urls->templates?>scripts/FlexSlider/flexslider.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $config->urls->templates?>css/main.css" type="text/css">
	<!-- javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="<?php echo $config->urls->templates?>scripts/FlexSlider/jquery.flexslider-min.js"></script>
	<script src="<?php echo $config->urls->templates?>scripts/functions.js"></script>
	<!-- php -->
	<?php include("./scripts/functions.php"); ?>
	
	<script>
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide"
	  });
	});
	</script>
	
</head>
<body>
	<header id="header-home" class="container">
		<div id="nemesis">
			<a href="<?php echo $config->urls->root?>"><img src="<?php echo $config->urls->templates?>images/Nemesis_transparent_black.png"></a>
			<!-- <div id="frc"><img src="<?php echo $config->urls->templates?>images/frc2590.png"></div> -->
		</div>
		<div id="logo"><a href= "<?php echo $config->urls->root?>"><img src="<?php echo $config->urls->templates?>images/logo_winged.jpg"></a></div>
	</header>
	
