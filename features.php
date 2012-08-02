<?php
$features = get_posts(array(
	'numberposts' => 6,
	'post_type' => 'feature',
	'orderby' => 'menu_order',
	'order' => 'ASC'
));
?>

<?php if(!empty($features)) : ?>
	<div id="site-features">
		<div class="container">
			<ul class="feature-list">
				<?php foreach($features as $feature) : ?>
					<li class="feature">
						<div class="icon">
							<?php $the_icon = get_post_meta($feature->ID, 'feature_icon', true); ?>
							<?php if(!empty($the_icon)) : ?>
								<img src="<?php print get_template_directory_uri().'/images/icons/'.$the_icon.'.png' ?>" />
							<?php endif; ?>
						</div>
						<h3><?php print $feature->post_title ?></h3>
						<div class="clear"></div>
						<p><?php print $feature->post_excerpt ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
<?php elseif($GLOBALS['pitch_theme_settings']['demo_mode']) : get_template_part('demo/features') ?>
<?php endif; ?>