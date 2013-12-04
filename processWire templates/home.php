<?php

/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">
			<div id="main-container">
				<div id="flexslider-container"> <!-- this serves as a spacer until the images load -->
					<div class="flexslider">
					  <ul class="slides">
						<?php
						
							// /*pull images attatched to slider variable on home template*/
							// foreach($page->sliderImage as $i){
								// echo "<li><img src='{$i->url}'/></li>";
							// }
							// /*pull featuredImages tagged "featured"*/
							// $featuredPages = $pages->find("featuredImage.tags=featured, limit=6, sort-=date");
							// foreach($featuredPages as $k){
								// echo "<li><img src='{$k->featuredImage->url}'/>";
								// echo "<p class='flex-caption'>
												// <a class='white' href='".$k->url."'>".$k->title."</a>
									  // </p>";
								// echo "</li>";
								
							// }
							// /*pull any image tagged "featured" from the blog Sliders*/
							// $featuredSliders = $pages->find("sliderImage.tags=featured, limit=4, sort-=date");
							// foreach($featuredSliders as $j){
								// $featuredImgs = $j->sliderImage->findTag('featured');
								// foreach($featuredImgs as $img){
									// echo "<li><img src='{$img->url}'/>";
									// echo "<p class='flex-caption'>
												// <a class='white' href='".$j->url."'>".$img->description."</a></p>";
									// echo "</li>";
								// }
							// }
						
							$D = array();
							$C = array();
							foreach($pages->find("featuredImage.tags=featured, limit=6, sort=-date") as $k){
								$C[] = (object) ['url' => $k->featuredImage->url, 'href' => $k->url, 'desc' => $k->title];
							}
							foreach($pages->find("sliderImage.tags=featured, limit=4, sort=-date") as $j){
								foreach($j->sliderImage->findTag('featured') as $img){
									$C[] = (object) ['url' => $img->url, 'href' => $j->url, 'desc' => $img->description];
								}
							}
							foreach($pages->sliderImage as $x){
								$D[] = (object) ['url' => $x->url, 'href' => $x->url, 'desc' => $x->title];
							}
							
							$A = array_merge( (array)array_slice($D,1), (array)$C );
							shuffle($A);
							array_unshift($A, $D[0]);
							
							foreach($A as $value){
								echo "<li><img src='{$value->url}' />";
								if(property_exists($value, "href")){
									echo "<p class='flex-caption'><a class='white' href='".$value->href."'>".$value->desc."</a></p>";
								}
								echo "</li>";
							}
							
							//Alex debug
							echo "</ul>
								</div><!--flexSlider-->
								</div> <!--flexSlider-container-->";
								
							echo "hihihi A: ".count($A)." D: ".count($D)." C: ".count($C)." </br>";
								foreach( $page->sliderImage->slice(1) as $i)
								{
									 echo $i->url."</br>";
								}

							
						?>

				
				<div id="section-container">
					<section id="spacer">
						<?php
							$robot= $pages->find("parent=/robots/, limit=1, sort=-year");
							$robot=$robot[0];
							echo "<a class='white' href='".($robot->url)."'><div class='label' id='robot-label'>current robot: ".($robot->title)."</div>";
							echo "<div id='robotImage' class='bgReplace' name='robotImage'>".($robot->profile->url)."</div></a>";
						?>
					</section>
					<section>
						<div class="label" id="twitter-label">latest updates</div>
						<a class="twitter-timeline" href="https://twitter.com/FRC2590" data-widget-id="388759197250113537" data-chrome="nofooter noheader" height="378" width="376">Tweets by @FRC2590</a>
						<script>
							cssBackground('robotImage');
							!function(d,s,id){
								var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
						</script>
					</section>
				</div><!--section-container-->
			</div>
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