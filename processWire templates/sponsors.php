<?php
/*
	Sponsor Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="sponsors-container">
				
				<div id="supportSide">
					<div id="supportImg"><img src="<?php echo $config->urls->templates; ?>images/support.png"></div>
					<div id="support"><?php 
						echo "<h2>".$page->byLine."</h2>";
						echo $page->postContent; 
						?></div>
				</div>
				<div id="feat"><img src="<?php echo $page->featuredImage->url?>"></div>
				
				<div id="post-header"><h2 class="red"><div id="members"> Diamond Sponsors </div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=10000, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
						if(sizeof($sponsors) < 1){
							echo "<i>it looks like we don't have any Diamond sponsors yet. Become one today and inhabit this glorious space by donating!</i>";
						}
					?>
				<div id="post-header"><h2 class="red"><div id="members"> Platinum Sponsors</div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=5000, donation<10000, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="red"><div id="members"> Gold Sponsors</div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=3000, donation<5000, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="red"><div id="members"> Silver Sponsors</div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=1000, donation<3000, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="red"><div id="members"> Bronze Sponsor</div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=500, donation<1000, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="red"><div id="members"> Honored Donor</div></h2></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>0, donation<500, sort=donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
							
						}
					if(sizeof($sponsors) < 1){
							echo "<i>it looks like we don't have any Honored sponsors yet. Gain this honorable title by donating today!</i>";
						}
					?>
			</div>
		</div><!--content-->
		
		<script>
			cssBackground("profile");
		</script>

		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			<p>FRC Team 2590, Nemesis, is an award winning FIRST Robotics team 
			based out of Robbinsville High School in New Jersey.</p>
			<p>Founded in 2008, the students in Nemesis routinely solve challenges
			in business, computer science, engineering, and math.</p>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>