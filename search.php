<?php get_header() ?>

<div class="container">
	<h1 id="archive-title"><?php wp_title(null) ?></h1>

	<?php get_template_part('loop') ?>
	<?php get_sidebar() ?>
	<div class="clear"></div>
</div>

<?php get_footer() ?>