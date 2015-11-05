		</div>
		<?php if(!is_front_page() ):
			 get_template_part("assets/php/template", "footer-inter"); 
		else : 
			get_template_part("assets/php/template", "footer-frontpage"); 
		endif; ?>

		
		
		<?php if(is_page("Free Quit Help for You and Your Baby") ):
			get_template_part("assets/php/template", "footer-baby");
		 endif; ?>



		<?php if(is_page("baby-2")):
			get_template_part("assets/php/template", "footer-baby2");
		endif; ?>


		<?php if(is_page_template("template-real-stories-archive.php")): 
			if(get_the_title() == "Baby"):
				get_template_part("assets/php/template", "footer-baby3");
			 endif; 
		 endif; ?>	

		<?php wp_footer(); ?>
		

		<?php if(is_front_page() ): ?>
			<script type="text/javascript">

				if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
					window.mySwipe = new Swipe(document.getElementById('slider'));
				}

			</script>

			
		<?php endif; ?>
		

		<?php if(is_page("taxonomy-stories.php")): ?>
			
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