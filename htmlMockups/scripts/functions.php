<?php
/*functions.php
 *
 * Use this space to store PHP function used across the entire site
 */
 
 /* Print Status
  *
  * Print the "status" of a current team member, be it 
  * Mentor, or year of Graduation from Robbinsville
  */
 function printStatus($member){
		if($member->mentor){
		echo "Mentor";
	}
	else{
		echo "Class of ".($member->class);
	}
 }
 
 /* Print Links
  *
  * Print out a block of links
  */
  function printLinks($title, $pages){
	echo "<div class='blockList'>
			<h3 id='heading' class='border'><b>{$title}</b></h3>
			<ul>";
	foreach($pages as $page){
		echo "<li><a href='{$page->url}' class='linkDesc'>{$page->title}</a></li>";
	}
	echo "</ul></div>";
  }
 /* Print Team
  *
  * args : pointer to MEMBER object/page
  * output: prints formatted Team names directly to page
  */
 function printTeam($page){
	$spacer = '<div class=\'red\'> | </div>';
	$mult = false;
	if($page->Build_Team){
		echo "Build Team";
		$mult = true;
	}
	if($page->Finance_Team){
		if($mult){ echo $spacer;}
		echo "Finance Team";
		$mult = true;
	}
	if($page->Marketing_Team){
		if($mult){ echo $spacer;}
		echo "Marketing Team";
		$mult = true;
	}
	if($page->Software_Team){
		if($mult){echo $spacer;}
		echo "Sotware Team";
		$mult =true;
	}
	if($page->Web_Team){
		if($mult){echo $spacer;}
		echo "<div class='red'>Web Team</div>";
	}
 }
 /* Print Sponsor
  *
  * args : pointer to Sponsor Page object
  */
  
  function displaySponsor($page){
	echo "<div class = 'sponsor'>
				<a href='".$page->url."'>
				<div id ='sponsor-logo' name='profile'>";
	echo $page->profile->url;
	echo "</div>
				<div id ='fields'>
					<h3>".$page->title."</h3>
				</div>";
	echo "</a></div>";
	
	if($page->profile->width > 314){
		echo "<script>
		var logo = document.getElementById('sponsor-logo');
		logo.style.backgroundSize = 'contain';
		</script>";
	}
  }
  
 /* Print Social Media Icons
  *
  * horrible function that pastes the html for social media icons
  * have to figure out a way to link this to the "Media Links" on the Resources page
  */
  function printSMIcons($root){
		echo "	<div id='icons'><ul>";
		echo "<li><a href='https://twitter.com/FRC2590'><img src='{$root}images/icons/twitter.png'></li></a>";
		echo "<li><a href='http://frc2590.tumblr.com/'><img src='{$root}images/icons/tumblr.png'></li></a>";
		echo "<li><a href='http://instagram.com/nemesis2590'><img src='{$root}images/icons/instagram.png'></li></a>";
		echo "<li><a href='http://www.youtube.com/user/FRC2590'><img src='{$root}images/icons/youtube.png'></li></a>";
		echo "<li><a href='https://www.facebook.com/frc2590'><img src='{$root}images/icons/facebook.png'></li></a>";
		echo "<li><a href='http://www.flickr.com/photos/frc2590/sets/'><img src='{$root}images/icons/flickr.png'></li></a>";
		echo "</ul></div>";
  }
  
?>