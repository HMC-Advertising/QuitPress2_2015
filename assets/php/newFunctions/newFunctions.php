<?php // Pagination
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

	// Add Menu Support
	
	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus( array(
			'main-navigation' => __( 'Main Navigation' ),
			'supporting-navigation' => __( 'Supporting Navigation' ),
			'footer-navigation' => __( 'Footer Navigation' )
		));
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
		// Page ID by Slug
	function get_ID_by_slug($page_slug) {
	    $page = get_page_by_path($page_slug);
	    if ($page) {
	        return $page->ID;
	    } else {
	        return null;
	    }
	}

	function namespace_add_custom_types( $query ) {
		if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		    $query->set( 'post_type', array(
		    	'post', 'tip', 'nav_menu_item', 'stories'
			));
			return $query;
		}
	}

	add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

	function states($address_types, $form_id ){
		$address = array(
			'us' => array(
				'states' => array(
					'Vermont', 'New Hampshire', 'New York'
				)
			)
		);


		return $address;
	}

	


	add_filter( 'gform_address_types_5', 'states', 10, 2 );

?>