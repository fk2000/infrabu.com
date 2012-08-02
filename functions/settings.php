<?php

function pitch_settings_admin_menu(){
	add_theme_page(__('Theme Settings','pitch'), __('Theme Settings', 'pitch'), 'edit_theme_options', 'theme_settings_page', 'pitch_settings_render');
}
add_action('admin_menu', 'pitch_settings_admin_menu');

function pitch_settings_admin_init(){
	register_setting('theme_settings', 'pitch_theme_settings', 'pitch_theme_settings_validate');

	add_settings_section('general', __('General Settings', 'pitch'), '__return_false', 'theme_settings');
	add_settings_section('font_page', __('Front Page', 'pitch'), '__return_false', 'theme_settings');
	add_settings_section('slider', __('Front Page Slider', 'pitch'), '__return_false', 'theme_settings');
	add_settings_section('project', __('Project Page', 'pitch'), '__return_false', 'theme_settings');
	add_settings_section('post_types', __('Post Types', 'pitch'), '__return_false', 'theme_settings');
	add_settings_section('site_text', __('Site Text', 'pitch'), '__return_false', 'theme_settings');
	
	// General Settings Fields
	
	add_settings_field('demo_mode', __('Demo Mode', 'pitch'), 'pitch_settings_field', 'theme_settings', 'general', array(
		'field' => 'demo_mode',
		'type' => 'checkbox',
		'description' => __("You should disable this after you've installed Pitch.", 'pitch')
	));

	add_settings_field('search_input', __('Search Input', 'pitch'), 'pitch_settings_field', 'theme_settings', 'general', array(
		'field' => 'search_input',
		'type' => 'checkbox',
		'description' => __("Show the search field at the top of your site.", 'pitch')
	));
	
	// Front Page Settings Fields

	add_settings_field('portfolio_home', __('Portfolio Home Page', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'portfolio_home',
		'type' => 'checkbox',
		'description' => __('Disabling this will convert your home page into a blog.', 'pitch'),
	));
	
	add_settings_field('cta_text', __('Call To Action Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'cta_text',
		'type' => 'text',
		'description' => __('Call to action text on your home page.', 'pitch'),
	));

	add_settings_field('cta_button_text', __('Call To Action Button Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'cta_button_text',
		'type' => 'text',
	));
	
	add_settings_field('cta_button_url', __('Call To Action Button URL', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'cta_button_url',
		'type' => 'text',
	));

	add_settings_field('home_blog', __('Display Blog on Home Page', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'home_blog',
		'type' => 'checkbox',
	));

	// Home page titles

	add_settings_field('home_title_latest_projects', __('Title: Latest Projects', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'home_title_latest_projects',
		'type' => 'text',
		'description' => __('Title of the projects block', 'pitch')
	));

	add_settings_field('home_title_blog', __('Title: Blog', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'home_title_blog',
		'type' => 'text',
		'description' => __('Title of the clients block', 'pitch')
	));

	add_settings_field('home_title_clients', __('Title: Clients', 'pitch'), 'pitch_settings_field', 'theme_settings', 'font_page', array(
		'field' => 'home_title_clients',
		'type' => 'text',
		'description' => __('Title of the clients block', 'pitch')
	));
	
	// Slider Settings
	
	add_settings_field('slider_speed', __('Slider Speed', 'pitch'), 'pitch_settings_field', 'theme_settings', 'slider', array(
		'field' => 'slider_speed',
		'type' => 'text',
		'description' => __('Number of milliseconds Pitch shows each slide', 'pitch')
	));

	add_settings_field('slider_animation_speed', __('Slider Transition Speed', 'pitch'), 'pitch_settings_field', 'theme_settings', 'slider', array(
		'field' => 'slider_animation_speed',
		'type' => 'text',
		'description' => __('Number of milliseconds each slide transition takes', 'pitch')
	));

	add_settings_field('slider_max_slides', __('Maximum Slides', 'pitch'), 'pitch_settings_field', 'theme_settings', 'slider', array(
		'field' => 'slider_max_slides',
		'type' => 'text',
	));

	add_settings_field('slider_effect', __('Slide Transition', 'pitch'), 'pitch_settings_field', 'theme_settings', 'slider', array(
		'field' => 'slider_effect',
		'type' => 'dropdown',
		'options' => array(
			'random' => __('Random', 'pitch'),
			'sliceDown' => __('Slice Down', 'pitch'),
			'sliceDownLeft' => __('Slice Down Left', 'pitch'),
			'sliceUp' => __('Slice Up', 'pitch'),
			'sliceUpLeft' => __('Slice Up Left', 'pitch'),
			'sliceUpDown' => __('Slice Up Down', 'pitch'),
			'sliceUpDownLeft' => __('Slice Up Down Left', 'pitch'),
			'fold' => __('Fold', 'pitch'),
			'fade' => __('Fade', 'pitch'),
			'slideInRight' => __('Slide In Right', 'pitch'),
			'slideInLeft' => __('Slide In Left', 'pitch'),
			'boxRandom' => __('Box Random', 'pitch'),
			'boxRain' => __('Box Rain', 'pitch'),
			'boxRainReverse' => __('Box Rain Reverse', 'pitch'),
			'boxRainGrow' => __('Box Rain Grow', 'pitch'),
			'boxRainGrowReverse' => __('Box Rain Grow Reverse', 'pitch'),
		)
	));

	add_settings_field('slider_height', __('Slider Height', 'pitch'), 'pitch_settings_field', 'theme_settings', 'slider', array(
		'field' => 'slider_height',
		'type' => 'text',
		'description' => __('The height of the home page slider in pixels. You need to regenerate thumbnails if you change this.', 'pitch')
	));
	
	// Project Settings

	add_settings_field('project_tags', __('Project Tags', 'pitch'), 'pitch_settings_field', 'theme_settings', 'project', array(
		'field' => 'project_tags',
		'type' => 'checkbox',
		'description' => __("Use project skill tags.", 'pitch')
	));

	add_settings_field('project_archive_title', __('Projects Archive Title', 'pitch'), 'pitch_settings_field', 'theme_settings', 'project', array(
		'field' => 'project_archive_title',
		'type' => 'text',
	));

	add_settings_field('project_view_text', __('View Project Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'project', array(
		'field' => 'project_view_text',
		'type' => 'text',
		'description' => __('The text displayed to view a project.', 'pitch')
	));

	add_settings_field('project_url_slug', __('View Project Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'project', array(
		'field' => 'project_url_slug',
		'type' => 'text',
		'description' => __("The slug used for a project's URL.", 'pitch')
	));
	
	// Post Types Fields

	add_settings_field('type_project', __('Projects', 'pitch'), 'pitch_settings_field', 'theme_settings', 'post_types', array(
		'field' => 'type_project',
		'type' => 'checkbox',
	));

	add_settings_field('type_feature', __('Feature', 'pitch'), 'pitch_settings_field', 'theme_settings', 'post_types', array(
		'field' => 'type_feature',
		'type' => 'checkbox',
	));

	add_settings_field('type_client', __('Client', 'pitch'), 'pitch_settings_field', 'theme_settings', 'post_types', array(
		'field' => 'type_client',
		'type' => 'checkbox',
	));

	add_settings_field('type_slide', __('Slide', 'pitch'), 'pitch_settings_field', 'theme_settings', 'post_types', array(
		'field' => 'type_slide',
		'type' => 'checkbox',
	));
	
	// Site Text

	add_settings_field('search_placeholder', __('Search Placeholder', 'pitch'), 'pitch_settings_field', 'theme_settings', 'site_text', array(
		'field' => 'search_placeholder',
		'type' => 'text',
	));
	
	add_settings_field('comments_closed_text', __('Comments Closed Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'site_text', array(
		'field' => 'comments_closed_text',
		'type' => 'text',
	));

	add_settings_field('not_found_text', __('404 Error Page Text', 'pitch'), 'pitch_settings_field', 'theme_settings', 'site_text', array(
		'field' => 'not_found_text',
		'type' => 'text',
		'description' => __('Displayed on 404 error page.', 'pitch'),
	));
}
add_action('admin_init', 'pitch_settings_admin_init');

