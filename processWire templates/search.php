<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
				<div id="search-container">
					<?php
					$out = '';

					if($q = $sanitizer->selectorValue($input->get->q)) {

						// Send our sanitized query 'q' variable to the whitelist where it will be
						// picked up and echoed in the search box by the sidebar.inc file.
						$input->whitelist('q', $q); 

						// Right now I'm only searching templates that use title, postContent, and tags
						
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
			
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>