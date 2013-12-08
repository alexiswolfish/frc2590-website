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
 /* Print Team
  *
  * args : pointer to MEMBER object/page
  * output: prints formatted Team names directly to page
  */
 function printTeam($page, $pages){
	$spacer = '<div class=\'red\'> | </div>';
	$mult = false;
	if($page->Build_Team){
		$build = $pages->get("title=Build Team");
		echo "<a class='grey' href='{$build->url}'>Build Team</a>";
		
		$mult = true;
	}
	if($page->Finance_Team){
		if($mult){ echo $spacer;}
		$finance = $pages->get("title=Finance Team");
		echo "<a class='grey' href='{$finance->url}'>Finance Team</a>";
		$mult = true;
	}
	if($page->Marketing_Team){
		if($mult){ echo $spacer;}
		$team= $pages->get("title=Marketing Team");
		echo "<a class='grey' href='{$team->url}'>Marketing Team</a>";
		$mult = true;
	}
	if($page->Software_Team){
		if($mult){echo $spacer;}
		$team= $pages->get("title=Software Team");
		echo "<a class='grey' href='{$team->url}'>Software Team</a>";
		$mult =true;
	}
	if($page->Web_Team){
		if($mult){echo $spacer;}
		$team= $pages->get("title=Web Team");
		echo "<a class='grey' href='{$team->url}'>Web Team</a>";
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
  }
?>