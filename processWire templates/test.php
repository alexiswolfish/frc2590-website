<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id="media-container">
				<h2 id='heading' class='border'><a href='http://www.flickr.com/photos/frc2590/sets/'><b>Latest Flickr Galleries</b></a></h2>
				<?php
					/*n-1 because hurr durr*/
					$numPhotosets = 2;
					
					/*Build proprietary Flickr url to query the method*/
					$params = array(
						'api_key'	=> 'b87dfb1bfd8a349af52b77153106f614',
						'method'	=> 'flickr.photosets.getList',
						'user_id'	=> '58345704@N03',
						'format'	=> 'php_serial',
					);
					$photosets = flickrArgs($params);
					
					/*Examine lists of Photosets*/
					if ($photosets['stat'] == 'ok'){
						echo "<ul>";
						for ($i = 0; $i <= $numPhotosets; $i++){
							echo "<li class='flickrSet'>";
							$curSet = $photosets['photosets']['photoset'][$i];
							$curArgs = array(
								'api_key'	=> 'b87dfb1bfd8a349af52b77153106f614',
								'method'	=> 'flickr.photosets.getPhotos',
								'user_id'	=> '58345704@N03',
								'photoset_id'	=> $curSet['id'],
								'per_page ' => '3',
								'format'	=> 'php_serial',
							);
							$photos = flickrArgs($curArgs);
							if($photos['stat'] !== 'ok'){
								echo "<i>error retrieving list of photos</i></br>";
							}
							$photo = $photos['photoset']['photo']['0'];
							
							/*horrible flickr url Creation to display first image in set*/
							echo "<a target='_blank' href='http://www.flickr.com/photos/frc2590/sets/{$curSet['id']}'>
								  <div id='blogImg-container' name='featuredImage'>"."https://farm{$photo['farm']}.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_n.jpg"."</div>
								";
							//	<img src='https://farm{$photo['farm']}.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_n.jpg' alt='{$photo['title']}'>
							/*
							//Clearner but *slower* flickr URL creation*
							$sizeArgs = array(
								'api_key'	=> 'b87dfb1bfd8a349af52b77153106f614',
								'method'	=> 'flickr.photos.getSizes',
								'photo_id'	=> $curPhoto['id'],
								'format'	=> 'php_serial',
							);
							
							$photo = flickrArgs($sizeArgs);
							if($photo['stat'] !== 'ok'){
								echo "<i>error retrieving first photo {$curPhoto['id']}</i></br>";
							}
							echo "<img src='{$photo['sizes']['size']['1']['source']}'>";
							*/
							/*display some additional informatino about the photoset*/
							echo "<div id='fields'>
								    <a href='$post->url'><h3>{$curSet['title']['_content']}</h3></a>
									<div class='grey'>{$curSet['photos']} Photos</div>
								  </div>";
							echo"</a></li>";
						}
						echo "</ul>";
					}
					
				?>
			</div><!--media-container-->
		</div><!--content-->
		<script>
			cssBackground("featuredImage");
		</script>
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>