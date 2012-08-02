<?php get_header(); the_post(); ?>

<div id="post-single" class="type-page">
	<div class="container">
		<h1 class="post-title">Pitch Features</h1>
		<div class="content entry-content">
			<p>
				<?php _e('Pitch is a pretty cool portfolio theme with a whole bunch of features that make setting up a custom business portfolio site really easy.', 'pitch') ?>
			</p>
			<h2><?php _e('Pitch Supports These Fine WordPress Features', 'pitch') ?></h2>
			<ul>
				<li>
					<strong><?php _e('Several Custom Post Types', 'pitch') ?></strong><br/>
					<?php _e('Adding content is as easy as adding a few custom posts.', 'pitch') ?>
				</li>
				<li>
					<strong><?php _e('Custom Header Images', 'pitch') ?></strong><br/>
					<?php _e("We let you upload your logo using WordPress' custom headers feature.", 'pitch') ?>
				</li>
				<li>
					<strong><?php _e('Custom Backgrounds', 'pitch') ?></strong><br/>
					<?php _e('Change your background in a jiffy.', 'pitch') ?>
				</li>
				<li>
					<strong><?php _e('Navigation Menus', 'pitch') ?></strong><br/>
					<?php _e("Build your menus using WordPress' drag and drop interface.", 'pitch') ?>
				</li>
				<li>
					<strong><?php _e('Child Themes', 'pitch') ?></strong><br/>
					<?php _e("Pitch was build with child theming in mind. It's easy to add your own custom CSS or HTML.", 'pitch') ?>
				</li>
			</ul>
			<p>
				<?php _e("Pitch also features a really nice simple options panel. It's WordPress, the way WordPress was meant to be experienced.", 'pitch') ?>
			</p>
		</div>
	</div>
</div>

<?php get_footer(); ?>