/**
 * Add the admin notification bar
 * @return object
 */
function pitch_theme_settings_admin_bar($bar){
	$screen = get_current_screen();
	if($screen->id == 'appearance_page_theme_settings_page'){
		$bar = (object) array('id' => 'pitch-theme-settings', 'message' => array('tpl/message', 'settings'));
	}
	
	return $bar;
}
add_filter('so_adminbar', 'pitch_theme_settings_admin_bar');

/**
 * Refresh the rewrite rules when we're viewing the theme settings
 */
function pitch_theme_settings_refresh_rewrite(){
	// Rewrite rules can change in after the settings are saved, so lets refresh them to be safe
	flush_rewrite_rules();
}
add_action('load-appearance_page_theme_settings_page', 'pitch_theme_settings_refresh_rewrite');

function pitch_theme_settings_validate($values){
	global $wp_settings_fields;
	
	foreach($wp_settings_fields['theme_settings'] as $section => $fields){
		foreach($fields as $field_id => $field){
			if($field['args']['type'] == 'checkbox'){
				$values[$field_id] = !empty($values[$field_id]);
			}
		}
	}
	
	return $values;
}

function pitch_settings_default_values($defaults){
	$defaults = array_merge($defaults, array(
		// General
		'demo_mode' => true,
		'search_input' => true,
		'attribution' => true,
		
		// Home Page
		'portfolio_home' => true,
		'cta_text' => __('Enter Your Call To Action Text Here', 'pitch'),
		'cta_button_text' => __('Click Me', 'pitch'),
		'cta_button_url' => site_url(),
		'home_blog' => true,
		
		// Home page titles
		'home_title_latest_projects' => __('Latest Projects', 'pitch'),
		'home_title_blog' => __('From Our Blog', 'pitch'),
		'home_title_clients' => __('Our Clients', 'pitch'),
		
		// Slider stuff
		'slider_speed' => 8000,
		'slider_animation_speed' => 500,
		'slider_max_slides' => 4,
		'slider_effect' => 'random',
		'slider_height' => 360,
		
		// Project
		'project_tags' => true,
		'project_archive_title' => __('Projects', 'pitch'),
		'project_view_text' => __('View Project', 'pitch'),
		'project_url_slug' => 'project',
		
		// Post Types
		'type_project' => true,
		'type_feature' => true,
		'type_client' => true,
		'type_slide' => true,
		
		// Site Text
		'search_placeholder' => __('Search Everything', 'pitch'),
		'comments_closed_text' => __('Comments Are Closed', 'pitch'),
		'not_found_text' => __('The page you were looking for could not be found.', 'pitch'),
	));
	
	return $defaults;
}
add_filter('pitch_default_settings', 'pitch_settings_default_values');

