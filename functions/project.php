<?php

/**
 * Initialize the project type
 * 
 * @action init
 */
function pitch_project_init(){
	$labels = array(
		'name' => _x('Projects', 'post type general name', 'pitch'),
		'singular_name' => _x('Project', 'post type singular name', 'pitch'),
		'add_new' => _x('Add New', 'book', 'pitch'),
		'add_new_item' => __('Add New Project', 'pitch'),
		'edit_item' => __('Edit Project', 'pitch'),
		'new_item' => __('New Project', 'pitch'),
		'all_items' => __('All Projects', 'pitch'),
		'view_item' => __('View Project', 'pitch'),
		'search_items' => __('Search Projects', 'pitch'),
		'not_found' =>  __('No projects found', 'pitch'),
		'not_found_in_trash' => __('No projects found in Trash', 'pitch'),
		'parent_item_colon' => '',
		'menu_name' => __('Projects', 'pitch')
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => $GLOBALS['pitch_theme_settings']['project_url_slug'] ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type('project', $args);
	
	// Now register the skills taxonomy
	
	if($GLOBALS['pitch_theme_settings']['project_tags']){
		$labels = array(
			'name' => __( 'Skills', 'pitch'),
			'singular_name' => __( 'Skill', 'pitch'),
			'search_items' =>  __( 'Search Skills' , 'pitch'),
			'all_items' => __( 'All Skills' , 'pitch'),
			'parent_item' => __( 'Parent Skill' , 'pitch'),
			'parent_item_colon' => __( 'Parent Skill:' , 'pitch'),
			'edit_item' => __( 'Edit Skill' , 'pitch'),
			'update_item' => __( 'Update Skill' , 'pitch'),
			'add_new_item' => __( 'Add New Skill' , 'pitch'),
			'new_item_name' => __( 'New Skill Name' , 'pitch'),
			'menu_name' => __( 'Skill' , 'pitch'),
		);
		
		register_taxonomy('skill', 'project', array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'skill' ),
		));
	}
}
add_action('init', 'pitch_project_init');

/**
 * @param $contextual_help
 * @param $screen_id
 * @param $screen
 */
function pitch_project_help($contextual_help, $screen_id, $screen){
	if($screen->post_type == 'project'){
		switch($screen->action){
			case 'add':
				$contextual_help = pitch_project_help_display();
				break;
			default :
				$contextual_help = pitch_project_help_display();
				break;
		}
	}
	return $contextual_help;
}
add_filter('contextual_help', 'pitch_project_help', 10, 3);

/**
 * Return the help for overview of the project type.
 * @return string The help
 */
function pitch_project_help_display(){
	return '<p>'. sprintf(__("Read <a href='%s'>Pitch's documentation</a> for help with adding projects.", 'pitch'), 'http://go.siteorigin.com/pitch-docs') .'</p>';
}

/**
 * Set up the placeholder metabox for Pitch's projects
 */
function pitch_add_project_metabox(){
	if(defined('SO_IS_PREMIUM')) return;

	add_meta_box(
		'project_video',
		__('Project Video', 'pitch'),
		'pitch_project_metabox_render',
		'project',
		'side'
	);
}
add_action('add_meta_boxes', 'pitch_add_project_metabox');

/**
 * Render the placeholder metabox
 */
function pitch_project_metabox_render(){
	_e('Upgrade to Pitch Premium to set a project video. ', 'pitch');
	?><a href="<?php print admin_url('themes.php?page=premium_upgrade') ?>"><?php _e('Find out more', 'pitch') ?></a> <?php
}

/**
 * Flush the rewrite rules when ever a project is saved, this will prevent the 404 error.
 * 
 * @param int $post_id
 * @param object $post
 * 
 * @action save_post
 */
function pitch_project_save_flush($post_id, $post){
	if($post->post_type == 'project') flush_rewrite_rules();
}
add_action('save_post', 'pitch_project_save_flush', 10, 2);