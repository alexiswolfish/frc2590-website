<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			
			<div id="tumblr">
					<?php 
						echo $config->urls->core;
						/*Retrieve latest post from the tumblr*/
						$request_url = "http://frc2590.tumblr.com/api/read?start=0";
						$xml = simplexml_load_file($request_url);
						foreach($xml->posts->post as $post){
							$title = $post->{'photo-caption'};
							$postURL = $post['url'];
							$photoURL = $post->{'photo-url'};
							echo"<div class='tumblr'>
									<a href='".$postURL."'>
										<img src='{$photoURL}'>
									</a>
								 ";
							if($title != ""){
								echo "<div id='tumblr-desc'><a class='white' href='{$postURL}'>
										".$title."
									  </a></div>";
							}
							echo"</div>";
						}
					?>
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