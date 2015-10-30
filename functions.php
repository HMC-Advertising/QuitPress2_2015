<?php
	
	include_once("assets/php/all.php");

	function namespace_add_custom_types( $query ) {
		if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		    $query->set( 'post_type', array(
		    	'post', 'tip', 'nav_menu_item', 'stories'
			));
			return $query;
		}
	}

	add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

	add_action('init', 'cptui_register_my_cpt_callouts');
	function cptui_register_my_cpt_callouts() {
		register_post_type('callouts', array(
			'label' => 'Callouts',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'callouts', 'with_front' => true),
			'query_var' => true,
			'supports' => array('title','revisions'),
			'labels' => array (
				'name' => 'Callouts',
				'singular_name' => 'Callout',
				'menu_name' => 'Callouts',
				'add_new' => 'Add Callout',
				'add_new_item' => 'Add New Callout',
				'edit' => 'Edit',
				'edit_item' => 'Edit Callout',
				'new_item' => 'New Callout',
				'view' => 'View Callout',
				'view_item' => 'View Callout',
				'search_items' => 'Search Callouts',
				'not_found' => 'No Callouts Found',
				'not_found_in_trash' => 'No Callouts Found in Trash',
				'parent' => 'Parent Callout',
				)
		));
	}


	add_action('init', 'my_cpt_stories');
	function my_cpt_stories() {
		register_post_type('stories', array(
			'label' => 'Real Stories',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'stories', 'with_front' => true),
			'query_var' => true,
			'has_archive' => true,
			'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes'),
			'taxonomies' => array('category'),
			'labels' => array (
				'name' => 'Real Stories',
				'singular_name' => 'Story',
				'menu_name' => 'Real Stories',
				'add_new' => 'Add Story',
				'add_new_item' => 'Add New Story',
				'edit' => 'Edit',
				'edit_item' => 'Edit Story',
				'new_item' => 'New Story',
				'view' => 'View Story',
				'view_item' => 'View Story',
				'search_items' => 'Search Real Stories',
				'not_found' => 'No Real Stories Found',
				'not_found_in_trash' => 'No Real Stories Found in Trash',
				'parent' => 'Parent Story',
			)
		));
	}

	add_action('init', 'my_cpt_tip');
	function my_cpt_tip() {
		register_post_type('tip', array(
			'label' => 'Tips and Tools',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'tip', 'with_front' => true),
			'query_var' => true,
			'has_archive' => true,
			'supports' => array('title','editor'),
			'taxonomies' => array('category'),
			'labels' => array (
				'name' => 'Tips and Tools',
				'singular_name' => 'Tip',
				'menu_name' => 'Tips and Tools',
				'add_new' => 'Add Tip',
				'add_new_item' => 'Add New Tip',
				'edit' => 'Edit',
				'edit_item' => 'Edit Tip',
				'new_item' => 'New Tip',
				'view' => 'View Tip',
				'view_item' => 'View Tip',
				'search_items' => 'Search Tips and Tools',
				'not_found' => 'No Tips and Tools Found',
				'not_found_in_trash' => 'No Tips and Tools Found in Trash',
				'parent' => 'Parent Tip',
			)
		));
	}

	class menu_with_description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<br /><small>' . $item->description . '</small>';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	class page_list_with_icons extends Walker_Page {

		function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0){
			$title_lower = strtolower($page->post_title);

			if ( $depth )
			        $indent = str_repeat("\t", $depth);
			else
			        $indent = '';
			extract($args, EXTR_SKIP);
			$css_class = array('page_item', 'page-item-'.$page->ID);
			if( isset( $args['pages_with_children'][ $page->ID ] ) )
			        $css_class[] = 'page_item_has_children';
			if ( !empty($current_page) ) {
			        $_current_page = get_post( $current_page );
			        if ( in_array( $page->ID, $_current_page->ancestors ) )
			                $css_class[] = 'current_page_ancestor';
			        if ( $page->ID == $current_page )
			                $css_class[] = 'current_page_item';
			        elseif ( $_current_page && $page->ID == $_current_page->post_parent )
			                $css_class[] = 'current_page_parent';
			} elseif ( $page->ID == get_option('page_for_posts') ) {
			        $css_class[] = 'current_page_parent';
			}
			$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
			if ( '' === $page->post_title )
			        $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );

			$output .= $indent . '<li class="' . $css_class . ' item-' . $title_lower . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '<img src="' . get_bloginfo('template_url') .'/img/icon-' . $title_lower . '.png"></a>';
			if ( !empty($show_date) ) {
			        if ( 'modified' == $show_date )
			                $time = $page->post_modified;
			        else
			                $time = $page->post_date;
			        $output .= " " . mysql2date($date_format, $time);
			}
		}
	}



	

	// Page ID by Slug
	function get_ID_by_slug($page_slug) {
	    $page = get_page_by_path($page_slug);
	    if ($page) {
	        return $page->ID;
	    } else {
	        return null;
	    }
	}

	// Add Menu Support
	add_theme_support( 'menus' );
	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus( array(
			'main-navigation' => __( 'Main Navigation' ),
			'supporting-navigation' => __( 'Supporting Navigation' ),
			'footer-navigation' => __( 'Footer Navigation' )
		));
	}

	// Short Codes
	add_action( 'init', 'register_shortcodes');

	function register_shortcodes() {
	  add_shortcode('button', 'button_function');
	  add_shortcode('inline_callout', 'inline_callout_function');
	  add_shortcode('page_intro', 'page_intro_function');
	}

	function button_function( $atts, $content = null ) {
	  extract(
	    shortcode_atts(
	      array( 'link' => '#', ),
	      $atts
	    )
	  );
	  return '<a href="'.$link.'" class="button">'.do_shortcode($content).'</a>';
	}

	function link_function( $atts, $content = null ) {
	  extract(
	    shortcode_atts(
	      array( 'link' => '#', ),
	      $atts
	    )
	  );
	  return '<a href="'.$link.'" class="link">'.do_shortcode($content).'</a>';
	}

	function inline_callout_function( $atts, $content = null ) {
		return '<div class="callout">'.do_shortcode($content).'</div>';
	}

	function page_intro_function( $atts, $content = null ) {
		return '<p class="page-intro">'.do_shortcode($content).'</p>';
	}

	function add_plugin( $plugin_array ) {
	   $plugin_array['page_intro_function'] = get_template_directory_uri() . '/js/shortcodes.js';
	   return $plugin_array;
	}
	
	// Add jQuery from Google CDN
	if(!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
	  wp_enqueue_script('jquery');
	}
	
	// Get Top Ancestor for Side Nav
	if(!function_exists('get_post_top_ancestor_id')){
	  function get_post_top_ancestor_id(){
	    global $post;

	    if($post->post_parent){
	      $ancestors = array_reverse(get_post_ancestors($post->ID));
	      return $ancestors[0];
	    }

	    return $post->ID;
	  }
	}
	
	// Pagination
	function paginate() {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	 
		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => true,
			'type' => 'list',
			'next_text' => '&raquo;',
			'prev_text' => '&laquo;'
			);
	 
		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	 
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	 
		echo paginate_links( $pagination );
	}

	function my_page_css_class( $css_class, $page ) {
	    global $post;
	    if ( $post->ID == $page->ID ) {
	        $css_class[] = 'current_page_item';
	    }
	    return $css_class;
	}
	add_filter( 'page_css_class', 'my_page_css_class', 10, 2 );

	include("shortcodes.php"); //shortcodes will be in their own file

