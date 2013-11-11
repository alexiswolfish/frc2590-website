<?php

/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">
			<div id="flexslider-container"> <!-- this serves as a spacer until the images load -->
				<div class="flexslider">
				  <ul class="slides">
					<?php
						foreach($page->sliderImage as $i){
							echo "<li><img src='{$i->url}'/></li>";
						}
					?>
				  </ul>
				</div><!--flexSlider-->
			</div> <!--flexSlider-container-->
			
			<div id="section-container">
				<section id="spacer">
					<?php
						$robot= $pages->find("parent=/robots/, limit=1, sort=-date");
						$robot=$robot[0];
						echo "<a class='white' href='".($robot->url)."'><div class='label' id='robot-label'>current robot: ".($robot->title)."</div>";
						echo "<img src=".($robot->profile->url)."></a>";
					?>
				</section>
				<section>
					<div class="label" id="twitter-label">latest updates</div>
					<a class="twitter-timeline" href="https://twitter.com/FRC2590" data-widget-id="388759197250113537" data-chrome="nofooter noheader" height="378">Tweets by @FRC2590</a>
					<script>
						!function(d,s,id){
							var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
					</script>
				</section>
			</div><!--section-container-->
			
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			<p>FRC Team 2590, Nemesis, is an award winning FIRST Robotics team 
			based out of Robbinsville High School in New Jersey.</p>
			<p>Founded in 2008, the students in Nemesis routinely solve challenges
			in business, computer science, engineering, and math.</p>
			</section>
			<div id="first"><a href="http://www.usfirst.org/"><img src="<?php echo $config->urls->templates?>images/first.jpg" border="0"></a></div>
			<p>
			<a href="http://www.usfirst.org/">FIRST</a>
			is an international organization which uses competitive robotics 
			as a vehicle for promoting science & technology. FIRST allows high 
			school students to work side by side with professional mentors to 
			learn skills ranging from engineering to marketing, animation and 
			business.
			</p>
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>