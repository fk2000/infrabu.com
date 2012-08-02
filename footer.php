<div id="footer">
	<div class="pointer"></div>
	<div class="container">
		<ul class="widgets">
			<?php dynamic_sidebar('Footer') ?>
		</ul>
	</div>
</div>

<div id="copyright">
	<div class="container">
		<?php
		if($GLOBALS['pitch_theme_settings']['attribution']){
			printf(
				__('Copyright %s'),
				get_bloginfo('name')
			);
		}
		else{
			printf(
				__('Copyright %s', 'pitch-premium'),
				get_bloginfo('name')
			);
		}
		?>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>