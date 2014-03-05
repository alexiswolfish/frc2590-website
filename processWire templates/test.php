<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
				<div id="search-container">
				
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="ZV8KB5VFYPEQ8">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>


					<?php
					$out = '';

					if($q = $sanitizer->selectorValue($input->get->q)) {

						// Send our sanitized query 'q' variable to the whitelist where it will be
						// picked up and echoed in the search box by the head.inc file.
						$input->whitelist('q', $q); 

						// Search the title, body and sidebar fields for our query text.
						// Limit the results to 50 pages. 
						// Exclude results that use the 'admin' template. 
						$matches = $pages->find("title|body|postContent|tags|awards~=$q, limit=50, sort=-template"); 

						$count = count($matches); 

						if($count) {
							echo "<div id='heading' class='border'><h2 class='grey'>Found $count pages containing your query:</h2></div>";
							
							$people = $matches->find("template=member");
							$robots = $matches ->find("template=robot");
							$blogPosts = $matches->find("template=blogPost, sort=-date");
							$other = $matches->find("template!=member|robot|blogPost");
							
							if(count($people)){
								printLinks("people", $people);
							}
							if(count($robots)){
								printLinks("robots", $robots);
							}
							if(count($other)){
								printLinks("Misc", $other);
							}
							if(count($blogPosts)){
								echo "<div class='blockList' id='blogLinks'><h3 id='heading' class='border'><b>Blog Posts</b></h3>
									  <ul>";
								foreach($blogPosts as $post){
									echo "<li><a href='{$post->url}' class='linkDesc'>{$post->title}</a></li>";
								}
								echo "</ul></div>";
							}

						} else {
							echo "<h2>Sorry, no results were found.</h2>";
							echo "<div class='center'><img width='400' src='{$config->urls->templates}images\michael_filipek_robot.jpg'></div>";
						}
					} else {
						echo "<h3>Please enter a search term in the search box (below sidebar navigation)</h3>";
					}
					
					?>
				</div>
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			
			<form id='search_form' action='<?php echo $config->urls->root?>test/' method='get'>
				<input type='text' name='q' id='search_query' value='<?php echo htmlentities($input->whitelist('q'), ENT_QUOTES, 'UTF-8'); ?>' />
				<button type='submit' id='search_submit'>Search</button>
			</form>
			
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