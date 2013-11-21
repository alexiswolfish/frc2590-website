<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">
			<div id ="member-container">
				<div id ="member">
					<div id ="profile"></div>
						<script>
							document.getElementById("profile").style.backgroundImage = "url('<?php echo $page->profile->url?>')";
						</script>
					<div id ="fields">
						<div id ="name" class="red"><?php echo $page->title?></div>
						<div id ="status" class="grey">
							<?php
								//output Member or Student info
								if($page->mentor){ echo "Mentor"; }
								else{ echo "Class of $page->class";}
							?>
						</div>
						<div id ="team" class="grey">
							<?php
								//Output Teams or Multiple Teams
								printTeam($page);
							?>
						</div>
							<?php 
							if($page->mentor){ 
								echo"<div id ='profession' class='grey'>$page->job</div>";
								}
							if($page->college){
								echo"<div id='profession' class='grey'>$page->college</div>";
							}
							?>
							<?php 
					// If the page is editable, then output a link that takes us straight to the page edit screen:
					if($page->editable()) {
						echo "<a class='red' href='{$config->urls->admin}page/edit/?id={$page->id}'>Edit</a>"; 
					}
				?>
					</div>
				</div>
				<div id ="bio">
					<?php echo $page->postContent?>
				</div>
			</div><!--member-container-->
			<div id ="recentPosts">
				<div id="blog-side">
				<h3>Recent Posts</h3>
					<ul>
						<?php
						/*Search blog for authored posts*/
						$rPosts = $pages->find("parent=/Blog/, author=$page, limit=5, sort=date");
						foreach( $rPosts as $post){
							echo "<li><a class='grey' href=\"$post->url\"> $post->title </a></li></br>";
						}
						if( sizeof($rPosts) < 1 ){
							echo "<li><i class='grey'> $page->firstName has not made any posts yet</i></li>";
						}
						?>
					</ul>
				</div>
				<div id="blog-side">
					<h3>Mentions</h3>
					<!-- Search Blog Post Tags for name-->
					<?php
						$selector = "parent=/blog/, limit=10, tags*=".$page->lastName;
						$matches = $pages->find($selector);
						echo "<ul>";
						foreach($matches as $match){
							echo "<li><a class='grey' href='".$match->url."'>".$match->title."</a></li>";
						}
						if(sizeof($matches) < 1){
							echo "<li><i class='grey'> $page->firstName has not been mentioned in any posts yet</i></li>";
						}
						echo "</ul>";

					?>
				</div>
			</div>
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>