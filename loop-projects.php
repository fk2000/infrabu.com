<?php if(have_posts()) :  ?>
	<div id="projects" class="loop-projects">
		<?php while(have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
				<div class="wrapper">
					<a href="<?php the_permalink() ?>" class="image">
						<?php print get_the_post_thumbnail(null, 'portfolio', array('class' => 'preload')); ?>
					</a>
					<div class="overlay">
						
					</div>
					<a href="<?php the_permalink() ?>" class="info">
						<h3><?php the_title() ?></h3>
						<p><?php print $GLOBALS['pitch_theme_settings']['project_view_text'] ?></p>
					</a>
				</div>
			</div>
		<?php endwhile ?>
		<div class="clear"></div>
	</div>
<?php elseif ($GLOBALS['pitch_theme_settings']['demo_mode']) : get_template_part('demo/loop', 'projects') ?>
<?php endif; ?>