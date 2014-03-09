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
		echo "<a class='grey' href='http://frc2590.org/members/team-pages/build-team/'>Build Team</a>";
		$mult = true;
	}
	if($page->Finance_Team){
		if($mult){ echo $spacer;}
		echo "<a class='grey' href='http://frc2590.org/members/team-pages/finance-team/'>Finance Team</a>";
		$mult = true;
	}
	if($page->Marketing_Team){
		if($mult){ echo $spacer;}
		echo "<a class='grey' href='http://frc2590.org/members/team-pages/marketing-team/'>Marketing Team</a>";
		$mult = true;
	}
	if($page->Software_Team){
		if($mult){echo $spacer;}
		echo "<a class='grey' href='http://frc2590.org/members/team-pages/software-team/'>Sotware Team</a>";
		$mult =true;
	}
	if($page->Web_Team){
		if($mult){echo $spacer;}
		echo "<a class='grey' href='http://frc2590.org/members/team-pages/web-team/'>Web Team</a>";
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
		echo "<li><a target='_blank' href='https://twitter.com/FRC2590'><img src='{$root}images/icons/twitter.png'></li></a>";
		echo "<li><a target='_blank' href='http://frc2590.tumblr.com/'><img src='{$root}images/icons/tumblr.png'></li></a>";
		echo "<li><a target='_blank' href='http://instagram.com/nemesis2590'><img src='{$root}images/icons/instagram.png'></li></a>";
		echo "<li><a target='_blank' href='http://www.youtube.com/user/FRC2590'><img src='{$root}images/icons/youtube.png'></li></a>";
		echo "<li><a target='_blank' href='https://www.facebook.com/frc2590'><img src='{$root}images/icons/facebook.png'></li></a>";
		echo "<li><a target='_blank' href='http://www.flickr.com/photos/frc2590/sets/'><img src='{$root}images/icons/flickr.png'></li></a>";
		echo "</ul></div>";
  }
  
  /* Return Flickr Method
   *
   * args : Flickr Method to query
   * returns: horrible Flickr unserialized object
   */
   function flickrArgs($params){

		$encoded_params = array();

		foreach ($params as $k => $v){
			$encoded_params[] = urlencode($k).'='.urlencode($v);
		}
	
		/*Query the API and decode*/
		$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
		$rsp = file_get_contents($url);
		$final = unserialize($rsp);
		return $final;
   }
  /* Embed latest youtube video
   *
   * args : chanel name
   */
   function latestYoutube ($channel) {
		// http://gdata.youtube.com/feeds/api/videos?max-results=1&orderby=published&author=frc2590
        $feedURL = 'http://gdata.youtube.com/feeds/api/users/' . $channel . '/uploads?max-results=1';
        $sxml = simplexml_load_file($feedURL);
		$media = $sxml->entry->children('media', true);
		$url = (string)$media->group->player->attributes()->url;
		
		//http://www.youtube.com/watch?v=ORLg1u8D2D0&feature=youtube_gdata_player
		$index = strrpos($url, "&");
        $url = substr($url, 0, $index);
        $index = strrpos($url, "watch");
        $url = substr($url, 0, $index) . "v/" . substr($url, $index + 8, strlen($url) - ($index + 8));
		
		echo "<iframe width='480' height='360' src='{$url}' frameborder='0' allowfullscreen></iframe>";
}
?>