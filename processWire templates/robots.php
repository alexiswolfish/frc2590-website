<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">
			<div id="robots-container">
				<div id="bar"><h3 class="white">Our Robots</h3></div>
				<?php /* Find Robots and display them*/
					$robots = $pages->find("template=robot, sort=-year");
					for($i=0; $i<sizeof($robots); $i++){
						/*Set up spacing and grid format*/
						if($i==0){
							echo "<div class='robot-large' id='spacer'>";
							}
						else if($i==1){
							echo "<div class='robot-large'>";
						}
						else if( ($i-2)%3 != 2){
							echo "<div class='robot-small' id='spacer'>";
						}
						else{
							echo "<div class='robot-small'>";
						}
						echo "<a href='".$robots[$i]->url."'>";
						echo "<div id='robotImg' name='profile'>".$robots[$i]->profile->url."</div>";
						echo "	<div id='robot-header'>";
						echo "		<div id='title'><h1 class='red'>".$robots[$i]->title."</h1></div>";
						echo "		<div id='year'><h1 class='red'>".$robots[$i]->year."</h1></div>";
						echo "	</div></a>";
						echo "<div id='about'>".$robots[$i]->postContent."</div>";
						echo "<div class='readMore'><a href='".$robots[$i]->url."'>...Continue Reading</a></div>";
						echo "<div id='stats-container'>
								<div id='stats'>";
						echo "		<table border='0'>";
						echo "			<tr><th>Record</th><td>".$robots[$i]->record."</td></tr>";
						echo "			<tr><th>Drive Team</th><td>";
						
							for($j=0; $j < sizeof($robots[$i]->driveTeam); $j++){
									$driver = $robots[$i]->driveTeam[$j];
									echo "<a href='".$driver->url."'>".$driver->title."</a>";
									if($j < sizeof($robots[$i]->driveTeam)-1){
										echo ", ";
									}
								}
								
						echo "			</td></tr>
									</table>";
						echo"	</div>
							 </div>";
						echo "</div><!--robot-->";
					}
				?>
			</div><!--robot-container-->
		</div><!--content-->
	
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			</section>
			
		</aside> <!-- sidebar -->
		
		<script>
			cssBackground("profile");
		</script>
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>