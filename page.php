<?php get_header(); the_post(); ?>

<div id="post-single" <?php post_class() ?>>
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php the_title() ?></h1>
			<div class="content entry-content">
				<?php the_content() ?>
				<div class="clear"></div>
				<?php wp_link_pages() ?>
			</div>

			<?php comments_template() ?>
		</div>
		<?php get_sidebar() ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>