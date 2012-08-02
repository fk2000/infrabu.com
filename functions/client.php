<?php

function pitch_client_init(){
	$labels = array(
		'name' => _x('Clients', 'post type general name', 'pitch'),
		'singular_name' => _x('Portfolio', 'post type singular name', 'pitch'),
		'add_new' => _x('Add New', 'book', 'pitch'),
		'add_new_item' => __('Add New Client', 'pitch'),
		'edit_item' => __('Edit Client', 'pitch'),
		'new_item' => __('New Client', 'pitch'),
		'all_items' => __('All Clients', 'pitch'),
		'view_item' => __('View Client', 'pitch'),
		'search_items' => __('Search Clients', 'pitch'),
		'not_found' =>  __('No clients found', 'pitch'),
		'not_found_in_trash' => __('No clients found in Trash', 'pitch'),
		'parent_item_colon' => '',
		'menu_name' => __('Clients', 'pitch')
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'page-attributes')
	);

	register_post_type('client', $args);
}
add_action('init', 'pitch_client_init');