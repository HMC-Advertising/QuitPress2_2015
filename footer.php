		</div>
		<?php if(!is_front_page() ):?>
			<?php get_template_part("assets/php/template", "footer-inter"); ?> 
		

		<?php else : ?>
			<?php get_template_part("assets/php/template", "footer-frontpage"); ?>
			<!-- Tag for Activity Group: IP158044: Vermont Anti-Smoking, Activity Name: Homepage~IP158044, Activity ID: 2311432 -->
			<!-- Expected URL: http://www.802quits.org/ -->

			<!--
			Activity ID: 2311432
			Activity Name: Homepage~IP158044
			Activity Group Name: IP158044: Vermont Anti-Smoking
			-->

			<!--
			Start of DoubleClick Floodlight Tag: Please do not remove
			Activity name of this tag: Homepage~IP158044
			URL of the webpage where the tag is expected to be placed: http://www.802quits.org/
			This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
			Creation Date: 04/01/2015
			-->
			<script type="text/javascript">
			var axel = Math.random() + "";
			var a = axel * 10000000000000;
			document.write('<iframe src="http://4793926.fls.doubleclick.net/activityi;src=4793926;type=ip1580;cat=homep0;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
			</script>
			<noscript>
			<iframe src="http://4793926.fls.doubleclick.net/activityi;src=4793926;type=ip1580;cat=homep0;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
			</noscript>
			<!-- End of DoubleClick Floodlight Tag: Please do not remove -->


		<?php endif; ?>

		
		
		<?php if(is_page("Free Quit Help for You and Your Baby") ):
			get_template_part("assets/php/template", "footer-baby");
		 endif; ?>

		<?php if(is_page("baby-2")):
			get_template_part("assets/php/template", "footer-baby2");

		 endif; ?>

		<?php wp_footer(); 
		if(is_front_page() ): ?>
			<script src="<?php bloginfo('template_url'); ?>/js/swipe.js"  type="text/javascript"></script>
			<script type="text/javascript">

				if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
					window.mySwipe = new Swipe(document.getElementById('slider'));
				}

			</script>

			
		<?php endif; ?>
		<?php if(is_page_template("template-real-stories-archive.php")): ?>

			<?php if(get_the_title() == "Baby"):?>
				<!-- archive baby -->
				<!-- Tag for Activity Group: IP158044: Vermont Anti-Smoking, Activity Name: Related Page Baby~IP158044, Activity ID: 2311433 -->
				<!-- Expected URL: http://802quits.org/real-stories/baby/ -->

				<!--
				Activity ID: 2311433
				Activity Name: Related Page Baby~IP158044
				Activity Group Name: IP158044: Vermont Anti-Smoking
				-->

				<!--
				Start of DoubleClick Floodlight Tag: Please do not remove
				Activity name of this tag: Related Page Baby~IP158044
				URL of the webpage where the tag is expected to be placed: http://802quits.org/real-stories/baby/
				This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
				Creation Date: 04/01/2015
				-->
				<script type="text/javascript">
					var axel = Math.random() + "";
					var a = axel * 10000000000000;
					document.write('<iframe src="http://4793926.fls.doubleclick.net/activityi;src=4793926;type=ip1580;cat=babyi0;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
				</script>
				<noscript>
					<iframe src="http://4793926.fls.doubleclick.net/activityi;src=4793926;type=ip1580;cat=babyi0;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
				</noscript>
				<!-- End of DoubleClick Floodlight Tag: Please do not remove -->
			<?php endif; ?>
		<?php endif; ?>	

		<?php if(is_page("taxonomy-stories.php")): ?>
			<script src="<?php bloginfo('template_url'); ?>/js/swipe.js"  type="text/javascript"></script>
			<script type="text/javascript">

				if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
					window.mySwipe = new Swipe(document.getElementById('slider'),{
					startSlide: <?php 
						if(get_the_title() ==  "Wellness" ):
							echo 0;
						
						else if(get_the_title() ==  "Illness" ):
							echo 1;
						
						else if(get_the_title() ==   "Baby"):
							echo 2;
						
						else if(get_the_title() ==   "Family"):
							echo 3;
						
						else if(get_the_title() ==   "Loss"):
							echo 4;
						
						else:
							echo 5;
						endif; ?>
					});
				}

			</script>
		<?php endif; ?>	

	</body>
</html>