<div class="wrap">
	<div id="icon-themes" class="icon32"><br></div>
	<h2><?php _e('Theme Settings','pitch') ?></h2>
	<p>
		<?php printf(__("Read Pitch's <a href='%s' target='_blank'>documentation</a> for help setting up and using it.", 'pitch'), 'http://siteorigin.com/doc/pitch/') ?>
	</p>

	<form action="options.php" method="post">
		<?php settings_fields('theme_settings'); ?>
		<?php do_settings_sections('theme_settings') ?>
		
		<p class="submit"><input name="Submit" type="submit" value="<?php esc_attr_e('Save Settings', 'pitch'); ?>" /></p>
	</form>
	
</div> 