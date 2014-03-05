<?php
/*
	Individual Sponsor Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="sponsors-container">
				<div id="sponsor">
					<div id="sponsor-logo" name="logo">
						<script>
							var logo = document.getElementById("sponsor-logo");
							logo.style.backgroundImage = "url('<?php echo $page->profile->url?>')";
							
							if(<?php echo $page->profile->width?> > 314){
								logo.style.backgroundSize = 'contain';
								}
						</script>
					</div>
					<div id="fields">
						<div id="name" class="red">
							<?php echo $page->title ?>
						</div>
						<div id="website">
							<a class="grey" target='_blank' href="<?php echo $page->website ?>" >visit their website</a>
						</div>
					</div>
				</div>
				<div id="bio">
					<?php echo $page->postContent; ?>
					
					<div id="sponsor-robot-container" class="border">
						<h3> Robots <?php echo $page->title; ?> has helped build </h3>
						
						<?php
							foreach( $page->robots as $robot){
								echo "<div class='sponsor-robot'>";
								echo "<a href='".$robot->url."'>";
								echo "<div id='profile' name='profile'>".$robot->profile->url."</div>";
								echo "<div id='fields'><h3>".$robot->title."</h3>";
								echo $robot->year;
								echo "</a></div></div>";
							}
						?>
					
					</div>
				</div>

				
			</div><!--sponsors-container-->
		</div><!--content-->
		<script>
			cssBackground('profile');
		</script>
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>
			
		</aside> <!-- sidebar -->
	

	</div> <!--container-->
<?php
include("./footer.inc");
?>