/**
 * Render a settings field
 * @param $args
 */
function pitch_settings_field($args){
	$defaults = apply_filters('pitch_default_settings', array());
	
	$options = get_option('pitch_theme_settings', $defaults);
	$current = isset($options[$args['field']]) ? $options[$args['field']] : $defaults[$args['field']];
	
	switch($args['type']){
		case 'checkbox' :
			?>
			<input id="<?php print esc_attr($args['field']) ?>" name="pitch_theme_settings[<?php print esc_attr($args['field']) ?>]" type="checkbox" <?php checked($current) ?> />
			<label for="<?php print esc_attr($args['field']) ?>"><?php print !empty($args['label']) ? $args['label'] : __('Enabled', 'pitch') ?></label>
			<?php
			break;
		case 'text' :
			?><input id="<?php print esc_attr($args['field']) ?>" name="pitch_theme_settings[<?php print esc_attr($args['field']) ?>]" size="40" type="text" value="<?php print esc_attr($current) ?>" /><?php
			break;

		case 'dropdown' :
			?>
			<select id="<?php print $args['field'] ?>" name="pitch_theme_settings[<?php print $args['field'] ?>]">
				<?php foreach($args['options'] as $key => $value) : ?>
					<option value="<?php print esc_attr($key) ?>" <?php selected($key, $current) ?>><?php print esc_html($value) ?></option>
				<?php endforeach; ?>
			</select>
			<?php
			break;
	}
	
	if(!empty($args['description'])) print '<p class="description">'.$args['description'].'</p>';
}

/**
 * Render the settings page
 */
function pitch_settings_render(){
	get_template_part('tpl/settings');
}

/**
 * Initialize the settings and store them in a global for easy access.
 */
function pitch_settings_init(){
	$defaults = apply_filters('pitch_default_settings', array());
	$options = (array) get_option('pitch_theme_settings', $defaults);
	$options = array_merge($defaults, $options);

	$GLOBALS['pitch_theme_settings'] = $options;
}
pitch_settings_init(); // We need to call this so it's available to the rest of functions.php

function pitch_settings_script($prefix){
	if($prefix != 'appearance_page_theme_settings_page') return;
	
	// We're going to include the JS from SiteOrigin settings extras, even though we're not using the full settings 
	wp_enqueue_script('siteorigin-settings', get_template_directory_uri().'/extras/settings/settings.js', array('jquery'), SO_THEME_VERSION);
}
add_action('admin_enqueue_scripts', 'pitch_settings_script');