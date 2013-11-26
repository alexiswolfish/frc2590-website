<?php
/*
	Displays information about the various subteams
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="blockLeft" class="border">
					<img src="<?php echo $config->urls->templates; ?>images/build.jpg" width="200px">
					<div id="fields">
						<p>Here is a space where you can talk in length about the build team blah blah blah
						build team blah blah blah they don't realize that our kids are cadding that they can
						create cool things cause they can use the CAD blah blah blah kids these days amIright</p>
					</div>
			</div>
			<div id="post-header"><h2 class="red">Build Team Mentors</h2></div>
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