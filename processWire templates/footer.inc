	<footer id="foot" class="container">
	<div id="stripe"></div>
	<section>&reg;2014 FRC 2590 | Nemesis</br>Robbinsville High School</br>Robbinsville NJ</br><a href="mailto:frc2590@gmail.com?Subject=Hello%20Nemesis" target="_top">
Contact Us</a></section>
	<section>Team FRC2590 Nemesis would not be possible without the <a href="<?php echo $config->urls->root; ?>sponsors">generous donations of our top sponsors.</a> Thank you for helping us give students an outlet for their interest in engineering, math and science.</section>
	<?php
		$sponsors = $pages->find("template=sponsor, sort=-donation, limit=3");
		foreach($sponsors as $sponsor){
			echo "<section><div id='sponsor-logo' name='sponsor-logo'>";
			echo $sponsor->profile->url;
			echo "</div></section>";
		}
	?>
	<script>
		cssBackground('sponsor-logo');
	</script>
	
	</footer>
	
	<script type="text/javascript">
	//Scroll to Top script
		$("[id*='Btn']").stop(true).on('click',function(e){e.preventDefault();$(this).scrolld();});

		//scrolldEasing = 'easeInOutCirc';
	</script> 
	
	</body>
</html>