<?php get_header() ?>

<div class="container">
	<h1 id="archive-title">
		<?php
		if(empty($GLOBALS['pitch_theme_settings']['project_archive_title'])) wp_title(null);
		else print $GLOBALS['pitch_theme_settings']['project_archive_title'];
		?>
	</h1>
	
	<?php get_template_part('loop', 'projects') ?>
	<div class="clear"></div>
</div>

<?php get_footer() ?>