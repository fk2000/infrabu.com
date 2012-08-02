<?php

define('SO_THEME_VERSION', '1.1.9');
define('SO_THEME_ENDPOINT', 'http://siteorigin.com');

// Include the premium functions if they're available AND if 
if(file_exists(get_template_directory().'/premium/functions.php') && basename(get_stylesheet_directory()) != 'pitch-premium')
	include get_template_directory().'/premium/functions.php';

// Users of Pitch Premium need to start using the new system, this shows them a notification
if(basename(get_stylesheet_directory()) == 'pitch-premium')
	include get_template_directory().'/functions/old-premium-notice.php';

// Extras
require(get_template_directory().'/extras/admin/admin.php');
require(get_template_directory().'/extras/update.php');
require(get_template_directory().'/functions/settings.php');

if(!defined('SO_IS_PREMIUM')){
	require(get_template_directory().'/extras/premium/premium.php');
	require(get_template_directory().'/upgrade/upgrade.php');
}

if($GLOBALS['pitch_theme_settings']['type_project']) include(get_template_directory().'/functions/project.php');
if($GLOBALS['pitch_theme_settings']['type_slide']) include(get_template_directory().'/functions/slide.php');
if($GLOBALS['pitch_theme_settings']['type_feature']) include(get_template_directory().'/functions/feature.php');
if($GLOBALS['pitch_theme_settings']['type_client']) include(get_template_directory().'/functions/client.php');

if($GLOBALS['pitch_theme_settings']['demo_mode']) include get_template_directory().'/demo/demo.php';

require(get_template_directory().'/functions/comments.php');


if(!function_exists('pitch_initial_setup')) :
/**
 * After we set up the theme we need to flush the rewrite rules
 */
function pitch_initial_setup(){
	// We need fresh rewrite rules from all the custom post types
	flush_rewrite_rules();
}
endif;
add_action('theme_switch', 'pitch_initial_setup');


if(!function_exists('pitch_rewrite_rules')) :
/**
 * Create the rewrite rules
 * @param $wp_rewrite
 */
function pitch_rewrite_rules($wp_rewrite){
	global $wp_rewrite;
	$wp_rewrite->rules = array_merge(array(
		'blog/?$' => 'index.php?post_type=post',
		'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged=$matches[1]'
	), $wp_rewrite->rules);
}
endif;
add_action('generate_rewrite_rules', 'pitch_rewrite_rules');


if(!function_exists('pitch_setup')) :
/**
 * Setup the theme.
 * 
 * @action setup_theme
 */
function pitch_setup(){
	if ( ! isset( $content_width ) ) $content_width = 620;
	
	// We all like to change the background
	add_theme_support('custom-header', array(
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => false,
	));
	
	add_theme_support('custom-background');

	// We use thumbnails in archive pages
	add_theme_support( 'post-thumbnails' );
	
	// This is required
	add_theme_support( 'automatic-feed-links' );
	
	// The navigation menu at the very top of the screen
	register_nav_menu('topbar', __('Top Bar Menu', 'pitch'));
	register_nav_menu('main', __('Main Menu', 'pitch'));
	
	set_post_thumbnail_size(455, 270, true);
	add_image_size('gallery', 620, 348, true);
	add_image_size('home-loop', 225, 150, true);
	add_image_size('portfolio', 225, 200, true);
	add_image_size('project', 600, 600, false);
}
endif;
add_action('after_setup_theme', 'pitch_setup');


if(!function_exists('pitch_wigets_init')) :
/**
 * Initialize the widgets for Pitch.
 * 
 * @action widgets_init
 */
function pitch_wigets_init(){
	register_sidebar(array(
		'name' => __('Sidebar', 'pitch'),
		'description' => __('Main sidebar.', 'pitch'),
		'after_widget' => '<div class="separator"></div></li>'
	));
	
	register_sidebar(array(
		'name' => __('Footer', 'pitch'),
		'description' => __('Website footer.', 'pitch'),
	));
}
endif;
add_action('widgets_init', 'pitch_wigets_init');


if(!function_exists('pitch_enqueue_scripts')) :
/**
 * Enqueue scripts for Pitch
 * 
 * @action wp_enqueue_scripts
 */
function pitch_enqueue_scripts(){
	// Nivo slider
	wp_enqueue_script('nivo', get_template_directory_uri().'/js/nivo/jquery.nivo.slider.pack.min.js', array('jquery'), '2.7.1');
	wp_enqueue_style('nivo', get_template_directory_uri().'/js/nivo/nivo-slider.css', array(), '2.7.1');
	
	// Flex slider
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/flexslider/jquery.flexslider.min.js', array('jquery'), '1.8');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/js/flexslider/flexslider.css', array(), '1.8');

	wp_enqueue_script('jquery.preload', get_template_directory_uri().'/js/jquery.preload.min.js', array('jquery'), '1.0.8');
	
	wp_enqueue_script('pitch', get_template_directory_uri().'/js/pitch.min.js', array('jquery', 'nivo', 'jquery.preload'), SO_THEME_VERSION);
	
	wp_localize_script('pitch', 'pitch', array(
		'sliderSpeed' => intval($GLOBALS['pitch_theme_settings']['slider_speed']),
		'sliderAnimationSpeed' => intval($GLOBALS['pitch_theme_settings']['slider_animation_speed']),
		'sliderEffect' => $GLOBALS['pitch_theme_settings']['slider_effect'],
	));

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	wp_enqueue_style('google-webfonts', 'http://fonts.googleapis.com/css?family=Maven+Pro|Droid+Serif:400italic|Droid+Sans:400,700');
}
endif;
add_action('wp_enqueue_scripts', 'pitch_enqueue_scripts');

