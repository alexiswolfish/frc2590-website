<?php
/*
	Blog Post Template
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">	
			<div id ="author">
				<div id ="profile"></div>
					<script>
						document.getElementById("profile").style.backgroundImage = "url('images/blog/peterwolfe.jpg')";
					</script>
				<div id ="name" class="red">Peter Wolfe</div>
				<div id ="status" class="grey">Mentor</div>
				<div id ="team" class="grey">Build Team</div>
				<?php 
					// If the page is editable, then output a link that takes us straight to the page edit screen:
					if($page->editable()) {
						echo "<a class='red' href='{$config->urls->admin}page/edit/?id={$page->id}'>Edit</a>"; 
					}
				?>
			</div><!--author-->
			<div id ="post">
				<div id ="post-header">
					<div id ="details" class="grey">
						tag // tag // tag // <?php echo $page->date ?>
					</div>
					<div id ="title">
						<h1 class="red"><?php echo $page->title ?></h1>
					</div>
				</div>
				<div id ="post-content">
					<?php echo $page->postContent?>
				</div>
			</div><!--post-->
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