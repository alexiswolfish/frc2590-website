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
		echo "Software Team";
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
  }
?>