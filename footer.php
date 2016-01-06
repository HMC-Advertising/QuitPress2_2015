
		<?php if(is_front_page()):

			 get_template_part("assets/php/templates/footer", "frontpage");
			 ?>
			 </div>
			 <?php  
			 get_template_part("assets/php/templates/footer", "copyright"); 
		elseif(is_page('abtesting') ):
			 get_template_part("assets/php/templates/footer", "copyright"); 
		
		else:
			
			get_template_part("assets/php/templates/footer","inter"); 
		endif; ?>

	
		
		
		<?php /* if(is_page("Free Quit Help for You and Your Baby") ):
			get_template_part("assets/php/templates/footer-baby");
		 endif; 

		 if(is_page("baby-2")):
			get_template_part("assets/php/templates/footer-baby2");
		endif; 


		 if(is_page_template("template-real-stories-archive.php")): 
			if(get_the_title() == "Baby"):
				get_template_part("assets/php/templates/footer-baby3");
			 endif; 
		 endif; */ ?>	

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/script/plugin/swipe.js"></script>

		<?php wp_footer(); ?>
		

		<?php if(is_front_page() or is_page('abtesting')): ?>
			<?php if(is_mobile()): ?>
			<script type="text/javascript">
				window.mySwipe = new Swipe(document.getElementById('slider'));
			</script>

			
		<?php endif; ?>
		<?php endif; ?>
		

		<?php if(is_page("taxonomy-stories.php") or is_page_template('page-story.php')): ?>
			<?php if(is_mobile()): ?>
			<script type="text/javascript">

				
					window.mySwipe = new Swipe(document.getElementById('slider'),{
					startSlide: <?php 
						if(get_the_title() ==  "Wellness" ):
							echo 0;
						
						elseif(get_the_title() ==  "Illness" ):
							echo 1;
						
						elseif(get_the_title() ==   "Baby"):
							echo 2;
						
						elseif(get_the_title() ==   "Family"):
							echo 3;
						
						elseif(get_the_title() ==   "Loss"):
							echo 4;
						
						else:
							echo 5;
						endif; ?>
					});
				

			</script>
		<?php endif; ?>	
		<?php endif; ?>	
	</body>
</html>