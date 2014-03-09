<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content" style="">		
			<div id="main-container" style="margin-right: auto; margin-left: auto; width: 386px;">
				
				<div style="display:block; border-style:none" id="resources-container" class="border">
					
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2014</b></h3>
					     <ul><?php
						     foreach($page->f2014awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>
					
					<div class="blockList" style="width:auto;height:auto">
					    <h3 id="heading" class="border"><b>2013</b></h3>
					    <ul><?php
						    foreach($page->f2013awards as $link){
							    echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						    }
					    ?></ul>
					 </div>			    
				    
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2012</b></h3>
					     <ul><?php
						     foreach($page->f2012awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>					
						
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2011</b></h3>
					     <ul><?php
						     foreach($page->f2011awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>						
						
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2010</b></h3>
					     <ul><?php
						     foreach($page->f2010awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>				
					
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2009</b></h3>
					     <ul><?php
						     foreach($page->f2009awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>
				     
					<div class="blockList" style="width:auto;height:auto">
					     <h3 id="heading" class="border"><b>2008</b></h3>
					     <ul><?php
						     foreach($page->f2008awards as $link){
							     echo "<li><a href='#' class='linkDesc'>{$link->title}<span>{$link->linkDesc}</span></a></li>";
						     }
					     ?></ul>
					 </div>
				 </div>
				    
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