<?php get_header(); the_post(); global $post; ?>

<div id="post-single" class="post type-project">
	<div class="container">
		<div id="project-images">
			<div class="image">
				<img src="<?php print get_template_directory_uri() ?>/demo/project-large.jpg" />
				<div class="shadow"></div>
			</div>
		</div>

		<div id="project-info">
			<div class="separator first"></div>
			<h1>
				<?php _e('This is A Demo Project', 'pitch') ?>
			</h1>
			<div class="separator"></div>
			<p class="excerpt">
				<?php _e('This is the excerpt. You can add a little description about your project here.', 'pitch') ?>
			</p>
			<div class="separator light"></div>

			<div class="content entry-content">
				<p>
					<?php _e("This is the project content, you can add a whole load of content here. It'll show up, complete with formatting and all that cool stuff.", 'pitch') ?>
				</p>
				<p>
					<?php _e("This demo project will stop showing up on your site when you add your first real project or when you disable projects entirely - but why would you do that?", 'pitch') ?>
				</p>
				
				<p>Donec tempus eros in nibh lacinia convallis. Pellentesque non purus elementum elit vestibulum facilisis non dictum nisi. Pellentesque habitant morbi tristique senectu.</p>
				<p>Et netus et malesuada fames ac turpis egestas. Cras adipiscing vulputate ante et bibendum. Donec consequat congue urna, nec hendrerit sapien varius in. Integer ut pretium orci. Quisque vitae nulla leo.</p>
			</div>
			<div class="separator light"></div>

		</div>

		<div class="clear"></div>

		<div id="related-projects">
			<?php $GLOBALS['home_loop_title'] = 'Related Projects' ?>
			<?php get_template_part('demo/homeloop', 'project') ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>