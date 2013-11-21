<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="sponsors-container">
				<div id="sponsor">
					<div id="sponsor-logo" name="logo">
						<script>
							document.getElementById("sponsor-logo").style.backgroundImage = "url('<?php echo $page->profile->url?>')";
						</script>
					</div>
					<div id="fields">
						<div id="name" class="red">
							<?php echo $page->title ?>
						</div>
						<div id="website">
							<a class="grey" href="<?php echo $page->website ?>">visit their website</a>
						</div>
					</div>
				</div>
				<div id="bio">
					<?php echo $page->postContent ?>
				</div>
			</div><!--sponsors-container-->
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