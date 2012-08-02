<!DOCTYPE html>
	
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

<div id="topbar">
	<div class="container">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'topbar',
				'menu_id' => 'topbar-menu',
				'depth' => 1,
				'fallback_cb' => 'pitch_fallback_nav',
			));
		?>
		<div class="clear"></div>
	</div>
</div>

<div id="logo">
	<div class="container">
		<a href="<?php print site_url('/') ?>" title="<?php print get_bloginfo('name').' - '.get_bloginfo('description'); ?>" id="logo-link">
			<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php print esc_attr(get_bloginfo('name')) ?>" alt="<?php print esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
			<?php else : ?>
				<h1><?php bloginfo('name') ?></h1>
			<?php endif; ?>
		</a>
		
		<?php if($GLOBALS['pitch_theme_settings']['search_input']) get_search_form() ?>
	</div>
</div>

<div id="mainmenu">
	<div class="container">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main',
			'menu_id' => 'mainmenu-menu',
			'depth' => defined('SO_IS_PREMIUM') ? 2 : 1,
			'fallback_cb' => 'pitch_fallback_nav',
		));
		?>
	</div>
</div>