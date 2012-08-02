<?php
/*
Template Name: Full Width
*/

get_header(); the_post(); ?>

<div id="post-single" <?php post_class(array('page-full-width')) ?>>
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php the_title() ?></h1>
			<div class="entry-content">
				<?php the_content() ?>
				<?php wp_link_pages() ?>
			</div>

			<?php comments_template() ?>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>