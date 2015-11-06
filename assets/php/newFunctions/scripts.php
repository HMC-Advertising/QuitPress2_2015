<?php
function theme_scripts() {

	//styles------------------------------------------------------------------
	wp_register_style( 'fontawesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, false );
	wp_register_style( 'raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,700', false, false );
	wp_deregister_style( 'style-css' );
    wp_register_style( 'style-css', get_stylesheet_uri() );
	
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'raleway' );
	wp_enqueue_style( 'style-css' );

	//scripts------------------------------------------------------------------
	//header
	
	 wp_enqueue_script("jquery");

	

	//in the footer
	wp_register_script( 'name 2', 'url2', false, false, true );
	wp_register_script( 'frontpage',get_template_directory_uri(). '/assets/script/frontpagejs.js', false, false, true );
	wp_register_script( 'swipe', get_template_directory_uri(). '/assets/script/swipe.js', false, false, true );
	wp_register_script( 'cookie', get_template_directory_uri(). '/assets/script/scripts-ck.js', false, false, true );
	wp_register_script( 'inter', get_template_directory_uri(). '/assets/script/cust.js', false, false, true );
	wp_register_script( 'bootstrap', get_template_directory_uri(). '/assets/script/plugin/bootstrap/bootstrap.min.js', false, false, true );
	



	//fontpage
	if(is_front_page()):
		wp_enqueue_script( 'bootstrap' );
		wp_enqueue_script( 'frontpage' );
		wp_enqueue_script( 'swipe' );
		wp_enqueue_script( 'cookie' );
	endif;	
	

	//interiour page
	if(!is_front_page()):
		wp_enqueue_script( 'inter' );
	endif;

	//tax-stories
	if(is_page("taxonomy-stories.php")): 
		wp_enqueue_script( 'swipe' );
	endif;

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );



?>

