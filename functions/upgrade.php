<?php

function pitch_upgrade_menu(){
	add_theme_page(
		__('Premium Upgrade', 'pitch'),
		__('Premium Upgrade', 'pitch'),
		'switch_themes',
		'premium_upgrade',
		'pitch_upgrade_menu_render'
	);
}
add_action('admin_menu', 'pitch_upgrade_menu');

function pitch_upgrade_menu_render(){
	get_template_part('tpl/upgrade');
}

function pitch_upgrade_admin_enqueue_script($prefix){
	if($prefix != 'appearance_page_premium_upgrade') return;
	
	wp_enqueue_style('pitch-upgrade', get_template_directory_uri().'/css/upgrade.css');
}
add_action('admin_enqueue_scripts', 'pitch_upgrade_admin_enqueue_script');