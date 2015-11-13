<!doctype html>
<html>
	<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
	<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php 
			if(is_front_page()) {
				echo "802Quits | The Vermont Quit Smoking Resource"; 
			} 
			else { 
				echo " 802Quits | The Vermont Quit Smoking Resource | "; 
				wp_title('');
			}
				?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="alternate" href="http://example.com" hreflang="en-us" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"> 
		
		

		<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/assets/script/plugin/lib/ie-ck.js"></script>
		<![endif]-->
		
		<?php wp_head(); ?>
		
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">
			stLight.options({publisher: "5442e064-c3d3-40b2-80b9-889739c8e226", doNotHash: false, doNotCopy: false, hashAddressBar: false});
		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-2131533-53']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();


			/**
			* Function that tracks a click on an outbound link in Google Analytics.
			* This function takes a valid URL string as an argument, and uses that URL string
			* as the event label.
			*/
			var trackOutboundLink = function(url) {
			ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
			 function () {
			 document.location = url;
			 }
			});
			}
		</script> 
		<?php
		//these calulator files will be gone once the calulator plugin is finished
		 if(is_page_template("temp_cal.php") or is_page_template("temp_report.php")): ?>


		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/cal/styles/aristo/jquery-ui-1.8.7.custom.css">
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/cal/scripts/autoNumeric-1.6.2.js"></script>
		


<?php endif; ?>
<?php if(is_page_template("temp_cal.php") ):?>
	<!--[if !IE]><!-->
        	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/cal/styles/main.css">
        	

 		<!--<![endif]-->
		<!--[if lt IE 9]>
       		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/cal/styles/main-ie.css" />
		<![endif]-->
		
<?php endif; ?>

<?php if(is_page_template("temp_report.php")):?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/cal/styles/report.css">
		<!--[if lt IE 9]>
       		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/cal/styles/report-ie.css" />
		<![endif]-->
<?php endif; ?>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="main-container" class="row">
			<div id="header-wrap" class="container">
				<header id="header" class="header col-lg-12" role="banner">
					
					<?php if(is_front_page()) : ?>
						<h1 class="logo">
					<?php else: ?>
						<div class="logo">
					<?php endif; ?>
						<a href="<?php echo get_option('home'); ?>">
							<img src="<?php bloginfo('template_url'); ?>/assets/img/logo.jpg" alt="<?php bloginfo('name'); ?>">
						</a>
						<span class="logo-tagline">You Can Quit.<br />We Can Help.</span>
					
					<?php if(is_front_page()) : ?>
						</h1>
					<?php else : ?>
						</div>
					<?php endif; ?>
					<button id="nav-main-open" aria-hidden="true">Menu</button>
					<div class="header-nav-wrap">
						<?php get_search_form(); ?>
						<?php
							if(function_exists( 'ot_get_option' )) :
								$facebook_link = ot_get_option('facebook_link');
								$youtube_link = ot_get_option('youtube_link');
								$sharethis_link = ot_get_option('sharethis_link');
								if($facebook_link || $youtube_link):
						?>
									<ul class="nav-social">
										<?php if($facebook_link): ?>
											<li>
												<a href="<?php echo $facebook_link; ?>" target="_blank">facebook</a>
											</li>
										<?php endif; ?>
										<?php if($youtube_link):?>
											<li>
												<a href="<?php echo $youtube_link; ?>" target="_blank"></a>
											</li>
										<?php endif; ?>
										<li>
											<span class='st_sharethis_large' displayText='ShareThis'></span>
										</li>
									</ul>
							<?php endif; 
						endif; ?>
						<?php
						wp_nav_menu( array(
							'container' => false,
							'theme_location' => 'Main Navigation',
							'menu' => 'Main Navigation',
							'menu_class' => 'nav-main nav-mobile no-divider'
						)); ?>
						<nav class="nav-main">
							<?php wp_nav_menu( array(
								'container' => false,
								'theme_location' => 'Supporting Navigation',
								'menu' => 'Supporting Navigation'
							) ); ?>
						</nav>
						<ul class="nav-main nav-mobile">
							<li><a href="<?php echo home_url(); ?>/for-providers">For Providers</a></li>
						</ul>
					</div>
				</header>
			</div>