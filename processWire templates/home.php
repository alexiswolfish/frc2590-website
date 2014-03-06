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
						
							/*fetch pages with featuredImages or sliderImages tagged "featured"
							  display in main slider sorted by date, with filler images in between*/
							$featuredSlides = $pages->find("sliderImage.tags|featuredImage.tags|tags*=featured, limit=8, sort=-date");
							$count = 0;
							$sliderIndex = 0;
							foreach($featuredSlides as $k){
								if(($count%3 == 0) && count($page->sliderImage)){
									$url = $page->sliderImage->eq($sliderIndex)->url;
									echo "<li><img src='{$url}'/></li>";
									$sliderIndex++;
								}
								
								if( ($k->featuredImage != NULL)){
									echo "<li><img src='{$k->featuredImage->url}'/>";
									echo "<p class='flex-caption'>
											<a class='white' href='".$k->url."'>".$k->title."</a>
									  </p>";
									echo "</li>";
								}
								else{
									$img = $k->sliderImage->getTag('featured');
									echo "<li><img src='{$img->url}'/>";
									echo "<p class='flex-caption'>
											<a class='white' href='".$k->url."'>".$img->description."</a></p>";
									echo "</li>";
								}
								$count++;
							}
						
						/*
						//Andre Randomized Slide Sort
							$D = array();
							$C = array();
							foreach($pages->find("featuredImage.tags=featured, limit=6, sort=-date") as $k){
								$C[] = (object) ['url' => $k->featuredImage->url, 'href' => $k->url, 'desc' => $k->title, 'date' => $k->date];
							}
							foreach($pages->find("sliderImage.tags=featured, limit=4, sort=-date") as $j){
								foreach($j->sliderImage->findTag('featured') as $img){
									$C[] = (object) ['url' => $img->url, 'href' => $j->url, 'desc' => $img->description, 'date' => $k->date];
								}
							}
							foreach($page->sliderImage as $x){
								$D[] = (object) ['url' => $x->url];
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
						*/
						?>
						</ul>
					</div><!--flexSlider-->
				</div> <!--flexSlider-container-->
							
				<div id="section-container">
					<section id="spacer">
						<?php
							$robot= $pages->find("parent=/robots/, limit=1, sort=-year");
							$robot=$robot[0];
							echo "<a class='white' href='".($robot->url)."'><div class='label' id='robot-label'>featured robot: ".($robot->title)."</div>";
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
				<?php
					/*Grab the four latest posts from the blog*/

				?>
			</div>
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<div id="first"><a href="http://www.usfirst.org/"><img src="<?php echo $config->urls->templates?>images/first.jpg" border="0"></a></div>
			<p>
			<a href="http://www.usfirst.org/">FIRST</a>
			is an international organization which uses competitive robotics 
			as a vehicle for promoting science & technology. FIRST allows high 
			school students to work side by side with professional mentors to 
			learn skills ranging from engineering to marketing, animation and 
			business. <a href="<?php echo $config->urls->root; ?>first/">Learn More</a></li>  
			</p>
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
		

<?php
include("./footer.inc");
?>