<p style="margin-bottom: 20px">
	<?php _e("This is just a demo page. When you add your own projects or disable demo mode, it'll disappear.", 'pitch') ?>
</p>
<div id="projects" class="loop-projects">
	<?php for($i = 0; $i < 8; $i ++) : ?>
		<div class="project type-project status-publish hentry">
			<div class="wrapper">
				<a href="<?php print site_url('index.php?demo_project=1') ?>" class="image">
					<img width="225" height="200" src="<?php print get_template_directory_uri() ?>/demo/project-loop.jpg" class="preload wp-post-image" />
				</a>
				
				<div class="overlay"></div>
				
				<a href="<?php print site_url('index.php?demo_project=1') ?>" class="info">
					<h3><?php _e('This is A Project Title', 'pitch') ?></h3>
					<p><?php _e('View Project', 'pitch') ?></p>
				</a>
			</div>
		</div>
	<?php endfor; ?>
	<div class="clear"></div>
</div>