if(!function_exists('pitch_page_title')):
/**
 * Filter the title
 * 
 * @param $title
 * @param $sep
 * @param $sep_location
 * @return string
 * 
 * @filter wp_title
 */
function pitch_page_title($title, $sep, $sep_location){
	if(empty($sep)) return $title;
	
	global $post;
	
	if(is_front_page()) return get_bloginfo('name').' '.$sep.' '.get_bloginfo('description');
	elseif(is_archive() && $post->post_type == 'project'){
		return $GLOBALS['pitch_theme_settings']['project_archive_title'].' '.$sep.' '.get_bloginfo('name');
	}
	else return $title.' '.get_bloginfo('name');
}
endif;
add_filter('wp_title', 'pitch_page_title', 10, 3);


if(!function_exists('pitch_home_template')) :
/**
 * Check if we actually need to display the index.php template file.
 * 
 * @param $tpl
 * @return string
 * 
 * @filter home_template
 */
function pitch_home_template($tpl){
	global $wp_query;
	// Test if this is the "post" archive page or if this is the portfolio home. 
	if($wp_query->get('post_type') == 'post' || !$GLOBALS['pitch_theme_settings']['portfolio_home']){
		// Let's go with the index page rather
		$tpl = locate_template(array('index.php'), false, false);
	}
	
	return $tpl;
}
endif;
add_filter('home_template', 'pitch_home_template');


if(!function_exists('pitch_search_form')) :
/**
 * Change the search form to a slightly modified one.
 *
 * @param $form
 * @return string
 * 
 * @filter get_search_form
 */
function pitch_search_form($form){
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
	<div>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr($GLOBALS['pitch_theme_settings']['search_placeholder']).'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'pitch') .'" />
	</div>
	</form>';
	
	return $form;
}
endif;
add_filter('get_search_form', 'pitch_search_form');


if(!function_exists('pitch_footer_widget_params')) :
/**
 * Set the widths of the footer widgets
 * 
 * @param $params
 * @return mixed
 */
function pitch_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'sidebar-2') return $params;
	
	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']); 
	
	return $params;
}
endif;
add_action('dynamic_sidebar_params', 'pitch_footer_widget_params');


if(! function_exists('pitch_fallback_nav')) :
/**
 * The fallback navigation.
 * @param $args
 */
function pitch_fallback_nav($args){
	$GLOBALS['menu_args'] = $args;
	if($GLOBALS['pitch_theme_settings']['demo_mode']) get_template_part('demo/menu', $args['theme_location']);
	else get_template_part('menu', $args['theme_location']);
}
endif;

if(!function_exists('pitch_pre_get_posts')) :
/**
 * @param WP_Query $query
 */
function pitch_pre_get_posts($query){
	if($query->is_main_query() && $query->get('post_type') == 'project'){
		$query->set('posts_per_page', 100);
	}
}
endif;
add_action('pre_get_posts', 'pitch_pre_get_posts');

if(!function_exists('pitch_previous_posts_link_attributes')):
/**
 * Add a class to the previous navigation link
 * @param $atts
 * @return string
 */
function pitch_previous_posts_link_attributes($atts){
	$atts = 'class="nav-previous"';
	return $atts;
}
endif;
add_action('previous_posts_link_attributes', 'pitch_previous_posts_link_attributes');


if(!function_exists('pitch_next_posts_link_attributes')):
/**
 * Add a class to the next navigation link
 * @param $atts
 * @return string
 */
function pitch_next_posts_link_attributes($atts){
	$atts = 'class="nav-next"';
	return $atts;
}
endif;
add_action('next_posts_link_attributes', 'pitch_next_posts_link_attributes');


if(!function_exists('pitch_gallery')):
/**
 * Render a gallery
 * 
 * @param $code
 * @param $atts
 * @return string
 */
function pitch_gallery($code, $atts){
	if(empty($atts)) $atts = array();
	if(empty($atts['id'])) $atts['id'] = get_the_ID();
	
	ob_start();
	$GLOBALS['pitch_gallery_atts'] = $atts;
	get_template_part('gallery');
	return ob_get_clean();
}
endif;
add_filter('post_gallery', 'pitch_gallery', 10, 2);


/**
 * @return string|void The URL of the blog page.
 */
function pitch_get_blogurl(){
	if(get_option('permalink_structure')) return site_url('/blog/');
	else return site_url('?post_type=post');
}

if(!function_exists('pitch_menu_add_clear')) :
/**
 * @param $menu
 * @param $args
 */
function pitch_menu_add_clear($menu, $args){
	if($args->theme_location == 'main'){
		$menu = preg_replace('/<\/ul>\s*<\/div>/m', '<div class="clear"></div></ul></div>', $menu);
	}
	return $menu;
}
endif;
add_filter('wp_nav_menu', 'pitch_menu_add_clear', 10, 2);