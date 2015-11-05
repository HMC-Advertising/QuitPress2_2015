<?php


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






?>