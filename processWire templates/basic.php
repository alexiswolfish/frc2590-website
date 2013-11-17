<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			
			<div id="robot_header"> Our Robots</div>
			
			
			
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>