	<footer id="foot" class="container">
	<div id="stripe"></div>
	<section class="large-footer">&reg;2014 <br>FRC 2590 | Nemesis</br>Robbinsville High School</br>Robbinsville NJ</br><a href="mailto:frc2590@gmail.com?Subject=Hello%20Nemesis" target="_top">
Contact Us</a>
	<?php printSMIcons($config->urls->templates); ?></section>
	
	<section id="first-footer">
		<div><img src='/site/assets/files/1399/ucfirst-logo.png'/></div>
	</section>
	<section class="large-footer">Team FRC2590 Nemesis would not be possible without the <a href="<?php echo $config->urls->root; ?>sponsors">generous donations of our top sponsors.</a> Thank you for helping us give students an outlet for their interest in engineering, math and science.</section>
	<?php
		$sponsors = $pages->find("template=sponsor, sort=-donation, limit=3");
		foreach($sponsors as $sponsor){
			echo "<section style='margin:20px 0 10px 10px;width:151px;'><div id='sponsor-logo' name='sponsor-logo'>";
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
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-47483442-1', 'frc2590.org');
		ga('send', 'pageview');
        </script>
	</body>
</html>