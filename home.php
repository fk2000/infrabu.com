<?php get_header(); ?>

<?php if($GLOBALS['pitch_theme_settings']['type_slide']) get_template_part('slider') ?>

<?php if(!empty($GLOBALS['pitch_theme_settings']['cta_text'])) : ?>
	<div id="call-to-action">
		<div class="container">
			<h3><?php print $GLOBALS['pitch_theme_settings']['cta_text'] ?></h3>
			<?php if($GLOBALS['pitch_theme_settings']['cta_button_text'] && $GLOBALS['pitch_theme_settings']['cta_button_url']) : ?>
				<a href="<?php print $GLOBALS['pitch_theme_settings']['cta_button_url'] ?>"><?php print $GLOBALS['pitch_theme_settings']['cta_button_text'] ?></a>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>

<?php
if($GLOBALS['pitch_theme_settings']['type_feature']){
	$GLOBALS['home_loop_all'] = get_option( 'permalink_structure' ) ? site_url('blog') : site_url('?post_type=post');
	get_template_part('features');
}
?>

<?php
if($GLOBALS['pitch_theme_settings']['type_project']){
	$GLOBALS['home_loop_title'] = $GLOBALS['pitch_theme_settings']['home_title_latest_projects'];
	$GLOBALS['home_loop_all'] = get_post_type_archive_link('project');
	query_posts(array(
		'posts_per_page' => 10,
		'post_type' => 'project',
	));
	get_template_part('loop', 'home');
	wp_reset_query();
}
?>

<?php
if($GLOBALS['pitch_theme_settings']['home_blog']){
	$GLOBALS['home_loop_title'] = $GLOBALS['pitch_theme_settings']['home_title_blog'];
	get_template_part('loop', 'home');
}
?>

<?php
if($GLOBALS['pitch_theme_settings']['type_client']){
	$GLOBALS['home_loop_title'] = $GLOBALS['pitch_theme_settings']['home_title_clients'];
	$GLOBALS['home_loop_all'] = false;
	query_posts(array(
		'posts_per_page' => 10,
		'post_type' => 'client',
		'order_by' => 'menu_order',
		'order' => 'ASC',
	));
	get_template_part('loop', 'home');
	wp_reset_query();
}
?>

<?php get_footer(); ?>