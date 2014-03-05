<?php
/*
	Displays information about the various subteams
*/
include("./header.inc");
?>
	<div id="main" class="container">
		<div id="content">		
			<div id="team-container" class="border">
					<div id="teamHeader">
						<?php
							// if we are using an interactive code header
							if($page->canvas == 1){
								echo "<div id='canvasHeader'>";
								echo "<canvas data-processing-sources='".$config->urls->templates."scripts/processing/JimHarris_SoftwareTeam.pde'></canvas>";
								echo "<div id='teamLabel'>
										<h1 class='white'>{$page->title}</h1>
									</div></div>";
							}
							// static flexslider header
							else{
								echo "
									<div class='flexslider'>
										<ul class='slides'>
									 ";
								foreach($page->sliderImage as $i){
									echo "<li><img src='{$i->url}'/></li>";
								}
								echo "</ul>
									</div>
									<div id='teamLabel'>
										<h1 class='white'>{$page->title}</h1>
									</div>";
							}
						?>
					</div>
				<div class="teamBlock">
					<div id="blockLeft" class="border">
							<!--<img src="<?php echo $config->urls->templates; ?>images/build.jpg" width="200px">-->
							<div id="post-header"><h2><b>Who we are</b></h2></div>
								<?php echo $page->postContent; ?>
					</div>
					<div id="mentorBlock" class="border">
						<div id="post-header"><h2 class="red"><?php echo $page->title ?> Mentors</h2></div>
						<?php
							$teamVar = str_replace(" ", "_", $page->title);
							$mentors = $pages->find("mentor=1, sort=class, $teamVar=1");
							foreach($mentors as $mentor){
								echo "<div class='person'>
											<a href='$mentor->url' title='$mentor->shortBio' class='bio'><span title='More'>
												<div id='profile' name='profile'>";
								echo $mentor->profile->url;
								echo "			</div></span></a>
											<div id='fields'>";
								echo "			<a href='$mentor->url'><h3>$mentor->title</h3></a>";
								if(($mentor->job)!=null){echo "<div id='profession'>$mentor->job</div>";}
								echo "		</div>
										</div>
									</a>";
							}
						?>
					</div><!--blockLarge-->
				</div>
				<div class="teamBlock">
					<div id="blockLarge">
					<?php
						$featuredPosts = $pages->find("template=blogPost, tags*='$page->title', limit=2, sort=-date");
						foreach($featuredPosts as $post){
							echo "<div class='featured' >";
							echo "<a href='$post->url'><div id='blogImg-container' name='featuredImage'>".($post->featuredImage->url)."</div></a>";
							echo "<div id='fields'><div id='details' class='grey'>{$post->date}</div>
								  <a href='$post->url'><h3>$post->title</h3></a>";
							echo "<div class='grey'><a class='grey' href='".($post->author->url)."'>".($post->author->title)."</a></div>";
							echo "</a></div></div>";
						}
					?>
					</div><!--blockFull-->
					<div id="blockSmall" class="border">
						<h2 id="heading" class="border"><b>From the Blog</b></h2>
						<ul>
						<?php
						$otherPosts = $pages->find("template=blogPost, tags*='$page->title', start=2, limit=8; sort=-date");
						foreach($otherPosts as $post){
								echo "<li><a class='grey' href='{$post->url}' class='linkDesc'>{$post->title}</a></li>";
							}
						?>
						</ul>
					</div>
				</div>
				<!--<div class="teamBlock">-->
					<div id="tumblr">
					<?php 
					/*Retrieve latest post from the tumblr*/
						$teamVar = str_replace(" ", "", $page->title);
						$request_url = "http://frc2590.tumblr.com/api/read?start=0&num=4&type=photo&tagged={$teamVar}";
						$xml = simplexml_load_file($request_url);
						foreach($xml->posts->post as $post){
							$title = $post->{'photo-caption'};
							$postURL = $post['url'];
							$photoURL = $post->{'photo-url'};
							echo"<div class='tumblr'>
									<a href='".$postURL."'>
										<div id='tumblrImg' class='bgReplace' name='tumblrImg'>{$photoURL}</div>
									</a>
								 ";
							if($title != ""){
								//description in a normal field block
								echo "<div id='fields'><a href='{$postURL}'>".$title."</a></div>";
								//description on a red transparency
								/*echo "<div id='tumblr-desc'><a class='white' href='{$postURL}'>
										".$title."
									  </a></div>";*/
							}
							echo"</div>";
						}
					?>
					</div>
				<!--</div>-->
				<div class="teamBlock">
					<div id="post-header"><h2 class="red"><div id="members"><b>The <?php echo $page->title ?></b></div></h2></div>
					<?php
					/*Pull all member pages with a graduation year within four years
					  of the current year*/
					$teamVar = str_replace(" ", "_", $page->title);
					$curMembers;
					/*NOTE edit so that team variable comes from title*/
					$year = intval(date("Y"));
					$curMonth = intval(date("m"));
					if($curMonth >= 8){
						$curMembers = $pages->find("template=member, mentor=0, class>$year, {$teamVar}=1, sort=class, sort=lastName");
					}
					else{
						$curMembers = $pages->find("template=member, mentor=0, class>=$year, {$teamVar}=1, sort=class, sort=lastName");
					}
					foreach($curMembers as $member){
							echo "<div class='person'>";
							echo "<a href='$member->url' title='$member->shortBio' class='bio'><span title='More'><div id='profile' name='profile'>";
							echo $member->profile->url;
							echo "</div></span></a><div id='fields'>";
							echo "<a href='$member->url'><h3>$member->title</h3></a>";
							echo "<div id='status'>";
							printStatus($member);
							echo "</div><div id='team'>";
							printTeam($member, $pages);
							echo "</div></div></div>";
						}
					?>
				</div>
			</div>
		</div><!--content-->
		
		<script>
			cssBackground("profile");
			cssBackground("featuredImage");
			cssBackground("tumblrImg");
		</script>
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

		</aside> <!-- sidebar -->
	</div> <!--container-->
<?php
include("./footer.inc");
?>