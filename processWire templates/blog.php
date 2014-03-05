<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="blog-container">
				<div id="bar"><h3 class="white">Featured Posts</h3></div>
				<?php 
				/*find the latest two featured post to display on top*/
				$featuredPosts = $pages->find("parent=/blog/, featured=1, limit=2, sort=-date");
				$spacer =0;
				foreach($featuredPosts as $post){
					echo "<div class='featured' ";
					if($spacer%2 ==0){echo "id='spacer'";}
					echo "><a href='$post->url'><div id='blogImg-container' name='featuredImage'>".($post->featuredImage->url)."</div>";
					echo "<div id='fields'><h3>$post->title</h3>";
					echo "<div class='grey'><a class='grey' href='".($post->author->url)."'>".($post->author->title)."</a></div>";
					echo "<p>".($post->postContent)."</p></a></div></div>";
					$spacer++;
				}
				/*find the latest four non featured posts to display*/
				$normalPosts = $pages->find("parent=/blog/, featured=0, limit=4, sort=-date");
				foreach($normalPosts as $post){
					echo "<div class='mostRecent'><a href='$post->url'><div id='profile' name='proPic'>".($post->author->profile->url)."</div>";
					echo "<div id='fields'><h3>";
					echo ($post->title)."</h3><p>".($post->postContent)."</p></div></a></div>";
				}
				
				/*Find Archive posts*/
				echo "<div id='bar'><h3 class='white'>Archive</h3></div>";
				
				$archive = $pages->find("parent=/blog/, sort=-date" );
				
				$fCount = 0;
				$rCount = 0;
				foreach($archive as $post){
					if( ($post->featured == 1)){
						$fCount++;
						if($fCount > 2){
							echoArchive($post);
						}
					}
					else{
						$rCount++;
						if($rCount > 4){
							echoArchive($post);
						}
					}
				}
				
				function echoArchive($post){
					/* Print out the proper html to display an archive post*/
					echo "<div class='archive'><a href='".($post->url)."'><div id='blogImg-container' name='featuredImage'>".($post->featuredImage->url)."</div>";
					echo "<div id='postContent'><div id='title'><h3>".$post->title."</h3></div></br>";
					echo "<div class='grey'><a class='grey' href='".($post->author->url)."'>".($post->author->title)."</a></div></a>";
					echo "<p>".($post->postContent)."</p></div></a>";
					echo "<div id='profile' name='proPic'>".($post->author->profile->url)."</div></div>";
				}
				?>
				<!--replace image url with bgImage CSS attributes-->
				

				
				<script>
					cssBackground("featuredImage");
					cssBackground("proPic");
				</script>
			</div><!--blog-container-->
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>