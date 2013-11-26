<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			
			<div id="resources-container" class="border">
				<div id="blockLeft" class="border">
					<img src="<?php echo $config->urls->templates; ?>images/resources.jpg" width="200px">
					<div id="fields">
						<p>a compilation of useful resources for FRC2590</p>
					</div>
				</div>
				<div class="blockList" id="firstLinks"> 
					<h3 id="heading" class="border"><b>FIRST community</b></h3>
					<ul><?php
						foreach($page->firstLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
				<div id="tutorials">
					<h3 id="heading" class="border"><b>tutorials</b></h3>
					<ul><?php
						$siteTutorials = $pages->find("template=blogPost, tags*=tutorial, sort=-date");
						foreach($siteTutorials as $link){
							$snip = strip_tags($link->postContent);
							$snip = substr($snip,0,125);
							echo "<li><a href='{$link->url}'>{$link->title}<span>";
							echo $snip;
							echo "</span></a></li>";
						}
						foreach($page->tutorialLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
				<div id="tumblr">
				<?php 
				/*Retrieve latest post from the tumblr*/
					$request_url = "http://frc2590.tumblr.com/api/read?start=0&num=1&type=photo";
					$xml = simplexml_load_file($request_url);
					$title = $xml->posts->post->{'photo-caption'};
					$postURL = $xml->posts->post['url'];
					$photoURL = $xml->posts->post->{'photo-url'};
					echo"<div class='tumblr'>
							<a href='".$postURL."'>
								<img src='".$photoURL."'>
							</a>
						 </div>";
					echo "<div id='tumblr-desc'><a class='white' href='{$postURL}'>
							".$title."
						  </a></div>";
				?>
				</div>
				<div class="blockList">
					<h3 id="heading" class="border"><b>Nemesis Media</b></h3>
					<ul><?php
						foreach($page->nemesisLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
				<div class="blockList" id="noMargin">
					<h3 id="heading" class="border"><b>Software Team</b></h3>
					<ul><?php
						foreach($page->softwareTeamLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
				<div class="blockList">
					<h3 id="heading" class="border"><b>Web Dev Team</b></h3>
					<ul><?php
						foreach($page->webDevLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
				<div class="blockList">
					<h3 id="heading" class="border"><b>Build Team</b></h3>
					<ul><?php
						foreach($page->buildTeamLinks as $link){
							echo "<li><a href='{$link->link}' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						}
					?></ul>
				</div>
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