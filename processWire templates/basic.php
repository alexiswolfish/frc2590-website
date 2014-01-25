<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="main-container">
				<?php echo $page->body ?>
			</div>
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
				<p>FRC Team 2590, Nemesis, is an award winning FIRST Robotics team based out of Robbinsville High School in New Jersey.
				</p>
				<p>Founded in 2008, the students in Nemesis routinely solve challenges in business, computer science, engineering, and math.
				</p>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>