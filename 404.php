<?php get_header(); ?>

<div id="post-single" class="error-404">
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php _e('Not Found', 'pitch') ?></h1>
			<div class="content">
				<?php print $GLOBALS['pitch_theme_settings']['not_found_text'] ?>
			</div>
		</div>
		
		<?php get_sidebar() ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>