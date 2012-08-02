<?php // You shouldn't edit this file to change Pitch's menus. Rather use WordPress' custom menu system. ?>

<ul id="<?php print $GLOBALS['menu_args']['menu_id'] ?>">
	<li class="menu-item"><a href="<?php print site_url('/') ?>"><?php _e('Home', 'pitch') ?></a></li>
	<?php if($GLOBALS['pitch_theme_settings']['type_project']) : ?>
		<li class="menu-item"><a href="<?php print get_post_type_archive_link('project') ?>"><?php _e('Projects', 'pitch') ?></a></li>
	<?php endif ?>
	<li class="menu-item"><a href="<?php print pitch_get_blogurl() ?>"><?php _e('Blog', 'pitch') ?></a></li>
	
	<?php
		$pages = get_posts('post_type=page&post_status=publish&numberposts=4&orderby=menu_order');
		foreach($pages as $page){
			?><li class="menu-item"><a href="<?php print get_permalink($page->ID) ?>"><?php print get_the_title($page->ID) ?></a></li><?php
		}
	?>
	
	<div class="clear"></div>
</ul>