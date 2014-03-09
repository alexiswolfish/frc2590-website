<?php/*
	Sidebar -- include Resources/community?
*/?>

			<img src="<?php echo $config->urls->templates?>images/div1.jpg">
			<nav>
				<ul>
					<li><a href="<?php echo $config->urls->root; ?>members/">Team</a></li>
						<?php
							if($page->template == 'members' || $page->template == 'team'){
								$r = $pages->get("title=Team Pages");
								echo "<ul class='subNav'>";
								foreach($r->children as $child){
									echo "<li><a href='{$child->url}'>{$child->title}</a> ";
								}
								echo "</ul>";
							}
						?>
					<li><a href="<?php echo $config->urls->root; ?>robots/">Robots</a></li>   
					<li><a href="<?php echo $config->urls->root; ?>blog/">Blog</a></li> 
					<li><a href="<?php echo $config->urls->root; ?>resources/">Resources + Media</a></li>
					<li><a href="<?php echo $config->urls->root; ?>awards/">Awards</a></li>	
					<li><a href="<?php echo $config->urls->root; ?>calendar/">Calendar</a></li> 
					<li><a href="<?php echo $config->urls->root; ?>sponsors/">Sponsors</a></li> 
					
				</ul>
			</nav>
			
			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			
			<form id='search_form' action='<?php echo $config->urls->root?>search/' method='get'>
				<input type='text' name='q' id='search_query' value='<?php echo htmlentities($input->whitelist('q'), ENT_QUOTES, 'UTF-8'); ?>' />
				<button type='submit' id='search_submit'>Search</button>
			</form>
			
			<section>
				<p>FRC Team 2590, Nemesis, is an award winning <a href="<?php echo $config->urls->root; ?>first/">FIRST Robotics</a> team and non-profit based out of Robbinsville High School, NJ.
				</p>
				<p>Founded in 2008, the students in Nemesis routinely solve challenges in business, computer science, engineering, and math.
				</p>
			</section>