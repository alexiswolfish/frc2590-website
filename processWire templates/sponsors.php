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
					<div id="supportImg">
					
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="ZV8KB5VFYPEQ8">
						<input type="image" src="<?php echo $config->urls->templates; ?>images/support.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>

				</div>
					<div id="support"><?php 
						echo "<h2>".$page->byLine."</h2>";
						echo $page->postContent; 
						?>
						<div class="red">Donate via Paypal by pressing the button to the left.</div>
						</br></br>
					</div>
				</div>
				<div id="feat"><img src="<?php echo $page->featuredImage->url?>"></div>
				
				<div id="post-header"><h2 class="grey"><div id="members"> Diamond Sponsors </div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=10000, sort=-doonation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
						if(sizeof($sponsors) < 1){
							echo "<i>it looks like we don't have any Diamond sponsors yet. Become one today and inhabit this glorious space by donating!</i>";
						}
					?>
				<div id="post-header"><h2 class="grey"><div id="members"> Platinum Sponsors</div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=5000, donation<10000, sort=-donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="grey"><div id="members"> Gold Sponsors</div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=3000, donation<5000, sort=-donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="grey"><div id="members"> Silver Sponsors</div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=1000, donation<3000, sort=-donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="grey"><div id="members"> Bronze Sponsor</div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>=500, donation<1000, sort=-donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);
						}
					?>
				<div id="post-header"><h2 class="grey"><div id="members"> Past Sponsors </div></h1></div>
					<?php
						$sponsors = $pages->find("template=sponsor, donation>0, donation<500, sort=-donation");
						foreach($sponsors as $sponsor){
							displaySponsor($sponsor);	
						}
					?>
			</div>
		</div><!--content-->

		<script>
			cssSponsorBackground("profile", "sponsor-logo");
		</script>

		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>